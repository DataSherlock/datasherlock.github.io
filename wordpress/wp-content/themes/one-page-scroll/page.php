<?php
/**
 * The template for displaying all pages.
 * @package onepagescroll
 */

get_header('page');
$page_layout = onepagescroll_get_option('page_layout');
		 
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
<div class="page-container">
<div class="container">
  <div class="breadcrumb-box">
            <?php onepagescroll_breadcrumbs(array("before"=>"","show_browse"=>false));?>
        </div>
   <div class="row">
    <div class="col-md-<?php echo $content_width;?> <?php echo $content_class;?>">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div>
    <?php if( $page_layout == "left-sidebar" || $page_layout == "right-sidebar" ):?>
    <div class="col-md-<?php echo $sidebar_width;?> <?php echo $sidebar_class;?>">
      <aside class="sidebar-page">
        <div class="widget-area">
          <?php get_sidebar("page");?>
        </div>
      </aside>
    </div>
    <?php endif;?>
    </div>
</div>
</div>
<?php get_footer('page'); ?>
