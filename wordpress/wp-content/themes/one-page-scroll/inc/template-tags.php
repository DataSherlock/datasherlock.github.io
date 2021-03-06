<?php

if ( ! function_exists( 'onepagescroll_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function onepagescroll_paging_nav() {
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'one-page-scroll' ); ?></h1>
		<div class="nav-links">

			<?php echo paginate_links(); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'onepagescroll_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function onepagescroll_post_nav() {
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'one-page-scroll' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'one-page-scroll' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'one-page-scroll' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'onepagescroll_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function onepagescroll_posted_on() {
	
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( ' on %s', 'post date', 'one-page-scroll' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'Posted by %s', 'post author', 'one-page-scroll' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span>' . '<span class="posted-on">' . $posted_on . '</span>';

}
endif;

if ( ! function_exists( 'onepagescroll_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function onepagescroll_entry_footer() {
	if (! apply_filters( 'onepagescroll_footer_meta', false ) ){
		return;
	}
	echo '<footer class="entry-footer">';
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'one-page-scroll' ) );
		if ( $categories_list && onepagescroll_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'one-page-scroll' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'one-page-scroll' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'one-page-scroll' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'one-page-scroll' ), __( '1 Comment', 'one-page-scroll' ), __( '% Comments', 'one-page-scroll' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'one-page-scroll' ), '<span class="edit-link">', '</span>' );
	echo '</footer><!-- .entry-footer -->';
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function onepagescroll_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'onepagescroll_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'onepagescroll_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Flush out the transients used in onepagescroll_categorized_blog.
 */
function onepagescroll_category_transient_flusher() {
	delete_transient( 'onepagescroll_categories' );
}
add_action( 'edit_category', 'onepagescroll_category_transient_flusher' );
add_action( 'save_post',     'onepagescroll_category_transient_flusher' );