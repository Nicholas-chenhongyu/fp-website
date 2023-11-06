<?php 

/**
 * Template Name: Blank with Sidebar
 */

get_header(); 

$lang = get_field('page_language_select');
?>
<main class="content-wrapper privacy">
    
    <!-- only show dropdown when in european policy pages -->

    <div class="language-container container" style="margin-bottom: 50px">
        <div class="dropdown show language-select">
            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php 
                    if ($lang) {
                        echo $lang;
                    } else {
                        echo 'English';
                    }
                ?>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php 
                
                $args = array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'post_parent'    => $post->post_parent,
                    'order'          => 'ASC',
                    'orderby'        => 'menu_order',
                );
                $parent = new WP_Query( $args );
                
                if ( $parent->have_posts() ) : 
                    while ( $parent->have_posts() ) : $parent->the_post();
                ?>

                    <a href="<?php echo get_the_permalink(); ?>" class="dropdown-item">
                        <?php echo get_field('page_language_select') ?>
                    </a>

                    <?php endwhile; ?>
                <?php endif; wp_reset_postdata(); ?>
                
            </div>
        </div>
    </div>

    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/sections');
        endwhile;
    endif;
    ?>

</main>

<?php get_footer(); ?>