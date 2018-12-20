<?php

function onepagescroll_library_options() {
	
	$os_faces = array(
       'Open Sans, sans-serif' => 'Open Sans',
      'Arial, sans-serif' => 'Arial',

      '"Avant Garde", sans-serif' => 'Avant Garde',

      'Cambria, Georgia, serif' => 'Cambria',

      'Copse, sans-serif' => 'Copse',

      'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',

      'Georgia, serif' => 'Georgia',

      '"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',

      'Tahoma, Geneva, sans-serif' => 'Tahoma'

  );
  for($i=9;$i<=70;$i++){
 	 $font_size[$i.'px'] = $i.'px';
  }

	// Theme defaults
	$primary_color = '#5bc08c';
	$secondary_color = '#666';
	// Stores all the controls that will be added
	$options = array();
	// Stores all the sections to be added
	$sections = array();
	// Stores all the panels to be added
	$panels = array();
	
	// Adds the sections to the $options array
	$options['sections'] = $sections;
	
	$panel = 'home-page';
	$panels[] = array(
		'id' => $panel,
		'title' => __( 'OPS: Home Page Settings', 'one-page-scroll' ),
		'priority' => '10'
	);
	
	$section = 'home-page-general';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'General Options', 'one-page-scroll' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
	
	$section_num = absint(onepagescroll_get_option_saved( 'section_num', 4 ));
	$video_background_section = array('0'=>__('No video background', 'one-page-scroll'));
		if( is_numeric( $section_num ) ){
		for($i=1; $i <= $section_num; $i++){
			$video_background_section[$i] = sprintf(__('Section %d','one-page-scroll'),$i);
			}
		}
		
	
	$options['one_page_scroll[scrollspeed]'] = array(
		'id' => 'one_page_scroll[scrollspeed]',
		'label'   => __( 'Front Page Scrolling Delay', 'one-page-scroll' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '750'
	);
	
	
	$section = 'home-page-html5-video';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'HTML5 Video Background Options', 'one-page-scroll' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
	
	$options['one_page_scroll[mp4_video_url]'] = array(
		'id' => 'one_page_scroll[mp4_video_url]',
		'label'   => __( 'MP4 Video URL', 'one-page-scroll' ),
		'section' => $section,
		'type'    => 'text',
		'default' => ''
	);
	
	$options['one_page_scroll[ogv_video_url]'] = array(
		'id' => 'one_page_scroll[ogv_video_url]',
		'label'   => __( 'OGV Video URL', 'one-page-scroll' ),
		'section' => $section,
		'type'    => 'text',
		'default' => ''
	);
	$options['one_page_scroll[webm_video_url]'] = array(
		'id' => 'one_page_scroll[webm_video_url]',
		'label'   => __( 'WEBM Video URL', 'one-page-scroll' ),
		'section' => $section,
		'type'    => 'text',
		'default' => ''
	);
	
	$options['one_page_scroll[poster_url]'] = array(
		'id' => 'one_page_scroll[poster_url]',
		'label'   => __( 'Poster', 'one-page-scroll' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);
	
	$options['one_page_scroll[video_loop]'] = array(
		'id' => 'one_page_scroll[video_loop]',
		'label'   => __( 'Video Loop', 'one-page-scroll' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '1'
	);
	
	$options['one_page_scroll[autoplay]'] = array(
		'id' => 'one_page_scroll[autoplay]',
		'label'   => __( 'Autoplay', 'one-page-scroll' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => '1'
	);
	
	$options['one_page_scroll[video_volume]'] = array(
		'id' => 'one_page_scroll[video_volume]',
		'label'   => __( 'Video Volume', 'one-page-scroll' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array('0.001'=>'0','0.1'=>'0.1','0.2'=>'0.2','0.3'=>'0.3','0.4'=>'0.4','0.5'=>'0.5','0.6'=>'0.6','0.7'=>'0.7','0.8'=>'0.8','0.9'=>'0.9','1.0'=>'1.0'),
		'default' => '0.8'
	);
	
	$options['one_page_scroll[video_background_section]'] = array(
		'id' => 'one_page_scroll[video_background_section]',
		'label'   => __( 'Video Background Section', 'one-page-scroll' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $video_background_section,
		'default' => '1'
	);
	
	$section = 'home-page-sidebar';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Home Page & Blog Sidebar Menu options', 'one-page-scroll' ),
		'priority' => '10',
		'description' => '',
		'panel' => $panel
	);
	
	$options['one_page_scroll[sidebar_width]'] = array(
		'id' => 'one_page_scroll[sidebar_width]',
		'label'   => __( 'Sidebar Width', 'one-page-scroll' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '280'
	);
	
	$options['one_page_scroll[menu_status_desktop]'] = array(	
		'label' => __('Menu Status ( Desktop )', 'one-page-scroll'),
		'id' => 'one_page_scroll[menu_status_desktop]',
		'default' => 'open',
		'section' => $section,
		'choices' => array('open'=>__( 'Open', 'one-page-scroll' ),'close'=>__( 'Close', 'one-page-scroll' )),
		'type' => 'select'
		);

	$options['one_page_scroll[menu_status_tablet]'] = array(
		'label' => __('Menu Status ( Tablet )', 'one-page-scroll'),
		'id' => 'one_page_scroll[menu_status_tablet]',
		'default' => 'close',
		'section' => $section,
		'choices' => array('open'=>__( 'Open', 'one-page-scroll' ),'close'=>__( 'Close', 'one-page-scroll' )),
		'type' => 'select'
		);

	$options['one_page_scroll[menu_status_mobile]'] = array(
		'label' => __('Menu Status ( Mobile )', 'one-page-scroll'),
		'id' => 'one_page_scroll[menu_status_mobile]',
		'section' => $section,
		'default' => 'close',
		'choices' => array('open'=>__( 'Open', 'one-page-scroll' ),'close'=>__( 'Close', 'one-page-scroll' )),
		'type' => 'select'
		);
	
	$section_menu_title         = array("SECTION ONE","SECTION TWO","SECTION THREE","SECTION FOUR");
	$section_id                 = array("section-one","section-two","section-three","section-four");
	$section_content_color      = array("#ffffff","#ffffff","#ffffff","#ffffff");
	$section_css_class          = array("","","","");
	 
	$section_title     = array(
							 'Start a Magical Web Design Journey',
							 "Rationes ad Elige HooThemes",
							 "Hec igitur omnia et dux free online elit",
							 "SECTION FOUR"
							 );
	 $section_sub_title = array(
								 'Impressive Design & Responsive Layout',
								 '',
								 '',
								 ''
								 );
	 $section_content   = array(
								 'Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer sed magna vel velit dignissim luctus eu n urna. Dapibus ege-stas turpis. Praesent faucibus nisl sit amet nulla sollicitudin.<br><div class="section-title">EXILIO A prandio MAGUS WEB Design</div><div class="center">
<a href="#section-two" target="_self" rel="nofollow"><button>View our Themes</button></a></div>',
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
 $section_background = array(
	     array(
		'color' => '#ffcc33',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'fixed' ),
		 array(
		'color' => '#1ed87d',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'fixed' ),
		 array(
		'color' => '#ff415c',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'fixed' ),
		 array(
		'color' => '#178cc6',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'fixed' )
		 );
	
	$panel = 'home-page-sections';
	$panels[] = array(
		'id' => $panel,
		'title' => __( 'OPS: Home Page Sections', 'one-page-scroll' ),
		'priority' => '10'
	);
	
	$section_num = absint(onepagescroll_get_option_saved( 'section_num'));
	$hide        = '';
		
	for($i=0; $i < 4; $i++){
		
		if( $section_num!='' && is_numeric($section_num) && $i>=$section_num )
			$hide = '1';
		
		$section = 'home-page-section-'.$i;
		$sections[] = array(
			'id' => $section,
			'title' => sprintf(__( 'Home Section %s', 'one-page-scroll' ),($i+1)),
			'priority' => '10',
			'description' => '',
			'panel' => $panel
		);
		
		$options['one_page_scroll[section_hide_'.$i.']'] = array(
			'id' => 'one_page_scroll[section_hide_'.$i.']',
			'label'   => __( 'Hide Section', 'one-page-scroll' ),
			'section' => $section,
			'type'    => 'checkbox',
			'default' => $hide
		);
	
		$options['one_page_scroll[section_id_'.$i.']'] = array(
			'label' => __('Section ID', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_id_'.$i.']',
			'type' => 'text',
			'default'=>$section_id[$i],
			'section' => $section,
			'description'=> __('Add anchor tag to jump to specific section on one page without having any space or symbol. This section id will be related with the menu link, it should be call on wp appearance menu by using # after site url. It is usually all lowercase and contains only letters, numbers, and hyphens.', 'one-page-scroll'),
			);
		
		$options['one_page_scroll[section_title_'.$i.']'] = array(
			'label' => __('Section Title', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_title_'.$i.']',
			'type' => 'text',
			'section' => $section,
			'default'=>$section_title[$i],
			);
			
		$options['one_page_scroll[section_sub_title_'.$i.']'] = array(
			'label' => __('Section Sub-Title', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_sub_title_'.$i.']',
			'type' => 'text',
			'section' => $section,
			'default'=>$section_sub_title[$i],
			);
		
	   $options['one_page_scroll[section_css_class_'.$i.']'] = array(
	   		'label' => __('Section Css Class', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_css_class_'.$i.']',
			'type' => 'text',
			'section' => $section,
			'default'=>$section_css_class[$i],
			);
	   
	   $options['one_page_scroll[section_content_'.$i.']'] = array(
	   		'label' => __('Section Content', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_content_'.$i.']',
			'default' => $section_content[$i],
			'section' => $section,
			'type' => 'textarea',
			'description'=> '',
			);
			
		// section title typography
			
		$options['one_page_scroll[section_title_typography_'.$i.'][size]'] = array(
			'label' => __('Section Title Font Size', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_title_typography_'.$i.'][size]',
			'type' => 'text',
			'section' => $section,
			'default'=> '24px',
			'choices' => $font_size
			);
		
		$options['one_page_scroll[section_title_typography_'.$i.'][face]'] = array(
			'label' => __('Section Title Font Family', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_title_typography_'.$i.'][face]',
			'type' => 'select',
			'section' => $section,
			'default'=> 'Open Sans, sans-serif',
			'choices' => $os_faces
			);
		
		$options['one_page_scroll[section_title_typography_'.$i.'][color]'] = array(
			'label' => __('Section Title Font Color', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_title_typography_'.$i.'][color]',
			'type' => 'color',
			'section' => $section,
			'default'=> '#333333',
			);
			
			// subtitle typography
			
			$options['one_page_scroll[section_sub_title_typography_'.$i.'][size]'] = array(
			'label' => __('Section Subtitle Font Size', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_sub_title_typography_'.$i.'][size]',
			'type' => 'text',
			'section' => $section,
			'default'=> '30px',
			'choices' => $font_size
			);
		
		$options['one_page_scroll[section_sub_title_typography_'.$i.'][face]'] = array(
			'label' => __('Section Subtitle Font Family', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_sub_title_typography_'.$i.'][face]',
			'type' => 'select',
			'section' => $section,
			'default'=> 'Open Sans, sans-serif',
			'choices' => $os_faces
			);
		
		$options['one_page_scroll[section_sub_title_typography_'.$i.'][color]'] = array(
			'label' => __('Section Subtitle Font Color', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_sub_title_typography_'.$i.'][color]',
			'type' => 'color',
			'section' => $section,
			'default'=> '#ffffff',
			);
			
			// section content typography
			
			$options['one_page_scroll[section_content_typography_'.$i.'][size]'] = array(
			'label' => __('Section Content Font Size', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_content_typography_'.$i.'][size]',
			'type' => 'text',
			'section' => $section,
			'default'=> '16px',
			'choices' => $font_size
			);
		
		$options['one_page_scroll[section_content_typography_'.$i.'][face]'] = array(
			'label' => __('Section Content Font Family', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_content_typography_'.$i.'][face]',
			'type' => 'select',
			'section' => $section,
			'default'=> 'Open Sans, sans-serif',
			'choices' => $os_faces
			);
		
		$options['one_page_scroll[section_content_typography_'.$i.'][color]'] = array(
			'label' => __('Section Content Font Color', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_content_typography_'.$i.'][color]',
			'type' => 'color',
			'section' => $section,
			'default'=> '#ffffff',
			);
			  
		$options['one_page_scroll[section_background_'.$i.'][color]'] = array(
			'label' =>  __('Section Background', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_background_'.$i.'][color]',
			'default' => $section_background[$i]['color'],
			'section' => $section,
			'type' => 'color',
			 );
			 
		$options['one_page_scroll[section_background_'.$i.'][image]'] = array(
			'label' =>  __('Section Background', 'one-page-scroll'),
			'id' => 'one_page_scroll[section_background_'.$i.'][image]',
			'default' => $section_background[$i]['image'],
			'section' => $section,
			'type' => 'image',
			 );
	}
	
	// footer
	$section = 'sidebar';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'OPS: Sidebar', 'one-page-scroll' ),
		'priority' => '10'
	);
	
	$options['one_page_scroll[page_layout]'] = array(
			'label' => __('Page Sidebar', 'one-page-scroll'),
			'id' => 'one_page_scroll[page_layout]',
			'type' => 'select',
			'section' => $section,
			'default'=> 'full-width',
			'choices' => array(
						'full-width'=>__('No Sidebar', 'one-page-scroll'),
						'left-sidebar'=>__('Left Sidebar', 'one-page-scroll'),
						'right-sidebar'=>__('Right Sidebar', 'one-page-scroll'),
						)
			);
		
		$options['one_page_scroll[post_layout]'] = array(
			'label' => __('Post Sidebar', 'one-page-scroll'),
			'id' => 'one_page_scroll[post_layout]',
			'type' => 'select',
			'section' => $section,
			'default'=> 'full-width',
			'choices' => array(
						'full-width'=>__('No Sidebar', 'one-page-scroll'),
						'left-sidebar'=>__('Left Sidebar', 'one-page-scroll'),
						'right-sidebar'=>__('Right Sidebar', 'one-page-scroll'),
						)
			);
	
	
	// footer
	$section = 'footer';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'OPS: Footer', 'one-page-scroll' ),
		'priority' => '10'
	);
	for($i=0;$i<9;$i++){
			
	    $options['one_page_scroll[social_icon_'.$i.']'] = array(
			"label" => sprintf(__('Social Icon #%s', 'one-page-scroll'),($i+1)),
			"id" => 'one_page_scroll[social_icon_'.$i.']',
			"default" => "",
			'description'=> esc_attr__( 'Get social icon string from http://fontawesome.io/icons/, e.g. facebook.', 'one-page-scroll' ),
			"type" => "text",
			'section' => $section,
			);
		$options['one_page_scroll[social_title_'.$i.']'] = array(
			'label' => sprintf(__('Social Title #%s', 'one-page-scroll'),($i+1)),
			'id' => 'one_page_scroll[social_title_'.$i.']',
			'section' => $section,
			'type' => 'text'
			);	
		$options['one_page_scroll[social_link_'.$i.']'] = array(
			'label' => sprintf(__('Social Link #%s', 'one-page-scroll'),($i+1)),
			'id' => 'one_page_scroll[social_link_'.$i.']',
			'section' => $section,
			'type' => 'text'
			);	
		}
	
	//Typography
	$section = 'typography';
	$sections[] = array(
		'id' => $section,
		'title' => __( 'OPS: Typography', 'one-page-scroll' ),
		'priority' => '10'
	);
	
	$options['one_page_scroll[content_link_color]'] = array(
			'label' =>  __('Content Link Color', 'one-page-scroll'),
			'id' => 'one_page_scroll[content_link_color]',
			'default' => '#a29c9a',
			'section' => $section,
			'type' => 'color',
		);
	
	$options['one_page_scroll[content_link_hover_color]'] = array(
			'label' =>  __('Content Link Hover Color', 'one-page-scroll'),
			'id' => 'one_page_scroll[content_link_hover_color]',
			'default' => '#fe8a02',
			'section' => $section,
			'type' => 'color',
		);
	
	// page menu typography
			
		$options['one_page_scroll[page_menu_typography][size]'] = array(
			'label' => __('Page Menu Font Size', 'one-page-scroll'),
			'id' => 'one_page_scroll[page_menu_typography][size]',
			'type' => 'text',
			'section' => $section,
			'default'=> '14px',
			'choices' => $font_size
			);
		
		$options['one_page_scroll[page_menu_typography][face]'] = array(
			'label' => __('Page Menu Font Family', 'one-page-scroll'),
			'id' => 'one_page_scroll[page_menu_typography][face]',
			'type' => 'select',
			'section' => $section,
			'default'=> 'Open Sans, sans-serif',
			'choices' => $os_faces
			);
		
		$options['one_page_scroll[page_menu_typography][color]'] = array(
			'label' => __('Page Menu Font Color', 'one-page-scroll'),
			'id' => 'one_page_scroll[page_menu_typography][color]',
			'type' => 'color',
			'section' => $section,
			'default'=> '#c2d5eb',
			);

		$options['one_page_scroll[home_nav_menu_hover_color]'] = array(
			'label' =>  __('Page Menu Active Color', 'one-page-scroll'),
			'id' => 'one_page_scroll[home_nav_menu_hover_color]',
			'default' => '#ffffff',
			'section' => $section,
			'type' => 'color',
		);
		
		
		// Blog Menu Typography
			
		$options['one_page_scroll[blog_menu_typography][size]'] = array(
			'label' => __('Blog Menu Font Size', 'one-page-scroll'),
			'id' => 'one_page_scroll[blog_menu_typography][size]',
			'type' => 'text',
			'section' => $section,
			'default'=> '14px',
			'choices' => $font_size
			);
		
		$options['one_page_scroll[blog_menu_typography][face]'] = array(
			'label' => __('Blog Menu Font Family', 'one-page-scroll'),
			'id' => 'one_page_scroll[blog_menu_typography][face]',
			'type' => 'select',
			'section' => $section,
			'default'=> 'Open Sans, sans-serif',
			'choices' => $os_faces
			);
		
		$options['one_page_scroll[page_menu_typography][color]'] = array(
			'label' => __('Blog Menu Font Color', 'one-page-scroll'),
			'id' => 'one_page_scroll[blog_menu_typography][color]',
			'type' => 'color',
			'section' => $section,
			'default'=> '#666666',
			);
			
		$options['one_page_scroll[blog_menu_hover_color]'] = array(
			'label' =>  __('Blog Menu Active Color', 'one-page-scroll'),
			'id' => 'one_page_scroll[blog_menu_hover_color]',
			'default' => '#d54e21',
			'section' => $section,
			'type' => 'color',
		);
		
		
		//Homepage Side Nav Menu Typography
			
		$options['one_page_scroll[homepage_side_nav_menu_typography][size]'] = array(
			'label' => __('Homepage Side Nav Menu Font Size', 'one-page-scroll'),
			'id' => 'one_page_scroll[homepage_side_nav_menu_typography][size]',
			'type' => 'text',
			'section' => $section,
			'default'=> '14px',
			'choices' => $font_size
			);
		
		$options['one_page_scroll[homepage_side_nav_menu_typography][face]'] = array(
			'label' => __('Homepage Side Nav Menu Font Family', 'one-page-scroll'),
			'id' => 'one_page_scroll[homepage_side_nav_menu_typography][face]',
			'type' => 'select',
			'section' => $section,
			'default'=> 'Open Sans, sans-serif',
			'choices' => $os_faces
			);
		
		$options['one_page_scroll[homepage_side_nav_menu_typography][color]'] = array(
			'label' => __('Homepage Side Nav Menu Font Color', 'one-page-scroll'),
			'id' => 'one_page_scroll[homepage_side_nav_menu_typography][color]',
			'type' => 'color',
			'section' => $section,
			'default'=> '#666666',
			);
			
		$options['one_page_scroll[home_side_nav_menu_active_color]'] = array(
			'label' =>  __('Side Nav Menu Active Color', 'one-page-scroll'),
			'id' => 'one_page_scroll[home_side_nav_menu_active_color]',
			'default' => '#ffcc33',
			'section' => $section,
			'type' => 'color',
		);
		
		//Homepage Side Nav Menu Typography
			
		$options['one_page_scroll[page_post_content_typography][size]'] = array(
			'label' => __('Pages & Posts Content Font Size', 'one-page-scroll'),
			'id' => 'one_page_scroll[page_post_content_typography][size]',
			'type' => 'text',
			'section' => $section,
			'default'=> '13px',
			'choices' => $font_size
			);
		
		$options['one_page_scroll[page_post_content_typography][face]'] = array(
			'label' => __('Pages & Posts Content Font Family', 'one-page-scroll'),
			'id' => 'one_page_scroll[page_post_content_typography][face]',
			'type' => 'select',
			'section' => $section,
			'default'=> 'Open Sans, sans-serif',
			'choices' => $os_faces
			);
		
		$options['one_page_scroll[page_post_content_typography][color]'] = array(
			'label' => __('Pages & Posts Content Font Color', 'one-page-scroll'),
			'id' => 'one_page_scroll[page_post_content_typography][color]',
			'type' => 'color',
			'section' => $section,
			'default'=> '#555555',
			);
			
	
	
	// Adds the sections to the $options array
	$options['sections'] = $sections;
	// Adds the panels to the $options array
	$options['panels'] = $panels;
	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );
	return $options;
}
add_action( 'init', 'onepagescroll_library_options' );
