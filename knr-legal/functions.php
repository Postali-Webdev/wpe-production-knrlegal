<?php
/**
 * Theme functions.
 *
 * @package KNR Legal
 * @author Postali LLC
 */
	require_once dirname( __FILE__ ) . '/includes/admin.php';
	require_once dirname( __FILE__ ) . '/includes/utility.php';
	require_once dirname( __FILE__ ) . '/includes/case-results-cpt.php'; // Custom Post Type Case Results
    require_once dirname( __FILE__ ) . '/includes/newsarticle-cpt.php'; // Custom Post Type News Articles
	require_once dirname( __FILE__ ) . '/includes/testimonials-cpt.php'; // Custom Post Type Testimonials
    require_once dirname( __FILE__ ) . '/includes/communitysupport-cpt.php'; // Custom Post Type Community Support
	require_once dirname( __FILE__ ) . '/includes/attorneys-cpt.php'; // Custom Post Type Attorneys
	//require_once dirname( __FILE__ ) . '/includes/social-share.php'; // Social Media Sharing


	add_action('wp_enqueue_scripts', 'postali_parent');
	function postali_parent() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/css/styles.css' ); // Enqueue parent theme styles
	}  
    
    // Admin Scripts
    function enqueue_admin_script() {
        wp_enqueue_script( 'custom-button', get_stylesheet_directory_uri() . '/assets/js/custom-button.min.js', array('jquery'), '1.04', true  );
        wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() . '/assets/css/admin-styles.css' ); // Enqueue Child theme style sheet (theme info)
    }
    add_action('admin_enqueue_scripts', 'enqueue_admin_script');

	add_action('wp_enqueue_scripts', 'postali_child');
	function postali_child() {

		wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style.css' ); // Enqueue Child theme style sheet (theme info)
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css'); // Enqueue child theme styles.css
		
		wp_register_style( 'icomoon', 'https://cdn.icomoon.io/152819/KNRRedesign/style-cf.css?2tvv8', array() );
		wp_enqueue_style('icomoon');

		// Compiled .js using Grunt.js
		wp_register_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), '1.02', true); 
		wp_enqueue_script('custom-scripts');

		if ( is_front_page() ) {
            wp_register_script('home-js', get_stylesheet_directory_uri() . '/assets/js/home.min.js', array('jquery'));
            wp_enqueue_script('home-js');		
            wp_register_script('slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'));
		    wp_enqueue_script('slick');	
            wp_register_script('slick-custom', get_stylesheet_directory_uri() . '/assets/js/slick-custom.min.js', array('jquery'), '1.06', true);
		    wp_enqueue_script('slick-custom');	
            wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css'); // Enqueue child theme styles.css
            wp_register_script('lity', get_stylesheet_directory_uri() . '/assets/js/lity.js',array('jquery'), null, true); 
    		wp_enqueue_script('lity');
		}

        if ( is_page_template( 'page-location-home.php' ) ) {
            wp_register_script('location-home-js', get_stylesheet_directory_uri() . '/assets/js/location-home.min.js', array('jquery'));
            wp_enqueue_script('location-home-js');		
		}

        if ( is_page_template( 'page-practice-area-landing.php' ) ) {
            wp_register_script('practice-landing-js', get_stylesheet_directory_uri() . '/assets/js/practice-landing.min.js', array('jquery'));
            wp_enqueue_script('practice-landing-js');		
        }

        if ( is_page_template( 'page-practice-area-child.php' ) ) {
            wp_register_script('practice-child-js', get_stylesheet_directory_uri() . '/assets/js/practice-child.min.js', array('jquery'));
            wp_enqueue_script('practice-child-js');		
        }

        if ( is_page_template( 'page-practice-area-parent.php' ) ) {
            wp_register_script('practice-parent-js', get_stylesheet_directory_uri() . '/assets/js/practice-parent.min.js', array('jquery'));
            wp_enqueue_script('practice-parent-js');		
            wp_register_script('smooth-scroll', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll.min.js', array('jquery'));
		    wp_enqueue_script('smooth-scroll');
            wp_register_script('smooth-scroll-custom', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll-custom.min.js', array('jquery'));
		    wp_enqueue_script('smooth-scroll-custom');
        }

        if ( is_page_template( 'page-contact.php' ) ) {	
            wp_register_script('smooth-scroll', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll.min.js', array('jquery'));
		    wp_enqueue_script('smooth-scroll');
            wp_register_script('smooth-scroll-custom', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll-custom.min.js', array('jquery'));
		    wp_enqueue_script('smooth-scroll-custom');
        }

        if ( is_page_template( 'page-location-home-updated.php' ) ) {	
            wp_register_script('smooth-scroll', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll.min.js', array('jquery'));
		    wp_enqueue_script('smooth-scroll');
            wp_register_script('smooth-scroll-custom-location', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll-custom-location.min.js', array('jquery'));
		    wp_enqueue_script('smooth-scroll-custom-location');
        }

        //if (is_singular('attorneys') || is_single() || is_page_template( ['page-practice-area-parent.php', 'page-interior.php'] ) || is_page_template( 'page-practice-area-child.php' ) || is_page_template('page-about.php') || is_page_template('page-ppc-landing_v3.php') || is_page_template('page-ppc-detailed-landing.php') ) {
            wp_register_script('slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'));
		    wp_enqueue_script('slick');	
            wp_register_script('slick-custom', get_stylesheet_directory_uri() . '/assets/js/slick-custom.min.js', array('jquery'), '1.06', true);
		    wp_enqueue_script('slick-custom');	
            wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css'); // Enqueue child theme styles.css
        //}

        if (is_page_template('page-location-home.php') || is_post_type_archive('testimonials') || is_page(16522)) {
            wp_register_script('lity', get_stylesheet_directory_uri() . '/assets/js/lity.js',array('jquery'), null, true); 
    		wp_enqueue_script('lity');
        }

        if (is_post_type_archive('results') || is_category() ) {
            wp_register_script('results-scripts', get_stylesheet_directory_uri() . '/assets/js/results-scripts.min.js',array('jquery'), null, true); 
    		wp_enqueue_script('results-scripts');
        }

        if ( is_page(13226) ) {
            wp_register_script('blog-scripts', get_stylesheet_directory_uri() . '/assets/js/blog-scripts.min.js',array('jquery'), null, true); 
    		wp_enqueue_script('blog-scripts');
        }

        if (is_page(14366)) {
            wp_register_script('video-gallery-scripts', get_stylesheet_directory_uri() . '/assets/js/video-gallery.js',array('jquery'), null, true); 
    		wp_enqueue_script('video-gallery-scripts');
        }

	}

	// Register Site Navigations
	function postali_child_register_nav_menus() {
		register_nav_menus(
			array(

                'header-nav-utility'                    => __( 'Header Nav - Utility', 'postali' ),                         // global ultity
                'main-nav-about'                        => __( 'Main Nav - About', 'postali' ),                             // global about
                'main-nav-global-practice'              => __( 'Main Nav - Global Practice Areas', 'postali' ),             // location-based practice areas
                'main-nav-akron-practice'               => __( 'Main Nav - Akron Practice Areas', 'postali' ),
                'main-nav-beachwood-practice'           => __( 'Main Nav - Beachwood Practice Areas', 'postali' ),
                'main-nav-canton-practice'              => __( 'Main Nav - Canton Practice Areas', 'postali' ),
                'main-nav-cincinnati-practice'          => __( 'Main Nav - Cincinnati Practice Areas', 'postali' ),
                'main-nav-cleveland-practice'           => __( 'Main Nav - Cleveland Practice Areas', 'postali' ),
                'main-nav-columbus-practice'            => __( 'Main Nav - Columbus Practice Areas', 'postali' ),
                'main-nav-dayton-practice'              => __( 'Main Nav - Dayton Practice Areas', 'postali' ),
                'main-nav-independence-practice'        => __( 'Main Nav - Independence Practice Areas', 'postali' ),
                'main-nav-toledo-practice'              => __( 'Main Nav - Toledo Practice Areas', 'postali' ),
                'main-nav-westlake-practice'            => __( 'Main Nav - Westlake Practice Areas', 'postali' ),
                'main-nav-youngstown-practice'          => __( 'Main Nav - Youngstown Practice Areas', 'postali' ),
                'main-nav-results-locations-resources'  => __( 'Main Nav - Results, Locations, Resources', 'postali' ),     // global results, locations & resources
                'main-nav-search'                       => __( 'Main Nav - Search', 'postali' ),                            // global search functionality
				'footer-locations'                      => __( 'Footer Locations', 'postali' ),                             // global footer locations block
                'social-media-menu'                     => __( 'Social Media', 'postali' ),                                 // social media menu in header / footer
                'child-page-global'                     => __( 'Child Page Global Practice Areas', 'postali' ),             // global practice areas menu for child pages
                'footer-practice-areas'               => __( 'Footer Practice Areas', 'postali'  ),                         // footer practice areas
                'footer-quick-links'                  => __( 'Footer Quick Links', 'postali'  ),                           // footer quick links
			)
		);
	}
	add_action( 'init', 'postali_child_register_nav_menus' );

	// Add Custom Logo Support
	add_theme_support( 'custom-logo' );

	function postali_custom_logo_setup() {
		$defaults = array(
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}
	add_action( 'after_setup_theme', 'postali_custom_logo_setup' );

	// ACF Options Pages
	if( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
			'page_title'    => 'Location Details',
			'menu_title'    => 'Location Details',
			'menu_slug'     => 'location_details',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-admin-site',
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Customizations',
			'menu_title'    => 'Customizations',
			'menu_slug'     => 'customizations',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-admin-site', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Awards',
			'menu_title'    => 'Awards',
			'menu_slug'     => 'awards',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-awards', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

        acf_add_options_page(array(
			'page_title'    => 'Global Schema',
			'menu_title'    => 'Global Schema',
			'menu_slug'     => 'global_schema',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-media-code',
			'redirect'      => false
		));

        acf_add_options_page(array(
			'page_title'    => 'Instructions',
			'menu_title'    => 'Instructions',
			'menu_slug'     => 'theme-instructions',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-smiley', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

	}

    function add_acf_columns($columns) {
        $columns['case_result_value'] = 'Value';
        return $columns;
    }
    add_filter('manage_results_posts_columns', 'add_acf_columns');


    function value_column_content($column, $post_id) {
        if ( $column == 'case_result_value' ) {
            $case_result_value = get_field('case_result_value', $post_id);
            if ( $case_result_value ) {
                echo $case_result_value;
            } else {
                echo 'N/A';  // or whatever you'd like to display when the field is empty
            }
        }
    }
    add_action('manage_results_posts_custom_column', 'value_column_content', 10, 2);

    function klf_acf_input_admin_footer() { ?>
        <script type="text/javascript">
        (function($) {
        
        acf.add_filter('color_picker_args', function( args, $field ){
        
        // add the hexadecimal codes here for the colors you want to appear as swatches
        args.palettes = ['#ffffff', '#000000', '#e9eaf0', '#DBFF76', '#D8DAE1']
        
        // return colors
        return args;
        
        });
        
        })(jQuery);
        </script>
        
        <?php }
        
    add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');


    function get_knr_rest_api() {
        static $instance;
        if (!$instance) {
            require 'includes/class-knr-rest-api.php';
            $instance = new Knr_Rest_Api();
        }
        return $instance;
    }
    
    function get_knr_keystone() {
        static $instance;
        if (!$instance) {
            require 'includes/class-knr-keystone.php';
            $instance = new Knr_Keystone();
        }
        return $instance;
    }

    $knr_rest_api = get_knr_rest_api();
    $knr_keystone = get_knr_keystone();

    // list child pages of parent for location-based practice areas 
    function wpb_list_child_pages() { 
 
        global $post; 
        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
        if ( $childpages ) {
            $string = '<ul class="wpb_page_list">' . $childpages . '</ul>';
        }
        return $string;
    }
         
    add_shortcode('wpb_childpages', 'wpb_list_child_pages');
         

    // exclude empty posts from category list
    function wp_list_categories_for_post_type($post_type, $args = '') {
        $exclude = array();
    
        // Check ALL categories for posts of given post type
        foreach (get_categories() as $category) {
            $posts = get_posts(array('post_type' => $post_type, 'category' => $category->cat_ID));
    
            // If no posts found, ...
            if (empty($posts))
                // ...add category to exclude list
                $exclude[] = $category->cat_ID;
        }
    
        // Set up args
        if (! empty($exclude)) {
            $args .= ('' === $args) ? '' : '&';
            $args .= 'exclude='.implode(',', $exclude);
            $args .= 'current_category='.$cat_id;
        }
    
        // List categories
        get_categories($args);
    }

    // insert location into contact form
    add_filter( 'gform_field_value_office_location', 'gf_set_office_location' );
    function gf_set_office_location( $value ) {
    $office_location = '';
    if ( isset( $_SESSION['office_location'] ) )
        $office_location = $_SESSION['office_location'];
    return ucwords($office_location);
    }

    // add categories to pages
    function add_categories_to_pages() {
        register_taxonomy_for_object_type( 'category', 'page' );
    }
    add_action( 'init', 'add_categories_to_pages' );


	// Save newly created fields to child theme
	add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
	function my_acf_json_save_point( $path ) {
		
		// update path
		$path = get_stylesheet_directory() . '/acf-json';
		
		// return
		return $path;
	
	}
	
	// Add ability to add SVG to Wordpress Media Library
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	
	//add SVG to allowed file uploads
	function add_file_types_to_uploads($file_types){

		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$file_types = array_merge($file_types, $new_filetypes );

		return $file_types;
	}
	add_action('upload_mimes', 'add_file_types_to_uploads');


	// Widget Logic Conditionals
	function is_child($parent) {
		global $post;
			return $post->post_parent == $parent;
		}
		
    // Widget Logic Conditionals (ancestor) 
    function is_tree( $pid ) {
		global $post;
		
		if ( is_page($pid) )
		return true;
		
		$anc = get_post_ancestors( $post->ID );
		foreach ( $anc as $ancestor ) {
			if( is_page() && $ancestor == $pid ) {
				return true;
				}
		}
		return false;
	}

	// Display Current Year as shortcode - [year]
	function year_shortcode () {
		$year = date_i18n ('Y');
		return $year;
		}
	add_shortcode ('year', 'year_shortcode');
	
	// WP Backend Menu area taller
	add_action('admin_head', 'taller_menus');

	function taller_menus() {
	echo '<style>
		.posttypediv div.tabs-panel {
			max-height:500px !important;
		}
	</style>';
	}

	// Customize the logo on the wp-login.php page
	function my_login_logo() { ?>
		<style type="text/css">
			#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png);
			height:45px;
			width:204px;
			background-size: 204px 45px;
			background-repeat: no-repeat;
			padding-bottom: 30px;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
	// Contact Form 7 Submission Page Redirect
	add_action( 'wp_footer', 'mycustom_wp_footer' );
	
	function mycustom_wp_footer() {
	?>
	<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		location = '/form-success/';
	}, false );
	</script>
	<?php
	}

	// Add Search Bar to Top Nav
	function mainmenu_navsearch($items, $args) {
		if ($args->theme_location == 'header-nav') {
			ob_start();
			?>
			<li class="menu-item menu-item-search search-holder">
				<form class="navbar-form-search" role="search" method="get" action="/">
					<div class="search-form-container hdn" id="search-input-container">
						<div class="search-input-group">
							<div class="form-group">
							<input type="text" name="s" placeholder="Search for..." id="search-input-5cab7fd94d469" value="" class="form-control">
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-search" id="search-button"><span class="icon-magnifying-glass" aria-hidden="true"></span></button>
				</form>	
			</li>

			<?php
			$new_items = ob_get_clean();

			$items .= $new_items;
		}
		return $items;
	}
	add_filter('wp_nav_menu_items', 'mainmenu_navsearch', 10, 2);

	// Add template column to page list in wp-admin
	function page_column_views( $defaults ) {
		$defaults['page-layout'] = __('Template');
		return $defaults;
	}
	add_filter( 'manage_pages_columns', 'page_column_views' );

	function page_custom_column_views( $column_name, $id ) {
		if ( $column_name === 'page-layout' ) {
			$set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
			if ( $set_template == 'default' ) {
				echo 'Default';
			}
			$templates = get_page_templates();
			ksort( $templates );
			foreach ( array_keys( $templates ) as $template ) :
				if ( $set_template == $templates[$template] ) echo $template;
			endforeach;
		}
	}
	add_action( 'manage_pages_custom_column', 'page_custom_column_views', 5, 2 );


    /*Store Locator Fields*/
add_filter('wpsl_meta_box_fields', 'custom_meta_box_fields');

function custom_meta_box_fields($meta_fields)
{

    $meta_fields[__('Additional Information', 'wpsl')] = array(
        'phone' => array(
            'label' => __('Tel', 'wpsl')
        ),
        'fax' => array(
            'label' => __('Fax', 'wpsl')
        ),
        'hours_open' => array(
            'label' => __('Hours', 'wpsl')
        ),
        'appointment_url' => array(
            'label' => __('Appointment', 'wpsl')
        ),
        'contact_url' => array(
            'label' => __('Office Contact Url', 'wpsl')
        ),
        'location_url' => array(
            'label' => __('Office HP Url', 'wpsl')
        ),
    );

    return $meta_fields;
}

add_filter('wpsl_frontend_meta_fields', 'custom_frontend_meta_fields');

function custom_frontend_meta_fields($store_fields)
{

    $store_fields['wpsl_appointment_url'] = array(
        'name' => 'appointment_url',
        'type' => 'text'
    );
    $store_fields['wpsl_hours_open'] = array(
        'name' => 'hours_open',
        'type' => 'text'
    );
    $store_fields['wpsl_contact_url'] = array(
        'name' => 'contact_url',
        'type' => 'url'
    );
    $store_fields['wpsl_location_url'] = array(
        'name' => 'location_url',
        'type' => 'url'
    );

    return $store_fields;
}

add_filter('wpsl_listing_template', 'custom_listing_template');

function custom_listing_template()
{

    global $wpsl_settings;

    $listing_template = '<li data-store-id="<%= id %>">' . "\r\n";
    $listing_template .= "\t\t" . '<div>' . "\r\n";
    $listing_template .= "\t\t\t" . '<p><%= thumb %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . wpsl_store_header_template('listing') . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address %></span>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address2 %></span>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n";

    if (!$wpsl_settings['hide_country']) {
        $listing_template .= "\t\t\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n";
    }

    $listing_template .= "\t\t\t" . '</p>' . "\r\n";

// Show the phone, fax or email data if they exist.
    if ($wpsl_settings['show_contact_details']) {
        $listing_template .= "\t\t\t" . '<p class="wpsl-contact-details">' . "\r\n";
        $listing_template .= "\t\t\t" . '<% if ( phone ) { %>' . "\r\n";
        $listing_template .= "\t\t\t" . 'Tel: <%= phone %><br>' . "\r\n";
        $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
        $listing_template .= "\t\t\t" . '<% if ( fax ) { %>' . "\r\n";
        $listing_template .= "\t\t\t" . 'Fax: <%= fax %><br>' . "\r\n";
        $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
        $listing_template .= "\t\t\t" . '</p>' . "\r\n";
    }


    // Check if the 'hours_open' contains data before including it.
//    $listing_template .= "\t\t\t" . '<% if ( hours_open ) { %>' . "\r\n";
//    $listing_template .= "\t\t\t" . '<p>Hours: <%= hours_open %></p>' . "\r\n";
//    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
    // Check if the 'appointment_url' contains data before including it.
//    $listing_template .= "\t\t\t" . '<% if ( appointment_url ) { %>' . "\r\n";
//    $listing_template .= "\t\t\t" . '<p class="appointment"><strong><%= appointment_url %></strong></p>' . "\r\n";
//    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";

    $listing_template .= "\t\t" . '</div>' . "\r\n";

    // Check if we need to show the distance.
    if (!$wpsl_settings['hide_distance']) {
        $listing_template .= "\t\t" . '<%= distance %> ' . esc_html($wpsl_settings['distance_unit']) . '' . "\r\n";
    }

    $listing_template .= "\t\t\t" . '<div class="listing-links">' . "\r\n";
    $listing_template .= "\t\t\t" . '<% if ( contact_url ) { %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<a href="<%= contact_url %>" title="Contact Us">' . __('Contact', 'wpsl') . '</a>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
    $listing_template .= "\t\t" . '<%= createDirectionUrl() %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% if ( location_url ) { %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<a href="<%= location_url %>" title="Go to Location Homepage">' . __('Website', 'wpsl') . '</a>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
    $listing_template .= "\t\t\t" . '</div>' . "\r\n";
    $listing_template .= "\t" . '</li>' . "\r\n";

    return $listing_template;
}


    // custom columns on testimonials list
    function change_columns( $cols ) {
    $cols = array(
        'cb'         => '<input type="checkbox" />',
        'title'      => 'Title',
        'date'       => 'Date',
        'type'       => 'Type',
        );
        return $cols;
      }
      function custom_columns( $column ) {
      global $post;
          if( $column == 'type' ) {
              $typ = get_field('review_type');
              if( $typ ) {
                  echo $typ;
              } else {
                  echo '-';
              }
          }
      }
      add_action( "manage_testimonials_posts_custom_column", "custom_columns", 10, 2 );
      add_filter( "manage_testimonials_posts_columns", "change_columns" );
    


    // code blocks to make ajax work on case results

    function results_load_more_scripts() {
        if (is_post_type_archive('results') || is_category()) {
            wp_register_script( 'loadmore_script_results', get_stylesheet_directory_uri() . '/assets/js/src/results-ajax-script.js', array('jquery') );
            wp_localize_script( 'loadmore_script_results', 'loadmore_params_results', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
            ) );
        
            wp_enqueue_script( 'loadmore_script_results' );
        }
    }
    
    add_action( 'wp_enqueue_scripts','results_load_more_scripts' );


    function results_loadmore_ajax_handler(){
 
        // prepare our arguments for the query
        $offset2 = $_POST["offsetPage"];
        
        if ($_POST["id"] == 'all') {

            $result_args = [

                'post_status'       => 'publish',
                'posts_per_page'    => 6,
                'post_type'         => 'results',
                'order'             => 'DESC',
                'meta_key'          => 'case_result_value',
                'orderby'           => 'meta_value_num',
                'order'             => 'DESC',
                'offset'            => esc_html($offset2),
                'post__not_in'      => array( $featured_ID )
            
            ];

        } else {

            $category = (isset($_POST["id"])) ? $_POST["id"] : 'all';
            $result_args = [

                'post_status'       => 'publish',
                'posts_per_page'    => 6,
                'post_type'         => 'results',
                'order'             => 'DESC',
                'meta_key'          => 'case_result_value',
                'orderby'           => 'meta_value_num',
                'order'             => 'DESC',
                'offset'            => esc_html($offset2),
                'category_name'     => $category
            
            ];

        }
     
        $result_query = new WP_Query( $result_args );
        if( $result_query->have_posts() ) :
        while( $result_query->have_posts() ): $result_query->the_post(); ?>
                        
        <?php get_template_part('block','results-output'); ?>   
     
        <?php endwhile;
     
        endif;
        die; // here we exit the script and even no wp_reset_query() required!
    }
     
    add_action('wp_ajax_loadmore_results', 'results_loadmore_ajax_handler'); // wp_ajax_{action}
    add_action('wp_ajax_nopriv_loadmore_results', 'results_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}



    // code blocks to make ajax work on testimonials

    function testimonials_load_more_scripts() {
        if (is_post_type_archive('testimonials')) {
            wp_register_script( 'loadmore_script_testimonials', get_stylesheet_directory_uri() . '/assets/js/src/testimonials-ajax-script.js', array('jquery') );
            wp_localize_script( 'loadmore_script_testimonials', 'loadmore_params_testimonials', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
            ) );
        
            wp_enqueue_script( 'loadmore_script_testimonials' );
        }
    }
    
    add_action( 'wp_enqueue_scripts','testimonials_load_more_scripts' );

    function testimonials_loadmore_ajax_handler(){
        $cat = (isset($_POST["id"])) ? $_POST["id"] : 'video';
	    $offset = $_POST["offsetPage"];

        $args = [
            'post_type' => 'testimonials',
            'meta_key' => 'review_type',
            'meta_value' => esc_html($cat),
            'post_status' => 'publish',
            'offset'=> esc_html($offset),
            'posts_per_page' => 10,
        ];

        $query = new WP_Query( $args );
        if( $query->have_posts() ) :
        while( $query->have_posts() ): $query->the_post(); ?>

        <?php get_template_part('block','testimonials-output'); ?>  

        <?php endwhile;
        endif;
        die;
        wp_reset_postdata();
    }

    add_action('wp_ajax_loadmore_testimonials','testimonials_loadmore_ajax_handler');
    add_action('wp_ajax_nopriv_loadmore_testimonials','testimonials_loadmore_ajax_handler');



    // code blocks to make ajax work on communitysupport

    function communitysupport_load_more_scripts() {
        if (is_post_type_archive('communitysupport')) {
            wp_register_script( 'loadmore_script_communitysupport', get_stylesheet_directory_uri() . '/assets/js/src/communitysupport-ajax-script.js', array('jquery') );
            wp_localize_script( 'loadmore_script_communitysupport', 'loadmore_params_communitysupport', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
            ) );
        
            wp_enqueue_script( 'loadmore_script_communitysupport' );
        }
    }

    add_action( 'wp_enqueue_scripts','communitysupport_load_more_scripts' );

    function communitysupport_loadmore_ajax_handler(){
        $cat2 = (isset($_POST["id"])) ? $_POST["id"] : 'all';
        $offset2 = $_POST["offsetPage"];

        $args = [
            'posts_per_page'    => 10,
            'post_type'         => 'communitysupport', 
            'order'             => 'DESC',
            'post_status'       => 'publish',
            'offset'            => esc_html($offset2),
            'meta_query' => array (
                array (
                    'key'       => 'location', 
                    'value'     => esc_html($cat2),
                    'compare'   => 'LIKE'
                ),  
            ),

        ];

        $support_query = new WP_Query( $args );
        if( $support_query->have_posts() ) :
        while( $support_query->have_posts() ): $support_query->the_post(); ?>
                
            <?php get_template_part('block','communitysupport-output'); ?>         

        <?php endwhile;
        endif;
        die;
        wp_reset_postdata();
    
    }

    add_action('wp_ajax_loadmore_communitysupport','communitysupport_loadmore_ajax_handler');
    add_action('wp_ajax_nopriv_loadmore_communitysupport','communitysupport_loadmore_ajax_handler');

    function bal_http_request_args($r) {
        $r['timeout'] = 15;
        return $r;
    }
    add_filter('http_request_args', 'bal_http_request_args', 100, 1);
    
    function bal_http_api_curl($handle) {
        curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, 15 );
        curl_setopt( $handle, CURLOPT_TIMEOUT, 15 );
    }
    add_action('http_api_curl', 'bal_http_api_curl', 100, 1);




    /* ACF Register Blocks */
    function postali_register_acf_blocks() {
        register_block_type( __DIR__ . '/blocks/banner' );
        register_block_type( __DIR__ . '/blocks/cta' );
        register_block_type( __DIR__ . '/blocks/slider' );
        register_block_type( __DIR__ . '/blocks/accordions' );
        register_block_type( __DIR__ . '/blocks/map' );
        register_block_type( __DIR__ . '/blocks/columns' );

        wp_enqueue_style( 'blocks-styles', '/wp-content/themes/knr-legal/blocks/assets/css/styles.css' ); // Enqueue Child theme style sheet (theme info)
    }
    add_action( 'init', 'postali_register_acf_blocks' );

    
    function prefix_default_page_template( $settings ) {
        $settings['defaultBlockTemplate'] = file_get_contents( get_theme_file_path( 'page-gutenberg-block.php' ) );
        return $settings;
    }
    add_filter( 'block_editor_settings_all', 'prefix_default_page_template' );

// Exclude pages on PPC templates from Yoast XML sitemap
function exclude_posts_from_xml_sitemaps() {
	$templates = array(
		'page-ppc-landing.php',
		'page-ppc-detailed-landing.php',
        'page-ppc-landing_v2.php',
        'page-ppc-landing_v3.php',
        'page-ppc-landing-pmax.php',
        'ppc-block.php'
	);

	$ppc_ids = array();
	foreach ( $templates as $template ) {
		//get_page_id_by_template($template);
		$args = [
			'post_type'  => 'page',
			'fields'     => 'ids',
			'nopaging'   => true,
			'meta_key'   => '_wp_page_template',
			'meta_value' => $template
		];

		$ppc_pages = get_posts( $args );
		$ppc_ids = array_merge($ppc_ids, $ppc_pages);
	}
	return ($ppc_ids);
}
add_filter( 'wpseo_exclude_from_sitemap_by_post_ids', 'exclude_posts_from_xml_sitemaps' );

// County Data Shortcode
function build_county_data_widget( $atts ) {

    ob_start();
    
     //styles
    wp_enqueue_style( 'knr_keystone_google_fonts', 'https://fonts.googleapis.com/css?family=Barlow:100,200,300,400,500,600,700,800,900|Montserrat:100,200,300,400,500,600,700,800,900' );
    wp_enqueue_style( 'knr_keystone_aos', get_stylesheet_directory_uri() . '/assets/css/aos.css' );
    wp_enqueue_style( 'knr_keystone_jsmaps_style', get_stylesheet_directory_uri() . '/lib/jsmap/jsmaps/jsmaps.css' );
    wp_enqueue_style( 'knr_keystone_style', get_stylesheet_directory_uri() . '/assets/css/knr-keystone.css' );

    //scripts
    wp_enqueue_script( 'knr_keystone_jquery_ui', get_stylesheet_directory_uri() . '/assets/js/keystone/jquery-ui.min.js', ' jquery ', true );
    wp_enqueue_script( 'knr_keystone_jquery_appear', get_stylesheet_directory_uri() . '/assets/js/keystone/jquery.appear.js', ' jquery ', true );
    wp_enqueue_script( 'knr_keystone_jquery_animateNumber', get_stylesheet_directory_uri() . '/assets/js/keystone/jquery.animateNumber.min.js', ' jquery ', true );
    wp_enqueue_script( 'knr_keystone_canvas', get_stylesheet_directory_uri() . '/assets/js/keystone/canvasjs.min.js', ' jquery ', true );
    wp_enqueue_script( 'knr_keystone_aos', get_stylesheet_directory_uri() . '/assets/js/keystone/aos.js', ' jquery ', true );

    get_template_part('block', 'county-shortcode', ['atts' => $atts]);

    return ob_get_clean();
}
add_shortcode( 'county_data_widget', 'build_county_data_widget' );

function custom_mce_buttons($buttons) {
    // Add your custom button to the array
    $buttons[] = 'custom_button';

    return $buttons;
}
add_filter('mce_buttons', 'custom_mce_buttons');

function custom_mce_external_plugins($plugins) {
    // Add a JavaScript file that will handle the custom button functionality
    $plugins['custom_button'] = get_stylesheet_directory_uri() . '/assets/js/custom-button.min.js';
    
    return $plugins;
}
add_filter('mce_external_plugins', 'custom_mce_external_plugins');

function retrieve_latest_gform_submissions() {
    $site_url = get_site_url();
    $search_criteria = [
        'status' => 'active'
    ];
    $form_ids = 2; //search all forms
    $sorting = [
        'key' => 'date_created',
        'direction' => 'DESC'
    ];
    $paging = [
        'offset' => 0,
        'page_size' => 5
    ];
    
    $submissions = GFAPI::get_entries($form_ids, null, $sorting, $paging);
    $start_date = date('Y-m-d H:i:s', strtotime('-5 day'));
    $end_date = date('Y-m-d H:i:s');
    $entry_in_last_5_days = false;
    
    foreach ($submissions as $submission) {
        if( $submission['date_created'] > $start_date  && $submission['date_created'] <= $end_date ) {
            $entry_in_last_5_days = true;
        } 
    }
    if( !$entry_in_last_5_days ) {
        wp_mail('webdev@postali.com', 'Submission Status', "No submissions in last 5 days on $site_url");
    }
}
add_action('check_form_entries', 'retrieve_latest_gform_submissions');

// Disable category feeds
add_action('do_feed', 'disable_category_feed', 1);
add_action('do_feed_rss2', 'disable_category_feed', 1);
add_action('do_feed_atom', 'disable_category_feed', 1);
add_action('do_feed_rdf', 'disable_category_feed', 1);

function disable_category_feed() {
    if (is_category()) {
        wp_die(__('Category feeds are disabled.', 'your-theme-textdomain'), '', array('response' => 403));
    }
}

/**
 * Disable Theme/Plugin File Editors in WP Admin
 * - Hides the submenu items
 * - Blocks direct access to editor screens
 */
function postali_disable_file_editors_menu() {
    // Remove Theme File Editor from Appearance menu
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    // Optional: also remove Plugin File Editor from Plugins menu
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'postali_disable_file_editors_menu', 999 );

// Block direct access to the editors even if someone knows the URL
function postali_block_file_editors_direct_access() {
    wp_die( __( 'File editing through the WordPress admin is disabled.' ), 403 );
}
add_action( 'load-theme-editor.php', 'postali_block_file_editors_direct_access' );
add_action( 'load-plugin-editor.php', 'postali_block_file_editors_direct_access' );

/**
 * Disable the Additional CSS panel in the Customizer.
 * Primary method: remove the custom_css component early in load.
 */
function postali_disable_customizer_additional_css_component( $components ) {
    $key = array_search( 'custom_css', $components, true );
    if ( false !== $key ) {
        unset( $components[ $key ] );
    }
    return $components;
}
add_filter( 'customize_loaded_components', 'postali_disable_customizer_additional_css_component' );

/**
 * Fallback: remove the Additional CSS section if it's present.
 */
function postali_remove_customizer_additional_css_section( $wp_customize ) {
    if ( method_exists( $wp_customize, 'remove_section' ) ) {
        $wp_customize->remove_section( 'custom_css' );
    }
}
add_action( 'customize_register', 'postali_remove_customizer_additional_css_section', 20 );


?>