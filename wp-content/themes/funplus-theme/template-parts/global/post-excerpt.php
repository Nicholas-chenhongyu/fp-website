<?php

/**
 * The post loop
 */

$thumbnail = has_post_thumbnail() ? get_post_thumbnail_id() : get_field('default_post_thumbnail', 'option'); 
$externalUrl = get_field('external_url');
?>

<div class="col-12 col-md-6 col-lg-4">
    <a class="post-loop__post wow fadeIn" target="_blank" href="<?= ! empty($externalUrl) ? $externalUrl : get_the_permalink(); ?>" <?= ! empty($externalUrl) ? 'rel="noreferrer noopener"': ''; ?>>
        <h4 class="post-loop__post__heading"><?php echo get_the_title(); ?></h4>
        <p class="post-loop__post__excerpt"><?php echo get_the_excerpt(); ?></p>
    </a>
</div>