<?php

/**
 * Template Name: Bravo Games
 */


get_header();
?>

<main class="content-wrapper blank">

    <iframe id="bravo" width="100%" height="1080px" src="https://bravo-games.com/externalHome" frameborder="0"></iframe>

    <script>
        window.addEventListener(
            "message",
            (event) => {
                if (event.origin !== "https://bravo-games.com") return;

                document.querySelector('#bravo').setAttribute("height", event.data.height + 'px')
            },
            false,
        );
    </script>

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