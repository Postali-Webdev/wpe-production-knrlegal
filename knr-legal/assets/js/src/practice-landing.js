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

    $('.expand').click(function(e){
        e.preventDefault();
        $('.extra_' + $(this).attr('data-target')).slideToggle(400);
   });
    
});