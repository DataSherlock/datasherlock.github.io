<?php
/**
 * Template Name: Home Page
 *
 */
	get_header("featured");
	global $allowedposttags;
	 
	$allowedposttags['iframe'] = array(
		  'align' => true,
		  'width' => true,
		  'height' => true,
		  'frameborder' => true,
		  'name' => true,
		  'src' => true,
		  'id' => true,
		  'class' => true,
		  'style' => true,
		  'scrolling' => true,
		  'marginwidth' => true,
		  'marginheight' => true,
	  
	  );
	 $detect               = new Mobile_Detect;
	 $hide_scroll_bar      = singlepage_option('hide_scroll_bar');
	 $section_height_mode  = singlepage_option('section_height_mode');
	 
	  $video_background_section  = singlepage_option( 'video_background_section');
	  $mp4_video_url       = esc_url( singlepage_option( 'mp4_video_url' ) );
	  $ogv_video_url       = esc_url( singlepage_option( 'ogv_video_url' ));
	  $webm_video_url      = esc_url( singlepage_option( 'webm_video_url' ));
	  $poster_url          = esc_url( singlepage_option( 'poster_url' ));
	  $video_loop          = esc_attr( singlepage_option( 'video_loop' ));
	  $video_volume        = esc_attr( singlepage_option( 'video_volume' ));
	  $video_volume        = $video_volume == "" ? 0.8 : $video_volume ;
	  
	  $google_map_section  = singlepage_option( 'google_map_section');
	  $google_map_address  = esc_attr( singlepage_option( 'google_map_address'));
	  $google_map_zoom     = absint( singlepage_option( 'google_map_zoom'));
	  
	  $menu_style_desktop   = absint( singlepage_option( 'menu_style_desktop'));
	  $menu_status_desktop  = esc_attr( singlepage_option( 'menu_status_desktop'));
	  $menu_style_tablet    = absint( singlepage_option( 'menu_style_tablet'));
	  $menu_status_tablet   = esc_attr( singlepage_option( 'menu_status_tablet'));
	  $menu_style_mobile    = absint( singlepage_option( 'menu_style_mobile'));
	  $menu_status_mobile   = esc_attr( singlepage_option( 'menu_status_mobile'));
	  
	  $menu_style   = $menu_style_desktop;
	  $menu_status  = $menu_status_desktop;
	  
	  if( $detect->isTablet() ){
         $menu_style  = $menu_style_tablet;
		 $menu_status = $menu_status_tablet;
	   }
	  if( $detect->isMobile() && !$detect->isTablet() ){
		 $menu_style  = $menu_style_mobile;
		 $menu_status = $menu_status_mobile;
	  }
	
	$output   = "";
	$sub_nav  = "";
	$j        = 0;
	$sections = singlepage_get_sections(array(0,1,2,3,4,5));

	if( is_array( $sections ) ) { 
		foreach( $sections as $key=>$i ){
			$section_hide = singlepage_option('section_hide_'.$i );
			if($section_hide == '1')
				continue;
			
			$section_full_width =  singlepage_option('section_fullwidth_'.$i );
			$section_title      =  singlepage_option('section_title_'.$i );
			$menu_title         =  singlepage_option('section_menu_title_'.$i );
			$menu_slug          =  singlepage_option('section_menu_slug_'.$i );
			if( !$menu_slug )
				$menu_slug =  'section-'.($i+1);
			
			$class             =  singlepage_option('section_css_class_'.$i) ;
			$image  	       =  singlepage_option('section_image_'.$i) ;
			$image_link        =  singlepage_option('section_image_link_'.$i) ;
			$image_link_target =  singlepage_option('section_image_link_target_'.$i) ;
			
			$content	       =  singlepage_option('section_content_'.$i);
			$content_color     =  singlepage_option('section_content_color_'.$i) ;
			
			if($section_title!='')
				$content = '<h1 class="section-title">'.$section_title.'</h1>'.$content;
			
			$class                     .= ' home_section_'.$i;
			$content_style              = '';
			$background                 = '';
			$section_content_background =  singlepage_option( 'section_content_background_'.$i);
			$border_radius	            =  singlepage_option('border_radius_'.$i);
			$opacity    	            =  singlepage_option('opacity_'.$i);
		
			if( $section_content_background ){
				$rgb = singlepage_hex2rgb( $section_content_background );
				$content_style .= "background-color: rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",".$opacity.");";
				$content_style .= 'border-radius: '.$border_radius.';-moz-border-radius: '.$border_radius.';-webkit-border-radius: '.$border_radius.';';
			}
			
			//$section_content_typography = singlepage_option("section_content_typography_".$i);
			//if( $section_content_typography )
			//$content_style .= singlepage_options_typography_font_styles2($section_content_typography );
			
			$cur = "";
			if( $j==0 )
				$cur  = "cur";
			$sub_nav .= '<li class="'.$cur.'"><a id="nav-'.$menu_slug.'" href="#'.$menu_slug.'">'.esc_attr($menu_title).'</a></li>';

			//if( $content_color  != "" ) $content_color = 'color:'.esc_attr($content_color).';';
			$video_enable = 0;
			  
			if(  $video_background_section == ($i+1) && !$detect->isMobile() && !$detect->isTablet() ){
				$video_enable = 1;  
				$class       .= " singlepage-video-section";
				$background   = "background:none;";
			  }
			 
			if( $google_map_section == ($i+1) ){
				  
				$class       .= " singlepage-google-map-section";
				$google_map   = array("google_map_address"=>$google_map_address,"google_map_zoom"=>$google_map_zoom,"google_map_wrap"=>$menu_slug);
				wp_localize_script( 'singlepage-main', 'singlepage_google_map',$google_map);
				$background   = "background:none;";
				  
			}
			 
			if( $section_full_width == 1){
				   
				$output .= '<section class="section '.esc_attr($class).'" style="'.$background.'" id="'.$menu_slug.'"><div class="section-wrap">
					<div class="section-full-content" style="'.$content_style.'">'.do_shortcode( wp_kses( $content , $allowedposttags ) ).'</div>';
				
			if( $image!='' ){
				if( $image_link !='' ){
						$output .= '<a href="'.esc_url($image_link).'"  style=" display:black;" target="'.esc_attr($image_link_target).'"><div class="section-image" style="background-image:url('.esc_url($image).')"></div></a>';
						}else{
						$output .= '<div class="section-image" style="background-image:url('.esc_url($image).')"></div>';
					}
				}
				
				$output .= '<div class="clear"></div></div></section>';
				   
				   }else{
			   $output .= '<section class="section section-boxed '.esc_attr($class).'" style="'.$background.'" id="'.$menu_slug.'"><div class="section-wrap">
			   <div class="container">
				<div class="section-inner">
					<div class="section-content" style="'.$content_style.'">'.do_shortcode( wp_kses( $content , $allowedposttags ) ).'</div>';
				
				if( $image!='' ){
					if( $image_link !='' ){
						$output .= '<a href="'.esc_url($image_link).'"  style=" display:black;" target="'.esc_attr($image_link_target).'"><div class="section-image" style="background-image:url('.esc_url($image).')"></div></a>';
						}else{
						$output .= '<div class="section-image" style="background-image:url('.esc_url($image).')"></div>';
					}
				}
				
				$output .= '</div>
				  <div class="clear"></div>
				</div></div>
				</section>';
				
			   }
			
				
	 
			$j++;
		  }
		  
		  if( $video_enable == 1 ){
				 
				if( $video_loop == 1 ){
					$video_loop = 'true';
				}else{
					$video_loop = 'false';	
				}
			 
			 $background_video  = array("video_loop"=>$video_loop,"mp4_video_url"=>$mp4_video_url,"webm_video_url"=>$webm_video_url,"ogv_video_url"=>$ogv_video_url,'poster_url'=>$poster_url,'video_volume' => $video_volume);
			
			  wp_localize_script( 'singlepage-main', 'singlepage_video',$background_video);
			 }
			 
		}
		?>
         <?php 
		if( is_array( $sections ) && $menu_style == '1' && $menu_status == 'open' ){
			$class = 'sub_nav_style1';
			if($hide_scroll_bar =='1'){
				$class .= ' hide';
			}
		?>
        <div id="sub_nav" class="<?php echo $class;?>">
        <div id="sub_nav_<?php echo $section_height_mode;?>" class="sub_nav">
		<ul><?php echo $sub_nav;?></ul>
	      </div></div>
        <?php }?>
        <?php if( is_array($sections ) && $menu_style == '2' ){
			$hide_sidebar = '';
			if( $menu_status == 'close' )
			$hide_sidebar = 'hide-sidebar';
			
			$class = 'sub_nav_style2';
			if($hide_scroll_bar =='1'){
				$class .= ' hide';
			}
			?>
        <div id="sub_nav" class="<?php echo $class;?>">
	<div id="sub_nav_<?php echo $section_height_mode;?>" class="sub_nav <?php echo $hide_sidebar;?>">
     <span id="panel-cog">
			<i class="fa fa-bars"></i>
		</span>
		<ul><?php echo $sub_nav;?></ul>
	</div>
    </div>
     <?php }?>
    <?php
	$featured_homepage_sidebar = singlepage_option( 'featured_homepage_sidebar' );
	if( $featured_homepage_sidebar != '' ){
		echo '<div class="widget"><div class="widget_area">'.do_shortcode( wp_kses( $featured_homepage_sidebar , $allowedposttags ) ).'</div></div>';
		}
	if( is_active_sidebar( 'homepage' ) || $featured_homepage_sidebar != '' ) {
		echo '<div class="widget"><div class="widget_area">';
		if( $featured_homepage_sidebar != '' ){
			echo do_shortcode( wp_kses( $featured_homepage_sidebar , $allowedposttags ) );
		}
		if( is_active_sidebar( 'homepage' ))
	 		dynamic_sidebar('homepage');
		
		echo '</div></div>';
	 }
      
	 ?>
	<div class="content">
  <?php echo $output;?>
  <div class="clear"></div>
	</div>
   <?php 
    $youtube_video_background_section = absint(singlepage_option( 'youtube_video_background_section' ));
	$youtube_video                    = esc_attr(singlepage_option( 'youtube_video' ));
	$youtube_video_loop               = esc_attr(singlepage_option( 'youtube_video_loop' ));
	$youtube_video_mute               =esc_attr( singlepage_option( 'youtube_video_mute' ));
	$youtube_show_controls            = esc_attr(singlepage_option( 'youtube_show_controls'  ));
	$youtube_start_at                 = absint(singlepage_option( 'youtube_start_at' ));
	$youtube_show_controls            = $youtube_show_controls ==''?'true':$youtube_show_controls ;
	if( $youtube_video_background_section > 0 && $youtube_video != '' ):
    ?>
    <div id="home_youtube_video" class="player" data-property="{videoURL:'<?php echo $youtube_video;?>',containment:'.home_section_<?php echo $youtube_video_background_section-1;?>', showControls:<?php echo $youtube_show_controls;?>, autoPlay:true, loop:<?php echo $youtube_video_loop;?>, mute:<?php echo $youtube_video_mute;?>, startAt:<?php echo $youtube_start_at;?>, opacity:1, addRaster:true, quality:'default'}">&nbsp;</div> 
    <?php endif;?>
    
<?php
get_footer();