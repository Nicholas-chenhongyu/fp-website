<?php get_header(); ?>

<main class="content-wrapper">

    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            if(!is_page('privacy-policy') && !is_page('terms-conditions')) {
                get_template_part('template-parts/banner');
            }
            get_template_part('template-parts/sections');
        endwhile;
    endif;
    ?>

</main>

<?php get_footer(); ?>