<?php

/**
 * Social
 * Display the heading block and with social icons that have been populated
 * via the Theme Settings.
 */

// Heading
$heading_highlight = get_sub_field('heading_highlight');
$heading_1 = get_sub_field('heading_1');
$heading_2 = get_sub_field('heading_2');
$heading_text = get_sub_field('heading_text');

$socialLinks = get_sub_field('social_links', $post);

$color = '#000';
$alt_color = '#FFFFFF';

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section social <?php echo $spacing; ?>">
    <div class="container container-sm">
        <?php get_template_part('template-parts/global/heading', null, [
            'highlight' => $heading_highlight,
            'heading_1' => $heading_1,
            'heading_2' => $heading_2,
            'text'      => $heading_text
        ]); ?>

        <ul class="social-icons">
            <?php if (!empty($socialLinks['facebook'])) : ?>
                <li>
                    <a class="wow fadeIn" data-wow-duration="1s" href="<?php echo esc_url($socialLinks['facebook']); ?>" target="_blank">
                        <?php get_template_part('template-parts/icons/facebook', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($socialLinks['instagram'])) : ?>
                <li>
                    <a class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s" href="<?php echo esc_url($socialLinks['instagram']); ?>" target="_blank">
                        <?php get_template_part('template-parts/icons/instagram', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($socialLinks['twitter'])) : ?>
                <li>
                    <a class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" href="<?php echo esc_url($socialLinks['twitter']); ?>" target="_blank">
                        <?php get_template_part('template-parts/icons/x', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($socialLinks['discord'])) : ?>
                <li>
                    <a class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s" href="<?php echo esc_url($socialLinks['discord']); ?>" target="_blank">
                        <?php get_template_part('template-parts/icons/discord', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($socialLinks['youtube'])) : ?>
                <li>
                    <a class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s" href="<?php echo esc_url($socialLinks['youtube']); ?>" target="_blank">
                        <?php get_template_part('template-parts/icons/youtube', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!empty($socialLinks['tiktok'])) : ?>
                <li>
                    <a class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" href="<?php echo esc_url($socialLinks['tiktok']); ?>" target="_blank">
                        <?php get_template_part('template-parts/icons/tiktok', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (!empty($socialLinks['vk'])) : ?>
                <li>
                    <a class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s" href="<?php echo esc_url($socialLinks['vk']); ?>" target="_blank">
                        <?php get_template_part('template-parts/icons/vk', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (!empty($socialLinks['linkedin'])) : ?>
                <li>
                    <a class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s" href="<?php echo esc_url($socialLinks['linkedin']); ?>" target="_blank">
                        <?php get_template_part('template-parts/icons/linkedin', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</section>