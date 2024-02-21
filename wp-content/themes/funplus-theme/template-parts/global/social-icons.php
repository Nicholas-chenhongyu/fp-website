<?php

/**
 * Social Icons
 * With arguments.
 */

$labels = $args['show_labels'] ?? true;
$color = isset($args['color']) ? $args['color'] : '#000';
$alt_color = isset($args['alt_color']) ? $args['alt_color'] : '#000';

// Social URLs
$facebook = get_field('social_fb', 'option');
$instagram = get_field('social_ig', 'option');
$twitter = get_field('social_tw', 'option');
$discord = get_field('social_dd', 'option');
$youtube = get_field('social_yt', 'option');
$tiktok = get_field('social_tt', 'option');
$linkedin = get_field('social_li', 'option'); ?>

<ul class="social-icons">
  <?php if (!empty($facebook)) : ?>
    <li>
      <a class="wow fadeIn" data-wow-duration="1s" href="<?php echo esc_url($facebook); ?>" target="_blank">
        <?php get_template_part('template-parts/icons/facebook', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
        <?php printf('<span class="label">%s</span>', $labels ? 'Facebook' : ''); ?>
      </a>
    </li>
  <?php endif; ?>
  <?php if (!empty($instagram)) : ?>
    <li>
      <a class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s" href="<?php echo esc_url($instagram); ?>" target="_blank">
        <?php get_template_part('template-parts/icons/instagram', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
        <?php printf('<span class="label">%s</span>', $labels ? 'Instagram' : ''); ?>
      </a>
    </li>
  <?php endif; ?>
  <?php if (!empty($twitter)) : ?>
    <li>
      <a class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" href="<?php echo esc_url($twitter); ?>" target="_blank">
        <?php get_template_part('template-parts/icons/x', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
        <?php printf('<span class="label">%s</span>', $labels ? 'Twitter' : ''); ?>
      </a>
    </li>
  <?php endif; ?>
  <?php if (!empty($discord)) : ?>
    <li>
      <a class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s" href="<?php echo esc_url($discord); ?>" target="_blank">
        <?php get_template_part('template-parts/icons/discord', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
        <?php printf('<span class="label">%s</span>', $labels ? 'Discord' : ''); ?>
      </a>
    </li>
  <?php endif; ?>
  <?php if (!empty($youtube)) : ?>
    <li>
      <a class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s" href="<?php echo esc_url($youtube); ?>" target="_blank">
        <?php get_template_part('template-parts/icons/youtube', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
        <?php printf('<span class="label">%s</span>', $labels ? 'YouTube' : ''); ?>
      </a>
    </li>
  <?php endif; ?>
  <?php if (!empty($tiktok)) : ?>
    <li>
      <a class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" href="<?php echo esc_url($tiktok); ?>" target="_blank">
        <?php get_template_part('template-parts/icons/tiktok', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
        <?php printf('<span class="label">%s</span>', $labels ? 'TikTok' : ''); ?>
      </a>
    </li>
  <?php endif; ?>
  <?php if (!empty($linkedin)) : ?>
    <li>
      <a class="wow fadeIn" data-wow-duration="1s" href="<?php echo esc_url($linkedin); ?>" target="_blank">
        <?php get_template_part('template-parts/icons/linkedin', null, ['color' => $color, 'alt_color' => $alt_color]); ?>
        <?php printf('<span class="label">%s</span>', $labels ? 'Linkedin' : ''); ?>
      </a>
    </li>
  <?php endif; ?>
</ul>