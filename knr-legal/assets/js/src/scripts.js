/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

    //Hamburger animation
	$('#menu-icon').click(function() {
		$(this).toggleClass('active');
		$('#header-top_menu').toggleClass('active');
		return false;
	});

	//Toggle mobile menu & search
	$('.toggle-nav').click(function() {
		$('#header-top_menu').slideToggle(400);
	});
	 
	//Close navigation on anchor tap
	$('.toggle-nav.active').click(function() {	
		$('#header-top_menu').slideUp(400);
	});	

	//Mobile menu accordion toggle for sub pages
	$('#header-top_menu > ul.menu > li.menu-item-has-children').append('<div class="accordion-toggle"><span class="toggle-rotate">▼</span></span></div>');

	$('#header-top_menu .accordion-toggle').click(function() {
		$(this).parent().find('> ul').slideToggle(400);
		$(this).toggleClass('toggle-background');
		$(this).find('.icon-icon-chevron-right').toggleClass('toggle-rotate');
        $(this).parent().closest('li').toggleClass('active');
	});

    // script to make accordions function
	$(".accordions").on("click", ".accordions_title", function() {
        // will (slide) toggle the related panel.
        $(this).toggleClass("active").next().slideToggle();
    });

	//keeps menu expanded so user can tab through sub-menu, then closes menu after user tabs away from last child
	$(document).ready(function() {
		$('.menu-item-has-children').on('focusin', function() {
			var subMenu = $(this).find('.sub-menu');
			subMenu.css('display', 'block');

			$(this).find('.sub-menu > li:last-child').on('focusout', function() {
				subMenu.css('display', 'none');
			});
		});
	});

	// Toggle search function in nav
	$( document ).ready( function() {
		var width = $(document).outerWidth();
		if (width > 1200) {
			var open = false;

            $('#search-button').on('click', function(e) {
                if($('#search-input-container').hasClass('hdn')) {
                    e.preventDefault();
                    $('#search-input-container').removeClass('hdn');
                    $('#hide-search-input-container').removeClass('hdn');
                    $('#menu-main-menu li.menu-item').addClass('disable');
                    $('.search-background').addClass('searched');
                    open = true;
                    return;
                }
            });

            $('#hide-search-input-container').on('click', function(e) {
                e.preventDefault();
                $('#search-input-container').addClass('hdn');
                $('#hide-search-input-container').addClass('hdn');
                $('#menu-main-menu li.menu-item').removeClass('disable');
                $('.search-background').removeClass('searched');
                open = false;
                return;
            });
            
			$('html').on('click', function(e) {
				var target = e.target;
				if( $(target).closest('.navbar-form-search').length ) {
					return;
				} else {
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#menu-main-menu li.menu-item').removeClass('disable');
                        $('.search-background').removeClass('searched');
						open = false;
						return;
					}
				}
			});
		}
	});
    
    $(window).scroll(function () {
		$('.finish-line').each(function (i) {
			if (isScrolledIntoView(this) === true) {
                $('.desktop-left-contact').removeClass('fade-in');
				$('.desktop-left-contact').addClass('fade-out');
				$('.on-page-nav-follower').addClass('fade-out');
			} else {
				$('.desktop-left-contact').addClass('fade-in');
                $('.desktop-left-contact').removeClass('fade-out');
                $('.on-page-nav-follower').removeClass('fade-out');
			}
		});
	});
    
    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
    
        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();
    
        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    $('#menu-footer-locations a').addClass('ignore-highlight');

    // highlight links function
	$(document).ready(function() {
		function highlight() {
			var scroll = $(window).scrollTop();
			var height = $(window).height();
		  
			$(".body-container p > a, .body-container li > a").each(function(){
			  var pos = $(this).offset().top;
			  if (scroll+height >= pos && !$(this).hasClass('ignore-highlight')) {
				$(this).addClass("active");
			  } 
			});
		}

		highlight();
		$(window).on("scroll", function(){
			highlight();
		});
	});


	// Only show floating call cta when user has scrolled on the homepage
	$(document).ready(function() {
		if( $('.page-template-front-page').length ) {
			var hasUserScrolled = false;
			$(window).on('scroll', function() {
				if( hasUserScrolled == false ) {
					$('.page-template-front-page .call-follower').css('display', 'flex');
					hasUserScrolled = true;
				}
			});
		}
	});

	$(document).ready(function() {
		var hasPlayed = 0;
		$('.autoplay-thumb').click(function() {
			var $wrapper = $(this).closest('.video-embed-wrapper');
			var $videoEmbed = $wrapper.find('.video-embed');
			$(this).css('display', 'none');
			$videoEmbed.css('display', 'block');
			if ($wrapper.hasClass('video-cover')) {
				$wrapper.removeClass('video-cover');
			}
			if ($videoEmbed.get(0).paused) {
				$videoEmbed.get(0).play();
				setTimeout(function() {
					$videoEmbed.get(0).controls = true;
				}, 1000);
			}
		});
	});

});