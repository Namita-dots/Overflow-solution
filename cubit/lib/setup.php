<?php

// Register menu locations
add_action('after_setup_theme', 'register_primary_menus');
function register_primary_menus()
{
  register_nav_menus(array(
    'header' => 'Header',
    'footer_site' => 'Footer - Site',
    'footer_popular' => 'Footer - Popular',
    'footer_corporate' => 'Footer - Corporate',
    'footer_landing_page' => 'Footer - For Landing Pages',
  ));
}

// Theme setup
add_theme_support('title-tag');
add_action('after_setup_theme', 'add_theme_supports');
function add_theme_supports()
{
  add_theme_support('post-thumbnails');
}

add_image_size('480w', '480');
// add_image_size('640w', '640');
add_image_size('750w', '750');
// add_image_size('828w', '828');
add_image_size('1080w', '1080');
// add_image_size('1200w', '1200');
add_image_size('1920w', '1920');
// add_image_size('2048w', '2048');
add_image_size('3840w', '3840');

add_filter('intermediate_image_sizes_advanced', 'remove_image_sizes', 10, 2);
function remove_image_sizes($sizes, $metadata)
{
  unset($sizes['medium_large']);
  unset($sizes['large']);
  unset($sizes['1536x1536']);
  unset($sizes['2048x2048']);
  return $sizes;
}


// Give editor role capability to edit theme (e.g. menus)
$editor = get_role('editor');
$editor->add_cap('edit_theme_options');

add_filter('excerpt_length', 'custom_excerpt_length');
function custom_excerpt_length($length)
{
  return 30;
}

add_filter('excerpt_more', 'custom_excerpt_more');
function custom_excerpt_more($more)
{
  return '...';
}

// Add the "Site Config" & "Components" settings page in the wordpress admin dashboard
if (class_exists('ACF')) {
  acf_add_options_page(array(
    'page_title' => __('Site Configuration'),
    'menu_title' => __('Site Configuration'),
    'redirect' => false,
  ));

  acf_add_options_page(array(
    'page_title' => __('Global Components'),
    'menu_title' => __('Global Components'),
    'redirect' => false,
    'icon_url' => 'dashicons-screenoptions',
  ));
}

// Give editor role capability to edit theme (e.g. menus)
$editor = get_role('editor');
$editor->add_cap('edit_theme_options');

// Prevent Yoas Seo plugin from pinging google (100s of times) 
// to recrawl the sitemap.xml when syncing acf fields from json
add_action('admin_init', 'prevent_yoast_from_pinging_google_on_acf_field_sync', 10, 0);
function prevent_yoast_from_pinging_google_on_acf_field_sync()
{
  if (isset($_GET['acfsync']) || (isset($_GET['action']) && $_GET['action'] == 'acfsync') || (isset($_GET['action2']) && $_GET['action2'] == 'acfsync')) {
    add_filter('wpseo_allow_xml_sitemap_ping', '__return_false');
  }
}

// Save reading_time metadata on post update
add_action('save_post_post', 'update_post_reading_time', 10, 2);
function update_post_reading_time($post_ID, $post)
{
  $average_words_read_per_minute = 200;
  $word_count = str_word_count(strip_tags($post->post_content));
  $reading_time = ceil($word_count / $average_words_read_per_minute);
  update_post_meta($post_ID, 'reading_time', $reading_time);
}

// Redirect category pages to home page
add_action('template_redirect', 'redirect_category_pages_to_home_page');
function redirect_category_pages_to_home_page()
{
  if (is_category()) {
    wp_redirect(home_url(), 301);
    die();
  }
}

/**
 * Automatically add IDs to headings such as <h2></h2>
 */
add_filter('the_content', 'auto_id_headings');
function auto_id_headings($content)
{
  $content = preg_replace_callback('/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function ($matches) {
    if (!stripos($matches[0], 'id=')) :
      $matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title($matches[3]) . '">' . $matches[3] . $matches[4];
    endif;
    return $matches[0];
  }, $content);

  return $content;
}

// Populate choices for a post's Table of Contents "Heading" field 
// based on the headings in the post content

add_filter('embed_oembed_html', 'wrap_embed_with_div');
function wrap_embed_with_div($html)
{
  ob_start();
  include get_component_path('global/video-component/start');
  echo $html;
  include get_component_path('global/video-component/end');
  $new_html = ob_get_clean();
  return $new_html;
}
/**
 * Created function that would limit category select to single checkbox at a time
 * Used In : Our Services
 *
 * @return void
 */
function create_single_selection_script()
{
  global $typenow;
  if ($typenow == 'our-services') {
?>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('input[type="checkbox"][name^="tax_input[service-type]"]').on('change', function() {
          var checkboxes = $('input[type="checkbox"][name^="tax_input[service-type]"]');
          checkboxes.not(this).prop('checked', false);
        });
      });
    </script>
<?php
  }
}
add_action('admin_footer', 'create_single_selection_script');
