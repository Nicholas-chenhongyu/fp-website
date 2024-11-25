<?php get_header(); ?>

<?php
global $wp_query;
$page_id = get_option('page_for_posts');
$loadMore_id = str_replace('.', '', uniqid('loadMore_'));
$tax_query = '';

$press = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 6,
]);

?>

<?php if (have_rows('sections', $page_id)) : ?>
    <div class="sections" style="overflow-x:hidden !important;">
        <?php get_template_part('template-parts/banner'); ?>
        <?php while (have_rows('sections', $page_id)) : the_row();
            get_template_part('template-parts/sections/' . get_row_layout());
        endwhile; ?>
    </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>

<!-- Post Loop for all news -->
<div class="news post-loop all" id="<?php echo esc_attr($loadMore_id); ?>" data-max="<?php echo $press->max_num_pages; ?>">
    <h3 class="subheading">All Press RELEASES</h3>
    <div class="container container-sm">

        <div class="row load-more-target">
            <?php if ($press->have_posts()) : ?>
                <?php while ($press->have_posts()) : $press->the_post();
                    get_template_part('template-parts/global/post-excerpt');
                endwhile;
                wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="col-12 text-center">
                    <p>There are no press release to display.</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($press->max_num_pages > 1) :
            $args = [
                'title' => 'Load more',
                'load_args' => [
                    'post_type' => 'post',
                    'posts_per_page' => get_option('posts_per_page'),
                    'tax_query' => $tax_query,
                    'paged' => 2,
                ]
            ];
            get_template_part('template-parts/global/load-more', null, $args);
        endif; ?>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(() => {
        initLoadMore('<?php echo $loadMore_id; ?>');
    });
</script>

<?php wp_reset_postdata(); ?>

<?php
$cat_list = get_categories();
foreach ($cat_list as $cat) :
    $loadMore_id = str_replace('.', '', uniqid('loadMore_'));

    $tax_query = array(
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $cat->slug,
        )
    );

    $press = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'tax_query' => $tax_query
    ]);

?>
    <!-- post loop for single category -->
    <div class="news post-loop" id="<?php echo esc_attr($loadMore_id); ?>" data-max="<?php echo $press->max_num_pages; ?>" data-term="<?php echo $cat->slug ?>">
        <h3 class="subheading"><?php echo $cat->name ?></h3>
        <div class="container container-sm">

            <!-- Drop Down -->
            <div class="timeline__divider timeline__divider--top d-flex mb-5 align-items-center">
                <hr class="w-100 pb-0">
                <div class="timeline__pill dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <a href="#" role="button" id="countriesLink">
                        <?php echo esc_html($cat->name); ?>
                    </a>
                    <div class="news-dropdown careers-locations dropdown-menu" aria-labelledby="countriesLink">
                        <?php
                        $terms = get_terms('category', array(
                            'hide_empty' => false,
                        ));
                        if (!empty($terms) && !is_wp_error($terms)) {
                            echo '<ul>';
                            foreach ($terms as $term) {
                                echo '<li class="term" data-term=' . urlencode($term->slug) . '>' . $term->name . '</li>';
                            }
                            echo '</ul>';
                        }
                        ?>

                    </div>
                </div>
                <hr class="w-100 pb-0">
            </div>

            <div class="row load-more-target">
                <?php if ($press->have_posts()) : ?>
                    <?php while ($press->have_posts()) : $press->the_post();
                        get_template_part('template-parts/global/post');
                    endwhile;
                    wp_reset_postdata(); ?>
                <?php else : ?>
                    <div class="col-12 text-center">
                        <p>There are no press release to display.</p>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($press->max_num_pages > 1) :
                $args = [
                    'title' => 'Load more',
                    'load_args' => [
                        'post_type' => 'post',
                        'posts_per_page' => get_option('posts_per_page'),
                        'tax_query' => $tax_query,
                        'paged' => 2,
                    ]
                ];
                get_template_part('template-parts/global/load-more', null, $args);
            endif; ?>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(() => {
            initLoadMore('<?php echo $loadMore_id; ?>');
        });
    </script>

<?php endforeach; ?>

<script>
    jQuery(document).ready(() => {
        $('.news-dropdown li').on('click', function() {
            $('.post-loop').hide();
            var term = $(this).attr('data-term');
            console.log(term)
            $('.post-loop[data-term="' + term + '"]').show()
        })
    })
</script>

<!-- heading below -->
<section class="section heading-block section-spacing">
    <div class="container container-sm">

        <div class="wow animated" data-wow-offset="100" style="visibility: visible;">
            <div class="heading fadeInUpwards" data-highlight="row">

                <div class="heading-prefix">
                    <div class="heading-prefix__prefix">
                        <p class="fadeIn">FunPlus</p>
                        <div class="heading-prefix__prefix__underline uncoverFromBottom"></div>
                    </div>
                    <h2 class="heading-prefix__heading section-heading fadeIn">
                        <a href="https://drive.google.com/drive/folders/1f8WQwTU6AY3etNdBLPuLG0E5Ew_2XAsm?usp=sharing" target="_blank"><span>PRESS</span></a>
                        <br>
                        <a href="https://drive.google.com/drive/folders/1f8WQwTU6AY3etNdBLPuLG0E5Ew_2XAsm?usp=sharing" target="_blank"><span>KIT</span></a>
                    </h2>
                </div>

                <div class="description fadeIn">
                    <p><span style="font-weight: 400;">For more details or any inquiries you may have, don’t hesitate to reach out to our team at <a href="mailto:press@funplus.com">press@funplus.com</a>. We’re here to help with all your FunPlus needs and look forward to connecting with you!</span></p>
                </div>

            </div>
        </div>

    </div>
</section>

<div class="job-apply" style="margin-top:50px">
    <a href="<?php echo site_url() . '/contact-us/' ?>" class="btn btn-plus btn-primary btn-plus-white">
        <svg class="btn__icon" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.945 7.55828H15.8478C14.7433 7.55828 13.8485 6.66347 13.8485 5.55894V3.46174C13.8485 1.70009 12.4224 0.26001 10.6467 0.26001C8.88508 0.26001 7.445 1.68611 7.445 3.46174V5.55894C7.445 6.66347 6.55019 7.55828 5.44566 7.55828H3.34846C1.58681 7.55828 0.146729 8.98438 0.146729 10.76C0.146729 12.5217 1.57283 13.9617 3.34846 13.9617H5.44566C6.55019 13.9617 7.445 14.8565 7.445 15.9611V18.0583C7.445 19.8199 8.8711 21.26 10.6467 21.26C12.4084 21.26 13.8485 19.8339 13.8485 18.0583V15.9611C13.8485 14.8565 14.7433 13.9617 15.8478 13.9617H17.945C19.7066 13.9617 21.1467 12.5356 21.1467 10.76C21.1467 8.98438 19.7206 7.55828 17.945 7.55828Z" fill="currentColor"></path>
        </svg>

        <span class="btn__text">Contact Us</span>

        <span class="btn__background"></span>
    </a>
</div>

<?php get_footer(); ?>