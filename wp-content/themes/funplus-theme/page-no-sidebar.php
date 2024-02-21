<?php

/**
 * Template Name: Blank No Sidebar
 */


get_header();
$disable_bullet = get_field('disable_bullet_styles');
?>

<main class="content-wrapper blank">

  <div class="language-container container" style="margin-bottom: 50px">

  </div>
  <?php
  if ($disable_bullet) {
  ?>
    <style>
      ul li {
        list-style: none !important;
      }
    </style>
  <?php
  }
  ?>
  <?php
  if (have_posts()) :
    while (have_posts()) :
      the_post();

      get_template_part('template-parts/sections');
    endwhile;
  endif;
  ?>

</main>

<?php get_footer(); ?>