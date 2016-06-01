<?php

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//		Portfolio Grid Shortcode
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

// Segona fila de filtres
$cats1 = 'instrumental-calibration,algorithm-development,geophysical-validation,toolboxes,dissemination-and-outreach';
$cats2 = 'hydrology,cryosphere,ocean-and-coast,bathymetry,agriculture,air-quality,health';
$cats3 = 'altimetry,passive-microwaves,SAR imaging ';

function isard_portfolio_grid($atts, $content = null) {
	extract(shortcode_atts(array(
		"filter" => 'simple_page_ordering_is_sortable',
		"posts_nr" => '',
		"cats" => '',
		"cats2" => '',
		"cats3" => '',
		"thumb_style" => '',
		"thumb_size" => 'square',
		"order" => 'page-attributes',
		"el_position" => '',
		"width" => '',
		"composer" => '',
		"paged_posts" => '',
		"more_url" => '',
		"thumb_space" => '',
		"cols" => '',
		"thumb_size" => '',
		"link_type" => ''
	), $atts));

	// Define container and item span value
                            
                            
                            
	global $post;

	if(!$posts_nr) $posts_nr = "-1";
	$block_id = rand(5,5000);

	$layout_class = '';
	$item_class = 'boxed-item col-xs-4';
	if($thumb_space == 'no') {
		$layout_class = 'fullwidth relative';
		$item_class = 'five';
		if($cols == "4") {
			$item_class = 'four';
		}
	}


	if($link_type != 'direct' && $link_type != 'external') {
		wp_enqueue_script('portfolioExpand', '', '', '', true);
		wp_enqueue_style('portfolioExpand');
	}

	ob_start();
                            	
	echo '<div class="portfolio t-center '.$layout_class.'"><div class="vntd-grid-before"></div>';
                    /*****************/
                            global $cats1;
                            global $cats2;
                            global $cats3;
                            
                            //print_r($cats3);die();
	if($filter == "yes") isard_portfolio_filters($cats1, $cats2, $cats3);
	echo '<div class="portfolio-items">';
	wp_reset_postdata();
	$paged = '';
	if($paged_posts == 'yes') {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}

	//echo $cats_arr."ECHO TEST | | ".$cats;

	$cats_arr = explode(" ", $cats);
	$args = array(
		'posts_per_page' => $posts_nr,
		'project-type' => $cats,
		'paged' => $paged,
		'post_type' => 'portfolio',
        'orderby'	=> 'menu_order',
        'order' => 'ASC'
	);
	$the_query = new WP_Query($args);

	// Default Thumbnail Sizes

	$size = "portfolio-square";
	if($thumb_size == "auto") $size = "portfolio-auto";
	//$size = "portfolio-auto";

	$data_content = $ajax_class = '';

	if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

		$img_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size);
		$thumb_url = $img_url[0];

		$post_link = get_permalink();

		$post_link_type = get_post_meta($post->ID,'link_type',TRUE);

		if($link_type != 'direct' && $post_link_type != 'direct') {
			$data_content = ' data-content="'.get_permalink().'"';
			$ajax_class = ' colio-link';
		}

		if($post_link_type == 'external' && get_post_meta($post->ID,'portfolio_external_url',TRUE)) {
			$data_content = '';
			$ajax_class = '';
			$post_link = get_post_meta($post->ID,'portfolio_external_url',TRUE);
		}

				?>

					<div class="item <?php echo $item_class; ?> <?php echo vntd_portfolio_item_class(); ?>"<?php echo $data_content; ?>>
						<!-- Item Inner -->
						<div class="item-inner">
							<!-- Item Link -->
							<a href="<?php echo $post_link; ?>" class="work-image<?php echo $ajax_class; ?>">
								<!-- Item Image -->
								<img src="<?php echo $thumb_url ?>" alt="<?php the_title(); ?>">
								<!-- Item Details -->
								<div class="item-details">
									<!-- Item Header -->
									<h1 class="portfolio-grid-title white"><?php the_title(); ?></h1>
									<!-- Item Strips -->
									<span class="portfolio-strips"></span>
									<!-- Item Description -->
									<p class="font-primary uppercase">
										<?php vntd_portfolio_overlay_categories(); ?>
									</p>
								</div>
								<!-- End Item Details -->
							</a>
							<!-- End Item Link -->
						</div>
						<!-- End Item Inner -->
					</div>

					<?php

					$data_content = $ajax_class = '';

	endwhile; endif; ?>

	<?php
	if($paged_posts == 'yes') vntd_pagination($the_query);
	wp_reset_postdata();

	echo '</div>';

	if($more_url) {
		echo '<a href="'.$more_url.'" class="portfolio-view-more uppercase ex-link"><i class="fa fa-plus fa-3x"></i></a>';
	}

	echo '</div>';

	$content = ob_get_contents();
	ob_end_clean();

	return $content;

}



