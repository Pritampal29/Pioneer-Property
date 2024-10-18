<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pioneer_property
 */

get_header();
?>

<main>
    <!-- Inner hero section start -->
    <section class="inner_hero wo_hr_line">
        <div class="container-fluid px-0">
            <div class="common_wrapper px-0">
                <div class="row">
                    <div class="col-lg-12 px-0">
                        <div class="banner"
                            style="background-image: url(<?php echo site_url('/wp-content/uploads/2024/07/banner-1.png');?>)">
                            <div class="overlay"></div>
                            <div class="banner-content">
                                <h1><?php echo esc_html(single_cat_title('', false)); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner hero section end -->



    <section class="post_body py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <?php
					if(have_posts()) {
						while(have_posts()) {
							the_post();
					?>
                        <div class="col-md-6">
                            <div class="blog_card">
                                <div class="img_box">
                                    <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                    <img src="<?php echo $featured_image;?>" alt="" />
                                </div>
                                <a href="<?php the_permalink();?>">
                                    <div class="cont_box">
                                        <h6><?php the_title();?></h6>
                                        <p><?php echo wp_trim_words( get_the_content(), 14 ); ?></p>
                                        <div class="card_bottom">
                                            <span class="date"><i class="fa-solid fa-calendar-days"></i>
                                                <?php echo get_the_date('F j, Y');?>
                                            </span>
                                            <!-- <span class="count">5</span> -->
                                        </div>
                                        <?php if(is_category('15')) { ?>
                                        <a class="mt-2 in_btn"
                                            href="<?php echo get_field('pdf_download_link',$post->ID);?>">Download</a>
                                        <?php } ?>

                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php }  ?>

                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>Recent Posts</h4>
                    <ul>
                        <?php
					if(have_posts()) {
						while(have_posts()) {
							the_post();
					?>
                        <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                        <?php } } ?>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="pagination">
                        <?php  
                                // For Showing Pagination
                                echo paginate_links(array(  
                                    'total' => $wp_query->max_num_pages,  
                                    'prev_text' => __('« Previous'),
                                    'next_text' => __('Next »'),
                                    'end_size' => $total_pages,
                                    'mid_size' => 0,
                                    'show_all' => true,
                                ));  
                                ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>


<?php
get_footer();