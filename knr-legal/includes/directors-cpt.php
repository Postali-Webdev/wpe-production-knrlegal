<?php
/**
 * Custom Attorneys Custom Post Type
 *
 * @package Postali Child
 * @author Postali LLC
 */

function create_custom_post_type_directors() {

// set up labels
    $labels = array(
        'name' => 'Directors',
        'singular_name' => 'Director',
        'add_new' => 'Add New Director',
        'add_new_item' => 'Add New Director',
        'edit_item' => 'Edit Director',
        'new_item' => 'New Director',
        'all_items' => 'All Directors',
        'view_item' => 'View Directors',
        'search_items' => 'Search Directors',
        'not_found' =>  'No Directors Found',
        'not_found_in_trash' => 'No Directors found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Directors',

    );
    //register post type
    register_post_type( 'Directors', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-businessperson',
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => '/'),
        'rewrite' => array( 'slug' => 'directors', 'with_front' => false ),
        )
    );

}
add_action( 'init', 'create_custom_post_type_directors' );