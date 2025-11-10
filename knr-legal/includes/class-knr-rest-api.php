<?php
/**
 * The file that defines the RESTful API.
 *
 * @package    KNR
 * @subpackage KNR/includes
 */

/**
 * The API controller.
 *
 * This is used to define routes using the WP-JSON system. It currently
 * includes an endpoint for crime data.
 *
 * @package    KNR
 * @subpackage KNR/includes
 * @author     Postali
 */
class Knr_Rest_Api {
	/**
	 * Initalize the REST controller.
	 *
	 * Load dependencies. Add actions for all routes that need registering.
	 */
	public function __construct() {
		add_action( 'rest_api_init', [ $this, 'register_routes' ] );
	}

	/**
	 * Register all routes.
	 */
	public function register_routes() {
		register_rest_route( 'crime-stats', '/2023', [
			'methods'  => 'GET',
			'callback' => [ $this, 'get_crime_stats' ],
		] );

		register_rest_route( 'knr/v1', '/post-filter', [
			'methods'  => 'GET',
			'callback' => [ $this, 'post_filter_callback' ],
		] );
	}

	/**
	 * Retrieve crime data from JSON file.
	 */
	public function get_crime_stats() {
		$directory = trailingslashit( get_stylesheet_directory_uri() );
		$url       = $directory . '/json/crime-data/2023.json';
		$response  = wp_safe_remote_get( $url, [ 'sslverify' => false ] );
		$body      = wp_remote_retrieve_body( $response );
		$data      = json_decode( $body );

		return $data;
	}

	/**
	 * Handle the callback for the post filter.
	 *
	 * @param WP_REST_Request $request The request.
	 * @return array
	 */
	public function post_filter_callback( $request ) {
		$args = [
			'post_type'     => 'newsarticle',
			'category_name' => $request['category'],
			'paged'         => $request['page'],
		];

		$query       = new WP_Query( $args );
		$total_pages = $query->max_num_pages;

		ob_start();
		require get_stylesheet_directory() . '/partials/knr-news-post.php';
		$posts = ob_get_clean();

		return [
			'posts'      => $posts,
			'totalPages' => $total_pages,
		];
	}
}
