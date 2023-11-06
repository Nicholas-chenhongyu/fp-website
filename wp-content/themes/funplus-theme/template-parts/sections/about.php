<?php

/**
 * About
 */

// Heading
$heading_highlight = get_sub_field('heading_highlight');
$heading_1 = get_sub_field('heading_1');
$heading_2 = get_sub_field('heading_2');
$heading_text = get_sub_field('heading_text');

// Content
$text = get_sub_field('text');
$button = get_sub_field('button');

// Images
$featured_images = get_sub_field('featured_images');

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing';
?>

<section class="section about <?php echo $spacing; ?>">
    <div class="container container-sm">
        <div class="row no-gutters">
            <div class="col-12 col-lg-6 align-self-start">
                <div class="row">
                    <div class="col-12 col-lg-10">
                        <?php get_template_part('template-parts/global/heading', null, [
                            'highlight' => $heading_highlight,
                            'heading_1' => $heading_1,
                            'heading_2' => $heading_2,
                            'text'      => $heading_text
                        ]); ?>
                    </div>
                    <div class="col-12 col-lg-10 offset-0 offset-lg-2 wow">
                        <div class="about__text wow fadeIn">
                            <?php if (!empty($text)) :
                                echo $text;
                            endif; ?>
                        </div>
                        <?php if (!empty($button)) : ?>
                            <?php get_template_part('template-parts/global/btn-plus','',['button' => $button,'tag' => 'a', 'classes' => 'about__button  btn-primary uncoverFromLeft']); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 align-self-start">
                <div class="about__featured-images">
                    <?php foreach ($featured_images as $key => $featured_image): ?>
                        <?php if (!empty($featured_image['image'])) : ?>
                            <div class="featured wow fadeIn" data-wow-offset="-500" data-wow-delay="<?= 1.75 + ($key * 0.3); ?>s">
                                <?php echo wp_get_attachment_image($featured_image['image'], 'full', '', ['class' => 'about__featured-image']); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
    </div>
</div>
</section>