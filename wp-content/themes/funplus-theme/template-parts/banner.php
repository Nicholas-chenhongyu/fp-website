<?php

/**
 * Include the banner that is relevant to that page.
 */

$mapping = get_field('page_mapping', 'option'); ?>

<div class="banner-wrapper wow fadeIn">

    <?php
    // Blog page
    if (is_home()) {
        get_template_part('template-parts/banner/news');
    } else if (is_singular('post') || is_singular('insider_info') || is_singular('awards') || is_singular('partnership') || is_singular('people') || is_singular('game_update')) {
        // News Single
        get_template_part('template-parts/banner/news-single');
    } else if (is_singular('game') || is_singular('comic')) {
        get_template_part('template-parts/banner/game');
    } else {
        // default 
        get_template_part('template-parts/banner/general');
    }

    ?>

</div>