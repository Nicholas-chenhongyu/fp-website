<?php

/**
 * Awards Slider
 * 
 * Display selected, or the 6 most recent posts in a swiper.
 */


// Content
$s_posts = get_sub_field('awards');

if (empty($s_posts)) {
    $s_posts = get_posts([
        'numberposts' => 6,
        'post_type' => 'awards',

    ]);
}


// Swiper
$swiper_id = str_replace('.', '', uniqid('pressSwiper_')); ?>

<section class="section slider news-slider press-slider wow" data-wow-offset="100">
    <div class="position-relative">
        <div class="container container-sm">

                <div class="position-relative swiperSlideFade">
                    <?php if (!empty($s_posts)) : ?>
                        <div class="slider__swiper">
                            <div class="swiper-container" id="<?php echo esc_attr($swiper_id); ?>">
                                <div class="swiper-wrapper">
                                    <?php foreach ($s_posts as $post) : ?>
                                        <div class="swiper-slide">
                                            <div class="swiper-slide-opacity">
                                                <div class="slider__slide">
                                                    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', '', ['class' => 'slider__slide__back']); ?>
                                                    <div class="slider__slide__content">
                                                        <p class="slider__slide__title"><?php echo $post->post_title; ?></p>

                                                        <?php get_template_part('template-parts/global/btn-plus', '', ['button' => ['title' => 'Read more', 'url' => esc_url(get_the_permalink($post->ID)), 'target' => '_blank'], 'classes' => 'btn-primary btn-plus-white']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>

                <?php get_template_part('template-parts/global/btn-chevron', '', ['classes' => 'news-slider__next']); ?>

        </div>
    </div>
</section>

<script type="text/javascript">
    jQuery(document).ready(() => {
        initPressSwiper('<?php echo $swiper_id; ?>');
    });
</script>