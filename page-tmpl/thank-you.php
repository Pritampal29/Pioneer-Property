<?php

/**
 * Template Name: Thank You
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pioneer_property
 */

get_header();

?>


<main>

    <?php
    session_start();
    $property_id = isset($_SESSION['property_id']) ? $_SESSION['property_id'] : '';
    $form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];

    $args = array(
        'post_type'      => 'property',
        'post_status'    => 'publish', 
        'p'              => $property_id,
        'posts_per_page' => 1,        
    );

    $property_query = new WP_Query($args);

    if ($property_query->have_posts()) {
        while ($property_query->have_posts()) {
            $property_query->the_post();
            $property_title = get_the_title();
        }
        wp_reset_postdata();
    } 

    if($property_id != ''){ ?>
    <section class="tnxpage py-3">
        <div class="container">
            <div class="row">
                <div class="thank-you-content text-center">
                    <h2>Thank You!</h2>
                    <p>We’ve received your enquiry and our team will get in touch with you soon.<br>Your contact details
                        have been captured as:</p>
                    <h5>Property Name:<?php echo esc_html($property_title); ?></h5>

                    <?php if (!empty($form_data)) { ?>
                    <div class="frm_dtls">
                    <p>Name: <?php echo esc_html($form_data['name']); ?></p>
                    <p>Email: <?php echo esc_html($form_data['email']); ?></p>
                    <p>Phone: <?php echo esc_html($form_data['phone']); ?></p>
                    </div>
                    <?php } ?>

                    <p>Till then browse our other <a href="<?php echo site_url('/property/');?>">Properties</a>.</p>
                </div>
            </div>
        </div>
    </section>

    <?php }else{ ?>
    <section class="thxpage_dir py-5">
        <div class="container">
            <div class="row text-center" style="justify-content: center;">
                <h2>Sorry!</h2>
                <p>It looks like you accessed this page directly. Please submit the form from property page to see the
                    details here.</p>
                <a class="in_btn" href="<?php echo site_url('/property/');?>">Browse our property</a>
            </div>
        </div>
    </section>
    <?php } ?>

</main>


<?php
get_footer();?>