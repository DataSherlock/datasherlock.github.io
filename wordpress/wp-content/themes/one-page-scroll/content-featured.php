<?php
	$menu_status_desktop     = esc_attr(onepagescroll_get_option( 'menu_status_desktop' ));
	$menu_status_tablet      = esc_attr(onepagescroll_get_option( 'menu_status_tablet' ));
	$menu_status_mobile      = esc_attr(onepagescroll_get_option( 'menu_status_mobile' ));
?>
<div class="main_wrap">
  <section class="home-header">
  <?php if ( has_nav_menu( 'home_page_main_menu' ) ) : ?>
    <nav class="site-nav main-menu navbar-nav" id="navbar-collapse" role="navigation">
      <?php wp_nav_menu(array('theme_location'=>'home_page_main_menu','container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','link_before' => '<span>', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));?>
    </nav>
    <?php endif;?>
  </section>
  <section class="sidebar visible sidebar_collapse hide-sidebar desktop-<?php echo $menu_status_desktop;?> tablet-<?php echo $menu_status_tablet;?> mobile-<?php echo $menu_status_mobile;?>">
    <section id="panel-cog"> <i class="fa fa-bars"></i> </section>
    <div class="logo-container">
      <?php 
	  $custom_logo_id = get_theme_mod('custom_logo');
	  $image          = wp_get_attachment_image_src($custom_logo_id , 'full');
	  $logo           = $image[0];
	  if ( $logo != "" ) { ?>
      <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logo); ?>" class="site-logo" alt="<?php bloginfo('name'); ?>" /></a>
      <?php 
		} else{
			?>
      <div class="name-box"> <a href="<?php echo esc_url(home_url('/')); ?>">
        <h2 id="site-title" class="site-title">
          <?php bloginfo('name'); ?>
        </h2>
        </a> <span class="site-description">
        <?php  bloginfo('description');?>
        </span>
        <div class="close-menu hide"><i class="fa fa-bars"></i></div>
      </div>
      <?php }?>
    </div>
    <?php
	$allowedposttags = wp_kses_allowed_html( 'post' );
	$sectionNum      = absint(onepagescroll_get_option('section_num', 4));
	$video_background_section    = absint(onepagescroll_get_option('video_background_section', 0));
	$mp4_video_url   = esc_url(onepagescroll_get_option( 'mp4_video_url' ));
	$ogv_video_url   = esc_url(onepagescroll_get_option( 'ogv_video_url' ));
	$webm_video_url  = esc_url(onepagescroll_get_option( 'webm_video_url' ));
	$poster_url      = esc_url( onepagescroll_get_option( 'poster_url' ));
	$video_loop      = absint(onepagescroll_get_option( 'video_loop',1 ));
	$video_volume    = esc_attr(onepagescroll_get_option( 'video_volume',0.8 ));
	$default_volum   = absint(onepagescroll_get_option('default_volum',10));
	$autoplay        = absint(onepagescroll_get_option('autoplay',1));
	
	$section_title   = array(
							 'Start a Magical Web Design Journey',
							 "Rationes ad Elige HooThemes",
							 "Hec igitur omnia et dux free online elit",
							 "SECTION FOUR"
							 );
	$section_sub_title = array(
								 'Impressive Design & Responsive Layout'
								 );
	$section_content   = array(
								 'Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer sed magna vel velit dignissim luctus eu n urna. Dapibus ege-stas turpis. Praesent faucibus nisl sit amet nulla sollicitudin.<br><div class="section-title">EXILIO A prandio MAGUS WEB Design</div>',
								 '<ul>
          <li>
            <h4>Impressive Design</h4>
            <ul>
              <li>
                <h3>HTML/CSS Design</h3>
                Elegans Lorem Ratio amoena, fons et oculorum captans iconibus conferre haec omnia melius consilium vestri website.
              </li>
              <li>
                <h5>Web Design</h5>
                Hic ex nostra Customers / Clients
              </li>
              <li>
                <h5>PHP Coding</h5>
               Sit at Quid aiunt argumenta nostra
              </li>
            </ul>
          </li>
          <li>
            <h4>SEO</h4>
            <ul>
              <li>
                <h5>Sed efficaciae Pane</h5>
               Dat tibi nostra propositum, potestatem vestri website
              </li>
              <li>
                <h5>Lorem ipsum dolor</h5>
                Tendimus omnes lemma pasco penitus popularis esse compatitur etiam Rimor VIII, IX, X, Aluminium, Incendia, Safari etc.
              </li>
            </ul>
          </li>
          
        </ul>',
		'<div class=" col-sm-6 col-md-4 ">
  <div class="text-center "><i class="fa fa-pie-chart fa-5x"> </i>
    <h3>FEATURE ONE</h3>
    <div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer sed magna vel velit dignissim luctus eu n urna. Dapibus ege-stas turpis. Praesent faucibus nisl sit amet nulla sollicitudin.</p>
      <a href="http://">Read More&gt;&gt;</a></div>
  </div>
  <div class="clear"></div>
</div>
<div class="col-sm-6 col-md-4 ">
  <div class="text-center "><i class="fa fa-line-chart fa-5x"> </i>
    <h3>FEATURE TWO</h3>
    <div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer sed magna vel velit dignissim luctus eu n urna. Dapibus ege-stas turpis. Praesent faucibus nisl sit amet nulla sollicitudin.</p>
      <a href="http://">Read More&gt;&gt;</a></div>
  </div>
  <div class="clear"></div>
</div>
<div class="col-sm-6 col-md-4 ">
  <div class="text-center "><i class="fa fa-comments-o fa-5x"> </i>
    <h3>FEATURE THREE</h3>
    <div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer sed magna vel velit dignissim luctus eu n urna. Dapibus ege-stas turpis. Praesent faucibus nisl sit amet nulla sollicitudin.</p>
      <a href="http://">Read More&gt;&gt;</a></div>
  </div>
  <div class="clear"></div>
</div>
',
'Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer sed magna vel velit dignissim luctus eu n urna. Dapibus ege-stas turpis. Praesent faucibus nisl sit amet nulla sollicitudin.'
								 
								 );
	$section_id    = array("section-one","section-two","section-three","section-four");
	?>
    
     <?php if ( has_nav_menu( 'home_page_sidebar_menu' ) ) : ?>
    <nav id="main_nav" class="main_nav">
      <?php
	   wp_nav_menu(array('theme_location'=>'home_page_sidebar_menu','depth'=>3,'container'=>'','menu_id'=>'home_page_sidebar_menu','menu_class'=>'home_page_sidebar_menu','link_before' => '', 'link_after' => '<span></span>','items_wrap'=> '<ul id="%1$s" class="%2$s">%3$s</ul>'));

