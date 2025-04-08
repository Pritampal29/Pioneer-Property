<?php
/**
 * Pioneer_property functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pioneer_property
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pioneer_property_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Pioneer_property, use a find and replace
		* to change 'pioneer_property' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'pioneer_property', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'pioneer_property' ),
			'footer-1' => esc_html__( 'Footer Category', 'pioneer_property' ),
			'footer-2' => esc_html__( 'Footer Insight', 'pioneer_property' ),
			'footer-3' => esc_html__( 'Footer Company', 'pioneer_property' ),
			'footer-4' => esc_html__( 'Footer Linkss', 'pioneer_property' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'pioneer_property_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'pioneer_property_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pioneer_property_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pioneer_property_content_width', 640 );
}
add_action( 'after_setup_theme', 'pioneer_property_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pioneer_property_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'pioneer_property' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'pioneer_property' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'pioneer_property_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pioneer_property_scripts() {
	wp_enqueue_style( 'pioneer_property-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'pioneer_property-style', 'rtl', 'replace' );

	wp_enqueue_script( 'pioneer_property-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pioneer_property_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}






/**
 * 
 *  <!--==================================================================================-->
 * 
 *	<!-----------------------------+    Pritam Custom Code     +---------------------------->
 *
 *	<!--==================================================================================-->
 *
 */

//  include get_template_directory() . "/DataFilter/data-filter.php";

/**
* #################################################################
*			Add Extra Option Page For Header & Footer
* #################################################################
*/
	if( function_exists('acf_add_options_page') ) {  

		acf_add_options_page(array(
			'page_title'    => 'Options',
			'menu_title'    => 'Header & Footer',
			'menu_slug'     => 'Options',
			'capability'    => 'edit_posts',
			'redirect'      => false,
			'icon_url'      => 'dashicons-admin-generic',
			'position' 		=> 2
		));
	}


/**
* #################################################################
*		Add Extra Option Page For Location for Property
* #################################################################
*/
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title'    => 'Property Location',
			'menu_title'    => 'Location',
			'menu_slug'     => 'property-location',
			'capability'    => 'edit_posts',
			'redirect'      => false,
			'icon_url'      => 'dashicons-location',
			'position' 		=> 3
		));
	}


/**
* #################################################################
*				Create Custom Post Type : Property
* #################################################################
*/
	function create_property_post_type() {
		register_post_type( 'property',
			array(
				'labels' => array(
					'name' => 'Property' ,
					'singular_name' => 'Property',
					'add_new' => 'Add New',
					'add_new_item' => 'Add New Property',
					'edit_item' => 'Edit Property',
					'new_item' => 'New Property',
					'view_item' => 'View Property',
					'search_items' => 'Search Property',
					'not_found' =>  'Nothing Found',
					'not_found_in_trash' => 'Nothing found in the Trash',
					'parent_item_colon' => ''
				),
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'menu_icon'  => 'dashicons-building',
				'rewrite' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => null,
				'supports' => array('title','editor','thumbnail','page-attributes')
			)
		);
	}
	add_action( 'init', 'create_property_post_type' );

	function my_taxonomies_property() {
		$labels = array(
		'name'              => _x( 'Property Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Property Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Property Categories' ),
		'all_items'         => __( 'All Property Categories' ),
		'parent_item'       => __( 'Parent Property Category' ),
		'parent_item_colon' => __( 'Parent Property Category:' ),
		'edit_item'         => __( 'Edit Property Category' ), 
		'update_item'       => __( 'Update Property Category' ),
		'add_new_item'      => __( 'Add New Property Category' ),
		'new_item_name'     => __( 'New Property Category' ),
		'menu_name'         => __( 'Property Categories' ),
		);
		$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
		'show_admin_column' => true, 
		'query_var' => true,
		);
		register_taxonomy( 'property-category', 'property', $args );
	}
	add_action( 'init', 'my_taxonomies_property', 0 );



/**
* #################################################################
*			 Add active class for Header Menu Active 
* #################################################################
*/
	class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
			// Add "active" class to the current menu item
			if ($item->current || $item->current_item_ancestor) {
				$item->classes[] = 'active-menu';
			}

			parent::start_el($output, $item, $depth, $args);
		}
	}



/**
* #################################################################
*			Limit No of Post Shows In Category Page(Post) 
* #################################################################
*/
	function custom_posts_per_page_for_archive($query) {
		if ($query->is_archive() && $query->is_main_query()) {
			$query->set('posts_per_page', 10); 
		}
	}
	add_action('pre_get_posts', 'custom_posts_per_page_for_archive');



