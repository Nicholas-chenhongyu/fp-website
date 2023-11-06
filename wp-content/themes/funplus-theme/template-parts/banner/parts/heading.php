<?php

/**
 * Banner Part: Heading
 * Display the heading with settings.
 */

// We might need to get the posts index ID if needed, else just return the ID
$_id = is_home() ? get_option('page_for_posts') : get_the_ID();

$heading_1 = get_field('banner_heading_1', $_id);
$heading_2 = get_field('banner_heading_2', $_id);
$heading_layout = get_field('banner_heading_color', $_id); ?>

<h1 class="banner-heading <?php echo $heading_layout; ?>">
    <span class="fadeIn"><?php echo $heading_1; ?></span>
    <span class="fadeZoomIn"><?php echo $heading_2; ?></span>
</h1>