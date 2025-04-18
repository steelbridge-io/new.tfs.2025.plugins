<?php
/*
 * Outfitetrs Blog Custom Post Type
 */
add_theme_support('post-thumbnails');
add_post_type_support( 'flyfishing-news', 'thumbnail' );

// Register Custom Post Type
function california_flyfishing_news() {
  
  $labels = array(
    'name'                  => _x( 'Outfitters Posts', 'Post Type General Name', 'outfitter_domain' ),
    'singular_name'         => _x( 'Outfitters Post', 'Post Type Singular Name', 'outfitter_domain' ),
    'menu_name'             => __( 'Outfitters Posts', 'outfitter_domain' ),
    'name_admin_bar'        => __( 'Outfitter Post', 'outfitter_domain' ),
    'archives'              => __( 'Item Archives', 'outfitter_domain' ),
    'attributes'            => __( 'Item Attributes', 'outfitter_domain' ),
    'parent_item_colon'     => __( 'Parent Item:', 'outfitter_domain' ),
    'all_items'             => __( 'All Posts', 'outfitter_domain' ),
    'add_new_item'          => __( 'Add New Item', 'outfitter_domain' ),
    'add_new'               => __( 'Add New', 'outfitter_domain' ),
    'new_item'              => __( 'New Item', 'outfitter_domain' ),
    'edit_item'             => __( 'Edit Page', 'outfitter_domain' ),
    'update_item'           => __( 'Update Item', 'outfitter_domain' ),
    'view_item'             => __( 'View Page', 'outfitter_domain' ),
    'view_items'            => __( 'View Pages', 'outfitter_domain' ),
    'search_items'          => __( 'Search Item', 'outfitter_domain' ),
    'not_found'             => __( 'Not found', 'outfitter_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'outfitter_domain' ),
    'featured_image'        => __( 'Featured Image', 'outfitter_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'outfitter_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'outfitter_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'outfitter_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'outfitter_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'outfitter_domain' ),
    'items_list'            => __( 'Items list', 'outfitter_domain' ),
    'items_list_navigation' => __( 'Items list navigation', 'outfitter_domain' ),
    'filter_items_list'     => __( 'Filter items list', 'outfitter_domain' ),
  );
  $args = array(
    'label'                 => __( 'Outfitters Posts', 'outfitter_domain' ),
    'description'           => __( 'Outfitters Blog Posts', 'outfitter_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-admin-post',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',
    'show_in_rest'          => true,
  );
  register_post_type( 'flyfishing-news', $args );
  
}
add_action( 'init', 'california_flyfishing_news', 0 );

// Custom Taxonomy
add_action('init', 'custom_outfitterblog_tax');
function custom_outfitterblog_tax() {
  register_taxonomy(
    'outfitters',
    'flyfishing-news',
    array(
      'hierarchical'	=> true,
      'label'			=> __('Categories'),
      'query_var'		=> true,
      'rewrite'		=> true,
      'show_in_rest'  => true,
    )
  );
}
