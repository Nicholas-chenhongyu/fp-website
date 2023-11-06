<?php

/**
 * Services
 * Display a repeater field in a diagonal row format with different coloured icon backgrounds.
 */

// Content
$services = get_sub_field('services'); ?>

<section class="section services wow" data-wow-offset="70">
    <div class="container">

        <!-- Shapes -->

        <div class="left-shape-pill-wrapper squeezeInBounce">
            <div class="shape left-shape-pill"></div>
        </div>
        <div class="left-shape-cross-wrapper squeezeInBounce">
            <div class="shape left-shape-cross"></div>
        </div>

        <div class="right-shape-pill-wrapper squeezeInBounce">
            <div class="shape right-shape-pill"></div>
        </div>
        <div class="right-shape-circle-large-wrapper squeezeInBounce">
            <div class="shape right-shape-circle-large"></div>
        </div>
        <div class="right-shape-circle-small-wrapper squeezeInBounce">
            <div class="shape right-shape-circle-small"></div>
        </div>

        <div class="bottom-shape-cross-wrapper squeezeInBounce">
            <div class="shape bottom-shape-cross"></div>
        </div>

        <!-- Content -->
        <div class="row">
            <?php for ($i = 0; $i < count($services); $i++) : ?>
                <div class="col-12 col-md-6 col-lg-3 offset-0 offset-lg-1 grid-item wow">
                    <div class="services__service" style="--index:<?= $i; ?>">
                        <div class="services__service__icon">
                            <?php echo wp_get_attachment_image($services[$i]['icon'], 'full', '', []); ?>
                        </div>
                        <p class="services__service__num"><?php echo $i + 1; ?></p>
                        <p class="services__service__title"><?php echo $services[$i]['title']; ?></p>
                        <span class="services__service__body">
                            <?php echo $services[$i]['text']; ?>
                        </span>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>