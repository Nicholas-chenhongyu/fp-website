<?php

/**
 * Banner Background Part: Color
 * Display a background color.
 */

// We might need to get the posts index ID if needed, else just return the ID
$_id = is_home() ? get_option('page_for_posts') : get_the_ID();

$bg_color = get_field('banner_bg_color', $_id) ? get_field('banner_bg_color', $_id) : 'orange'; ?>

<div class="banner__main__bg-color <?php echo $bg_color; ?> uncoverFromLeft"></div>