<?php
/**
 * Template Name: About Us
 */
get_header();
?>

<div class="container">
    <div class="page-intro">
        <span class="eyebrow eyebrow--dark"><?php esc_html_e('Our Story', 'vitarkai-academy'); ?></span>
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div>

    <div class="about-grid">
        <div class="about-copy">
            <p><?php esc_html_e('Vitarka IAS Academy is a student-focused coaching platform designed to help aspirants excel in UPSC, GPSC and other competitive examinations with structure, mentorship, and discipline.', 'vitarkai-academy'); ?></p>
            <p><?php esc_html_e('Our mission is to turn ambition into action through curated guidance, strategic content, and consistent support.', 'vitarkai-academy'); ?></p>
            <p><?php esc_html_e('We focus on conceptual clarity, answer-writing practice, interview preparation, and exam temperament to build resilient, high-performing candidates.', 'vitarkai-academy'); ?></p>
        </div>
        <div class="about-boxes">
            <div class="info-card">
                <h3><?php esc_html_e('Mission', 'vitarkai-academy'); ?></h3>
                <p><?php esc_html_e('Empower aspirants with focused guidance and disciplined preparation strategies.', 'vitarkai-academy'); ?></p>
            </div>
            <div class="info-card">
                <h3><?php esc_html_e('Vision', 'vitarkai-academy'); ?></h3>
                <p><?php esc_html_e('Create confident, competent, and exam-ready leaders for public service.', 'vitarkai-academy'); ?></p>
            </div>
            <div class="info-card">
                <h3><?php esc_html_e('Why Us', 'vitarkai-academy'); ?></h3>
                <p><?php esc_html_e('Personalized mentoring, modern learning systems, and a practical approach to exam success.', 'vitarkai-academy'); ?></p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
