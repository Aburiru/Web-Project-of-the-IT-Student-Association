<?php
/**
 * HMJTI Theme Functions
 */

function hmjti_theme_scripts() {
    // Enqueue Google Fonts (Syne and DM Sans)
    wp_enqueue_style('hmjti-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Syne:wght@700;800&display=swap', array(), null);
    
    // Enqueue Main Style (style.css in root)
    wp_enqueue_style('hmjti-main-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'));

    // Enqueue Custom Assets CSS
    wp_enqueue_style('hmjti-custom-style', get_template_directory_uri() . '/assets/css/styles.css', array(), filemtime(get_template_directory() . '/assets/css/styles.css'));

    // Enqueue Custom Assets JS
    wp_enqueue_script('hmjti-custom-script', get_template_directory_uri() . '/assets/js/script.js', array(), filemtime(get_template_directory() . '/assets/js/script.js'), true);
}
add_action('wp_enqueue_scripts', 'hmjti_theme_scripts');

function hmjti_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    
    // Register Menu
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'hmjti'),
    ));
}
add_action('after_setup_theme', 'hmjti_theme_setup');
