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
                    style="background-image: url(<?php echo get_sub_field('ban_images',$post->ID);?>)">
                    <div class="banner-text">
                        <h1><?php echo get_sub_field('banner_text',$post->ID);?></h1>
                    </div>
                </div>
                <?php } } ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>


        <div class="container search_cont">
            <div class="row">
                <div class="col-12">
                    <form action="<?php echo site_url('/propsearch/');?>" method="get" class="adv_search">
                        <div class="search_row">

                            <?php
                                $args = array(
                                    'taxonomy' => 'property-category',
                                );
                                $cats = get_categories($args); ?>
                            <select name="category" id="category" class="category areas nice_select">
                                <option value="">Property Type</option>
                                <?php foreach ($cats as $cat) { ?>
                                <option value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option>
                                <?php } ?>
                            </select>

                            <select name="location" id="location" class="property nice_select">
                                <option value="">All Locations</option>
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
                            <select name="roomCat" id="roomCat" class="nice_select more_option select_bhk">
                                <option value="">Room</option>
                                <?php foreach ($choices as $value1 => $label1) { ?>
                                <option value="<?php echo esc_attr($value1); ?>">
                                    <?php echo esc_html($label1); ?></option>
                                <?php } ?>
                            </select>
                            <?php } } }
                                    wp_reset_postdata(); ?>




                            <?php
                            $args = array(
                                'post_type'      => 'property',
                                'posts_per_page' => 1,
                            );
                            $property_query = new WP_Query($args);

                            if ($property_query->have_posts()) {
                                while($property_query->have_posts()) {
                                    $property_query->the_post(); 
                                    $field = get_field_object('type_specification');

                                    if ($field) {
                                        $choice = $field['choices']; ?>
                            <select name="typeCat" id="typeCat" class="nice_select more_option select_type">
                                <option value="">Type</option>
                                <?php foreach ($choice as $value2 => $label2) { ?>
                                <option value="<?php echo esc_attr($value2); ?>">
                                    <?php echo esc_html($label2); ?></option>
                                <?php } ?>
                            </select>
                            <?php } } }
                                    wp_reset_postdata(); ?>




                            <div class="filter_li_home budget">
                                <div class="select_box" id="budget_box">
                                    <select name="budget" id="budget" class="nice_select more_option">
                                        <option value="">Max. Price</option>
                                    </select>
                                </div>
                                <div class="slider_box">
                                    <div class="form-group">
                                        <label for="loan-amount">₹ <span id="loan-amount-value">50Cr</span></label>
                                        <input type="range" id="loan-amount" name="max_budget" min="1500000"
                                            max="500000000" step="500000" value="500000000" />
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="d-flex s_box">

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
    <section class="poperty launch_sec trending " data-aos="fade-up" data-aos-duration="1200">
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
                        $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
                        $banimages1 = get_field('main_image_gallery', $post->ID);
                ?>

                <div class="col-lg-4 col-md-6 mb-3 position-relative new_card ">

                    <!-- Featured And Sale SHOW Section Start -->
                    <?php 
                        $prop_tags = get_field('property_tag', $post->ID);
                        if ($prop_tags) { ?>
                    <div class="offer_box _in">
                        <?php foreach ($prop_tags as $tag) { ?>
                        <span class="offer"><?php echo esc_html($tag);?></span>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <!-- Featured And Sale SHOW Section End -->
                    <div class="swiper card_slider">
                        <div class="swiper-wrapper">

                            <?php if (! $banimages1){ ?>
                            <div class="swiper-slide">
                                <div class="card-container"
                                    style="background-image: url(<?php echo esc_url($featured_image); ?>); cursor: pointer;"
                                    onclick="window.location.href='<?php the_permalink(); ?>'">
                                </div>
                            </div>
                            <?php } ?>


                            <?php if ($banimages1) { 
                                    foreach ($banimages1 as $file) { 
                                        $file_type = wp_check_filetype($file);
                                        if (in_array($file_type['ext'], array('jpg', 'jpeg', 'png', 'gif', 'webp'))) {?>
                            <div class="swiper-slide">
                                <div class="card-container"
                                    style="background-image: url(<?php echo esc_url($file); ?>);cursor:pointer;"
                                    onclick="window.location.href='<?php the_permalink(); ?>'">
                                </div>
                            </div>
                            <?php } } } ?>
                        </div>
                        <div class="card_slider swiper-button-prev"></div>
                        <div class="card_slider swiper-button-next"></div>
                    </div>

                    <div class="details">
                        <?php 
                            $main_loc_value = get_field('main_location');
                            if ($main_loc_value) { ?>
                        <div class="location">Location: <?php echo $main_loc_value;?></div>
                        <?php } ?>
                        <div class="project-name"><?php the_title();?></div>
                        <?php $Price = get_field('property_price', $post->ID);
                            if ($Price) { 
                                $min_price = $Price['min_price'];
                                
                                if ($min_price >= 10000000) {
                                    $min_price_formatted = number_format($min_price / 10000000, 2) . ' Cr';
                                } elseif ($min_price >= 100000) {
                                    $min_price_formatted = number_format($min_price / 100000, 2) . ' Lacs';
                                } elseif($min_price >= 1000) {
                                    $min_price_formatted = number_format($min_price / 1000, 2) . ' K';
                                }?>

                        <?php
					$button_value = get_field('price_on_request',$post->ID);
					if($button_value == 'Show'){ ?>
                        <div class="price">Starts From
                            <span>₹ <?php echo $min_price_formatted;?></span>
                        </div>
                        <?php }elseif($button_value == 'Hide'){?>
                        <div class="price">
                            <span>Price on request</span>
                        </div>
                        <?php } } ?>


                        <?php $poss_date = get_field_object('possession_date',$post->ID);
                            if($poss_date) { 
                                // $date = DateTime::createFromFormat('d/m/Y', $poss_date['value']);
                                // $formatted_date = $date->format('F Y');?>
                        <div class="possession">Possession: <?php echo $poss_date['value'];?></div>
                        <?php } ?>
                    </div>
                </div>

                <?php } } 
                    wp_reset_postdata(); ?>

            </div>
            <a class="in_btn" href="<?php echo site_url('/new-launches/');?>">Show More</a>
        </div>
    </section>
    <!-- Poperty section end -->



    <!-- Trending section start -->
    <section class="poperty trending _in" data-aos="fade-up" data-aos-duration="1200">
        <div class="container show_new_btn">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="section_title">
                        <h2 class="section_title__heading comm_heading">
                            <?php echo get_field('trending_heading',$post->ID);?></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                    $args = array(
                        'post_type'      => 'property',
                        'posts_per_page' => 6,
                        'post_status'    => 'publish',
                        'meta_key'       => 'property_views',
                        'orderby'        => 'meta_value_num',
                        'order'          => 'DESC',
                    );

                    $trn_Property = new WP_Query($args);

                    if ($trn_Property->have_posts()) {
                        while ($trn_Property->have_posts()) {
                            $trn_Property->the_post(); 
                            $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
                            $banimages = get_field('main_image_gallery', $post->ID);
                ?>

                <div class="col-lg-4 col-md-6 mb-3 position-relative new_card ">
                    <!-- Featured And Sale SHOW Section Start -->
                    <?php 
                        $prop_tags = get_field('property_tag', $post->ID);
                        if ($prop_tags) { ?>
                    <div class="offer_box _in">
                        <?php foreach ($prop_tags as $tag) { ?>
                        <span class="offer"><?php echo esc_html($tag);?></span>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <!-- Featured And Sale SHOW Section End -->

                    <div class="swiper card_slider">
                        <div class="swiper-wrapper">

                            <?php if (! $banimages){ ?>
                            <div class="swiper-slide">
                                <div class="card-container"
                                    style="background-image: url(<?php echo esc_url($featured_image); ?>); cursor: pointer;"
                                    onclick="window.location.href='<?php the_permalink(); ?>'">
                                </div>
                            </div>
                            <?php } ?>


                            <?php if ($banimages) { 
                                    foreach ($banimages as $file) { 
                                        $file_type = wp_check_filetype($file);
                                        if (in_array($file_type['ext'], array('jpg', 'jpeg', 'png', 'gif', 'webp'))) {?>
                            <div class="swiper-slide">
                                <div class="card-container"
                                    style="background-image: url(<?php echo esc_url($file); ?>);cursor:pointer;"
                                    onclick="window.location.href='<?php the_permalink(); ?>'">
                                </div>
                            </div>
                            <?php } } } ?>
                        </div>
                        <div class="card_slider swiper-button-prev"></div>
                        <div class="card_slider swiper-button-next"></div>
                    </div>

                    <div class="details">
                        <?php 
                            $main_loc_value = get_field('main_location');
                            if ($main_loc_value) { ?>
                        <div class="location">Location: <?php echo $main_loc_value;?></div>
                        <?php } ?>
                        <div class="project-name"><?php the_title();?></div>
                        <?php $Price = get_field('property_price', $post->ID);
                            if ($Price) { 
                                $min_price = $Price['min_price'];
                                
                                if ($min_price >= 10000000) {
                                    $min_price_formatted = number_format($min_price / 10000000, 2) . ' Cr';
                                } elseif ($min_price >= 100000) {
                                    $min_price_formatted = number_format($min_price / 100000, 2) . ' Lacs';
                                } elseif($min_price >= 1000) {
                                    $min_price_formatted = number_format($min_price / 1000, 2) . ' K';
                                }?>
                        <?php
					$button_value = get_field('price_on_request',$post->ID);
					if($button_value == 'Show'){ ?>
                        <div class="price">Starts From
                            <span>₹ <?php echo $min_price_formatted;?></span>
                        </div>
                        <?php }elseif($button_value == 'Hide'){?>
                        <div class="price">
                            <span>Price on request</span>
                        </div>
                        <?php } } ?>
                        <?php $poss_date = get_field_object('possession_date',$post->ID);
                            if($poss_date) { 
                                // $date = DateTime::createFromFormat('d/m/Y', $poss_date['value']);
                                // $formatted_date = $date->format('F Y');?>
                        <div class="possession">Possession: <?php echo $poss_date['value'];?></div>
                        <?php } ?>
                    </div>
                </div>

                <?php } } 
                    wp_reset_postdata(); ?>

            </div>
            <a class="in_btn" href="<?php echo site_url('/trending-property/');?>">Show More</a>
        </div>
    </section>
    <!-- Trending section end -->


    <!-- Trending section start -->
    <!-- <section class="poperty trending _in" data-aos="fade-up" data-aos-duration="1200">
        <div class="container show_new_btn">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="section_title">
                        <h2 class="section_title__heading comm_heading">
                            <?php echo get_field('trending_heading',$post->ID);?></h2>
                        <p class="section_title__desc comm_sub_heading">
                            <?php echo get_field('trending_description',$post->ID);?></p>
                    </div>
                </div>
            </div>

            <div class="row">
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
                            $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
                ?>

                <div class="col-lg-4 col-md-6 mb-3">

                    <div class="card-container"
                        style="background-image: url(<?php echo $featured_image;?>);cursor:pointer;"
                        onclick="window.location.href='<?php the_permalink(); ?>'">
                        <div class="details">
                            <?php 
                            $main_loc_value = get_field('main_location');
                            if ($main_loc_value) { ?>
                            <div class="location">Location: <?php echo $main_loc_value;?></div>
                            <?php } ?>
                            <div class="project-name"><?php the_title();?></div>
                            <?php $Price = get_field('property_price', $post->ID);
                            if ($Price) { 
                                $min_price = $Price['min_price'];
                                
                                if ($min_price >= 10000000) {
                                    $min_price_formatted = number_format($min_price / 10000000, 2) . ' Cr';
                                } elseif ($min_price >= 100000) {
                                    $min_price_formatted = number_format($min_price / 100000, 2) . ' Lacs';
                                } elseif($min_price >= 1000) {
                                    $min_price_formatted = number_format($min_price / 1000, 2) . ' K';
                                }?>
                            <div class="price">Starts From
                                <span>₹ <?php echo $min_price_formatted;?></span>
                            </div>
                            <?php } ?>
                            <?php $poss_date = get_field_object('possession_date',$post->ID);
                            if($poss_date) { 
                                // $date = DateTime::createFromFormat('d/m/Y', $poss_date['value']);
                                // $formatted_date = $date->format('F Y');?>
                            <div class="possession">Possession: <?php echo $poss_date['value'];?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <?php } } 
                    wp_reset_postdata(); ?>

            </div>

            <a class="in_btn" href="<?php echo site_url('/trending-property/');?>">Show More</a>

            <div class="row">
                <div class="col-md-12">
                    <div class="slider_sec">
                        <button class="next_trend trending_left">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>

                        <button class="prev_trend trending_right">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <div class="swiper-container trend_slider trend_nw_slider ">
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

    </section> -->
    <!-- Trending section end -->


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
                <div class="slider_sec ft_categori">
                    <?php if (have_rows('category_repeater', $post->ID)) { ?>
                    <div class="row">
                        <?php while (have_rows('category_repeater', $post->ID)) {
                        the_row(); ?>
                        <div class="col-md-3">
                            <a href="<?php echo get_sub_field('category_url'); ?>">
                                <div class="_box">
                                    <img src="<?php echo get_sub_field('images'); ?>" alt="" />
                                    <span><?php echo get_sub_field('title'); ?></span>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Category section end -->




    <!-- Location Section start -->
    <section class="location_prop" data-aos="fade-up" data-aos-duration="1200">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h2 class="section_title__heading comm_heading">
                            <?php echo get_field('location_heading',$post->ID);?></h2>
                        <p class="section_title__desc comm_sub_heading">
                            <?php echo get_field('location_description',$post->ID);?></p>
                    </div>
                </div>
            </div>


            <!-- <div class="location_box_wrap">
                <div class="chrismas_light_tab">
                    <div class="text-center">
                        <?php
                        $categories = get_categories(array(
                            'taxonomy' => 'property-category', 
                            'hide_empty' => false,
                        )); ?>
                        <ul class="nav nav-pills mb-2 mt-4 d-flex justify-content-center" id="pills-tab" role="tablist">
                            <?php if (!empty($categories)) {
                                $i = 1;
                                foreach ($categories as $category) {
                            ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo ($i == 1) ? 'active' : ''; ?>"
                                    id="pills-<?php echo $category->slug; ?>-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-<?php echo $category->slug; ?>" type="button" role="tab"
                                    aria-controls="pills-<?php echo $category->slug; ?>"
                                    aria-selected="true"><?php echo $category->name; ?></button>
                            </li>
                            <?php $i++; } } ?>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <?php
                        if (!empty($categories)) {
                            $i = 1;
                            foreach ($categories as $category) {
                        ?>
                        <div class="tab-pane fade <?php echo ($i == 1) ? 'show active' : ''; ?>"
                            id="pills-<?php echo $category->slug; ?>" role="tabpanel"
                            aria-labelledby="pills-<?php echo $category->slug; ?>-tab">
                            <div class="row">
                                <?php
                                $all_locations = [];

                                $args = [
                                    'post_type'      => 'property',
                                    'posts_per_page' => -1,
                                    'post_status'    => 'publish',
                                    'tax_query'      => [
                                        [
                                            'taxonomy' => 'property-category',
                                            'field'    => 'slug',
                                            'terms'    => $category->slug,
                                        ],
                                    ],
                                ];

                                $property_query = new WP_Query($args);

                                if ($property_query->have_posts()) {
                                    while ($property_query->have_posts()) {
                                        $property_query->the_post();

                                        $locations = get_field('main_location');
                                        if ($locations) {
                                            $locations = is_array($locations) ? $locations : [$locations];

                                            foreach ($locations as $location) {
                                                if (!isset($all_locations[$location])) {
                                                    $all_locations[$location] = 0;
                                                }
                                                $all_locations[$location]++;
                                            }
                                        }
                                    }
                                    wp_reset_postdata();
                                }

                                if (!empty($all_locations)) {
                                    foreach ($all_locations as $location => $count) {
                                        $location_image = '';
                                        if (have_rows('locations', 'options')) {
                                            while (have_rows('locations', 'options')) {
                                                the_row();
                                                $field_location_name = get_sub_field('location_name');
                                                
                                                if ($field_location_name == $location) {
                                                    $location_image = get_sub_field('location_image');
                                                }
                                            }
                                        }
                                    ?>

                                <div class="col-md-4">
                                    <div class="property_card">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="img_box">
                                                    <img src="<?php echo esc_url($location_image); ?>" alt="image">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="cont_box">
                                                    <h3><?php echo esc_html($location); ?></h3>
                                                    <p><?php echo esc_html($count)?> Properties</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                        <?php $i++; } } ?>
                    </div>
                </div>
            </div> -->


            <div class="location_box_wrap">
                <div class="chrismas_light_tab">
                    <div class="text-center">
                        <?php
                        $categories = get_categories(array(
                            'taxonomy' => 'property-category', 
                            'hide_empty' => false,
                        )); ?>
                        <ul class="nav nav-pills mb-2 mt-4 d-flex justify-content-center" id="pills-tab" role="tablist">
                            <?php if (!empty($categories)) {
                                    $i = 1;
                                    foreach ($categories as $category) {
                                ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo ($i == 6) ? 'active' : ''; ?>"
                                    id="pills-<?php echo $category->slug; ?>-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-<?php echo $category->slug; ?>" type="button" role="tab"
                                    aria-controls="pills-<?php echo $category->slug; ?>"
                                    aria-selected="true"><?php echo $category->name; ?></button>
                            </li>
                            <?php $i++; } } ?>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <?php
                        if (!empty($categories)) {
                            $i = 1;
                            foreach ($categories as $category) {
                        ?>
                        <div class="tab-pane fade <?php echo ($i == 6) ? 'show active' : ''; ?>"
                            id="pills-<?php echo $category->slug; ?>" role="tabpanel"
                            aria-labelledby="pills-<?php echo $category->slug; ?>-tab">
                            <div class="row">
                                <?php
                    $all_locations = [];

                    $args = [
                        'post_type'      => 'property',
                        'posts_per_page' => -1,
                        'post_status'    => 'publish',
                        'tax_query'      => [
                            [
                                'taxonomy' => 'property-category',
                                'field'    => 'slug',
                                'terms'    => $category->slug,
                            ],
                        ],
                    ];

                    $property_query = new WP_Query($args);

                    if ($property_query->have_posts()) {
                        while ($property_query->have_posts()) {
                            $property_query->the_post();

                            $locations = get_field('main_location');
                            if ($locations) {
                                $locations = is_array($locations) ? $locations : [$locations];

                                foreach ($locations as $location) {
                                    if (!isset($all_locations[$location])) {
                                        $all_locations[$location] = 0;
                                    }
                                    $all_locations[$location]++;
                                }
                            }
                        }
                        wp_reset_postdata();
                    }

                    if (!empty($all_locations)) {
                        foreach ($all_locations as $location => $count) {
                            $location_image = '';
                            if (have_rows('locations', 'options')) {
                                while (have_rows('locations', 'options')) {
                                    the_row();
                                    $field_location_name = get_sub_field('location_name');

                                    if ($field_location_name == $location) {
                                        $location_image = get_sub_field('location_image');
                                    }
                                }
                            }

                            $location_slug = sanitize_title($location);
                            $location_link = site_url('/location/' . $location_slug);
                        ?>
                                <div class="col-md-4">
                                    <a href="<?php echo esc_url(home_url('/location/?location=' . urlencode($location) . '&category=' . urlencode($category->slug))); ?>"
                                        class="property_card">


                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="img_box">
                                                    <img src="<?php echo esc_url($location_image); ?>" alt="image">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="cont_box">
                                                    <h3><?php echo esc_html($location); ?></h3>
                                                    <p><?php echo esc_html($count); ?> Properties</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <?php } } ?>
                            </div>
                        </div>
                        <?php $i++; } } ?>
                    </div>
                </div>
            </div>



            <!-- <div class="location_box_wrap">
                <div class="chrismas_light_tab">
                    <div class="text-center">
                    <?php
                        $categories = get_categories(array(
                            'taxonomy' => 'property-category', 
                            'hide_empty' => false,
                        )); ?>
                        <ul class="nav nav-pills mb-2 mt-4 d-flex justify-content-center" id="pills-tab" role="tablist">
                            <?php if(!empty($categories)) {
                                $i=1;
                                foreach($categories as $category){
                            ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo ($i==1)? 'active':'';?>"
                                    id="pills-<?php echo $category->slug; ?>-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-<?php echo $category->slug; ?>" type="button" role="tab"
                                    aria-controls="pills-<?php echo $category->slug; ?>"
                                    aria-selected="true"><?php echo $category->name;?>(<?php echo $category->count;?>)</button>
                            </li>
                            <?php $i++; } } ?>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <?php
                        if (!empty($categories)) {
                            $i = 1;
                            foreach ($categories as $category) {
                        ?>
                        <div class="tab-pane fade <?php echo ($i == 1) ? 'show active' : ''; ?>"
                            id="pills-<?php echo $category->slug; ?>" role="tabpanel"
                            aria-labelledby="pills-<?php echo $category->slug; ?>-tab">
                            <div class="row">
                                <?php
                                $all_locations = [];

                                $args = [
                                    'post_type'      => 'property',
                                    'posts_per_page' => -1, 
                                    'post_status'    => 'publish',
                                ];

                                $property_query = new WP_Query($args);

                                if ($property_query->have_posts()) {
                                    while ($property_query->have_posts()) {
                                        $property_query->the_post();

                                        $locations = get_field('main_location');
                                        if ($locations) {
                                            $locations = is_array($locations) ? $locations : [$locations];

                                            $all_locations = array_merge($all_locations, $locations);
                                        }
                                    }
                                    wp_reset_postdata(); 
                                }

                                $unique_locations = array_unique($all_locations);

                                if (!empty($unique_locations)) {
                                    foreach ($unique_locations as $location) {
                                        echo '<div class="col-md-4">
                                                <div class="property_card">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="img_box">
                                                                <img src="http://192.168.1.254/project/2023/part2/pioneer_property/wp-content/uploads/2024/07/prop_1.png"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="cont_box">
                                                                <h3>' . esc_html($location) . '</h3>
                                                                <p> 10 Properties</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                    } 
                                } ?>
                            </div>
                        </div>
                        <?php $i++; } } ?>
                    </div>
                </div>

            </div> -->

        </div>
    </section>
    <!-- Location Section end -->

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

                        <button class="prev_blog blog_left">

                            <i class="fa-solid fa-chevron-left"></i>

                        </button>

                        <button class="next_blog blog_right">

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
    <section class="contact contact_home" data-aos="fade-up" data-aos-duration="1200">

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

    <!-- Partner Developers section start -->
    <section class="partner_developer blog partner_dev" data-aos="fade-up" data-aos-duration="1200">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h2 class="section_title__heading comm_heading">
                            <?php echo get_field('developer_heading',$post->ID);?></h2>
                        <p class="section_title__desc comm_sub_heading">
                            <?php echo get_field('developer_description',$post->ID);?>

                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="slider_sec">
                        <button class="prev_blog blog_left">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="next_blog blog_right">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                        <div class="swiper-container blog_slider">
                            <div class="swiper-wrapper">
                                <?php
                                $args = array(
                                    'post_type' => 'partners',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                );
                                $partner_post = new WP_Query($args);

                                if ($partner_post->have_posts()) {
                                    while ($partner_post->have_posts()) {
                                        $partner_post->the_post(); 
                                ?>
                                <div class="swiper-slide">
                                    <a href="<?php the_permalink();?>">
                                        <div class="property_card mb-0">
                                            <div class="img_box">
                                                <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                                <img src="<?php echo $featured_image;?>" alt="" />
                                            </div>
                                            <!-- <div class="cont_box">
                                                <h3><?php the_title();?></h3>
                                                <p> <?php echo wp_trim_words( get_the_content(), 15, '...');?></p>
                                            </div> -->
                                        </div>
                                    </a>
                                </div>
                                <?php } } 
                                    wp_reset_postdata();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Partner Developers section end -->


    <!-- Partner section start -->
    <section class="partner" data-aos="fade-up" data-aos-duration="1200">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h2 class="section_title__heading comm_heading mb-0">
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


    <!-- Great Place to Work section start -->
    <section class="grtplce_towork" data-aos="fade-up" data-aos-duration="1200"
        style="background-image: url(<?php echo get_field('great_place_images',$post->ID);?>)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="grtplce_towork_txt">
                        <h2><?php echo get_field('great_place_to_worl_text',$post->ID);?></h2>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <div class="grtplce_towork_img">
                        <span><img src="<?php echo get_field('great_place_logo',$post->ID);?>" alt=""></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Great Place to Work section end -->


</main>

<script>
function formatAmount(value) {
    if (value >= 10000000) {
        return (value / 10000000).toFixed(2) + 'Cr';
    } else if (value >= 100000) {
        return (value / 100000).toFixed(2) + 'L';
    }
    return value; // No formatting for values below 1 Lakh
}

document.getElementById('loan-amount').addEventListener('input', function() {
    var value = this.value;
    document.getElementById('loan-amount-value').textContent = formatAmount(value);
});

// document.getElementById('loan-amount').addEventListener('input', function() {
//     var value = this.value;
//     document.getElementById('loan-amount-value').textContent = value;
// });
</script>



<?php 

get_footer();?>


<script>
jQuery(document).ready(function($) {
    const selectBhk = $(".nice-select.nice_select.more_option.select_bhk");
    const selectType = $(".nice-select.nice_select.more_option.select_type");
    selectBhk.hide();
    selectType.hide();

    $(document).on("click", ".nice-select.category.areas .option", function() {
        var selectedCategory = $(this).attr("data-value");

        if (selectedCategory === "residential") {
            selectBhk.show();
            selectType.hide();
        } else if (selectedCategory !== "") {
            selectBhk.hide();
            selectType.show();
        } else {
            selectBhk.hide();
            selectType.hide();
        }
    });
});
</script>



<!-- <script>
$(document).ready(function() {
    $(document).on("click", ".nice-select.category.areas .option", function() {
        var categoryWiseData = [{
                category: 'residential',
                types: ['1 BHK', '2 BHK', '3 BHK', '4 BHK', '5 BHK', '6 BHK', '8 BHK', 'Duplex',
                    'Triplex', 'Penthouse', 'Studio'
                ]
            },
            {
                category: 'commercial',
                types: ['Office-IT-ITes', 'Mall-Shopping Complex', 'Retail Hi-Street']
            },
            {
                category: 'warehouse',
                types: ['Warehouse', 'Factoryshed']
            },
            {
                category: 'land',
                types: ['Residential Project', 'Commercial', 'Industrial']
            },
            {
                category: 'bungalow',
                types: ['Bungalow']
            },
            {
                category: 'prelease',
                types: ['new']
            }
        ];

        var selectedValue = $(this).attr("data-value");
        const newValue = categoryWiseData.filter((value) => value.category == selectedValue);
        const finalValue = newValue ? newValue[0].types : [];
        var $targetDropdown = $(".nice-select.nice_select.more_option.select_bhk");
        var optionsHtml = finalValue.map(type => `<li data-value="${type}" class="option">${type}</li>`)
            .join("");
        $targetDropdown.find("ul.list").html(optionsHtml);
        if (finalValue.length > 0) {
            $targetDropdown.find("span.current").text(finalValue[0]);
        } else {
            $targetDropdown.find("span.current").text("Select Specification");
        }
    });
});
</script> -->