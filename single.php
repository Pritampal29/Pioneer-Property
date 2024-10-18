<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pioneer_property
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- Inner hero section start -->
    <section class="inner_hero wo_hr_line">
        <div class="container-fluid px-0">
            <div class="common_wrapper px-0">
                <div class="row">
                    <div class="col-lg-12 px-0">
                        <div class="banner"
                            style="background-image: url(<?php echo site_url('/wp-content/uploads/2024/07/banner-1.png');?>)">
                            <div class="overlay"></div>
                            <div class="breadcrumb">
                                <ul>
                                    <li><a href="<?php echo site_url();?>">Home</a></li>
                                    <li>
                                        <?php 
										$categories = get_the_category();
										if ( ! empty( $categories ) ) {
											foreach ( $categories as $category ) {
												echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a> ';
											}
										}
										?>
                                    </li>
                                    <li><?php the_title();?></li>
                                </ul>
                            </div>
                            <div class="banner-content">
                                <h1><?php echo esc_html(single_post_title('', false)); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner hero section end -->

    <section class="mn_blg_rep_jrnl py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

                    <h2><?php the_title();?></h2>
                    <div class="d-flex justify-content-between align-item-center">
                        <p><?php echo get_the_date('F j, Y');?></p>
                        <?php if (has_category('blog')) {  ?>
                        <ul class="social">
                            <?php 
						global $wp;  
						$current_url = home_url($wp->request);  ?>
                            <li>
                                <a
                                    href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($current_url); ?>"><i
                                        class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($current_url); ?>"><i
                                        class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a
                                    href="http://www.linkedin.com/shareArticle?url=<?php echo urlencode($current_url); ?>"><i
                                        class="fa-brands fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                        <?php } ?>
                    </div>

                    <img src="<?php echo $featured_image;?>" alt="post-image" class="w-100">
                    <p><?php the_content();?></p>
                    <?php if(get_field('pdf_download_link',$post->ID)) { ?>
                    <a target="_blank" class="in_btn pt-2"
                        href="<?php echo get_field('pdf_download_link',$post->ID);?>">Download
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();