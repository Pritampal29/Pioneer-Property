<?php

/**
 * The template for displaying all single Property (Property Details Page)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pioneer_property
 */
get_header();
global $post;



$terms = get_the_terms(get_the_ID(), 'property-category');

if ($terms) {
    $first_term = $terms[0]->slug; 
    
    if ($first_term == 'warehouse') {
        get_template_part('template-parts/single-property', 'warehouse');
    } elseif ($first_term == 'land') {
        get_template_part('template-parts/single-property', 'land');
    } else {
        get_template_part('template-parts/single-property', 'default'); 
    }
} else {
    get_template_part('template-parts/single-property', 'default');
}
?>

<!-- Get the id from Session Value -->
<?php
$_SESSION['property_id'] = get_the_ID();
?>

<!-------- Script for page redirection after successfully submission of CF7 -------->
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('wpcf7mailsent', function (event) {
    
        if (event.detail.contactFormId == '591') {
            let propertyTitle = "<?php echo urlencode(get_the_title()); ?>"; 
            let redirectUrl = "<?php echo site_url('/thank-you/'); ?>?title=" + propertyTitle;
            window.location.href = redirectUrl;
        }
    }, false);
});
</script>



<?php 
get_footer(); ?>