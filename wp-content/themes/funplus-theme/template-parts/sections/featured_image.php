<?php

/**
 * Featured Image
 * Display an image with text.
 */

// Heading
$heading_highlight = get_sub_field('heading_highlight');
$heading_1 = get_sub_field('heading_1');
$heading_2 = get_sub_field('heading_2');
$heading_text = get_sub_field('heading_text');

// Content
$text = get_sub_field('text');
$button = get_sub_field('button');
$featured_image = get_sub_field('featured_image');

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section featured-image wow <?php echo $spacing; ?>">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-12 col-md-11 offset-0 offset-md-1">
                <div class="row no-gutters">
                    <div class="col-12 col-lg-5 align-self-center">
                        <div class="row no-gutters">
                            <div class="col-12 col-lg-10">
                                <?php get_template_part('template-parts/global/heading', null, [
                                    'highlight' => $heading_highlight,
                                    'heading_1' => $heading_1,
                                    'heading_2' => $heading_2,
                                    'text'      => $heading_text
                                ]); ?>
                            </div>
                            <div class="col-12 col-lg-10 offset-0 offset-lg-2">
                                <div class="featured-image__text wow fadeIn" data-wow-delay="1.2s">
                                    <?php if (!empty($text)) :
                                        echo $text;
                                    endif; ?>
                                </div>
                                <?php if (!empty($button)) : ?>
                                    <div class="wow fadeIn" data-wow-delay="1.4s">
                                        <?php get_template_part('template-parts/global/btn-plus','',['button' => $button,'classes' => 'featured-image__button btn-primary btn-plus-white']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 offset-0 offset-md-1">
                        <div class="featured-image__image">
                            <div class="shape-outer-cross-wrapper squeezeInBounce">
                                <div class="shape shape-outer-cross"></div>
                            </div>
                            <div class="featured-image__image__inner">
                                <figure class="featured-image__image__inner__image uncoverFromLeft">
                                    <?php echo wp_get_attachment_image($featured_image, 'full', '', []); ?>
                                </figure>

                                <div class="shape-inner-circle-wrapper shape-inner-circle-top squeezeInBounce">
                                    <div class="shape shape-inner-circle"></div>
                                </div>

                                <div class="shape-inner-circle-wrapper shape-inner-circle-bottom squeezeInBounce">
                                    <div class="shape shape-inner-circle"></div>
                                </div>

                                <div class="shape-inner-pill-wrapper squeezeInBounce">
                                    <div class="shape shape-inner-pill"></div>
                                </div>

                                <div class="shape-inner-cross-wrapper squeezeInBounce">
                                    <div class="shape shape-inner-cross"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>