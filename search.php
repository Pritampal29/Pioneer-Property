<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Pioneer_property
 */

get_header();


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


<!-- <script>
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
</script> -->



<?php
get_footer();