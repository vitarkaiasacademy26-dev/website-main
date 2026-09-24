<?php
if (!defined('ABSPATH')) {
    exit;
}

function vitarkai_academy_enqueue_assets() {
    $theme      = wp_get_theme();
    $theme_name = $theme->get('Name');
    $theme_version = $theme->get('Version') ?: '1.0.0';

    wp_enqueue_style(
        'vitarkai-academy-style',
        get_stylesheet_uri(),
        array(),
        $theme_version
    );

    $custom_css_path = get_template_directory() . '/assets/css/theme.css';
    if (file_exists($custom_css_path)) {
        wp_enqueue_style(
            'vitarkai-academy-theme',
            get_template_directory_uri() . '/assets/css/theme.css',
            array('vitarkai-academy-style'),
            filemtime($custom_css_path)
        );
    }
}

add_action('wp_enqueue_scripts', 'vitarkai_academy_enqueue_assets');
