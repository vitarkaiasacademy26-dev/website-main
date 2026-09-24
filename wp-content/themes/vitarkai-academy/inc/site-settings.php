<?php
if (!defined('ABSPATH')) {
    exit;
}

function vitarkai_create_default_pages() {
    $pages = array(
        'home' => array(
            'title' => 'Home',
            'content' => '<p>Welcome to Vitarka IAS Academy.</p>',
        ),
        'study-materials' => array(
            'title' => 'Study Materials',
            'content' => '<p>Study materials, notes, and mock resources for exam preparation.</p>',
        ),
        'successful-strategies' => array(
            'title' => 'Successful Strategies',
            'content' => '<p>Explore proven success strategies from toppers and mentors.</p>',
        ),
        'mindset-improvement' => array(
            'title' => 'Mindset Improvement',
            'content' => '<p>Build confidence, discipline, and mental resilience for competitive success.</p>',
        ),
        'about-us' => array(
            'title' => 'About Us',
            'content' => '<p>We help dedicated aspirants crack UPSC, GPSC, and other competitive exams.</p>',
        ),
        'our-teaching' => array(
            'title' => 'Our Teaching',
            'content' => '<p>Structured teaching, mentorship, and test strategy designed for serious aspirants.</p>',
        ),
        'contact-us' => array(
            'title' => 'Contact Us',
            'content' => '<p>Connect with our team for counseling and admission support.</p>',
        ),
    );

    foreach ($pages as $slug => $page_data) {
        $existing = get_page_by_path($slug);

        if (!$existing) {
            wp_insert_post(
                array(
                    'post_type' => 'page',
                    'post_status' => 'publish',
                    'post_title' => $page_data['title'],
                    'post_name' => $slug,
                    'post_content' => $page_data['content'],
                )
            );
        }
    }
}

function vitarkai_set_default_pages() {
    vitarkai_create_default_pages();

    $home_page = get_page_by_path('home');
    if ($home_page) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home_page->ID);
    }
}

add_action('after_switch_theme', 'vitarkai_set_default_pages');

function vitarkai_register_theme_options_page() {
    add_menu_page(
        __('Site Settings', 'vitarkai-academy'),
        __('Site Settings', 'vitarkai-academy'),
        'manage_options',
        'vitarkai-site-settings',
        'vitarkai_render_theme_options_page',
        'dashicons-admin-site',
        60
    );
}

add_action('admin_menu', 'vitarkai_register_theme_options_page');

function vitarkai_get_theme_option($key, $default = '') {
    $options = get_option('vitarkai_theme_options', array());
    return isset($options[$key]) ? $options[$key] : $default;
}

function vitarkai_render_theme_options_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (isset($_POST['vitarkai_theme_settings_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['vitarkai_theme_settings_nonce'])), 'vitarkai_theme_settings')) {
        $options = array(
            'phone' => sanitize_text_field(wp_unslash($_POST['phone'] ?? '')),
            'email' => sanitize_email(wp_unslash($_POST['email'] ?? '')),
            'address' => sanitize_textarea_field(wp_unslash($_POST['address'] ?? '')),
            'whatsapp' => sanitize_text_field(wp_unslash($_POST['whatsapp'] ?? '')),
            'facebook' => esc_url_raw(wp_unslash($_POST['facebook'] ?? '')),
            'instagram' => esc_url_raw(wp_unslash($_POST['instagram'] ?? '')),
            'youtube' => esc_url_raw(wp_unslash($_POST['youtube'] ?? '')),
        );

        update_option('vitarkai_theme_options', $options);
    }

    $options = get_option('vitarkai_theme_options', array());
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Vitarka IAS Academy Site Settings', 'vitarkai-academy'); ?></h1>
        <form method="post">
            <?php wp_nonce_field('vitarkai_theme_settings', 'vitarkai_theme_settings_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th><label for="phone"><?php esc_html_e('Phone', 'vitarkai-academy'); ?></label></th>
                    <td><input type="text" id="phone" name="phone" value="<?php echo esc_attr($options['phone'] ?? ''); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th><label for="email"><?php esc_html_e('Email', 'vitarkai-academy'); ?></label></th>
                    <td><input type="email" id="email" name="email" value="<?php echo esc_attr($options['email'] ?? ''); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th><label for="whatsapp"><?php esc_html_e('WhatsApp', 'vitarkai-academy'); ?></label></th>
                    <td><input type="text" id="whatsapp" name="whatsapp" value="<?php echo esc_attr($options['whatsapp'] ?? ''); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th><label for="address"><?php esc_html_e('Address', 'vitarkai-academy'); ?></label></th>
                    <td><textarea id="address" name="address" rows="4" class="large-text"><?php echo esc_textarea($options['address'] ?? ''); ?></textarea></td>
                </tr>
                <tr>
                    <th><label for="facebook"><?php esc_html_e('Facebook URL', 'vitarkai-academy'); ?></label></th>
                    <td><input type="url" id="facebook" name="facebook" value="<?php echo esc_attr($options['facebook'] ?? ''); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th><label for="instagram"><?php esc_html_e('Instagram URL', 'vitarkai-academy'); ?></label></th>
                    <td><input type="url" id="instagram" name="instagram" value="<?php echo esc_attr($options['instagram'] ?? ''); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th><label for="youtube"><?php esc_html_e('YouTube URL', 'vitarkai-academy'); ?></label></th>
                    <td><input type="url" id="youtube" name="youtube" value="<?php echo esc_attr($options['youtube'] ?? ''); ?>" class="regular-text"></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
