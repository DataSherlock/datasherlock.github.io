<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<section class="header-image">
  <?php get_custom_header_markup();?>
</section>
<header class="navbar navbar-onex">
  <div class="container">
    <div class="nav navbar-header">
      <div class="logo-container text-left">
        <?php
		$custom_logo_id = get_theme_mod('custom_logo');
		$image          = wp_get_attachment_image_src($custom_logo_id , 'full');
		$logo           = $image[0];
		if( !$logo )
			$logo = onepagescroll_get_option('logo');
		 ?>
        <?php if ($logo != "") { ?>
        <a href="<?php echo esc_url(home_url('/')); ?>"> <img src="<?php echo esc_url($logo); ?>" class="site-logo" alt="<?php bloginfo('name'); ?>" /> </a>
        <?php } else{?>
        <div class="name-box">
          <?php if ( 'blank' != get_header_textcolor() && '' != get_header_textcolor() ){?>
          <a href="<?php echo esc_url(home_url('/')); ?>">
          <h2 class="site-name">
            <?php bloginfo('name'); ?>
          </h2>
          </a><br />
          <span class="site-tagline">
          <?php  bloginfo('description');?>
          </span>
          <?php }?>
        </div>
        <?php }?>
      </div>
      <button type="button" class="navbar-toggle site-nav-toggle" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only">
      <?php _e('Toggle navigation','one-page-scroll');?>
      </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <?php if ( has_nav_menu( 'primary' ) ) : ?>
      <nav class="site-nav main-menu navbar-nav" id="navbar-collapse" role="navigation">
        <?php wp_nav_menu(array('theme_location'=>'primary','container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','link_before' => '<span>', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));?>
      </nav>
      <?php endif;?>
    </div>
  </div>
</header>
