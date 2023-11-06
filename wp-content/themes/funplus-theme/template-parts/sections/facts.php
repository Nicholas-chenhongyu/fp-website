<?php

/**
 * Facts
 * Display facts as a slider format
 */

// Content
$facts = get_sub_field('facts');

// Swiper
$swiper_id = str_replace('.', '', uniqid('factsSwiper_'));

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section facts wow <?php echo $spacing; ?>">
    <div class="swiper-container wow fadeIn" id="<?php echo esc_attr($swiper_id); ?>">
        <div class="swiper-wrapper ">
            <?php foreach ($facts as $fact) :
                $title_1 = $fact['title_1'];
                $title_2 = $fact['title_2'];
                $text = $fact['text'];
                $button = $fact['button'];
                $icon = $fact['icon'];
                $feature = $fact['featured_image']; ?>
                <div class="swiper-slide">
                    <div class="facts__slide">
                        <div class="facts__slide__inner">
                            <div class="facts__slide__content">
                                <div class="facts__slide__icon">
                                    <p class="facts__slide__title">
                                        <?php echo $title_1; ?>
                                        <span><?php echo $title_2; ?></span>
                                    </p>
                                    <?php echo wp_get_attachment_image($icon, 'small', '', []); ?>
                                </div>
                                <?php if (!empty($text)) :?>
                                    <div class="facts__slide__body"><?= $text; ?> </div>
                                <?php endif; ?>
                                <?php if (isset($button) && !empty($button)) : ?>
                                    <?php get_template_part('template-parts/global/btn-plus','',['button' => $button,'classes' => 'btn-dark btn-plus-white']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="facts__slide__feature__wrapper">
                                <div class="facts__slide__feature">

                                    <?php if ($feature['media_type'] === 'video' && ! empty($feature['video'])): ?>
                                        <video class="facts__slide__feature__video" muted loop>
                                            <source src="<?= get_permalink($feature['video']); ?>" type="video/webm"/>
                                            <source src="<?= get_permalink($feature['video']); ?>" type="video/mp4"/>
                                        </video>
                                    <?php endif; ?>

                                    <?php if (! empty($feature['image'])): ?>
                                        <?php echo wp_get_attachment_image($feature['image'], 'full', '', ['class' => 'facts__slide__feature__image']); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php get_template_part('template-parts/global/btn-chevron','',['classes' => 'facts__next']); ?>
<?php get_template_part('template-parts/global/btn-chevron','',['classes' => 'facts__prev btn--prev']); ?>
</section>

<script>
    jQuery(document).ready(() => {
        initFactsSwiper('<?php echo $swiper_id; ?>');
    });
</script>