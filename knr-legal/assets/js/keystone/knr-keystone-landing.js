( function( $ ) {
	'use strict';

	/**
	 * Initalize the interactive map.
	 *
	 * @returns {undefined}
	 */
	function loadMap() {
		if ( $( '#ohio-map' ).hasClass( 'jsmaps-wrapper' ) ) {
			$( '#ohio-map' ).JSMaps({
					map: 'ohio',
					hrefTarget: '_self'
			});
		}
	};

	/**
	 * Handle setting the link target to the selected county.
	 *
	 * @returns {undefined}
	 */
	function selectCounty() {
		var targetValue = $( this ).val();

		if ( ! targetValue ) {
				targetValue = 'javascript:void(0);';
		}

		$( '.open-info' ).attr( 'href', targetValue );
	};

	/**
	 * Initalize libraries and register event listeners.
	 *
	 * @returns {undefined}
	 */
	function run() {
		loadMap();

		$( '#county_select' ).on( 'change', selectCounty );
	}

	$( function() {
		run();
	});
} ( jQuery ) );
