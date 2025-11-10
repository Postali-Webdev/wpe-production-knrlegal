( function( $ ) {
	'use strict';

	var countyData = [];
	var stateData = [];

	/**
	 * Animate the needle of the dial on the county page.
	 *
	 * @returns {undefined}
	 */
	function animateDial() {
		var county = $( '.arrow-diagram' ).attr( 'data-county' );
		var rotateDeg = ( county * 2.7386 ) - 121 - 2.7386;

		$( '.arrow-diagram' ).css( 'transform', 'rotate(' + rotateDeg + 'deg)' );
	};

	/**
	 * Animate the accident statistic numbers.
	 *
	 * @returns {undefined}
	 */
	function animateNumberCountUp() {
		var countTo = $( this ).attr( 'data-count' );
		var commaSeparatorNumberStep = $.animateNumber.numberStepFactories.separator( ',' );

		if ( 1 > countTo ) {
			$( this ).text( '>1' );
		} else {
			$( this ).animateNumber(
					{
							number: countTo,
							numberStep: commaSeparatorNumberStep
					},
					1500
			);
		}
	}

	/**
	 * Generate datasets for the line graph.
	 *
	 * @returns {undefined}
	 */
	function generateLineGraphData() {
		$.each( knrKeystoneCountyData.countyAgeData, function( key, value ) {
			if ( 'sum' !== key ) {
				countyData.push({
					y: Math.round( ( value / knrKeystoneCountyData.countySum ) * 100 ),
					label: key.replace( '_', '–' )
				});
			}
		});

		$.each( knrKeystoneCountyData.stateAgeData, function( key, value ) {
			if ( 'sum' !== key ) {
				stateData.push({
					y: Math.round( ( value / knrKeystoneCountyData.stateSum ) * 100 ),
					label: key.replace( '_', '–' )
				});
			}
		});
	}

	/**
	 * Click handler for the line graph.
	 *
	 * @param {Object} event The click event.
	 * @returns {undefined}
	 */
	function toogleDataSeries( event ) {
		if ( 'undefined' === typeof( event.dataSeries.visible ) || event.dataSeries.visible ) {
				event.dataSeries.visible = false;
		} else {
				event.dataSeries.visible = true;
		}

		chart.render();
	}

	/**
	 * Create the line graph.
	 *
	 * @returns {undefined}
	 */
	function createLineGraph() {
		var chart = new CanvasJS.Chart( 'chartContainer', {
			interactivityEnabled: true,
			animationEnabled: true,
			animationDuration: 5000,
			theme: 'light2',
			backgroundColor: 'transparent',
			colorSet: '#666',
			title: { text: '' },
			axisX: {
					margin: 90,
					labelFontSize: 24,
					labelFontFamily: 'Barlow, sans-serif',
					labelFontWeight: 500,
					tickLength: 25,
					tickThickness: 0,
					lineColor: '#494946',
					lineThickness: 2,
					crosshair: { enabled: true, snapToDataPoint: true }
			},
			axisY: {
					labelFontSize: 24,
					labelFontFamily: 'Barlow, sans-serif',
					labelFontWeight: 500,
					tickThickness: 0,
					tickLength: 10,
					suffix: '%',
					title: '',
					crosshair: { enabled: true },
					gridColor: '#494946'
			},
			toolTip: { shared: true },
			legend: { cursor: 'pointer', itemclick: toogleDataSeries },
			data: [ {
					type: 'line',
					showInLegend: false,
					lineThickness: 3,
					markerSize: 12,
					name: 'OHIO (ALL COUNTIES)',
					color: '#85b7b1',
					dataPoints: stateData
				},
				{
					type: 'line',
					showInLegend: false,
					lineThickness: 3,
					markerSize: 12,
					name: knrKeystoneCountyData.countyName,
					markerType: 'circle',
					color: '#e24930',
					dataPoints: countyData
				} ]
		});

		chart.render();
	}

	/**
	 * Create the pie charts.
	 *
	 * @param {Object} event The click event.
	 * @returns {undefined}
	 */
	function generatePieChart( event ) {
		var data_color = $( '#' + event.target.id ).attr( 'data-color' );
		var	data_number = $( '#' + event.target.id ).attr( 'data-number' );
		var data_title = $( '#' + event.target.id ).attr( 'data-title' );
		var number = 100 - data_number;

		var diagram = new CanvasJS.Chart( event.target.id, {
				animationEnabled: true,
				backgroundColor: 'transparent',
				color: 'transparent',
				title: {
						text: '',
						horizontalAlign: 'left'
				},
				data: [ {
						type: 'doughnut',
						startAngle: 270,
						innerRadius: 55,
						indexLabelFontSize: 14,
						indexLabel: '',
						toolTipContent: '{name} #percent%',
						dataPoints: [
								{ y: +number, name: 'Other:', color: '#d0d0d0',  indexLabelFontColor: '#d0d0d0'},
								{ y: +data_number, name: data_title, color: data_color,  indexLabelFontColor: data_color}
						]
				} ]
		});

		diagram.render();
	}

	/**
	 * Initalize libraries and register event listeners.
	 *
	 * @returns {undefined}
	 */
	function run() {
		var linkNav = document.querySelectorAll( '[id^="container"]' );
		var i = 0;

		AOS.init({
			duration: 900,
			delay: 100,
			once: true
		});

		// Set page title.
		document.title = knrKeystoneCountyData.countyName + ' County Auto Accident Statistics';

		generateLineGraphData();

		// Animate dial.
		$( '.arrow-diagram' ).appear( animateDial );

		// Animate number count-up.
		$( '.number-bar' ).appear( animateNumberCountUp );

		// Create line graph.
		$( '.line-canvas' ).appear( createLineGraph );

		//Create pie charts.
		for ( i; i < linkNav.length; i++ ) {
			$( '#' + linkNav[i].id ).appear( generatePieChart );
		}
	};

	$( function() {
		run();
	});
} ( jQuery ) );
