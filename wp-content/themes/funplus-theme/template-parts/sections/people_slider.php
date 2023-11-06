<?php

/**
 * ourPeople Slider
 */


// Content
$people = get_sub_field('people');
$title_or_logo = get_sub_field('title_or_logo');

// Swiper
$swiper_id = str_replace('.', '', uniqid('peopleSwiper_'));

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing';

// Get a list of ALL game IDs
// if (empty($games)) {
    $query = get_posts([
        'post_type' => 'people',
        'numberposts' => -1,
        'post_status' => 'publish'   
    ]);
    $people = [];
    foreach ($query as $person) {
        $people[] = $person->ID;
    }
// } 
?>

<div class="wow games-slider-section" data-wow-offset="100">

    <section class="section games-slider <?php echo $spacing; ?>">
        <div class="container container-sm">
            <div class="swiper-container swiperSlideFade" id="<?php echo esc_attr($swiper_id); ?>">
                <div class="swiper-wrapper">
                    <?php for ($i = 0; $i < count($people); $i++) :
                        $featured_image = has_post_thumbnail($people[$i]) ? get_post_thumbnail_id($people[$i]) : '';
                        $logo = get_field('logo', $people[$i]);
                        $character = get_field('character', $people[$i]);
                    ?>
                        <a class="swiper-slide games-slider__game" href="<?php echo get_the_permalink($people[$i]); ?>">
                            <?php if ($featured_image) : ?>
                                <?php echo wp_get_attachment_image($featured_image, 'full', '', ['class' => 'games-slider__game__image']); ?>
                            <?php endif; ?>
                            <div class="games-slider-alt__game__inner">
                                <p class="games-slider-alt__game__title h4"><?php echo get_the_title($people[$i]); ?></p>
                            </div>
                        </a>
                    <?php endfor; ?>
                </div>
            </div>

            <?php get_template_part('template-parts/global/btn-chevron', '', ['classes' => 'games-slider__next']); ?>

        </div>
    </section>

    <script type="text/javascript">
        jQuery(document).ready(() => {
            initPrivacySwiper('<?php echo $swiper_id; ?>');
        });
    </script>

</div>