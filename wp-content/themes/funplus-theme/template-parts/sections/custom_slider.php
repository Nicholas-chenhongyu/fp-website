<?php

/**
 * ourPeople Slider
 */


// Content
$slides = get_sub_field('slides');

// Swiper
$swiper_id = str_replace('.', '', uniqid('customSwiper_'));

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing';

?>

<div class="wow games-slider-section" data-wow-offset="100">

    <section class="section games-slider <?php echo $spacing; ?>">
        <div class="container container-sm">
            <div class="swiper-container swiperSlideFade" id="<?php echo esc_attr($swiper_id); ?>">
                <div class="swiper-wrapper">
                    <?php foreach ($slides as $key => $slide) : ?>
                        <a class="swiper-slide games-slider__game" href="<?php echo $slide['button_link'] ?>" target="_blank">
                            <?php if ($slide['background_image']) : ?>
                                <?php echo wp_get_attachment_image($slide['background_image'], 'full', '', ['class' => 'games-slider__game__image']); ?>
                            <?php endif; ?>
                            <div class="games-slider-alt__game__inner">
                                <p class="games-slider-alt__game__title h4"><?php echo $slide['sub_title']; ?></p>
                                <p class="games-slider-alt__game__title h3"><?php echo $slide['title']; ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php get_template_part('template-parts/global/btn-chevron', '', ['classes' => 'games-slider__next']); ?>

        </div>
    </section>

    <script type="text/javascript">
        jQuery(document).ready(() => {
            initPrivacySwiper('<?php echo $swiper_id; ?>');
            initTrackReaderClicks('<?php echo $swiper_id; ?>');
        });
    </script>

</div>