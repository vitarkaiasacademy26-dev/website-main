<?php
get_header();
while (have_posts()) :
    the_post();
    $exam_terms = get_the_terms(get_the_ID(), 'exam_type');
    $course_types = get_the_terms(get_the_ID(), 'course_type');
    $duration = get_post_meta(get_the_ID(), '_course_duration', true);
    $fee = get_post_meta(get_the_ID(), '_course_fee', true);
    $mode = get_post_meta(get_the_ID(), '_course_mode', true);
    $start_date = get_post_meta(get_the_ID(), '_course_start_date', true);
    $class_size = get_post_meta(get_the_ID(), '_course_class_size', true);
    ?>

    <div class="container">
        <article class="course-single">
            <header class="course-single__header">
                <?php if ($exam_terms && !is_wp_error($exam_terms)) : ?>
                    <span class="course-card__tag"><?php echo esc_html($exam_terms[0]->name); ?></span>
                <?php endif; ?>
                <h1 class="page-title"><?php the_title(); ?></h1>
                <?php if ($course_types && !is_wp_error($course_types)) : ?>
                    <p class="course-card__meta"><?php echo esc_html(implode(', ', wp_list_pluck($course_types, 'name'))); ?></p>
                <?php endif; ?>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="course-single__media"><?php the_post_thumbnail('large'); ?></div>
            <?php endif; ?>

            <div class="course-single__content">
                <div class="course-single__main">
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>

                <aside class="course-single__sidebar">
                    <div class="course-highlight-box">
                        <h3><?php esc_html_e('Course Snapshot', 'vitarkai-academy'); ?></h3>
                        <ul>
                            <?php if ($duration) : ?><li><strong><?php esc_html_e('Duration:', 'vitarkai-academy'); ?></strong> <?php echo esc_html($duration); ?></li><?php endif; ?>
                            <?php if ($fee) : ?><li><strong><?php esc_html_e('Fee:', 'vitarkai-academy'); ?></strong> <?php echo esc_html($fee); ?></li><?php endif; ?>
                            <?php if ($mode) : ?><li><strong><?php esc_html_e('Mode:', 'vitarkai-academy'); ?></strong> <?php echo esc_html($mode); ?></li><?php endif; ?>
                            <?php if ($start_date) : ?><li><strong><?php esc_html_e('Starts:', 'vitarkai-academy'); ?></strong> <?php echo esc_html(date_i18n(get_option('date_format'), strtotime($start_date))); ?></li><?php endif; ?>
                            <?php if ($class_size) : ?><li><strong><?php esc_html_e('Class Size:', 'vitarkai-academy'); ?></strong> <?php echo esc_html($class_size); ?></li><?php endif; ?>
                        </ul>
                        <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="button button--primary"><?php esc_html_e('Enroll Now', 'vitarkai-academy'); ?></a>
                    </div>
                </aside>
            </div>
        </article>
    </div>

<?php endwhile; ?>
<?php get_footer(); ?>
