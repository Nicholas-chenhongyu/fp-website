<?php 

/**
 * Template Name: Amazon Apocolypse
 */


get_header(); 

?>

<main class="content-wrapper blank">

    <div class="language-container container" style="margin-bottom: 50px">

    </div>

    <milkywire-ticker widget-id="pwi_cli30by0a00010cnnaa652vzk"></milkywire-ticker>

    <milkywire-map widget-id="pwi_cli303n4500030cmd1ecrhdjp"></milkywire-map>

    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/sections');
        endwhile;
    endif;
    ?>

</main>
<script type="module" src="https://portal.milkywire.com/v1/widgets/index.min.js"></script>

<?php get_footer(); ?>
