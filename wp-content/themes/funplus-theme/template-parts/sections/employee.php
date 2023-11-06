<?php

/**
 * Employee
 * Show a card featuring an employee.
 */

// Content
$name = get_sub_field('name');
$text = get_sub_field('text');
$button = get_sub_field('button');

// Images
$background = get_sub_field('background_image');
$employee = get_sub_field('employee_image')
?>

<section class="section employee">
    <div class="wow">
        <div class="container container-sm">
            <div class="row justify-content-between">
                <div class="col-9 col-md-5">
                    <div class="employee__content">
                        <h2 class="employee__name fadeIn">Meet<br /><span><?php echo $name; ?></span></h2>
                        <div class="employee__description fadeIn">
                            <?php echo $text; ?>
                        </div>
                        <div class="uncoverFromLeft">
                            <?php if (!empty($button)) : ?>
                                <?php get_template_part('template-parts/global/btn-plus', '', ['button' => $button, 'classes' => 'btn-primary btn-plus-white']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-1 col-md-6">
                    <div class="employee__shapes">
                        <div class="employee__shapes__circle-sm squeezeInBounce"></div>
                        <div class="employee__shapes__circle-lg squeezeInBounce"></div>
                        <div class="employee__shapes__cross squeezeInBounce"></div>
                        <div class="employee__shapes__pill squeezeInBounce"></div>
                    </div>
                    <div class="employee__image wow">
                        <?php echo wp_get_attachment_image($employee, 'full', '', ['class' => 'employee__image__employee fadeIn']); ?>
                        <div class="employee__image__background fadeIn">
                            <?php echo wp_get_attachment_image($background, 'full', '', []); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>