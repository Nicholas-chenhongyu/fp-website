<?php

/**
 * World Map
 * Display a world map as an SVG.
 * 
 * -- DEV STUFF --
 * Loop through each location from the fields, get the ISO val
 * Higlight each location in orange
 * Add a pin on top of the SVG based on the paths pixel location
 * Pin to be clickable to open the further data about the location
 */

// Heading
$heading_highlight = get_sub_field('heading_highlight');
$heading_1 = get_sub_field('heading_1');
$heading_2 = get_sub_field('heading_2');
$heading_text = get_sub_field('heading_text');

// Content
$queryArgs = [
  'post_type' => 'studio',
  'posts_per_page' => -1,
];

$theQuery = new WP_Query($queryArgs);

$countries = array_map(function ($studio) {
  $details = $details = get_field('details', $studio);
  if (!empty($details['country'])) {
    return $details['country'];
  }
}, $theQuery->posts);

$regions = get_terms('region');

// Map ID
$map_id = str_replace('.', '', uniqid('map_'));

// Spacing
$spacing = get_sub_field('section_spacing') ? 'section-spacing' : 'no-section-spacing'; ?>

<section class="section world-map wow <?php echo $spacing; ?>" id="<?php echo esc_attr($map_id); ?>" data-locations="<?php echo esc_attr(htmlspecialchars(json_encode($countries))); ?>">
  <div class="container container-sm">
    <?php get_template_part('template-parts/global/heading', null, [
      'highlight' => $heading_highlight,
      'heading_1' => $heading_1,
      'heading_2' => $heading_2,
      'text'      => $heading_text
    ]); ?>
  </div>

  <div class="world-map__map fadeInUpwardsSm">
    <div class="container">
      <div class="world-map__map__container">
        <?php get_template_part('template-parts/objects/map'); ?>
        <div class="world-map__locations">
          <?php while ($theQuery->have_posts()) : $theQuery->the_post(); ?>
            <?php $details = get_field('details'); ?>

            <div class="world-map__location <?php echo $details['link'] ? 'has-link' : '' ?>" data-xpos="<?= ($details['map_position']['x']); ?>" data-ypos="<?= ($details['map_position']['y']); ?>" id="<?= esc_attr($details['country']); ?>">
              <div class="world-map__location__image">
                <?= wp_get_attachment_image($details['image'], 'small', '', []); ?>
              </div>

              <div class="world-map__location__wrapper">
                <div class="world-map__location__text">
                  <?= wp_get_attachment_image($details['country_icon'], 'small', '', []); ?>
                  <p class="world-map__location__title"><?= get_the_title(); ?></p>
                  <?php if ($details['link']) : ?>
                    <a class="btn btn-text btn-plus btn-plus-orange btn-plus-right load-more btn-map" href="<?= ($details['link']) ?>" target="_blank">
                      <svg class="btn__icon" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.945 7.55828H15.8478C14.7433 7.55828 13.8485 6.66347 13.8485 5.55894V3.46174C13.8485 1.70009 12.4224 0.26001 10.6467 0.26001C8.88508 0.26001 7.445 1.68611 7.445 3.46174V5.55894C7.445 6.66347 6.55019 7.55828 5.44566 7.55828H3.34846C1.58681 7.55828 0.146729 8.98438 0.146729 10.76C0.146729 12.5217 1.57283 13.9617 3.34846 13.9617H5.44566C6.55019 13.9617 7.445 14.8565 7.445 15.9611V18.0583C7.445 19.8199 8.8711 21.26 10.6467 21.26C12.4084 21.26 13.8485 19.8339 13.8485 18.0583V15.9611C13.8485 14.8565 14.7433 13.9617 15.8478 13.9617H17.945C19.7066 13.9617 21.1467 12.5356 21.1467 10.76C21.1467 8.98438 19.7206 7.55828 17.945 7.55828Z" fill="currentColor"></path>
                      </svg>
                    </a>
                  <?php endif; ?>

                </div>
                <?php if (!empty($details['short_description'])) : ?>
                  <p class="world-map__location__description">
                    <?= $details['short_description']; ?>
                  </p>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </div>


  <div class="locations-slider">
    <div class="swiper-container locations-slider__thumbs">
      <div class="swiper-wrapper">
        <?php foreach ($regions as $key => $region) : ?>
          <div class="locations-slider__thumb swiper-slide">
            <div class="locations-slider__thumb__text">
              <?= $region->name; ?>
              <span class="locations-slider__thumb__text__underline"></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="swiper-container locations-slider__container">
      <div class="swiper-wrapper">
        <?php foreach ($regions as $key => $region) : ?>
          <div class="swiper-slide">
            <?php
            $queryArgs = [
              'post_type' => 'studio',
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'tax_query' => [
                [
                  'taxonomy' => 'region',
                  'field' => 'slug',
                  'terms' => $region->slug,
                ]
              ],
            ];

            $theQuery = new WP_Query($queryArgs);

            ?>

            <div class="locations-slider__slide">
              <?php while ($theQuery->have_posts()) : $theQuery->the_post(); ?>
                <?php $details = get_field('details'); ?>

                <div class="world-map__location" id="<?= esc_attr($details['country']); ?>">
                  <div class="world-map__location__image">
                    <?= wp_get_attachment_image($details['image'], 'small', '', []); ?>
                  </div>

                  <div class="world-map__location__wrapper">
                    <div class="world-map__location__text">
                      <?= wp_get_attachment_image($details['country_icon'], 'small', '', []); ?>
                      <p class="world-map__location__title"><?= get_the_title(); ?></p>
                      <?php if ($details['link']) : ?>
                        <a class="btn btn-text btn-plus btn-plus-orange btn-plus-right load-more btn-map" href="https://www.funplus.com.cn/" target="_blank">
                          <svg class="btn__icon" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.945 7.55828H15.8478C14.7433 7.55828 13.8485 6.66347 13.8485 5.55894V3.46174C13.8485 1.70009 12.4224 0.26001 10.6467 0.26001C8.88508 0.26001 7.445 1.68611 7.445 3.46174V5.55894C7.445 6.66347 6.55019 7.55828 5.44566 7.55828H3.34846C1.58681 7.55828 0.146729 8.98438 0.146729 10.76C0.146729 12.5217 1.57283 13.9617 3.34846 13.9617H5.44566C6.55019 13.9617 7.445 14.8565 7.445 15.9611V18.0583C7.445 19.8199 8.8711 21.26 10.6467 21.26C12.4084 21.26 13.8485 19.8339 13.8485 18.0583V15.9611C13.8485 14.8565 14.7433 13.9617 15.8478 13.9617H17.945C19.7066 13.9617 21.1467 12.5356 21.1467 10.76C21.1467 8.98438 19.7206 7.55828 17.945 7.55828Z" fill="currentColor"></path>
                          </svg>
                        </a>
                      <?php endif; ?>
                    </div>
                    <?php if (!empty($details['short_description'])) : ?>
                      <p class="world-map__location__description">
                        <?= $details['short_description']; ?>
                      </p>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  jQuery(document).ready(() => {
    initMap('<?php echo $map_id; ?>');
    initLocationsSwiper(<?= $map_id; ?>);
  });
</script>