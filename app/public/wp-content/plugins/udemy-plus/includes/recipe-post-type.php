<?php


function up_recipe_post_type()
{
    $labels = array(
        'name' => _x('Recipes', 'Post type general name', 'udemy-plus'),
        'singular_name' => _x('Recipe', 'Post type singular name', 'udemy-plus'),
        'menu_name' => _x('Recipes', 'Admin Menu text', 'udemy-plus'),
        'name_admin_bar' => _x('Recipe', 'Add New on Toolbar', 'udemy-plus'),
        'add_new' => __('Add New', 'udemy-plus'),
        'add_new_item' => __('Add New Recipe', 'udemy-plus'),
        'new_item' => __('New Recipe', 'udemy-plus'),
        'edit_item' => __('Edit Recipe', 'udemy-plus'),
        'view_item' => __('View Recipe', 'udemy-plus'),
        'all_items' => __('All Recipes', 'udemy-plus'),
        'search_items' => __('Search Recipes', 'udemy-plus'),
        'parent_item_colon' => __('Parent Recipes:', 'udemy-plus'),
        'not_found' => __('No books found.', 'udemy-plus'),
        'not_found_in_trash' => __('No books found in Trash.', 'udemy-plus'),
        'featured_image' => _x('Recipe Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'udemy-plus'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'udemy-plus'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'udemy-plus'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'udemy-plus'),
        'archives' => _x('Recipe archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'udemy-plus'),
        'insert_into_item' => _x('Insert into recipe', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'udemy-plus'),
        'uploaded_to_this_item' => _x('Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'udemy-plus'),
        'filter_items_list' => _x('Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'udemy-plus'),
        'items_list_navigation' => _x('Recipes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'udemy-plus'),
        'items_list' => _x('Recipes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'udemy-plus'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'book'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('recipe', $args);
}