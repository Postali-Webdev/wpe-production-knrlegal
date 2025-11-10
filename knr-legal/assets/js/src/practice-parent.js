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

    $('.on-page-links').click(function() {
		$('.accordions_title').toggleClass('active');
		$('.accordions_content').slideUp(400);
	});

     
});