<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Pronto
 * @since Pronto 1.0
 */
get_header();
?>

<style scoped="scoped">
    .sidebar{float:left;}
    .post-info{display:none;}
    .page-holder .page_inner {
        width: 100%;
        float: left;
    }

    #page-title{
        display:none;
    }
</style>
<a href="javascript: void(0)" id="toggle-btn"><i class="fa fa-bars"></i></a>
<div id="toggle-wrap" class="xxclr" style="">
    <div id="sidebar" class="page_sidebar">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('default_sidebar'))  ?>
    </div>
</div>

<div id="sidebar-right"  class="page_sidebar">
<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('isardsat_north')) ?>
</div>


<div id="ccprimary" class=" page-holder blog page-layout-64">

    <div id="content" class="site-content" role="main">
        <?php if (have_posts()) : ?>
          <header class="page-header archive-header">
              <h1 class="page-header-title archive-title"><?php
          if (is_day()) :
            printf(__('Daily Archives: %s', 'wpex'), get_the_date());
          elseif (is_month()) :
            printf(__('Monthly Archives: %s', 'wpex'), get_the_date(_x('F Y', 'monthly archives date format', 'wpex')));
          elseif (is_year()) :
            printf(__('Yearly Archives: %s', 'wpex'), get_the_date(_x('Y', 'yearly archives date format', 'wpex')));
          else :
            echo single_term_title();
          endif;
          ?></h1>
              <!--
                                      <div class="archive-description"><?php echo term_description(); ?></div>
              -->
          </header><!-- .archive-header -->
          <?php /* The loop */ ?>
          <div id="infinite-wrap" class="grid clr">
              <?php
              /*
                $args = array(
                'posts_per_page'   => 5,
                'offset'           => 0,
                'category'         => '',
                'category_name'    => '',
                'orderby'          => 'date',
                'order'            => 'DESC',
                'include'          => '',
                'exclude'          => '',
                'meta_key'         => '',
                'meta_value'       => '',
                'post_type'        => 'post',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'author'	   => '',
                'post_status'      => 'publish',
                'suppress_filters' => true
                );
                $posts_array = get_posts( $args );

                wp_list_categories('title_li=');

                //get_post_type_archive_link( );
               */


// Get the last 10 posts in the special_cat category.
              //query_posts('posts_per_page=12');
              ?>

              <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('content', get_post_format()); ?>
              <?php endwhile; ?>
          </div><!-- .grid -->
              <?php wpex_pagination(); ?>
        <?php else : ?>
          <?php get_template_part('content', 'none'); ?>
        <?php endif; ?>
    </div><!-- #content -->
</div><!-- #primary -->



<?php
get_footer();
?>
