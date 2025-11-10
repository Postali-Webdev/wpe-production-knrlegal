<?php
/**
 * The file that defines the keystone class.
 *
 * @package Knr
 * @subpackage Knr/includes
 */

/**
 * Defines and registers hooks for the keystone.
 *
 * @package Knr
 * @subpackage Knr/includes
 * @author Jake Rider <jrider@postali.com>
 */
class Knr_Keystone {
	private $data;
	public $counties;
	public $ohio_data;

	/**
	 * Register the keystone's hooks.
	 */
	public function __construct() {
		$this->data      = $this->get_accident_data();
		$this->counties  = $this->data['county_stats'];
		$this->ohio_data = $this->data['state_stats'];

		add_action( 'wp_enqueue_scripts', [ $this, 'remove_styles' ], 20 );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_filter( 'query_vars', [ $this, 'knr_register_query_vars' ] );
		add_action( 'init', [ $this, 'knr_rewrite_rules' ] );
	}

	public static function generate_practice_area_link_name( string $office, string $practice_area ) : string {
		if ( 'akron' === $office || 'cleveland' === $office || 'columbus' === $office ) {
			return ucwords( "{$office} {$practice_area} Accident Attorneys" );
		} else {
			return ucwords( "Ohio {$practice_area} Accident Attorneys" );
		}
	}

	public static function generate_practice_area_link( string $office, string $practice_area ) : string {
		if ( 'akron' === $office || 'cleveland' === $office || 'columbus' === $office ) {
			return "/{$office}/practice-areas/{$practice_area}-accident-lawyers/";
		} else {
			return "/practice-areas/{$practice_area}-accidents/";
		}
	}

	public function knr_register_query_vars( array $vars ) : array {
		$vars[] = 'county';
		return $vars;
	}

	public function knr_rewrite_rules() {
		add_rewrite_rule(
			'^county/([^/]*)/?',
			'index.php?pagename=county&county=$matches[1]',
			'top'
		);
	}

	private function get_accident_data() : array {
		$url      = get_stylesheet_directory_uri() . '/json/crime-data/2023.json';
		$response = wp_safe_remote_get( $url, [ 'sslverify' => false ] );
		$body     = wp_remote_retrieve_body( $response );
		$data     = json_decode( $body, true );
		return $data;
	}

	/**
	 * Dequeue unused CSS.
	 *
	 * @return void
	 */
	public function remove_styles() {
		if ( is_page( 'interactive-ohio-traffic-data-map' ) || is_page( 'county' ) ) {
			wp_dequeue_style( 'stylesheet' );
			wp_deregister_style( 'stylesheet' );
			wp_dequeue_style( 'default_style' );
			wp_deregister_style( 'default_style' );
			wp_dequeue_style( 'childstyle' );
			wp_deregister_style( 'childstyle' );
			wp_dequeue_style( 'responsive' );
			wp_deregister_style( 'responsive' );
			wp_dequeue_style( 'style_dynamic' );
			wp_deregister_style( 'style_dynamic' );
			wp_dequeue_style( 'style_dynamic_responsive' );
			wp_deregister_style( 'style_dynamic_responsive' );
		}
	}

	/**
	 * Enqueue necessary CSS.
	 *
	 * @return void
	 */
	public function enqueue_styles() {
		if ( is_page( 'interactive-ohio-traffic-data-map' ) || is_page( 'county' ) ) {
			wp_enqueue_style( 'knr_keystone_bootstrap_style', get_stylesheet_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css' );
			wp_enqueue_style( 'knr_keystone_google_fonts', 'https://fonts.googleapis.com/css?family=Barlow:100,200,300,400,500,600,700,800,900|Montserrat:100,200,300,400,500,600,700,800,900' );
			wp_enqueue_style( 'knr_keystone_aos', get_stylesheet_directory_uri() . '/assets/css/aos.css' );
			wp_enqueue_style( 'knr_keystone_jsmaps_style', get_stylesheet_directory_uri() . '/lib/jsmap/jsmaps/jsmaps.css' );
			wp_enqueue_style( 'knr_keystone_style', get_stylesheet_directory_uri() . '/assets/css/knr-keystone.css' );
		}
	}

	/**
	 * Enqueue necessary JavaScript.
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		if ( is_page( 'interactive-ohio-traffic-data-map' ) || is_page( 'county' ) ) {
			wp_enqueue_script( 'knr_keystone_jquery_ui', get_stylesheet_directory_uri() . '/assets/js/keystone/jquery-ui.min.js', ' jquery ', true );
			wp_enqueue_script( 'knr_keystone_jquery_appear', get_stylesheet_directory_uri() . '/assets/js/keystone/jquery.appear.js', ' jquery ', true );
			wp_enqueue_script( 'knr_keystone_jquery_animateNumber', get_stylesheet_directory_uri() . '/assets/js/keystone/jquery.animateNumber.min.js', ' jquery ', true );
			wp_enqueue_script( 'knr_keystone_jsmaps_libs', get_stylesheet_directory_uri() . '/lib/jsmap/jsmaps/jsmaps-libs.js', ' jquery ', true );
			wp_enqueue_script( 'knr_keystone_jsmaps_panzoom', get_stylesheet_directory_uri() . '/lib/jsmap/jsmaps/jsmaps-panzoom.js', ' jquery ', true );
			wp_enqueue_script( 'knr_keystone_jsmaps', get_stylesheet_directory_uri() . '/lib/jsmap/jsmaps/jsmaps.min.js', ' jquery ', true );
			wp_enqueue_script( 'knr_keystone_jsmaps_ohio', get_stylesheet_directory_uri() . '/lib/jsmap/maps/ohio.js', ' jquery ', true );
			wp_enqueue_script( 'knr_keystone_bootstrap_script', get_stylesheet_directory_uri() . '/lib/bootstrap/js/bootstrap.min.js', ' jquery ', true );
			wp_enqueue_script( 'knr_keystone_aos', get_stylesheet_directory_uri() . '/assets/js/keystone/aos.js', ' jquery ', true );
			wp_enqueue_script( 'knr_keystone_canvas', get_stylesheet_directory_uri() . '/assets/js/keystone/canvasjs.min.js', ' jquery ', true );
			wp_enqueue_script( 'knr_keystone_highcharts', get_stylesheet_directory_uri() . '/assets/js/keystone/highcharts.js', ' jquery ', true );
			wp_enqueue_script( 'knr_keystone_highcharts_3d', get_stylesheet_directory_uri() . '/assets/js/keystone/highcharts-3d.js', ' jquery ', true );

			if ( is_page( 'county' ) ) {
				$county_age_accidents = $this->counties[ get_query_var( 'county' ) ]['accidents']['per_age_group'];
				$localization_data    = [
					'countyName'    => ucwords( get_query_var( 'county' ) ),
					'countyAgeData' => $county_age_accidents,
					'stateAgeData'  => $this->ohio_data,
					'countySum'     => $county_age_accidents['sum'],
					'stateSum'      => $this->ohio_data['sum'],
				];

				wp_enqueue_script( 'knr_keystone_county_script', get_stylesheet_directory_uri() . '/assets/js/keystone/knr-keystone-county.js', ' jquery ', true );
				wp_localize_script( 'knr_keystone_county_script', 'knrKeystoneCountyData', $localization_data );
			}

			if ( is_page( 'interactive-ohio-traffic-data-map' ) ) {
				wp_enqueue_script( 'knr_keystone_landing_script', get_stylesheet_directory_uri() . '/assets/js/keystone/knr-keystone-landing.js', ' jquery ', true );
			}
		}
	}
}