/**
* #################################################################
*		Show Extra Columns in Admin Dashboard (Property CPT) 
* #################################################################
*/	
	function add_custom_columns($columns) { 
		$columns['property_price'] = __('Price', 'textdomain');
		$columns['main_location'] = __('Location', 'textdomain');
		$columns['property_contractor_name'] = __('Developer', 'textdomain');   
		$columns['property_status'] = __('Property Status', 'textdomain');
		$columns['possession_date'] = __('Possession Date', 'textdomain');
		return $columns;
	}
	add_filter('manage_property_posts_columns', 'add_custom_columns');

	function display_custom_columns($column, $post_id) {
		switch ($column) {
			case 'property_status':
				$property_status = get_field('property_status', $post_id);
				echo $property_status ? esc_html($property_status) : __('N/A', 'textdomain');
				break;
			case 'main_location':
				$main_location = get_field('main_location', $post_id);
				echo $main_location ? esc_html($main_location) : __('N/A', 'textdomain');
				break;
			case 'property_contractor_name':
				$property_contractor_name = get_field('property_contractor_name', $post_id);
				echo $property_contractor_name ? esc_html($property_contractor_name) : __('N/A', 'textdomain');
				break;
			case 'possession_date':
				$property_poss_date = get_field('possession_date', $post_id);
				echo $property_poss_date ? esc_html($property_poss_date) : __('N/A', 'textdomain');
				break;
			case 'property_price':
				$property_price = get_field('property_price', $post_id);
				if ($property_price) {
					$min_price = isset($property_price['min_price']) ? format_price($property_price['min_price']) : __('N/A', 'textdomain');
					$max_price = isset($property_price['max_price']) ? format_price($property_price['max_price']) : __('N/A', 'textdomain');
					// echo esc_html("₹ ".$min_price." - ".$max_price);
					echo '<span style="color: #50C878; font-weight:700">' . esc_html("₹ ".$min_price." - ".$max_price) . '</span>';
				} else {
					echo __('N/A', 'textdomain');
				}
				break;
		}
	}
	add_action('manage_property_posts_custom_column', 'display_custom_columns', 10, 2);

	function format_price($price) {
		if ($price >= 10000000) {
			return round($price / 10000000, 2) . ' Cr';
		} elseif ($price >= 100000) {
			return round($price / 100000, 2) . ' Lakh';
		} elseif ($price >= 1000) {
			return round($price / 1000, 2) . ' K';
		} else {
			return $price;
		}
	}


/**
* #################################################################
*		Show an Extra Column(Template Name) on Every Pages
* #################################################################
*/	
	function add_template_column($columns) {

		$new_columns = array();
		
		foreach ($columns as $key => $value) {
			if ($key == 'author') {
				$new_columns['template'] = __('Template Name');
			}
			$new_columns[$key] = $value;
		}
		return $new_columns;
	}
	add_filter('manage_page_posts_columns', 'add_template_column');

	function display_template_column($column, $post_id) {
		if ($column == 'template') {
			$template = get_page_template_slug($post_id);
			if ($template) {
				$templates = wp_get_theme()->get_page_templates();
				echo isset($templates[$template]) ? $templates[$template] : $template;
			} else {
				echo __('Default Template');
			}
		}
	}
	add_action('manage_page_posts_custom_column', 'display_template_column', 10, 2);



