<?php

/**
 * Hero
 */

$styles = '';

$heading_1 = get_sub_field('heading_1');
$heading_2 = get_sub_field('heading_2');
$text = get_sub_field('text');
$button = get_sub_field('button');
$featured_img = get_sub_field('featured_image');

// Settings
$size = 'hero-' . (get_sub_field('size') ? get_sub_field('size') : 'md');
$type = 'hero-' . (get_sub_field('type') ? get_sub_field('type') : '');

// Solid
$bg_color = get_sub_field('background_color'); ?>

<div class="container">
    <section class="section hero <?php echo $type; ?> <?php echo $size; ?>" style="<?php echo $styles; ?>">
        <div class="container container-sm">
            <div class="hero__inner">

            </div>

            <!-- We can put the header feature here... -->
        </div>
    </section>
</div>