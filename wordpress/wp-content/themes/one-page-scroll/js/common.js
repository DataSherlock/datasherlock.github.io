jQuery(document).ready(function($) {

/*section full screen*/
$(".homepage_content_wrap section.section").each(function(){
	$(this).css({'min-height':$(window).height()});						  
  });
 
/* responsive menu*/
if( $('header nav > ul').length )
    $('header nav').hoomenu({hooScreenWidth:919,hooMenuContainer:'header.navbar'});

/* Parallax Scrolling*/
	jQuery('.sidebar .main_nav').onePageNav({
		changeHash: false,
		filter: ".menu-item a[href^='#']",
		scrollSpeed:parseInt(onepagescroll_params.scrollspeed),
		currentClass:"active"
	});

/*Preserving aspect ratio for embedded iframes*/
$('.entry-content embed,.entry-content iframe').each(function(){
										
		var width  = $(this).attr('width');	
		var height = $(this).attr('height');
		if($.isNumeric(width) && $.isNumeric(height)){
			if(width > $(this).width()){
				var new_height = (height/width)*$(this).width();
				$(this).css({'height':new_height});
				}
			
			}				
    });
	
/*sidebar height*/
if( $('.page-container').length){
	var adminbarHeight = 0;
	if( $("body.admin-bar").length){
		if( $(window).width() < 765) {
				adminbarHeight = 46;
				
			} else {
				adminbarHeight = 32;
			}
	  }
	  
$('.page-container').css({'min-height':$(window).height()-$('header').outerHeight()-$('#footer').outerHeight()-adminbarHeight-20});
}

if( $('section.sidebar').length){
	var adminbarHeight = 0;
	if( $("body.admin-bar").length){
		if( $(window).width() < 765) {
				adminbarHeight = 46;
				
			} else {
				adminbarHeight = 32;
			}
	  }
	  
$('section.sidebar').css({'min-height':$(window).height()});
}


  var MobileUA = (function() {  
	  var ua = navigator.userAgent.toLowerCase();  
  
	  var mua = {  
		  IOS: /ipod|iphone|ipad/.test(ua), //iOS  
		  IPHONE: /iphone/.test(ua), //iPhone  
		  IPAD: /ipad/.test(ua), //iPad  
		  ANDROID: /android/.test(ua), //Android Device  
		  WINDOWS: /windows/.test(ua), //Windows Device  
		  TOUCH_DEVICE: ('ontouchstart' in window) || /touch/.test(ua), //Touch Device  
		  MOBILE: /mobile/.test(ua), //Mobile Device (iPad)  
		  ANDROID_TABLET: false, //Android Tablet  
		  WINDOWS_TABLET: false, //Windows Tablet  
		  TABLET: false, //Tablet (iPad, Android, Windows)  
		  SMART_PHONE: false //Smart Phone (iPhone, Android)  
	  };  
  
	  mua.ANDROID_TABLET = mua.ANDROID && !mua.MOBILE;  
	  mua.WINDOWS_TABLET = mua.WINDOWS && /tablet/.test(ua);  
	  mua.TABLET = mua.IPAD || mua.ANDROID_TABLET || mua.WINDOWS_TABLET;  
	  mua.SMART_PHONE = mua.MOBILE && !mua.TABLET;  
  
	  return mua;  
  }());
  
	if (onepagescroll_params.is_customizer_preview !='1') {
 // if (MobileUA.SMART_PHONE && onepagescroll_params.menu_status_mobile !='close') {
	if (MobileUA.SMART_PHONE && !$('.main_wrap .sidebar').hasClass('mobile-close')) {  
        
		$(".sidebar").removeClass("hide-sidebar");
		$('section.content_wrap').css({'margin-left':onepagescroll_params.sidebar_width+"px" });
    }
	
	
	//if ( !(MobileUA.TABLET || MobileUA.SMART_PHONE) && onepagescroll_params.menu_status_desktop !='close') {
	if ( !(MobileUA.TABLET || MobileUA.SMART_PHONE) && !$('.main_wrap .sidebar').hasClass('desktop-close')) {
        
		$(".sidebar").removeClass("hide-sidebar");
		$('section.content_wrap').css({'margin-left':onepagescroll_params.sidebar_width+"px" });
    }
	
	//if ( MobileUA.TABLET && onepagescroll_params.menu_status_tablet !='close') {
	if ( MobileUA.TABLET && !$('.main_wrap .sidebar').hasClass('tablet-close')) {
        
		$(".sidebar").removeClass("hide-sidebar");
		$('section.content_wrap').css({'margin-left':onepagescroll_params.sidebar_width+"px" });
    }

	
	if (MobileUA.SMART_PHONE){
		  $('.name-box .close-menu').removeClass('hide');
		}
	if (MobileUA.SMART_PHONE || MobileUA.TABLET ){
		  $('.play-video').removeClass('hide');
		}

	}

$(".sidebar").on("click",".close-menu,#panel-cog",function(){
	
	if($(this).parents(".sidebar").hasClass("hide-sidebar")){
		$(this).parents(".sidebar").removeClass("hide-sidebar");
		$('#panel-cog i').removeClass('fa-chevron-right').addClass('fa-chevron-left');
		$('section.content_wrap').css({'margin-left':onepagescroll_params.sidebar_width+"px" });
	}else{
		$(this).parents(".sidebar").addClass("hide-sidebar");	
		$('#panel-cog i').removeClass('fa-chevron-left').addClass('fa-chevron-right');
		$('section.content_wrap').css({'margin-left':'0px'});
	}
});


/*  smooth scrolling  btn */
  jQuery(".content_wrap a[href^='#'],.menu-main a[href^='#'],.main-menu a[href^='#'],.entry-content  a[href^='#']").on('click', function(e){
 
				var scrollTop = jQuery(window).scrollTop(); 
				e.preventDefault();
		 		var id = jQuery(this).attr('href');
				if(typeof jQuery(id).offset() !== 'undefined'){
				var goTo = jQuery(id).offset().top;
				jQuery("html, body").animate({ scrollTop: goTo }, parseInt(onepagescroll_params.scrollspeed));
				}

			});	
  
/* site nav toggle */

  jQuery(".site-nav-toggle").click(function(){
    jQuery(".site-nav").toggle();
   });
  
/* video background*/

  if( typeof background_video !== 'undefined'  ){
  var	loop = false;
  if( background_video.loop == 'true' )
	  loop = true;
	  
   var autoplay = true;
  if( background_video.autoplay == '' || background_video.autoplay == '0' )
   autoplay = false;
	  
  $(background_video.container).prepend('<div class="video-background"></div>');
				$('.video-background').videobackground({
					videoSource: [[background_video.mp4_video_url, 'video/mp4'],
						[background_video.webm_video_url, 'video/webm'], 
						[background_video.ogv_video_url, 'video/ogg']
					], 
					controlPosition: background_video.container,
					poster: background_video.poster_url,
					loop:loop,
					autoplay:autoplay,
					volume: parseFloat(background_video.volume),
					resizeTo: 'container',
					loadedCallback: function() {
						$(this).videobackground('mute');
					}
				});
		}
$(".play-video").on("click", function(){
        var video = $(this).parents('section.section').find('video')[0];
        video.play();
        $(".play-video").hide();
    });
		
/* menu */

$('#main_nav li.menu-item-has-children>a').on('click', function(){
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp();
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown();
			element.siblings('li').children('ul').slideUp();
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp();
		}
	});

  $('#main_nav>ul>li.menu-item-has-children>a').append('<div class="holder"></div>');
  
  if( $('section.sidebar #main_nav').length ){
		var logo_height     = $('section.sidebar .logo-container').outerHeight();
		var footer_height   = $('section.sidebar .side-footer').outerHeight();
		var sidebar_height  = $('section.sidebar').outerHeight();
		var content_height  = sidebar_height - logo_height - footer_height;
		var main_nav_height = $('section.sidebar #main_nav').outerHeight();
		if( main_nav_height > content_height )
	    $('.home section.sidebar #main_nav').css({'height':content_height,'overflow-y':'scroll'});
	}

  $(window).resize(function() {
	if( $('section.sidebar #main_nav').length ){
		var logo_height    = $('section.sidebar .logo-container').outerHeight();
		var footer_height  = $('section.sidebar .side-footer').outerHeight();
		var sidebar_height = $('section.sidebar').outerHeight();
		var content_height = sidebar_height - logo_height - footer_height;
		var main_nav_height = $('section.sidebar #main_nav').outerHeight();
		if( main_nav_height > content_height )
	   $('.home section.sidebar #main_nav').css({'height':content_height,'overflow-y':'scroll'});
	   else
	   $('.home section.sidebar #main_nav').css({'height':'auto','overflow-y':'hide'});
	}
							
    });

 });

