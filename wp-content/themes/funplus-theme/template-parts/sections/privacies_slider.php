<?php

/**
 * Privacies
 */


// Content
$privacies = get_sub_field('privacies');
$title_or_logo = get_sub_field('title_or_logo');

// Swiper
$swiper_id = str_replace('.', '', uniqid('gameSwiper_'));

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing';

?>

<div class="wow games-slider-section" data-wow-offset="100">

    <section class="section games-slider <?php echo $spacing; ?>">
        <div class="container container-sm">
            <div class="swiper-container swiperSlideFade" id="<?php echo esc_attr($swiper_id); ?>">
                <div class="swiper-wrapper">
                    <?php for ($i = 0; $i < count($privacies); $i++) :
                        $featured_image = has_post_thumbnail($privacies[$i]) ? get_post_thumbnail_id($privacies[$i]) : '';
                        $logo = get_field('logo', $privacies[$i]);
                        $character = get_field('character', $privacies[$i]);
                    ?>
                        <a class="swiper-slide games-slider__game" href="<?php echo get_the_permalink($privacies[$i]); ?>">
                            <?php if ($featured_image) : ?>
                                <?php echo wp_get_attachment_image($featured_image, 'full', '', ['class' => 'games-slider__game__image']); ?>
                            <?php endif; ?>
                            <div class="games-slider-alt__game__inner">

                            </div>
                        </a>
                    <?php endfor; ?>
                </div>
            </div>

        </div>
    </section>

    <script type="text/javascript">
        jQuery(document).ready(() => {
            initPrivacySwiper('<?php echo $swiper_id; ?>');
        });
    </script>

</div>