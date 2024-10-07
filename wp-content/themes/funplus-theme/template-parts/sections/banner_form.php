<?php

/**
 * Banner Form
 * Form with a banner on the left side
 */

// Heading
$banner = get_sub_field('banner');
$form_title = get_sub_field('banner_form_title');
$form = get_sub_field('form');

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section banner-form-section <?php echo empty($bg) ? $spacing : ''; ?>">
    <div class="container container-sm">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="banner-block">
                    <img src="<?php echo $banner['url'] ?>" alt="<?php echo $banner['alt'] ?>">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-block">
                    <h4><?php echo $form_title; ?></h4>
                    <div class="form">
                        <?php echo do_shortcode('[contact-form-7 id="' . $form . '"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>