function isard_portfolio_filters($cats, $cats2, $cats3) {
  
  if (FALSE || !$cats) {
    $portfolios_cats = get_categories('taxonomy=project-type');


    $cats = '';
    foreach ($portfolios_cats as $portfolio_cat) {
      $cats .= $portfolio_cat->slug . ',';
    }
  }
  ?>
<ul id="filter-group-0" class="filter-group">
       <li class="filter-group-li option-set ">
           <a href="#filter" id="show-all" data-option-value="*" class="filter-group-link select option-set relative normal font-primary uppercase"><?php _e('Show All', 'vntd_north'); ?></a></li>
</ul>
  <ul id="filter-group-1" class="filter-group">
       <li class="filter-group-li">     
          <a href="#filter" id="filter-group-1" data-option-value="filter-group" class="filter-group-link option-set relative normal font-primary uppercase">
              <?php  echo __('SCIENCE & TECHNOLOGY','isardsat-north'); ?>
          </a> 
          <div id="options" class="filter-menu fullwidth">
              <ul id="filters" class="option-set relative normal font-primary uppercase" data-option-key="filter">
                  <?php
                  $categories = explode(",", $cats);

                  foreach ($categories as $value) {
                    $term = get_term_by('slug', $value, 'project-type');
                    if (isset($term->name)) {
                      $value=$term->slug;
                      echo '<li><a href="#filter" data-option-value=".' . $value . '"><span>' . $term->name . "</span></a></li>";
                    }
                  }
                  ?>
              </ul>
          </div>


      </li>
  </ul>

<!--/////////// 2222222222222222 ///////////////////////////////////-->

  <ul id="filter-group-2" class="filter-group">
      <li class="filter-group-li">
          <a href="#filter"  data-option-value="filter-group" class="filter-group-link option-set relative normal font-primary uppercase">
            <?php  echo __('APPLICATIONS','isardsat-north'); ?>
          </a> 
          <div id="options2" class="filter-menu fullwidth">
          <ul id="filters2" class="option-set relative normal font-primary uppercase" data-option-key="filter">
                  <?php
                  
                  $categories2 = explode(",", $cats2);

                  foreach ($categories2 as $value) {
                    $term = get_term_by('slug', $value, 'project-type');
                    if (isset($term->name)) {
                      $value=$term->slug;
                      echo '<li><a href="#filter" data-option-value=".' . $value . '"><span>' . $term->name . "</span></a></li>";
                    }
                  }
                  ?>              
          </ul>
          </div>
      </li>
  </ul>

<!--/////////// 3333333333333 ///////////////////////////////////-->

  <ul id="filter-group-3" class="filter-group">
      <li class="filter-group-li">
          <a href="#filter"  data-option-value="filter-group" class="filter-group-link option-set relative normal font-primary uppercase">
              <?php  echo __('EXPERTISE','isardsat-north'); ?>
          </a> 
          <div id="options3" class="filter-menu fullwidth">
          <ul id="filters3" class="option-set relative normal font-primary uppercase" data-option-key="filter">
                  <?php
                  
                  $categories3 = explode(",", $cats3);

                  foreach ($categories3 as $value) {
                    $term = get_term_by('slug', $value, 'project-type');
                    if (isset($term->name)) {
                      $value=$term->slug;
                      echo '<li><a href="#filter" data-option-value=".' . $value . '"><span>' . $term->name . "</span></a></li>";
                    }
                  }
                  ?>              
          </ul>
          </div>
      </li>
  </ul>

  <?php
}