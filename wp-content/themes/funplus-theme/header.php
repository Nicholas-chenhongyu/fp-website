<!DOCTYPE html>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <!-- <meta name="theme-color" content="#02aeef" /> -->
  <meta name="google-site-verification" content="rwLbii96CWdybKYAr0MI59eACbKb8zeE1VrXVWRMhwE" />

  <!-- Preload Fonts -->
  <link rel="preload" href="/wp-content/themes/funplus-theme/public/webfonts/D-DIN-Bold.ttf" as="font" crossorigin>
  <link rel="preload" href="/wp-content/themes/funplus-theme/public/webfonts/D-DINCondensed-Bold.ttf" as="font" crossorigin>
  <link rel="preload" href="/wp-content/themes/funplus-theme/public/webfonts/D-DINExp-Bold.ttf" as="font" crossorigin>
  <link rel="preload" href="/wp-content/themes/funplus-theme/public/webfonts/D-DIN.ttf" as="font" crossorigin>
  <link rel="preload" href="/wp-content/themes/funplus-theme/public/webfonts/D-DINExp.ttf" as="font" crossorigin>

  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PDBNFZ8P');
  </script>
  <!-- End Google Tag Manager -->

  <?php wp_head(); ?>
</head>

<body class="<?php echo is_home() ? 'home' : ''; ?> <?php echo is_page() ? 'page-' . get_the_ID() : ''; ?>" data-ajax="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PDBNFZ8P" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <!-- <div class="loader"> -->
  <?php // get_template_part('template-parts/logo/logo-white'); 
  ?>
  <!-- </div> -->

  <header class="nav-bar">
    <div class="container">
      <div class="nav-bar__inner">
        <a class="nav-bar__logo" href="<?php echo get_home_url('/'); ?>">
          <?php
          $ggj_event = get_field('green_game_jam', 'option');

          if (!$ggj_event) {
            get_template_part('template-parts/logo/logo-orange');
          } else {
          ?>
            <img class="w-100 h-auto" src="<?php echo get_stylesheet_directory_uri() . "/assets/logo_ggj.png" ?>" alt="funplus">
          <?php
          }
          ?>
        </a>
        <div class="nav-bar__inner__right">
          <?php wp_nav_menu([
            'theme_location' => 'desktop-menu',
            'menu_class'     => 'nav-bar__nav wow',

          ]); ?>
          <?php get_template_part('template-parts/global/language-select'); ?>
        </div>
        <button type="button" class="btn btn-toggle nav-bar__toggle">
          <span></span>
          <span></span>
        </button>
      </div>
    </div>
  </header>