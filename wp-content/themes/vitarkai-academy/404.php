<?php
get_header();
?>

<div class="container">
    <div class="error-404">
        <h1 class="page-title"><?php esc_html_e('Page not found', 'vitarkai-academy'); ?></h1>
        <p><?php esc_html_e('The page you are looking for could not be found.', 'vitarkai-academy'); ?></p>
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Return to Home', 'vitarkai-academy'); ?></a>
    </div>
</div>

<?php get_footer(); ?>
