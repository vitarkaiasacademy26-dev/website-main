<?php
get_header();
?>
<div class="container">
    <div class="page-intro">
        <span class="eyebrow eyebrow--dark"><?php esc_html_e('Watch', 'vitarkai-academy'); ?></span>
        <h1 class="page-title"><?php esc_html_e('YouTube Videos', 'vitarkai-academy'); ?></h1>
    </div>
    <?php if (have_posts()) : ?>
        <div class="feature-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('info-card'); ?>>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="entry-content"><?php the_excerpt(); ?></div>
                </article>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <div class="error-404"><p><?php esc_html_e('No videos yet.', 'vitarkai-academy'); ?></p></div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