/**
* #################################################################
*				Handle AJAX Request for Listing Page 
* #################################################################
*/	
	/**#################################################
	 * 	  Enqueue Ajax File to theme for ajax search
	 */#################################################
	function enqueue_ajax_search_script() {
		wp_enqueue_script('ajax-search', get_template_directory_uri() . '/js/ajax-search.js', array('jquery'), null, true);
		wp_localize_script('ajax-search', 'ajax_object', array(
			'ajax_url' => admin_url('admin-ajax.php')
		));
	}
	add_action('wp_enqueue_scripts', 'enqueue_ajax_search_script');


	/**#####################################################
	 *   Handle AJAX Request for Listing Page Filteration
	 */#####################################################
	add_action('wp_ajax_fetch_properties', 'fetch_properties');
	add_action('wp_ajax_nopriv_fetch_properties', 'fetch_properties');

	function fetch_properties() {
		$location = sanitize_text_field($_GET['location']);
		$category = sanitize_text_field($_GET['category']);
		$status = sanitize_text_field($_GET['status']);
		$sort = sanitize_text_field($_GET['sort']);
		$min_budget = isset($_GET['min_budget']) ? intval($_GET['min_budget']) : '';
    	$max_budget = isset($_GET['max_budget']) ? intval($_GET['max_budget']) : '';

		$args = array(
			'post_type' => 'property',
			'posts_per_page' => -1
		);

		// Property filter by : Relevance, Possession Date, Price Low to High, Price High to Low, 
		if (!empty($sort) && $sort == 'trending') {	
			$args['meta_key'] = 'property_views';
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC'; 
			
		} elseif(!empty($sort) && $sort == 'poss_date') { // ACF possession_date
			$args['orderby'] = 'possession_date';
        	$args['order'] = 'ASC';
			$args['meta_query'][] = array(
				'key' => 'possession_date',
				'compare' => 'EXISTS',
			);
		} elseif(!empty($sort) && $sort == 'low') {	// ACF Price Low to High
			$args['orderby'] = 'property_price_min_price'; 
    		$args['order'] = 'ASC';
			$args['meta_query'][] = array(
				'key' => 'property_price_min_price',
				'compare' => 'EXISTS', 
				'type' => 'NUMERIC',
			);
		}elseif(!empty($sort) && $sort == 'high') {	// ACF Price High to Low
			$args['orderby'] = 'property_price_max_price'; 
    		$args['order'] = 'DESC';
			$args['meta_query'][] = array(
				'key' => 'property_price_max_price',
				'compare' => 'EXISTS', 
				'type' => 'NUMERIC',

			);
		}

		// Property filter by : Budget Price (ACF Group Price min/max)
		if (!empty($min_budget) && !empty($max_budget)) {
			$args['meta_query'][] = array(
				'key' => 'property_price_min_price',
				'value' => array($min_budget, $max_budget),
				'compare' => 'BETWEEN',
				'type' => 'NUMERIC',
			);
		}

		// Property filter by : Location (ACF main_location)
		if (!empty($location)) {
			$args['meta_query'][] = array(
				'key' => 'main_location',
				'value' => $location,
				'compare' => '=',
			);
		}

		// Property filter by : Property Category
		if (!empty($category)) {
			$args['tax_query'][] = array(
				'taxonomy' => 'property-category',
				'field' => 'slug',
				'terms' => $category,
			);
		}

		// Property filter by : Property Status(ACF property_status)
		if (!empty($status)) {
			$args['meta_query'][] = array(
				'key' => 'property_status',
				'value' => $status,
				'compare' => '=',
			);
		}

		$property_query = new WP_Query($args);

		if ($property_query->have_posts()) {
			ob_start();
			while ($property_query->have_posts()) {
				$property_query->the_post();
				?>

<div class="col-md-4 mb-4" id="propertyList">
    <div class="listing_card">
        <div class="img_box">
            <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
            <img src="<?php echo $featured_image;?>" alt="" />
        </div>
        <div class="cont_box">
            <div class="top">
                <span class="prop_name"><?php the_title();?></span>

                <?php
				$Price = get_field('property_price', $post->ID);
				if ($Price) { 
					$min_price = $Price['min_price'];
					$max_price = $Price['max_price'];

					if ($min_price >= 10000000) {
						$min_price_formatted = number_format($min_price / 10000000, 2) . ' cr';
					} elseif ($min_price >= 100000) {
						$min_price_formatted = number_format($min_price / 100000, 2) . ' lakh';
					} elseif($min_price >= 1000) {
						$min_price_formatted = number_format($min_price / 1000, 2) . ' K';
					}

					if ($max_price >= 10000000) {
						$max_price_formatted = number_format($max_price / 10000000, 2) . ' cr';
					} elseif ($max_price >= 100000) {
						$max_price_formatted = number_format($max_price / 100000, 2) . ' lakh';
					} elseif($max_price >= 1000) {
						$max_price_formatted = number_format($max_price / 1000, 2) . ' K';
					}
				?>

                <?php
					$button_value = get_field('price_on_request',$post->ID);
					if($button_value == 'Show'){ ?>
                <span class="prop_price">
                    ₹ <?php if($min_price_formatted) { echo $min_price_formatted; } ?> -
                    <?php if($max_price_formatted) { echo $max_price_formatted; } ?>
                </span>
                <?php }elseif($button_value == 'Hide'){?>
                <span class="prop_price price_btn">Price on request</span>
                <?php } } ?>

            </div>

            <?php
			$category_terms = get_the_terms(get_the_ID(), 'property-category'); 

			if ($category_terms && !is_wp_error($category_terms)) {
				$category_names = wp_list_pluck($category_terms, 'slug');

				if (in_array('land', $category_names)) { ?>
            <p class="area_size_land" style="color:#000">
                <?php echo get_field('land_area', get_the_ID()); ?>
            </p>
            <?php } else { ?>
            <p class="prop_dev">
                <?php echo get_field('property_contractor_name', get_the_ID()); ?>
            </p>
            <?php } } ?>
            <!-- <p class="prop_dev"><?php echo get_field('property_contractor_name',$post->ID);?></p> -->

            <?php $poss_date = get_field('possession_date',$post->ID);
				if($poss_date) { 
					// $date = DateTime::createFromFormat('d/m/Y', $poss_date);
					// $formatted_date = $date->format('jS F Y');?>
            <span class="capsule">Possession Date: <?php echo $poss_date;?></span>
            <?php } ?>
            <?php 
				$property_map_value = get_field('main_location',$post->ID);
				$property_map_address = get_field('property_live_map',$post->ID);
				if($property_map_value) { ?>
            <p id="location">
                <i class="fa-solid fa-location-dot me-2"></i><a
                    href="<?php echo $property_map_address;?>"><?php echo $property_map_value;?></a>
            </p>
            <?php } ?>


            <!-- <?php $rera_no = get_field('property_rera_no',$post->ID);
				if($rera_no){ ?>
            <span class="prop_rera">RERA No.: <?php echo $rera_no; ?></span>
            <?php } ?> -->

            <div class="details_box">
                <?php 
				if(have_rows('room_specification',$post->ID)) { 
					while(have_rows('room_specification',$post->ID)) { 
						the_row(); 
					$capacity = get_sub_field('capacity');
					$size = get_sub_field('size');
					$price = get_sub_field('price');
				?>
                <div class="details">
                    <span><?php echo $capacity;?></span><span><?php echo $size;?></span>
                    <?php
                                $button_value = get_field('price_on_request',$post->ID);
                                if($button_value == 'Show'){ ?>
                    <span><?php echo $price;?></span>
                    <?php }elseif($button_value == 'Hide'){?>
                    <span>Price on request</span>
                    <?php } ?>
                </div>
                <?php } } ?>
            </div>
            <div class="button_box d-flex">
                <a href="<?php the_permalink();?>" class="in_btn in_btn_2">View Details</a>
                <button class="in_btn w-auto open-modal" data-bs-toggle="modal" data-bs-target="#dnldModal"
                    data-title="<?php echo get_the_title(); ?>" data-pdf="<?php echo esc_attr($pdf_url); ?>">
                    Download Brochure
                </button>
                <a href="<?php echo get_permalink() . '#side_bar'; ?>" class="in_btn ms-3"><i
                        class="fa-solid fa-phone"></i>Get Call Back</a>
            </div>
        </div>
    </div>
</div>

<?php
			}
			wp_reset_postdata();
			echo ob_get_clean();
		} else {
			echo '<h3 class="text-center">No Properties Found.</h3>';
		}

		wp_die();
	}


	/**#####################################################################
	 *        Handle AJAX Request for Category Page Filteration
	 */#####################################################################
	 add_action('wp_ajax_fetch_category_properties', 'fetch_propertiesCat');
	 add_action('wp_ajax_nopriv_fetch_category_properties', 'fetch_propertiesCat');
 
	 function fetch_propertiesCat() {
		 $location = sanitize_text_field($_GET['locationCat']);
		 $room = sanitize_text_field($_GET['roomCat']);
		 $type = sanitize_text_field($_GET['typeCat']);
		 $areasize = sanitize_text_field($_GET['areasizeCat']);
		 $categoryName = sanitize_text_field($_GET['categoryName']);
		 $status = sanitize_text_field($_GET['statusCat']);
		 $buyrent = sanitize_text_field($_GET['buyrentCat']);
		 $min_budget = isset($_GET['min_budgetCat']) ? intval($_GET['min_budgetCat']) : '';
		 $max_budget = isset($_GET['max_budgetCat']) ? intval($_GET['max_budgetCat']) : '';
 
		 $args = array(
			 'post_type' => 'property',
			 'posts_per_page' => -1,
			 'tax_query' => array(
				array(
					'taxonomy' => 'property-category',
					'field'    => 'slug',
					'terms'    => array( $categoryName ),  
				)
			)
		 );
 
		 // Property filter by : Budget Price (ACF Group Price min/max)
		 if (!empty($min_budget) && !empty($max_budget)) {
			 $args['meta_query'][] = array(
				 'key' => 'property_price_min_price',
				 'value' => array($min_budget, $max_budget),
				 'compare' => 'BETWEEN',
				 'type' => 'NUMERIC',
			 );
		 }

		 // Property filter by : Property Status(ACF property_status)
		if (!empty($status)) {
			$args['meta_query'][] = array(
				'key' => 'property_status',
				'value' => $status,
				'compare' => '=',
			);
		}

		// Property filter by : Area Size (ACF land_area)
		if (!empty($areasize)) {
			$args['meta_query'][] = array(
				'key'     => 'land_area',
				'value'   => $areasize,
				'compare' => '<=',
				'type'    => 'NUMERIC',
			);
		}

		// Property filter by : Property Status(ACF property_buyrent)
		if (!empty($buyrent)) {
			$args['meta_query'][] = array(
				'key' => 'property_buyrent',
				'value' => '"' . $buyrent . '"',
				'compare' => 'LIKE',
			);
		}
 
		 // Property filter by : Location (ACF main_location)
		 if (!empty($location)) {
			 $args['meta_query'][] = array(
				 'key' => 'main_location',
				 'value' => $location,
				 'compare' => '=',
			 );
		 }
 
		 // Property filter by : Room Capacity (ACF room_capacity)
		 if (!empty($room)) {
			$args['meta_query'][] = array(
				'key' => 'room_capacity',
				'value' => '"' . $room . '"',
				'compare' => 'LIKE',
			);
		}

		 // Property filter by : Type Specification (ACF type_specification)
		 if (!empty($type)) {
			$args['meta_query'][] = array(
				'key' => 'type_specification',
				'value' => '"' . $type . '"',
				'compare' => 'LIKE',
			);
		}
 
 
		 $property_query = new WP_Query($args);

		//  echo "<pre>"; print_r($args);die();
 
		 if ($property_query->have_posts()) {
			 ob_start();
			 while ($property_query->have_posts()) {
				 $property_query->the_post();
				 ?>

<div class="col-md-4 mb-4" id="propertyListCat">
    <div class="listing_card">
        <div class="img_box">
            <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
            <img src="<?php echo $featured_image;?>" alt="" />
        </div>
        <div class="cont_box">
            <div class="top">
                <span class="prop_name"><?php the_title();?></span>

                <?php
								$Price = get_field('property_price', $post->ID);
								if ($Price) { 
									$min_price = $Price['min_price'];
									$max_price = $Price['max_price'];
				
									if ($min_price >= 10000000) {
										$min_price_formatted = number_format($min_price / 10000000, 2) . ' cr';
									} elseif ($min_price >= 100000) {
										$min_price_formatted = number_format($min_price / 100000, 2) . ' lakh';
									} elseif($min_price >= 1000) {
										$min_price_formatted = number_format($min_price / 1000, 2) . ' K';
									}
				
									if ($max_price >= 10000000) {
										$max_price_formatted = number_format($max_price / 10000000, 2) . ' cr';
									} elseif ($max_price >= 100000) {
										$max_price_formatted = number_format($max_price / 100000, 2) . ' lakh';
									} elseif($max_price >= 1000) {
										$max_price_formatted = number_format($max_price / 1000, 2) . ' K';
									}
								?>

                <?php
					$button_value = get_field('price_on_request',$post->ID);
					if($button_value == 'Show'){ ?>
                <span class="prop_price">
                    ₹ <?php if($min_price_formatted) { echo $min_price_formatted; } ?> -
                    <?php if($max_price_formatted) { echo $max_price_formatted; } ?>
                </span>
                <?php }elseif($button_value == 'Hide'){?>
                <span class="prop_price price_btn">Price on request</span>
                <?php } } ?>

            </div>

            <?php
			$category_terms = get_the_terms(get_the_ID(), 'property-category'); 

			if ($category_terms && !is_wp_error($category_terms)) {
				$category_names = wp_list_pluck($category_terms, 'slug');

				if (in_array('land', $category_names)) { ?>
            <p class="area_size_land" style="color:#000">
                <?php echo get_field('land_area', get_the_ID()); ?>
            </p>
            <?php } else { ?>
            <p class="prop_dev">
                <?php echo get_field('property_contractor_name', get_the_ID()); ?>
            </p>
            <?php } } ?>

            <!-- <p class="prop_dev"><?php echo get_field('property_contractor_name',$post->ID);?></p> -->
            <?php $poss_date = get_field('possession_date',$post->ID);
								if($poss_date) { 
									//  $date = DateTime::createFromFormat('d/m/Y', $poss_date);
									//  $formatted_date = $date->format('jS F Y');?>
            <span class="capsule">Possession Date: <?php echo $poss_date;?></span>
            <?php } ?>
            <?php 
								$property_map_value = get_field('main_location',$post->ID);
								$property_map_address = get_field('property_live_map',$post->ID);
								if($property_map_value) { ?>
            <p id="location">
                <i class="fa-solid fa-location-dot me-2"></i><a
                    href="<?php echo $property_map_address;?>"><?php echo $property_map_value;?></a>
            </p>
            <?php } ?>


            <!-- <?php $rera_no = get_field('property_rera_no',$post->ID);
								if($rera_no){ ?>
            <span class="prop_rera">RERA No.: <?php echo $rera_no; ?></span>
            <?php } ?> -->

            <div class="details_box">
                <?php 
								if(have_rows('room_specification',$post->ID)) { 
									while(have_rows('room_specification',$post->ID)) { 
										the_row(); 
									$capacity = get_sub_field('capacity');
									$size = get_sub_field('size');
									$price = get_sub_field('price');
								?>
                <div class="details">
                    <span><?php echo $capacity;?></span><span><?php echo $size;?></span>
                    <?php
                                $button_value = get_field('price_on_request',$post->ID);
                                if($button_value == 'Show'){ ?>
                    <span><?php echo $price;?></span>
                    <?php }elseif($button_value == 'Hide'){?>
                    <span>Price on request</span>
                    <?php } ?>
                </div>
                <?php } } ?>
            </div>
            <div class="button_box d-flex">
                <a href="<?php the_permalink();?>" class="in_btn in_btn_2">View Details</a>
                <button class="in_btn w-auto open-modal" data-bs-toggle="modal" data-bs-target="#dnldModal"
                    data-title="<?php echo get_the_title(); ?>" data-pdf="<?php echo esc_attr($pdf_url); ?>">
                    Download Brochure
                </button>
                <a href="<?php echo get_permalink() . '#side_bar'; ?>" class="in_btn ms-3"><i
                        class="fa-solid fa-phone"></i>Get Call Back</a>
            </div>
        </div>
    </div>
</div>

<?php
			 }
			 wp_reset_postdata();
			 echo ob_get_clean();
		 } else {
			 echo '<h3 class="text-center">No Properties Found.</h3>';
		 }
 
		 wp_die();
	 }
	 


