<?php
/*
  Plugin Name: isardsat_twitter
  Description: twitter
 */
/* Start Adding Functions Below this Line */

// Creating the widget 
class isardsat_twitter_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
// Base ID of your widget
        'isardsat_twitter',
// Widget name will appear in UI
        __('isardsat_twitter Widget', 'isardsat_twitter_widget_domain'),
// Widget description
        array('description' => __('isardsat twitter', 'isardsat_twitter_widget_domain'),)
    );
  }

// Creating widget front-end
// This is where the action happens
  public function widget($args, $instance) {
    $title = apply_filters('widget_title', $instance['title']);
// before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if (!empty($title))
      echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
 ?>
<a class="twitter-timeline" data-dnt="true" href="<?php echo $instance['twitter_url']; ?>" data-widget-id="<?php echo $instance['twitter_code']; ?>">Tuits de @isardSAT</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
   
   
   <?php
    echo $args['after_widget'];
  }

// Widget Backend 
  public function form($instance) {
   // print_r($instance);die();
    /*    * */
    if (isset($instance['title'])) {
      $title = $instance['title'];
    }
    else {
      $title = __('Isardsat Twitter Title', 'isardsat_twitter_widget_domain');
    }
 
    if (isset($instance['twitter_url'])) {
      $twitter_url = $instance['twitter_url'];
    }
    else {
      $twitter_url = __('Isardsat Twitter URL', 'isardsat_twitter_widget_domain');
    }
    if (isset($instance['twitter_code'])) {
      $twitter_code = $instance['twitter_code'];
    }
    else {
      $twitter_code = __('Isardsat Twitter Code', 'isardsat_twitter_widget_domain');
    }
// Widget admin form
    ?>
    <p>
         <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title);?>" />
       
         <label for="<?php echo $this->get_field_id('twitter_url'); ?>"><?php _e('Twitter url:'); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id('twitter_url'); ?>" name="<?php echo $this->get_field_name('twitter_url'); ?>" type="text" value="<?php echo esc_attr($twitter_url);?>" />
       
        <label for="<?php echo $this->get_field_id('twitter_code'); ?>"><?php _e('Twitter code:'); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id('twitter_code'); ?>" name="<?php echo $this->get_field_name('twitter_code'); ?>" type="text" value="<?php echo esc_attr($twitter_code); ?>" />
    </p>
    <?php
  }

// Updating widget replacing old instances with new
  public function update($new_instance, $old_instance) {
    
    $instance = $old_instance;
   // $instance = array();
    $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
    $instance['twitter_url'] = (!empty($new_instance['twitter_url']) ) ? strip_tags($new_instance['twitter_url']) : '';
    $instance['twitter_code'] = (!empty($new_instance['twitter_code']) ) ? strip_tags($new_instance['twitter_code']) : '';
    //
    return $instance;
  }

}

// Class wpb_widget ends here
// Register and load the widget
function isardsat_twitter_load_widget() {
  register_widget('isardsat_twitter_widget');
}

add_action('widgets_init', 'isardsat_twitter_load_widget');


/* Stop Adding Functions Below this Line */
?>