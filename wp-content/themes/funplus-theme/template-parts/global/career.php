<?php

/**
 * The career loop
 */

?>

<div class="col-12 col-md-6 col-lg-4">
    <a target="_blank" class="post-loop__post wow fadeIn" href="<?php echo get_the_permalink(); ?>">
        <h4 class="post-loop__post__heading"><?php echo get_the_title(); ?></h4>
        <?php if (has_excerpt()) : ?>
            <p class="post-loop__post__excerpt"><?php echo get_the_excerpt(); ?></p>
        <?php endif; ?>
    </a>
</div>