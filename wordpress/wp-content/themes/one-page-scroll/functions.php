<?php


function onepagescroll_get_option_saved( $name, $default = false ) {

	$option_name = onepagescroll_option_name();
	// Get option settings from database
	$options = get_option( $option_name );

	// Return specific option
	if ( isset( $options[$name] ) ) {
		return $options[$name];
	}

	return $default;
}

function onepagescroll_get_option( $name, $default = false ) {

	$option_name = onepagescroll_option_name();
	// Get option settings from database
	$options = get_option( $option_name );

	// Return specific option
	if ( isset( $options[$name] ) ) {
		return $options[$name];
	}else{
		$options = onepagescroll_library_options( );
		if ( isset( $options['one_page_scroll['.$name.']']) && isset( $options['one_page_scroll['.$name.']']['default']) ) {
			return $options['one_page_scroll['.$name.']']['default'];
		}
		}

	return $default;
}



function onepagescroll_option_name() {
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	if( is_child_theme() ){	
		$themename = str_replace("_child","",$themename );
		}
	$themename_lan = $themename;
	
	if( defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE != 'en' )
	$themename_lan = $themename.'_'.ICL_LANGUAGE_CODE;
	
	if(function_exists('pll_current_language')){
	$default_lan = pll_default_language('slug');
	$current_lan = pll_current_language('slug');
	if($current_lan !='' && $default_lan != $current_lan)
	$themename_lan = $themename.'_'.$current_lan;
	}
	return $themename_lan;
}


require_once dirname( __FILE__ ) . '/lib/customizer/customizer-library.php';
require_once dirname( __FILE__ ) . '/lib/customizer/options.php';


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! function_exists( 'onepagescroll_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 */
function onepagescroll_setup() {
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 860; /* pixels */
	}

	load_theme_textdomain( 'one-page-scroll' );

	// Add default posts and comments RSS feed links to head.
	add_editor_style("editor-style.css");
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( "title-tag" );
	add_theme_support( 'custom-logo' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'home_page_sidebar_menu' => __( 'Homepage Template Sidebar Menu', 'one-page-scroll' ),
		'home_page_main_menu' => __( 'Homepage Template Main Menu', 'one-page-scroll' ),
		'primary' => __( 'Primary Menu', 'one-page-scroll' ),
	) );
	
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', onepagescroll_supported_post_formats() );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'onepagescroll_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Setup the WordPress core custom header feature.
	add_theme_support( 'custom-header', array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => '1920',
		'height'                 => '250',
		'flex-height'            => true,
		'flex-width'             => true,
		'default-text-color'     => 'fe8a02',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
		
	)); 
}
endif;

add_action( 'after_setup_theme', 'onepagescroll_setup' );

function onepagescroll_supported_post_formats(){
    // Core formats as example
    $default = array( 'link', 'image', 'quote' );
    $formats = wp_parse_args( $default, (array)apply_filters( 'theme_formats', array() ) );
    
    return $formats;
}

/**
 * Register widget area.
 */
