<?php

/**
 * Statistics
 * Display a column of statistics along with a link to a featured page.
 */

// Heading
$heading_highlight = get_sub_field('heading_highlight');
$heading_1 = get_sub_field('heading_1');
$heading_2 = get_sub_field('heading_2');
$heading_text = get_sub_field('heading_text');

// Content
$paragraph = get_sub_field('paragraph');
$button = get_sub_field('button');
$stats = get_sub_field('statistics'); ?>

<section class="section statistics">
    <div class="container container-sm">
        <div class="row">
            <div class="col-12 col-md-6">
                <?php get_template_part('template-parts/global/heading', null, [
                    'highlight' => $heading_highlight,
                    'heading_1' => $heading_1,
                    'heading_2' => $heading_2,
                    'text'      => $heading_text
                ]); ?>

                <div class="row">
                    <div class="col-12 col-md-10 offset-0 offset-md-2">
                        <?php if (!empty($paragraph)) :
                            echo '<div class="statistics__paragraph">' . $paragraph . '</div>';
                        endif; ?>
                        <?php if (!empty($button)) : ?>
                            <a href="<?php echo esc_url($button['url']); ?>" class="btn btn-primary btn-plus btn-plus-white statistics__button" target="<?php echo esc_attr($button['target']); ?>">
                                <?php echo $button['title']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 offset-md-1 offset-0">
                <?php if (!empty($stats)) : ?>
                    <div class="statistics__stats">
                        <?php foreach ($stats as $stat) { ?>
                            <div class="statistics__stats__stat">
                                <div>
                                    <p class="statistics__stats__stat__value"><?php echo $stat['big_text']; ?></p>
                                    <p class="statistics__stats__stat__text"><?php echo $stat['small_text']; ?></p>
                                </div>
                                <?php echo wp_get_attachment_image($stat['icon'], 'full', '', ['class' => 'statistics__stats__stat__icon']); ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>