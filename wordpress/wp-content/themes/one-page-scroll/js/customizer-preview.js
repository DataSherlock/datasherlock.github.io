( function( $ ) {
	
	$(document).ready(function(e) {
        var winWidth = $(window).width();

		if(winWidth>721){
			
			$(".sidebar.desktop-open").removeClass("hide-sidebar");
			$(".sidebar.desktop-close").addClass("hide-sidebar");
			$('section.content_wrap.content-desktop-open').css({'margin-left':ops_customizer_params.sidebar_width+"px" });
			$('section.content_wrap.content-desktop-close').css({'margin-left':"0" });
		
		}
	
		if(winWidth>320 && winWidth<721){
			
			$(".sidebar.tablet-open").removeClass("hide-sidebar");
			$(".sidebar.tablet-close").addClass("hide-sidebar");
			$('section.content_wrap.content-tablet-open').css({'margin-left':ops_customizer_params.sidebar_width+"px" });
			$('section.content_wrap.content-tablet-close').css({'margin-left':"0" });
		
		}
		
		if( winWidth<=320){
			
			$(".sidebar.mobile-open").removeClass("hide-sidebar");
			$(".sidebar.mobile-close").addClass("hide-sidebar");
			$('section.content_wrap.content-mobile-open').css({'margin-left':ops_customizer_params.sidebar_width+"px" });
			$('section.content_wrap.content-mobile-close').css({'margin-left':"0" });
		
		}
    });

		
} )( jQuery );
