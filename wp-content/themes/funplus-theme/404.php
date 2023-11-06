<?php get_header(); ?>

<main class="content-wrapper d-flex flex-column justify-content-center">
  <div class="container container-sm">
  <?php get_template_part('template-parts/global/heading', null, [
    'highlight' => 'span',
    'heading_1' => 'Out of',
    'heading_2' => 'Bounds',
    'text'      => '    <h4>404 Not Found</h4> <p>Looks like you\'re exploring the edge of our site map and gone too far!</p><p>Fast travel back <a href="/">home</a></p>'
  ]); ?>
  </div>
</main>


<?php get_footer(); ?>
