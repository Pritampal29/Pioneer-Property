<?php
/**
 * Template Name: Location Properties
 */
get_header(); 
?>


<!-- Inner hero section start -->
<?php
    $selected_locationb = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : ''; ?>
<section class="inner_hero wo_hr_line">
    <div class="container-fluid px-0">
        <div class="common_wrapper px-0">
            <div class="row">
                <div class="col-lg-12 px-0">
                    <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                    <div class="banner" style="background-image: url(<?php echo $featured_image;?>)">
                        <div class="overlay"></div>
                        <div class="banner-content">
                            <h1>Properties in: <?php echo esc_html($selected_locationb);?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Inner hero section end -->


<div class="container pt-4">
    <?php
    // Get query parameters from URL
    $selected_location = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : '';
    $selected_category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

    if (!empty($selected_location) && !empty($selected_category)) {

        // Query properties based on location and category
        $args = [
            'post_type'      => 'property',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'meta_query'     => [
                [
                    'key'     => 'main_location',
                    'value'   => $selected_location,
                    'compare' => 'LIKE',
                ],
            ],
            'tax_query'      => [
                [
                    'taxonomy' => 'property-category',
                    'field'    => 'slug',
                    'terms'    => $selected_category,
                ],
            ],
        ];

        $property_query = new WP_Query($args);

        if ($property_query->have_posts()) {
            echo '<div class="row">';
            while ($property_query->have_posts()) {
                $property_query->the_post();
                ?>
    <div class="col-md-4 mb-4 gallery-item <?php echo esc_attr(trim($category_classes)); ?>">
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

                <?php $poss_date = get_field_object('possession_date',$post->ID);
                            if(get_field('possession_date',$post->ID)) { ?>
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

                <!-- <?php $rera_no = get_field('property_rera_no',$post->ID);
                                if($rera_no){ ?>
                        <span class="prop_rera">RERA No.: <?php echo $rera_no; ?></span>
                        <?php } ?> -->
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


                    <!-- <button id="download-brochure" class=" in_btn
                                w-auto" data-bs-toggle="modal" data-bs-target="#dnldModal">Download Brochure</button> -->


                    <?php $pdf_url = get_field('download_brochure_pdf',$post->ID); ?>
                    <button class="in_btn w-auto open-modal" data-bs-toggle="modal" data-bs-target="#dnldModal"
                        data-title="<?php echo get_the_title(); ?>" data-pdf="<?php echo esc_attr($pdf_url); ?>">
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
            echo '</div>';
            wp_reset_postdata();
        } else {
            echo '<p>No properties found for this location and category.</p>';
        }
    } else {
        echo '<p>No location or category selected.</p>';
    }
    ?>
</div>
</div>


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


<?php get_footer(); ?>