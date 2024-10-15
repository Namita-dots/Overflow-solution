<?php
// Make landing pages 404 if not logged in
add_action('template_redirect', 'nsr_redirect');
function nsr_redirect() {
  if (get_post_type() == 'landing-page') {
    // If we're not logged in or the query variable isn't set (by the cloudflare worker)
    if (!(is_user_logged_in() || isset($_GET['landing_page']))) {
      nocache_headers();
      status_header(404);
      include(get_query_template('404'));
      exit();
    }
  }
}

// If on a landing page website, remove all post types from sitemap except pages
// If on main website, remove landing pages from sitemap
add_filter('wpseo_sitemap_exclude_post_type', 'remove_all_post_types_from_sitemap_except_pages', 10, 2);
function remove_all_post_types_from_sitemap_except_pages($excluded, $post_type) {
  if (is_landing_page()) {
    if ($post_type !== 'page') {
      $excluded = true;
    }
  } else {
    if ($post_type == 'landing-page') {
      $excluded = true;
    }
  }
  return $excluded;
}

// Remove all taxonomies from sitemap
add_filter('wpseo_sitemap_exclude_taxonomy', '__return_true', 10, 2);


// If on a landing page website, only show pages in sitemap that are whitelisted in the 
// "Site Configuration" -> "Landing Page Sitemap" field
add_filter('wpseo_exclude_from_sitemap_by_post_ids', 'exclude_pages_for_landing_page_sitemap');
function exclude_pages_for_landing_page_sitemap($excluded_post_ids) {
  if (is_landing_page()) {
    $all_page_ids = get_posts([
      'post_type' => 'page',
      'post_status' => 'any',
      'posts_per_page' => -1,
      'fields' => 'ids'
    ]);
    // Contains all the pages that should show in the sitemap for landing pages
    $landing_page_sitemap = get_field('landing_page_sitemap', 'option');
    if (!$landing_page_sitemap) {
      $whitelisted_page_ids = [];
    } else {
      $whitelisted_page_ids = array_map(
        function ($row) {
          return $row['page']->ID;
        },
        $landing_page_sitemap
      );
    }
    // Do a set subtraction of $whitelisted_page_ids from $all_page_ids
    $blacklisted_page_ids = array_diff($all_page_ids, $whitelisted_page_ids);
    return $blacklisted_page_ids;
  }

  return $excluded_post_ids;
}

add_filter('cloudflare_purge_by_url', 'add_landing_page_query_var_to_cloudflare_purge', 10, 2);
function add_landing_page_query_var_to_cloudflare_purge($urls, $post_id) {
  if (get_post_type($post_id) == 'landing-page') {
    $urls = [];
    $page_ids = get_posts([
      'post_status' => 'any',
      'post_type' => 'page',
      'posts_per_page' => -1,
      'fields' => 'ids'
    ]);
    foreach ($page_ids as $page_id) {
      $urls[] = get_the_permalink($page_id) . '?landing_page=' . $post_id;
    }
    $urls[] = get_the_permalink($post_id) . '?landing_page=' . $post_id;
  }
  return $urls;
}

add_action('wp_head', function () {
  if (isset($_GET['landing_page'])) {
    $landing_page_id = (int) $_GET['landing_page'];
    echo get_field('scripts_in_header', $landing_page_id);
  }
}, 100);

add_action('wp_body_open', function () {
  if (isset($_GET['landing_page'])) {
    $landing_page_id = (int) $_GET['landing_page'];
    echo get_field('scripts_in_body', $landing_page_id);
  }
}, 100);

add_action('wp_footer', function () {
  if (isset($_GET['landing_page'])) {
    $landing_page_id = (int) $_GET['landing_page'];
    echo get_field('scripts_in_footer', $landing_page_id);
  }
}, 100);

add_action('wp_head', function () {
  if (isset($_GET['landing_page'])) {
    $landing_page_id = (int) $_GET['landing_page'];
    echo get_field('scripts_in_header', $landing_page_id);
  }
}, 1);

// Disable search engine crawling
add_filter('robots_txt', 'custom_robots', 9999999);
function custom_robots($output) {
  if (isset($_GET['landing_page'])) {
    return "User-agent: *\nDisallow: /";
  }
  return $output;
}

add_filter('wpseo_robots', 'update_robots_meta', 9999999);
function update_robots_meta($robots) {
  if (isset($_GET['landing_page'])) {
    return 'noindex, nofollow';
  } else {
    return $robots;
  }
}
