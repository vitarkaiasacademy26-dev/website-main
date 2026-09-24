<?php
/**
 * Template Name: Contact Us
 */
get_header();
?>

<div class="container">
    <div class="page-intro">
        <span class="eyebrow eyebrow--dark"><?php esc_html_e('Connect With Us', 'vitarkai-academy'); ?></span>
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div>

    <div class="contact-layout">
        <div class="contact-card">
            <h3><?php esc_html_e('Contact Information', 'vitarkai-academy'); ?></h3>
            <ul class="contact-list">
                <li><strong><?php esc_html_e('Phone:', 'vitarkai-academy'); ?></strong> <?php echo esc_html(vitarkai_get_theme_option('phone', '+91 00000 00000')); ?></li>
                <li><strong><?php esc_html_e('Email:', 'vitarkai-academy'); ?></strong> <?php echo esc_html(vitarkai_get_theme_option('email', 'hello@vitarkaiacademy.com')); ?></li>
                <li><strong><?php esc_html_e('Address:', 'vitarkai-academy'); ?></strong> <?php echo esc_html(vitarkai_get_theme_option('address', 'Your City, Gujarat')); ?></li>
            </ul>
        </div>

        <div class="contact-card contact-card--wide">
            <h3><?php esc_html_e('Send us a message', 'vitarkai-academy'); ?></h3>
            <?php echo vitarkai_contact_form_markup(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
