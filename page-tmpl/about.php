<?php

/**
 * Template Name: About Us
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
                                <h1><?php echo the_title(); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Inner hero section end -->


    <!-- About body section start -->

    <section class="about_us_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <?php the_content();?>
                </div>
            </div>

            <div class="row mt-3">
                <?php 
                if(have_rows('about_repeater')) {
                    while(have_rows('about_repeater')) {
                        the_row(); ?>
                <div class="col-md-12">
                    <h5><?php echo get_sub_field('sec_heading',$post->ID);?></h5>
                    <p><?php echo get_sub_field('sec_description',$post->ID);?></p>
                </div>
                <?php } } ?>
            </div>

            <div class="row">
                <h3 class="text-center"><?php echo get_field('section_title',$post->ID);?></h3>
                <?php 
                if(have_rows('edge_repeater')) {
                    while(have_rows('edge_repeater')) {
                        the_row(); ?>
                <div class="col-md-12">
                    <h5><?php echo get_sub_field('headings',$post->ID);?></h5>
                    <p><?php echo get_sub_field('descriptions',$post->ID);?></p>
                </div>
                <?php } } ?>
            </div>
        </div>
    </section>
  
    <!-- About body section end -->




</main>

<?php
get_footer();?>