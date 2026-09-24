<?php
if (!defined('ABSPATH')) {
    exit;
}

function vitarkai_register_form_post_types() {
    $post_types = array(
        'inquiry' => array(
            'labels' => array(
                'name' => __('Inquiries', 'vitarkai-academy'),
                'singular_name' => __('Inquiry', 'vitarkai-academy'),
            ),
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'supports' => array('title', 'editor'),
            'menu_icon' => 'dashicons-email-alt',
        ),
        'course_registration' => array(
            'labels' => array(
                'name' => __('Course Registrations', 'vitarkai-academy'),
                'singular_name' => __('Course Registration', 'vitarkai-academy'),
            ),
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'supports' => array('title', 'editor'),
            'menu_icon' => 'dashicons-clipboard',
        ),
    );

    foreach ($post_types as $slug => $args) {
        register_post_type($slug, $args);
    }
}

add_action('init', 'vitarkai_register_form_post_types');

function vitarkai_save_inquiry($name, $email, $phone, $message, $source = 'General') {
    $post_id = wp_insert_post(
        array(
            'post_type' => 'inquiry',
            'post_title' => $name,
            'post_content' => "Email: {$email}\nPhone: {$phone}\nSource: {$source}\n\n{$message}",
            'post_status' => 'publish',
        )
    );

    if ($post_id) {
        update_post_meta($post_id, '_inquiry_email', sanitize_email($email));
        update_post_meta($post_id, '_inquiry_phone', sanitize_text_field($phone));
        update_post_meta($post_id, '_inquiry_source', sanitize_text_field($source));
    }

    return $post_id;
}

function vitarkai_save_course_registration($name, $email, $phone, $course_name, $message = '') {
    $post_id = wp_insert_post(
        array(
            'post_type' => 'course_registration',
            'post_title' => $name,
            'post_content' => "Course: {$course_name}\nEmail: {$email}\nPhone: {$phone}\n\n{$message}",
            'post_status' => 'publish',
        )
    );

    if ($post_id) {
        update_post_meta($post_id, '_course_registration_email', sanitize_email($email));
        update_post_meta($post_id, '_course_registration_phone', sanitize_text_field($phone));
        update_post_meta($post_id, '_course_registration_course', sanitize_text_field($course_name));
    }

    return $post_id;
}

