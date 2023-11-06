<?php

/**
 * Banner Background Part: Image
 * Display the background image.
 */

// We might need to get the posts index ID if needed, else just return the ID
$_id = is_home() ? get_option('page_for_posts') : get_the_ID();

$bg_image = !empty(get_field('banner_bg_image', $_id)) ? get_field('banner_bg_image', $_id) : get_field('default_banner_image', 'option');
$opacity = $bg_image['opacity'] ? $bg_image['opacity'] : '0.3';
?>



<style>
    .banner__main__bg-image {
        opacity: <?php echo $opacity; ?>;
    }
</style>

<?php echo wp_get_attachment_image($bg_image['image'], 'full', false, ['class' => 'banner__main__bg-image uncoverBannerBg']); ?>
<div class="banner__main__bg-overlay"></div>