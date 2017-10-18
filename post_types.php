<?php
/*
Adding post types
*/

add_action( 'init', 'abv_add_portfolio', 0 );

function abv_add_portfolio() {

	$labels = array(
		'name'                  => _x( 'Portfolio', 'Post Type General Name', 'abv-portfolio' ),
		'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'abv-portfolio' ),
		'menu_name'             => __( 'Portfolio', 'abv-portfolio' ),
		'name_admin_bar'        => __( 'Post Type', 'abv-portfolio' ),
		'archives'              => __( 'Item Archives', 'abv-portfolio' ),
		'attributes'            => __( 'Item Attributes', 'abv-portfolio' ),
		'parent_item_colon'     => __( 'Parent Item:', 'abv-portfolio' ),
		'all_items'             => __( 'Все фотографии', 'abv-portfolio' ),
		'add_new_item'          => __( 'Добавить новую фотографию', 'abv-portfolio' ),
		'add_new'               => __( 'Добавить новую', 'abv-portfolio' ),
		'new_item'              => __( 'New Item', 'abv-portfolio' ),
		'edit_item'             => __( 'Edit Item', 'abv-portfolio' ),
		'update_item'           => __( 'Update Item', 'abv-portfolio' ),
		'view_item'             => __( 'View Item', 'abv-portfolio' ),
		'view_items'            => __( 'View Items', 'abv-portfolio' ),
		'search_items'          => __( 'Search Item', 'abv-portfolio' ),
		'not_found'             => __( 'Not found', 'abv-portfolio' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'abv-portfolio' ),
		'featured_image'        => __( 'Featured Image', 'abv-portfolio' ),
		'set_featured_image'    => __( 'Set featured image', 'abv-portfolio' ),
		'remove_featured_image' => __( 'Remove featured image', 'abv-portfolio' ),
		'use_featured_image'    => __( 'Use as featured image', 'abv-portfolio' ),
		'insert_into_item'      => __( 'Insert into item', 'abv-portfolio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'abv-portfolio' ),
		'items_list'            => __( 'Items list', 'abv-portfolio' ),
		'items_list_navigation' => __( 'Items list navigation', 'abv-portfolio' ),
		'filter_items_list'     => __( 'Filter items list', 'abv-portfolio' ),
	);

	$capabilities = array(
		'edit_post'             => 'edit_portfolio',
		'read_post'             => 'read_portfolio',
		'delete_post'           => 'delete_portfolio',
		'edit_posts'            => 'edit_portfolio',
		'edit_others_posts'     => 'edit_others_portfolio',
		'publish_posts'         => 'publish_portfolio',
		'read_private_posts'    => 'read_private_portfolio',
	);

	$args = array(
    'label'                 => __( 'Portfolio', 'abv-portfolio' ),
    'description'           => __( 'My work sample', 'abv-portfolio' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'author', ),
    'taxonomies'            => array(),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 20,
    'menu_icon'             => 'dashicons-images-alt',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    // 'capability_type'       => 'post',
    'show_in_rest'          => false,
		'capabilities'          => $capabilities,
	);

  register_post_type( 'abv_portfolio', $args );

}
