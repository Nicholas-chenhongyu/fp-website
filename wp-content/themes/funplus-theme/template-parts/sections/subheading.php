<?php

/**
 * Subheading
 * Used to describe the next section.
 */

$subheading = get_sub_field('subheading');
$bg = get_sub_field('background') ? 'subheading-block-bg' : '';

// Global settings
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<?php if (!empty($subheading)) : ?>
    <section class="section subheading-block <?php echo $bg; ?> <?php echo empty($bg) ? $spacing : ''; ?>">
        <div class="container container-sm">
            <h3 class="subheading"><?php echo $subheading; ?></h3>
        </div>
    </section>
<?php endif; ?>