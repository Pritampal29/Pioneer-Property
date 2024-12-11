<?php

/**
 * The template for displaying all single Partners (Partner Details Page)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pioneer_property
 */
get_header();
global $post;
?>


<main>

    <!-- Inner hero section start -->
    <!-- <section class="inner_hero wo_hr_line">
        <div class="container-fluid px-0">
            <div class="common_wrapper px-0">
                <div class="row">
                    <div class="col-lg-12 px-0">
                        <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                        <div class="banner" style="background-image: url(<?php echo $featured_image;?>)">
                            <div class="overlay"></div>
                            <div class="banner-content">
                                <h1><?php echo the_title(); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Inner hero section end -->


    <section class="partner_dtls py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo $featured_image;?>" alt="">
                </div>
                <div class="col-md-8">
                    <h2><?php the_title();?></h2>
                    <?php the_content();?>
                </div>

            </div>
        </div>
    </section>

</main>

<?php
get_footer(); ?>