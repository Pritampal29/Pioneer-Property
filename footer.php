<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pioneer_property
 */

?>

<?php if(!is_404( )) { ?>
<!-- Footer Section Start -->
<div class="footer">
    <!-- footer lead formsection -->



    <!-- footer top  -->
    <div class="section footer-section footer-section-03">
        <div class="container-fluid">
            <div class="common_wrapper">
                <!-- Footer Widget Wrap Start -->
                <div class="footer-widget-wrap">
                    <div class="row row-cols-5">
                        <div class="col">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget-about">
                                <a class="footer-logo" href="<?php echo site_url();?>"><img
                                        src="<?php echo get_field('footer_logo','option');?>" alt="Logo" /></a>
                                <p><?php echo get_field('logo_text','option');?></p>
                            </div>
                            <!-- Footer Widget End -->
                        </div>

                        <div class="col">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <?php $menu = wp_get_nav_menu_name( 'footer-1' );?>
                                <h4 class="footer-widget-title"><?php echo $menu; ?></h4>
                                <div class="widget-link">
                                    <ul class="link">
                                        <?php
                                        wp_nav_menu(
                                            array(
                                                'container'  => '',
                                                'items_wrap' => '%3$s',
                                                'menu'   => 'Categories',
                                            )
                                        ); 
                                        ?>

                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>

                        <div class="col">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <?php $menu = wp_get_nav_menu_name( 'footer-2' );?>
                                <h4 class="footer-widget-title"><?php echo $menu; ?></h4>
                                <div class="widget-link">
                                    <ul class="link">
                                        <?php
                                            wp_nav_menu(
                                                array(
                                                    'container'  => '',
                                                    'items_wrap' => '%3$s',
                                                    'menu'   => 'Insight',
                                                )
                                            ); ?>
                                        <!-- <li><a href="#">Blogs</a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>

                        <div class="col">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <?php $menu = wp_get_nav_menu_name( 'footer-3' );?>
                                <h4 class="footer-widget-title"><?php echo $menu; ?></h4>
                                <div class="widget-link">
                                    <ul class="link">
                                        <?php
                                        wp_nav_menu(
                                            array(
                                                'container'  => '',
                                                'items_wrap' => '%3$s',
                                                'menu'   => 'Company',
                                            )
                                        ); ?>
                                        <!-- <li><a href="#">About</a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>

                        <div class="col">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <?php $menu = wp_get_nav_menu_name( 'footer-4' );?>
                                <h4 class="footer-widget-title"><?php echo $menu; ?></h4>
                                <div class="widget-link">
                                    <ul class="link">
                                        <?php
                                        wp_nav_menu(
                                            array(
                                                'container'  => '',
                                                'items_wrap' => '%3$s',
                                                'menu'   => 'Useful Links',
                                            )
                                        ); ?>
                                        <!-- <li><a href="#">Brokers</a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>

                    </div>
                </div>
                <!-- Footer Widget Wrap End -->
            </div>
        </div>
    </div>
    <!-- Footer Copyright Start -->
    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="common_wrapper">
                <div class="footer-copyright-wrap">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <ul class="copy_ul chat">
                                <?php 
								if(have_rows('footer_pages','options')) {
									while(have_rows('footer_pages','options')) {
										the_row(); ?>
                                <li>
                                    <p><a
                                            href="<?php echo get_sub_field('page_link','options');?>"><?php echo get_sub_field('page_title','options');?></a>
                                    </p>
                                </li>
                                <?php } } ?>

                                <!-- <span><a href="#"><img src="images/chat.png" alt="" /></a></span>
                                <span class="chat_name">Shiv is online</span> -->

                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="social_ul">
                                <div class="footer-social">
                                    <ul class="social">
                                        <?php 
                                    if(have_rows('footer_social_tabs','options')) {
                                        while(have_rows('footer_social_tabs','options')) {
                                            the_row(); ?>
                                        <li>
                                            <a
                                                href="<?php echo get_sub_field('social_links','options');?>"><?php echo get_sub_field('social_icons','options');?></a>
                                        </li>
                                        <?php } } ?>
                                        <!-- <li>
                                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <ul class="copy_ul">
                                <li>
                                    <p><?php echo get_field('footer_copyright_text_1','option');?>
                                        <?php echo date('Y');?></p>
                                </li>
                                <li>
                                    <p><?php echo get_field('footer_copyright_text_2','option');?></p>
                                </li>
                                <li>
                                    <p><?php echo get_field('footer_copyright_text_3','option');?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Copyright End -->
</div>
<!-- footer top  -->

<?php } ?>

<!-- Footer Section End -->

<!-- back to top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- back to top end -->
<div id="backdrop" class="backdrop"></div>

<?php if(is_front_page()) {?>
<div class="section-top_footer">
    <div class="container">
        <h2 class="section_title__heading">GET IN TOUCH <span class="frm_close"><i class="fa-solid fa-xmark"></i></span></h2>
        <?php echo do_shortcode('[contact-form-7 id="2e9880d" title="Footer Sticky Form"]');?>
    </div>
</div>
<?php } ?>

<!-- JS
    ============================================ -->
<script src="<?php echo get_template_directory_uri();?>/js/jquery-1.12.4.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo get_template_directory_uri();?>/js/popper.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="<?php echo get_template_directory_uri();?>/js/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/aos.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/back-to-top.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.counterup.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.nice-select.js"></script>
<!-- Main JS -->
<script src="<?php echo get_template_directory_uri();?>/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<?php wp_footer(); ?>





<!-- /**
   * #####################################################
   *         AJAX Requests Heder Auto Suggestion
   * #####################################################
   */ -->

<script>
// jQuery(document).ready(function($) {
//     $("#searchInput").keyup(function() {
//         var searchText = $(this).val();
//         if (searchText.length > 2) { 
//             $.ajax({
//                 url: "<?php echo admin_url('admin-ajax.php'); ?>",
//                 type: "POST",
//                 data: {
//                     action: "property_name_suggestions",
//                     search: searchText
//                 },
//                 success: function(response) {
//                     $("#suggestions").html(response).fadeIn();
//                 }
//             });
//         } else {
//             $("#suggestions").fadeOut();
//         }
//     });

//     $("#suggestions").delegate(".suggestion-item", "click", function() {
//         $("#searchInput").val($(this).text());
//         $("#suggestions").fadeOut();
//     });

//     $(document).click(function(e) {
//         if (!$(e.target).closest(".search-bar").length) {
//             $("#suggestions").fadeOut();
//         }
//     });
// });

jQuery(document).ready(function($) {
    $("#searchInput").keyup(function() {
        var searchText = $(this).val();
        if (searchText.length > 0) {
            $.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                type: "POST",
                data: {
                    action: "property_name_suggestions",
                    search: searchText
                },
                success: function(response) {
                    $("#suggestions").html(response).fadeIn();
                }
            });
        } else {
            $("#suggestions").fadeOut();
        }
    });

    $("#suggestions").delegate(".suggestion-item", "click", function() {
        var selectedText = $(this).text();
        $("#searchInput").val(selectedText);
        $("#suggestions").fadeOut();

        $(".advname_search").submit();
    });

    $(document).click(function(e) {
        if (!$(e.target).closest(".search-bar").length) {
            $("#suggestions").fadeOut();
        }
    });
});



</script>


</body>

</html>