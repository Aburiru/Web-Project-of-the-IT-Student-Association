<?php

function hmjti_assets() {

    wp_enqueue_style(
        'hmjti-style',
        get_template_directory_uri() . '/assets/css/styles.css',
        array(),
        '1.0'
    );

    wp_enqueue_script(
        'hmjti-script',
        get_template_directory_uri() . '/assets/js/script.js',
        array(),
        '1.0',
        true
    );
}
function hmjti_setup() {

    register_nav_menus(array(
        'primary-menu' => __('Primary Menu')
    ));

}

add_action('wp_enqueue_scripts', 'hmjti_assets');
add_action('after_setup_theme', 'hmjti_setup');

