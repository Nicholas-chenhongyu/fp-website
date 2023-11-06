<?php get_header(); ?>

<main class="content-wrapper press">

    <?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/banner');
        get_template_part('template-parts/sections');
    endwhile;
    ?>

    <?php 
        $category = get_the_terms( $post->ID, 'cat_game' )[0];
        $press_in_current_category = new WP_Query([
            'post_type'      => 'game_update',
            'posts_per_page' => 3,
            'post__not_in' => array( $post->ID ),
            'orderby' => 'date',
	          'order'   => 'DESC',
            'tax_query' => array (
                array(
                    'taxonomy' => 'cat_game',
                    'field' => 'slug',
                    'terms' => $category
                )
            )
        ]);

        ?>

        <section class="career-list post-loop">
            <h3 class="subheading">Latest News From <?php echo $category->name ?></h3>
            
            <!-- Press List -->
            <div class="container container-sm">

                <div class="row">
                    <?php if ($press_in_current_category->have_posts()) :

                        while ($press_in_current_category->have_posts()) :
                            $press_in_current_category->the_post();
                            get_template_part('template-parts/global/post', 'thumbnail');
                        endwhile;

                        wp_reset_postdata();
                    endif; ?>

                </div>

                <div class="text-center">
                  <p>Follow us to know more <a href="https://linktr.ee/funplus" target="_blank">https://linktr.ee/funplus</a></p>
                </div>
                

            </div>
        </section>

</main>

<script type="text/javascript">
    jQuery(document).ready(() => {
        $(".row.justify-content-center>.col-12 a").attr("target", "_blank");
    });
</script>

<?php get_footer(); ?>