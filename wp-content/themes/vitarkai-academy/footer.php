</main>

<footer class="site-footer">
    <div class="container site-footer__top">
        <div class="footer-brand">
            <h3><?php bloginfo('name'); ?></h3>
            <p><?php bloginfo('description'); ?></p>
        </div>

        <div class="footer-links">
            <h4><?php esc_html_e('Quick Links', 'vitarkai-academy'); ?></h4>
            <?php if (has_nav_menu('footer')) : ?>
                <div class="footer-menu">
                    <?php wp_nav_menu(array('theme_location' => 'footer', 'container' => false, 'menu_class' => 'menu')); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="footer-contact">
            <h4><?php esc_html_e('Contact', 'vitarkai-academy'); ?></h4>
            <ul>
                <li><?php echo esc_html__('Phone:', 'vitarkai-academy') . ' ' . esc_html(vitarkai_get_theme_option('phone', '+91 00000 00000')); ?></li>
                <li><?php echo esc_html__('Email:', 'vitarkai-academy') . ' ' . esc_html(vitarkai_get_theme_option('email', 'hello@vitarkaiacademy.com')); ?></li>
                <li><?php echo esc_html__('Location:', 'vitarkai-academy') . ' ' . esc_html(vitarkai_get_theme_option('address', 'Your City')); ?></li>
            </ul>
        </div>
    </div>

    <div class="container site-footer__bottom">
        <p>&copy; <?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'vitarkai-academy'); ?></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