/**
* #######################################################################
*	    	Handle AJAX Request for Listing Page (More Filter)
* #######################################################################
*/
	add_action('wp_ajax_filter_properties', 'filter_properties_ajax');
	add_action('wp_ajax_nopriv_filter_properties', 'filter_properties_ajax');
	
	function filter_properties_ajax() {
		$property_status = isset($_POST['property_status']) ? $_POST['property_status'] : array();
		$property_type = isset($_POST['property_type']) ? $_POST['property_type'] : array();
		$bedrooms = isset($_POST['bedrooms']) ? $_POST['bedrooms'] : array();

		$args = array(
			'post_type' => 'property',
			'posts_per_page' => -1,
			'meta_query' => array(),
			'tax_query' => array(),
		);

		// Filter by property status
		if (!empty($property_status)) {
			$args['meta_query'][] = array(
				'key' => 'property_status',
				'value' => $property_status,
				'compare' => 'IN',
			);
		}

		// Filter by property type (taxonomy)
		if (!empty($property_type)) {
			$args['tax_query'][] = array(
				'taxonomy' => 'property-category',
				'field' => 'slug',
				'terms' => $property_type,
			);
		}

		// Filter by bedrooms (room capacity)
		if (!empty($bedrooms)) {
			$meta_query_bedrooms = array('relation' => 'OR');
			
			foreach ($bedrooms as $bedroom) {
				$meta_query_bedrooms[] = array(
					'key'     => 'room_capacity',
					'value'   => '"' . $bedroom . '"', 
					'compare' => 'LIKE',
				);
			}
		
			$args['meta_query'][] = $meta_query_bedrooms;
		}
		

		$query = new WP_Query($args);

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();?>

<div class="col-md-4 mb-4" id="propertyList">
    <div class="listing_card">
        <div class="img_box">
            <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
            <img src="<?php echo $featured_image;?>" alt="" />
        </div>
        <div class="cont_box">
            <div class="top">
                <span class="prop_name"><?php the_title();?></span>

                <?php
			$Price = get_field('property_price', $post->ID);
			if ($Price) { 
				$min_price = $Price['min_price'];
				$max_price = $Price['max_price'];

				if ($min_price >= 10000000) {
					$min_price_formatted = number_format($min_price / 10000000, 2) . ' cr';
				} elseif ($min_price >= 100000) {
					$min_price_formatted = number_format($min_price / 100000, 2) . ' lakh';
				} elseif($min_price >= 1000) {
					$min_price_formatted = number_format($min_price / 1000, 2) . ' K';
				}

				if ($max_price >= 10000000) {
					$max_price_formatted = number_format($max_price / 10000000, 2) . ' cr';
				} elseif ($max_price >= 100000) {
					$max_price_formatted = number_format($max_price / 100000, 2) . ' lakh';
				} elseif($max_price >= 1000) {
					$max_price_formatted = number_format($max_price / 1000, 2) . ' K';
				}
				?>
                <?php
					$button_value = get_field('price_on_request',$post->ID);
					if($button_value == 'Show'){ ?>
                <span class="prop_price">
                    ₹ <?php if($min_price_formatted) { echo $min_price_formatted; } ?> -
                    <?php if($max_price_formatted) { echo $max_price_formatted; } ?>
                </span>
                <?php }elseif($button_value == 'Hide'){?>
                <span class="prop_price price_btn">Price on request</span>
                <?php } } ?>

            </div>

            <?php
			$category_terms = get_the_terms(get_the_ID(), 'property-category'); 

			if ($category_terms && !is_wp_error($category_terms)) {
				$category_names = wp_list_pluck($category_terms, 'slug');

				if (in_array('land', $category_names)) { ?>
            <p class="area_size_land" style="color:#000">
                <?php echo get_field('land_area', get_the_ID()); ?>
            </p>
            <?php } else { ?>
            <p class="prop_dev">
                <?php echo get_field('property_contractor_name', get_the_ID()); ?>
            </p>
            <?php } } ?>

            <!-- <p class="prop_dev"><?php echo get_field('property_contractor_name',$post->ID);?></p> -->
            <?php $poss_date = get_field('possession_date',$post->ID);
				if($poss_date) { 
					// $date = DateTime::createFromFormat('d/m/Y', $poss_date);
					// $formatted_date = $date->format('jS F Y');?>
            <span class="capsule">Possession Date: <?php echo $poss_date;?></span>
            <?php } ?>
            <?php 
						$property_map_value = get_field('main_location',$post->ID);
						$property_map_address = get_field('property_live_map',$post->ID);
						if($property_map_value) { ?>
            <p id="location">
                <i class="fa-solid fa-location-dot me-2"></i><a
                    href="<?php echo $property_map_address;?>"><?php echo $property_map_value;?></a>
            </p>
            <?php } ?>
            <!-- <?php $rera_no = get_field('property_rera_no',$post->ID);
				if($rera_no){ ?>
            <span class="prop_rera">RERA No.: <?php echo $rera_no; ?></span>
            <?php } ?> -->
            <div class="details_box">
                <?php 
					if(have_rows('room_specification',$post->ID)) { 
						while(have_rows('room_specification',$post->ID)) { 
							the_row(); 
						$capacity = get_sub_field('capacity');
						$size = get_sub_field('size');
						$price = get_sub_field('price');
					?>
                <div class="details">
                    <span><?php echo $capacity;?></span><span><?php echo $size;?></span>
                    <?php
                                $button_value = get_field('price_on_request',$post->ID);
                                if($button_value == 'Show'){ ?>
                    <span><?php echo $price;?></span>
                    <?php }elseif($button_value == 'Hide'){?>
                    <span>Price on request</span>
                    <?php } ?>
                </div>
                <?php } } ?>
            </div>
            <div class="button_box d-flex">
                <a href="<?php the_permalink();?>" class="in_btn in_btn_2">View Details</a>
                <button class="in_btn w-auto open-modal" data-bs-toggle="modal" data-bs-target="#dnldModal"
                    data-title="<?php echo get_the_title(); ?>" data-pdf="<?php echo esc_attr($pdf_url); ?>">
                    Download Brochure
                </button>
                <a href="<?php echo get_permalink() . '#side_bar'; ?>" class="in_btn ms-3"><i
                        class="fa-solid fa-phone"></i>Get Call Back</a>
            </div>
        </div>
    </div>
</div>

<?php	
			}
		} else {
			echo 'No properties found.';
		}

		wp_die();
	}





