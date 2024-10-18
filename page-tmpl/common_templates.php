<?php

/**

 * Template Name: Common Template

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





    <section class="foot_comm_pg py-5">

        <div class="container">

            <div class="row">

                <div class="col">

                    <div class="mn_bdy_cnt">

                        <?php the_content();?>

                    </div>

                </div>

            </div>

        </div>

    </section>





</main>



<?php

get_footer(); ?>