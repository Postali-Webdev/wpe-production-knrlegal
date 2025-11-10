jQuery( function ( $ ) {
    "use strict";

    //Global Variables
	var width = $(window).outerWidth();

    // Toggle search function in nav
	(function() {
		if (width > 1200) {
			var open = false;
			$('.main-nav-search').attr('type', 'button');
			// load clicky search scripts for desktop
			$('.main-nav-search').on('click', function(e) {
                if ( !open ) {
                    $('#search-input-container').removeClass('hdn');
                    $('#search-button span').removeClass('icon-magnifying-glass').addClass('icon-close');
                    $('#menu-main-menu').addClass('disable');
                    open = true;
                    return;
                }
                if ( open ) {
                    $('#search-input-container').addClass('hdn');
                    $('#search-button span').removeClass('icon-close').addClass('icon-magnifying-glass');
                    $('#menu-main-menu').removeClass('disable');
                    open = false;
                    return;
                }
			}); 
			$('html').on('click', function(e) {
				var target = e.target;
				if( $(target).closest('.navbar-form-search').length ) {
					return;
				} else {
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#menu-main-menu').removeClass('disable');
						open = false;
						return;
					}
				}
			});
		}
	})();

});