<?php
/**
 * Demo Company Theme Customizer
 *
 * @package Demo_Company
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function demo_company_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'demo_company_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function demo_company_customize_preview_js() {
	wp_enqueue_script( 'demo_company_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'demo_company_customize_preview_js' );

function add_footer_logo($wp_customize){
	$wp_customize->add_section('footer', array(
		'title' => 'Footer',
		'description'=>'Footer Settings',
		'capability'=>'edit_theme_options'
	));

	$wp_customize->add_setting('footer-logo', array(
		'type'=> 'theme_mod',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'absint'
	));

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer-logo', array(
		'section'=>'footer',
		'label'=>'Footer Logo',
		'mime_type'=>'image',
		'width'=>200,
		'height'=>30,
		'flex-width'=>true,
		'flex-height'=> true
	)));

	$wp_customize->add_setting('footer-copyright', array(
		'type'=>'theme_mod',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=> 'sanitize_text'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'footer-copyright', array(
		'type'=>'text',
		'label'=>'Footer Copyright',
		'section'=>'footer',
		'settings'=>'footer-copyright'
	)));
}


add_action('customize_register', 'add_footer_logo');

function sanitize_text( $text ) {
 	return sanitize_text_field( $text );
 }