function vitarkai_process_contact_form() {
    if (!isset($_POST['vitarkai_contact_submit'])) {
        return;
    }

    if (!isset($_POST['vitarkai_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['vitarkai_nonce'])), 'vitarkai_contact_form')) {
        return;
    }

    $name = isset($_POST['vitarkai_name']) ? sanitize_text_field(wp_unslash($_POST['vitarkai_name'])) : '';
    $email = isset($_POST['vitarkai_email']) ? sanitize_email(wp_unslash($_POST['vitarkai_email'])) : '';
    $phone = isset($_POST['vitarkai_phone']) ? sanitize_text_field(wp_unslash($_POST['vitarkai_phone'])) : '';
    $message = isset($_POST['vitarkai_message']) ? sanitize_textarea_field(wp_unslash($_POST['vitarkai_message'])) : '';

    if ($name && $email) {
        vitarkai_save_inquiry($name, $email, $phone, $message, 'Contact Page');
        wp_safe_redirect(add_query_arg('contact_success', '1', wp_get_referer() ?: home_url('/contact-us')));
        exit;
    }
}

add_action('init', 'vitarkai_process_contact_form');

function vitarkai_process_course_registration_form() {
    if (!isset($_POST['vitarkai_course_register_submit'])) {
        return;
    }

    if (!isset($_POST['vitarkai_course_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['vitarkai_course_nonce'])), 'vitarkai_course_register_form')) {
        return;
    }

    $name = isset($_POST['vitarkai_course_name']) ? sanitize_text_field(wp_unslash($_POST['vitarkai_course_name'])) : '';
    $email = isset($_POST['vitarkai_course_email']) ? sanitize_email(wp_unslash($_POST['vitarkai_course_email'])) : '';
    $phone = isset($_POST['vitarkai_course_phone']) ? sanitize_text_field(wp_unslash($_POST['vitarkai_course_phone'])) : '';
    $course = isset($_POST['vitarkai_course_selection']) ? sanitize_text_field(wp_unslash($_POST['vitarkai_course_selection'])) : '';
    $message = isset($_POST['vitarkai_course_message']) ? sanitize_textarea_field(wp_unslash($_POST['vitarkai_course_message'])) : '';

    if ($name && $email && $course) {
        vitarkai_save_course_registration($name, $email, $phone, $course, $message);
        wp_safe_redirect(add_query_arg('course_success', '1', wp_get_referer() ?: home_url('/')));
        exit;
    }
}

add_action('init', 'vitarkai_process_course_registration_form');

function vitarkai_contact_form_markup() {
    $success = isset($_GET['contact_success']) ? true : false;
    $output = '';

    if ($success) {
        $output .= '<div class="form-alert form-alert--success">' . esc_html__('Thank you! We will contact you soon.', 'vitarkai-academy') . '</div>';
    }

    $output .= '<form method="post" class="contact-form">';
    $output .= wp_nonce_field('vitarkai_contact_form', 'vitarkai_nonce', true, false);
    $output .= '<div class="field-row"><div class="field"><label>' . esc_html__('Full Name', 'vitarkai-academy') . '</label><input type="text" name="vitarkai_name" required></div>';
    $output .= '<div class="field"><label>' . esc_html__('Email', 'vitarkai-academy') . '</label><input type="email" name="vitarkai_email" required></div></div>';
    $output .= '<div class="field-row"><div class="field"><label>' . esc_html__('Phone', 'vitarkai-academy') . '</label><input type="tel" name="vitarkai_phone"></div>';
    $output .= '<div class="field"><label>' . esc_html__('Subject', 'vitarkai-academy') . '</label><input type="text" name="vitarkai_subject"></div></div>';
    $output .= '<div class="field"><label>' . esc_html__('Message', 'vitarkai-academy') . '</label><textarea name="vitarkai_message" rows="5" required></textarea></div>';
    $output .= '<button type="submit" name="vitarkai_contact_submit" class="button button--primary">' . esc_html__('Send Message', 'vitarkai-academy') . '</button>';
    $output .= '</form>';

    return $output;
}

function vitarkai_course_register_form_markup() {
    $success = isset($_GET['course_success']) ? true : false;
    $output = '';

    if ($success) {
        $output .= '<div class="form-alert form-alert--success">' . esc_html__('Your registration has been received successfully.', 'vitarkai-academy') . '</div>';
    }

    $output .= '<form method="post" class="contact-form">';
    $output .= wp_nonce_field('vitarkai_course_register_form', 'vitarkai_course_nonce', true, false);
    $output .= '<div class="field-row"><div class="field"><label>' . esc_html__('Full Name', 'vitarkai-academy') . '</label><input type="text" name="vitarkai_course_name" required></div>';
    $output .= '<div class="field"><label>' . esc_html__('Email', 'vitarkai-academy') . '</label><input type="email" name="vitarkai_course_email" required></div></div>';
    $output .= '<div class="field-row"><div class="field"><label>' . esc_html__('Phone', 'vitarkai-academy') . '</label><input type="tel" name="vitarkai_course_phone" required></div>';
    $output .= '<div class="field"><label>' . esc_html__('Select Course', 'vitarkai-academy') . '</label><select name="vitarkai_course_selection" required><option value="">Select</option>';

    $courses = get_posts(array('post_type' => 'course', 'posts_per_page' => -1));
    foreach ($courses as $course) {
        $output .= '<option value="' . esc_attr($course->post_title) . '">' . esc_html($course->post_title) . '</option>';
    }

    $output .= '</select></div></div>';
    $output .= '<div class="field"><label>' . esc_html__('Additional Information', 'vitarkai-academy') . '</label><textarea name="vitarkai_course_message" rows="4"></textarea></div>';
    $output .= '<button type="submit" name="vitarkai_course_register_submit" class="button button--primary">' . esc_html__('Register Now', 'vitarkai-academy') . '</button>';
    $output .= '</form>';

    return $output;
}
