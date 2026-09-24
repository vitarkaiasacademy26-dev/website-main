<?php
if (!defined('ABSPATH')) {
    exit;
}

function vitarkai_course_meta_box() {
    global $post;
    wp_nonce_field('vitarkai_course_meta_nonce', 'vitarkai_course_meta_nonce');

    $duration = get_post_meta($post->ID, '_course_duration', true);
    $fee = get_post_meta($post->ID, '_course_fee', true);
    $mode = get_post_meta($post->ID, '_course_mode', true);
    $start_date = get_post_meta($post->ID, '_course_start_date', true);
    $class_size = get_post_meta($post->ID, '_course_class_size', true);
    ?>
    <p>
        <label for="course_duration"><strong><?php esc_html_e('Course Duration', 'vitarkai-academy'); ?></strong></label><br>
        <input type="text" id="course_duration" name="course_duration" value="<?php echo esc_attr($duration); ?>" class="widefat" placeholder="e.g. 9 Months">
    </p>
    <p>
        <label for="course_fee"><strong><?php esc_html_e('Course Fee', 'vitarkai-academy'); ?></strong></label><br>
        <input type="text" id="course_fee" name="course_fee" value="<?php echo esc_attr($fee); ?>" class="widefat" placeholder="e.g. ₹49,999">
    </p>
    <p>
        <label for="course_mode"><strong><?php esc_html_e('Mode', 'vitarkai-academy'); ?></strong></label><br>
        <select id="course_mode" name="course_mode" class="widefat">
            <option value="">-- Select --</option>
            <option value="Offline" <?php selected($mode, 'Offline'); ?>><?php esc_html_e('Offline', 'vitarkai-academy'); ?></option>
            <option value="Online" <?php selected($mode, 'Online'); ?>><?php esc_html_e('Online', 'vitarkai-academy'); ?></option>
            <option value="Hybrid" <?php selected($mode, 'Hybrid'); ?>><?php esc_html_e('Hybrid', 'vitarkai-academy'); ?></option>
        </select>
    </p>
    <p>
        <label for="course_start_date"><strong><?php esc_html_e('Start Date', 'vitarkai-academy'); ?></strong></label><br>
        <input type="date" id="course_start_date" name="course_start_date" value="<?php echo esc_attr($start_date); ?>" class="widefat">
    </p>
    <p>
        <label for="course_class_size"><strong><?php esc_html_e('Class Size', 'vitarkai-academy'); ?></strong></label><br>
        <input type="text" id="course_class_size" name="course_class_size" value="<?php echo esc_attr($class_size); ?>" class="widefat" placeholder="e.g. 40 Students">
    </p>
    <?php
}

function vitarkai_register_course_meta_box() {
    add_meta_box(
        'vitarkai_course_details',
        __('Course Details', 'vitarkai-academy'),
        'vitarkai_course_meta_box',
        'course',
        'normal',
        'default'
    );
}

add_action('add_meta_boxes', 'vitarkai_register_course_meta_box');

function vitarkai_save_course_meta($post_id) {
    if (!isset($_POST['vitarkai_course_meta_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['vitarkai_course_meta_nonce'])), 'vitarkai_course_meta_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $meta_fields = array(
        '_course_duration' => 'course_duration',
        '_course_fee' => 'course_fee',
        '_course_mode' => 'course_mode',
        '_course_start_date' => 'course_start_date',
        '_course_class_size' => 'course_class_size',
    );

    foreach ($meta_fields as $meta_key => $field_name) {
        if (isset($_POST[$field_name])) {
            update_post_meta($post_id, $meta_key, sanitize_text_field(wp_unslash($_POST[$field_name])));
        } else {
            delete_post_meta($post_id, $meta_key);
        }
    }
}

add_action('save_post_course', 'vitarkai_save_course_meta');
