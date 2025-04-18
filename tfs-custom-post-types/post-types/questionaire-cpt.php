<?php
/*
 * Private Water Custom Post Type
 */

// Register Custom Post Type
function travelquestionaire_post() {

	$labels = array(
		'name'                  => _x( 'Travel Docs', 'Post Type General Name', 'the-fly-shop' ),
		'singular_name'         => _x( 'Private Water', 'Post Type Singular Name', 'the-fly-shop' ),
		'menu_name'             => __( 'Travel Docs', 'the-fly-shop' ),
		'name_admin_bar'        => __( 'Travel Docs Page', 'the-fly-shop' ),
		'archives'              => __( 'Item Archives', 'the-fly-shop' ),
		'attributes'            => __( 'Item Attributes', 'the-fly-shop' ),
		'parent_item_colon'     => __( 'Parent Item:', 'the-fly-shop' ),
		'all_items'             => __( 'All Items', 'the-fly-shop' ),
		'add_new_item'          => __( 'Add New Item', 'the-fly-shop' ),
		'add_new'               => __( 'Add New', 'the-fly-shop' ),
		'new_item'              => __( 'New Item', 'the-fly-shop' ),
		'edit_item'             => __( 'Edit Page', 'the-fly-shop' ),
		'update_item'           => __( 'Update Item', 'the-fly-shop' ),
		'view_item'             => __( 'View Page', 'the-fly-shop' ),
		'view_items'            => __( 'View Pagess', 'the-fly-shop' ),
		'search_items'          => __( 'Search Item', 'the-fly-shop' ),
		'not_found'             => __( 'Not found', 'the-fly-shop' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'the-fly-shop' ),
		'featured_image'        => __( 'Featured Image', 'the-fly-shop' ),
		'set_featured_image'    => __( 'Set featured image', 'the-fly-shop' ),
		'remove_featured_image' => __( 'Remove featured image', 'the-fly-shop' ),
		'use_featured_image'    => __( 'Use as featured image', 'the-fly-shop' ),
		'insert_into_item'      => __( 'Insert into item', 'the-fly-shop' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'the-fly-shop' ),
		'items_list'            => __( 'Items list', 'the-fly-shop' ),
		'items_list_navigation' => __( 'Items list navigation', 'the-fly-shop' ),
		'filter_items_list'     => __( 'Filter items list', 'the-fly-shop' ),
	);
	$args = array(
		'label'                 => __( 'Private Water', 'the-fly-shop' ),
		'description'           => __( 'Travel Docs', 'the-fly-shop' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
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
	register_post_type( 'travel-questionaire', $args );

}
add_action( 'init', 'travelquestionaire_post', 0 );

// Custom Taxonomy
add_action('init', 'custom_travelquestionaire_tax');
function custom_travelquestionaire_tax() {
	register_taxonomy(
	'travelquestionaire-category',
	'travel-questionaire',
			array(
			'hierarchical'	=> true,
			'label'					=> __('Travel Docs Categories'),
			'query_var'			=> true,
			'rewrite'				=> true
		)
	);
}
