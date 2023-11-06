<?php
// Settings
$menu_1 = wp_get_nav_menu_name('footer-1');
$menu_2 = wp_get_nav_menu_name('footer-2');
$menu_3 = wp_get_nav_menu_name('footer-3');
$privacy_link = get_field('privacy_link', 'option');
$tcs_link = get_field('tcs_link', 'option');
$show_map = get_field('show_map');
?>

<?php if ($show_map) :
    get_template_part('template-parts/global/map');
endif; ?>

<?php get_template_part('template-parts/global/cookie');?>


<footer class="footer wow" data-wow-offset="100">
    <div class="container container-sm">
        <div class="row">
            <div class="footer__col col-12 col-md-3">
                <a class="footer__logo fadeIn" href="<?php echo get_home_url('/'); ?>">
                    <?php get_template_part('template-parts/logo/logo-orange'); ?>
                </a>
            </div>
            <div class="col-12 col-md-8 offset-0 offset-md-1">
                <div class="footer-menus">
                    <div class="footer__col">
                        <?php if ($menu_1) : ?>
                            <p class="footer__title fadeIn"><?php echo $menu_1; ?></p>
                        <?php endif; ?>
                        <?php wp_nav_menu([
                            'theme_location' => 'footer-1',
                            'menu_class'     => 'footer__menu fadeIn'
                        ]); ?>
                    </div>
                    <div class="footer__col">
                        <?php if ($menu_2) : ?>
                            <p class="footer__title fadeIn"><?php echo $menu_2; ?></p>
                        <?php endif; ?>
                        <?php wp_nav_menu([
                            'theme_location' => 'footer-2',
                            'menu_class'     => 'footer__menu fadeIn'
                        ]); ?>
                    </div>
                    <div class="footer__col">
                        <?php if ($menu_3) : ?>
                            <p class="footer__title fadeIn"><?php echo $menu_3; ?></p>
                        <?php endif; ?>
                        <?php wp_nav_menu([
                            'theme_location' => 'footer-3',
                            'menu_class'     => 'footer__menu fadeIn'
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
        <ul class="footer__bottom">
            <li class="fadeIn">&copy; <?php echo get_bloginfo('name'); ?> <?php echo date('Y'); ?></li>
            <?php if ($privacy_link) : ?>
                <li class="fadeIn"><a href="<?php echo esc_url($privacy_link['url']); ?>" target="<?php echo esc_attr($privacy_link['target']); ?>"><?php echo $privacy_link['title']; ?></a></li>
            <?php endif; ?>
            <?php if ($tcs_link) : ?>
                <li class="fadeIn"><a href="<?php echo esc_url($tcs_link['url']); ?>" target="<?php echo esc_attr($tcs_link['target']); ?>"><?php echo $tcs_link['title']; ?></a></li>
            <?php endif; ?>
        </ul>
    </div>
</footer>

<div class="mobile-nav" data-wow-offset="70">
    <div class="mobile-nav__inner">
        <?php get_template_part('template-parts/global/language-select'); ?>
        <?php wp_nav_menu([
            'theme_location' => 'mobile-menu',
            'menu_class'     => 'mobile-nav__nav'
        ]); ?>
        <div class="deadzone"></div>
    </div>
</div>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.6.2/smooth-scrollbar.js"></script>
<script>
    var Scrollbar = window.Scrollbar;
    Scrollbar.init(document.querySelector('body'));
</script> -->

<?php wp_footer(); ?>

<div class="modal fade" id="gdprModal" tabindex="-1" role="dialog" aria-labelledby="gdprModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">GDPR Compliance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        FunPlus takes data privacy and IT security very seriously and follows the applicable data protection regulations in the European Union and individual countries (in particular the EU General Data Protection Regulation, GDPR). The applicants´ personal data will be retained for as long as necessary for the application process. It will automatically be deleted from our files 8 months after having received the application, at the latest. This does not apply if mandatory statutory provisions and/or requirements from authorities or courts oppose such deletion, or if the applicant has explicitly consented to a longer retention period in the Talent Pool. This consent may be revoked at any time by the applicant without providing justification by contacting <a href="mailto:careers@funplus.com">careers@funplus.com</a>.
      </div>
    </div>
  </div>
</div>

</body>

</html>