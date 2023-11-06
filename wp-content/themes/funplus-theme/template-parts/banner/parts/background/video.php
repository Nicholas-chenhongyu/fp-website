<?php

/**
 * Banner Background Part: Video
 * Display the background video.
 */

// We might need to get the posts index ID if needed, else just return the ID
$_id = is_home() ? get_option('page_for_posts') : get_the_ID();

$default = get_field('default_background_video', 'option');
$bg_video = get_field('banner_bg_video', $_id);

$opacity = $bg_video['opacity'] ? $bg_video['opacity'] : '0.6'; ?>

<style>
    .banner__main__bg-video video {
        opacity: <?php echo $opacity; ?>;
    }
</style>

<div class="banner__main__bg-video uncoverFromLeft">
    <video autoplay muted loop>
        <?php if (!empty($bg_video)) : ?>
            <?php if (isset($bg_video['webm']) && !empty($bg_video['webm'])) : ?>
                <source src="<?php echo esc_attr($bg_video['webm']); ?>" type="video/wemb">
            <?php endif; ?>
            <source src="<?php echo esc_attr($bg_video['mp4']); ?>" type="video/mp4">
        <?php else : ?>
            <source src="<?php echo esc_attr($default['mp4']); ?>" type="video/mp4">
        <?php endif ?>
    </video>
</div>