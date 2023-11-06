<?php

/**
 * News Index Banner 
 */

$news_id = get_option('page_for_posts');

// Content
$text = get_field('banner_text', $news_id);
$featured = get_field('banner_featured_image', $news_id); ?>

<div class="container banner-container">
    <div class="banner news-banner wow">

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