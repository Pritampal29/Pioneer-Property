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

                            <div class="actions text-center justify-content-center">

                                <ul>

                                    <li class="mx-0"><a href="#">Enquire for home loan</a></li>

                                </ul>

                            </div>

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



<!-- Listing section start -->

<section class="listing">

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

                            <span class="prop_price">

                                ₹ <?php if($min_price_formatted) { echo $min_price_formatted; } ?> -

                                <?php if($max_price_formatted) { echo $max_price_formatted; } ?>

                            </span>



                            <?php } ?>

                        </div>

                        <p class="prop_dev"><?php echo get_field('property_contractor_name',$post->ID);?></p>

                        <?php $poss_date = get_field_object('possession_date',$post->ID);

                            if($poss_date) { 

                                $date = DateTime::createFromFormat('d/m/Y', $poss_date['value']);

                                $formatted_date = $date->format('jS F Y');?>

                            <span class="capsule"><?php echo $poss_date['label'];?>:

                                <?php echo $formatted_date;?></span>

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

                            <a href="<?php the_permalink();?>" class="in_btn in_btn_2">view details</a>

                            <button id="download-brochure" class="in_btn w-auto" data-bs-toggle="modal"

                                data-bs-target="#dnldModal">

                                Download Brochure

                            </button>

                            <a href="#" class="in_btn"><i class="fa-solid fa-phone"></i>get call back</a>

                        </div>

                    </div>

                </div>

            </div>

            <?php } } 

                    wp_reset_postdata(); ?>

        </div>

    </div>

</section>

<!-- Listing section end -->





<?php

get_footer();?>