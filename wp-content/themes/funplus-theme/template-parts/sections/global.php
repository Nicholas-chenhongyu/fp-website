<?php

/**
 * Global Block
 * 
 * Allow blocks to be used multiple times around the website without having
 * to enter the same information more than once.
 */
$block_id = get_sub_field('block');

if (have_rows('sections', $block_id)) :
    while (have_rows('sections', $block_id)) :
        the_row();
        get_template_part('template-parts/sections/' . get_row_layout());
    endwhile;
endif;