/**
* #######################################################################
*	 Show Amenities Checkbox in Property Post by 'checkbox_amenities'
* #######################################################################
*/
	// function populate_amenities_checkbox_choices($field) {
	// 	$field['choices'] = array();
		
	// 	if (have_rows('amenities_options_repeater', 'option')) {
	// 		while (have_rows('amenities_options_repeater', 'option')) {
	// 			the_row();
	// 			$title = get_sub_field('amenities_title');
	// 			if ($title) {
	// 				$field['choices'][$title] = $title;
	// 			}
	// 		}
	// 	}

	// 	return $field;
	// }
	// add_filter('acf/load_field/name=checkbox_amenities', 'populate_amenities_checkbox_choices');



/**
* #################################################################
*		 After Successful submission a PDF file is open 
* #################################################################
*/
function custom_inline_script() {
	wp_enqueue_script('jquery');

	$brochure_url = esc_url(get_field('download_brochure_pdf'));
	
	$inline_script = "
		jQuery(document).ready(function($) {
			$('#download-brochure').on('click', function(e) {
				e.preventDefault(); 	
				$('#dnldModal').modal('show');
			});
			
			$(document).on('wpcf7mailsent', function(event) {				
				var formId = event.detail.contactFormId;
			
                if (formId == 859) {
                    if ('{$brochure_url}') {
                        window.open('{$brochure_url}', '_blank');
                    }
                }
			});
		});
	";
	wp_add_inline_script('jquery', $inline_script);
}
add_action('wp_enqueue_scripts', 'custom_inline_script');




