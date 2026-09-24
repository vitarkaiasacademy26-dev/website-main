<?php
if (!defined('ABSPATH')) {
    exit;
}

function vitarkai_academy_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');
    add_theme_support('responsive-embeds');
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    add_filter('option_blogname', function ($value) {
        return $value ?: 'Vitarka IAS Academy';
    });

    add_filter('option_blogdescription', function ($value) {
        return $value ?: 'UPSC | GPSC | Competitive Exams';
    });

    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'vitarkai-academy'),
            'footer'  => __('Footer Menu', 'vitarkai-academy'),
        )
    );
}

add_action('after_setup_theme', 'vitarkai_academy_setup');
