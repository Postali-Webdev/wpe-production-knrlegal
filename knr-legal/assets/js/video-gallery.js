jQuery( function ( $ ) {
	"use strict";
	$(document).ready(function() {

    //Video Gallery Widget
    (function() {
        if ($('#block-video-gallery').length) {

        $('.chapter-link').on('click', function() {
            let chapter = $(this).attr('data-chapter');

            $(".active iframe").each(function() { 
            var src= $(this).attr('src');
            $(this).attr('src',src);  
            });

            $('.chapter-link').removeClass('active');
            $(this).addClass('active');

            $('.video-item').removeClass('active');
            $('.' + chapter).addClass('active');
        })

        }
    })();

    })

});
