<?php
$atts = $args['atts'];
$datatype = $atts['datatype'];

/** datatypes:
 * accidents
 * alcohol
 * speed
 * fatality
 */

if( $datatype == 'accidents' ) {
    $inline_script = 'accidents_inline_scripts';    
} elseif( $datatype == 'alcohol' || $datatype == 'speed' || $datatype == 'fatality' ) {
    $inline_script = 'alcohol_inline_scripts';
} else {
    $inline_script = 'accidents_inline_scripts';
}

if (!function_exists('get_json_data_from_theme_folder')) {
    function get_json_data_from_theme_folder($county_name) {

        if (!defined( get_stylesheet_directory_uri() . '/json/crime-data/2023.json' )) {
            $json_file_path = get_stylesheet_directory_uri() . '/json/crime-data/2023.json';
            $json_data = file_get_contents( $json_file_path );
            $county = json_decode($json_data);
            return $county->county_stats->$county_name;
        } 
    }
}

if (!defined( get_stylesheet_directory_uri() . '/json/crime-data/2023.json' )) {
    $county = get_json_data_from_theme_folder($atts['county']);
}

$population = number_format( $county->population, 0, '.', ',' );
$sqr_footage = number_format( $county->square_mileage, 1, '.', ',' );


if( $datatype == 'accidents' ) {
    $county_speed_img_src = esc_attr( get_stylesheet_directory_uri() . '/images/keystone/county-speed.png' );
    $arrow_img_src = esc_attr( get_stylesheet_directory_uri() . '/images/keystone/arrow-light.png' );
    $count_accident_img_src = esc_attr( get_stylesheet_directory_uri() . '/images/keystone/count-accidents.png' );

    $output = "
        <div class='wrapper accidents accidents-global-widget'>
        <h1 class='county-name-header'>{$county->name} COUNTY</h1>
        <div class='statistic'>
            <ul class='data-counties'>
                <li><span>POPULATION:</span> {$population}</li>
                <li><span>TOTAL AREA:</span> {$sqr_footage} mi²</li>
            </ul>
            <div class='data'>
                <h4> {$county->name} COUNTY RANKS <span class='county-number'>{$county->ranking}<sup>*</sup></span>OUT OF 88 OHIO COUNTIES</h4>
                <ul>
                    <li class='border-line'><span class='in-county'>IN</span></li>
                    <li><span class='name'>Accidents</span></li>
                    <li class='border-line'><span class='population'>per<br><small>capita</small></span></li>
                </ul>
                <p>* the lower the number, the more accidents per capita</p>
                <img src='{$county_speed_img_src}' class='speed-diagram' alt='County'>
                <img src='{$arrow_img_src}' style='transition:1000ms ease;' class='arrow-diagram' alt='Arrow' data-aos='' data-county='{$county->ranking}'>
                
            
                <span class='speed-text'>ACCIDENTS <br>PER CAPITA</span>
            </div>
            <div class='count-accidents'>
                <h4>{$county->name} COUNTY HAD A TOTAL OF <br><span class='count number-bar' data-count='{$county->accidents->total}'></span> TRAFFIC ACCIDENTS IN 2023</h4>
                <img src='{$count_accident_img_src}' alt='Accidents'>
            </div>
        </div>
    </div>";

} elseif( $datatype == 'alcohol' ) {
    $alcohol_img_src = esc_attr( get_stylesheet_directory_uri() . '/images/keystone/alcohol.png' );
    $keys_img_src = esc_attr( get_stylesheet_directory_uri() . '/images/keystone/keys.png' );
    $output = "
    <div class='wrapper factor alcohol alcohol-global-widget'>
		<div class='left-col content'>
			<ul>
				<li><span class='quotient number-bar' data-count='{$county->accidents->cause_percentages->alcohol}'></span><span class='quotient'>%</span></li>
				<li class='border-line'><span class='title-quotient'>ALCOHOL <br>CONSUMPTION</span></li>
			</ul>
			<p>{$county->accidents->cause_percentages->alcohol}% of accidents in {$county->name} County involved a driver who was under the influence of alcohol.</p>
			<div class='diagram'>
				<h4>ALCOHOL RELATED <br>ACCIDENTS</h4>
				<div id='container-1' style='height: 180px; width: 180px;' data-color='#85b7b1' data-title='Alcohol Related:' data-number='{$county->accidents->cause_percentages->alcohol}'></div>
			</div>
		</div>
		<div class='right-col'>
			<div class='factor-img'>
				<img src='{$alcohol_img_src}' alt='Alcohol'>
				<img src='{$keys_img_src}' class='keys' alt='Keys'>
			</div>
		</div>
	</div>    
    ";
} elseif( $datatype == 'speed' ) {
    $limit_img_src = esc_attr( get_stylesheet_directory_uri() . '/images/keystone/limit.png' );
    $speed_img_src = esc_attr( get_stylesheet_directory_uri() . '/images/keystone/speds-bg.png' );
    $moto_img_src = esc_attr( get_stylesheet_directory_uri() . '/images/keystone/moto.png' );
    $auto_img_src = esc_attr( get_stylesheet_directory_uri() . '/images/keystone/auto.png');
    $lim_img_src = esc_attr( get_stylesheet_directory_uri() . '/images/keystone/lim.png' );

    $output = "
    <div class='wrapper factor excessive-speed speed-global-widget'>
		<div class='left-col'>
			<div class='factor-img'>
				<picture>
					<source media='(max-width: 575px)' srcset='{$limit_img_src}' alt='Speed'>
					<img src='{$speed_img_src}' alt='Speed'>
				</picture>
				<img src='{$moto_img_src}' class='moto' alt='Speed' data-aos=''>
				<img src='{$auto_img_src}' class='auto' alt='Auto' data-aos=''>
				<img src='{$lim_img_src}' class='limit' alt='Speed'>
			</div>
		</div>
		<div class='right-col content'>
			<ul>
				<li><span class='quotient number-bar' data-count='{$county->accidents->cause_percentages->speeding}'></span><span class='quotient'>%</span></li>
				<li class='border-line'><span class='title-quotient'>excessive <br>speed</span></li>
			</ul>
			<p>{$county->accidents->cause_percentages->speeding}% of accidents in {$county->name} County involved a driver who was driving at a speed in excess of the limit.</p>
			<div class='diagram'>
				<h4>excessive speed</h4>
				<div id='container-2' style='height: 180px; width: 180px;' data-color='#cb413c' data-title='Excessive Speed:' data-number='{$county->accidents->cause_percentages->speeding}'></div>
			</div>
		</div>
	</div>
    ";
    
} elseif( $datatype == 'fatality' ) {
    $fatality_img_src = esc_attr( get_stylesheet_directory_uri() . '/images/keystone/fatality-2.png' );
    $fatality_bg_src = esc_attr( get_stylesheet_directory_uri() . '/images/keystone/fatality-bg.png' );
    $output = "
    	<div class='wrapper factor fatality fatality-global-widget'>
		<div class='left-col'>
			<div class='factor-img'>
				<picture>
					<source media='(max-width: 1199px)' srcset='{$fatality_img_src}' alt='Speed'>
					<img src='{$fatality_bg_src}' alt='Speed'>
				</picture>
			</div>
		</div>
		<div class='right-col content'>
			<ul>
				<li><span class='quotient number-bar' data-count='{$county->accidents->percent_fatal}'></span><span class='quotient'>%</span></li>
				<li class='border-line'><span class='title-quotient'>injury or <br>fatality</span></li>
			</ul>
			<p>{$county->accidents->percent_fatal}% of accidents in {$county->name} County resulted in an injury or fatality to the driver or passenger(s).</p>
			<div class='diagram'>
				<h4>injury or fatality</h4>
				<div id='container-4' style='height: 180px; width: 180px;' data-color='#85b7b1' data-title='Injury or fatality:' data-number='{$county->accidents->percent_fatal}'></div>
			</div>
		</div>
	</div>
    ";
}

