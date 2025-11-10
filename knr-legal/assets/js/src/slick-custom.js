/**
 * Slick Custom
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	$('#attorney-slider').slick({
		dots: false,
		infinite: true,
		fade: false,
		autoplay: false,
  		autoplaySpeed: 5000,
  		speed: 600,
		slidesToShow: 4,
		slidesToScroll: 1,
        arrows:false,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                  slidesToShow: 3
                }
            },
            {
              breakpoint: 769,
              settings: {
                slidesToShow: 2
              }
            },
            {
              breakpoint: 601,
              settings: {
                slidesToShow: 1
              }
            }
          ]
	});

    $('.next-button-slick').click(function(){
        $('#attorney-slider').slick("slickNext");
    });
    $('.prev-button-slick').click(function(){
        $('#attorney-slider').slick("slickPrev");
    });

    $('#community-slider').slick({
		dots: true,
		infinite: true,
		fade: true,
		autoplay: false,
  		autoplaySpeed: 5000,
  		speed: 600,
		slidesToShow: 1,
		slidesToScroll: 1,
        arrows:false,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        appendDots: $('.slider-dots')
	});

    $('#awards-slider').slick({
		dots: true,
		infinite: false,
		fade: false,
		autoplay: true,
  		autoplaySpeed: 3000,
  		speed: 600,
		slidesToShow: 3,
		slidesToScroll: 1,
        arrows:false,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        responsive: [
            {
              breakpoint: 769,
              settings: {
                slidesToShow: 2
              }
            },
            {
              breakpoint: 601,
              settings: {
                slidesToShow: 1
              }
            }
        ]
	});

    $('#related-posts-slider').slick({
		dots: true,
		infinite: false,
		fade: true,
		autoplay: false,
  		autoplaySpeed: 5000,
  		speed: 600,
		slidesToShow: 1,
		slidesToScroll: 1,
        arrows:false,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        appendDots: $('.slider-main')
	});

  $('.attorney_blocks').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1
        }
      }
  ] 
	});

  $('.award_blocks').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    responsive: [
        {
            breakpoint: 992,
            settings: {
            slidesToShow: 3
            }
        },
        {
            breakpoint: 768,
            settings: {
            slidesToShow: 2
            }
        },
        {
            breakpoint: 600,
            settings: {
            slidesToShow: 1
            }
        }
    ]
      
	});

    $('#media-slider').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                slidesToShow: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                slidesToShow: 1
                }
            }
        ]
      
	});

    // this adds the 'active' class back in after repositioning the dots for the related-posts slider
    
    var activeClass = 'slick-active',
    ariaAttribute = 'aria-hidden';
    $( '#related-posts-slider' )
    .on( 'init', function() {
        $( '.slick-dots li:first-of-type' ).addClass( activeClass ).attr( ariaAttribute, false );
    } )
    .on( 'afterChange', function( event, slick, currentSlide ) {
        var $dots = $( '.slick-dots' );
        $( 'li', $dots ).removeClass( activeClass ).attr( ariaAttribute, true );
        $dots.each( function() {
            $( 'li', $( this ) ).eq( currentSlide ).addClass( activeClass ).attr( ariaAttribute, false );
        } );
    } );


    $('.slider-next-button-slick').click(function(){
        $('#community-slider').slick("slickNext");
        $('#related-posts-slider').slick("slickNext");
        $('#awards-slider').slick("slickNext");
        $('#media-slider').slick("slickNext");
    });
    $('.slider-prev-button-slick').click(function(){
        $('#community-slider').slick("slickPrev");
        $('#related-posts-slider').slick("slickPrev");
        $('#awards-slider').slick("slickPrev");
        $('#media-slider').slick("slickPrev");  
    });
	
});