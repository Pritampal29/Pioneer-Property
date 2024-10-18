<?php

/**
 * Template Name: Brokers Page
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
                                <?php $title = get_field('page_title',$post->ID);?>
                                <h1><?php echo strtoupper($title);?></h1>
                                <?php $rn_btn = get_field('register_button',$post->ID); 
                                if($rn_btn) {?>
                                    <a class="in_btn mx-auto mt-4" href="<?php echo $rn_btn['url'];?>"><?php echo $rn_btn['title'];?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Inner hero section end -->


    <section class="brokers_main">
        <div class="container">
            <div class="row">
                <?php
                if(have_rows('main_repeater')) {
                    while(have_rows('main_repeater')) {
                        the_row();?>
                <div class="col-md-4 text-center">
                    <img src="<?php echo get_sub_field('images',$post->ID);?>" alt="">
                    <h5><?php echo get_sub_field('titles',$post->ID);?></h5>
                </div>  
                <?php } } ?>
            </div>
        </div>
    </section>

    <section class="brokers_main mb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2><?php echo get_field('section_heading',$post->ID);?></h2>
                    <h5><?php echo get_field('section_title',$post->ID);?></h5>
                    <p><?php echo get_field('section_description',$post->ID);?></p>
                    <?php $rn_btn = get_field('register_button',$post->ID); 
                    if($rn_btn) {?>
                        <a class="in_btn mx-auto" href="<?php echo $rn_btn['url'];?>"><?php echo $rn_btn['title'];?></a>
                    <?php } ?>
                </div>           
            </div>
        </div>
    </section>




</main>

<?php
get_footer();?>