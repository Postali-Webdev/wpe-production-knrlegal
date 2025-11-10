<?php /* Template Name: Interactive Ohio Traffic Data Map */ ?>
<?php get_header(); ?>
<main class="interactive-map">
	<div class="wrapper bg-map">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-12 col-sm-12 col-lg-9">
					<img class="img-responsive" src="<?php echo esc_attr( get_stylesheet_directory_uri() . '/images/keystone/ohio.png' ); ?>">
					<h3 class="title">interactive ohio traffic data map</h3>
					<p class="text-screen">Hover over a county to reveal the county name. Once the county name is visible, click on the county to get more information on accident statistics within that area. You can also scroll to the bottom of the page and select a county from the dropdown menu.</p>
					<p class="responsive">Select a county from the drop-down menu below to find out more information regarding that county’s Ohio crash statistics.</p>
					<div class="block-map">
						<!-- Map html - add the below to your page -->
						<div class="jsmaps-wrapper" id="ohio-map"></div>
						<!-- End Map html -->
					</div>

					<div class="select-your-country">
						<h4>YOU CAN ALSO select YOUR COUNTY BELOW</h4>
						<label>
							<select id="county_select" class="county-select">
								<option value="">Select County</option>
								<?php foreach ( $knr_keystone->counties as $county ) : ?>
									<option value="/county/<?php echo esc_attr( strtolower( $county['name'] ) ); ?>/"><?php echo esc_html( $county['name'] ); ?> County</option>
								<?php endforeach; ?>
							</select>
						</label>
						<a href="javascript:void(0);" class="btn open-info">Go</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
