<?php
/*
 * Traval Custom Post Type
 */
add_theme_support('post-thumbnails');
add_post_type_support( 'travel_cpt', 'thumbnail' );

// Register Custom Post Type
function travel_cpt() {

	$labels = array(
		'name'                  => _x( 'Travel Pages', 'Post Type General Name', 'travel_domain' ),
		'singular_name'         => _x( 'Travel Page', 'Post Type Singular Name', 'travel_domain' ),
		'menu_name'             => __( 'Travel Pages', 'travel_domain' ),
		'name_admin_bar'        => __( 'Travel Page', 'travel_domain' ),
		'archives'              => __( 'Item Archives', 'travel_domain' ),
		'attributes'            => __( 'Item Attributes', 'travel_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'travel_domain' ),
		'all_items'             => __( 'All Items', 'travel_domain' ),
		'add_new_item'          => __( 'Add New Item', 'travel_domain' ),
		'add_new'               => __( 'Add New', 'travel_domain' ),
		'new_item'              => __( 'New Item', 'travel_domain' ),
		'edit_item'             => __( 'Edit Page', 'travel_domain' ),
		'update_item'           => __( 'Update Item', 'travel_domain' ),
		'view_item'             => __( 'View Page', 'travel_domain' ),
		'view_items'            => __( 'View Pages', 'travel_domain' ),
		'search_items'          => __( 'Search Item', 'travel_domain' ),
		'not_found'             => __( 'Not found', 'travel_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'travel_domain' ),
		'featured_image'        => __( 'Featured Image', 'travel_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'travel_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'travel_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'travel_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'travel_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'travel_domain' ),
		'items_list'            => __( 'Items list', 'travel_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'travel_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'travel_domain' ),
	);
	$args = array(
		'label'                 => __( 'Travel Pages', 'travel_domain' ),
		'description'           => __( 'Travel Pages', 'travel_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 96,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
    'show_in_rest'          => true,
    'rewrite' => array('slug' => 'travel', 'with_front' => false ),
	);
	register_post_type( 'travel_cpt', $args );

}
add_action( 'init', 'travel_cpt', 0 );

// Custom Taxonomy
add_action('init', 'custom_travel_tax');
function custom_travel_tax() {
	register_taxonomy(
	'travel-category',
	'travel_cpt',
			array(
			'hierarchical'	=> true,
			'label'			=> __('Travel Categories'),
			'query_var'		=> true,
			'rewrite'		=> true,
      'show_in_rest'  => true
		)
	);
}
