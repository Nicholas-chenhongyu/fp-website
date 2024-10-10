<?php

/**
 * Include the banner that is relevant to that page.
 */

$mapping = get_field('page_mapping', 'option'); ?>

<div class="banner-wrapper wow fadeIn">

    <?php

    $original_banner_list = ['post', 'insider_info', 'awards', 'partnership', 'people', 'game_update'];
    $game_banner_list = ['game', 'comic', 'ourstudio'];
    $current_post_type = get_post_type();

    if (is_home()) {
        // Newsroom page
        get_template_part('template-parts/banner/news');
    } else if (in_array($current_post_type, $original_banner_list)) {
        // Templates using original post banner
        get_template_part('template-parts/banner/news-single');
    } else {
        // Default full width banner
        get_template_part('template-parts/banner/general');
    }

    ?>

</div>