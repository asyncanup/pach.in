jQuery(document).ready(function(){

	jQuery('.td-tooltip').tooltipster();
	jQuery(".hentry, .widget").fitVids();
	jQuery('table').addClass('table');
	jQuery('table').wrap('<div class="table-responsive" />');
	jQuery('.nav-bar').tinyNav({header: jQuery('#site-navigation').data('small-nav-title')});

	if( jQuery('#wpadminbar').is(':visible') ) {
		var adminBarHeight = jQuery('#wpadminbar').css('height');
		jQuery('#page').css('margin-top', adminBarHeight);
		jQuery('.top-navigation').css('top', adminBarHeight);

		var defaultSiteNavHeight = parseInt( jQuery( '.top-navigation' ).height() + jQuery('#wpadminbar').height() );
	} else {
		var defaultSiteNavHeight = parseInt(jQuery( '.top-navigation' ).height());
	}

	var headerContainer = jQuery('#masthead');

	var defaultPadding = parseInt(jQuery( '#masthead .brand' ).css( 'padding-top' ).replace(/[^-\d\.]/g, ''));
	var brandContainer = jQuery( '#masthead .brand' );

	var sidebarWidth = '';

	jQuery('.go-top-box').click(function() {
		jQuery("html, body").animate({ scrollTop: 0 }, 1000);
	});

	jQuery('#post-formats-open-btn').click(function(e) {
		e.preventDefault();
  		jQuery(this).parent().fadeOut(function() {
  			jQuery('.post-formats-navigation-container').fadeIn();
  		});
	});

	jQuery('#post-formats-hide-btn').click(function(e) {
		e.preventDefault();
  		jQuery('.post-formats-navigation-container').fadeOut(function() {
  			jQuery('.pf-open-btn').fadeIn();
  		});
	});

	jQuery('#sidebar-btn').click(function(e) {
		e.preventDefault();
		if(jQuery('.widget-inner').is(':visible')) {
			jQuery('.widget-inner').animate({
				width: '0'
			}, 300, function() { jQuery(this).hide(); });
		} else {
			var currentBrowserWidth = jQuery( window ).width();

			if( currentBrowserWidth > 420 ) {
				sidebarWidth = '420px';
			} else {
				sidebarWidth = currentBrowserWidth.toString() + 'px';
			}

			jQuery('.widget-area').css({'height':'100%', 'top':defaultSiteNavHeight+'px'});
			jQuery('.widget-inner').css('width', sidebarWidth).fadeIn(300);
		}
	});

	jQuery('.menu-toggle').click(function() {
		if(jQuery('.widget-inner').is(':visible')) {
			jQuery('.widget-inner').hide();
		}
	});

});
