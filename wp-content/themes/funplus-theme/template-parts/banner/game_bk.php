<?php

/**
 * Game Listing Banner 
 */

// Content
$game = get_field('banner_game_overview');
$text = get_field('banner_text');
$featured_image = get_field('banner_featured_image1');
$banner_id = str_replace('.', '', uniqid('banner_'));
?>

<div class="container banner-container" id="<?= $banner_id; ?>">
    <div class="banner games-single-banner wow" data-wow-offset="70">

        <?php get_template_part('template-parts/banner/parts/background'); ?>
        <?php get_template_part('template-parts/banner/parts/shapes'); ?>

        <div class="container container-sm banner-inner-container">
            <div class="banner__inner">
                <div class="banner__main">

                    <div class="banner__main__content">
                        <?php get_template_part('template-parts/banner/parts/heading'); ?>

                        <?php if (!empty($text)) : ?>
                            <div class="banner-blurb fadeIn">
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <?php echo $text; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($game)) : ?>
                            <div class="banner__main__game">
                                <?php if ($game['review']['show_review']) : ?>
                                    <div class="row">
                                        <div class="col-12 col-md-7">
                                            <div class="banner__main__game__review fadeIn">
                                                <p id="review-message"><?php echo $game['review']['message']; ?></p>
                                                <p id="review-name"><?php echo $game['review']['name']; ?></p>
                                                <div id="review-rating">
                                                    <?php for ($i = 0; $i < $game['review']['rating']; $i++) : ?>
                                                        <div class="star fadeIn">
                                                            <?php get_template_part('template-parts/icons/star'); ?>
                                                        </div>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="banner__main__game__buy uncoverFromLeft">
                                    <?php if (isset($game['pc']) && !empty($game['pc'])) { ?>
                                        <a class="pc_download" href="<?php echo esc_url($game['pc']); ?>" target="_blank">
                                            <img width="185" height="55" src="<?php echo get_stylesheet_directory_uri().'/assets/btn_win.png' ?>" alt="download on pc">
                                        </a>
                                    <?php } ?>
                                    <?php if (isset($game['google_play']) && !empty($game['google_play'])) { ?>
                                        <a href="<?php echo esc_url($game['google_play']); ?>" target="_blank">
                                            <?php get_template_part('template-parts/icons/google-play'); ?>
                                        </a>
                                    <?php } ?>
                                    <?php if (isset($game['apple_store']) && !empty($game['apple_store'])) { ?>
                                        <a href="<?php echo esc_url($game['apple_store']); ?>" target="_blank">
                                            <?php get_template_part('template-parts/icons/apple-store'); ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="banner__main__feature">
                        <?php if ($featured_image['media_type'] === 'video') : ?>
                            <video class="banner__main__feature__video d-none fadeIn" muted autoplay <?= $featured_image['loop_video'] ? 'loop' : ''; ?>>
                                <?php if (!empty($featured_image['video'])) : ?>
                                    <source src="<?= get_permalink($featured_image['video']); ?>" type="video/webm" class="d-none" />
                                <?php endif; ?>
                            </video>

                            <?= wp_get_attachment_image($featured_image['image'], 'full', false, ['class' => 'banner__main__feature__placeholder fadeIn']); ?>
                        <?php else : ?>
                            <?php if (!empty($featured_image['image'])) : ?>
                                <?= wp_get_attachment_image($featured_image['image'], 'full', false, ['class' => 'fadeIn']); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(() => {
        initWebm('<?= $banner_id; ?>');
        jQuery('.pc_download').click(()=> {
            gtag('event', 'PC Download', {
                'event_category': 'ButtonClicks',
                'event_label': 'ButtonClicks'
            });
        })
    });
</script>