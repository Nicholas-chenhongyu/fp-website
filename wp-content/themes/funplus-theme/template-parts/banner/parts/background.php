<?php

/**
 * Banner Part: Background
 * -- Get the relevant template part for the background type.
 * -- We will have an overlay to prevent the user being able to accidentally drag the image
 *    away when highlighting text.
 */

// We might need to get the posts index ID if needed, else just return the ID
$_id = is_home() ? get_option('page_for_posts') : get_the_ID();

$type = get_field('banner_bg_type', $_id) ? get_field('banner_bg_type', $_id) : 'solid';

get_template_part('template-parts/banner/parts/background/' . $type);
