<?php

/**
 * Photo Strip
 */

$images = get_sub_field('images');

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section image-strip <?php echo $spacing; ?>">

<?php foreach ($images as $key => $image): ?>
    <div class="image-strip__image wow fadeIn" data-wow-delay="<?= $key * 0.2; ?>s">
        <?php echo wp_get_attachment_image($image, 'large', '', []); ?>
    </div>
<?php endforeach; ?>
</section>