<?php

/**
 * Template Name: Teams Pioneer
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



    <section class="certi_ficates py-5">
        <div class="container">
            <div class="row">
                <?php 
                $args = array(
                    'post_type'      =>'teams',
                    'post_status'    =>'publish',
                    'posts_per_page' =>-1,
                    'orderby'        =>'date',
                    'order'          => 'ASC'
                );

                $team = new WP_Query($args);

                if($team->have_posts()) {
                    while($team->have_posts()) {
                        $team->the_post();  
                        $team_id = get_the_ID();
                        $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                <div class="col-md-3 my-3">
                    <div class="card card-box">
                        <div class="img-bxx">
                            <img class="w-100" src="<?php echo $featured_image;?>" alt="">
                        </div>
                        <div class="prsn-desc">
                            <div class="main-descrptn">
                                <h3><?php the_title();?></h3>
                                <span><?php echo get_field('designation');?></span>
                                <p><?php echo wp_trim_words( get_the_content(), 8 ); ?>
                                    <a type="button" class="rd_more_btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal-<?php echo $team_id; ?>">
                                        Read More<i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </p>
                            </div>

                            <?php if(get_field('social_links')){ ?>
                            <div class="social-lnk">
                                <a href="<?php echo get_field('social_links');?>"><i
                                        class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade teams-modal" id="exampleModal-<?php echo $team_id; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel-<?php echo $team_id; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="mdl_img">
                                    <img src="<?php echo $featured_image;?>" alt="" class="w-100">
                                </div>
                                <h2 class="modal-title" id="exampleModalLabel-<?php echo $team_id; ?>">
                                    <?php the_title();?></h2>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body">
                                <?php the_content();?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } } 
                wp_reset_postdata();?>

            </div>
        </div>
    </section>







    <?php

get_footer();?>