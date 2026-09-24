<?php
get_header();
while (have_posts()) : the_post();
?>
<div class="container">
    <article class="page-content">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="entry-content"><?php the_content(); ?></div>
    </article>
</div>
<?php endwhile; get_footer(); ?>
