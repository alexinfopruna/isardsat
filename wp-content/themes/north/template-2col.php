<?php 
/* Template Name: Homepage / 2col */
$post = $wp_query->post;
get_header();
	echo '<div style="width:50%;float:left">';	
	if (have_posts()) : while (have_posts()) : the_post(); 
	        
		the_content(); 
	          
	endwhile; endif;   
echo '</div>
  
  
  
  ';
?>
<div id="sidebar" class="page_sidebar">
	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('default_sidebar')) ?>
</div>

<?php

get_footer(); 
 
?>