<?php

/**
 * Support
 * Display the heading block and then a button
 */

// Heading
$heading_highlight = get_sub_field('heading_highlight');
$heading_1 = get_sub_field('heading_1');
$heading_2 = get_sub_field('heading_2');
$heading_text = get_sub_field('heading_text');

// Content
$button = get_sub_field('button');

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section support wow <?php echo $spacing; ?>">
    <div class="support__container container container-sm">
        <?php get_template_part('template-parts/global/heading', null, [
            'highlight' => $heading_highlight,
            'heading_1' => $heading_1,
            'heading_2' => $heading_2,
            'text'      => $heading_text
        ]); ?>
        <div class="support__container__button text-center uncoverFromLeft">
            <?php if ($button) : ?>
                <?php get_template_part('template-parts/global/btn-plus','',['button' => $button, 'classes' => 'btn-primary btn-plus-white']); ?>
            <?php endif; ?>
        </div>
    </div>
</section>