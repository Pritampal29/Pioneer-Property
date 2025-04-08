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
    <meta name="robots" content="index, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!-- CSS ============================================ -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="
    https://cdn.jsdelivr.net/npm/gotham-fonts@1.0.3/css/gotham-rounded.min.css
    " rel="stylesheet" />

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

                    <!-- <form class="advname_search" role="search" method="get"
                        action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="search-bar" style="width:400px;">
                            <input class="searchInput" type="text" name="s" placeholder="Search by name...">
                            <input type="hidden" name="post_type" value="property">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form> -->

                    <form class="advname_search" role="search" method="get"
                        action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="search-bar" style="width:350px; position: relative;">
                            <input class="searchInput" id="searchInput" type="text" name="s"
                                placeholder="Search by name...">
                            <input type="hidden" name="post_type" value="property">
                            <div class="srch_icn"><i class="fa-solid fa-magnifying-glass"></i></div>
                            <div id="suggestions" class="suggestion-box"></div>
                        </div>
                    </form>




                    <!-- <form action="<?php echo site_url('/property/');?>" method="get" class="advname_search">
                        <div class="search-bar" style="width:400px;">
                            <input class="searchInput" type="text" placeholder="Search by name..." name="prop_name" />
                            <button type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form> -->



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
                                <!-- <li>
                                    <?php if ( is_user_logged_in() ) { ?>
                                    <a href="<?php echo site_url('/logout/'); ?>" class="in_btn">Logout</a>
                                    <?php } else { ?>
                                    <a href="<?php echo site_url('/login/'); ?>" class="in_btn">Login</a>
                                    <?php } ?>
                                </li> -->
                            </ul>
                        </div>
                        <!-- Header Social End -->

                        <!-- Header Toggle Start -->
                        <div class="header-toggle">
                            <a class="searchIcn d-inline-block d-md-none me-3"><i
                                    class="fa-solid fa-filter mobile_srch"></i></a>

                            <!-- <a href="<?php echo site_url();?>" class="me-3"><i class="fa-solid fa-house"></i></a> -->

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


    <!-- <div class="modal fade" id="exampleModalsearch" tabindex="-1" aria-labelledby="exampleModalsearchLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div> -->

    <div class="mobile_search">
        <div class="container search_cont">
            <form action="<?php echo site_url('/propsearch/');?>" method="get" class="adv_search">
                <div class="search_row">

                    <?php
                                $args = array(
                                    'taxonomy' => 'property-category',
                                );
                                $cats = get_categories($args); ?>
                    <select name="category" id="category" class=" category areas nice_select">
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
                        <div class="select_box" id="budget_box_2">
                            <select name="budget" id="budget" class="nice_select  more_option">
                                <option value="">Max. Price</option>
                            </select>
                        </div>
                        <div class="slider_box-2">
                            <div class="form-group">
                                <label for="loan-amount-new">₹ <span id="loan-amount-value-new">50Cr</span></label>
                                <input type="range" id="loan-amount-new" name="max_budget" min="1500000" max="500000000"
                                    step="500000" value="500000000" />
                                <input type="hidden" id="min-budget" name="min_budget" value="100000" />
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



    <script>
    function formatAmount(value) {
        if (value >= 10000000) {
            return (value / 10000000).toFixed(2) + 'Cr';
        } else if (value >= 100000) {
            return (value / 100000).toFixed(2) + 'L';
        }
        return value;
    }

    document.getElementById('loan-amount-new').addEventListener('input', function() {
        var value = this.value;
        document.getElementById('loan-amount-value-new').textContent = formatAmount(value);
    });

    // document.getElementById('loan-amount-new').addEventListener('input', function() {
    //     var value = this.value;
    //     document.getElementById('loan-amount-value-new').textContent = value;
    // });
    </script>


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
                }
            ];

            var selectedValue = $(this).attr("data-value");

            const newValue = categoryWiseData.filter((value) => value.category == selectedValue);

            const finalValue = newValue ? newValue[0].types : [];

            var $targetDropdown = $(".nice-select.nice_select.more_option.select_bhk");

            var optionsHtml = finalValue.map(type =>
                `<li data-value="${type}" class="option">${type}</li>`).join("");
            $targetDropdown.find("ul.list").html(optionsHtml);

            if (finalValue.length > 0) {
                $targetDropdown.find("span.current").text(finalValue[0]);
            } else {
                $targetDropdown.find("span.current").text("Select Specification");
            }

        });
    });
    </script> -->


    <style>
    .slider_box-2 {
        display: none;
    }
    </style>