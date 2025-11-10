<?php
/**
 * Template Name: County
 *
 * Description: The county template for the Keystone. Not for general use.
 *
 * @package Knr
 */

if ( empty( get_query_var( 'county' ) ) ) {
	wp_safe_redirect( get_site_url( null, '/interactive-ohio-traffic-data-map/', 'https' ), '301' );
	exit;
}

$county    = $knr_keystone->counties[ get_query_var( 'county' ) ];
$ohio_data = $knr_keystone->ohio_data;

get_header();
?>
<div class="county-nav-bar">
	<a href="/interactive-ohio-traffic-data-map/">
		<svg
			xmlns="http://www.w3.org/2000/svg"
			viewBox="0 0 200 181.86"
			fill="currentColor"
			height="1em"
		>
			<polygon points="200 0 139.5 0 82.93 90.93 139.5 181.86 200 181.86 143.44 90.93 200 0"/>
			<polygon points="117.07 0 56.56 0 0 90.93 56.56 181.86 117.07 181.86 60.51 90.93 117.07 0"/>
		</svg>
		Back to Ohio Accident Statistics Chart
	</a>
</div>
<main class="interactive-map">
	<div class="wrapper accidents">
		<h1 class="county-name-header"><?php echo esc_html( $county['name'] ); ?> COUNTY</h1>
		<div class="statistic">
			<ul class="data-counties">
				<li><span>POPULATION:</span><?php echo number_format( $county['population'], 0, '.', ',' ); ?></li>
				<li><span>TOTAL AREA:</span><?php echo number_format( $county['square_mileage'], 1, '.', ',' ); ?> mi²</li>
			</ul>
			<div class="data">
				<h4><?php echo esc_html( $county['name'] ); ?> COUNTY RANKS <span class="county-number" ><?php echo esc_html( $county['ranking'] ); ?><sup><?php echo esc_html( $prefix ); ?>*</sup></span>OUT OF 88 OHIO COUNTIES</h4>
				<ul>
					<li class="border-line"><span class="in-county">IN</span></li>
					<li><span class="name">Accidents</span></li>
					<li class="border-line"><span class="population">per<br><small>capita</small></span></li>
				</ul>
				<p>* the lower the number, the more accidents per capita</p>
				<img
					src="<?php echo esc_attr( get_stylesheet_directory_uri() . '/images/keystone/county-speed.png' ); ?>"
					class="speed-diagram"
					alt="County"
				>
				<img
					src="<?php echo esc_attr( get_stylesheet_directory_uri() . '/images/keystone/arrow-light.png' ); ?>"
					class="arrow-diagram"
					alt="Arrow" data-aos=""
					data-county="<?php echo esc_attr( $county['ranking'] ); ?>"
				>
				<span class="speed-text">ACCIDENTS <br>PER CAPITA</span>
			</div>
			<div class="count-accidents">
				<h4><?php echo esc_html( $county['name'] ); ?> COUNTY HAD A TOTAL OF <br><span class="count number-bar" data-count="<?php echo esc_attr( $county['accidents']['total'] ); ?>"></span> TRAFFIC ACCIDENTS IN 2023</h4>
				<img src="<?php echo esc_attr( get_stylesheet_directory_uri() . '/images/keystone/count-accidents.png' ); ?>" alt="Accidents">
			</div>
		</div>

	</div>

	<div class="wrapper factors">
		<h2>CONTRIBUTING FACTORS</h2>
	</div>

	<div class="wrapper factor alcohol">
		<img src="<?php echo esc_attr( get_stylesheet_directory_uri() . '/images/keystone/arrow-down.png' ); ?>" class="arrow-down" alt="Alcohol">
		<div class="left-col content">
			<ul>
				<li><span class="quotient number-bar" data-count="<?php echo esc_attr( $county['accidents']['cause_percentages']['alcohol'] ); ?>"></span><span class="quotient">%</span></li>
				<li class="border-line"><span class="title-quotient">ALCOHOL <br>CONSUMPTION</span></li>
			</ul>
			<p><?php echo esc_html( $county['accidents']['cause_percentages']['alcohol'] ); ?>% of accidents in <?php echo esc_html( $county['name'] ); ?> County involved a driver who was under the influence of alcohol.</p>
			<div class="diagram">
				<h4>ALCOHOL RELATED <br>ACCIDENTS</h4>
				<div id="container-1" style="height: 180px; width: 180px;" data-color="#85b7b1" data-title="Alcohol Related:" data-number="<?php echo esc_attr( $county['accidents']['cause_percentages']['alcohol'] ); ?>"></div>
			</div>
		</div>
		<div class="right-col">
			<div class="factor-img">
				<img src="<?php echo esc_attr( get_stylesheet_directory_uri() . '/images/keystone/alcohol.png' ); ?>" alt="Alcohol">
				<img src="<?php echo esc_attr( get_stylesheet_directory_uri() . '/images/keystone/keys.png' ); ?>" class="keys" alt="Keys">
			</div>
		</div>
	</div>

	<div class="wrapper factor excessive-speed">
		<div class="left-col">
			<div class="factor-img">
				<picture>
					<source media="(max-width: 575px)" srcset="<?php echo esc_attr( get_stylesheet_directory_uri() . '/images/keystone/limit.png' ); ?>" alt="Speed">
					<img src="<?php echo esc_attr( get_stylesheet_directory_uri() . '/images/keystone/speds-bg.png' ); ?>" alt="Speed">
				</picture>
				<img src="<?php echo esc_attr( get_stylesheet_directory_uri() . '/images/keystone/moto.png' ); ?>" class="moto" alt="Speed" data-aos="">
				<img src="<?php echo esc_attr( get_stylesheet_directory_uri() . '/images/keystone/auto.png' ); ?>" class="auto" alt="Auto" data-aos="">
				<img src="<?php echo esc_attr( get_stylesheet_directory_uri() . '/images/keystone/lim.png' ); ?>" class="limit" alt="Speed">
			</div>
		</div>
		<div class="right-col content">
			<ul>
				<li><span class="quotient number-bar" data-count="<?php echo esc_attr( $county['accidents']['cause_percentages']['speeding'] ); ?>"></span><span class="quotient">%</span></li>
				<li class="border-line"><span class="title-quotient">excessive <br>speed</span></li>
			</ul>
			<p><?php echo esc_html( $county['accidents']['cause_percentages']['speeding'] ); ?>% of accidents in <?php echo esc_html( $county['name'] ); ?> County involved a driver who was driving at a speed in excess of the limit.</p>
			<div class="diagram">
				<h4>excessive speed</h4>
				<div id="container-2" style="height: 180px; width: 180px;" data-color="#cb413c" data-title="Excessive Speed:" data-number="<?php echo esc_attr( $county['accidents']['cause_percentages']['speeding'] ); ?>"></div>
			</div>
		</div>
	</div>
	
	<div class="wrapper factor fatality">
		<div class="left-col">
			<div class="factor-img">
				<picture>
					<source media="(max-width: 1199px)" srcset="<?php echo esc_attr( get_stylesheet_directory_uri() . '/images/keystone/fatality-2.png' ); ?>" alt="Speed">
					<img src="<?php echo esc_attr( get_stylesheet_directory_uri() . '/images/keystone/fatality-bg.png' ); ?>" alt="Speed">
				</picture>
			</div>
		</div>
		<div class="right-col content">
			<ul>
				<li><span class="quotient number-bar" data-count="<?php echo esc_attr( $county['accidents']['percent_fatal'] ); ?>"></span><span class="quotient">%</span></li>
				<li class="border-line"><span class="title-quotient">injury or <br>fatality</span></li>
			</ul>
			<p><?php echo esc_html( $county['accidents']['percent_fatal'] ); ?>% of accidents in <?php echo esc_html( $county['name'] ); ?> County resulted in an injury or fatality to the driver or passenger(s).</p>
			<div class="diagram">
				<h4>injury or fatality</h4>
				<div id="container-4" style="height: 180px; width: 180px;" data-color="#85b7b1" data-title="Injury or fatality:" data-number="<?php echo esc_attr( $county['accidents']['percent_fatal'] ); ?>"></div>
			</div>
		</div>
	</div>

	<div class="wrapper factor age-group" style="background: #d0d0d0">
		<p>The information provided in this interactive map has been sourced from the <a href="http://www.publicsafety.ohio.gov/" target="_blank" rel="noopener">Ohio Department of Public Safety</a>. The information has not been modified but has been organized to provide visual representation of important data sets. This is a service of Kisling, Nestico & Redick.</p>
	</div>
	<ul class="keystone-footer">
		<li><a href="<?php echo esc_attr( "/{$county['nearest_office']}/" ); ?>">KNR Local Office</a></li>
		<li><a href="<?php echo esc_attr( Knr_Keystone::generate_practice_area_link( $county['nearest_office'], 'car' ) ); ?>"><?php echo esc_html( Knr_Keystone::generate_practice_area_link_name( $county['nearest_office'], 'car' ) ); ?></a></li>
		<li><a href="<?php echo esc_attr( Knr_Keystone::generate_practice_area_link( $county['nearest_office'], 'truck' ) ); ?>"><?php echo esc_html( Knr_Keystone::generate_practice_area_link_name( $county['nearest_office'], 'truck' ) ); ?></a></li>
		<li><a href="<?php echo esc_attr( Knr_Keystone::generate_practice_area_link( $county['nearest_office'], 'motorcycle' ) ); ?>"><?php echo esc_html( Knr_Keystone::generate_practice_area_link_name( $county['nearest_office'], 'motorcycle' ) ); ?></a></li>
	</ul>
</main>
<?php get_footer(); ?>
