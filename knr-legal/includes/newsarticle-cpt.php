<?php
/**
 * Custom News Articles Custom Post Type
 *
 * @package KNR Legal
 * @author Postali LLC
 */

function create_custom_post_type_newsarticle() {

// set up labels
    $labels = array(
        'name' => 'News',
        'singular_name' => 'News',
        'add_new' => 'Add New News Article',
        'add_new_item' => 'Add New News Article',
        'edit_item' => 'Edit News Article',
        'new_item' => 'New News Article',
        'all_items' => 'All News Articles',
        'view_item' => 'View News Article',
        'search_items' => 'Search News Articles',
        'not_found' =>  'No News Articles Found',
        'not_found_in_trash' => 'No News Articles found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'News',

    );
    //register post type
    register_post_type( 'Newsarticle', array(
        'labels'                => $labels,
        'menu_icon'             => 'dashicons-analytics',
        'has_archive'           => true,
        'public'                => true,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),  
        'exclude_from_search'   => false,
        'taxonomies'            => array('category'),
        'capability_type'       => 'post',
        'rewrite'               => array( 'slug' => 'news', 'with_front' => false ), // Allows for /legal-blog/ to be the preface to non pages, but custom posts to have own root
        )
    );

}
add_action( 'init', 'create_custom_post_type_newsarticle' );