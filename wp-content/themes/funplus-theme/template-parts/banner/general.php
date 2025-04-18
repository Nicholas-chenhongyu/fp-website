<?php

/**
 * Homepage Banner 
 */

// Content
$text = get_field('banner_text');
$button = get_field('banner_button');
$bg_image = get_field('banner_img');
$banner_id = str_replace('.', '', uniqid('banner_'));

// Height
// We need to set a fixed height if there is no featured image set
$height = empty($bg_image) ? 'fixed-height' : '';
?>

<div class="banner-container" id="<?= $banner_id; ?>">
  <div class="banner wow">

    <div class="container banner-inner-container">
      <div class="banner__inner">
        <div class="banner__main fixed-height">
          <div class="banner__main__content">
            <?php get_template_part('template-parts/banner/parts/heading'); ?>

            <?php if (!empty($text)) : ?>
              <div class="banner-blurb fadeIn">
                <div class="row">
                  <div class="col-12">
                    <?= $text; ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
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
  <!-- </div> -->
</div>