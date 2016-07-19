<?php 
/*
Template Name: Ajax template
*/
?>


<div class="single-post post blog page-holder page-layout-<?php echo $layout; ?> colio-wrap colio-active" >
   <a id="expertise-close-ajax" class="colio-close colio-hidde" href="#" style="opacity: 1;right:-20px;left:initial;top:-20px;z-index:10000"></a>
	<?php 		
	if (!is_front_page() && $smof_data['vntd_header_title'] != 0 && get_post_meta(vntd_get_id(), 'page_header', true) != 'no-header' && !is_404() && !is_page_template('template-onepager.php')) {
isardsat_print_page_title();
}
    echo "<br/><br/>";
	if (have_posts()) : while (have_posts()) : the_post(); 
	        
		the_content();
	endwhile; endif; 
	?>
</div>