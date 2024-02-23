<?php

/**
 * Careers List
 * Display a looped list of careers, with AJAX load more.
 */

// Content

if (isset($_GET["location"])) {
  $location = filter_var($_GET["location"]);
  $tax_query = array(
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
    <?php
    // $response = wp_remote_get(
    //   "https://api.factorialhr.com/api/v1/ats/job_postings",
    //   [
    //     'headers' => [
    //       'Content-Type' => 'application/json',
    //       'X-Api-Key' => '2648e57deebccbbddb8acaa2548bbd08e138b50105999d6285c020a964ed3d52'
    //     ]
    //   ]
    // );
    // $jobs = json_decode($response['body']);
    // // debug($jobs);
    // foreach ($jobs as $job) {
    //   echo $job->title;
    //   echo PHP_EOL;
    // }
    ?>
    <iframe width="100%" height="800" src="https://funplus.factorialhr.com/embed/jobs" frameborder="0"></iframe>
  </div>
</section>



<!-- <script src="https://jobs.jobvite.com/__assets__/scripts/careersite/public/iframe.js"></script> -->

<!-- <script type="text/javascript">
    jQuery(document).ready(() => {
        initLoadMore('<?php echo $loadMore_id; ?>');
    });
</script> -->