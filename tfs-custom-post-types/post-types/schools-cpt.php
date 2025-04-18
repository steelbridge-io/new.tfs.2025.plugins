<?php
/*
 * Schools Custom Post Type
 */

// Register Custom Post Type
function schools_post() {

	$labels = array(
		'name'                  => _x( 'Schools', 'Post Type General Name', 'schools_domain' ),
		'singular_name'         => _x( 'Schools', 'Post Type Singular Name', 'schools_domain' ),
		'menu_name'             => __( 'Schools', 'schools_domain' ),
		'name_admin_bar'        => __( 'Schools Page ', 'schools_domain' ),
		'archives'              => __( 'Item Archives', 'schools_domain' ),
		'attributes'            => __( 'Item Attributes', 'schools_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'schools_domain' ),
		'all_items'             => __( 'All Items', 'schools_domain' ),
		'add_new_item'          => __( 'Add New Item', 'schools_domain' ),
		'add_new'               => __( 'Add New', 'schools_domain' ),
		'new_item'              => __( 'New Item', 'schools_domain' ),
		'edit_item'             => __( 'Edit Page', 'schools_domain' ),
		'update_item'           => __( 'Update Item', 'schools_domain' ),
		'view_item'             => __( 'View Page', 'schools_domain' ),
		'view_items'            => __( 'View Pagess', 'schools_domain' ),
		'search_items'          => __( 'Search Item', 'schools_domain' ),
		'not_found'             => __( 'Not found', 'schools_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'schools_domain' ),
		'featured_image'        => __( 'Featured Image', 'schools_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'schools_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'schools_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'schools_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'schools_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'schools_domain' ),
		'items_list'            => __( 'Items list', 'schools_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'schools_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'schools_domain' ),
	);
	$args = array(
		'label'                 => __( 'Schools', 'schools_domain' ),
		'description'           => __( 'Schools', 'schools_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 97,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite'								=> 'true'
	);
	register_post_type( 'schools_cpt', $args );

}
add_action( 'init', 'schools_post', 0 );

// Custom Taxonomy

function custom_schools_tax() {
	register_taxonomy(
	'schoolstax',
	'schools_cpt',
			array(
			'hierarchical'			=> true,
			'label'							=> __('Schools Categories'),
			'query_var'					=> true,
			'save_in_nav_menus'	=> true,
			'rewrite'						=> true
		)
	);
}
add_action('init', 'custom_schools_tax');
