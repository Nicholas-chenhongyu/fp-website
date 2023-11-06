<?php 
get_header(); 
$ggj = get_field('ggj_event')
?>

<main class="content-wrapper press">

    <?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/banner');
        get_template_part('template-parts/sections');
    endwhile;
    ?>

    <?php if($ggj) : ?>
    <script type="module" src="https://portal.milkywire.com/v1/widgets/index.min.js"></script>
    <div class="container">
      <milkywire-ticker widget-id="pwi_cli30by0a00010cnnaa652vzk"></milkywire-ticker>
      <milkywire-map widget-id="pwi_cli303n4500030cmd1ecrhdjp"></milkywire-map>
      <img class="w-100 h-auto" src="<?php echo get_stylesheet_directory_uri()."/assets/ggj_footer_banner.png" ?>" alt="">
    </div>
    <?php endif; ?>

</main>

<?php get_footer(); ?>