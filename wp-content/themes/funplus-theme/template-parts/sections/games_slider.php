<?php

/**
 * Games
 */

// Heading
$heading_highlight = get_sub_field('heading_highlight');
$heading_1 = get_sub_field('heading_1');
$heading_2 = get_sub_field('heading_2');
$heading_text = get_sub_field('heading_text');

// Content
$show_titles = get_sub_field('show_title');
$games = get_sub_field('games');
$title_or_logo = get_sub_field('title_or_logo');

// Swiper
$swiper_id = str_replace('.', '', uniqid('gameSwiper_'));

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing';

// Get a list of ALL game IDs
// if (empty($games)) {
    $query = get_posts([
        'post_type' => 'game',
        'numberposts' => -1,
        'post_status' => 'publish'   
    ]);
    $games = [];
    foreach ($query as $game) {
        $games[] = $game->ID;
    }
// } 
?>

<div class="wow games-slider-section" data-wow-offset="100">
    <?php if (!empty($heading_1)) : ?>
        <section class="section slider slider-bg games-slider-alt <?php echo $spacing; ?>">
            <div class="container container-sm">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="slider__content-box">
                            <div class="heading">

                                <?php get_template_part('template-parts/global/heading', null, [
                                    'highlight' => $heading_highlight,
                                    'heading_1' => $heading_1,
                                    'heading_2' => $heading_2,
                                    'text'      => ''
                                ]); ?>

                                <?php if (!empty($heading_text)) : ?>
                                    <div class="description fadeIn">
                                        <?php echo $heading_text; ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="row">
                                <div class="col-12 col-md-10 offset-0 offset-md-2">
                                    <?php if (!empty($paragraph)) :
                                        echo '<div class="slider__paragraph">' . $paragraph . '</div>';
                                    endif; ?>
                                    <?php if (!empty($button)) : ?>
                                        <?php get_template_part('template-parts/global/btn-plus', '', ['button' => $button, 'classes' => 'btn-primary btn-plus-white']); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 position-relative">
                        <div class="swiper-container swiperSlideFade" id="<?php echo esc_attr($swiper_id); ?>">
                            <div class="swiper-wrapper">
                                <?php $last_slide = 0;
                                for ($i = 0; $i < count($games); $i++) :
                                    $featured_image = has_post_thumbnail($games[$i]) ? get_post_thumbnail_id($games[$i]) : '';
                                    $logo = get_field('logo', $games[$i]);
                                ?>
                                    <div class="swiper-slide">
                                        <div class="swiper-slide-opacity" data-swiper-parallax-opacity="0">
                                            <a href="<?php echo get_the_permalink($games[$i]); ?>" class="games-slider-alt__game <?php echo !$show_titles ? 'no-titles' : ''; ?>">
                                                <?php if ($featured_image) : ?>
                                                    <?php echo wp_get_attachment_image($featured_image, 'full', '', ['class' => 'games-slider-alt__game__image']); ?>
                                                <?php endif; ?>
                                                <div class="games-slider-alt__game__inner">
                                                    <?php if ($title_or_logo === 'title') : ?>
                                                        <?php if ($show_titles) : ?>
                                                            <p class="games-slider-alt__game__title h3"><?php echo get_the_title($games[$i]); ?></p>
                                                        <?php endif; ?>
                                                    <?php else : ?>
                                                        <div class="games-slider-alt__game__content">
                                                            <?php echo wp_get_attachment_image($logo, 'full', '', ['class' => 'games-slider-alt__game__logo']); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php $last_slide = $i;
                                endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_template_part('template-parts/global/btn-chevron', '', ['classes' => 'games-slider-alt__next']); ?>

        </section>
        <script type="text/javascript">
            jQuery(document).ready(() => {
                initAltGamesSlider('<?php echo $swiper_id; ?>');
            });
        </script>
    <?php else : ?>
        <section class="section games-slider <?php echo $spacing; ?>">
            <div class="container container-sm">
                <div class="swiper-container swiperSlideFade" id="<?php echo esc_attr($swiper_id); ?>">
                    <div class="swiper-wrapper">
                        <?php for ($i = 0; $i < count($games); $i++) :
                            $featured_image = has_post_thumbnail($games[$i]) ? get_post_thumbnail_id($games[$i]) : '';
                            $logo = get_field('logo', $games[$i]);
                            $character = get_field('character', $games[$i]);
                        ?>
                            <a class="swiper-slide games-slider__game <?php echo !$show_titles ? 'no-titles' : ''; ?>" href="<?php echo get_the_permalink($games[$i]); ?>">
                                <?php if ($featured_image) : ?>
                                    <?php echo wp_get_attachment_image($featured_image, 'full', '', ['class' => 'games-slider__game__image']); ?>
                                <?php endif; ?>
                                <div class="games-slider-alt__game__inner">
                                    <?php if ($title_or_logo === 'title') : ?>
                                        <?php if ($show_titles) : ?>
                                            <p class="games-slider-alt__game__title h3"><?php echo get_the_title($games[$i]); ?></p>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <div class="games-slider-alt__game__content">
                                            <?php echo wp_get_attachment_image($logo, 'full', '', ['class' => 'games-slider-alt__game__logo']); ?>
                                        </div>
                                    <?php endif; ?>
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
                initGameSwiper('<?php echo $swiper_id; ?>');
            });
        </script>
    <?php endif; ?>
</div>