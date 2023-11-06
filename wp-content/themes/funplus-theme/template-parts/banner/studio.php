<?php

/**
 * Studio Listing Banner 
 */

// Content
$text = get_field('banner_text');
?>

<div class="container banner-container">
    <div class="banner studio-banner wow" data-wow-offset="70">

        <?php get_template_part('template-parts/banner/parts/background'); ?>
        <?php get_template_part('template-parts/banner/parts/shapes'); ?>

        <div class="container container-sm banner-inner-container">
            <div class="banner__inner">
                <div class="banner__main">

                    <div class="banner__main__content">
                        <?php get_template_part('template-parts/banner/parts/heading'); ?>

                        <?php if (!empty($text)) : ?>
                            <div class="banner-blurb fadeIn">
                                <div class="row">
                                    <div class="col-12 col-md-7">
                                        <?php echo $text; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>

        <?php if (get_field('banner_stats')) : ?>
            <!-- Banner Bottom Feature -->
            <div class="banner__bottom-feature">
                <div class="banner__bottom-feature__content">
                    <?php get_template_part('template-parts/banner/parts/statistics'); ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>