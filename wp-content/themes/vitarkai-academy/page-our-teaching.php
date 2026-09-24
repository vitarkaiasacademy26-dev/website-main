<?php
/**
 * Template Name: Our Teaching
 */
get_header();
?>

<div class="container">
    <div class="page-intro">
        <span class="eyebrow eyebrow--dark"><?php esc_html_e('Teaching Method', 'vitarkai-academy'); ?></span>
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div>

    <div class="feature-grid">
        <div class="info-card">
            <h3><?php esc_html_e('Concept Learning', 'vitarkai-academy'); ?></h3>
            <p><?php esc_html_e('Strong foundation through clear concept-building and repeated revision.', 'vitarkai-academy'); ?></p>
        </div>
        <div class="info-card">
            <h3><?php esc_html_e('Answer Writing', 'vitarkai-academy'); ?></h3>
            <p><?php esc_html_e('Practice structured answer writing for UPSC, GPSC, and interview-oriented performance.', 'vitarkai-academy'); ?></p>
        </div>
        <div class="info-card">
            <h3><?php esc_html_e('Mentorship', 'vitarkai-academy'); ?></h3>
            <p><?php esc_html_e('Continuous guidance, performance tracking, and personalized support.', 'vitarkai-academy'); ?></p>
        </div>
        <div class="info-card">
            <h3><?php esc_html_e('Test Series', 'vitarkai-academy'); ?></h3>
            <p><?php esc_html_e('Timed mock tests, realistic exam simulations, and detailed feedback.', 'vitarkai-academy'); ?></p>
        </div>
    </div>
</div>

<?php get_footer(); ?>
