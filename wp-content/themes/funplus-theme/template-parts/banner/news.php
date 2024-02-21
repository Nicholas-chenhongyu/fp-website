<?php

/**
 * Homepage Banner 
 */

// Content

$news_id = get_option('page_for_posts');

$text = get_field('banner_text', $news_id);
$button = get_field('banner_button', $news_id);
$bg_image = get_field('banner_img', $news_id);
$banner_id = str_replace('.', '', uniqid('banner_'));
?>

<div class="banner-container" id="<?= $banner_id; ?>">
  <div class="banner news-banner wow">

    <div class="container banner-inner-container">
      <div class="banner__inner">
        <div class="banner__main fixed-height">
          <div class="banner__main__content">
            <?php get_template_part('template-parts/banner/parts/heading'); ?>
          </div>
          <div class="banner__main__feature">
            <?php if (!empty($bg_image)) : ?>
              <?= wp_get_attachment_image($bg_image, 'full', false, ['class' => 'fadeIn']); ?>
            <?php endif; ?>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>