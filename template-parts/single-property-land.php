<?php



echo "For Land"; ?>



<!-- Trending section start -->
<section class="poperty trending" id="related_prop">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title">
                    <h2 class="section_title__heading comm_heading"> Similar Properties </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="slider_sec">
                    <button class="prev_trend new_launch_left">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="next_trend new_launch_right">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                    <div class="swiper-container trend_slider launches_nw_slider">
                        <div class="swiper-wrapper">
                            <?php
                                $current_location = get_field('main_location'); 
                                $args = array(
                                    'post_type' => 'property',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'main_location', 
                                            'value' => $current_location,
                                            'compare' => '='
                                        )
                                    ),
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
</section>
<!-- Trending section end -->