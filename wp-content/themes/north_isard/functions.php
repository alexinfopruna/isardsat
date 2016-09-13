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

  wp_register_script('dotdotdot-script', get_stylesheet_directory_uri() . '/js/jQuery.dotdotdot-master/src/jquery.dotdotdot.min.js', array('jquery', 'isotope'), null, true);
  wp_enqueue_script('dotdotdot-script');

  wp_enqueue_script('jquery-masonry', '', array('jquery'), true);
  wp_enqueue_script('wpex-global', WPEX_JS_DIR . '/global.js', false, '1.0', true);
/*
  wp_enqueue_script('jquery-chosen', '', array('jquery'), true);
  wp_enqueue_script('jquery-chosen', 'https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.1/chosen.jquery.min.js', false, '1.0', true);
  wp_register_style('jquery-chosen', 'https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.1/chosen.min.css');
*/


  wp_register_style('isard-north-responsive', get_stylesheet_directory_uri() . '/css/responsive.css');
  wp_enqueue_style('isard-north-responsive'); // Load responsive stylesheet
  
  
  wp_enqueue_script( 'ajax_experiencia', get_stylesheet_directory_uri() . '/js/ajax_home_experiencia.js', array('jquery'), '1.0', true );
wp_localize_script( 'ajax_experiencia', 'ajaxexperiencia', array(
	'ajaxurl' =>  get_stylesheet_directory_uri().'/ajaxexperiencia.php' 


));
  
}

add_action('wp_enqueue_scripts', 'mytheme_custom_scripts', 15);

// MODIFICA EL RESPOSIVE
function wpdocs_dequeue_styles() {
  wp_dequeue_style('north-responsive');
}

add_action('wp_print_styles', 'wpdocs_dequeue_styles', 100);

// Substitueixo el grid (filters) pel meu
function isard_after_setup_theme() {
  remove_shortcode('portfolio_grid');
  add_shortcode('portfolio_grid', 'isard_portfolio_grid');


  add_filter('body_class', 'add_archive_class');
  // 
}

add_action('after_setup_theme', 'isard_after_setup_theme');


/* * ************************************************************************** */

add_action('widgets_init', 'isard_widgets_init');

function isard_widgets_init() {
  register_sidebar(array(
    'name' => __('Isard Right Sidebar', 'isardsat_north'),
    'id' => 'isardsat_north',
    'description' => __('Widgets in this area will be shown on all posts and pages.', 'isard_north'),
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
  ));
}

/* * ************************************************************************** */

add_filter( 'template_include', 'single_ajax_template' );

function single_ajax_template( $original_template ) {
 // $tdir = locate_template('single_ajax.php');
 // echo TEMPLATEPATH. " .$original_template.. $eee ..... ".get_stylesheet_directory()." *** ";
//  echo $original_template;die();
  $is_ajax_request = isset($_POST['action']) && ($_POST['action'] == 'ajax_experiencia');
  if ( $is_ajax_request ) {
    return get_stylesheet_directory() . '/single_ajax.php';
  } else {
    return $original_template;
  }
}



/**
 * Custom Excerpt Length
 *
 * @package WordPress
 * @subpackage Pronto
 * @since Pronto 1.0
 */
// Filters
add_filter('excerpt_length', 'isard_custom_excerpt_length', 999);
add_filter('excerpt_more', 'isard_excerpt_more');


// Custom excerpt length
if (!function_exists('isard_excerpt_more')) {
  
}

function isard_custom_excerpt_length($length) {

  return 10;
}

// Custom excert "more"
if (!function_exists('isard_excerpt_more')) {

  function isard_excerpt_more($more) {
    if (get_theme_mod('isard_blog_readmore', '') == '1') {
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

function add_archive_class($classes) {
  if (is_page_template('archive_all.php'))
    $classes[] = 'archive';
  return $classes;
}

function isard_vntd_blog_post_content() {
  global $post;

  $post_format = get_post_format($post->ID);

  if (!$post_format) {
    $post_format = 'standard';
  }

  $blog_head_class = '';
  if (FALSE && has_post_thumbnail($post->ID) && $post_format != 'video') {
    $blog_head_class = ' inner-head xxx t-shadow';
  }

  $prpo = get_previous_post();
  $prpoid = $prpo->ID;
  $prev_post_url = $prpoid?get_permalink($prpoid):"";

  $nepo = get_next_post();
  
  
  $nepoid = $nepo->ID;
  $next_post_url = $nepoid?get_permalink($nepoid):"";
  
  $back = __('Back to blog', 'vntd_north');
  ?>


  <div <?php post_class(); ?>>
      <!-- Post Header -->
      
      <?php
     // $map = array('en' => '/blog/','ca' => '/blog-2/');&#x21a4;
      $map = array('en' => '/blog/','ca' => '/blog/');
       $url = $map[ICL_LANGUAGE_CODE];
      ?>
            <div class = "custom_slider" >
                <a href="<?php echo $url; ?>" class="back-button" style="">  <?php echo $back; ?></a>
      <ul class = "flex-direction-nav">
          <?php if ($prpoid):?>
          <li><a class = "flex-prev" href = "<?php echo $prev_post_url?>" title="<?php  _e('Prev post'); ?>">Previous</a></li>
          <?php endif;?>
          <?php if ($nepoid):?>
          <li><a class = "flex-next" href = "<?php echo $next_post_url?>" title="<?php  _e('Next post'); ?>">Next</a></li></ul>
          <?php endif;?>
      </div>

      <div class="blog-head clearfix<?php echo $blog_head_class; ?>">
          
          <!-- javascript:history.back() -->
          <!-- Post Date -->
          <div class="blog-head-left t-center">
              <!-- Day -->
              <h1 class="uppercase bigger font-primary">
                  <?php the_time('d'); ?>
              </h1>
              <!-- Month, Year -->
              <p class="uppercase font-primary">
  <?php the_time('M Y'); ?>
              </p>
          </div>
          <!-- End Post Date -->
          <!-- Post Header -->
          <a href="<?php echo get_permalink($post->ID); ?>" class="blog-head-right ex-link t-left">
              <!-- Header -->
              <h1 class="uppercase font-primary">
              <?php echo get_the_title($post->ID); ?>
              </h1>
              <?php
              if (get_post_meta($post->ID, 'page_subtitle', TRUE)) {
                echo '<p>' . get_post_meta($post->ID, 'page_subtitle', TRUE) . '</p>';
              }
              ?>
          </a>


          <!-- Post Header -->
      </div>
      <!-- Post Header -->
  <?php //if (has_post_thumbnail()) vntd_post_media();  ?>	

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
                  <?php
                  comments_number('0', '1', '%');
                  echo ' ';
                  _e('Comments', 'vntd_north');
                  ?>
              </a>
          </div>



      </div>

      <!-- End Post Infos -->
      <!-- Post Description -->
      <?php
      if (!is_single()) {
        echo vntd_excerpt(240, true, 'post-text');
      }

?>
      </div>
      <!--End Post Details -->

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

  //return;

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

require_once 'isard-portfolio-grid.php';
