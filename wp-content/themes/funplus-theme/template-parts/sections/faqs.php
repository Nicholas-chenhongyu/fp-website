<?php

/**
 * FAQs
 * Accordion style Frequently Asked Questions.
 */

// Content
$heading = get_sub_field('subheading');
$faqs = get_sub_field('faqs');

// Accordions
$accordion_id = str_replace('.', '', uniqid('faqs_'));

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section faqs <?php echo $spacing; ?>">
    <div class="container container-xs">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8">
                <?php if (!empty($heading)) : ?>
                    <h3 class="subheading"><?php echo $heading; ?></h3>
                <?php endif; ?>

                <?php if (!empty($faqs)) : ?>
                    <div id="<?php echo esc_attr($accordion_id); ?>">
                        <?php for ($i = 0; $i < count($faqs); $i++) : ?>
                            <div class="faqs__faq">
                                <button class="btn btn-faq <?php echo $i !== 0 ? 'collapsed' : ''; ?>" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" <?php echo $i == 0 ? 'aria-expanded="true"' : ''; ?>>
                                    <span class="btn__text"><?php echo $faqs[$i]['q']; ?></span>
                                    <div></div>
                                </button>

                                <div id="collapse<?php echo $i; ?>" class="faqs__body collapse <?php echo $i == 0 ? 'show' : ''; ?>" aria-labelledby="headingOne" data-parent="#<?php echo esc_attr($accordion_id); ?>">
                                        <?php echo $faqs[$i]['a']; ?>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>