/**
* #################################################################
*		 Show Post Title into email Template Dynamically
* #################################################################
*/
	function add_post_title_to_cf7( $html ) {
		if ( is_single() || is_page() ) {
			$post_title = get_the_title();
			$post_id = get_the_ID(); 
			$new_element = '
			<div class="row">
				<div class="col-md-12 d-flex justify-content-start align-items-center">
					<input type="hidden" name="your-post-title" value="' . esc_attr( $post_title ) . '" readonly="readonly" />
				</div>
			</div>
			<input type="hidden" name="property-id" value="' . esc_attr( $post_id ) . '" />'; 
			$html = $new_element . $html;
		}
		return $html;
	}
	add_filter( 'wpcf7_form_elements', 'add_post_title_to_cf7' );



/**
* #################################################################
*				Create Custom Post Type : Teams
* #################################################################
*/
	function create_teams_post_type() {
		register_post_type( 'teams',
			array(
				'labels' => array(
					'name' => 'Teams' ,
					'singular_name' => 'Teams',
					'add_new' => 'Add New',
					'add_new_item' => 'Add New Teams',
					'edit_item' => 'Edit Teams',
					'new_item' => 'New Teams',
					'view_item' => 'View Teams',
					'search_items' => 'Search Teams',
					'not_found' =>  'Nothing Found',
					'not_found_in_trash' => 'Nothing found in the Trash',
					'parent_item_colon' => ''
				),
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'menu_icon'  => 'dashicons-groups',
				'rewrite' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => null,
				'supports' => array('title','editor','thumbnail','page-attributes')
			)
		);
	}
	add_action( 'init', 'create_teams_post_type' );

