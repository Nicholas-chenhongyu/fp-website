<?php get_header(); ?>

<main class="content-wrapper">

    <?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/banner');
        get_template_part('template-parts/sections');
    endwhile;
    ?>

</main>

<?php get_footer(); ?>