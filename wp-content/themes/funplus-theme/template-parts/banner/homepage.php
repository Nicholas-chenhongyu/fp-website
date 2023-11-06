<?php

/**
 * Homepage Banner 
 */

// Content
$text = get_field('banner_text');
$button = get_field('banner_button');
$featured_image = get_field('banner_featured_image1');
$bg_color = get_field('banner_bg_color') ? get_field('banner_bg_color') : 'orange';
$banner_id = str_replace('.', '', uniqid('banner_'));
$ggj_event = get_field('green_game_jam', 'option');


// Height
// We need to set a fixed height if there is no featured image set
$height = empty($featured_image['image']) ? 'fixed-height' : '';
?>

<div class="container banner-container" id="<?= $banner_id; ?>">
    <!-- <div class="wow fadeIn" data-wow-offset="70"> -->
    <div class="banner homepage-banner wow <?= $bg_color; ?>">

        <?php if (!$ggj_event):
          get_template_part('template-parts/banner/parts/background');
          get_template_part('template-parts/banner/parts/shapes');
        ?>

        <div class="container container-sm banner-inner-container">
            <div class="banner__inner">
                <div class="banner__main <?= $height; ?>">

                    <div class="banner__main__content">
                        <?php get_template_part('template-parts/banner/parts/heading'); ?>

                        <?php if (!empty($text)) : ?>
                            <div class="banner-blurb fadeIn">
                                <div class="row">
                                    <div class="col-12 col-md-7">
                                        <?= $text; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($button)) : ?>
                            <?php get_template_part('template-parts/global/btn-plus', '', ['button' => $button, 'classes' => 'btn-light btn-plus-white uncoverFromLeft']); ?>
                        <?php endif; ?>
                    </div>

                    <div class="banner__main__feature <?php echo $featured_image['media_type'] === 'video' && $featured_image['hide_on_mobile'] ? 'hidden-mobile' : ''; ?>">
                        <?php if ($featured_image['media_type'] === 'video') : ?>
                            <video class="banner__main__feature__video d-none fadeIn" muted autoplay <?= $featured_image['loop_video'] ? 'loop' : ''; ?>>
                                <?php if (!empty($featured_image['video'])) : ?>
                                    <source src="<?= get_permalink($featured_image['video']); ?>" type="video/webm" class="d-none" />
                                <?php endif; ?>
                            </video>

                            <?= wp_get_attachment_image($featured_image['image'], 'full', false, ['class' => 'banner__main__feature__placeholder fadeIn']); ?>
                        <?php else : ?>
                            <?php if (!empty($featured_image['image'])) : ?>
                                <?= wp_get_attachment_image($featured_image['image'], 'full', false, ['class' => 'fadeIn']); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Green Game Jam Event -->
        <?php else : ?>
        
          <div class="container banner-inner-container" style="background-image:url(<?php echo get_stylesheet_directory_uri()."/assets/banner_ggj.jpg" ?>); background-size: cover; background-position: center;">
            <div class="banner__inner">
              <a href="<?php echo get_site_url() ."/amazonapocalypse" ?>">
                <div class="banner__main <?= $height; ?>"></div>
              </a>
            </div>
          </div>

        <?php endif; ?>

        <?php if (get_field('banner_stats')) : ?>
            <!-- Banner Bottom Feature -->
            <div class="banner__bottom-feature">
                <div class="banner__bottom-feature__content">
                    <?php get_template_part('template-parts/banner/parts/statistics'); ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
    <!-- </div> -->
</div>

<script type="text/javascript">
    jQuery(document).ready(() => {
        initWebm('<?= $banner_id; ?>');
    });
</script>