<?php

/**
 * Key Points
 * Display key points in a format alike the Games List block
 */

// Content

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing';

$points = get_sub_field('points'); ?>

<section class="section key-points <?php echo $spacing; ?>">
    <div class="key-points__inner container wow">
        <?php foreach ($points as $key => $point) : ?>
            <div class="key-points__point wow <?= $key % 2 == 0 ? 'keyPointOdd' : 'keyPointEven'; ?>">
                <?php if (!empty($point['featured_image'])) :
                    echo wp_get_attachment_image($point['featured_image'], ['1300', '900'], '', ['class' => 'featured-image', 'sizes' => '100vw']);
                endif; ?>
                <div class=" key-points__point__inner">
                    <?php if (!empty($point['background_image'])) :
                        echo wp_get_attachment_image($point['background_image'], ['1300', '900'], '', ['class' => 'key-points__point__inner__background', 'sizes' => '100vw']);
                    endif; ?>
                <div class="key-points__point__inner__content">
                    <div class="key-points__point__inner__content_top">
                        <h3><?= $point['title_1']; ?><?= !empty($point['title_2']) ? '<br>' . $point['title_2'] : ''; ?></h3>
                        <div class="key-points__point__excerpt"><?= $point['text']; ?></div>
                    </div>
                    <?php if ($point['button_link']) : ?>
                    <div class="key-points__point__inner__content_bottom">
                        <?php get_template_part('template-parts/global/btn-plus', '', ['button' => ['title' => 'Read More', 'url' => $point['button_link'], 'target' => '_blank'], 'tag' => 'a', 'classes' => 'btn-primary btn-plus-white']); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</section>