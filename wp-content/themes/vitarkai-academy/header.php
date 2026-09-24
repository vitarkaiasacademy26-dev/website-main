<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="topbar">
        <div class="container topbar__inner">
            <span><?php esc_html_e('Admissions Open for UPSC & GPSC 2025-26', 'vitarkai-academy'); ?></span>
            <a href="<?php echo esc_url(home_url('/contact-us')); ?>"><?php esc_html_e('Book a Free Counselling Call', 'vitarkai-academy'); ?></a>
        </div>
    </div>

    <div class="container site-header__inner">
        <div class="site-branding">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-branding__link">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <span class="site-branding__text"><?php bloginfo('name'); ?></span>
                <?php endif; ?>
            </a>
        </div>

        <div class="site-header__nav">
            <?php vitarkai_academy_primary_menu(); ?>
        </div>

        <div class="site-header__cta">
            <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="button button--primary"><?php esc_html_e('Enroll Now', 'vitarkai-academy'); ?></a>
        </div>
    </div>
</header>

<main class="site-main">
