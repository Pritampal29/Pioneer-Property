<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Pioneer_property
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="error-404 not-found">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="page-content text-center">
                        <h1 style="font-size:200px;color:#bb2026">4 0 4</h1>
                        <h2 style="font-size:40px">
                            <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'pioneer_property' ); ?></h2>
                        <a class="in_btn" href="<?php echo site_url();?>">Back to Home</a>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="<?php echo site_url('/wp-content/uploads/2024/08/404.jpg');?>" alt="img-404">
                </div>
            </div>
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();