function onepagescroll_widgets_init() {
	register_sidebar(array(
			'name' => __('Default Blog Sidebar', 'one-page-scroll'),
			'description' =>  __('Default blog sidebar, display when Blog Sidebar is not been activated.', 'one-page-scroll'),
			'id'   => 'default_sidebar',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h2 class="widget-title">', 
			'after_title' => '</h2>' 
			));

		register_sidebar(array(
			'name' => __('Blog Sidebar', 'one-page-scroll'),
			'id'   => 'blog',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h2 class="widget-title">', 
			'after_title' => '</h2>' 
			));
		register_sidebar(array(
			'name' => __('Page Sidebar', 'one-page-scroll'),
			'id'   => 'page',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h2 class="widget-title">', 
			'after_title' => '</h2>' 
			));
}
add_action( 'widgets_init', 'onepagescroll_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function onepagescroll_scripts() {
	global $is_IE;
	$theme_info = wp_get_theme();
	wp_enqueue_style( 'onepagescroll-Open-Sans', esc_url('//fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,700'), false, '', false);
	wp_enqueue_style( 'font-awesome',  get_template_directory_uri() .'/plugins/font-awesome/css/font-awesome.min.css', false, '4.4.0', false);
	wp_enqueue_style( 'bootstrap',  get_template_directory_uri() .'/plugins/bootstrap/css/bootstrap.css', false, '3.3.7', false);
	wp_enqueue_style( 'jquery-prettyphoto', get_template_directory_uri() . '/plugins/jquery-prettyPhoto/prettyPhoto.css', false, '3.1.5', false);
		
	wp_enqueue_style( 'onepagescroll-main', get_stylesheet_uri(), array(), $theme_info->get( 'Version' ) );
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/plugins/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', false );
	wp_enqueue_script( 'respond', get_template_directory_uri().'/plugins/respond.min.js', array( 'jquery' ), '1.4.2', false );
	wp_enqueue_script( 'modernizr-custom', get_template_directory_uri().'/plugins/modernizr.custom.js', array( 'jquery' ), '2.8.2', false );
	wp_enqueue_script( 'jquery-nav', get_template_directory_uri().'/plugins/jquery.nav.js', array( 'jquery' ), '3.0.0', false );
	
	$video_background_section    = absint(onepagescroll_get_option('video_background_section', 0));
	if( $video_background_section > 0 )
	wp_enqueue_script( 'jquery-videobackground', get_template_directory_uri().'/plugins/jquery.videobackground.js', array( 'jquery' ),'', true );
	wp_enqueue_script( 'jquery-prettyphoto', get_template_directory_uri().'/plugins/jquery-prettyPhoto/jquery.prettyPhoto.js', array( 'jquery' ), '3.1.5', true );
	wp_enqueue_script( 'onepagescroll-main', get_template_directory_uri().'/js/common.js', array( 'jquery','jquery-ui-core' ), $theme_info->get( 'Version' ), true );
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	$sidebar_width = absint( onepagescroll_get_option( 'sidebar_width','280'));
	
	if( !is_numeric($sidebar_width) || $sidebar_width <=0 ){
		$sidebar_width = 280;
	}
	
	 $onepagescroll_custom_css = '';
	 
	if ( 'blank' != get_header_textcolor() && '' != get_header_textcolor() ){
		$header_color =  ' color:#' . get_header_textcolor() . ';';
		$onepagescroll_custom_css .=  '.site-name,.site-title,.site-tagline,.site-description{'.$header_color.'}';
	}else{
		$onepagescroll_custom_css .=  '.site-name,.site-title,.site-tagline,.site-description{display:none;}';
	}
		
	$sectionNum               = absint(onepagescroll_get_option('section_num', 4));
	$section_id               = array("section-one","section-two","section-three","section-four");
	 
	$section_background = array(
	     array(
		'color' => '#ffcc44',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'fixed' ),
		 array(
		'color' => '#ff415b',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'fixed' ),
		 array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'fixed' ),
		 array(
		'color' => '#2a8fbd',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'fixed' )
	);
	  
	$section_content_typography_std = array(
		array( 'size' => '16px', 'face' => 'Open Sans, sans-serif', 'color' => '#ffffff','style'=>300),
		array( 'size' => '16px', 'face' => 'Open Sans, sans-serif', 'color' => '#ffffff','style'=>300),
		array( 'size' => '16px', 'face' => 'Open Sans, sans-serif', 'color' => '#333333','style'=>300),
		array( 'size' => '16px', 'face' => 'Open Sans, sans-serif', 'color' => '#ffffff','style'=>300)
	);
	  
	if( $sectionNum > 0 ) { 
		 for( $i=0; $i<$sectionNum; $i++ ){ 
			if(!isset($section_id[$i])){$section_id[$i] = "";}
			if(!isset($section_background[$i])){$section_background[$i] = "";}
			
			if(!isset($section_content_typography_std[$i])){$section_content_typography_std[$i] = array( 'size' => '16px', 'face' => 'Open Sans, sans-serif', 'color' => '#ffffff','style'=>300);}
			
			 $section_background_       = onepagescroll_get_option( 'section_background_'.$i,$section_background[$i]);
             $background                = onepagescroll_get_background( $section_background_ );
			
			$menu_id      =  esc_attr( onepagescroll_get_option('section_id_'.$i, $section_id[$i] ) );
		    if( $menu_id =='' )
			  $menu_id    =  'section-'.($i+1);
			  
			   $onepagescroll_custom_css      .= 'section#'.$menu_id.'{'.$background.'}';
			   
			  $section_title_typography       = onepagescroll_get_option("section_title_typography_".$i,array( 'size' => '30px', 'face' => 'Open Sans, sans-serif', 'color' => '#333333','style'=>400));
			  $onepagescroll_custom_css      .= onepagescroll_options_typography_font_styles($section_title_typography,'section#'.$menu_id.' .section-title h3' );
			  
			  $section_sub_title_typography   = onepagescroll_get_option("section_sub_title_typography_".$i,array( 'size' => '36px', 'face' => 'Open Sans, sans-serif', 'color' => '#ffffff','style'=>700));
			  $onepagescroll_custom_css      .= onepagescroll_options_typography_font_styles($section_sub_title_typography ,'section#'.$menu_id.' h3.section-sub-title');
			  
			  $section_content_typography     = onepagescroll_get_option("section_content_typography_".$i,$section_content_typography_std[$i]);
			  $onepagescroll_custom_css      .= onepagescroll_options_typography_font_styles($section_content_typography,'section#'.$menu_id.' .section-content,section#'.$menu_id.' .section-content p' );
			  
			}
	}

	 $content_link_color         =  esc_attr( onepagescroll_get_option( 'content_link_color','#a29c9a'));
	 $content_link_hover_color   =  esc_attr( onepagescroll_get_option( 'content_link_hover_color','#fe8a02'));
     $onepagescroll_custom_css  .= '.entry-content a{color:'.$content_link_color.'}';
	 $onepagescroll_custom_css  .= '.entry-content a:hover{color:'.$content_link_hover_color.'}';
	 
	 $page_menu_typography      = onepagescroll_get_option("page_menu_typography",array( 'size' => '14px', 'face' => 'Open Sans, sans-serif', 'color' => '#c2d5eb','style'=>300));
     $onepagescroll_custom_css .= onepagescroll_options_typography_font_styles($page_menu_typography ,'.page  .site-nav > ul > li > a');
	 
	
	$page_nav_menu_hover_color   =  esc_attr( onepagescroll_get_option( 'home_nav_menu_hover_color','#fe8a02'));
	$onepagescroll_custom_css   .= '
		.page nav.site-nav > ul > li.current-post-ancestor > a,
		.page nav.site-nav > ul > li.current-menu-parent > a,
		.page nav.site-nav > ul > li.current-menu-item > a,
		.page nav.site-nav > ul > li.current_page_item > a,
		.page nav.site-nav > ul > li a:hover{color:'.$page_nav_menu_hover_color.'}';
	 
	$blog_menu_typography      = onepagescroll_get_option("blog_menu_typography",array( 'size' => '14px', 'face' => 'Open Sans, sans-serif', 'color' => '#666666','style'=>300));
	$onepagescroll_custom_css .= onepagescroll_options_typography_font_styles($blog_menu_typography ,'.blog header .site-nav > ul > li > a');
	 
	$blog_menu_hover_color     =  esc_attr( onepagescroll_get_option( 'blog_menu_hover_color','#d54e21'));
	$onepagescroll_custom_css .= '
		.blog header nav > ul > li.current-post-ancestor > a,
		.blog header nav > ul > li.current-menu-parent > a,
		.blog header nav > ul > li.current-menu-item > a,
		.blog header nav > ul > li.current_page_item > a,
		.blog header nav > ul > li a:hover,
		.nav .cur > a,
		.blog header .main_nav li.current a{color:'.$blog_menu_hover_color.'}';
	 
	 $homepage_side_nav_menu_typography = onepagescroll_get_option("homepage_side_nav_menu_typography",array( 'size' => '14px', 'face' => 'Open Sans, sans-serif', 'color' => '#666666','style'=>400));
     $onepagescroll_custom_css .= onepagescroll_options_typography_font_styles($homepage_side_nav_menu_typography ,'.home ul.home_page_sidebar_menu > li > a');
	 
	 $home_side_nav_menu_active_color   =  esc_attr( onepagescroll_get_option( 'home_side_nav_menu_active_color','#ffcc33'));
     $onepagescroll_custom_css  .= '.home ul.home_page_sidebar_menu > li.active > a{color:'.$home_side_nav_menu_active_color.'}';
	 
	 
	 $page_post_content_typography = onepagescroll_get_option("page_post_content_typography",array( 'size' => '13px', 'face' => 'Open Sans, sans-serif', 'color' => '#555555','style'=>400));
	 $onepagescroll_custom_css    .= onepagescroll_options_typography_font_styles($page_post_content_typography ,'.entry-content');
	 
	 $onepagescroll_custom_css   .= ".sidebar{width: ".($sidebar_width)."px;}";
	 $onepagescroll_custom_css   .= ".content_wrap{margin-left: ".$sidebar_width."px;}";
	 $onepagescroll_custom_css   .= ".sidebar.hide-sidebar{left: -".($sidebar_width)."px;}";
	 
	 $onepagescroll_custom_css   .= ".main_nav li span{
	 transform: translate(".($sidebar_width)."px,0);
	-ms-transform: translate(".($sidebar_width)."px,0); 
	-webkit-transform: translate(".($sidebar_width)."px,0); 
	 }";
	 

	// Escap whole output string
	 $onepagescroll_custom_css = wp_filter_nohtml_kses( $onepagescroll_custom_css );
	 
	$onepagescroll_custom_css = str_replace( '&gt;', '>',$onepagescroll_custom_css );
	 
	wp_add_inline_style( 'onepagescroll-main', $onepagescroll_custom_css );
	
	$scrollspeed          = absint(onepagescroll_get_option( "scrollspeed" ,750));
	$menu_status_desktop  = esc_attr( onepagescroll_get_option( 'menu_status_desktop'));
	$menu_status_tablet   = esc_attr( onepagescroll_get_option( 'menu_status_tablet'));
	$menu_status_mobile   = esc_attr( onepagescroll_get_option( 'menu_status_mobile'));
	
	$is_customizer_preview = 0;
		if(function_exists('is_customize_preview') && is_customize_preview())
			$is_customizer_preview = 1;

	wp_localize_script( 'onepagescroll-main', 'onepagescroll_params', array(
			'ajaxurl' => admin_url('admin-ajax.php'),
			'themeurl' => get_template_directory_uri(),
			'scrollspeed'  => $scrollspeed,
			'sidebar_width' => $sidebar_width,
			'menu_status_desktop' => $menu_status_desktop,
			'menu_status_tablet' => $menu_status_tablet,
			'menu_status_mobile' => $menu_status_mobile,
			'is_customizer_preview' => $is_customizer_preview,
			
		)  );
}

 function onepagescroll_admin_scripts(){
	 
	 if(isset($_GET['page']) && $_GET['page'] == 'onepagescroll-options'){
		 
		$option_name = onepagescroll_option_name();
		 
		$theme_info = wp_get_theme();
		wp_enqueue_style( 'font-awesome',  get_template_directory_uri() .'/plugins/font-awesome/css/font-awesome.min.css', false, '4.7.0', false);
		wp_enqueue_style('onepagescroll-admin',  get_template_directory_uri() .'/css/admin.css', false,  $theme_info->get( 'Version' ), false);
		wp_enqueue_style('onepagescroll-options',  get_template_directory_uri() .'/css/options.css', false, $theme_info->get( 'Version' ), false);
		wp_enqueue_script( 'onepagescroll-admin', get_template_directory_uri().'/js/admin.js', array( 'jquery' ), $theme_info->get( 'Version' ), true );
		
		
		wp_localize_script( 'onepagescroll-admin', 'onepagescroll_params', array(
			'ajaxurl' => admin_url('admin-ajax.php'),
			'themeurl' => get_template_directory_uri(),
			'option_name' => $option_name,
		)  );
	
	 }
  }
  
