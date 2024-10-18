<?php 
/**
 * 
 * Template file for showing Home Page
 * 
 * @package Pioneer_property
 * 
 */

get_header();

global $post;

?>


<main>

    <!-- Hero section start -->
    <section class="hero" data-aos="fade-up" data-aos-duration="1200">
        <div class="swiper mySwiper_hero">
            <div class="swiper-wrapper">
                <?php 
                if(have_rows('banner_images',$post->ID)) {
                    while(have_rows('banner_images',$post->ID)) {
                        the_row();?>
                <div class="swiper-slide hero_bg"
                    style="background-image: url(<?php echo get_sub_field('ban_images',$post->ID);?>)"></div>
                <?php } } ?>
            </div>
            <?php 
            $slider_icon = get_field('slider_icon',$post->ID);
                if($slider_icon) { ?>
            <div class="hero_swiper-button-next">
                <img src="<?php echo $slider_icon['right'];?>" alt="" />
            </div>
            <div class="hero_swiper-button-prev">
                <img src="<?php echo $slider_icon['left'];?>" alt="" />
            </div>
            <?php } ?>
        </div>

        <div class="container search_cont">
            <div class="row">
                <div class="col-12">
                    <form action="<?php echo site_url('/property/');?>" method="get" class="adv_search">
                        <div class="search_row">

                            <select name="location" id="location" class="property nice_select">
                                <option value="">Select Location</option>
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

                            <?php
                                $args = array(
                                    'taxonomy' => 'property-category',
                                );

                                $cats = get_categories($args);
                                ?>

                            <select name="category" id="category" class="areas nice_select">
                                <option value="">Type of property</option>
                                <?php foreach ($cats as $cat) { ?>
                                <option value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="d-flex s_box">
                            <input type="text" placeholder="Search Property Here" name="prop_name" />

                            <button class="in_btn" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->



    <!-- Poperty section start -->
    <section class="poperty trending " data-aos="fade-up" data-aos-duration="1200">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h2 class="section_title__heading comm_heading"><?php echo get_field('new_heading',$post->ID);?>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="slider_sec">
                        <button class="prev_trend">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="next_trend">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                        <div class="swiper-container trend_slider">
                            <div class="swiper-wrapper">
                                <?php
                $args = array(
                    'post_type' => 'property',
                    'post_status' => 'publish',
                    'posts_per_page' => 6,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                $Property = new WP_Query($args);

                if ($Property->have_posts()) {
                    while ($Property->have_posts()) {
                        $Property->the_post(); 
            ?>
                                <div class="swiper-slide">
                                    <a href="<?php the_permalink();?>">
                                        <div class="property_card">
                                            <div class="img_box">
                                                <?php 
                                                    $property_map_value = get_field('property_map_location');
                                                    if ($property_map_value) { ?>
                                                <span class="location">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    <span><?php echo $property_map_value; ?></span>
                                                </span>
                                                <?php } ?>

                                                <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                                <img src="<?php echo $featured_image;?>" alt="" />
                                            </div>
                                            <div class="cont_box">
                                                <h2><?php the_title();?></h2>
                                                <p> <?php echo get_field('property_contractor_name',$post->ID);?></p>
                                                <h6>
                                                    <?php 
                                                        $main_loc_value = get_field('main_location');
                                                        if ($main_loc_value) { ?>
                                                    <i class="fa-solid fa-location-dot"></i><span>
                                                        <?php echo $main_loc_value; ?></span>
                                                    <?php } ?>

                                                </h6>
                                                <h6>
                                                    <?php 
                                                        $room_tag = get_field('room_capacity');
                                                        if ($room_tag) { ?>
                                                    <i class="fa-solid fa-city"></i><span>
                                                        <?php echo implode(', ', $room_tag); ?></span>
                                                    <?php } ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php } } 
                                    wp_reset_postdata(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Poperty section end -->


    <!-- Category section start -->
    <section class="category_all">
        <div class="container">
            <div class="row">
                <div class="section_title">
                    <h2 class="section_title__heading comm_heading">
                        <?php echo get_field('category_heading',$post->ID);?></h2>
                    <p class="section_title__desc comm_sub_heading">
                        <?php echo get_field('category_description',$post->ID);?></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="slider_sec">
                        <!-- Add Navigation -->
                        <button class="prev_cate">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="next_cate">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>

                        <?php if (have_rows('category_repeater', $post->ID)) { ?>
                        <div class="swiper-container cate_slider">
                            <div class="swiper-wrapper">
                                <?php 
                                    $i = 0;
                                    while (have_rows('category_repeater', $post->ID)) {
                                        the_row();
                                        if ($i % 2 == 0) {
                                            if ($i > 0) {
                                                echo '</div>'; 
                                            }
                                            echo '<div class="swiper-slide">'; 
                                        }
                                    ?>
                                <div class="_box">
                                    <img src="<?php echo get_sub_field('images'); ?>" alt="" />
                                    <span><?php echo get_sub_field('title'); ?></span>
                                </div>
                                <?php
                                        $i++; }
                                        echo '</div>'; 
                                    ?>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category section end -->



    <!-- Trending section start -->
    <section class="poperty trending" data-aos="fade-up" data-aos-duration="1200">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h2 class="section_title__heading comm_heading">
                            <?php echo get_field('trending_heading',$post->ID);?></h2>
                        <p class="section_title__desc comm_sub_heading">
                            <?php echo get_field('trending_description',$post->ID);?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="slider_sec">
                        <button class="prev_trend">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="next_trend">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                        <div class="swiper-container trend_slider">
                            <div class="swiper-wrapper">
                                <?php
                                $args = array(
                                    'post_type'      => 'property',
                                    'posts_per_page' => -1,
                                    'post_status'    => 'publish',
                                    'meta_key'       => 'property_views',
                                    'orderby'        => 'meta_value_num',
                                    'order'          => 'DESC',
                                );

                                $trn_Property = new WP_Query($args);

                                if ($trn_Property->have_posts()) {
                                    while ($trn_Property->have_posts()) {
                                        $trn_Property->the_post(); 
                            ?>
                                <div class="swiper-slide">
                                    <a href="<?php the_permalink();?>">
                                        <div class="property_card">
                                            <div class="img_box">
                                                <?php 
                                                    $property_map_value = get_field('property_map_location');
                                                    if ($property_map_value) { ?>
                                                <span class="location">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    <span><?php echo $property_map_value; ?></span>
                                                </span>
                                                <?php } ?>
                                                <!-- <span class="gal">
                                                    <ul class="d-flex">
                                                        <li><i class="fa-solid fa-video"></i></li>
                                                        <li><i class="fa-solid fa-camera"></i></li>
                                                        <li>7</li>
                                                    </ul>
                                                </span> -->
                                                <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                                <img src="<?php echo $featured_image;?>" alt="" />
                                            </div>
                                            <div class="cont_box">
                                                <h2><?php the_title();?></h2>
                                                <p> <?php echo get_field('property_contractor_name',$post->ID);?></p>
                                                <h6>
                                                    <?php 
                                                        $main_loc_value = get_field('main_location');
                                                        if ($main_loc_value) { ?>
                                                    <i class="fa-solid fa-location-dot"></i><span>
                                                        <?php echo $main_loc_value; ?></span>
                                                    <?php } ?>

                                                </h6>
                                                <h6>
                                                    <?php 
                                                        $room_tag = get_field('room_capacity');
                                                        if ($room_tag) { ?>
                                                    <i class="fa-solid fa-city"></i><span>
                                                        <?php echo implode(', ', $room_tag); ?></span>
                                                    <?php } ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php } } 
                                    wp_reset_postdata(); ?>
                                <!-- <div class="swiper-slide">
                                    <a href="#">
                                        <div class="property_card">
                                            <div class="img_box">
                                                <span class="feature">Featured</span>
                                                <span class="sales">Sales</span>
                                                <span class="location">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    <span>B T Road, Enveloped near Chiriamore</span></span>
                                                <span class="gal">
                                                    <ul class="d-flex">
                                                        <li><i class="fa-solid fa-video"></i></li>
                                                        <li><i class="fa-solid fa-camera"></i></li>
                                                        <li>7</li>
                                                    </ul>
                                                </span>
                                                <img src="./images/prop_1.png" alt="" />
                                            </div>
                                            <div class="cont_box">
                                                <h2>Priva</h2>
                                                <p>Kalim Group</p>
                                                <h6>
                                                    <i class="fa-solid fa-location-dot"></i><span> Newtown</span>
                                                </h6>
                                                <h6>
                                                    <i class="fa-solid fa-city"></i><span> 2 BHK, 3 BHK, 4 BHK</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trending section end -->



    <!-- Blog section start -->
    <section class="blog" data-aos="fade-up" data-aos-duration="1200">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h2 class="section_title__heading comm_heading">
                            <?php echo get_field('blog_heading',$post->ID);?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="slider_sec">
                        <!-- Add Navigation -->
                        <button class="prev_blog">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="next_blog">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                        <div class="swiper-container blog_slider">
                            <div class="swiper-wrapper">
                                <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'tax_query'      => array(
                                        array(
                                            'taxonomy' => 'category',
                                            'field'    => 'slug',
                                            'terms'    => 'blog', 
                                        ),
                                    ),
                                );

                                $blog_post = new WP_Query($args);

                                if ($blog_post->have_posts()) {
                                    while ($blog_post->have_posts()) {
                                        $blog_post->the_post(); 
                            ?>
                                <div class="swiper-slide">
                                    <div class="blog_card">
                                        <div class="img_box">
                                            <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                            <img src="<?php echo $featured_image;?>" alt="" />
                                        </div>
                                        <a href="<?php the_permalink();?>">
                                            <div class="cont_box">
                                                <h6><?php the_title();?></h6>
                                                <p><?php echo wp_trim_words( get_the_content(), 7 ); ?></p>
                                                <div class="card_bottom">
                                                    <span class="date"><i class="fa-solid fa-calendar-days"></i>
                                                        <?php echo get_the_date('F j, Y');?>
                                                    </span>
                                                    <!-- <span class="count">5</span> -->
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php } } 
                                    wp_reset_postdata();?>

                                <!-- <div class="swiper-slide">
                                    <div class="blog_card">
                                        <div class="img_box">
                                            <img src="./images/blog_2.png" alt="" />
                                        </div>
                                        <a href="#">
                                            <div class="cont_box">
                                                <h6>The Growth of Residential Realty in Kolkata</h6>
                                                <p>
                                                    Lorem ipsum dolor sit ametctetur adipiscing elit,
                                                </p>
                                                <div class="card_bottom">
                                                    <span class="date"><i class="fa-solid fa-calendar-days"></i>
                                                        December 22, 2018
                                                    </span>
                                                    <span class="count">5</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog section end -->



    <!-- Testimonial section end -->
    <section class="testimonial"
        style="background-image: url(<?php echo get_field('testimonial_bg_image',$post->ID);?>)" data-aos="fade-up"
        data-aos-duration="1200">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h2 class="section_title__heading comm_heading">
                            <?php echo get_field('testimonial_heading',$post->ID);?></h2>
                        <p class="section_title__desc comm_sub_heading">
                            <?php echo get_field('testimonial_description',$post->ID);?></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-10 mx-auto">
                    <div class="thumb_box">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                <?php 
                            if (have_rows('testimonial_repeater',$post->ID)) {
                                while (have_rows('testimonial_repeater',$post->ID)) {
                                    the_row(); ?>

                                <div class="swiper-slide">
                                    <div class="video_box">
                                        <img src="<?php echo get_sub_field('main_image');?>" />
                                        <div class="marquee_container">
                                            <span class="marquee_text"><?php echo get_sub_field('title');?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php } } ?>

                                <!-- <div class="swiper-slide">
                                    <div class="video_box">
                                        <img src="./images/testi_slider.png" />
                                        <div class="marquee_container">
                                            <span class="marquee_text">Importance of insurance while buying a new
                                                home</span>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div thumbsSlider="" class="swiper mySwiper thumb">
                            <div class="swiper-wrapper">
                                <?php 
                            if (have_rows('testimonial_repeater',$post->ID)) {
                                while (have_rows('testimonial_repeater',$post->ID)) {
                                    the_row(); ?>

                                <div class="swiper-slide">
                                    <div class="controll_btn">
                                        <img src="<?php echo get_sub_field('button_image');?>" />
                                    </div>
                                </div>
                                <?php } } ?>

                                <!-- <div class="swiper-slide">
                                    <div class="controll_btn">
                                        <img src="./images/play_mini.png" />
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial section end -->



    <!-- Contact section end -->
    <section class="contact" data-aos="fade-up" data-aos-duration="1200">
        <div class="container">
            <div class="row row_rev">
                <div class="col-lg-8 col-md-7 pe-md-0 bg_white">
                    <div class="section_title">
                        <h2 class="section_title__heading comm_heading">
                            <?php echo get_field('left_form_heading',$post->ID);?></h2>
                    </div>
                    <div class="row">
                        <?php echo do_shortcode('[contact-form-7 id="8f7d52d" title="Home Page CF"]');?>
                    </div>

                    <!-- <div class="row">    
                        <div class="col-md-6">
                            <input type="text" placeholder="Name" />
                        </div>
                        <div class="col-md-6">
                            <input type="email" placeholder="Email" />
                        </div>
                        <div class="col-md-12">
                            <input type="number" name="" placeholder="Phone" />
                        </div>
                        <div class="col-md-12">
                            <textarea name="" id="" placeholder="Message"></textarea>
                        </div>
                        <div class="col-md-4">
                            <input type="text" placeholder="Captcha" />
                            <a class="in_btn" href="#">
                                submit
                                <span class="button__icon-wrapper">
                                    <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 15">
                                        <path fill="currentColor"
                                            d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z">
                                        </path>
                                    </svg>

                                    <svg class="button__icon-svg button__icon-svg--copy"
                                        xmlns="http://www.w3.org/2000/svg" width="10" fill="none" viewBox="0 0 14 15">
                                        <path fill="currentColor"
                                            d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z">
                                        </path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div> -->

                </div>
                <div class="col-lg-4 col-md-5 ps-md-0">
                    <div class="cont_right"
                        style="background-image: url(<?php echo get_field('right_bg_image',$post->ID);?>)">
                        <h2><?php echo get_field('right_heading',$post->ID);?></h2>
                        <ul>
                            <?php 
                            if (have_rows('contact_repeater',$post->ID)) {
                                while (have_rows('contact_repeater',$post->ID)) {
                                    the_row(); ?>

                            <li>
                                <div class="img_box">
                                    <img src="<?php echo get_sub_field('icons');?>" alt="" />
                                </div>
                                <p><?php echo get_sub_field('title');?></p>
                                <span><?php echo get_sub_field('values');?></span>
                            </li>
                            <?php } } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section end -->



    <!-- Partner section start -->
    <section class="partner" data-aos="fade-up" data-aos-duration="1200">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h2 class="section_title__heading comm_heading">
                            <?php echo get_field('associated_heading',$post->ID);?></h2>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <?php 
                if (have_rows('associated_partners',$post->ID)) {
                    while (have_rows('associated_partners',$post->ID)) {
                        the_row(); ?>
                <div class="partner_card">
                    <img src="<?php echo get_sub_field('partners_logo');?>" alt="" />
                </div>
                <?php } } ?>

            </div>
        </div>
    </section>
    <!-- Partner section end -->


</main>



<?php 
get_footer();?>