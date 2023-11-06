<?php

/**
 * Careers Slider
 * 
 * Display selected, or the 6 most recent careers in a swiper.
 */

// Heading
$heading_highlight = get_sub_field('heading_highlight');
$heading_1 = get_sub_field('heading_1');
$heading_2 = get_sub_field('heading_2');
$heading_text = get_sub_field('heading_text');

// Content
$paragraph = get_sub_field('paragraph');
$type = get_sub_field('type');

// Swiper
$swiper_id = str_replace('.', '', uniqid('swiper_'));

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section slider slider-bg wow <?php echo $spacing; ?>">
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
                            <?php if (!empty($paragraph)) : ?>
                                <div class="slider__paragraph fadeIn"><?= $paragraph; ?></div>
                            <?php endif; ?>
                            <?php if (!empty($button)) : ?>
                                <?php get_template_part('template-parts/global/btn-plus', '', ['button' => $button, 'classes' => 'btn-primary btn-plus-white']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 position-relative">
                <?php if ('posts' == $type) {
                    // Post slider
                    $post_ids = get_sub_field('posts') ? get_sub_field('posts') : [];
                    $_posts = new WP_Query([
                        'post_type' => 'post',
                        'post__in' => $post_ids,
                        'posts_per_page' => 6
                    ]);
                    if ($_posts->have_posts()) : ?>
                        <div class="slider__swiper-container">
                            <div class="slider__swiper">
                                <div class="swiper-container swiperSlideFade" id="<?php echo esc_attr($swiper_id); ?>">
                                    <div class="swiper-wrapper">
                                        <?php while ($_posts->have_posts()) : $_posts->the_post(); ?>
                                            <div class="swiper-slide">
                                                <div class="swiper-slide-opacity" data-swiper-parallax-opacity="0">
                                                    <div class="slider__slide">
                                                        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', '', ['class' => 'slider__slide__back']); ?>
                                                        <div class="slider__slide__content <?= has_excerpt() ? '' : 'slider__slide__content--noExcerpt'; ?>">
                                                            <p class="slider__slide__title"><?php echo get_the_title(); ?></p>
                                                            <p class="slider__slide__excerpt"><?php echo get_the_excerpt(); ?></p>
                                                            <p class="slider__slide__excerpt-mobile"><?php echo wp_trim_words(get_the_excerpt(), 13, '...'); ?></p>

                                                            <?php get_template_part('template-parts/global/btn-plus', '', ['button' => ['title' => 'More', 'url' => get_the_permalink(), 'target' => ''], 'classes' => 'btn-primary btn-plus-white']);
                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;
                } else {
                    // Custom Slides Slider
                    $slides = get_sub_field('slides');
                    if (!empty($slides)) : ?>
                        <div class="slider__swiper-container">
                            <div class="slider__swiper">
                                <div class="swiper-container swiperSlideFade" id="<?php echo esc_attr($swiper_id); ?>">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($slides as $slide) : ?>
                                            <div class="swiper-slide">
                                                <div class="swiper-slide-opacity" data-swiper-parallax-opacity="0">
                                                    <div class="slider__slide">
                                                        <?php echo wp_get_attachment_image($slide['background'], 'full', '', ['class' => 'slider__slide__back']); ?>
                                                        <div class="slider__slide__content <?= ! empty($slide['excerpt']) ? '' : 'slider__slide__content--noExcerpt'; ?>">
                                                            <p class="slider__slide__title"><?php echo $slide['title_1']; ?></p>
                                                            <p class="slider__slide__excerpt"><?php echo $slide['excerpt']; ?></p>
                                                            <p class="slider__slide__excerpt-mobile"><?php echo wp_trim_words($slide['excerpt'], 13, '...'); ?></p>

                                                            <?php if (!empty($slide['button'])) get_template_part('template-parts/global/btn-plus', '', ['button' => $slide['button'], 'classes' => 'btn-primary btn-plus-white']); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endif;
                } ?>
            </div>
        </div>
    </div>
    <?php get_template_part('template-parts/global/btn-chevron', '', ['classes' => 'slider__next']); ?>
</section>

<script type="text/javascript">
    jQuery(document).ready(() => {
        initSwiper('<?php echo $swiper_id; ?>');
    });
</script>