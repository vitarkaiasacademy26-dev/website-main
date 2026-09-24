<?php
if (!defined('ABSPATH')) {
    exit;
}

function vitarkai_register_custom_post_types() {
    $types = array(
        'course' => array(
            'labels' => array(
                'name' => __('Courses', 'vitarkai-academy'),
                'singular_name' => __('Course', 'vitarkai-academy'),
                'add_new_item' => __('Add New Course', 'vitarkai-academy'),
                'edit_item' => __('Edit Course', 'vitarkai-academy'),
                'new_item' => __('New Course', 'vitarkai-academy'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'courses'),
            'menu_icon' => 'dashicons-book-alt',
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
            'show_in_rest' => true,
        ),
        'study_material' => array(
            'labels' => array(
                'name' => __('Study Materials', 'vitarkai-academy'),
                'singular_name' => __('Study Material', 'vitarkai-academy'),
                'add_new_item' => __('Add New Material', 'vitarkai-academy'),
                'edit_item' => __('Edit Material', 'vitarkai-academy'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'study-materials'),
            'menu_icon' => 'dashicons-media-document',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'show_in_rest' => true,
        ),
        'strategy' => array(
            'labels' => array(
                'name' => __('Strategies', 'vitarkai-academy'),
                'singular_name' => __('Strategy', 'vitarkai-academy'),
                'add_new_item' => __('Add New Strategy', 'vitarkai-academy'),
                'edit_item' => __('Edit Strategy', 'vitarkai-academy'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'strategies'),
            'menu_icon' => 'dashicons-lightbulb',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'show_in_rest' => true,
        ),
        'mindset' => array(
            'labels' => array(
                'name' => __('Mindset Improvement', 'vitarkai-academy'),
                'singular_name' => __('Mindset', 'vitarkai-academy'),
                'add_new_item' => __('Add New Mindset Post', 'vitarkai-academy'),
                'edit_item' => __('Edit Mindset Post', 'vitarkai-academy'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'mindset'),
            'menu_icon' => 'dashicons-heart',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'show_in_rest' => true,
        ),
        'gallery' => array(
            'labels' => array(
                'name' => __('Gallery', 'vitarkai-academy'),
                'singular_name' => __('Gallery Item', 'vitarkai-academy'),
                'add_new_item' => __('Add New Gallery Item', 'vitarkai-academy'),
                'edit_item' => __('Edit Gallery Item', 'vitarkai-academy'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'gallery'),
            'menu_icon' => 'dashicons-format-gallery',
            'supports' => array('title', 'thumbnail', 'editor'),
            'show_in_rest' => true,
        ),
        'teaching_feature' => array(
            'labels' => array(
                'name' => __('Teaching Features', 'vitarkai-academy'),
                'singular_name' => __('Teaching Feature', 'vitarkai-academy'),
                'add_new_item' => __('Add New Teaching Feature', 'vitarkai-academy'),
                'edit_item' => __('Edit Teaching Feature', 'vitarkai-academy'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'teaching-feature'),
            'menu_icon' => 'dashicons-welcome-learn-more',
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => true,
        ),
        'youtube_video' => array(
            'labels' => array(
                'name' => __('YouTube Videos', 'vitarkai-academy'),
                'singular_name' => __('YouTube Video', 'vitarkai-academy'),
                'add_new_item' => __('Add New Video', 'vitarkai-academy'),
                'edit_item' => __('Edit Video', 'vitarkai-academy'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'videos'),
            'menu_icon' => 'dashicons-video-alt3',
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => true,
        ),
    );

    foreach ($types as $slug => $args) {
        register_post_type($slug, $args);
    }
}

add_action('init', 'vitarkai_register_custom_post_types');
