 <!-- Details section start -->
 <section class="prop_details">
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
                         <button id="download-brochure" class="in_btn w-auto" data-bs-toggle="modal"
                             data-bs-target="#dnldModal">
                             Download Brochure
                         </button>
                     </div>
                 </div>
                 <div class="property-details" id="property_details">
                     <div class="details mb-0">

                         <div class="details_inner" id="details_inner">
                             <h5><?php the_title();?></h5>
                             <div id="nav_tab_desc"><?php the_content();?></div>
                             <ul class="d-flex flex-wrap justify-content-evenly align-items-center" id="nav_tab">
                                 <li class="gal_li">
                                     <a href="#overview"
                                         class="in_btn"><?php echo get_field('overview_heading',$post->ID);?></a>
                                 </li>
                                 <li class="gal_li">
                                     <a href="#plocation"
                                         class="in_btn"><?php echo get_field('location_heading',$post->ID);?></a>
                                 </li>
                                 <li class="gal_li">
                                     <a href="#amenities"
                                         class="in_btn"><?php echo get_field('aminities_heading',$post->ID);?></a>
                                 </li>
                                 <li class="gal_li">
                                     <a href="#specification"
                                         class="in_btn"><?php echo get_field('specification_heading',$post->ID);?></a>
                                 </li>
                                 <li class="gal_li">
                                     <a href="#floor_Plans"
                                         class="in_btn"><?php echo get_field('floor_plan_heading',$post->ID);?></a>
                                 </li>
                                 <li class="gal_li">
                                     <a href="#price_sec"
                                         class="in_btn"><?php echo get_field('price_heading',$post->ID);?></a>
                                 </li>
                                 <li class="gal_li">
                                     <a href="#gallery_sec"
                                         class="in_btn"><?php echo get_field('gallery_heading',$post->ID);?></a>
                                 </li>
                             </ul>


                             <!---------- Overview Section ---------->
                             <div class="overview" id="overview">
                                 <div class="pdb  feature details_sec">
                                     <h6 class="top"><?php echo get_field('overview_heading',$post->ID);?>
                                     </h6>
                                     <div class="area-in">
                                         <div class="row">
                                             <div class="col-md-6 mb-3">
                                                 <div class="area-ott">
                                                     <?php
                                                    $land = get_field('land_area',$post->ID);
                                                    $comp_date = get_field('possession_date',$post->ID);?>
                                                     <ul>
                                                         <li>Land Area : <span><?php echo $land; ?></span>
                                                         </li>
                                                         <li>Completion
                                                             Date:<span><?php echo $comp_date; ?></span>
                                                         </li>
                                                     </ul>

                                                 </div>
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                 <div class="area-ott">
                                                     <?php 
                                                        $no_of_tower = get_field('no_of_tower',$post->ID);
                                                        $open_space = get_field('open_space',$post->ID);
                                                        if($no_of_tower && $open_space) { ?>
                                                     <ul>
                                                         <li>No. of Tower :
                                                             <span><?php echo $no_of_tower;?></span>
                                                         </li>
                                                         <li>Open Space :
                                                             <span><?php echo $open_space;?></span>
                                                         </li>
                                                     </ul>
                                                     <?php } ?>
                                                 </div>
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                 <div class="area-ott">
                                                     <?php 
                                                        $height_of_tower = get_field('height_of_tower',$post->ID);                                                    
                                                        if($height_of_tower && have_rows('room_specification',$post->ID)) { ?>
                                                     <ul>
                                                         <li>Height of Tower :
                                                             <span><?php echo $height_of_tower;?></span>
                                                         </li>
                                                         <li>Size :
                                                             <?php 
                                                                while(have_rows('room_specification',$post->ID)) { 
                                                                    the_row(); ?>
                                                             <span><?php echo get_sub_field('capacity');?>
                                                                 <?php echo get_sub_field('size');?></span>
                                                             <?php } ?>
                                                         </li>
                                                     </ul>
                                                     <?php } ?>
                                                 </div>
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                 <div class="area-ott">
                                                     <?php 
                                                        $no_of_apartmrnt = get_field('no_of_apartments',$post->ID);                                                    
                                                        if($no_of_apartmrnt && have_rows('room_specification',$post->ID)) { ?>
                                                     <ul>
                                                         <li>No. of Apartments :
                                                             <span><?php echo $no_of_apartmrnt;?></span>
                                                         </li>
                                                         <li>
                                                             Price :
                                                             <?php 
                                                                while(have_rows('room_specification',$post->ID)) { 
                                                                    the_row(); ?>
                                                             <span><?php echo get_sub_field('capacity');?>
                                                                 <?php echo get_sub_field('price');?></span>
                                                             <?php } ?>
                                                         </li>
                                                     </ul>
                                                     <?php } ?>
                                                 </div>
                                             </div>
                                             <div class="col-md-6 mb-3">
                                                 <div class="area-ott">
                                                     <ul>
                                                         <li class="project_rera">Rera No. :
                                                             <span><?php echo get_field('property_rera_no',$post->ID); ?></span>
                                                         </li>
                                                     </ul>
                                                 </div>
                                             </div>

                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <!---------- Location Section ---------->
                             <div class="location" id="plocation">
                                 <div class="pdb feature location_sec">
                                     <h6 class="top"><?php echo get_field('location_heading',$post->ID);?>
                                     </h6>
                                     <div class="area-container">
                                         <div class="row">
                                             <div class="col-md-12">
                                                 <div class="area-card">
                                                     <?php echo get_field('map_location_iframe',$post->ID);?>
                                                 </div>
                                             </div>
                                             <?php 
                                                if(have_rows('location_card',$post->ID)) { 
                                                    while(have_rows('location_card',$post->ID)){ 
                                                        the_row(); ?>
                                             <div class="col-md-6 mb-4">
                                                 <div class="area-card">
                                                     <div class="icon education">
                                                         <?php echo get_sub_field('icons');?>
                                                     </div>
                                                     <h5><?php echo get_sub_field('headings');?></h5>
                                                     <ul>
                                                         <?php 
                                                        if(have_rows('landmark_repeater',$post->ID)) { 
                                                            while(have_rows('landmark_repeater',$post->ID)){ 
                                                                the_row(); ?>
                                                         <li>
                                                             <span><?php echo get_sub_field('nearest_landmark');?></span><em><?php echo get_sub_field('distance');?></em>
                                                         </li>
                                                         <?php } } ?>
                                                     </ul>
                                                 </div>
                                             </div>
                                             <?php } } ?>

                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <!---------- Amenities Section ---------->
                             <div class="pdb feature amenity" id="amenities">
                                 <h6 class="top"><?php echo get_field('aminities_heading',$post->ID);?></h6>
                                 <div class="row mt-4">
                                     <div class="red-ftr">
                                         <div class="red-ftr-flx">
                                             <div class="row">
                                                 <?php 
                                                    if(have_rows('amenities_repeater',$post->ID)) {
                                                        while(have_rows('amenities_repeater',$post->ID)){
                                                            the_row(); ?>
                                                 <div class="col-md-3 col-sm-6 box-re">
                                                     <div class="bx-pic">
                                                         <img alt="Badminton Court"
                                                             src="<?php echo get_sub_field('images');?>" />
                                                     </div>
                                                     <div class="bx-txt">
                                                         <h4><?php echo get_sub_field('aminities_name');?>
                                                         </h4>
                                                     </div>
                                                 </div>
                                                 <?php } } ?>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <!---------- Specification Section ---------->
                             <div class="specification pdb feature" id="specification">
                                 <h6 class="top"><?php echo get_field('specification_heading',$post->ID);?>
                                 </h6>
                                 <div class="red-ftr">
                                     <div class="am-decp-flx">
                                         <div class="row">
                                             <?php 
                                                if(have_rows('specification_repeater',$post->ID)) {
                                                    while(have_rows('specification_repeater',$post->ID)){
                                                        the_row(); ?>
                                             <div class="col-md-6 ftr-inn">
                                                 <div class="area-ott">
                                                     <h4><?php echo get_sub_field('sp_headings');?></h4>
                                                     <ul>
                                                         <?php
                                                            if(have_rows('sp_data_repeater',$post->ID)) {
                                                                while(have_rows('sp_data_repeater',$post->ID)){
                                                                    the_row(); ?>
                                                         <li><?php echo get_sub_field('sp_data');?></li>
                                                         <?php } } ?>
                                                     </ul>
                                                 </div>
                                             </div>
                                             <?php } } ?>

                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <!---------- Floor-Plan Section ---------->
                             <div class="pdb feature" id="floor_Plans">
                                 <h6 class="top"><?php echo get_field('floor_plan_heading', $post->ID); ?>
                                 </h6>
                                 <?php if (have_rows('floor_plans_repeater', $post->ID)) { ?>
                                 <div class="section floor-plans">
                                     <nav class="mb-4">
                                         <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                             <?php 
                                                $i = 1;
                                                while (have_rows('floor_plans_repeater', $post->ID)) { 
                                                    the_row(); ?>
                                             <button class="nav-link <?php echo ($i == 1) ? "active" : ""; ?>"
                                                 id="nav-home-tab" data-bs-toggle="tab"
                                                 data-bs-target="#floor_plan<?php echo $i; ?>" type="button" role="tab"
                                                 aria-controls="nav-home" aria-selected="true">
                                                 <?php echo get_sub_field('floor_plan_specification'); ?>
                                             </button>
                                             <?php $i++; } ?>
                                         </div>
                                     </nav>
                                     <div class="tab-content" id="nav-tabContent">
                                         <?php 
                                            $j = 1;
                                            while (have_rows('floor_plans_repeater', $post->ID)) { 
                                                the_row(); 
                                                $fpimages = get_sub_field('floor_gallery'); ?>
                                         <div class="tab-pane fade <?php echo ($j == 1) ? "show active" : ""; ?>"
                                             id="floor_plan<?php echo $j; ?>" role="tabpanel"
                                             aria-labelledby="first-tab" tabindex="0">

                                             <div class="row" id="withLogin" style="display: none;">
                                                 <?php if ($fpimages) { 
                                                    foreach ($fpimages as $image) { ?>
                                                 <div class="col-md-3 col-6 mb-3">
                                                     <div class="img_box_login">
                                                         <a href="<?php echo $image; ?>"
                                                             data-fancybox="floor_<?php echo $j;?>" data-caption="">
                                                             <img src="<?php echo $image; ?>" alt="" />
                                                         </a>
                                                     </div>
                                                 </div>
                                                 <?php } } ?>
                                             </div>

                                             <div class="row" id="withOutLogin">
                                                 <?php if ($fpimages) { 
                                                    foreach ($fpimages as $image) { ?>
                                                 <div class="col-md-3 col-6 mb-3">
                                                     <div class="img_box">
                                                         <a href="<?php echo $image; ?>"
                                                             data-fancybox="floor_<?php echo $j;?>" data-caption="">
                                                             <img class="blrd_img" src="<?php echo $image; ?>" alt="" />
                                                         </a>
                                                         <a class="login_btn" data-bs-toggle="modal"
                                                             data-bs-target="#floorModal" href="javascript:void(0)">
                                                             Click to View
                                                             <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                         </a>
                                                     </div>

                                                 </div>

                                                 <?php } } ?>
                                             </div>
                                         </div>
                                         <?php $j++; } ?>
                                     </div>
                                 </div>
                                 <?php } ?>
                             </div>


                             <!---------- Price Section ---------->
                             <div class="pdb feature price_sec" id="price_sec">
                                 <h6 class="top"><?php echo get_field('price_heading',$post->ID);?></h6>
                                 <div id="outreach4">
                                     <div class="pricing-container">
                                         <?php 
                                            if(have_rows('room_specification',$post->ID)) {
                                                while(have_rows('room_specification',$post->ID)) {
                                                    the_row();?>
                                         <div class="property-card">
                                             <h5><span
                                                     class="icon bhk3"></span><?php echo get_sub_field('capacity',$post->ID);?>
                                             </h5>
                                             <p class="size-price">
                                                 <?php echo get_sub_field('size',$post->ID);?>
                                                 <?php echo get_field('super_build_level',$post->ID);?>
                                             </p>
                                             <p class="price">Price:
                                                 <?php echo get_sub_field('price',$post->ID);?></p>
                                         </div>
                                         <?php } } ?>


                                     </div>
                                     <div class="info-card">
                                         <p>
                                             <?php echo get_field('info_card_note',$post->ID);?>
                                         </p>
                                     </div>
                                     <div class="info-card">
                                         <p>
                                             <?php echo get_field('info_card_nb',$post->ID);?>
                                         </p>
                                     </div>
                                 </div>
                             </div>

                             <!---------- Gallery Section ---------->
                             <div class="pdb  feature" id="gallery_sec">
                                 <h6 class="top"><?php echo get_field('gallery_heading',$post->ID);?></h6>

                                 <ul class="nav nav-pills custom-pills mb-3" id="pills-tab" role="tablist">
                                     <?php if(get_field('project_images')) {?>
                                     <li class="nav-item" role="presentation">
                                         <button class="nav-link active in_btn" id="pills-home-tab"
                                             data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                                             aria-controls="pills-home" aria-selected="true">
                                             <?php $p_img = get_field_object('project_images',$post->ID);
                                                if($p_img) { echo $p_img['label'];}?>
                                         </button>
                                     </li>
                                     <?php } ?>
                                     <?php if(get_field('project_videos')) {?>
                                     <li class="nav-item" role="presentation">
                                         <button class="nav-link in_btn" id="pills-profile-tab" data-bs-toggle="pill"
                                             data-bs-target="#pills-profile" type="button" role="tab"
                                             aria-controls="pills-profile" aria-selected="false">
                                             <?php $p_vid = get_field_object('project_videos',$post->ID);
                                                if($p_vid) { echo $p_vid['label'];}?>
                                         </button>
                                     </li>
                                     <?php } ?>
                                     <?php if(get_field('construction_images')) {?>
                                     <li class="nav-item" role="presentation">
                                         <button class="nav-link in_btn" id="pills-contact-tab" data-bs-toggle="pill"
                                             data-bs-target="#pills-contact" type="button" role="tab"
                                             aria-controls="pills-contact" aria-selected="false">
                                             <?php $c_img = get_field_object('construction_images',$post->ID);
                                                if($c_img) { echo $c_img['label'];}?>
                                         </button>
                                     </li>
                                     <?php } ?>
                                 </ul>

                                 <div class="tab-content" id="pills-tabContent">
                                     <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                         aria-labelledby="pills-home-tab">
                                         <div class="section gallery">
                                             <?php
                                                $proj_img = get_field('project_images',$post->ID);
                                                if($proj_img) {
                                                    foreach($proj_img as $proj_gal){ ?>
                                             <div class="card">
                                                 <div class="card-image">
                                                     <a href="<?php echo $proj_gal;?>" data-fancybox="gallery1">
                                                         <img src="<?php echo $proj_gal;?>" alt="Image Gallery" />
                                                     </a>
                                                 </div>
                                             </div>
                                             <?php } } ?>

                                         </div>
                                     </div>
                                     <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                         aria-labelledby="pills-profile-tab">
                                         <div class="section gallery">
                                             <?php
                                                $proj_vid = get_field('project_videos',$post->ID);
                                                if($proj_vid) {
                                                    foreach($proj_vid as $vid_gal){ ?>
                                             <div class="card">
                                                 <div class="card-image">
                                                     <a href="<?php echo $vid_gal;?>" data-fancybox="gallery2">
                                                         <video autoplay muted loop>
                                                             <source src="<?php echo $vid_gal;?>" type="video/mp4">
                                                         </video>
                                                     </a>
                                                 </div>
                                             </div>
                                             <?php } } ?>

                                         </div>
                                     </div>
                                     <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                         aria-labelledby="pills-contact-tab">
                                         <div class="section gallery">
                                             <?php
                                                $const_img = get_field('construction_images',$post->ID);
                                                if($const_img) {
                                                    foreach($const_img as $const_gal){ ?>
                                             <div class="card">
                                                 <div class="card-image">
                                                     <a href="<?php echo $const_gal;?>" data-fancybox="gallery3">
                                                         <img src="<?php echo $const_gal;?>" alt="Image Gallery" />
                                                     </a>
                                                 </div>
                                             </div>
                                             <?php } } ?>

                                         </div>
                                     </div>
                                 </div>

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



 <!-- emi modal start -->
 <div class="modal fade" id="emiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">EMI Calculator</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="calculator">
                     <div class="row">
                         <div class="col-md-8">
                             <div id="loan-form">
                                 <div class="form-group">
                                     <div class="box">
                                         <label for="loan-amount"> Home Loan Amount </label>
                                         <div class="right">
                                             <p>₹</p>
                                             <input type="text" id="loan-amount-value" value="100000" />
                                         </div>
                                     </div>
                                     <input type="range" id="loan-amount" min="100000" max="20000000" step="10000"
                                         value="500000" />
                                 </div>
                                 <div class="form-group">
                                     <div class="box">
                                         <label for="loan-term"> Loan Tenure </label>
                                         <div class="right">
                                             <div class="tenure-switch">
                                                 <input type="radio" id="tenure-years" name="tenure-type" value="Years"
                                                     checked />
                                                 <label for="tenure-years">Yr</label>
                                                 <input type="radio" id="tenure-months" name="tenure-type"
                                                     value="Months" />
                                                 <label for="tenure-months">Mo</label>
                                             </div>
                                             <input type="text" id="loan-term-value" value="19" />
                                         </div>
                                     </div>

                                     <input type="range" id="loan-term" min="1" max="30" step="1" value="20" />
                                 </div>
                                 <div class="form-group">
                                     <div class="box">
                                         <label for="interest-rate"> Interest Rate </label>
                                         <div class="right">
                                             <p>%</p>
                                             <input type="text" id="interest-rate-value" value="" />
                                         </div>
                                     </div>
                                     <input type="range" id="interest-rate" min="1" max="20" step="0.1" value="7" />
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div id="results" class="results">
                                 <h2>Detailed Calculations</h2>
                                 <div class="calculation-item">
                                     <div class="label">EMI per Month</div>
                                     <div class="value" id="emi"></div>
                                 </div>
                                 <div class="calculation-item">
                                     <div class="label">Total Interest Payable</div>
                                     <div class="value" id="total-interest"></div>
                                 </div>
                                 <div class="calculation-item">
                                     <div class="label">Total Amount Payable</div>
                                     <div class="value" id="total-amount"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- emi modal end -->


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

 <!-- Download Bochure Modal -->
 <div class="modal fade" id="dnldModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Download Brochure</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                         class="fa-regular fa-circle-xmark"></i></button>
             </div>
             <div class="modal-body">
                 <div class="enquiry-form">
                     <?php echo do_shortcode( '[contact-form-7 id="3886b16" title="Download Brochure"]' );?>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- floor plan Modal -->
 <div class="modal fade" id="floorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Submit the form to See the Floor Plan</h5>
                 <button type="button" class="btn-close floorPlan" data-bs-dismiss="modal" aria-label="Close"><i
                         class="fa-regular fa-circle-xmark"></i></button>
             </div>
             <div class="modal-body">
                 <?php echo do_shortcode('[contact-form-7 id="74d38f3" title="Show Floor Plan CF"]');?>
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