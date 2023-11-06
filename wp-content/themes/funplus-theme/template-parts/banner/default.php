<?php

/**
 * Default Banner 
 * The banner for most new pages.
 */

// Content
$text = get_field('banner_text');
$featured_image = get_field('banner_featured_image1');
$banner_id = str_replace('.', '', uniqid('banner_')); ?>

<div class="container banner-container" id="<?= $banner_id; ?>">
    <div class="banner default-banner wow">

        <?php get_template_part('template-parts/banner/parts/background'); ?>
        <?php get_template_part('template-parts/banner/parts/shapes'); ?>

        <div class="container container-sm banner-inner-container">
            <div class="banner__inner">
                <div class="banner__main fixed-height">

                    <div class="banner__main__content">
                        <?php get_template_part('template-parts/banner/parts/heading'); ?>

                        <?php if (!empty($text)) : ?>
                            <div class="banner-blurb fadeIn">
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <?php echo $text; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="banner__main__feature">
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

    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(() => {
        initWebm('<?= $banner_id; ?>');
    });
</script>