?>
    </nav>
     <?php endif;?>
    <div class="side-footer side-footer-collapse">
      <ul class="socialmedia">
        <?php 
				
				for($i=0;$i<9; $i++){
					$social_icon  = onepagescroll_get_option('social_icon_'.$i);
					$social_link  = onepagescroll_get_option('social_link_'.$i);
					$social_title = onepagescroll_get_option('social_title_'.$i);
					$social_icon  = str_replace('fa-','',$social_icon);
					if($social_icon !=""){
					echo '<li><a href="'.esc_url($social_link).'" target="_blank" data-toggle="tooltip" title="'.esc_attr($social_title).'"><i class="fa fa-2x fa-'.esc_attr($social_icon).'"></i></a></li>';
					}
					}
					?>
      </ul>
      <div class="copyright">&copy; <?php echo date("Y");?>, <?php printf(__('Powered by <a href="%1$s">WordPress</a>. Designed by <a href="%2$s">HooThemes</a>.','one-page-scroll'),esc_url('http://wordpress.org/'),esc_url('http://www.hoothemes.com/'));?></div>
    </div>
  </section>
  <!--- sidebar ends -->
  <section class="content_wrap homepage_content_wrap content-desktop-<?php echo $menu_status_desktop;?> content-tablet-<?php echo $menu_status_tablet;?> content-mobile-<?php echo $menu_status_mobile;?>" style=" margin-left:0;">
    <section class="header-image">
      <?php get_custom_header_markup();?>
    </section>
    <?php
	  if(  $sectionNum > 0 ) { 
		    for( $i=0; $i<$sectionNum; $i++ ){
				
				$hide =  absint( onepagescroll_get_option('section_hide_'.$i) );
				
				if($hide=='1')
					continue;
				
				if(!isset($section_title[$i])){$section_title[$i] = "";}
				if(!isset($section_sub_title[$i])){$section_sub_title[$i] = "";}
				if(!isset($section_content[$i])){$section_content[$i] = "";}
				
				$title        =  esc_attr( onepagescroll_get_option('section_title_'.$i, $section_title[$i]));
				$sub_title    =  esc_attr( onepagescroll_get_option('section_sub_title_'.$i, $section_sub_title[$i]));
				$class        =  esc_attr( onepagescroll_get_option('section_css_class_'.$i, ''));
				$content	  =  onepagescroll_get_option('section_content_'.$i, $section_content[$i]);
				$menu_id      =  esc_attr( onepagescroll_get_option('section_id_'.$i, $section_id[$i] ) );
				
				
				if( $menu_id =='' )
				  $menu_id    =  'section-'.($i+1);
				  
			  // video background
			$background_video = '';
			$play_button      = '';
			if( $video_background_section > 0 && $video_background_section == ($i+1) ){
					
					
			 if( $video_loop == 1 ){
			$video_loop = "true";
			}
			else{
			$video_loop = "false";	
				}
			$class .= " section-video-background";
			$background_video   = array("mp4_video_url"=>$mp4_video_url,"webm_video_url"=>$webm_video_url,"ogv_video_url"=>$ogv_video_url,"loop"=>$video_loop,"volume"=>$video_volume,"poster_url"=>$poster_url,"container"=>'.onepagescroll-section-'.($i+1),"volume"=>$video_volume,"autoplay"=>$autoplay);
			wp_localize_script( 'jquery-videobackground', 'background_video',$background_video);
			$background = "";
			$play_button     = '<span class="play-video hide"><i class="fa fa-play-circle"></i></span>';  
			
					}
				?>
    <section id="<?php echo $menu_id;?>" class="section onepagescroll-section-<?php echo ($i+1);?> section-<?php echo $menu_id;?> <?php echo $class;?>">
      <div class="section-content-wrap">
        <div class="section-title">
          <?php if ( $title !='' ): ?>
          <h3><?php echo $title;?></h3>
          <?php endif; ?>
          <?php if ( $sub_title !='' ): ?>
          <h3 class="section-sub-title"><?php echo $sub_title;?></h3>
          <?php endif; ?>
        </div>
        <div class="section-content"> <?php echo do_shortcode( wp_kses( $content , $allowedposttags ) );?>
          <div class="clear"></div>
        </div>
      </div>
      <?php echo $play_button;?> </section>
    <?php }
	  }?>
  </section>
  <!--- content_wrap ends --> 
</div>
