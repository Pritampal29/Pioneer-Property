<?php
/**
 * Template Name: Certificates
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
                if(have_rows('certificates',$post->ID)) {
                    while(have_rows('certificates',$post->ID)) {
                        the_row(); ?>
                <div class="col-md-4 my-3">
                    <a target="_blank" href="<?php echo get_sub_field('pdf_link');?>"><img
                            src="<?php echo get_sub_field('certificate_image');?>" alt=""></a>
                </div>
                <?php } } ?>
            </div>
        </div>
    </section>


    <?php
get_footer();?>