<?php
/**
 * Header theme options
 * @package WordPress
 * @subpackage WPExplorer.com Themes
 * @since 1.0
 */



add_action( 'customize_register', 'wpex_customizer_logo' );
function wpex_customizer_logo($wp_customize) {

	// General Section
	$wp_customize->add_section( 'wpex_logo' , array(
		'title'		=> __( 'Image Logo', 'wpex' ),
		'priority'	=> 210,
	) );

	// Logo Image
	$wp_customize->add_setting( 'wpex_logo', array(
		'type'	=> 'theme_mod',
	) );
 
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpex_logo', array(
		'label'		=> __('Image Logo','wpex'),
		'section'	=> 'wpex_logo',
		'settings'	=> 'wpex_logo',
	) ) );
		
}