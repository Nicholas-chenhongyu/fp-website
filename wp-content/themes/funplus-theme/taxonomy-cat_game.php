<?php 

/**
 * Template Name: Game Updates Category Page
 */


get_header(); 

?>

<main class="content-wrapper blank">

    <?php 
        $tax = $wp_query->get_queried_object();

        $updates = new WP_Query([
            'post_type'      => 'game_update',
            'posts_per_page' => -1,
            'orderby' => 'date',
	          'order'   => 'DESC',
            'tax_query' => array (
                array(
                    'taxonomy' => 'cat_game',
                    'field' => 'slug',
                    'terms' => $tax->slug
                )
            )
        ]);

        ?>

    <section class="career-list post-loop">
        <h3 class="subheading">Latest News From <?php echo $tax->name ?></h3>
        
        <!-- Press List -->
        <div class="container container-sm">

            <div class="row">
                <?php if ($updates->have_posts()) :

                    while ($updates->have_posts()) :
                        $updates->the_post();
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

<?php get_footer(); ?>