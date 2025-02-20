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





get_footer(); ?>