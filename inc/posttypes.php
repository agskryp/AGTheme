<?php
/**
 * Post types compatibility file.
 *
 * specifically for portfolio feature.
 *
 * @package AG_Theme
 */

/* Copyright 2017 Andrew Skrypnyk
 * 
 * This program is free software but should be used with caution.
 */

function my_custom_posttypes() {
    $labels = array(
        'name'              => 'Portfolio',
        'singular_name'     => 'Portfolio',
        'menu_name'         => 'Portfolio',
        'name_admin_bar'    => 'Portfolio',
        'add_new'           => 'Add New',
        'add_new_item'      => 'Add New Project',
        'new_item'          => 'New Project',
        'edit_item'         => 'Edit Project',
        'view_item'         => 'View Project',
        'all_items'         => 'All Projects',
        'search_items'      => 'Search Portfolio',
        'parent_item_colon' => 'Parent Project',
        'not_found'         => 'This project could not be found',
        'not_found_in_trash'=> 'This project cound not be found in the trash',
    );
            
    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'publicly_queryable'=> true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'menu_position'     => 5,
        'menu_icon'         => 'dashicons-list-view',
        'query_var'         => true,
        'rewrite'           => array(
            'slug'          => 'portfolio',
        ),
        'capability_type'   => 'post',
        'has_archive'       => true,
        'hierarchical'      => false,
        'supports'          => array(
            'title',
            'editor',
            'thumbnail',
            'revisions',
        )
    );
    register_post_type( 'portfolio', $args );
}

add_action( 'init', 'my_custom_posttypes' );

function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    my_custom_posttypes();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );