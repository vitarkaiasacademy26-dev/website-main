<?php
get_header();
?>

<div class="container">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Our Courses', 'vitarkai-academy'); ?></h1>
    </header>

    <?php
    $course_query = new WP_Query(
        array(
            'post_type' => 'course',
            'post_status' => 'publish',
            'posts_per_page' => 9,
            'orderby' => 'date',
            'order' => 'DESC',
        )
    );

    if ($course_query->have_posts()) :
        echo '<div class="course-grid">';
        while ($course_query->have_posts()) :
            $course_query->the_post();
            $terms = get_the_terms(get_the_ID(), 'exam_type');
            $course_types = get_the_terms(get_the_ID(), 'course_type');
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

                    <?php if ($course_types && !is_wp_error($course_types)) : ?>
                        <p class="course-card__meta"><?php echo esc_html(implode(', ', wp_list_pluck($course_types, 'name'))); ?></p>
                    <?php endif; ?>

                    <div class="course-card__details">
                        <?php if ($duration) : ?>
                            <span><?php echo esc_html__('Duration:', 'vitarkai-academy') . ' ' . esc_html($duration); ?></span>
                        <?php endif; ?>
                        <?php if ($fee) : ?>
                            <span><?php echo esc_html__('Fee:', 'vitarkai-academy') . ' ' . esc_html($fee); ?></span>
                        <?php endif; ?>
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
        ?>
        <div class="error-404">
            <p><?php esc_html_e('No courses available right now.', 'vitarkai-academy'); ?></p>
        </div>
        <?php
    endif;
    ?>
</div>

<?php get_footer(); ?>
