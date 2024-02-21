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
  } else if (is_singular('game')) {
    get_template_part('template-parts/banner/game');
  } else {
    // default 
    get_template_part('template-parts/banner/general');
  }

  ?>

  <!-- ?php if (is_front_page()) {
    // Homepage
    get_template_part('template-parts/banner/homepage');
  } else if (isset($mapping['games']) && get_the_ID() == $mapping['games']) {
    // Games Listings
    get_template_part('template-parts/banner/games');
  } else if (is_singular('game')) {
    get_template_part('template-parts/banner/game');
  } else if (is_singular('studio')) {
    // Studio Listings
    get_template_part('template-parts/banner/studio');
  } else if (is_home()) {
    // News
    get_template_part('template-parts/banner/news');
  } else if (is_singular('post') || is_singular('insider_info') || is_singular('awards') || is_singular('partnership') || is_singular('people') || is_singular('game_update')) {
    // News Single
    get_template_part('template-parts/banner/news-single');
  } else if (isset($mapping['careers']) && get_the_ID() == $mapping['careers']) {
    // Careers
    get_template_part('template-parts/banner/careers');
  } else if (is_page()) {
    // Default
    get_template_part('template-parts/banner/default');
  } ? -->

</div>