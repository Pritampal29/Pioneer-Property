 <!-- Details section start -->
 <section class="prop_details land-main">
     <div class="container">
         <div class="row">
             <div class="col-lg-9">
                 <div class="contact_opener d-lg-none d-block">
                     <button id="ctf_open" class="smooth-blink"><i class="fa-solid fa-headset "></i></button>
                 </div>

                 <!-- New Slider with Image+Video Start -->
                 <div class="details_slider">
                     <div class="swiper mySwiper2">
                         <div class="swiper-wrapper">
                             <?php 
                                $banimages = get_field('main_image_gallery', $post->ID);
                                if ($banimages) { 
                                    foreach ($banimages as $file) { 
                                        $file_extension = pathinfo($file, PATHINFO_EXTENSION);

                                        if (in_array(strtolower($file_extension), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) { ?>
                             <div class="swiper-slide">
                                 <img src="<?php echo esc_url($file); ?>" alt="Gallery Image">
                             </div>
                             <?php } elseif (in_array(strtolower($file_extension), ['mp4', 'webm', 'ogg'])) { ?>
                             <div class="swiper-slide">
                                 <video width="100%" autoplay muted class="video-slide">
                                     <source src="<?php echo esc_url($file); ?>"
                                         type="video/<?php echo esc_attr($file_extension); ?>">
                                 </video>
                             </div>
                             <?php } 
                                    } 
                                } ?>
                         </div>
                         <!-- <div class="swiper-button-next sl_btn"></div>
                            <div class="swiper-button-prev sl_btn"></div> -->
                     </div>

                     <div thumbsSlider="" class="swiper mySwiper">
                         <div class="swiper-wrapper">
                             <?php 
                                $galimages = get_field('main_image_gallery', $post->ID);
                                if ($galimages) { 
                                    foreach ($galimages as $file) { 
                                        $file_extension = pathinfo($file, PATHINFO_EXTENSION);

                                        if (in_array(strtolower($file_extension), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) { ?>
                             <div class="swiper-slide">
                                 <img src="<?php echo esc_url($file); ?>" alt="Thumbnail Image">
                             </div>
                             <?php } elseif (in_array(strtolower($file_extension), ['mp4', 'webm', 'ogg'])) { ?>
                             <div class="swiper-slide">
                                 <video width="100%" height="100%" autoplay muted loop style="object-fit:cover">
                                     <source src="<?php echo esc_url($file); ?>"
                                         type="video/<?php echo esc_attr($file_extension); ?>">
                                 </video>
                             </div>
                             <?php } 
                                    } 
                                } ?>
                         </div>
                     </div>
                 </div>
                 <!-- New Slider with Image+Video Start -->


                 <div class="top_section d-flex justify-content-between align-items-start">
                     <?php
                    $gallery_vid = get_field('project_videos',$post->ID);
                    if( $gallery_vid ) {
                        
                        $first_vid = $gallery_vid[0]; ?>
                     <video controls autoplay muted loop>
                         <source src="<?php echo $first_vid;?>" type="video/mp4">
                     </video>
                     <?php } ?>
                     <div class="d-flex justify-content-between align-items-center">
                         <button class="in_btn" data-bs-toggle="modal" data-bs-target="#enqModal">
                             Book Visit
                         </button>
                     </div>
                 </div>
                 <div class="property-details" id="property_details">
                     <div class="details mb-0">

                         <div class="details_inner" id="details_inner">
                             <h5><?php the_title();?></h5>
                             <div class="loc-dtls-land">
                                 <ul class="d-flex justify-content-center">
                                     <li>
                                         <p>Location: <?php echo get_field('main_location',$post->ID); ?></p>
                                     </li>
                                     <li>
                                         <p>Land Area: <?php echo get_field('land_area',$post->ID); ?></p>
                                     </li>
                                 </ul>
                             </div>
                             <div id="nav_tab_desc"><?php the_content();?></div>

                             <div class="d-flex flex-wrap justify-content-evenly align-items-center"
                                 style="border:unset;" id="nav_tab">

                             </div>

                         </div>
                     </div>
                 </div>
             </div>


             <div class="col-lg-3" id="contact_col">
                 <div class="side_bar" id="side_bar">
                     <span class="d-lg-none" id="close_form"><i class="fa-solid fa-xmark"></i></span>
                     <div class="card">

                         <div class="contact_form">
                             <h3><strong>Are you interested to buy <br><?php the_title();?> ?</strong></h3>
                             <?php echo do_shortcode( '[contact-form-7 id="b67b284" title="Details Page Enq Form"]' );?>
                         </div>

                         <!-- Below Form Section -->

                         <div class="offers_wrap_in">
                             <div class="spl-img va-top hidden-xs bg-img-default bg-img-contain"
                                 style=" background-image:url('<?php echo site_url('/wp-content/uploads/2024/09/5min.dcf63708.png');?>');width: 50px;aspect-ratio: 1;background-position: center;background-size: contain;background-repeat: no-repeat;">
                             </div>
                             <div class="spl-txt-wrap va-middle">
                                 <div class="spl-title va-top">Assured Callback in 5 mins</div>
                                 <ul class="va-top reset-ul offer-ul">
                                     <li class="offer">Get an assured callback in 5 mins from sales expert (9
                                         AM - 6
                                         PM
                                         IST)</li>
                                 </ul>
                             </div>
                         </div>
                         <!-- Below Form Section -->


                         <a class="in_btn w-100 mt-1" style="height:35px" href="<?php echo site_url( '/get-offer/');?>">
                             Get Offer
                             <span class="button__icon-wrapper">
                                 <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 14 15">
                                     <path fill="currentColor"
                                         d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z">
                                     </path>
                                 </svg>

                                 <svg class="button__icon-svg button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg"
                                     width="10" fill="none" viewBox="0 0 14 15">
                                     <path fill="currentColor"
                                         d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z">
                                     </path>
                                 </svg>
                             </span>
                         </a>
                     </div>

                     <?php if(get_field('offer_details',$post->ID)) { ?>
                     <div class="offer_box p-2 mt-3">
                         <img src="<?php echo get_field('offer_details',$post->ID); ?>" alt="">
                     </div>
                     <?php } ?>
                 </div>

             </div>
         </div>


     </div>
 </section>
 <!-- Details section end -->


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
                                $current_post_id = get_the_ID(); 
                                $property_categories = wp_get_post_terms($current_post_id, 'property-category', array('fields' => 'ids'));
                                $args = array(
                                    'post_type'      => 'property',
                                    'post_status'    => 'publish',
                                    'posts_per_page' => -1,
                                    'orderby'        => 'date',
                                    'order'          => 'DESC',
                                    'post__not_in'   => array($current_post_id),
                                    'tax_query'      => array(
                                        array(
                                            'taxonomy' => 'property-category',
                                            'field'    => 'term_id',
                                            'terms'    => $property_categories,
                                        ),
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
                                                        $type_tag = get_field('type_specification');
                                                        if ($type_tag) { ?>
                                                 <i class="fa-solid fa-city"></i><span>
                                                     <?php echo implode(', ', $type_tag); ?></span>
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



 <!-- Book Visit Form Modal -->
 <div class="modal fade" id="enqModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Book Visit</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                         class="fa-regular fa-circle-xmark"></i></button>
             </div>
             <div class="modal-body">
                 <div class="enquiry-form">
                     <?php echo do_shortcode( '[contact-form-7 id="d363397" title="Book Visit CF"]' );?>
                 </div>
             </div>
         </div>
     </div>
 </div>



 <div id="backdrop2" class="backdrop"></div>


 </main>

 <script>
jQuery(document).ready(function($) {
    document.addEventListener('wpcf7mailsent', function(event) {
        if (event.detail.contactFormId == '1300') {
            $('.floorPlan').click();
            $('.tab-content .tab-pane').each(function() {
                $(this).find('#withOutLogin').hide();
                $(this).find('#withLogin').show();
            });
        }
    });
});
 </script>

 <script>
$(document).ready(function() {
    // Check if 'open_modal' exists in the URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('open_modal')) {
        // Click the modal button automatically
        $('#download-brochure').trigger('click');
    }
});
 </script>