<?php

/**
 * Template Name: Vendors Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pioneer_property
 */

get_header();

?>


<main>

    <!-- Inner hero section start -->

    <section class="inner_hero wo_hr_line">
        <div class="container-fluid px-0">
            <div class="common_wrapper px-0">
                <div class="row">
                    <div class="col-lg-12 px-0">
                        <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                        <div class="banner" style="background-image: url(<?php echo $featured_image;?>)">
                            <div class="overlay"></div>
                            <div class="banner-content">
                                <?php $title = get_field('page_title',$post->ID); ?>
                                <h1><?php echo strtoupper($title);?></h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Inner hero section end -->

    

    <?php if(have_rows('option_type')) { ?>
    <section class="vendor_mn">
        <div class="container">
            <div class="row">
                <?php the_content(); ?>
                <?php while(have_rows('option_type')) { 
                    the_row(); ?>
                <div class="col-md-3">
                    <a href="<?php echo get_sub_field('links',$post->ID);?>" target="_blank">
                        <div class="cardbody text-center">
                            <img src="<?php echo get_sub_field('image',$post->ID);?>" alt="">
                            <h6><?php echo get_sub_field('title',$post->ID);?></h6>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>



</main>

<?php
get_footer();?>