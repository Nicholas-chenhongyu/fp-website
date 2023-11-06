<?php

/**
 * Content
 * Display the main content with shapes that will potentially be parallaxed 
 * in the future.
 */

$content = get_sub_field('content');

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing';

$plain = is_page('privacy-policy') || is_page('terms-conditions') ? 'plain' : '';

?>

<section class="section main-content <?php echo $spacing; ?> <?php echo $plain; ?>">

    <!-- Objects -->
    <div class="pill-left"></div>
    <div class="pill-right"></div>
    <div class="cross"></div>

    <!-- Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
</section>