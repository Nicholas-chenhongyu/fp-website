<?php

/**
 * Cards
 * Display some content in a card format
 */

// Heading
$heading_highlight = get_sub_field('heading_highlight');
$heading_1 = get_sub_field('heading_1');
$heading_2 = get_sub_field('heading_2');
$heading_text = get_sub_field('heading_text');

// Content
$cards = get_sub_field('cards');

// Swiper
$swiper_id = str_replace('.', '', uniqid('cardsSwiper_'));

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section cards <?php echo $spacing; ?>">
    <div class="container container-sm">
        <?php get_template_part('template-parts/global/heading', null, [
            'highlight' => $heading_highlight,
            'heading_1' => $heading_1,
            'heading_2' => $heading_2,
            'text'      => $heading_text
        ]); ?>
    </div>
    <div class="container container-md">
        <div class="swiper-container <?php echo count($cards) >= 4 ? 'activiate-slider' : ''; ?>" id="<?php echo esc_attr($swiper_id); ?>">
            <div class="swiper-wrapper">
                <?php foreach ($cards as $card) : ?>
                    <div class="swiper-slide">
                        <div class="cards__card <?php echo !empty($card['background_image']) ? 'dark' : ''; ?>">
                            <?php if (!empty($card['background_image'])) :
                                echo wp_get_attachment_image($card['background_image'], 'full', '', ['class' => 'cards__card__background']);
                            endif; ?>
                            <div class="cards__card__inner">
                                <div class="cards__card__top">
                                    <?php if (!empty($card['subtitle'])) : ?>
                                        <p class="cards__card__subtitle"><?php echo $card['subtitle']; ?></p>
                                    <?php endif; ?>
                                    <div class="cards__card__excerpt">
                                        <span class="cards__card__excerpt__full">
                                            <?php if (!empty($card['text'])) :
                                                echo $card['text'];
                                            endif; ?>
                                        </span>
                                        <span class="cards__card__excerpt__trimmed">
                                            <?php if (!empty($card['text'])) :
                                                echo wp_trim_words($card['text'], 10, '...');
                                            endif; ?>
                                        </span>
                                    </div>
                                </div>
                                <h3 class="cards__card__title"><?php echo $card['title']; ?></h3>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    jQuery(document).ready(() => {
        initCards('<?php echo $swiper_id; ?>');
    });
</script>