<?php

// Makes urls with custom post type pagination, e.g. /resources/page/2
// query a page and not the post type (e.g. resource)
add_action('init', function () {
  add_rewrite_rule(
    '(.?.+?)/page/?([0-9]{1,})/?$',
    'index.php?pagename=$matches[1]&paged=$matches[2]',
    'top'
  );
});

add_action('init', 'register_custom_post_types');
function register_custom_post_types() {
  $labels = array(
    'name' => _x('Our Services', 'Post type general name', 'cubit'),
    'singular_name' => _x('Service', 'Post type singular name', 'cubit'),
    'menu_name' => _x('Our Services', 'Admin Menu text', 'cubit'),
    'name_admin_bar' => _x('Service', 'Add New on Toolbar', 'cubit'),
    'add_new' => __('Add New', 'cubit'),
    'add_new_item' => __('Add New Service', 'cubit'),
    'new_item' => __('New Service', 'cubit'),
    'edit_item' => __('Edit Service', 'cubit'),
    'view_item' => __('View Service', 'cubit'),
    'all_items' => __('All Services', 'cubit'),
    'search_items' => __('Search Services', 'cubit'),
    'parent_item_colon' => __('Parent Services:', 'cubit'),
    'not_found' => __('No services found.', 'cubit'),
    'not_found_in_trash' => __('No services found in Trash.', 'cubit'),
    'featured_image' => _x('Service Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'cubit'),
    'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'cubit'),
    'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'cubit'),
    'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'cubit'),
    'archives' => _x('Service archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'cubit'),
    'insert_into_item' => _x('Insert into service', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'cubit'),
    'uploaded_to_this_item' => _x('Uploaded to this service', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'cubit'),
    'filter_items_list' => _x('Filter services list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'cubit'),
    'items_list_navigation' => _x('Services list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'cubit'),
    'items_list' => _x('Services list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'cubit'),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'our-services'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title', 'excerpt'),
    'menu_icon' => 'dashicons-hammer',
    'show_in_nav_menus' => true,
  );

  register_post_type('our-services', $args);

  $labels = array(
    'name' => _x('Service Types', 'taxonomy general name', 'cubit'),
    'singular_name' => _x('Service Type', 'taxonomy singular name', 'cubit'),
    'search_items' => __('Search Service Types', 'cubit'),
    'popular_items' => __('Popular Service Types', 'cubit'),
    'all_items' => __('All Service Types', 'cubit'),
    'parent_item' => __('Parent Service Type', 'cubit'),
    'parent_item_colon' => __('Parent Service Type:', 'cubit'),
    'edit_item' => __('Edit Service Type', 'cubit'),
    'update_item' => __('Update Service Type', 'cubit'),
    'add_new_item' => __('Add New Service Type', 'cubit'),
    'new_item_name' => __('New Service Type Name', 'cubit'),
    'separate_items_with_commas' => __('Separate service types with commas', 'cubit'),
    'add_or_remove_items' => __('Add or remove service types', 'cubit'),
    'choose_from_most_used' => __('Choose from the most used service types', 'cubit'),
    'not_found' => __('No service types found.', 'cubit'),
    'menu_name' => __('Service Types', 'cubit'),
  );

  $args = array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'service-type'),
    'show_in_nav_menus' => false,
  );

  register_taxonomy('service-type', 'our-services', $args);

  $labels = array(
    'name' => _x('Our Team', 'Post type general name', 'cubit'),
    'singular_name' => _x('Team Member', 'Post type singular name', 'cubit'),
    'menu_name' => _x('Our Team', 'Admin Menu text', 'cubit'),
    'name_admin_bar' => _x('Team Member', 'Add New on Toolbar', 'cubit'),
    'add_new' => __('Add New', 'cubit'),
    'add_new_item' => __('Add New Team Member', 'cubit'),
    'new_item' => __('New Team Member', 'cubit'),
    'edit_item' => __('Edit Team Member', 'cubit'),
    'view_item' => __('View Team Member', 'cubit'),
    'all_items' => __('All Team Members', 'cubit'),
    'search_items' => __('Search Team Members', 'cubit'),
    'parent_item_colon' => __('Parent Team Members:', 'cubit'),
    'not_found' => __('No team members found.', 'cubit'),
    'not_found_in_trash' => __('No team members found in Trash.', 'cubit'),
    'featured_image' => _x('Team Member Photo', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'cubit'),
    'set_featured_image' => _x('Set team member photo', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'cubit'),
    'remove_featured_image' => _x('Remove team member photo', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'cubit'),
    'use_featured_image' => _x('Use as team member photo', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'cubit'),
    'archives' => _x('Team Member archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'cubit'),
    'insert_into_item' => _x('Insert into team member', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'cubit'),
    'uploaded_to_this_item' => _x('Uploaded to this team member', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'cubit'),
    'filter_items_list' => _x('Filter team members list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'cubit'),
    'items_list_navigation' => _x('Team members list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'cubit'),
    'items_list' => _x('Team members list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'cubit'),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'our-team'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title', 'excerpt'),
    'menu_icon' => 'dashicons-groups',
    'show_in_nav_menus' => true,
  );

  register_post_type('our-team', $args);

  $labels = array(
    'name' => _x('Designations', 'taxonomy general name', 'cubit'),
    'singular_name' => _x('Designation', 'taxonomy singular name', 'cubit'),
    'search_items' => __('Search Designations', 'cubit'),
    'all_items' => __('All Designations', 'cubit'),
    'edit_item' => __('Edit Designation', 'cubit'),
    'update_item' => __('Update Designation', 'cubit'),
    'add_new_item' => __('Add New Designation', 'cubit'),
    'new_item_name' => __('New Designation Name', 'cubit'),
    'menu_name' => __('Designations', 'cubit'),
  );

  $args = array(
    'hierarchical' => true, // Set this to true if Designations should have parent-child relationships
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'designation'), // Customize the slug as desired
    'show_in_nav_menus' => false,
  );

  register_post_type('career', array(
    'labels' => array(
      'name' => 'Careers',
      'singular_name' => 'Career',
      'add_new_item' => 'Add New Career',
      'edit_item' => 'Edit Career',
    ),
    'rewrite' => array(
      'with_front' => false,
      'slug' => 'careers',
    ),
    'has_archive' => false,
    'public' => true,
    'publicly_queryable' => false,
    'menu_icon' => 'dashicons-admin-post',
    'supports' => array('title'),
  ));

  register_post_type('partner', array(
    'labels' => array(
        'name' => 'Partners',
        'singular_name' => 'Partner',
        'add_new_item' => 'Add New Partner',
        'edit_item' => 'Edit Partner',
        'view_item' => 'View Partner',  // Add View Item label
    ),
    'rewrite' => array(
        'with_front' => false,
        'slug' => 'partners',
    ),
    'has_archive' => true,  // Allow archive pages
    'public' => true,
    'publicly_queryable' => true,  // Allow the post type to be publicly queried
    'menu_icon' => 'dashicons-admin-post',
    'supports' => array('title'),
    'show_in_rest' => true,  // Optionally enable REST API support for Gutenberg
));

  //register_taxonomy('designation', 'our-team', $args);
}
