<?php

/**
 * Template Name: Property Search Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-files
 *
 * @package Pioneer_property
 */

get_header();
global $post;
?>

<main>
    <!-- Inner hero section start -->
    <section class="inner_hero">
        <div class="container-fluid px-0">
            <div class="common_wrapper px-0">
                <div class="row">
                    <div class="col-lg-12 px-0">
                        <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                        <div class="banner" style="background-image: url(<?php echo $featured_image;?>)">
                            <div class="overlay"></div>
                            <div class="breadcrumb">
                                <ul>
                                    <li><a href="<?php echo site_url('/property/');?>">Property in Kolkata</a></li>
                                    <li>Properties For Sale In Kolkata</li>
                                    <!-- <li><a href="#">One Victoria</a></li> -->
                                </ul>
                            </div>
                            <div class="banner-content">
                                <h1>Kolkata</h1>
                                <div class="actions text-center justify-content-center">
                                    <!-- <ul>
                                        <li class="mx-0"><a href="#">Enquire for home loan</a></li>
                                    </ul> -->
                                </div>
                            </div>
                            <ul class="action_links">
                                <li><a href="<?php echo site_url('/trending-property/');?>">Trending properties</a></li>
                                <li><a href="<?php echo site_url('/new-launches/');?>">new launches</a></li>
                                <li><a href="<?php echo site_url('/get-offer/');?>">Get Offer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner hero section end -->


    <!-- Listing section start -->

    <section class="listing">
        <div class="container">

            <?php 
            if (isset($_GET['location']) && isset($_GET['category']) && isset($_GET['max_budget']) && isset($_GET['roomCat']) && isset($_GET['typeCat'])) { 
                $prop_location = sanitize_text_field($_GET['location']);
                $prop_category = sanitize_text_field($_GET['category']);
                // $prop_name = sanitize_text_field($_GET['prop_name']);
                $room_bhk = sanitize_text_field($_GET['roomCat']);
                $type_sp = sanitize_text_field($_GET['typeCat']);
    	        $max_budget = sanitize_text_field($_GET['max_budget']);
                ?>

            <div class="row">
                <?php
                    $args = array(
                        'post_type' => 'property',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );

                    if (!empty($max_budget)) {
                        $args['meta_query'][] = array(
                            'key' => 'property_price_min_price',
                            'value' => $max_budget,
                            'compare' => '<=',
                            'type' => 'NUMERIC',
                        );
                    }

                    if (!empty($prop_location)) {
                        $args['meta_query'][] = array(
                            'key' => 'main_location',
                            'value' => $prop_location,
                            'compare' => '=',
                        );
                    }

                    if (!empty($room_bhk)) {
                        $args['meta_query'][] = array(
                            'key' => 'room_capacity',
                            'value' => '"' . $room_bhk . '"',
                            'compare' => 'LIKE',
                        );
                    }

                    if (!empty($type_sp)) {
                        $args['meta_query'][] = array(
                            'key' => 'type_specification',
                            'value' => '"' . $type_sp . '"',
                            'compare' => 'LIKE',
                        );
                    }
             

                    // if (!empty($prop_name)) {
                    //     $args['s'] = $prop_name;
                    // }

                    if (!empty($prop_category)) {
                        $args['tax_query'][] = array(
                            'taxonomy' => 'property-category',
                            'field' => 'slug',
                            'terms' => $prop_category,
                        );
                    }

                    $property_query = new WP_Query($args);

                    if ($property_query->have_posts()) {
                        while ($property_query->have_posts()) {
                            $property_query->the_post();
                            ?>

                <div class="col-md-4 mb-4">
                    <div class="listing_card">
                        <div class="img_box">
                            <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                            <img src="<?php echo $featured_image;?>" alt="" />
                            <!-- Featured And Sale SHOW Section Start -->
                            <!-- <?php 
                                $prop_tag = get_field('property_tag',$post->ID);
                                if ($prop_tag) {
                                    if (in_array('Featured', $prop_tag)) { ?>
                            <span class="featured"><?php echo 'Featured'; ?></span>
                            <?php }
                                    if (in_array('Sale', $prop_tag)) { ?>
                            <span class="sales"><?php echo 'Sale'; ?></span>
                            <?php }
                                } ?> -->
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
                                <?php
                                $button_value = get_field('price_on_request',$post->ID);
                                if($button_value == 'Show'){ ?>
                                <span class="prop_price">
                                    ₹ <?php if($min_price_formatted) { echo $min_price_formatted; } ?> -
                                    <?php if($max_price_formatted) { echo $max_price_formatted; } ?>
                                </span>
                                <?php }elseif($button_value == 'Hide'){?>
                                <span class="prop_price price_btn">Price on request</span>
                                <?php } } ?>

                            </div>

                            <?php
                            $category_terms = get_the_terms(get_the_ID(), 'property-category'); 

                            if ($category_terms && !is_wp_error($category_terms)) {
                                $category_names = wp_list_pluck($category_terms, 'slug');

                                if (in_array('land', $category_names)) { ?>
                            <p class="area_size_land" style="color:#000">
                                <?php echo get_field('land_area', get_the_ID()); ?>
                            </p>
                            <?php } else { ?>
                            <p class="prop_dev">
                                <?php echo get_field('property_contractor_name', get_the_ID()); ?>
                            </p>
                            <?php } } ?>

                            <!-- <p class="prop_dev"><?php echo get_field('property_contractor_name',$post->ID);?></p> -->

                            <?php $poss_date = get_field('possession_date',$post->ID);
                            if($poss_date) { 
                                // $date = DateTime::createFromFormat('d/m/Y', $poss_date);
                                // $formatted_date = $date->format('jS F Y');
                                ?>
                            <span class="capsule">Possession Date: <?php echo $poss_date;?></span>
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
                                    <span><?php echo $capacity;?></span><span><?php echo $size;?></span>
                                    <?php
                                $button_value = get_field('price_on_request',$post->ID);
                                if($button_value == 'Show'){ ?>
                                    <span><?php echo $price;?></span>
                                    <?php }elseif($button_value == 'Hide'){?>
                                    <span>Price on request</span>
                                    <?php } ?>
                                </div>
                                <?php } } ?>
                            </div>
                            <div class="button_box d-flex">
                                <a href="<?php the_permalink();?>" class="in_btn in_btn_2">View Details</a>
                                <button class="in_btn w-auto open-modal" data-bs-toggle="modal"
                                    data-bs-target="#dnldModal" data-title="<?php echo get_the_title(); ?>"
                                    data-pdf="<?php echo esc_attr($pdf_url); ?>">
                                    Download Brochure
                                </button>
                                <a href="<?php echo get_permalink() . '#side_bar'; ?>" class="in_btn"><i
                                        class="fa-solid fa-phone"></i>Get Call Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } 
                    wp_reset_postdata();    
                } else {
                    echo '<p>No properties found.</p>';
                } ?>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- Listing section end -->


</main>



<div class="modal fade" id="dnldModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Download Brochure</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-regular fa-circle-xmark"></i>
                </button>
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

        $("#dnldModal").attr("data-pdf-url", propertyPdf);
    });
});

document.addEventListener('wpcf7mailsent', function(event) {
    if (event.detail.contactFormId == '859') {
        var pdfUrl = $("#dnldModal").attr("data-pdf-url");

        if (pdfUrl) {
            window.open(pdfUrl, '_blank');
        }
    }
}, false);
</script>

<?php
get_footer();?>