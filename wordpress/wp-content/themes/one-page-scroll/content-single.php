<?php
/**
 * @package onepagescroll
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		<div class="entry-meta">
			<?php onepagescroll_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
		the_content();
		
		the_posts_pagination( array(
					'prev_text' => '<i class="fa fa-arrow-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'one-page-scroll' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'one-page-scroll' ) . '</span><i class="fa fa-arrow-right"></i>' ,
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'one-page-scroll' ) . ' </span>',
				) );
		
		 ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php onepagescroll_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
