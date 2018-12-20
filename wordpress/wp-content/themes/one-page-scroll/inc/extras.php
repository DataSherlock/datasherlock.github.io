<?php


function onepagescroll_add_link_pages( $content ){
	$pages = wp_link_pages( 
		array( 
			'before' => '<div>' . __( 'Page: ', 'one-page-scroll' ),
			'after' => '</div>',
			'echo' => false ) 
	);
	if ( $pages == '' ){
		return $content;
	}
	return $content . $pages;
}
add_filter( 'the_content', 'onepagescroll_add_link_pages' );

/*
*  Custom comments list
*
*/
   
function onepagescroll_comment($comment, $args, $depth) {
    ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ;?>">
     <div id="comment-<?php comment_ID(); ?>">
	 
	 <div class="comment-avatar"><?php echo get_avatar($comment,'52','' ); ?></div>
			<div class="comment-info">
			<div class="reply-quote">
             <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ;?>
			</div>
      <div class="comment-author vcard">
        
			<span class="fnfn"><?php printf(__('<cite> %s </cite><span class="says">says:</span>','one-page-scroll'), get_comment_author_link()) ;?></span>
								<span class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ;?>">
<?php printf(__('%1$s at %2$s','one-page-scroll'), get_comment_date(), get_comment_time()) ;?></a>
<?php edit_comment_link(__('(Edit)','one-page-scroll'),'  ','') ;?></span>
				<span class="comment-meta">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ;?>">-#<?php echo $depth?></a>				</span>

      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.','one-page-scroll') ;?></em>
         <br />
      <?php endif; ?>

     

      <?php comment_text() ;?>
</div>
   <div class="clear"></div>
     </div>
<?php
        }
		
/*
*  title filter
*
*/

function onepagescroll_the_title( $title ) {
if ( $title == '' ) {
  return  __('Untitled','one-page-scroll');
  } else {
  return $title;
  }
}
add_filter( 'the_title', 'onepagescroll_the_title' );


/*	
*	get background 
*	---------------------------------------------------------------------
*/

function onepagescroll_get_background($args){
$background = "";
 if (is_array($args)) {
	if (isset($args['image']) && $args['image']!="") {
	$background .=  "background:url(".esc_attr($args['image']). ")  ".esc_attr($args['repeat'])." ".esc_attr($args['position'])." ".esc_attr($args['attachment']).";";
	}

	if(isset($args['color']) && $args['color'] !=""){
	$background .= "background-color:".esc_attr($args['color']).";";
	}
	}
return $background;
}

// allow script & iframe tag within posts
function onepagescroll_allow_post_tags( $allowedposttags ){
	
    $allowedposttags['script'] = array(
        'type' => true,
        'src' => true,
        'height' => true,
        'width' => true,
    );
    $allowedposttags['iframe'] = array(
        'src' => true,
        'width' => true,
        'height' => true,
        'class' => true,
        'frameborder' => true,
        'webkitAllowFullScreen' => true,
        'mozallowfullscreen' => true,
        'allowFullScreen' => true
    );
	
	$allowedposttags["embed"] = array(
	   "src" => true,
	   "type" => true,
	   "allowfullscreen" => true,
	   "allowscriptaccess" => true,
	   "height" => true,
	   "width" => true
	  );
	
    return $allowedposttags;
}
add_filter('wp_kses_allowed_html','onepagescroll_allow_post_tags', 1);


/*

* Returns a typography option in a format that can be outputted as inline CSS

*/


function onepagescroll_options_typography_font_styles($option, $selectors) {

         $output = $selectors . ' {';
      if(isset($option['color']))
      $output .= ' color:' . esc_attr( $option['color'] ) .'; ';
      if(isset($option['face']))
      $output .= 'font-family:' . esc_attr( $option['face']) . '; ';
      if(isset($option['style']))
      $output .= 'font-weight:' . esc_attr( $option['style']) . '; ';
      if(isset($option['size']))
      $output .= 'font-size:' . esc_attr( $option['size'] ). '; ';

      $output .= '}';

      $output .= "\n";

      return $output;

}