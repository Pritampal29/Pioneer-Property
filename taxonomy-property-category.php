<?php

/**

 * The template for displaying Property Category Page

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
                        <div class="banner"
                            style="background-image: url(<?php echo site_url('/wp-content/uploads/2024/07/banner-1.png');?>)">
                            <div class="overlay"></div>
                            <div class="banner-content">
                                <h1 id="catNameh"><?php echo esc_html(single_cat_title('', false)); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner hero section end -->


    <?php
        $category = get_queried_object();
        $category_slug = $category->slug;
    ?>



    <section class="listing">
        <div class="container">

            <div class="row">
                <div class="col-md-12 mb-4">
                    <form id="searchFormCat">
                        <ul class="filter_ul justify-content-end">
                            <?php if($category_slug == "residential" || $category_slug == "premium" || $category_slug == "commercial" || $category_slug == "warehouse" || $category_slug == "retail" || $category_slug == "prelease" || $category_slug == "land") { ?>

                            <!-- Location Search -->
                            <li class="filter_li">
                                <div class="select_box">
                                    <div class="logo_box">
                                        <img src="<?php echo get_template_directory_uri();?>/images/location.png"
                                            alt="" />
                                    </div>
                                    <select name="locationCat" id="mainLocationCat" class="nice_select more_option">
                                        <option value="">Location/Zone</option>
                                        <?php
                                                $args = array(
                                                    'post_type' => 'property',
                                                    'posts_per_page' => -1,
                                                );

                                                $property_query = new WP_Query($args);

                                                $property_types = array();

                                                if ($property_query->have_posts()) {
                                                    while ($property_query->have_posts()) {
                                                        $property_query->the_post();

                                                        $property_type = get_field('main_location');

                                                        if (!in_array($property_type, $property_types)) {
                                                            $property_types[] = $property_type;
                                                        }
                                                    }
                                                    wp_reset_postdata();

                                                    foreach ($property_types as $type) {
                                                        echo '<option value="' . $type . '">' . ucfirst($type) . '</option>';
                                                    }
                                                }
                                            ?>
                                    </select>
                                </div>
                            </li>

                            <?php if($category_slug == "residential" || $category_slug == "premium") { ?>
                            <!-- Room Capacity -->
                            <li class="filter_li">
                                <div class="select_box">
                                    <div class="logo_box">
                                        <img src="<?php echo get_template_directory_uri();?>/images/bed.png" alt="" />
                                    </div>
                                    <?php
                                        $args = array(
                                            'post_type'      => 'property',
                                            'posts_per_page' => 1,
                                        );
                                        $property_query = new WP_Query($args);

                                        if ($property_query->have_posts()) {
                                            while($property_query->have_posts()) {
                                                $property_query->the_post(); 
                                                $field = get_field_object('room_capacity');

                                                if ($field) {
                                                    $choices = $field['choices']; ?>
                                    <select name="roomCat" id="roomCat_vl" class="nice_select more_option room">
                                        <option value="">Room Capacity</option>
                                        <?php foreach ($choices as $value1 => $label1) { ?>
                                        <option value="<?php echo esc_attr($value1); ?>">
                                            <?php echo esc_html($label1); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php
                                            } } }
                                        wp_reset_postdata();
                                        ?>
                                </div>
                            </li>
                            <?php } ?>

                            <?php if($category_slug == "commercial") { ?>
                            <!-- Type -->
                            <li class="filter_li">
                                <div class="select_box">
                                    <div class="logo_box">
                                        <img src="<?php echo get_template_directory_uri();?>/images/bed.png" alt="" />
                                    </div>
                                    <?php
                                        $args = array(
                                            'post_type'      => 'property',
                                            'posts_per_page' => 1,
                                        );
                                        $property_query = new WP_Query($args);

                                        if ($property_query->have_posts()) {
                                            while($property_query->have_posts()) {
                                                $property_query->the_post(); 
                                                $field2 = get_field_object('type_specification');

                                                if ($field2) {
                                                    $choice = $field2['choices']; ?>
                                    <select name="typeCat" id="typeCat_vl" class="nice_select more_option typesp">
                                        <option value="">Type</option>
                                        <?php foreach ($choice as $value2 => $label2) { ?>
                                        <option value="<?php echo esc_attr($value2); ?>">
                                            <?php echo esc_html($label2); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php
                                            } } }
                                        wp_reset_postdata();
                                        ?>
                                </div>
                            </li>
                            <?php } ?>

                            <?php if($category_slug != "land" && $category_slug != "prelease"){?>
                            <!-- Property Status -->
                            <li class="filter_li">
                                <div class="select_box">
                                    <div class="logo_box">
                                        <img src="<?php echo get_template_directory_uri();?>/images/home.png" alt="" />
                                    </div>
                                    <select name="propStatusCat" id="propStatusCat" class="nice_select more_option">
                                        <option value="">Property status:</option>
                                        <?php
                                                $args = array(
                                                    'post_type' => 'property',
                                                    'posts_per_page' => -1,
                                                );
                                                $property_status_query = new WP_Query($args);

                                                $property_statuses = array();

                                                if ($property_status_query->have_posts()) {
                                                    while ($property_status_query->have_posts()) {
                                                        $property_status_query->the_post();

                                                        $property_status = get_field('property_status');

                                                        if (!in_array($property_status, $property_statuses)) {
                                                            $property_statuses[] = $property_status;
                                                        }
                                                    }
                                                    wp_reset_postdata();

                                                    foreach ($property_statuses as $status) {
                                                        echo '<option value="' . esc_attr($status) . '">' . esc_html(ucfirst($status)) . '</option>';
                                                    }
                                                }
                                            ?>
                                    </select>
                                </div>
                            </li>
                            <?php } ?>

                            <?php if($category_slug == "residential" || $category_slug == "premium") { ?>
                            <!-- Buy/Rent -->
                            <li class="filter_li">
                                <div class="select_box">
                                    <div class="logo_box">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/home.png" alt="" />
                                    </div>
                                    <select name="propBuyRentCat" id="propBuyRentCat" class="nice_select more_option">
                                        <option value="">Buy/Rent:</option>
                                        <?php
                                            $args = array(
                                                'post_type'      => 'property',
                                                'posts_per_page' => -1,
                                            );
                                            $property_query = new WP_Query($args);

                                            $buy_rent_options = array();

                                            if ($property_query->have_posts()) {
                                                while ($property_query->have_posts()) {
                                                    $property_query->the_post();

                                                    // Fetch the checkbox field value
                                                    $property_buyrent = get_field('property_buyrent');

                                                    if (!empty($property_buyrent) && is_array($property_buyrent)) {
                                                        foreach ($property_buyrent as $option) {
                                                            if (!in_array($option, $buy_rent_options)) {
                                                                $buy_rent_options[] = $option;
                                                            }
                                                        }
                                                    }
                                                }
                                                wp_reset_postdata();

                                                foreach ($buy_rent_options as $option) {
                                                    echo '<option value="' . esc_attr($option) . '">' . esc_html(ucfirst($option)) . '</option>';
                                                }   
                                            } ?>
                                    </select>
                                </div>
                            </li>
                            <?php } ?>

                            <?php if($category_slug == "land" || $category_slug == "prelease" || $category_slug == "warehouse" || $category_slug == "retail"){?>
                            <!-- Land Area -->
                            <li class="filter_li">
                                <div class="select_box">
                                    <div class="logo_box">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/home.png" alt="" />
                                    </div>
                                    <input type="text" name="area" id="areasizeCat"
                                        placeholder="Area Size <?php if($category_slug == "land") {echo "(in Cottah)";}else{echo "(in Sq.ft)";}?>">
                                    <!-- <select name="landCat" id="landCat" class="nice_select more_option land">
                                        <option value="">Area/Size:</option>
                                        <?php
                                            $args = array(
                                                'post_type'      => 'property',
                                                'posts_per_page' => -1,
                                            );
                                            $property_query = new WP_Query($args);

                                            $buy_rent_options = array();

                                            if ($property_query->have_posts()) {
                                                while ($property_query->have_posts()) {
                                                    $property_query->the_post();

                                                    // Fetch the checkbox field value
                                                    $property_buyrent = get_field('property_buyrent');

                                                    if (!empty($property_buyrent) && is_array($property_buyrent)) {
                                                        foreach ($property_buyrent as $option) {
                                                            if (!in_array($option, $buy_rent_options)) {
                                                                $buy_rent_options[] = $option;
                                                            }
                                                        }
                                                    }
                                                }
                                                wp_reset_postdata();

                                                foreach ($buy_rent_options as $option) {
                                                    echo '<option value="' . esc_attr($option) . '">' . esc_html(ucfirst($option)) . '</option>';
                                                }   
                                            } ?>
                                    </select> -->
                                </div>
                            </li>
                            <?php } ?>

                            <!-- Property Budget -->
                            <li class="filter_li budget">
                                <div class="select_box" id="budget_box">
                                    <div class="logo_box">
                                        <img src="<?php echo get_template_directory_uri();?>/images/budget.png"
                                            alt="" />
                                    </div>
                                    <select name="budgetCat" id="budgetCat" class="nice_select more_option">
                                        <option value="">Budget</option>
                                    </select>
                                </div>
                                <div class="slider_box">
                                    <div class="form-group">
                                        <label for="loan-amount">Amount (INR): <span
                                                id="loan-amount-value">50Cr</span></label>
                                        <input type="range" id="loan-amountCat" name="min_budget" min="1500000"
                                            max="500000000" step="500000" value="500000000" />
                                        <input type="hidden" id="min-budgetCat" name="min_budget" value="100000" />
                                    </div>
                                </div>
                            </li>

                            <button id="advSearchBtnCat" type="button" class="listing_search_btn">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <?php } ?>
                        </ul>
                    </form>
                </div>
            </div>


            <div class="row" id="mainPropDivCat">
                <?php
                if(have_posts()) {
                    while(have_posts()) {
                        the_post(); ?>

                <div class="col-md-4 mb-4" id="propertyListCat">
                    <div class="listing_card">

                        <!-- Property Image start -->
                        <div class="img_box">
                            <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                            <img src="<?php echo $featured_image;?>" alt="" />
                        </div>
                        <!-- Property image end -->

                        <div class="cont_box">
                            <div class="top">

                                <!-- Property name start -->
                                <span class="prop_name"><?php the_title();?></span>
                                <!-- Property name end -->


                                <!-- Property Price start -->
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
                            <!-- Property Price end -->


                            <!-- Property Developer Name start -->

                            <?php if($category_slug == "land"){?>
                            <p class="area_size_land" style="color:#000"><?php echo get_field('land_area',$post->ID);?>
                            </p>
                            <?php }else{ ?>
                            <p class="prop_dev"><?php echo get_field('property_contractor_name',$post->ID);?></p>
                            <?php } ?>

                            <!-- Property Developer Name end -->


                            <!-- Possession Date start -->
                            <?php $poss_date = get_field_object('possession_date',$post->ID);
                            if(get_field('possession_date',$post->ID)) { 
                                // $date = DateTime::createFromFormat('d/m/Y', $poss_date['value']);
                                // $formatted_date = $date->format('jS F Y');?>
                            <span class="capsule"><?php echo $poss_date['label'];?>:
                                <?php echo $poss_date['value'];?></span>
                            <?php } ?>
                            <!-- Possession Date end -->


                            <!-- Property Location start -->
                            <?php 
                            $property_map_value = get_field('main_location',$post->ID);
                            $property_map_address = get_field('property_live_map',$post->ID);
                            if($property_map_value) { ?>
                            <p id="location">
                                <i class="fa-solid fa-location-dot me-2"></i><a
                                    href="<?php echo $property_map_address;?>"><?php echo $property_map_value;?></a>
                            </p>
                            <?php } ?>
                            <!-- Property Location end -->


                            <!-- Rera Details start -->
                            <!-- <?php $rera_no = get_field('property_rera_no',$post->ID);
                                if($rera_no){ ?>
                            <span class="prop_rera">RERA No.: <?php echo $rera_no; ?></span>
                            <?php } ?> -->
                            <!-- Rera Details end -->


                            <!-- Room Specification start -->
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
                            <!-- Room Specification end -->


                            <!-- Below Buttons start -->
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
                            <!-- Below Buttons end -->
                        </div>
                    </div>
                </div>

                <?php } } 
                wp_reset_postdata(); ?>
            </div>

        </div>
    </section>


    <!-- Loader in Property Page start -->
    <div class="property_loader">
        <div class="dot-spinner">
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
        </div>
    </div>
    <!-- Loader in Property Page end -->




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
function formatAmount(value) {
    if (value >= 10000000) {
        return (value / 10000000).toFixed(2) + 'Cr';
    } else if (value >= 100000) {
        return (value / 100000).toFixed(2) + 'L';
    }
    return value;
}

document.getElementById('loan-amountCat').addEventListener('input', function() {
    var value = this.value;
    document.getElementById('loan-amount-value').textContent = formatAmount(value);
});

// document.getElementById('loan-amountCat').addEventListener('input', function() {
//     var value = this.value;
//     document.getElementById('loan-amount-value').textContent = value;
// });
</script>


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

get_footer(); ?>