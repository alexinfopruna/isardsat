<?php
//
// Your code goes below!
//
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//		Load Framework
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
define('WPEX_JS_DIR', get_stylesheet_directory_uri() . '/js');
define('WPEX_CSS_DIR', get_stylesheet_directory_uri() . '/css');

require_once('functions/aqua-resizer.php');
require_once('functions/image-default-sizes.php');
require_once('functions/pagination.php');

// CHILD THEME
function mytheme_custom_scripts() {
  wp_register_style('north', get_stylesheet_directory_uri() . '/style.css');
  wp_enqueue_style('north');
  // Register and Enqueue a Script
  // get_stylesheet_directory_uri will look up child theme location
  wp_register_script('custom-script', get_stylesheet_directory_uri() . '/js/isardsat_north.js', array('jquery', 'isotope'), null, true);
  wp_enqueue_script('custom-script');

  wp_enqueue_script('jquery-masonry', '', array('jquery'), true);
  wp_enqueue_script('wpex-global', WPEX_JS_DIR . '/global.js', false, '1.0', true);
}

add_action('wp_enqueue_scripts', 'mytheme_custom_scripts', 15);





/**
 * Custom Excerpt Length
 *
 * @package WordPress
 * @subpackage Pronto
 * @since Pronto 1.0
 */
// Filters
add_filter('excerpt_length', 'wpex_custom_excerpt_length', 999);
add_filter('excerpt_more', 'wpex_excerpt_more');


// Custom excerpt length
if (!function_exists('wpex_excerpt_more')) {
  
}

function wpex_custom_excerpt_length($length) {
  return 10;
}

// Custom excert "more"
if (!function_exists('wpex_excerpt_more')) {

  function wpex_excerpt_more($more) {
    if (get_theme_mod('wpex_blog_readmore', '') == '1') {
      global $post;
      return '<a class="moretag" href="' . get_permalink($post->ID) . '">' . __('continue reading', 'wpex') . '</a>';
    }
    else {
      //global $post;
      //return '<a class="moretag" href="' . get_permalink($post->ID) . '">' . __('continue reading', 'wpex') . '</a>';
      return '...';
    }
  }

}

function isard_blog_post_content() {

  global $post;

  $post_format = get_post_format($post->ID);

  if (!$post_format) {
    $post_format = 'standard';
  }

  $blog_head_class = '';
  if (has_post_thumbnail($post->ID) && $post_format != 'video') {
    $blog_head_class = ' inner-head t-shadow';
  }
  ?>
  <div <?php post_class(); ?>>



      <!-- Post Details -->
      <div class="details">
          <!-- Post Infos -->
          <div class="post-info">
              <!-- Post Item -->
              <a href="<?php echo get_the_author_meta('user_url'); ?>" class="post-item">
                  <i class="fa fa-user"></i>
  <?php the_author(); ?>

              </a>
              <!-- Post Item -->
              <span class="post-item">
                  <i class="fa fa-tags"></i>
  <?php the_category(', '); ?>
              </span>
              <!-- Post Item -->
              <a href="<?php echo get_permalink($post->ID) . '#comments' ?>" title="<?php _e('View comments', 'veented'); ?>" class="post-item">
                  <i class="fa fa-comments"></i>
  <?php comments_number('0', '1', '%');
  echo ' ';
  _e('Comments', 'vntd_north'); ?>
              </a>
          </div>
          <!-- End Post Infos -->
          <!-- Post Description -->
          <?php
          if (!is_single()) {
            echo vntd_excerpt(240, true, 'post-text');
          }
          ?>		
      </div>
      <!-- End Post Details -->

  <?php
  if (is_single()) {

    the_content();
  }
  ?>

  </div>

      <?php
    }

//
// Page Title Function
//

    function isardsat_print_page_title() {

      global $post, $smof_data;

      $page_id = 1;

      if (get_post_type() == 'services' || get_post_type() == 'testimonials') {
        return false;
      }

      if (is_object($post)) {
        $page_id = $post->ID;
      }

      $page_title = get_the_title($page_id);

      if (is_home()) {
        $page_title = __('Blog', 'vntd_north');
      }

      $page_tagline_wrap = '';

      if (get_post_meta($page_id, 'page_subtitle', TRUE)) {
        $page_tagline_wrap = '<p class="p-desc">' . get_post_meta($page_id, 'page_subtitle', TRUE) . '</p>';
      }

      if (is_search()) {
        $page_title = __('Search', 'vntd_north');
        $page_tagline_wrap = '<p class="p-desc">' . __('Search results for: ', 'vntd_north') . get_search_query() . '</p>';
      }

      if (class_exists('Woocommerce')) {
        if (is_shop()) {
          $page_title = get_the_title(get_option('woocommerce_shop_page_id'));
        }
      }
      ?>

  <section id="page-title" class="page_header">
      <div class="page_header_inner clearfix">
          <div class="p_head_left f-left">
              <h1 class="p-header font-primary uppercase">
  <?php echo $page_title; ?>
              </h1>
  <?php echo $page_tagline_wrap; ?>
          </div>
      </div>
  </section>

              <?php
            }
            