<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pioneer_property
 */

?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <!-- <title>Pioneer</title> -->
    <?php wp_head(); ?>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!-- CSS ============================================ -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/scss/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/scss/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/scss/aos.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/scss/nice-select.css" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/scss/style.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/scss/common.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/scss/responsive.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php if(!is_404( )) { ?>

    <!-- Header Start  -->
    <?php $class = is_singular('property') ? "details_header" : ""; ?>
    <div id="header" class="section header-section header-section_in mb-0 <?php echo $class;?>">
        <div class="container-fluid">
            <div class="common_wrapper">
                <!-- Header Wrap Start  -->
                <div class="header-wrap">
                    <div class="header-logo">
                        <a href="<?php echo site_url();?>"><img src="<?php echo get_field('site_logo','option');?>"
                                alt="" /></a>
                    </div>

                    <?php if(!is_front_page() && !is_tax('property-category') && !is_archive() && !is_singular('post') && !is_singular('partners') && !is_page( array( 'login', 'register', 'profile', 'account', 'members', 'user' ) )) { ?>

                    <form action="<?php echo site_url('/property/');?>" method="get" class="adv_search">
                        <div class="search-bar">

                            <select name="location" id="location" class="nice_select">
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

                            <select name="category" id="category" class="nice_select">
                                <option value="">Type of property</option>
                                <?php foreach ($cats as $cat) { ?>
                                <option value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option>
                                <?php } ?>
                            </select>


                            <input class="searchInput" type="text" placeholder="Search..." name="prop_name" />

                            <button type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>

                    <?php } ?>

                    <!-- Header Meta Start -->
                    <div class="header-meta">
                        <!-- Header Social Start -->
                        <div class="header-social d-none d-xl-block">
                            <ul>
                                <?php 
								if(have_rows('social_buttons','options')) {
									while(have_rows('social_buttons','options')) {
										the_row(); ?>
                                <li>
                                    <a
                                        href="<?php echo get_sub_field('link','options');?>"><?php echo get_sub_field('icon','options');?><span><?php echo get_sub_field('value','options');?></span></a>
                                </li>
                                <?php } } ?>
                                <li><a class="in_btn" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Contact Us</a></li>
                                <!-- <li>
                                    <a href="<?php echo site_url('/login/');?>" class="in_btn">Login </a>
                                </li> -->
                                <li>
                                    <?php if ( is_user_logged_in() ) { ?>
                                    <a href="<?php echo site_url('/logout/'); ?>" class="in_btn">Logout</a>
                                    <?php } else { ?>
                                    <a href="<?php echo site_url('/login/'); ?>" class="in_btn">Login</a>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <!-- Header Social End -->

                        <!-- Header Toggle Start -->
                        <div class="header-toggle">
                            <a href="<?php echo site_url();?>" class="me-3"><i class="fa-solid fa-house"></i></a>

                            <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <?php } ?>

    <!-- Offcanvas Start-->
    <div class="offcanvas offcanvas-start" id="offcanvasExample">
        <div class="offcanvas-header">
            <!-- Offcanvas Logo Start -->
            <div class="offcanvas-logo">
                <a href="<?php echo site_url();?>"><img src="<?php echo get_field('offcanvas_logo','option');?>"
                        alt="" /></a>
            </div>
            <!-- Offcanvas Logo End -->
            <button type="button" class="close-btn" data-bs-dismiss="offcanvas">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Offcanvas Body Start -->
        <div class="offcanvas-body">
            <div class="offcanvas-menu">
                <ul class="main-menu">
                    <?php
                    if ( has_nav_menu( 'menu-1' ) ) {

                        wp_nav_menu(
                            array(
                                'container'  => '',
                                'items_wrap' => '%3$s',
                                'theme_location' => 'menu-1',
                                'menu'   => 'Main Menu',
                                'walker' => new Custom_Walker_Nav_Menu(), 
                            )
                        );
                        
                    } ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Offcanvas End -->



    <!-- contact modal  -->

    <div class="modal fade cnct_modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Contact Us</h1>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <?php echo do_shortcode( '[contact-form-7 id="bbc030e" title="Header Contact Us CF"]' );?>
                </div>

            </div>
        </div>
    </div>