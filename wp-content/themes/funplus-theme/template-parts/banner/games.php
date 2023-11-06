<?php

/**
 * Games Banner 
 */

// Content
$text = get_field('banner_text');
$featured = get_field('banner_featured_image'); ?>

<div class="container banner-container">
    <div class="banner games-banner wow">

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
                </div>
            </div>
        </div>
        <?php if (!empty($featured)) :
            echo wp_get_attachment_image($featured, 'full', false, ['class' => 'banner__feature fadeIn']);
        endif; ?>

    </div>
</div>