<?php

/**
 * Heading
 * Displays the heading but as its own block.
 */

// Heading
$heading_highlight = get_sub_field('heading_highlight');
$heading_1 = get_sub_field('heading_1');
$heading_2 = get_sub_field('heading_2');
$heading_text = get_sub_field('heading_text');
$anchor_id = get_sub_field('anchor_id');

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section heading-block <?php echo $spacing; ?>" id="<?php echo $anchor_id; ?>">
    <div class="container container-sm">
        <?php get_template_part('template-parts/global/heading', null, [
            'highlight' => $heading_highlight,
            'heading_1' => $heading_1,
            'heading_2' => $heading_2,
            'text'      => $heading_text
        ]); ?>
    </div>
</section>