<?php
if (!defined('ABSPATH')) {
    exit;
}

function vitarkai_academy_primary_menu() {
    if (has_nav_menu('primary')) {
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'container'      => 'nav',
                'container_class'=> 'primary-menu',
                'menu_class'    => 'menu',
                'fallback_cb'    => 'vitarkai_academy_fallback_menu',
                'depth'          => 2,
            )
        );
        return;
    }

    vitarkai_academy_fallback_menu();
}

function vitarkai_academy_fallback_menu() {
    echo '<nav class="primary-menu"><ul class="menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'vitarkai-academy') . '</a></li>';
    echo '</ul></nav>';
}
