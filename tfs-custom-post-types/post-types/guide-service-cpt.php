<?php
/*
 * Guide Service Custom Post Type
*/

// Register Custom Post Type
function guide_service() {

	$labels = array(
		'name'                  => _x( 'Guide Service', 'Post Type General Name', 'guideservice_domain' ),
		'singular_name'         => _x( 'Guide Serviuce', 'Post Type Singular Name', 'guideservice_domain' ),
		'menu_name'             => __( 'Guide Service', 'guideservice_domain' ),
		'name_admin_bar'        => __( 'Guide Service Page', 'guideservice_domain' ),
		'archives'              => __( 'Item Archives', 'guideservice_domain' ),
		'attributes'            => __( 'Item Attributes', 'guideservice_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'guideservice_domain' ),
		'all_items'             => __( 'All Items', 'guideservice_domain' ),
		'add_new_item'          => __( 'Add New Item', 'guideservice_domain' ),
		'add_new'               => __( 'Add New', 'guideservice_domain' ),
		'new_item'              => __( 'New Item', 'guideservice_domain' ),
		'edit_item'             => __( 'Edit Page', 'guideservice_domain' ),
		'update_item'           => __( 'Update Item', 'guideservice_domain' ),
		'view_item'             => __( 'View Page', 'guideservice_domain' ),
		'view_items'            => __( 'View Pagess', 'guideservice_domain' ),
		'search_items'          => __( 'Search Item', 'guideservice_domain' ),
		'not_found'             => __( 'Not found', 'guideservice_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'guideservice_domain' ),
		'featured_image'        => __( 'Featured Image', 'guideservice_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'guideservice_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'guideservice_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'guideservice_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'guideservice_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'guideservice_domain' ),
		'items_list'            => __( 'Items list', 'guideservice_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'guideservice_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'guideservice_domain' ),
	);
	$args = array(
		'label'                 => __( 'Guide Service', 'guideservice_domain' ),
		'description'           => __( 'Guide Service', 'guideservice_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 95,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'guide_service', $args );

}
add_action( 'init', 'guide_service', 0 );

// Custom Taxonomy
add_action('init', 'custom_guideservice_tax');
function custom_guideservice_tax() {
	register_taxonomy(
	'guide-category',
	'guide_service',
			array(
			'hierarchical'	=> true,
			'label'					=> __('Guide Categories'),
			'query_var'			=> true,
			'rewrite'				=> true
		)
	);
}
