<?php
get_header();
?>

<section class="hero">
    <div class="container hero__content">
        <span class="eyebrow"><?php esc_html_e('UPSC | GPSC | Competitive Exams', 'vitarkai-academy'); ?></span>
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>
        <div class="hero__actions">
            <a href="<?php echo esc_url(home_url('/courses')); ?>" class="button button--primary"><?php esc_html_e('Explore Courses', 'vitarkai-academy'); ?></a>
            <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="button button--secondary"><?php esc_html_e('Book Counselling', 'vitarkai-academy'); ?></a>
        </div>
    </div>
</section>

<section class="feature-strip">
    <div class="container feature-strip__grid">
        <div class="feature-box">
            <strong>450+</strong>
            <span><?php esc_html_e('Topper Mentorship', 'vitarkai-academy'); ?></span>
        </div>
        <div class="feature-box">
            <strong>15+</strong>
            <span><?php esc_html_e('Years of Experience', 'vitarkai-academy'); ?></span>
        </div>
        <div class="feature-box">
            <strong>98%</strong>
            <span><?php esc_html_e('Student Satisfaction', 'vitarkai-academy'); ?></span>
        </div>
        <div class="feature-box">
            <strong>24/7</strong>
            <span><?php esc_html_e('Mentor Support', 'vitarkai-academy'); ?></span>
        </div>
    </div>
</section>

<section class="home-section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow eyebrow--dark"><?php esc_html_e('Popular Courses', 'vitarkai-academy'); ?></span>
            <h2><?php esc_html_e('Prepare with the right strategy', 'vitarkai-academy'); ?></h2>
        </div>

        <?php
        $course_query = new WP_Query(
            array(
                'post_type' => 'course',
                'post_status' => 'publish',
                'posts_per_page' => 3,
            )
        );

        if ($course_query->have_posts()) :
            echo '<div class="course-grid">';
            while ($course_query->have_posts()) :
                $course_query->the_post();
                $terms = get_the_terms(get_the_ID(), 'exam_type');
                $fee = get_post_meta(get_the_ID(), '_course_fee', true);
                $duration = get_post_meta(get_the_ID(), '_course_duration', true);
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('course-card'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="course-card__image"><?php the_post_thumbnail('medium'); ?></div>
                    <?php endif; ?>
                    <div class="course-card__body">
                        <?php if ($terms && !is_wp_error($terms)) : ?>
                            <span class="course-card__tag"><?php echo esc_html($terms[0]->name); ?></span>
                        <?php endif; ?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="course-card__details">
                            <?php if ($duration) : ?><span><?php echo esc_html($duration); ?></span><?php endif; ?>
                            <?php if ($fee) : ?><span><?php echo esc_html($fee); ?></span><?php endif; ?>
                        </div>
                        <div class="course-card__excerpt"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink(); ?>" class="button button--primary"><?php esc_html_e('View Course', 'vitarkai-academy'); ?></a>
                    </div>
                </article>
                <?php
            endwhile;
            echo '</div>';
            wp_reset_postdata();
        else :
            echo '<div class="info-box"><p>' . esc_html__('No courses yet. Add course content from the WordPress admin.', 'vitarkai-academy') . '</p></div>';
        endif;
        ?>
    </div>
</section>

<section class="home-section home-section--alt">
    <div class="container split-layout">
        <div>
            <span class="eyebrow eyebrow--dark"><?php esc_html_e('Why Students Trust Us', 'vitarkai-academy'); ?></span>
            <h2><?php esc_html_e('Sharper learning. Better performance.', 'vitarkai-academy'); ?></h2>
            <ul class="check-list">
                <li><?php esc_html_e('Focused and exam-oriented teaching', 'vitarkai-academy'); ?></li>
                <li><?php esc_html_e('Daily practice and revision discipline', 'vitarkai-academy'); ?></li>
                <li><?php esc_html_e('Mentor support for UPSC/GPSC journeys', 'vitarkai-academy'); ?></li>
                <li><?php esc_html_e('Updated study material and test series', 'vitarkai-academy'); ?></li>
            </ul>
        </div>
        <div class="highlight-panel">
            <h3><?php esc_html_e('Admissions Open', 'vitarkai-academy'); ?></h3>
            <p><?php esc_html_e('Join a focused, high-conversion learning community built for serious aspirants.', 'vitarkai-academy'); ?></p>
            <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="button button--primary"><?php esc_html_e('Talk to Advisor', 'vitarkai-academy'); ?></a>
        </div>
    </div>
</section>

<section class="home-section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow eyebrow--dark"><?php esc_html_e('Study Materials', 'vitarkai-academy'); ?></span>
            <h2><?php esc_html_e('Smart resources for smart preparation', 'vitarkai-academy'); ?></h2>
        </div>

        <div class="feature-grid">
            <div class="info-card">
                <h3><?php esc_html_e('Current Affairs', 'vitarkai-academy'); ?></h3>
                <p><?php esc_html_e('Daily and monthly current affairs compiled for exam relevance.', 'vitarkai-academy'); ?></p>
            </div>
            <div class="info-card">
                <h3><?php esc_html_e('GS Notes', 'vitarkai-academy'); ?></h3>
                <p><?php esc_html_e('Structured notes to strengthen static and dynamic preparation.', 'vitarkai-academy'); ?></p>
            </div>
            <div class="info-card">
                <h3><?php esc_html_e('Practice Sets', 'vitarkai-academy'); ?></h3>
                <p><?php esc_html_e('Mock tests, practice papers, and answer-writing drills.', 'vitarkai-academy'); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="home-section home-section--alt">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow eyebrow--dark"><?php esc_html_e('Success Stories', 'vitarkai-academy'); ?></span>
            <h2><?php esc_html_e('Stories that inspire action', 'vitarkai-academy'); ?></h2>
        </div>

        <div class="testimonial-grid">
            <div class="info-card">
                <p>“The coaching system, test feedback, and discipline helped me improve my answer writing significantly.”</p>
                <strong>— UPSC Aspirant</strong>
            </div>
            <div class="info-card">
                <p>“Mentorship and current affairs modules gave me a clear path to stay focused and consistent.”</p>
                <strong>— GPSC Aspirant</strong>
            </div>
            <div class="info-card">
                <p>“The structured notes and mock test strategy made a big difference in my preparation.”</p>
                <strong>— Competitive Exams Student</strong>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
