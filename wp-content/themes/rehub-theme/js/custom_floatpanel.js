jQuery(document).ready(function($) {
'use strict';	

	var widthwindow = $(window).width();
	if (widthwindow < 768 && $('.float-panel-woo-info').length > 0){
		var floatpanellinks = $('.float-panel-woo-info').clone(true).addClass('wpsm_pretty_colored float-panel-top-links pt10 pl15 pr15 pb10 rh-float-panel desktabldisplaynone');
		$('body').prepend(floatpanellinks);
		$('.float-panel-top-links').removeClass('rh-line-left ml15');
		$('.float-panel-top-links .float-panel-woo-links').removeClass('font80').addClass('font90 scroll-on-mobile');
	}

	var lastId = '';
	var topMenu = $(".float-panel-woo-links");
	var topTabs = $(".float-panel-woo-tabs");
	var topMenuHeight = $("#float-panel-woo-area").outerHeight()+15;
	var sidecontents = $(".sidecontents");

	if(topMenu.length > 0){

		// All list items
		var menuItems = topMenu.find("a");
		// Anchors corresponding to menu items
		var scrollItems = menuItems.map(function(){
			var elem = $(this).attr("href");
		  	var item = $(elem);
		  if (item.length) { return item; }
		});

		// Bind click handler to menu items
		// so we can get a fancy scroll animation
		menuItems.click(function(e){
			var href = $(this).attr("href"),
		  	offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
			$('html, body').stop().animate({ 
		  		scrollTop: offsetTop
			}, 500);
			e.preventDefault();
		});

		$('#contents-section-woo-area .contents-woo-area a').click(function(e){
			var href = $(this).attr("href"),
		  	offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
			$('html, body').stop().animate({ 
		  		scrollTop: offsetTop
			}, 500);
			e.preventDefault();
		});

		$(window).scroll($.throttle( 250, function(){
			// Get container scroll position
			var fromTop = $(this).scrollTop()+topMenuHeight;

			// Get id of current scroll item
			var cur = scrollItems.map(function(){
		 		if ($(this).offset().top < fromTop)
		   		return this;
			});
			// Get the id of the current element
			cur = cur[cur.length-1];
			var id = cur && cur.length ? cur[0].id : "";

			if (lastId !== id) {
		   		lastId = id;
		   		// Set/remove current class
		   		var currentmenuItem = menuItems.filter("[href='#"+id+"']");
			   	var currentmenuIteml = currentmenuItem.offset();
			   	menuItems.parent().removeClass("current");
			   	currentmenuItem.parent().addClass("current");
			   	if (typeof currentmenuIteml !== "undefined"){
			     	$('.float-panel-top-links .float-panel-woo-links').stop().animate({scrollLeft: currentmenuIteml.left - 20}, 500);
		   		}
			}                   
		}));
	}

	if(topTabs.length > 0){
		var tabItems = topTabs.find("a");

		tabItems.click(function(e){
			e.preventDefault();
			var href = $(this).attr("href"), offsetTop = href === "#" ? 0 : $('.woocommerce-tabs').offset().top-topMenuHeight+1;
			$('.tabs a[href="'+href+'"]').trigger('click');
			return false;
		});

		var tabsWooitems = $('.wc-tabs a');
		tabsWooitems.click(function(e){
			var href = $(this).attr("href"), offsetTop = href === "#" ? 0 : $('.woocommerce-tabs').offset().top-topMenuHeight+1;;
			tabItems.parent().removeClass('current');
			topTabs.find('a[href="'+href+'"]').parent().addClass('current');
			$('html, body').stop().animate({ 
		  		scrollTop: offsetTop
			}, 500);
		});
	}

	if(sidecontents.length > 0){ 
	    var sidecontentsItems = sidecontents.find('a');
	    var sidelastId = '';

	    var sidescrollItems = sidecontentsItems.map(function(){
	        var elem = jQuery(this).attr('href');
	        var item = jQuery(elem);
	      if (item.length) { return item; }
	    });
		sidecontentsItems.click(function(e){
			var href = $(this).attr("href"),
		  	offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight-20;
			$('html, body').stop().animate({ 
		  		scrollTop: offsetTop
			}, 500);
			e.preventDefault();
		});
	    jQuery(window).scroll(jQuery.throttle( 350, function(){
	        var sidefromTop = jQuery(this).scrollTop()+55;
	        var sidecur = sidescrollItems.map(function(){
	            if ((jQuery(this).offset().top - 55) < sidefromTop)
	            return this;
	        });
	        sidecur = sidecur[sidecur.length-1];
	        var id = sidecur && sidecur.length ? sidecur[0].id : '';

	        if (sidelastId !== id) {
	            sidelastId = id;
	            var currentmenuItem = sidecontentsItems.filter('[href=\"#'+id+'\"]');
	            sidecontentsItems.addClass('greycolor').removeClass('fontbold').parent().removeClass('current');
	            currentmenuItem.removeClass('greycolor').addClass('fontbold').parent().addClass('current');
	        }                   
	    }));
	}

	var lastScrollTop = 0;
	$(window).scroll($.throttle( 250,function() {
		var st = $(this).scrollTop();
		if($('#contents-section-woo-area').length > 0){
			var theight = $('#contents-section-woo-area').offset();
			if (st>theight.top) {
				$('#float-panel-woo-area, .float-panel-woo-info').addClass('floating');
				$('.float_p_trigger').addClass('floatactive');
			}
			else {
				$('#float-panel-woo-area, .float-panel-woo-info').removeClass('floating');
				$('.float_p_trigger').removeClass('floatactive');
			}
		   if (st > lastScrollTop){
		       	$('#float-panel-woo-area, .float-panel-woo-info').addClass('scrollingDown').removeClass('scrollingUp');
		   } else {
		      	$('#float-panel-woo-area, .float-panel-woo-info').addClass('scrollingUp').removeClass('scrollingDown');
		   }
		   lastScrollTop = st;	
		}	
	}));
   		
});