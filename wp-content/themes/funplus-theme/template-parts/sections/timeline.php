<?php

/**
 * Careers Slider
 * 
 * Display selected, or the 6 most recent careers in a swiper.
 */

// Heading
// $heading_highlight = get_sub_field('heading_highlight');
// $heading_2 = get_sub_field('heading_2');
// $heading_text = get_sub_field('heading_text');

// Content
// $paragraph = get_sub_field('paragraph');
$slides = get_sub_field('slides');
$pill = get_sub_field('pill');
$heading = get_sub_field('heading');

array_push($slides, []);

// Swiper
$swiper_id = str_replace('.', '', uniqid('swiper_'));
$paginationArray = [];

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section timeline <?php echo $spacing; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (!empty($heading)) : ?>
                    <h3 class="timeline__header text-center text-orange"><?= $heading; ?></h3>
                <?php endif; ?>
                <div class="timeline__divider timeline__divider--top d-flex mb-5 align-items-center">
                    <hr class="w-100 pb-0">
                    <?php if (!empty($pill)) : ?>
                        <div class="timeline__pill"><?= $pill; ?></div>
                    <?php endif; ?>
                    <hr class="w-100 pb-0">
                </div>
                <?php if (!empty($slides)) : ?>
                    <div class="timeline__sliderContainer swiper-container" id="<?php echo esc_attr($swiper_id); ?>">
                        <div class="swiper-wrapper">
                            <?php foreach ($slides as $key => $slide) : ?>
                                <?php array_push($paginationArray, $slide['year']); ?>
                                <div class="timeline__slide swiper-slide">
                                    <?php if (!empty($slide)) : ?>
                                        <div class="card-container" data-swiper-parallax="-100" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="300">
                                            <div class="timeline__card">
                                                <?php if (count($slide['inner_slides']) > 1) : ?>
                                                    <button class="timeline__slide__navigation btn--next">
                                                        <?php get_template_part('template-parts/icons/chevron-right'); ?>
                                                    </button>
                                                    <button class="timeline__slide__navigation btn--prev">
                                                        <?php get_template_part('template-parts/icons/chevron-right'); ?>
                                                    </button>
                                                <?php endif; ?>

                                                <div class="timeline__card__sliderContainer swiper-container">
                                                    <div class="swiper-wrapper">
                                                        <?php foreach ($slide['inner_slides'] as $innerSlide) : ?>
                                                            <div class="timeline__card-inner swiper-slide p-5 d-flex flex-column justify-content-between h-100">
                                                                <div class="timeline__content">
                                                                    <h6><?php echo $innerSlide['title']; ?></h6>
                                                                    <p><?php echo $innerSlide['excerpt']; ?></p>
                                                                </div>
                                                                <h5 class="pr-1"><?php echo $innerSlide['heading']; ?></h5>

                                                                <?php echo wp_get_attachment_image($innerSlide['background'], 'full', '', ['class' => $innerSlide['fill_image'] ? 'image-cover' : 'image-contain']); ?>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="shapes">
                                            <?php if ($key % 2 === 0) : ?>
                                                <div class="shape" data-swiper-parallax-opacity="0" data-swiper-parallax="-600" data-swiper-parallax-duration="1200">
                                                    <div class="cross"></div>
                                                </div>
                                            <?php else : ?>
                                                <div class="shape" data-swiper-parallax-opacity="0" data-swiper-parallax="-500" data-swiper-parallax-duration="1200">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="shape" data-swiper-parallax-opacity="0" data-swiper-parallax="-700" data-swiper-parallax-duration="1200">
                                                    <div class="pill"></div>
                                                </div>
                                                <div class="shape" data-swiper-parallax-opacity="0" data-swiper-parallax="-600" data-swiper-parallax-duration="1200">
                                                    <div class="pill pill-solid"></div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <ul class="timeline-pagination"></ul>
                        <div class="swiper-scrollbar timeline-scrollbar">
                            <div class="timeline-scrollbar__dot timeline-scrollbar__dot--top"></div>
                            <div class="timeline-scrollbar__dot timeline-scrollbar__dot--bottom"></div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="timeline__divider timeline__divider--bottom d-flex align-items-center">
                    <hr class="w-100 pb-0">
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    const years = <?php echo json_encode($paginationArray); ?>;
    jQuery(document).ready(() => {
        initTimeline('<?php echo $swiper_id; ?>', years);
    });
</script>