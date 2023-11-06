<?php

/**
 * Career Single 
 */

$heading = get_the_title();
$location = get_the_terms( $post->ID, 'country' )[0];
?>

<div class="container banner-container wow">
    <div class="fadeIn" data-wow-offset="70">
        <div class="banner career-single-banner">

            <img width="1920" height="960" class="banner__main__bg-image uncoverBannerBg" src="<?php echo get_stylesheet_directory_uri().'/assets/banner-' . $location->slug .'.png' ?>" alt="location">

            <div class="container container-sm banner-inner-container">
                <div class="banner__inner">
                    <div class="banner__main fixed-height">
                        <div class="banner__main__content">
                            <h1 class="banner-heading">
                                <span class="fadeIn"><?php echo $heading; ?></span>
                                <span class="fadeZoomIn"></span>
                            </h1>
                            <div class="banner-blurb fadeIn">
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <p class="p1"><strong><span class="s1"><?php echo get_the_excerpt(); ?></span></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

