<?php
/*
 * Outfitetrs Blog Custom Post Type
 */
add_theme_support('post-thumbnails');
add_post_type_support( 'lower48blog', 'thumbnail' );

// Register Custom Post Type
function lower48_blog() {
  
  $labels = array(
    'name'                  => _x( 'Lower 48 Posts', 'Post Type General Name', 'lower48_domain' ),
    'singular_name'         => _x( 'Lower 48 Post', 'Post Type Singular Name', 'lower48_domain' ),
    'menu_name'             => __( 'Lower 48 Posts', 'lower48_domain' ),
    'name_admin_bar'        => __( 'Outfitter Post', 'lower48_domain' ),
    'archives'              => __( 'Item Archives', 'lower48_domain' ),
    'attributes'            => __( 'Item Attributes', 'lower48_domain' ),
    'parent_item_colon'     => __( 'Parent Item:', 'lower48_domain' ),
    'all_items'             => __( 'All Posts', 'lower48_domain' ),
    'add_new_item'          => __( 'Add New Item', 'lower48_domain' ),
    'add_new'               => __( 'Add New', 'lower48_domain' ),
    'new_item'              => __( 'New Item', 'lower48_domain' ),
    'edit_item'             => __( 'Edit Page', 'lower48_domain' ),
    'update_item'           => __( 'Update Item', 'lower48_domain' ),
    'view_item'             => __( 'View Page', 'lower48_domain' ),
    'view_items'            => __( 'View Pages', 'lower48_domain' ),
    'search_items'          => __( 'Search Item', 'lower48_domain' ),
    'not_found'             => __( 'Not found', 'lower48_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'lower48_domain' ),
    'featured_image'        => __( 'Featured Image', 'lower48_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'lower48_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'lower48_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'lower48_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'lower48_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'lower48_domain' ),
    'items_list'            => __( 'Items list', 'lower48_domain' ),
    'items_list_navigation' => __( 'Items list navigation', 'lower48_domain' ),
    'filter_items_list'     => __( 'Filter items list', 'lower48_domain' ),
  );
  $args = array(
    'label'                 => __( 'Lower 48 Posts', 'lower48_domain' ),
    'description'           => __( 'Lower 48 Blog Posts', 'lower48_domain' ),
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
  register_post_type( 'lower48blog', $args );
  
}
add_action( 'init', 'lower48_blog', 0 );

// Custom Taxonomy
add_action('init', 'lower48_blog_cat');
function lower48_blog_cat() {
  register_taxonomy(
    'lwr48blog',
    'lower48blog',
    array(
      'hierarchical'	=> true,
      'label'			=> __('Categories'),
      'query_var'		=> true,
      'rewrite'		=> true,
      'show_in_rest'  => true,
    )
  );
}
