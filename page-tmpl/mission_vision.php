<?php



/**

 * Template Name: Mission & Vision

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
    <section class="mission_main py-5">
        <div class="container">
            <?php
            if(have_rows('mission_repeater')) { 
                while(have_rows('mission_repeater')) {
                    the_row();?>
            <div class="row row_rev">
                <div class="col-md-6 m-0 p-0">
                    <img src="<?php echo get_sub_field('image',$post->ID);?>" alt="Img" class="w-100">
                </div>
                <div class="col-md-6 m-0 p-5">
                    <?php echo get_sub_field('content',$post->ID);?>
                </div>
            </div>
            <?php } } ?>
        </div>
    </section>
    <!-- About body section end -->


</main>



<?php

get_footer();?>