<?php
/*
Taxonomies
*/

add_action( 'init', 'abv_add_activities', 1 );

function abv_add_activities() {

    $labels = array(
        'name'                       => _x( 'Activities', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Activity', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Activities', 'text_domain' ),
        'all_items'                  => __( 'All Activities', 'text_domain' ),
        'parent_item'                => __( 'Parent Activity', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Activity:', 'text_domain' ),
        'new_item_name'              => __( 'New Activity Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Activity', 'text_domain' ),
        'edit_item'                  => __( 'Edit Activity', 'text_domain' ),
        'update_item'                => __( 'Update Activity', 'text_domain' ),
        'view_item'                  => __( 'View Activity', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate Activities with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Activities', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Activities', 'text_domain' ),
        'search_items'               => __( 'Search Activities', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No activities', 'text_domain' ),
        'items_list'                 => __( 'Activities list', 'text_domain' ),
        'items_list_navigation'      => __( 'Activities list navigation', 'text_domain' ),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => false,
    );

    register_taxonomy( 'abv_activity', array( 'abv_portfolio' ), $args );
}
