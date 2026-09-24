<?php
get_header();
?>

<div class="container">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                <?php endif; ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>
            </article>
            <?php
        endwhile;
    else :
        ?>
        <div class="error-404">
            <p><?php esc_html_e('No posts found.', 'vitarkai-academy'); ?></p>
        </div>
        <?php
    endif;
    ?>
</div>

<?php get_footer(); ?>
