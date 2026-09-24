<?php
if (!defined('ABSPATH')) {
    exit;
}

function vitarkai_register_course_taxonomies() {
    $exam_args = array(
        'labels' => array(
            'name' => __('Exam Types', 'vitarkai-academy'),
            'singular_name' => __('Exam Type', 'vitarkai-academy'),
            'search_items' => __('Search Exam Types', 'vitarkai-academy'),
            'all_items' => __('All Exam Types', 'vitarkai-academy'),
            'edit_item' => __('Edit Exam Type', 'vitarkai-academy'),
            'update_item' => __('Update Exam Type', 'vitarkai-academy'),
            'add_new_item' => __('Add New Exam Type', 'vitarkai-academy'),
            'new_item_name' => __('New Exam Type Name', 'vitarkai-academy'),
            'menu_name' => __('Exam Types', 'vitarkai-academy'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'exam-type'),
    );

    register_taxonomy('exam_type', array('course', 'study_material'), $exam_args);

    $course_type_args = array(
        'labels' => array(
            'name' => __('Course Types', 'vitarkai-academy'),
            'singular_name' => __('Course Type', 'vitarkai-academy'),
            'search_items' => __('Search Course Types', 'vitarkai-academy'),
            'all_items' => __('All Course Types', 'vitarkai-academy'),
            'edit_item' => __('Edit Course Type', 'vitarkai-academy'),
            'update_item' => __('Update Course Type', 'vitarkai-academy'),
            'add_new_item' => __('Add New Course Type', 'vitarkai-academy'),
            'new_item_name' => __('New Course Type Name', 'vitarkai-academy'),
            'menu_name' => __('Course Types', 'vitarkai-academy'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'course-type'),
    );

    register_taxonomy('course_type', array('course', 'study_material'), $course_type_args);

    $study_material_category_args = array(
        'labels' => array(
            'name' => __('Study Material Categories', 'vitarkai-academy'),
            'singular_name' => __('Study Material Category', 'vitarkai-academy'),
            'menu_name' => __('Categories', 'vitarkai-academy'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'material-category'),
    );

    register_taxonomy('study_material_category', array('study_material'), $study_material_category_args);

    $strategy_category_args = array(
        'labels' => array(
            'name' => __('Strategy Categories', 'vitarkai-academy'),
            'singular_name' => __('Strategy Category', 'vitarkai-academy'),
            'menu_name' => __('Categories', 'vitarkai-academy'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'strategy-category'),
    );

    register_taxonomy('strategy_category', array('strategy'), $strategy_category_args);

    $mindset_category_args = array(
        'labels' => array(
            'name' => __('Mindset Categories', 'vitarkai-academy'),
            'singular_name' => __('Mindset Category', 'vitarkai-academy'),
            'menu_name' => __('Categories', 'vitarkai-academy'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'mindset-category'),
    );

    register_taxonomy('mindset_category', array('mindset'), $mindset_category_args);
}

add_action('init', 'vitarkai_register_course_taxonomies');