add_action( 'wp_enqueue_scripts', 'onepagescroll_scripts' );
add_action( 'admin_enqueue_scripts', 'onepagescroll_admin_scripts' );

function onepagescroll_register_blogname_partials($wp_customize){
$wp_customize->selective_refresh->add_partial( 'header_site_title', array(
		'selector' => '.site-title,.site-name',
		'settings' => array( 'blogname' ),
	) );
	
	$wp_customize->selective_refresh->add_partial( 'header_site_description', array(
		'selector' => '.site-description,.site-tagline',
		'settings' => array( 'blogdescription' ),
	) );
	
}
add_action( 'customize_register', 'onepagescroll_register_blogname_partials' );

function onepagescroll_customize_control() {
	$sidebar_width        = absint( onepagescroll_get_option( 'sidebar_width'));
    wp_enqueue_script( 'onepagescroll_customizer_control', get_template_directory_uri() . '/js/customizer-control.js', array( 'customize-controls', 'jquery' ), null, true );
	wp_localize_script( 'onepagescroll_customizer_control', 'ops_customizer_params', array(
			'sidebar_width' => $sidebar_width,
			
		)  );

}
add_action( 'customize_controls_enqueue_scripts', 'onepagescroll_customize_control' );


function onepagescroll_customizer_live_preview()
{
	$sidebar_width        = absint( onepagescroll_get_option( 'sidebar_width'));
	
	wp_enqueue_script( 
		  'onepagescroll_customizer_live_preview',
		  get_template_directory_uri().'/js/customizer-preview.js',
		  array( 'jquery','customize-preview' ),
		  '',
		  true
	);
	wp_localize_script( 'onepagescroll_customizer_live_preview', 'ops_customizer_params', array(
			'sidebar_width' => $sidebar_width,
			
		)  );
}
add_action( 'customize_preview_init', 'onepagescroll_customizer_live_preview' );



require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/inc/breadcrumbs.php';
