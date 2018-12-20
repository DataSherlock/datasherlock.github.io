( function( $ ) {
	
	var ops_menu_status = function(device){
		
		var menu_status = $('select[data-customize-setting-link="one_page_scroll[menu_status_'+device+']"]').val();

		iframe = $("#customize-preview iframe").contents();
		iframe.find('body').addClass('ops-preview-'+device);
		
		if (  menu_status !='close' ) {
			iframe.find(".sidebar").removeClass("hide-sidebar").removeClass(device+'-close').addClass(device+'-open');
			iframe.find('section.content_wrap').css({'margin-left':ops_customizer_params.sidebar_width+"px" });
		}
		 
		if (  menu_status =='close' ) {
			iframe.find(".sidebar").addClass("hide-sidebar").removeClass(device+'-open').addClass(device+'-close');
			iframe.contents().find('section.content_wrap').css({'margin-left':"0" });
		}
		console.log(iframe.find(".sidebar").attr('class'));
	}
		
	$(document).on('click', '.devices button', function(){
		
		var device = $(this).data('device');
		ops_menu_status(device);
	
   });

	
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

		
})( jQuery );
