<?php
/**
 * Front page template for theme
 */

get_header();
$page_layout = onepagescroll_get_option('post_layout');
		 
$content_class = "";
$sidebar_class = "";
$content_width = 9;
$sidebar_width = 3;
if( $page_layout  == "left-sidebar" ){
	$content_class = "floatright";
	$sidebar_class = "floatleft";
}
if( $page_layout == "right-sidebar" ){
	$content_class = "floatleft";
	$sidebar_class = "floatright";
}
if( $page_layout == "full-width" || $page_layout == "" )
	$content_width = 12;
?>

<div class="main_wrap">
  <section>
    <div class="posts-container">
        <div class="row">
    <div class="col-md-<?php echo $content_width;?> <?php echo $content_class;?>">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>

			<?php onepagescroll_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
        </div>
        <?php if( $page_layout == "left-sidebar" || $page_layout == "right-sidebar" ):?>
    <div class="col-md-<?php echo $sidebar_width;?> <?php echo $sidebar_class;?>">
      <aside class="sidebar-page">
        <div class="widget-area">
          <?php get_sidebar("post");?>
        </div>
      </aside>
    </div>
    <?php endif;?>
        
        </div>
        
        </div>
  </section>

</div>
<?php
get_footer();