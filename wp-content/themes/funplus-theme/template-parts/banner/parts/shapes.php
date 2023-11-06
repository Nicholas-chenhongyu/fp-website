<?php 
  $_id = is_home() ? get_option('page_for_posts') : get_the_ID();
  $shapes = get_field('shapes',$_id);
?>

<div class="banner__shapes">
  <?php foreach ($shapes as $key => $shape): ?>
    <?php switch ($shape['acf_fc_layout']) {
      case 'pill':
        get_template_part('template-parts/banner/parts/shapes/pill','',['order' => $shape['order']]);
        break;
      case 'pill_large':
        get_template_part('template-parts/banner/parts/shapes/pill-large','',['order' => $shape['order']]);
        break;
      case 'pill_small':
        get_template_part('template-parts/banner/parts/shapes/pill-small','',['order' => $shape['order']]);
        break;
      case 'pill_outline':
        get_template_part('template-parts/banner/parts/shapes/pill-outline','',['order' => $shape['order']]);
        break;
      case 'cross':
        get_template_part('template-parts/banner/parts/shapes/cross','',['order' => $shape['order']]);
        break;
      case 'cross_small':
        get_template_part('template-parts/banner/parts/shapes/cross-small','',['order' => $shape['order']]);
        break;
      case 'circle_top':
        get_template_part('template-parts/banner/parts/shapes/circle-top','',['order' => $shape['order']]);
        break;
      case 'circle_bottom':
        get_template_part('template-parts/banner/parts/shapes/circle-bottom','',['order' => $shape['order']]);
        break;
      case 'circle_middle':
        get_template_part('template-parts/banner/parts/shapes/circle-middle','',['order' => $shape['order']]);
        break;
    }; ?>
  <?php endforeach; ?>
</div>