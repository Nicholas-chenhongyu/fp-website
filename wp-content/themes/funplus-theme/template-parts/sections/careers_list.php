<?php

/**
 * Careers List
 * Display a looped list of careers, with AJAX load more.
 */

// Content

// if (isset($_GET["location"])) {
//   $location = filter_var($_GET["location"]);
//   $tax_query = array(
//     array(
//       'taxonomy' => 'country',
//       'field' => 'slug',
//       'terms' => $location,
//     )
//   );
// } else {
//   $location = 'All Locations';
//   $tax_query = '';
// }

// $careers = new WP_Query([
//   'post_type'      => 'career',
//   'posts_per_page' => 6,
//   'tax_query' => $tax_query
// ]);

// Load More
// $max = $careers->max_num_pages;
// $loadMore_id = str_replace('.', '', uniqid('loadMore_'));

?>

<section class="career-list post-loop" id="<?php echo esc_attr($loadMore_id); ?>" data-max="<?php echo $max ?>">

    <!-- Career List -->
    <div class="container container-sm vendor-iframe">
        <iframe width="100%" height="800" src="https://funplus.factorialhr.com/embed/jobs" frameborder="0"></iframe>
    </div>
</section>

<style>
    .vendor-iframe {
        padding-left: 0 !important;
        padding-right: 0 !important
    }
</style>