<?php

/**
 * Template Name: Blank with Sidebar
 */

get_header();

$lang = get_field('page_language_select');
$nav_title = get_field('side_nav_title');
$disable_bullet = get_field('disable_bullet_styles');
?>
<main class="content-wrapper privacy">

  <!-- only show dropdown when in european policy pages -->

  <div class="language-container container">
    <div class="row">
      <div class="col-md-2">
        <div class="dropdown show language-select">
          <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            if ($lang) {
              echo $lang;
            } else {
              echo 'English';
            }
            ?>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <?php

            if (has_post_parent()) {
              $parent = $post->post_parent;
            } else {
              $parent = $post->ID;
            }

            $args = array(
              'post_type'      => 'page',
              'posts_per_page' => -1,
              'post_parent'    => $parent,
              'order'          => 'ASC',
              'orderby'        => 'menu_order',
            );

            $lists = new WP_Query($args);

            while ($lists->have_posts()) : $lists->the_post();
            ?>

              <a href="<?php echo get_the_permalink(); ?>" class="dropdown-item">
                <?php echo get_field('page_language_select') ?>
              </a>

            <?php endwhile;
            wp_reset_postdata(); ?>

          </div>

          <?php
          if (have_rows('side_nav')) :
            $i = 1;
            echo '<div class="nav-title">' . $nav_title . '</div>';
            echo '<div class="heading-list-container">';
            while (have_rows('side_nav')) : the_row();
              $title = get_sub_field('title');
              echo '<a class="lower" href="' . get_the_permalink() . '#section-' . $i . '">';
              echo $title;
              echo '</a>';
              $i++;
            endwhile;
            echo '</div>';
          endif;
          ?>
        </div>
      </div>
    </div>
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