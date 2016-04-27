<?php
/**
 * Blog theme options
 * @package WordPress
 * @subpackage WPExplorer.com Themes
 * @since 1.0
 */



add_action( 'customize_register', 'wpex_customizer_general' );

function wpex_customizer_general($wp_customize) {

	// Blog Section
	$wp_customize->add_section( 'wpex_general' , array(
		'title'      => __( 'Theme Settings', 'wpex' ),
		'priority'   => 240,
	) );
	
	// Enable/Disable Readmore
	$wp_customize->add_setting( 'wpex_blog_readmore', array(
		'type'		=> 'theme_mod',
	) );

	$wp_customize->add_control( 'wpex_blog_readmore', array(
		'label'		=> __('Read More Link','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_blog_readmore',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Featured Images on Entries
	$wp_customize->add_setting( 'wpex_blog_entry_thumb', array(
		'type'		=> 'theme_mod',
		'default'	=> '1'
	) );

	$wp_customize->add_control( 'wpex_blog_entry_thumb', array(
		'label'		=> __('Featured Image on Entries','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_blog_entry_thumb',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Featured Images on Posts
	$wp_customize->add_setting( 'wpex_blog_post_thumb', array(
		'type'		=> 'theme_mod',
		'default'	=> '1'
	) );

	$wp_customize->add_control( 'wpex_blog_post_thumb', array(
		'label'		=> __('Featured Image on Posts','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_blog_post_thumb',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Date Display
	$wp_customize->add_setting( 'wpex_post_date', array(
		'type'		=> 'theme_mod',
		'default'	=> '1'
	) );

	$wp_customize->add_control( 'wpex_post_date', array(
		'label'		=> __('Display Post Publish Date','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_post_date',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Category Display
	$wp_customize->add_setting( 'wpex_post_category', array(
		'type'		=> 'theme_mod',
		'default'	=> '1'
	) );

	$wp_customize->add_control( 'wpex_post_category', array(
		'label'		=> __('Display Post Category','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_post_category',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Author Display
	$wp_customize->add_setting( 'wpex_post_author', array(
		'type'		=> 'theme_mod',
		'default'	=> '1'
	) );

	$wp_customize->add_control( 'wpex_post_author', array(
		'label'		=> __('Display Post Author','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_post_author',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );

	// Enable/Disable Tags Images on Posts
	$wp_customize->add_setting( 'wpex_blog_tags', array(
		'type'		=> 'theme_mod',
		'default'	=> '1'
	) );

	$wp_customize->add_control( 'wpex_blog_tags', array(
		'label'		=> __('Tags on Posts','wpex'),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_blog_tags',
		'type'		=> 'checkbox',
		'priority'	=> '1',
	) );
		
}