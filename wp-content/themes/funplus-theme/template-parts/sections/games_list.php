<?php

/**
 * Games List
 * Display a looped list of games, with AJAX load more.
 */

// Content
$count = get_sub_field('count');

$games = new WP_Query([
    'post_type'      => 'game',
    'posts_per_page' => $count ? $count : 5,
]);

// Load More
$max = $games->max_num_pages;
$loadMore_id = str_replace('.', '', uniqid('loadMore_'));

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section games-list <?php echo $spacing; ?>" id="<?php echo esc_attr($loadMore_id); ?>" data-max="<?php echo $max; ?>">
    <div class="games-list__inner load-more-target wow">
        <?php if ($games->have_posts()) :
            $index = 0;
            while ($games->have_posts()) :
                $games->the_post();
                get_template_part('template-parts/global/game', false, ['index' => $index]);
                $index++;
            endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>
    <?php
    // Load more
    if ($games->max_num_pages > 1) :
        $args = [
            'title' => 'More games',
            'load_args' => [
                'post_type' => 'game',
                'posts_per_page' => $count ? $count : 5,
                'paged' => 2
            ]
        ];
        get_template_part('template-parts/global/load-more', null, $args);
    endif; ?>
</section>

<script type="text/javascript">
    jQuery(document).ready(() => {
        initLoadMore('<?php echo $loadMore_id; ?>');
    });
</script>