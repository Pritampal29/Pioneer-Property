<?php

/**

 * Template Name: Banner Property Pages

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-files

 *

 * @package Pioneer_property

 */



get_header();

?>



<section class="inner_hero wo_hr_line">

    <div class="container-fluid px-0">

        <div class="common_wrapper px-0">

            <div class="row">

                <div class="col-lg-12 px-0">

                    <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

                    <div class="banner" style="background-image: url(<?php echo $featured_image;?>)">

                        <div class="overlay"></div>

                        <div class="breadcrumb">

                            <ul>

                                <li><a href="<?php echo site_url('/property/');?>">Properties For Sale In Kolkata</a>

                                </li>

                                <li><?php echo the_title();?></li>

                            </ul>

                        </div>

                        <div class="banner-content">

                            <h1><?php echo the_title();?></h1>


                        </div>

                        <ul class="action_links">

                            <?php if(is_page('241')) { ?>

                            <li><a href="<?php echo site_url('/new-launches/');?>">new launches</a></li>

                            <li><a href="<?php echo site_url('/get-offer/');?>">Get Offer</a></li>

                            <?php } elseif(is_page('243')) { ?>

                            <li><a href="<?php echo site_url('/trending-property/');?>">Trending properties</a></li>

                            <li><a href="<?php echo site_url('/get-offer/');?>">Get Offer</a></li>

                            <?php } elseif(is_page('1136')) { ?>

                            <li><a href="<?php echo site_url('/new-launches/');?>">new launches</a></li>

                            <li><a href="<?php echo site_url('/trending-property/');?>">Trending properties</a></li>

                            <?php } ?>



                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Inner hero section end -->



