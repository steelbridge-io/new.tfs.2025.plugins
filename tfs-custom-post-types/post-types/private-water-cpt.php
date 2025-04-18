<?php
/*
 * Private Water Custom Post Type
 */

// Register Custom Post Type
function privatewater_post() {

	$labels = array(
		'name'                  => _x( 'Private Waters', 'Post Type General Name', 'privatewater_domain' ),
		'singular_name'         => _x( 'Private Water', 'Post Type Singular Name', 'privatewater_domain' ),
		'menu_name'             => __( 'Private Waters', 'privatewater_domain' ),
		'name_admin_bar'        => __( 'Private Waters Page', 'privatewater_domain' ),
		'archives'              => __( 'Item Archives', 'privatewater_domain' ),
		'attributes'            => __( 'Item Attributes', 'privatewater_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'privatewater_domain' ),
		'all_items'             => __( 'All Items', 'privatewater_domain' ),
		'add_new_item'          => __( 'Add New Item', 'privatewater_domain' ),
		'add_new'               => __( 'Add New', 'privatewater_domain' ),
		'new_item'              => __( 'New Item', 'privatewater_domain' ),
		'edit_item'             => __( 'Edit Page', 'privatewater_domain' ),
		'update_item'           => __( 'Update Item', 'privatewater_domain' ),
		'view_item'             => __( 'View Page', 'privatewater_domain' ),
		'view_items'            => __( 'View Pagess', 'privatewater_domain' ),
		'search_items'          => __( 'Search Item', 'privatewater_domain' ),
		'not_found'             => __( 'Not found', 'privatewater_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'privatewater_domain' ),
		'featured_image'        => __( 'Featured Image', 'privatewater_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'privatewater_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'privatewater_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'privatewater_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'privatewater_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'privatewater_domain' ),
		'items_list'            => __( 'Items list', 'privatewater_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'privatewater_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'privatewater_domain' ),
	);
	$args = array(
		'label'                 => __( 'Private Water', 'privatewater_domain' ),
		'description'           => __( 'Private Waters', 'privatewater_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 98,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'adventures', $args );

}
add_action( 'init', 'privatewater_post', 0 );

// Custom Taxonomy
add_action('init', 'custom_privatewater_tax');
function custom_privatewater_tax() {
	register_taxonomy(
	'privatewater-category',
	'adventures',
			array(
			'hierarchical'	=> true,
			'label'					=> __('Private Water Categories'),
			'query_var'			=> true,
			'rewrite'				=> true
		)
	);
}