echo $output;

if (!function_exists('accidents_inline_scripts')) {
    function accidents_inline_scripts() {
        ?>
        <script>
            ( function( $ ) {
                $(document).ready(function() {
                    //dial animation
                    function animateDial() {
                        var county = $( '.arrow-diagram' ).attr( 'data-county' );
                        var rotateDeg = ( county * 2.7386 ) - 121 - 2.7386;

                        $( '.arrow-diagram' ).css( 'transform', 'rotate(' + rotateDeg + 'deg)' );
                    };
                    $( '.arrow-diagram' ).appear( animateDial );

                    //counter animation
                    function animateNumberCountUp() {
                        var countTo = $( this ).attr( 'data-count' );
                        var commaSeparatorNumberStep = $.animateNumber.numberStepFactories.separator( ',' );
                        if ( 1 > countTo ) {
                            $( this ).text( '>1' );
                        } else {
                            $( this ).animateNumber({ number: countTo, numberStep: commaSeparatorNumberStep }, 1500);
                        }
                    }
                    $( '.number-bar' ).appear( animateNumberCountUp );
                })

            } ( jQuery ) );
        </script>
    <?php
    }
}

if (!function_exists('alcohol_inline_scripts')) {
    function alcohol_inline_scripts() {
        ?>
        <script>
        ( function( $ ) {
            $(document).ready(function() {

                //counter animation
                function animateNumberCountUp() {
                    var countTo = $( this ).attr( 'data-count' );
                    var commaSeparatorNumberStep = $.animateNumber.numberStepFactories.separator( ',' );
                    if ( 1 > countTo ) {
                        $( this ).text( '>1' );
                    } else {
                        $( this ).animateNumber({ number: countTo, numberStep: commaSeparatorNumberStep }, 1500);
                    }
                }
                $( '.number-bar' ).appear( animateNumberCountUp );

                /*Create the pie charts.*/
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

                /** * Initalize libraries and register event listeners. */
                function run() {
                    var linkNav = document.querySelectorAll( '[id^="container"]' );
                    var i = 0;

                    AOS.init({ duration: 900, delay: 100, once: true });

                    // Animate number count-up.
                    $( '.number-bar' ).appear( animateNumberCountUp );

                    //Create pie charts.
                    for ( i; i < linkNav.length; i++ ) {
                        $( '#' + linkNav[i].id ).appear( generatePieChart );
                    }
                };

                $( function() {
                    run();
                });
            })

        } ( jQuery ) );
        </script>
        <?php
    }
}

add_action('wp_footer', $inline_script);