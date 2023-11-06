<?php get_header(); ?>

<main id="content">

  <section class="flexible-section">
    <div class="banner ">
      <div class="bg-curved-shadow"></div>
      <div class="underlay banner-underlay bg-shade wow fadeIn"></div>
      <div class="banner-overlay"></div>
      <div class="container banner-container justify-content-center">
        <div class="banner-head">
          <h1 class="wow fadeInUpwards mb-lg-4 h1 text-white" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUpwards;">
            Search results
          </h1>
        </div>
      </div>
    </div>
  </section>

  <section class="flexible-section pad-section-y">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 offset-xl-2">

            <?php if ( have_posts() ) : ?>

              <p class="lead text-center mb-5">
                <?php printf( esc_html__( 'Search Results for: "%s"', 'xskeleton' ), get_search_query() ); ?>
              </p>
              <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'entry' ); ?>
              <?php endwhile; ?>
              <?php get_template_part( 'nav', 'below' ); ?>

            <?php else : ?>

              <div class="text-center">
                <p class="lead">
                  <?php printf( esc_html__( 'Search Results for: "%s"', 'xskeleton' ), get_search_query() ); ?>
                </p>
                <p class="mb-5">
                  <?php esc_html_e( 'Sorry, nothing matched your search. Please try again.', 'xskeleton' ); ?>
                </p>
              </div>
              <?php get_template_part('search-form'); ?>

            <?php endif; ?>

        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
