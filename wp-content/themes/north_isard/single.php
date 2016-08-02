<?php 
$post = $wp_query->post;
get_header();
$layout = "82"; //get_post_meta($post->ID, 'page_layout', true);
$page_width = get_post_meta($post->ID, 'page_width', true);
if(!$page_width) $page_width = 'content';
?>
<style scoped="scoped">
   .page-layout-82{padding-left:250px;} 
   #sidebar{
       position:absolute;
   }
   
   .page-holder > .inner {
     padding-top: 0px; 
     
   }
     @media only screen and (max-width: 1000px) {
           .page-layout-82{padding-left:0px;} 

     }
</style>
<?php //echo get_sidebar(); ?>

<a href="javascript: void(0)" id="toggle-btn"><i class="fa fa-bars"></i></a>

<div id="toggle-wrap" class="xxclr" style="">
<div id="sidebar" class="page_sidebar">
	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('default_sidebar')) ?>
</div>
</div>

<div class="single-post post blog page-holder page-layout-<?php echo $layout; ?>">
	<?php 		
	if (!is_front_page() && $smof_data['vntd_header_title'] != 0 && get_post_meta(vntd_get_id(), 'page_header', true) != 'no-header' && !is_404() && !is_page_template('template-onepager.php')) {
  //isardsat_print_page_title();
}
	if($page_width != 'fullwidth') {
		echo '<div class="inner clearfix">';
	}
	
	if($layout != "fullwidth") {
		echo '<div class="page_inner">';
	}
                            
    
    

    
	if (have_posts()) : while (have_posts()) : the_post(); 
	        
		isard_vntd_blog_post_content();
//vntd_blog_post_content();	        
  
	endwhile; endif; 
	?>
 
    <?php
                            
	if (comments_open()){ comments_template(); } // Load comments if enabled	     
	
	if($layout != "fullwidth") { 
		echo '</div>';
		   		
	}
	
	if($page_width != 'fullwidth') {
		echo '</div>';
	}
	
	?>

</div>

<?php get_footer(); ?>