/**
* #################################################################
*		Show Extra Columns in Admin Dashboard (Teams CPT) 
* #################################################################
*/	
	function add_custom_columns_team($columns) {
		$new_columns = array();
		foreach ($columns as $key => $value) {
			if ($key == 'title') {
				$new_columns[$key] = $value;
				$new_columns['designation'] = __('Designation', 'textdomain');
			} else {
				$new_columns[$key] = $value;
			}
		}
		return $new_columns;
	}
	add_filter('manage_teams_posts_columns', 'add_custom_columns_team');

	function display_custom_columns_team($column, $post_id) {
		switch ($column) {
			case 'designation':
				$designation = get_field('designation', $post_id);
				echo $designation ? esc_html($designation) : __('N/A', 'textdomain');
				break;
		}
	}
	add_action('manage_teams_posts_custom_column', 'display_custom_columns_team', 10, 2);


/**
* #################################################################
*		Count Viewers For Showing Trending Properties 
* #################################################################
*/	
	function track_property_views($post_id) {
		if (get_post_type($post_id) === 'property') {
			$views = get_post_meta($post_id, 'property_views', true); 
			$views = (empty($views) ? 0 : $views); 
			$views++; 
			update_post_meta($post_id, 'property_views', $views); 
		}
	}
	
	function property_track_views() {
		if (is_singular('property')) {
			$post_id = get_the_ID();
			track_property_views($post_id);
		}
	}
	add_action('wp', 'property_track_views');
	
	function get_properties_by_view_count($query) {
		
		if (!is_admin() && $query->is_main_query() && is_post_type_archive('property')) {
			$query->set('meta_key', 'property_views');
			$query->set('orderby', 'meta_value_num'); 
			$query->set('order', 'DESC'); 
		}
	}
	add_action('pre_get_posts', 'get_properties_by_view_count');



