<?php
/**
 * Community Support Custom Post Type
 *
 * @package Postali Child
 * @author Postali LLC
 */

function create_custom_post_type_communitysupport() {

// set up labels
    $labels = array(
        'name' => 'Community Support',
        'singular_name' => 'Community Support',
        'add_new' => 'Add New Community Support Post',
        'add_new_item' => 'Add New Community Support Post',
        'edit_item' => 'Edit Community Support Post',
        'new_item' => 'New Community Support Post',
        'all_items' => 'All Community Support Posts',
        'view_item' => 'View Community Support Posts',
        'search_items' => 'Search Community Support Posts',
        'not_found' =>  'No Community Support Posts Found',
        'not_found_in_trash' => 'No Community Support Posts found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Community Support',

    );
    //register post type
    register_post_type( 'Community Support', array(
        'labels'                => $labels,
        'menu_icon'             => 'dashicons-businessman',
        'has_archive'           => true,
        'public'                => true,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),  
        'exclude_from_search'   => false,
        'capability_type'       => 'post',
        'taxonomies'            => array('category'),
        'rewrite'               => array( 'slug' => '/'),
        'rewrite'               => array( 'slug' => 'community', 'with_front' => false ), // Has /about/ as pre front for the theme, if there are more then attorneys to be listed under here this need removed
        )
    );

}

add_action( 'init', 'create_custom_post_type_communitysupport' );