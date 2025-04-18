<?php
/*
 * Outfitetrs Blog Custom Post Type
 */
add_theme_support('post-thumbnails');
add_post_type_support( 'lower48', 'thumbnail' );

// Register Custom Post Type
function lowerfortyeight() {
  
  $labels = array(
    'name'                  => _x( 'Lower 48 Travel', 'Post Type General Name', 'lower_fourtyeight_domain' ),
    'singular_name'         => _x( 'Lower 48 Page', 'Post Type Singular Name', 'lower_fourtyeight_domain' ),
    'menu_name'             => __( 'Lower 48 Travel', 'lower_fourtyeight_domain' ),
    'name_admin_bar'        => __( 'Lower 48 Travel', 'lower_fourtyeight_domain' ),
    'archives'              => __( 'Item Archives', 'lower_fourtyeight_domain' ),
    'attributes'            => __( 'Item Attributes', 'lower_fourtyeight_domain' ),
    'parent_item_colon'     => __( 'Parent Item:', 'lower_fourtyeight_domain' ),
    'all_items'             => __( 'All Lower 48 Pages', 'lower_fourtyeight_domain' ),
    'add_new_item'          => __( 'Add New Item', 'lower_fourtyeight_domain' ),
    'add_new'               => __( 'Add New', 'lower_fourtyeight_domain' ),
    'new_item'              => __( 'New Item', 'lower_fourtyeight_domain' ),
    'edit_item'             => __( 'Edit Page', 'lower_fourtyeight_domain' ),
    'update_item'           => __( 'Update Item', 'lower_fourtyeight_domain' ),
    'view_item'             => __( 'View Page', 'lower_fourtyeight_domain' ),
    'view_items'            => __( 'View Pages', 'lower_fourtyeight_domain' ),
    'search_items'          => __( 'Search Item', 'lower_fourtyeight_domain' ),
    'not_found'             => __( 'Not found', 'lower_fourtyeight_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'lower_fourtyeight_domain' ),
    'featured_image'        => __( 'Featured Image', 'lower_fourtyeight_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'lower_fourtyeight_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'lower_fourtyeight_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'lower_fourtyeight_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'lower_fourtyeight_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'lower_fourtyeight_domain' ),
    'items_list'            => __( 'Items list', 'lower_fourtyeight_domain' ),
    'items_list_navigation' => __( 'Items list navigation', 'lower_fourtyeight_domain' ),
    'filter_items_list'     => __( 'Filter items list', 'lower_fourtyeight_domain' ),
  );
  $args = array(
    'label'                 => __( 'Lower 48 Posts', 'lower_fourtyeight_domain' ),
    'description'           => __( 'Lower 48 Blog Posts', 'lower_fourtyeight_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
    'hierarchical'          => true,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 94,
    'menu_icon'             => 'dashicons-admin-page',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'show_in_rest'          => true,
  );
  register_post_type( 'lower48', $args );
  
}
add_action( 'init', 'lowerfortyeight', 0 );

// Custom Taxonomy
add_action('init', 'lower_fourtyeight_tax');
function lower_fourtyeight_tax() {
  register_taxonomy(
    'lwr48',
    'lower48',
    array(
      'hierarchical'	=> true,
      'label'			=> __('Categories'),
      'query_var'		=> true,
      'rewrite'		=> true,
      'show_in_rest'  => true,
    )
  );
}
