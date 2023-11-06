<?php

/**
 * Banner Part: Statistics
 * Display a maximum of 3 statistics to go in the Banner Bottom Feaure.
 */

$stats = get_field('banner_stats'); ?>

<div class="banner-statistics wow">
    <div class="pill fadeIn"></div>
    <div class="pill fadeIn"></div>
    <div class="pill fadeIn"></div>
    <?php foreach ($stats as $stat) : ?>
        <div class="banner-statistics__stat fadeZoomOut">
            <div>
                <p class="banner-statistics__stat__stat"><span class="countup"><?php echo $stat['stat']; ?></span><?php echo $stat['stat_char']; ?></p>
                <p class="banner-statistics__stat__label"><?php echo $stat['label']; ?></p>
            </div>
            <?php echo wp_get_attachment_image($stat['icon'], 'full', false, ['class' => 'banner-statistics__stat__icon']); ?>
        </div>
    <?php endforeach; ?>
</div>