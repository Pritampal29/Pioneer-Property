<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pioneer_property
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="main_body_um">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile; 
					?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php

get_footer();