/*!
* responsive menu
*/
(function ($) {
	"use strict";
		$.fn.hoomenu = function (options) {
				var defaults = {
						hooMenuTarget: jQuery(this), // Target the current HTML markup you wish to replace
						hooMenuContainer: 'body', // Choose where hoomenu will be placed within the HTML
						hooMenuClose: "X", // single character you want to represent the close menu button
						hooMenuCloseSize: "18px", // set font size of close button
						hooMenuOpen: "<span /><span /><span />", // text/markup you want when menu is closed
						hooRevealPosition: "right", // left right or center positions
						hooRevealPositionDistance: "0", // Tweak the position of the menu
						hooRevealColour: "", // override CSS colours for the reveal background
						hooScreenWidth: "480", // set the screen width you want hoomenu to kick in at
						hooNavPush: "", // set a height here in px, em or % if you want to budge your layout now the navigation is missing.
						hooShowChildren: true, // true to show children in the menu, false to hide them
						hooExpandableChildren: true, // true to allow expand/collapse children
						hooExpand: "+", // single character you want to represent the expand for ULs
						hooContract: "-", // single character you want to represent the contract for ULs
						hooRemoveAttrs: false, // true to remove classes and IDs, false to keep them
						onePage: false, // set to true for one page sites
						hooDisplay: "block", // override display method for table cell based layouts e.g. table-cell
						removeElements: "" // set to hide page elements
				};
				options = $.extend(defaults, options);

				// get browser width
				var currentWidth = window.innerWidth || document.documentElement.clientWidth;

				return this.each(function () {
						var hooMenu = options.hooMenuTarget;
						var hooContainer = options.hooMenuContainer;
						var hooMenuClose = options.hooMenuClose;
						var hooMenuCloseSize = options.hooMenuCloseSize;
						var hooMenuOpen = options.hooMenuOpen;
						var hooRevealPosition = options.hooRevealPosition;
						var hooRevealPositionDistance = options.hooRevealPositionDistance;
						var hooRevealColour = options.hooRevealColour;
						var hooScreenWidth = options.hooScreenWidth;
						var hooNavPush = options.hooNavPush;
						var hooRevealClass = ".hoomenu-reveal";
						var hooShowChildren = options.hooShowChildren;
						var hooExpandableChildren = options.hooExpandableChildren;
						var hooExpand = options.hooExpand;
						var hooContract = options.hooContract;
						var hooRemoveAttrs = options.hooRemoveAttrs;
						var onePage = options.onePage;
						var hooDisplay = options.hooDisplay;
						var removeElements = options.removeElements;

						//detect known mobile/tablet usage
						var isMobile = false;
						if ( (navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i)) || (navigator.userAgent.match(/Blackberry/i)) || (navigator.userAgent.match(/Windows Phone/i)) ) {
								isMobile = true;
						}

						if ( (navigator.userAgent.match(/MSIE 8/i)) || (navigator.userAgent.match(/MSIE 7/i)) ) {
							// add scrollbar for IE7 & 8 to stop breaking resize function on small content sites
								jQuery('html').css("overflow-y" , "scroll");
						}

						var hooRevealPos = "";
						var hooCentered = function() {
							if (hooRevealPosition === "center") {
								var newWidth = window.innerWidth || document.documentElement.clientWidth;
								var hooCenter = ( (newWidth/2)-22 )+"px";
								hooRevealPos = "left:" + hooCenter + ";right:auto;";

								if (!isMobile) {
									jQuery('.hoomenu-reveal').css("left",hooCenter);
								} else {
									jQuery('.hoomenu-reveal').animate({
											left: hooCenter
									});
								}
							}
						};

						var menuOn = false;
						var hooMenuExist = false;


						if (hooRevealPosition === "right") {
								hooRevealPos = "right:" + hooRevealPositionDistance + ";left:auto;";
						}
						if (hooRevealPosition === "left") {
								hooRevealPos = "left:" + hooRevealPositionDistance + ";right:auto;";
						}
						// run center function
						hooCentered();

						// set all styles for hoo-reveal
						var $navreveal = "";

						var hooInner = function() {
								// get last class name
								if (jQuery($navreveal).is(".hoomenu-reveal.hooclose")) {
										$navreveal.html(hooMenuClose);
								} else {
										$navreveal.html(hooMenuOpen);
								}
						};

						// re-instate original nav (and call this on window.width functions)
						var hooOriginal = function() {
							jQuery('.hoo-bar,.hoo-push').remove();
							jQuery(hooContainer).removeClass("hoo-container");
							jQuery(hooMenu).css('display', hooDisplay);
							menuOn = false;
							hooMenuExist = false;
							jQuery(removeElements).removeClass('hoo-remove');
						};

						// navigation reveal
						var showHooMenu = function() {
								var hooStyles = "background:"+hooRevealColour+";color:"+hooRevealColour+";"+hooRevealPos;
								if (currentWidth <= hooScreenWidth) {
								jQuery(removeElements).addClass('hoo-remove');
									hooMenuExist = true;
									// add class to body so we don't need to worry about media queries here, all CSS is wrapped in '.hoo-container'
									jQuery(hooContainer).addClass("hoo-container");
									jQuery('.hoo-container').prepend('<div class="hoo-bar"><a href="#nav" class="hoomenu-reveal" style="'+hooStyles+'">Show Navigation</a><nav class="hoo-nav"></nav></div>');

									//push hooMenu navigation into .hoo-nav
									var hooMenuContents = jQuery(hooMenu).html();
									jQuery('.hoo-nav').html(hooMenuContents);

									// remove all classes from EVERYTHING inside hoomenu nav
									if(hooRemoveAttrs) {
										jQuery('nav.hoo-nav ul, nav.hoo-nav ul *').each(function() {
											// First check if this has hoo-remove class
											if (jQuery(this).is('.hoo-remove')) {
												jQuery(this).attr('class', 'hoo-remove');
											} else {
												jQuery(this).removeAttr("class");
											}
											jQuery(this).removeAttr("id");
										});
									}

									// push in a holder div (this can be used if removal of nav is causing layout issues)
									jQuery(hooMenu).before('<div class="hoo-push" />');
									jQuery('.hoo-push').css("margin-top",hooNavPush);

									// hide current navigation and reveal hoo nav link
									jQuery(hooMenu).hide();
									jQuery(".hoomenu-reveal").show();

									// turn 'X' on or off
									jQuery(hooRevealClass).html(hooMenuOpen);
									$navreveal = jQuery(hooRevealClass);

									//hide hoo-nav ul
									jQuery('.hoo-nav ul').hide();

									// hide sub nav
									if(hooShowChildren) {
											// allow expandable sub nav(s)
											if(hooExpandableChildren){
												jQuery('.hoo-nav ul ul').each(function() {
														if(jQuery(this).children().length){
																jQuery(this,'li:first').parent().append('<a class="hoo-expand" href="#" style="font-size: '+ hooMenuCloseSize +'">'+ hooExpand +'</a>');
														}
												});
												jQuery('.hoo-expand').on("click",function(e){
														e.preventDefault();
															if (jQuery(this).hasClass("hoo-clicked")) {
																	jQuery(this).text(hooExpand);
																jQuery(this).prev('ul').slideUp(300, function(){});
														} else {
																jQuery(this).text(hooContract);
																jQuery(this).prev('ul').slideDown(300, function(){});
														}
														jQuery(this).toggleClass("hoo-clicked");
												});
											} else {
													jQuery('.hoo-nav ul ul').show();
											}
									} else {
											jQuery('.hoo-nav ul ul').hide();
									}

									// add last class to tidy up borders
									jQuery('.hoo-nav ul li').last().addClass('hoo-last');
									$navreveal.removeClass("hooclose");
									jQuery($navreveal).click(function(e){
										e.preventDefault();
								if( menuOn === false ) {
												$navreveal.css("text-align", "center");
												$navreveal.css("text-indent", "0");
												$navreveal.css("font-size", hooMenuCloseSize);
												jQuery('.hoo-nav ul:first').slideDown();
												menuOn = true;
										} else {
											jQuery('.hoo-nav ul:first').slideUp();
											menuOn = false;
										}
											$navreveal.toggleClass("hooclose");
											hooInner();
											jQuery(removeElements).addClass('hoo-remove');
									});

									// for one page websites, reset all variables...
									if ( onePage ) {
										jQuery('.hoo-nav ul > li > a:first-child').on( "click" , function () {
											jQuery('.hoo-nav ul:first').slideUp();
											menuOn = false;
											jQuery($navreveal).toggleClass("hooclose").html(hooMenuOpen);
										});
									}
							} else {
								hooOriginal();
							}
						};

						if (!isMobile) {
								// reset menu on resize above hooScreenWidth
								jQuery(window).resize(function () {
										currentWidth = window.innerWidth || document.documentElement.clientWidth;
										if (currentWidth > hooScreenWidth) {
												hooOriginal();
										} else {
											hooOriginal();
										}
										if (currentWidth <= hooScreenWidth) {
												showHooMenu();
												hooCentered();
										} else {
											hooOriginal();
										}
								});
						}

					jQuery(window).resize(function () {
								// get browser width
								currentWidth = window.innerWidth || document.documentElement.clientWidth;

								if (!isMobile) {
										hooOriginal();
										if (currentWidth <= hooScreenWidth) {
												showHooMenu();
												hooCentered();
										}
								} else {
										hooCentered();
										if (currentWidth <= hooScreenWidth) {
												if (hooMenuExist === false) {
														showHooMenu();
												}
										} else {
												hooOriginal();
										}
								}
						});

					// run main menuMenu function on load
					showHooMenu();
				});
		};
})(jQuery);