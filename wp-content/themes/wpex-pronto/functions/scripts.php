<?php
/**
 * This file loads custom css and js for our theme
 *
 * @package WordPress
 * @subpackage Pronto
 * @since Pronto 1.0
*/

add_action('wp_enqueue_scripts','wpex_load_scripts');
function wpex_load_scripts() {
	
	
	/*******
	*** CSS
	*******************/
	
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	// Google Fonts
	wp_enqueue_style( 'raleway-google-font', 'http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700', 'style' );
	wp_enqueue_style( 'font-awesome', WPEX_CSS_DIR . '/font-awesome.min.css', true );
	

	/*******
	*** jQuery
	*******************/
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script('comment-reply');
	}
	
	wp_enqueue_script( 'jquery-masonry', '', array('jquery'), true );
	wp_enqueue_script( 'wpex-global', WPEX_JS_DIR .'/global.js', false, '1.0', true );

	if ( get_theme_mod( 'retina', '1' ) == '1' ) {
		wp_enqueue_script('retina', WPEX_JS_DIR .'/retina.js', array('jquery'), '', true);
	}
	
}



/**
* Browser Specific CSS
* @Since 1.0
*/
if ( !function_exists('wpex_ie_scripts') ) {
	add_action('wp_head', 'wpex_ie_scripts');
	function wpex_ie_scripts() {
		echo '<!--[if IE]>';
			echo '<link rel="stylesheet" type="text/css" href="'. WPEX_CSS_DIR .'/ie.css" media="screen" />';
		echo '<![endif]-->';
		echo '<!--[if IE 8]>';
			echo '<link rel="stylesheet" type="text/css" href="'. WPEX_CSS_DIR .'/ancient-ie.css" media="screen" />';
		echo '<![endif]-->';
		echo '<!--[if lt IE 9]>';
			echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
			echo '<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>';
		echo '<![endif]-->';
	}
}