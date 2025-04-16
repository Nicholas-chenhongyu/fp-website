<?php

/**
 * Info List
 * Display a looped list of insider info, with AJAX load more.
 */

// Content

$info = new WP_Query([
    'post_type'      => 'insider_info',
    'posts_per_page' => 3,
]);

// Load More
$max = $info->max_num_pages;
$loadMore_id = str_replace('.', '', uniqid('loadMore_'));

?>

<section class="career-list post-loop" id="<?php echo esc_attr($loadMore_id); ?>" data-max="<?php echo $max ?>">

    <!-- Career List -->
    <div class="container container-sm">

        <div class="row load-more-target">
            <?php if ($info->have_posts()) :
                while ($info->have_posts()) :
                    $info->the_post();
                    get_template_part('template-parts/global/insider_info');
                endwhile;

                wp_reset_postdata();
            endif; ?>
        </div>

        <?php
        // Load more
        if ($info->max_num_pages > 1) :
            $args = [
                'title' => 'Read More',
                'load_args' => [
                    'post_type' => 'insider_info',
                    'posts_per_page' => 3,
                    'paged' => 2,
                    'post_status' => 'publish',
                ]
            ];
            get_template_part('template-parts/global/load-more', null, $args);
        endif; ?>
    </div>
</section>


<script type="text/javascript">
    jQuery(document).ready(() => {
        initLoadMore('<?php echo $loadMore_id; ?>');
    });
</script>