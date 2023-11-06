<?php

/**
 * Video
 * Display a video at full viewport height.
 */

$video = get_sub_field('video');

if (empty($video)) return;

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section video-block wow <?php echo $spacing; ?>">
    <div class="video-block__video fadeIn">
        <?php echo $video; ?>
    </div>
</section>