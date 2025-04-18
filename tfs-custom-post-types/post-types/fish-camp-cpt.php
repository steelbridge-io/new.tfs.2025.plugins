<?php
/*
 * Fish Camp Custom Post Type
 */

// Register Custom Post Type
function fishcamp_post() {

	$labels = array(
		'name'                  => _x( 'Fish Camp', 'Post Type General Name', 'fishcamp_domain' ),
		'singular_name'         => _x( 'Fish Camp', 'Post Type Singular Name', 'fishcamp_domain' ),
		'menu_name'             => __( 'Fish Camp', 'fishcamp_domain' ),
		'name_admin_bar'        => __( 'Fish Camp Page', 'fishcamp_domain' ),
		'archives'              => __( 'Item Archives', 'fishcamp_domain' ),
		'attributes'            => __( 'Item Attributes', 'fishcamp_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'fishcamp_domain' ),
		'all_items'             => __( 'All Items', 'fishcamp_domain' ),
		'add_new_item'          => __( 'Add New Item', 'fishcamp_domain' ),
		'add_new'               => __( 'Add New', 'fishcamp_domain' ),
		'new_item'              => __( 'New Item', 'fishcamp_domain' ),
		'edit_item'             => __( 'Edit Page', 'fishcamp_domain' ),
		'update_item'           => __( 'Update Item', 'fishcamp_domain' ),
		'view_item'             => __( 'View Page', 'fishcamp_domain' ),
		'view_items'            => __( 'View Pagess', 'fishcamp_domain' ),
		'search_items'          => __( 'Search Item', 'fishcamp_domain' ),
		'not_found'             => __( 'Not found', 'fishcamp_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'fishcamp_domain' ),
		'featured_image'        => __( 'Featured Image', 'fishcamp_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'fishcamp_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'fishcamp_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'fishcamp_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'fishcamp_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'fishcamp_domain' ),
		'items_list'            => __( 'Items list', 'fishcamp_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'fishcamp_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'fishcamp_domain' ),
	);
	$args = array(
		'label'                 => __( 'Fish Camp', 'fishcamp_domain' ),
		'description'           => __( 'Fish Camp', 'fishcamp_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 99,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'fishcamp_cpt', $args );

}
add_action( 'init', 'fishcamp_post', 0 );

// Custom Taxonomy
add_action('init', 'custom_fishcamp_tax');
function custom_fishcamp_tax() {
	register_taxonomy(
	'fishcamp-category',
	'fishcamp_cpt',
			array(
			'hierarchical'	=> true,
			'label'					=> __('Fish Camp Categories'),
			'query_var'			=> true,
			'rewrite'				=> true
		)	
	);
}
