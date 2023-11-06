<?php get_header(); ?>

<main class="content-wrapper">

    <div class="banner-wrapper wow fadeIn">
        <?php get_template_part('template-parts/banner/career'); ?>
    </div>

            <?php
        if (have_rows('sections')) : ?>
            <div class="sections">
                <?php while (have_rows('sections')) :
                    the_row();
                    get_template_part('template-parts/sections/' . get_row_layout());
                endwhile; ?>

                <?php $heading = get_the_title(); ?>
                <div class="job-apply" style="margin-top:50px">
                    <a href="<?php echo site_url().'/contact-us-career/?job='.urlencode($heading); ?>" class="btn btn-plus btn-primary btn-plus-white">
                        <svg class="btn__icon" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.945 7.55828H15.8478C14.7433 7.55828 13.8485 6.66347 13.8485 5.55894V3.46174C13.8485 1.70009 12.4224 0.26001 10.6467 0.26001C8.88508 0.26001 7.445 1.68611 7.445 3.46174V5.55894C7.445 6.66347 6.55019 7.55828 5.44566 7.55828H3.34846C1.58681 7.55828 0.146729 8.98438 0.146729 10.76C0.146729 12.5217 1.57283 13.9617 3.34846 13.9617H5.44566C6.55019 13.9617 7.445 14.8565 7.445 15.9611V18.0583C7.445 19.8199 8.8711 21.26 10.6467 21.26C12.4084 21.26 13.8485 19.8339 13.8485 18.0583V15.9611C13.8485 14.8565 14.7433 13.9617 15.8478 13.9617H17.945C19.7066 13.9617 21.1467 12.5356 21.1467 10.76C21.1467 8.98438 19.7206 7.55828 17.945 7.55828Z" fill="currentColor"></path>
                        </svg>

                        <span class="btn__text">Apply Now</span>

                        <span class="btn__background"></span>
                    </a>
                </div>
                
            </div>
        <?php endif; ?>

        <?php 
        $location = get_the_terms( $post->ID, 'country' )[0];
        $careers_in_current_city = new WP_Query([
            'post_type'      => 'career',
            'posts_per_page' => 3,
            'post__not_in' => array( $post->ID ),
            'tax_query' => array (
                array(
                    'taxonomy' => 'country',
                    'field' => 'slug',
                    'terms' => $location
                )
            )
        ]);
        $num = $careers_in_current_city->post_count;
        if($num < 3) {
            $num_others = 3 - $num;
            $careers_related = new WP_Query([
                'post_type'      => 'career',
                'posts_per_page' => $num_others,
                'tax_query' => array (
                    array(
                        'taxonomy' => 'country',
                        'field' => 'slug',
                        'terms' => $location,
                        'operator'  => 'NOT IN'
                    )
                )
            ]);
        } 

        ?>

        <section class="career-list post-loop">
            <h3 class="subheading">OTHER JOB OPPORTUNITIES</h3>
            
            <!-- Career List -->
            <div class="container container-sm">

                <div class="row">
                    <?php if ($careers_in_current_city->have_posts()) :

                        while ($careers_in_current_city->have_posts()) :
                            $careers_in_current_city->the_post();
                            get_template_part('template-parts/global/career');
                        endwhile;

                        wp_reset_postdata();
                    endif; ?>

                    <?php if($num < 3) :

                    while ($careers_related->have_posts()) :
                        $careers_related->the_post();
                        get_template_part('template-parts/global/career');
                    endwhile;

                    wp_reset_postdata();
                    endif; ?>


                </div>

            </div>
        </section>


</main>

<?php get_footer(); ?>