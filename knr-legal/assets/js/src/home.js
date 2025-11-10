/**
 * Home Page Scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

    $('.accident-form-mobile').click(function() {
		$('.accident-details-form').slideToggle(1200);
        $('.icon-plus').toggleClass('clicked');
	});

    if (window.innerWidth > 820 ) {
        $("#open1").click(function () {
            $("#slide-out1").toggleClass("clicked");
            $(this).toggleClass("clicked");
        });
    
        $("#open2").click(function () {
            $("#slide-out2").toggleClass("clicked");
            $(this).toggleClass("clicked");
        });
    
        $("#open3").click(function () {
            $("#slide-out3").toggleClass("clicked");
            $(this).toggleClass("clicked");
        });
    } else {
        $("#open1").click(function () {
            $("#box-text1").toggleClass("clicked");
            $("#box-text1").slideToggle(400);
            $(this).toggleClass("clicked");
        });
    
        $("#open2").click(function () {
            $("#box-text2").toggleClass("clicked");
            $("#box-text2").slideToggle(400);
            $(this).toggleClass("clicked");
        });
    
        $("#open3").click(function () {
            $("#box-text3").toggleClass("clicked");
            $("#box-text3").slideToggle(400);
            $(this).toggleClass("clicked");
        });
     }

    

    // accident form checkbox validation 

    $('#submit').prop("disabled", true);
    $('input:checkbox').click(function() {
        if ($(this).is(':checked')) {
            $('#submit').prop("disabled", false);
            $('#submit').removeClass('disabled'); 
        } else {
            if ($('.checkbox-input').filter(':checked').length < 1){
            $('#submit').attr('disabled',true);
            $('#submit').toggleClass('disabled'); 
            }
        }
    });

    // expand locations accordion
      
    $('#open-locations').click(function() {
		$('.locations-expand').slideToggle(400);
        $(this).toggleClass("clicked");
	});

    // fix dots on community slider

    var activeClass = 'slick-active',
    ariaAttribute = 'aria-hidden';
    $( '#community-slider' )
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
	
});

