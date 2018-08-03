<?php

/***** Fetch Theme Data *****/

$mh_magazine_lite_data = wp_get_theme('mh-magazine-lite');
$mh_magazine_lite_version = $mh_magazine_lite_data['Version'];
$mh_biosphere_data = wp_get_theme('mh-biosphere');
$mh_biosphere_version = $mh_biosphere_data['Version'];

/***** Load Google Fonts *****/

function mh_biosphere_fonts() {
	wp_dequeue_style('mh-google-fonts');
	wp_enqueue_style('mh-biosphere-fonts', 'https://fonts.googleapis.com/css?family=Sarala:400,700%7cDroid+Sans:400,700', array(), null);
}
add_action('wp_enqueue_scripts', 'mh_biosphere_fonts', 11);

/***** Load Stylesheets *****/

function mh_biosphere_styles() {
	global $mh_magazine_lite_version, $mh_biosphere_version;
    wp_enqueue_style('mh-magazine-lite', get_template_directory_uri() . '/style.css', array(), $mh_magazine_lite_version);
    wp_enqueue_style('mh-biosphere', get_stylesheet_uri(), array('mh-magazine-lite'), $mh_biosphere_version);
    if (is_rtl()) {
		wp_enqueue_style('mh-magazine-lite-rtl', get_template_directory_uri() . '/rtl.css', array(), $mh_magazine_lite_version);
	}
}
add_action('wp_enqueue_scripts', 'mh_biosphere_styles');

/***** Load Translations *****/

function mh_biosphere_theme_setup(){
	load_child_theme_textdomain('mh-biosphere', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'mh_biosphere_theme_setup');

/***** Change Defaults for Custom Colors *****/

function mh_biosphere_custom_colors() {
	remove_theme_support('custom-header');
	remove_theme_support('custom-background');
	add_theme_support('custom-header', array('default-image' => '', 'default-text-color' => 'ffffff', 'width' => 410, 'height' => 90, 'flex-width' => true, 'flex-height' => true));
	add_theme_support('custom-background', array('default-color' => '66bb6a'));
}
add_action('after_setup_theme', 'mh_biosphere_custom_colors');

?>