<?php

/**
 * Progress
 * Displays the progress bar block
 */

// Heading
$title = get_sub_field('progress_title');
$content = get_sub_field('progress_content');
$form_title = get_sub_field('progress_form_title');
$form_description = get_sub_field('progress_form_description');
$form = get_sub_field('form');

// SOC Field Key - field_667924a1b4c25
$read = (int)get_field('field_667924a1b4c25', 'option');
$max_count = (int)get_sub_field('maximum_count');
$bg = get_sub_field('background') ? 'progress-block-bg' : '';
$percentage = $read / $max_count * 100;

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section progress-bar-block <?php echo $bg; ?> <?php echo empty($bg) ? $spacing : ''; ?>">
    <div class="container container-sm container-progress">
        <h4><?php echo $title; ?></h4>
        <div class="description">
            <?php echo $content; ?>
        </div>
        <div class="custom-progress-bar">
            <div class="progress-outer-container">
                <div class="progress-inner-container" style="width: <?php echo $percentage; ?>%;">
                    <div class="icon">
                        <?php get_template_part('template-parts/logo/logo-icon'); ?>
                    </div>
                </div>
            </div>
        </div>
        <h4><?php echo $form_title; ?></h4>
        <div class="description">
            <?php echo $form_description; ?>
        </div>
        <div class="form">
            <?php echo do_shortcode('[contact-form-7 id="' . $form . '"]'); ?>
        </div>
    </div>
</section>