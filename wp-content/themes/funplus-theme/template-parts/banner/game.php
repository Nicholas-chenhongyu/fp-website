<?php

/**
 * Homepage Banner 
 */

// Content
$logo = get_field('game_logo');
$text = get_field('banner_text');
$button = get_field('banner_button');
$bg_image = get_field('banner_img');
$banner_id = str_replace('.', '', uniqid('banner_'));

$ios_link = get_field('ios_link');
$android_link = get_field('android_link');
$pc_link = get_field('pc_link');
$webgame_link = get_field('webgame_link');
$store_link = get_field('store_link');
$website_link = get_field('website_link');
$comic_link = get_field('comic_link');

// Height
// We need to set a fixed height if there is no featured image set
$height = empty($bg_image) ? 'fixed-height' : '';
?>

<div class="banner-container" id="<?= $banner_id; ?>">
    <div class="banner game-banner wow">

        <div class="container banner-inner-container">
            <div class="banner__inner">
                <div class="banner__main fixed-height">
                    <div class="banner__main__content">
                        <div class="game-logo">
                            <?= wp_get_attachment_image($logo, 'full', false, ['class' => 'fadeIn']); ?>
                        </div>

                        <?php if (!empty($text)) : ?>
                            <div class="banner-blurb fadeIn">
                                <div class="row">
                                    <div class="col-12">
                                        <?= $text; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="banner__main__feature">
                        <?php if (!empty($bg_image)) : ?>
                            <?= wp_get_attachment_image($bg_image, 'full', false, ['class' => 'fadeIn']); ?>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="game-links">

                    <!-- apple store -->
                    <?php
                    if ($ios_link) {
                        echo '<div class="link">';
                        echo '<a href="' . $ios_link . '" target="_blank">';
                        echo '<img src="' . get_template_directory_uri() . '/assets/btn-ios.png'  . '" />';
                        echo '</a>';
                        echo '</div>';
                    }
                    ?>

                    <!-- google play -->
                    <?php
                    if ($android_link) {
                        echo '<div class="link">';
                        echo '<a href="' . $android_link . '" target="_blank">';
                        echo '<img src="' . get_template_directory_uri() . '/assets/btn-android.png'  . '" />';
                        echo '</a>';
                        echo '</div>';
                    }
                    ?>

                    <!-- PC -->
                    <?php
                    if ($pc_link) {
                        echo '<div class="link desktop">';
                        echo '<a href="' . $pc_link . '" target="_blank">';
                        echo '<img src="' . get_template_directory_uri() . '/assets/btn-pc.png'  . '" />';
                        echo '</a>';
                        echo '</div>';
                    }
                    ?>

                    <!-- Webgame -->
                    <?php
                    if ($webgame_link) {
                        echo '<div class="link desktop">';
                        echo '<a href="' . $webgame_link . '" target="_blank">';
                        echo '<img src="' . get_template_directory_uri() . '/assets/btn-webgame.png'  . '" />';
                        echo '</a>';
                        echo '</div>';
                    }
                    ?>

                    <!-- Topup Center -->
                    <?php
                    if ($store_link) {
                        echo '<div class="link">';
                        echo '<a href="' . $store_link . '" target="_blank">';
                        echo '<img src="' . get_template_directory_uri() . '/assets/btn-store.png'  . '" />';
                        echo '</a>';
                        echo '</div>';
                    }
                    ?>

                    <!-- Website -->
                    <?php
                    if ($website_link) {
                        echo '<div class="link">';
                        echo '<a href="' . $website_link . '" target="_blank">';
                        echo '<img src="' . get_template_directory_uri() . '/assets/btn-website.png'  . '" />';
                        echo '</a>';
                        echo '</div>';
                    }
                    ?>
                    <!-- Comic -->
                    <?php
                    if ($comic_link) {
                        echo '<div class="link">';
                        echo '<a href="' . $comic_link . '" target="_blank">';
                        echo '<img src="' . get_template_directory_uri() . '/assets/btn-comic.png'  . '" />';
                        echo '</a>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
    <!-- </div> -->
</div>