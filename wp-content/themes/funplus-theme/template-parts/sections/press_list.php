<?php

/**
 * Press List
 * Display a looped list of careers, with AJAX load more.
 */

// Content

if (isset($_GET["category"])) {
    $category = filter_var($_GET["category"]);
    $tax_query = array (
        array(
            'taxonomy' => 'country',
            'field' => 'slug',
            'terms' => $category,
        )
    );
} else {
    $category = 'All Locations';
    $tax_query = '';
}

$press = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 6,
    'tax_query' => $tax_query
]);

// Load More
$max = $press->max_num_pages;
$loadMore_id = str_replace('.', '', uniqid('loadMore_'));

?>

<section class="career-list post-loop" id="<?php echo esc_attr($loadMore_id); ?>" data-max="<?php echo $max ?>">
    
    <h3 class="subheading">ALL Press Releases</h3>

    <!-- Career List -->
    <div class="container container-sm">

        <div class="timeline__divider timeline__divider--top d-flex mb-5 align-items-center">
            <hr class="w-100 pb-0">
            <div class="timeline__pill dropdown-toggle">
                <a href="#" role="button" id="countriesLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo esc_html($category); ?>
                </a>
                <div class="careers-locations dropdown-menu" aria-labelledby="countriesLink">
                    <?php 
                        $terms = get_terms( 'category', array(
                            'hide_empty' => false
                        ) );
                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                            echo '<ul>';
                            foreach ( $terms as $term ) {
                                echo '<li><a href="'. get_site_url() .'/careers/?category=' . urlencode($term->slug) . '">' . $term->name . '</a></li>';
                            }
                            echo '</ul>';
                        }
                    ?>
                
                </div>
            </div>
            <hr class="w-100 pb-0">
        </div>
        
        <div class="row load-more-target">
            <?php if ($press->have_posts()) :
                while ($press->have_posts()) :
                    $press->the_post();
                    get_template_part('template-parts/global/career');
                endwhile;

                wp_reset_postdata();
                else:
                    echo '<p class="w-100 text-center">New adventures at this location to be announced soon! Watch this space.</p>';
            endif; ?>
        </div>

        <?php
        // Load more
        if ($press->max_num_pages > 1) :
            $args = [
                'title' => 'More Press',
                'load_args' => [
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'paged' => 2
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