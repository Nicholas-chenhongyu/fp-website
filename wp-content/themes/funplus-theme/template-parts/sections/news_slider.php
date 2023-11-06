<?php

/**
 * News Block
 * 
 * Display selected, or the 6 most recent posts in a swiper.
 */

// Heading
$heading_highlight = get_sub_field('heading_highlight');
$heading_1 = get_sub_field('heading_1');
$heading_2 = get_sub_field('heading_2');
$heading_text = get_sub_field('heading_text');

// Content
$paragraph = get_sub_field('paragraph');
$s_posts = get_sub_field('posts');
// debug($s_posts);
if (empty($s_posts)) {
    $s_posts = get_posts([
        'numberposts' => 6,
        'post_type' => 'post'
    ]);
}


// Swiper
$swiper_id = str_replace('.', '', uniqid('newsSwiper_')); ?>

<section class="section slider news-slider wow" data-wow-offset="100">
    <div class="position-relative">
        <div class="container container-sm">
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="slider__content-box">
                        <?php get_template_part('template-parts/global/heading', null, [
                            'highlight' => $heading_highlight,
                            'heading_1' => $heading_1,
                            'heading_2' => $heading_2,
                            'text'      => $heading_text
                        ]); ?>
                        <div class="row">
                            <div class="col-12 col-md-10 offset-0 offset-md-2">
                                <?php if (!empty($paragraph)) :
                                    echo '<div class="news-slider__paragraph wow fadeIn">' . $paragraph . '</div>';
                                endif; ?>
                                <?php get_template_part('template-parts/global/btn-plus', '', ['button' => ['title' => 'All news', 'url' => get_permalink(get_option('page_for_posts'))], 'classes' => 'btn-primary btn-plus-white news-slider__button uncoverFromLeft']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 position-relative swiperSlideFade">
                    <?php if (!empty($s_posts)) : ?>
                        <div class="slider__swiper">
                            <div class="swiper-container" id="<?php echo esc_attr($swiper_id); ?>">
                                <div class="swiper-wrapper">
                                    <?php foreach ($s_posts as $post) : ?>
                                        <div class="swiper-slide">
                                            <div class="swiper-slide-opacity" data-swiper-parallax-opacity="0">
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
    </div>
</section>

<script type="text/javascript">
    jQuery(document).ready(() => {
        initNewsSwiper('<?php echo $swiper_id; ?>');
    });
</script>