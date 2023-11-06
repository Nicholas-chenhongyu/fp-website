<?php 

/**
 * Template Name: Blank No Sidebar
 */


get_header(); 

?>

<main class="content-wrapper blank">

    <div class="language-container container" style="margin-bottom: 50px">

    </div>

    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/sections');
        endwhile;
    endif;
    ?>

</main>

<?php get_footer(); ?>