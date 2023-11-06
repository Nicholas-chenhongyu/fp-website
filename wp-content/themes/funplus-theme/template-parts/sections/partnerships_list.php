<?php

/**
 * Partnerships List
 * Display a looped list of partnerships, with AJAX load more.
 */

// Content
$count = get_sub_field('count');

$partnerships = new WP_Query([
    'post_type'      => 'partnership',
    'posts_per_page' => $count ? $count : 5,
]);

// Load More
$max = $partnerships->max_num_pages;
$loadMore_id = str_replace('.', '', uniqid('loadMore_'));

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section games-list <?php echo $spacing; ?>" id="<?php echo esc_attr($loadMore_id); ?>" data-max="<?php echo $max; ?>">
    <div class="games-list__inner load-more-target wow">
        <?php if ($partnerships->have_posts()) :
            $index = 0;
            while ($partnerships->have_posts()) :
                $partnerships->the_post();
                get_template_part('template-parts/global/partnership', false, ['index' => $index]);
                $index++;
            endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>
    <?php
    // Load more
    if ($partnerships->max_num_pages > 1) :
        $args = [
            'title' => 'LOAD MORE',
            'load_args' => [
                'post_type' => 'partnership',
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