<section class="listing">
    <div class="container">
        <!-- Filter Buttons -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <div class="filter-button-group">
                    <button class="btn py-2 me-2 tab_btn_pr active" data-filter="*">Show All</button>
                    <?php
                    $categories = get_terms('property-category');
                    if (!empty($categories) && !is_wp_error($categories)) {
                        foreach ($categories as $category) { ?>
                    <button class="btn py-2 me-2 tab_btn_pr" data-filter=".<?php echo esc_attr($category->slug); ?>">
                        <?php echo esc_html($category->name); ?>
                    </button>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>

        <!-- Property Listing -->
        <div class="row" id="property-list">
            <?php
           
            if (is_page('241')) {
                $args = array(
                    'post_type'      => 'property',
                    'posts_per_page' => 20,
                    'post_status'    => 'publish',
                    'meta_key'       => 'property_views',
                    'orderby'        => 'meta_value_num',
                    'order'          => 'DESC',
                );
            } elseif (is_page('243')) {
                $args = array(
                    'post_type'      => 'property',
                    'post_status'    => 'publish',
                    'posts_per_page' => 20,
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                );
            } elseif (is_page('1136')) {
                $args = array(
                    'post_type'      => 'property',
                    'post_status'    => 'publish',
                    'posts_per_page' => 20,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'meta_query'     => array(
                        array(
                            'key'     => 'any_offer',
                            'value'   => '1',
                            'compare' => 'LIKE'
                        )
                    ),
                );
            } else {
                $args = array( 
                    'post_type'      => 'property',
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                    'orderby'        => 'date',
                    'order'          => 'ASC',
                );
            }
            
            $property_query = new WP_Query($args);
            
            if ($property_query->have_posts()) {
                while ($property_query->have_posts()) {
                    $property_query->the_post();
                    $categories = get_the_terms(get_the_ID(), 'property-category');
                    $category_classes = '';
                    if ($categories && !is_wp_error($categories)) {
                        foreach ($categories as $category) {
                            $category_classes .= $category->slug . ' ';
                        }
                    }
                    $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
            ?>
            <div class="col-md-6 mb-4 gallery-item <?php echo esc_attr(trim($category_classes)); ?>">
                <div class="listing_card">
                    <div class="img_box">
                        <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                        <img src="<?php echo $featured_image;?>" alt="" />

                        <!-- Featured And Sale SHOW Section Start -->
                        <?php 
                        $prop_tags = get_field('property_tag', $post->ID);
                        if ($prop_tags) {
                            foreach ($prop_tags as $tag) {
                                echo '<span class="'. strtolower(str_replace(' ', '-', $tag)) .'">'. esc_html($tag) .'</span>';
                            }
                        }
                        ?>

                        <!-- Featured And Sale SHOW Section End -->

                    </div>
                    <div class="cont_box">
                        <div class="top">
                            <span class="prop_name"><?php the_title();?></span>
                            <?php
                            $Price = get_field('property_price', $post->ID);
                                    if ($Price) { 
                                        $min_price = $Price['min_price'];
                                        $max_price = $Price['max_price'];
                                        if ($min_price >= 10000000) {
                                            $min_price_formatted = number_format($min_price / 10000000, 2) . ' cr';
                                        } elseif ($min_price >= 100000) {
                                            $min_price_formatted = number_format($min_price / 100000, 2) . ' lakh';
                                        } elseif($min_price >= 1000) {
                                            $min_price_formatted = number_format($min_price / 1000, 2) . ' K';
                                        }

                                        if ($max_price >= 10000000) {
                                            $max_price_formatted = number_format($max_price / 10000000, 2) . ' cr';
                                        } elseif ($max_price >= 100000) {
                                            $max_price_formatted = number_format($max_price / 100000, 2) . ' lakh';
                                        } elseif($max_price >= 1000) {
                                            $max_price_formatted = number_format($max_price / 1000, 2) . ' K';
                                        }
                                        ?>
                            <span class="prop_price">
                                ₹ <?php if($min_price_formatted) { echo $min_price_formatted; } ?> -
                                <?php if($max_price_formatted) { echo $max_price_formatted; } ?>
                            </span>

                            <?php } ?>
                        </div>
                        <p class="prop_dev"><?php echo get_field('property_contractor_name',$post->ID);?></p>
                        <?php $poss_date = get_field_object('possession_date',$post->ID);
                            if($poss_date) { ?>
                        <span class="capsule"><?php echo $poss_date['label'];?>:
                            <?php echo $poss_date['value'];?></span>
                        <?php } ?>

                        <?php 
                            $property_map_value = get_field('main_location',$post->ID);
                            $property_map_address = get_field('property_live_map',$post->ID);
                            if($property_map_value) { ?>
                        <p id="location">
                            <i class="fa-solid fa-location-dot me-2"></i><a
                                href="<?php echo $property_map_address;?>"><?php echo $property_map_value;?></a>
                        </p>
                        <?php } ?>

                        <?php $rera_no = get_field('property_rera_no',$post->ID);
                                if($rera_no){ ?>
                        <span class="prop_rera">RERA No.: <?php echo $rera_no; ?></span>
                        <?php } ?>
                        <div class="details_box">

                            <?php 
                                if(have_rows('room_specification',$post->ID)) { 
                                    while(have_rows('room_specification',$post->ID)) { 
                                        the_row(); 
                                    $capacity = get_sub_field('capacity');
                                    $size = get_sub_field('size');
                                    $price = get_sub_field('price');
                                ?>
                            <div class="details">
                                <span><?php echo $capacity;?></span><span><?php echo $size;?></span><span><?php echo $price;?></span>
                            </div>
                            <?php } } ?>
                        </div>
                        <div class="button_box d-flex">
                            <a href="<?php the_permalink();?>" class="in_btn in_btn_2">View Details</a>


                            <!-- <button id="download-brochure" class=" in_btn
                                w-auto" data-bs-toggle="modal" data-bs-target="#dnldModal">Download Brochure</button> -->


                            <?php $pdf_url = get_field('download_brochure_pdf',$post->ID); ?>
                            <button class="in_btn w-auto open-modal" data-bs-toggle="modal" data-bs-target="#dnldModal"
                                data-title="<?php echo get_the_title(); ?>"
                                data-pdf="<?php echo esc_attr($pdf_url); ?>">
                                Download Brochure
                            </button>

                            <!-- <a href="<?php echo get_permalink(); ?>?open_modal=true" id="trigger-download-brochure"
                                class="in_btn w-auto">Download Brochure</a> -->


                            <a href="<?php echo get_permalink() . '#side_bar'; ?>" class="in_btn"><i
                                    class="fa-solid fa-phone"></i>Get Call Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            wp_reset_postdata();
            ?>

        </div>
    </div>
</section>



<!-- Listing section start -->

<!-- <section class="listing">
    <div class="container">
        <div class="row" id="property-list">
            <?php
            if(is_page('241')) {
                $args = array(
                    'post_type'      => 'property',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    'meta_key'       => 'property_views',
                    'orderby'        => 'meta_value_num',
                    'order'          => 'DESC',
                );

            } elseif(is_page('243')) {
                $args = array(
                    'post_type' => 'property',
                    'post_status' => 'publish',
                    'posts_per_page' => 10,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

            } elseif(is_page('1136')) {
                $args = array(
                    'post_type' => 'property',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'meta_query' => array(
                        array(
                            'key' => 'any_offer', 
                            'value' => '1',
                            'compare' => 'LIKE'
                        )
                    ),
                );
            }

            $trn_Property = new WP_Query($args);

            if ($trn_Property->have_posts()) {
                while ($trn_Property->have_posts()) {
                    $trn_Property->the_post(); 
            ?>
            <div class="col-md-6 mb-4">
                <div class="listing_card">
                    <div class="img_box">
                        <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                        <img src="<?php echo $featured_image;?>" alt="" />
                    </div>
                    <div class="cont_box">
                        <div class="top">
                            <span class="prop_name"><?php the_title();?></span>
                            <?php
                            $Price = get_field('property_price', $post->ID);
                                    if ($Price) { 
                                        $min_price = $Price['min_price'];
                                        $max_price = $Price['max_price'];
                                        if ($min_price >= 10000000) {
                                            $min_price_formatted = number_format($min_price / 10000000, 2) . ' cr';
                                        } elseif ($min_price >= 100000) {
                                            $min_price_formatted = number_format($min_price / 100000, 2) . ' lakh';
                                        } elseif($min_price >= 1000) {
                                            $min_price_formatted = number_format($min_price / 1000, 2) . ' K';
                                        }

                                        if ($max_price >= 10000000) {
                                            $max_price_formatted = number_format($max_price / 10000000, 2) . ' cr';
                                        } elseif ($max_price >= 100000) {
                                            $max_price_formatted = number_format($max_price / 100000, 2) . ' lakh';
                                        } elseif($max_price >= 1000) {
                                            $max_price_formatted = number_format($max_price / 1000, 2) . ' K';
                                        }
                                        ?>
                            <span class="prop_price">
                                ₹ <?php if($min_price_formatted) { echo $min_price_formatted; } ?> -
                                <?php if($max_price_formatted) { echo $max_price_formatted; } ?>
                            </span>

                            <?php } ?>
                        </div>
                        <p class="prop_dev"><?php echo get_field('property_contractor_name',$post->ID);?></p>
                        <?php $poss_date = get_field_object('possession_date',$post->ID);
                            if($poss_date) { ?>
                        <span class="capsule"><?php echo $poss_date['label'];?>:
                            <?php echo $poss_date['value'];?></span>
                        <?php } ?>

                        <?php 
                            $property_map_value = get_field('main_location',$post->ID);
                            $property_map_address = get_field('property_live_map',$post->ID);
                            if($property_map_value) { ?>
                        <p id="location">
                            <i class="fa-solid fa-location-dot me-2"></i><a
                                href="<?php echo $property_map_address;?>"><?php echo $property_map_value;?></a>
                        </p>
                        <?php } ?>

                        <?php $rera_no = get_field('property_rera_no',$post->ID);
                                if($rera_no){ ?>
                        <span class="prop_rera">RERA No.: <?php echo $rera_no; ?></span>
                        <?php } ?>
                        <div class="details_box">

                            <?php 
                                if(have_rows('room_specification',$post->ID)) { 
                                    while(have_rows('room_specification',$post->ID)) { 
                                        the_row(); 
                                    $capacity = get_sub_field('capacity');
                                    $size = get_sub_field('size');
                                    $price = get_sub_field('price');
                                ?>
                            <div class="details">
                                <span><?php echo $capacity;?></span><span><?php echo $size;?></span><span><?php echo $price;?></span>
                            </div>
                            <?php } } ?>
                        </div>
                        <div class="button_box d-flex">
                            <a href="<?php the_permalink();?>" class="in_btn in_btn_2">View Details</a>


                            <button id="download-brochure" class=" in_btn
                                w-auto" data-bs-toggle="modal" data-bs-target="#dnldModal">Download Brochure</button>


                            <?php $pdf_url = get_field('download_brochure_pdf',$post->ID); ?>
                            <button class="in_btn w-auto open-modal" data-bs-toggle="modal" data-bs-target="#dnldModal"
                                data-title="<?php echo get_the_title(); ?>"
                                data-pdf="<?php echo esc_attr($pdf_url); ?>">
                                Download Brochure
                            </button>

                            <a href="<?php echo get_permalink(); ?>?open_modal=true" id="trigger-download-brochure"
                                class="in_btn w-auto">Download Brochure</a>


                            <a href="<?php echo get_permalink() . '#side_bar'; ?>" class="in_btn"><i
                                    class="fa-solid fa-phone"></i>Get Call Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } 
                    wp_reset_postdata(); ?>

        </div>
    </div>
</section> -->
<!-- Listing section end -->


<!-- <div class="modal fade" id="dnldModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Download Brochure</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="enquiry-form">
                    <?php echo do_shortcode( '[contact-form-7 id="3886b16" title="Download Brochure"]' );?>
                </div>
            </div>
        </div>
    </div>
</div> -->


<div class="modal fade" id="dnldModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Download Brochure</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="enquiry-form">
                    <?php echo do_shortcode( '[contact-form-7 id="3886b16" title="Download Brochure"]' );?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function() {
    $(".open-modal").click(function() {
        var propertyTitle = $(this).data("title");
        var propertyPdf = $(this).data("pdf");

        $("#dnldModal #modalTitle").text("Download Brochure for " + propertyTitle);
    });
});

document.addEventListener('wpcf7mailsent', function(event) {
    if (event.detail.contactFormId == '859') {
        var modal = $("#dnldModal");
        var pdfUrl = modal.data("pdf-url");
        alert(pdfUrl);
        if (pdfUrl) {
            window.open(pdfUrl, '_blank');
        }
    }
}, false);
</script>





<script src="https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script>
jQuery(document).ready(function($) {
    var $grid = $('#property-list').isotope({
        itemSelector: '.gallery-item',
        layoutMode: 'fitRows'
    });

    $('.filter-button-group button').on('click', function() {
        $('.filter-button-group button').removeClass('active');
        $(this).addClass('active');

        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
            filter: filterValue
        });
    });
});
</script>


<?php

get_footer();?>