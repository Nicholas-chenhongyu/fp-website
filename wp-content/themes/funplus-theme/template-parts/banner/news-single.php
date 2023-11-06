<?php

/**
 * News Single 
 */

// Content
$heading = get_field('banner_heading');
$text = get_field('banner_text');
$bg_color = get_field('banner_bg_color') ? get_field('banner_bg_color') : 'orange'; ?>

<div class="container banner-container wow">
    <div class="fadeIn" data-wow-offset="70">
        <div class="banner news-single-banner <?= $bg_color; ?>">

            <?php get_template_part('template-parts/banner/parts/background'); ?>
            <?php get_template_part('template-parts/banner/parts/shapes'); ?>

            <div class="container container-sm banner-inner-container">
                <div class="banner__inner">
                    <div class="banner__main">

                        <div class="banner__main__content">

                            <div class="row">
                                <div class="col-12 col-lg-7">
                                    <h1 class="banner-heading">
                                        <span class="fadeIn"><?php echo $heading; ?></span>
                                    </h1>
                                    <p class="post-date"><?php echo get_the_date('F jS, Y'); ?></p>
                                </div>
                            </div>
                        </div>

                        <?php if (!empty($featured_image)) : ?>
                            <div class="banner__main__feature">
                                <?php echo wp_get_attachment_image($featured_image, 'full', false, ['class' => 'fadeIn']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="container container-sm excerpt">
                <div class="banner__bottom-feature__content">
                    <div class="banner-blurb fadeIn">
                        <div class="row">
                            <div class="col-12 col-md-7">
                                <?php echo $text; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>