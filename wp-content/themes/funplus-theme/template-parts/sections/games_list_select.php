<?php

/**
 * Games List
 * Display a looped list of games, with AJAX load more.
 */

// Content

// Load More
$games = get_sub_field('games');

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section games-list <?php echo $spacing; ?>">
    <div class="games-list__inner load-more-target wow">
        <?php

        foreach ($games as $index => $post) :
            setup_postdata($post);
            get_template_part('template-parts/global/game', false, ['index' => $index]);
        endforeach;
        wp_reset_postdata();
        ?>
    </div>
</section>