<?php 
get_header(); 
$layout = '50';
if(array_key_exists('vntd_archive_layout',$smof_data)) {
	if($smof_data['vntd_archive_layout']) $layout = $smof_data['vntd_archive_layout'];
}
?>
<style scoped="scoped">
    .page-layout-50{
        width:50%;
        float:left;
    }
    
    .sidebar{float:left;}
    
    .post.category-news {
        margin-left:3%;
        width:30%;float:left;
    }
    
    .post-info{display:none;}
</style>

<div id="sidebar" class="page_sidebar">
	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('default_sidebar')) ?>
</div>
<div class="page-holder blog page-layout-<?php echo $layout; ?>">

	<div class="inner clearfix">	
		
		<?php 		
		
		if($layout != "fullwidth") {
			echo '<div class="page_inner">';
		}
		
		if (have_posts()) : while (have_posts()) : the_post();
		 	
		 	vntd_blog_post_content();
		 	
		endwhile;
		
	    // Archive doesn't exist:
	    else :
	    
	        _e('Nothing found, sorry.','vntd_north');
	    
	    endif;	     
    	
    	if($layout != "fullwidth") { 
    		echo '</div>';
    		get_sidebar();    		
    	}
    	
    	?>
    </div>

</div>
    <div id="sidebar-right"  class="page_sidebar">
  
        <a class="twitter-timeline" href="https://twitter.com/alexbasurilla" data-widget-id="728244926488694784">Tweets por el @alexbasurilla.</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
<?php get_footer(); ?>