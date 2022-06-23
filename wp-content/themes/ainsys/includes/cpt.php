
<?php
/**
 * Register custom post types.
 *
 * @package ainsys
 */
/* Locations */
$labels = array(
    'name'               => 'FAQ Q&A',
    'singular_name'      => 'FAQ',
    'menu_name'          => 'FAQs',
    'name_admin_bar'     => 'FAQ',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New FAQ',
    'new_item'           => 'New FAQ',
    'edit_item'          => 'Edit FAQ',
    'view_item'          => 'View FAQ',
    'all_items'          => 'All FAQs',
    'search_items'       => 'Search FAQ',
    'parent_item_colon'  => 'Parent FAQ',
    'not_found'          => 'No FAQs',
    'not_found_in_trash' => 'No FAQs found in Trash.',
);
$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_rest'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'ufaq' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'permalink' ),
);
register_post_type( 'ufaq', $args );