/**
* ##########################################################################
*	Showing Location Options fields Name in Property Main Location Choice
* ##########################################################################
*/	
	function populate_main_location_dropdown( $field ) {
			$field['choices'] = [];
		
			if ( have_rows('locations', 'option') ) {
				while ( have_rows('locations', 'option') ) {
					the_row();
					$location_name = get_sub_field('location_name');
		
					if ( $location_name ) {
						$field['choices'][ $location_name ] = $location_name;
					}
				}
			}
			return $field;
		}
		add_filter('acf/load_field/name=main_location', 'populate_main_location_dropdown');
	


/**
* #################################################################
*			  Create Custom Post Type : Our Partners
* #################################################################
*/
function create_partners_post_type() {
	register_post_type( 'partners',
		array(
			'labels' => array(
				'name' => 'Partners' ,
				'singular_name' => 'Partners',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Partners',
				'edit_item' => 'Edit Partners',
				'new_item' => 'New Partners',
				'view_item' => 'View Partners',
				'search_items' => 'Search Partners',
				'not_found' =>  'Nothing Found',
				'not_found_in_trash' => 'Nothing found in the Trash',
				'parent_item_colon' => ''
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_icon'  => 'dashicons-universal-access',
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title','editor','thumbnail')
		)
	);
}
add_action( 'init', 'create_partners_post_type' );



/**
* #################################################################
*		 Auto Suggest Property Name in Header Search Form
* #################################################################
*/
	function property_name_suggestions() {
		if (!isset($_POST['search'])) {
			wp_die();
		}

		global $wpdb;
		$search_term = sanitize_text_field($_POST['search']);
		
		$query = $wpdb->prepare(
			"SELECT ID, post_title FROM {$wpdb->posts} 
			WHERE post_type = 'property' 
			AND post_status = 'publish' 
			AND post_title LIKE %s 
			ORDER BY post_title ASC 
			LIMIT 10",
			'%' . $search_term . '%'
		);

		$results = $wpdb->get_results($query);

		if (!empty($results)) {
			foreach ($results as $post) {
				echo '<div class="suggestion-item" data-id="' . esc_attr($post->ID) . '">' . esc_html($post->post_title) . '</div>';
			}
		} else {
			echo '<div class="suggestion-item">No results found</div>';
		}

		wp_die();
	}

	add_action('wp_ajax_property_name_suggestions', 'property_name_suggestions');
	add_action('wp_ajax_nopriv_property_name_suggestions', 'property_name_suggestions');




/**
* #################################################################
*		Start Session for getting ID value in thankyou page
* #################################################################
*/
	function start_session() {
		if (!session_id()) {
			session_start();
		}
	}
	add_action('init', 'start_session');

/**
* #################################################################
*	Store data in Session for getting form value in thankyou page
* #################################################################
*/
	add_action('wpcf7_mail_sent', function ($contact_form) {
		session_start();

		if ($contact_form->id() == 591) {
			$submission = WPCF7_Submission::get_instance();
			if ($submission) {
				$posted_data = $submission->get_posted_data();
	
				$_SESSION['form_data'] = [
					'name'    => isset($posted_data['flname']) ? sanitize_text_field($posted_data['flname']) : '',
					'email'   => isset($posted_data['email']) ? sanitize_email($posted_data['email']) : '',
					'phone'   => isset($posted_data['number']) ? sanitize_text_field($posted_data['number']) : '',
					];
			}
		}
	});
	

	