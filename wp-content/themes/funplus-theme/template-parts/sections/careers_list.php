<?php

/**
 * Careers List
 * Display a looped list of careers, with AJAX load more.
 */

// Content

if (isset($_GET["location"])) {
    $location = filter_var($_GET["location"]);
    $tax_query = array (
        array(
            'taxonomy' => 'country',
            'field' => 'slug',
            'terms' => $location,
        )
    );
} else {
    $location = 'All Locations';
    $tax_query = '';
}

$careers = new WP_Query([
    'post_type'      => 'career',
    'posts_per_page' => 6,
    'tax_query' => $tax_query
]);

// Load More
$max = $careers->max_num_pages;
$loadMore_id = str_replace('.', '', uniqid('loadMore_'));

?>

<section class="career-list post-loop" id="<?php echo esc_attr($loadMore_id); ?>" data-max="<?php echo $max ?>">
    
    <!-- Career List -->
    <div class="container container-sm">
        <div class="jv-careersite" data-careersite="funplus" data-force-redirect></div>
    </div>
</section>



<script src="https://jobs.jobvite.com/__assets__/scripts/careersite/public/iframe.js"></script>

<script type="text/javascript">
    jQuery(document).ready(() => {
        initLoadMore('<?php echo $loadMore_id; ?>');
    });
</script>