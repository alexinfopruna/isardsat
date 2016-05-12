<?php 
$post = $wp_query->post;
get_header();
$layout = "82"; //get_post_meta($post->ID, 'page_layout', true);
$page_width = get_post_meta($post->ID, 'page_width', true);
if(!$page_width) $page_width = 'content';
?>
<style scoped="scoped">
    .page-layout-50{
        width:50%;
        float:left;
    }
    
    .page-layout-75{
        padding-left:20px;
        width:75%;
        float:left;
    }
    
    .page-layout-82{
        padding-left:20px;
        width:82%;
        float:left;
    }
    
    .sidebar{float:left;}
    .page_sidebar{padding-left:10px;background-color: white;
}
    .post.category-news {
    width: 100% !important;
    float: left;
    
    
    .post-info{display:none;}
    /*
    .page-holder .page_inner {
    width: 100%;
    float: left;
    }
    */
   .page-holder > .inner{padding-top:0;}
    
    #respond{clear:both;}
</style>
 
<?php echo get_sidebar(); ?>
<div class="single-post post blog page-holder page-layout-<?php echo $layout; ?>">
		
	<?php 		
	if (!is_front_page() && $smof_data['vntd_header_title'] != 0 && get_post_meta(vntd_get_id(), 'page_header', true) != 'no-header' && !is_404() && !is_page_template('template-onepager.php')) {
  isardsat_print_page_title();
}
	if($page_width != 'fullwidth') {
		echo '<div class="inner clearfix">';
	}
	
	if($layout != "fullwidth") {
		echo '<div class="page_inner">';
	}
	
	if (have_posts()) : while (have_posts()) : the_post(); 
	        
		isard_blog_post_content();
	          
	endwhile; endif; 
	
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