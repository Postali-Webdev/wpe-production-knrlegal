<?php
/*
Template Name: PPC Detailed Landing
*/

/* declare variables */
$headerText = get_field('header_text_color');
$benefitsBG = get_field('benefits_background_color');
$benefitsText = get_field('benefits_txt_color');
$testimonialsBG = get_field('testimonials_background_color');
$testimonialsText = get_field('testimonials_txt_color');
$aboutBG = get_field('about_background_color');
$aboutText = get_field('about_txt_color');
$aboutColumns = get_field('attorneys_panel_layout');
	if ($aboutColumns == '5050') {
		$column1 = "50";
		$column2 = "50";
	} elseif ($aboutColumns == '6633') {
		$column1 = "66";
		$column2 = "33";
	}
$awardsBG = get_field('awards_background_color');
$resultsBG = get_field('results_background_color');
$resultsText = get_field('results_txt_color');
$ctaBG = get_field('cta_background_color');
$ctaText = get_field('cta_txt_color');
$pageFooterBG = get_field('page_footer_background_color');
$pageFooterText = get_field('page_footer_txt_color');

$east_pal = is_page( 16619 );

$review_banner = get_field('review_banner');
$review_banner_badge = $review_banner['review_badge'];

// Anchored Sectioons
$case_title = get_field('p1_section_anchor_title');
$case_anchor = strtolower( str_replace(' ', '-', get_field('p1_section_anchor_title')) );

$knr_title = get_field('p2_section_anchor_title');
$knr_anchor = strtolower( str_replace(' ', '-', get_field('p2_section_anchor_title')) );

$how_title = get_field('p3_section_anchor_title');
$how_anchor = strtolower( str_replace(' ', '-', get_field('p3_section_anchor_title')) );

$next_title = get_field('p4_section_anchor_title');
$next_anchor = strtolower( str_replace(' ', '-', get_field('p4_section_anchor_title')) );
?>
<?php get_header(); ?>

<div class="ppc-landing">

<?php $background_img = get_field('header_background_image'); ?>

    <section id="header" style="background-image:url(<?php echo esc_url($background_img['url']); ?>);">
		<?php if ( !( $east_pal == true ) ) { ?>
			<div class="mobile-bg" style="background-image:url(<?php echo esc_url($background_img['url']); ?>);">
				&nbsp;
			</div>
		<?php } ?>
		<div class="container">
			<div class="columns">	
                <div class="column-50">
                    <h1 style="color:<?php echo $headerText; ?>"><?php the_field('header_headline'); ?></h1>
                    <div class="spacer-15"></div>
                    <p class="header-intro" style="color:<?php echo $headerText; ?>"><?php the_field('header_value_proposition'); ?></p>
                    <div class="spacer-30"></div>
                    <p class="header-cta-text" style="color:<?php echo $headerText; ?>"><?php the_field('header_cta_text'); ?></p>
                    <div class="cta-row">
                        <a href="tel:<?php the_field('cta_phone_number'); ?>" title="Call Today" class="btn"><?php the_field('cta_phone_number'); ?></a>
                        <a class="anchor-text" href="#<?php esc_html_e( $case_anchor ); ?>"><?php esc_html_e( get_field('learn_more') . ' ' . $case_title ); ?></a>
                    </div>
                    <p style="color:<?php echo $headerText; ?>" class="lower-cta-text"><?php the_field('cta_text_lower'); ?></p>
                </div>		
                <div class="column-50">
                    <div class="header-cta-form"><?php the_field('form_embed'); ?></div>
                </div>
			</div>
		<div>
	</section>  


    <section id="in-page-nav">
        <div class="container">
            <div class="columns">
                <div class="column-50 center">
                    <div>
                        <p class="on-this-page">On This Page</p>
                        <div class="in-page-nav-row">
                            <a href="#<?php esc_html_e( $case_anchor ); ?>">01 <?php esc_html_e( $case_title ); ?></a>
                            <span class="vert-divide">|</span>
                            <a href="#<?php esc_html_e( $knr_anchor ); ?>">02 <?php esc_html_e( $knr_title ); ?></a>
                            <span class="vert-divide">|</span>
                            <a href="#<?php esc_html_e( $how_anchor ); ?>">03 <?php esc_html_e( $how_title ); ?></a>
                            <span class="vert-divide">|</span>
                            <a href="#<?php esc_html_e( $next_anchor ); ?>">04 <?php esc_html_e( $next_title ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-1">
        <span id="<?php esc_html_e( $case_anchor ); ?>"></span>
            <div class="container">
                <div class="columns card-bg">
                    <div class="column-75 centered center">
                        <div>
                            <div class="anchor-row">
                                <p>01 <?php esc_html_e( $case_title ); ?></p>
                                <span class="vert-divide">|</span>
                                <a href="#<?php esc_html_e( $knr_anchor ); ?>">Next Section: 02 <?php esc_html_e( $knr_title ); ?></a>
                            </div>
                            <h2><?php the_field('p1_section_title'); ?></h2>
                            <p class="bold-text"><?php the_field('p1_section_bold_sub_title'); ?></p>
                            <?php the_field('p1_section_copy'); ?>
                            <div class="cta-row">
                                <p class="header-cta-text" style="color:<?php echo $headerText; ?>"><?php the_field('header_cta_text'); ?></p>
                                <a href="tel:<?php the_field('cta_phone_number'); ?>" title="Call Today" class="btn"><?php the_field('cta_phone_number'); ?></a>
                                <p style="color:<?php echo $headerText; ?>" class="lower-cta-text"><?php the_field('cta_text_lower'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section id="benefits" style="background-color:<?php echo $benefitsBG; ?>">
        <span id="<?php esc_html_e( $knr_anchor ); ?>"></span>
        <div class="container">
            <div class="columns">
                <div class="column-full centered">
                    <div class="anchor-row">
                        <p>02 <?php esc_html_e( $knr_title ); ?></p>
                        <span class="vert-divide">|</span>
                        <a href="#<?php esc_html_e( $how_anchor ); ?>">Next Section: 03 <?php esc_html_e( $how_title ); ?></a>
                    </div>
                    <h2 style="color:<?php echo $benefitsText; ?>"><?php the_field('benefits_headline'); ?></h2>
                </div>
                <div class="spacer-60"></div>
                <?php if( have_rows('benefits_repeater') ): $count = 0; ?>
                <?php while( have_rows('benefits_repeater') ) : the_row(); $count++; ?>
                    <div class="column-33 centered">
                        <p class="number"><?php esc_html_e($count); ?></p>
                        <h4 style="color:<?php echo $benefitsText; ?>"><?php the_sub_field('benefit_title'); ?></h4>
                        <p style="color:<?php echo $benefitsText; ?>"><?php the_sub_field('benefit_copy'); ?></p>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <div class="spacer-60"></div>
                <div class="column-full centered cta">
                    <p class="header-cta-text" style="color:<?php echo $benefitsText; ?>"><?php the_field('p2_cta_copy'); ?></p>
                    <a href="tel:<?php the_field('cta_phone_number'); ?>" title="Call Today" class="btn"><?php the_field('cta_phone_number'); ?></a>
                    <?php $about_page = get_field('p2_learn_more_link'); ?>
                    <a href="<?php esc_html_e( $about_page['url'] ); ?>"><?php esc_html_e( $about_page['title'] ); ?></a>
                </div>
            </div>
        <div>
    </section>

    <section class="img-wrap">
        <div class="container">
            <div class="columns">
                <?php $team_image = get_field('attorney_group_photo'); ?>
                <img src="<?php esc_html_e( $team_image['url'] ); ?>" alt="<?php esc_html_e( $team_image['alt'] ); ?>">
            </div>
        </div>
    </section>

    <section id="panel-3">
        <span id="<?php esc_html_e( $how_anchor ); ?>"></span>
            <div class="container">
                <div class="columns card-bg">
                    <div class="column-75 centered center">
                        <div>
                            <div class="anchor-row">
                                <p>03 <?php esc_html_e( $how_title ); ?></p>
                                <span class="vert-divide">|</span>
                                <a href="#<?php esc_html_e( $next_anchor ); ?>">Next Section: 04 <?php esc_html_e( $next_title ); ?></a>
                            </div>
                            <h2><?php the_field('p3_section_title'); ?></h2>
                            <p class="bold-text"><?php the_field('p3_section_bold_sub_title'); ?></p>
                            <?php the_field('p3_section_copy'); ?>
                            <div class="cta-row">
                                <p class="header-cta-text" style="color:<?php echo $headerText; ?>"><?php the_field('header_cta_text'); ?></p>
                                <a href="tel:<?php the_field('cta_phone_number'); ?>" title="Call Today" class="btn"><?php the_field('cta_phone_number'); ?></a>
                                <p style="color:<?php echo $headerText; ?>" class="lower-cta-text"><?php the_field('cta_text_lower'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
	

	<section id="testimonials" style="background-color:<?php echo $testimonialsBG; ?>">
		<div class="container">
			<div class="columns">
                <div class="column-66">
                    <p class="subtitle">What Our Clients Say</p>
                    <span class="stars">★★★★★</span>
                    <h2 style="color:<?php echo $testimonialsText; ?>" ><?php the_field('testimonials_headline'); ?></h2>
                    <p style="color:<?php echo $testimonialsText; ?>"><?php the_field('testimonial_copy'); ?></p>
                    <p style="color:<?php echo $testimonialsText; ?>" class="testimonial_author"><span style="color:<?php echo $testimonialsText; ?>"><?php the_field('testimonial_author'); ?></span> <?php if( get_field('testimonial_location') ) : ?>| <span style="color:<?php echo $testimonialsText; ?>"><?php the_field('testimonial_location'); ?></span><?php endif; ?></p>
                    <?php $logo_img = get_field('testimonial_logo'); ?>
                    <?php if( !empty( $logo_img ) ): ?>
                        <img src="<?php echo esc_url($logo_img['url']); ?>" alt="<?php echo esc_attr($logo_img['alt']); ?>" class="testimonial-img" />
                    <?php endif; ?>
                </div>
			</div>
		<div>
	</section>

    <section id="panel-3">
        <span id="<?php esc_html_e( $next_anchor ); ?>"></span>
            <div class="container">
                <div class="columns card-bg">
                    <div class="column-75 centered center">
                        <div>
                            <div class="anchor-row">
                                <p>04 <?php esc_html_e( $next_title ); ?></p>
                            </div>
                            <h2><?php the_field('p4_section_title'); ?></h2>
                            <p class="bold-text"><?php the_field('p4_section_bold_sub_title'); ?></p>
                            <?php the_field('p4_section_copy'); ?>
                            <div class="cta-row">
                                <p class="header-cta-text" style="color:<?php echo $headerText; ?>"><?php the_field('header_cta_text'); ?></p>
                                <a href="tel:<?php the_field('cta_phone_number'); ?>" title="Call Today" class="btn"><?php the_field('cta_phone_number'); ?></a>
                                <p style="color:<?php echo $headerText; ?>" class="lower-cta-text"><?php the_field('cta_text_lower'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
	<section id="results">
		<div class="container">
			<div class="columns">
                <div class="column-66 center">
                    <p class="subtitle">Notable Case Result</p>
                    <?php the_field('results_copy'); ?>
                </div>
                <div class="column-full">

                    <?php $attorney_award = get_field('attorneys_or_awards'); if( $attorney_award == 'attorneys'  ) : ?>
                        <div class="attorney_blocks">
                            <?php if( have_rows('attorneys_repeater') ): ?>
                                <?php while( have_rows('attorneys_repeater') ) : the_row(); ?>
                                <div class="attorney-wrap">
                                    <a href="<?php the_sub_field('attorney_page_link'); ?>">
                                        <?php $attorney_img = get_sub_field('attorney_image'); ?>
                                        <?php if( !empty( $attorney_img ) ): ?>
                                            <img src="<?php echo esc_url($attorney_img['url']); ?>" alt="<?php echo esc_attr($attorney_img['alt']); ?>" class="attorney-img" />
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <?php else : ?>
                            <div class="award_blocks">
                            <?php if( have_rows('about_awards_repeater') ): ?>
                                <?php while( have_rows('about_awards_repeater') ) : the_row(); ?>
                                <div class="award-slick-wrap">
                                    <div class="award-wrap">
                                        <?php $award_img = get_sub_field('award_image'); ?>
                                        <?php if( !empty( $award_img ) ): ?>
                                            <img src="<?php echo esc_url($award_img['url']); ?>" alt="<?php echo esc_attr($award_img['alt']); ?>" class="award-img" />
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                </div>
			</div>
		</div>
	</section>








    <?php $footer_bg = get_field('footer_background_image'); ?>
	<section id="footer-cta" style="background-image: url('<?php esc_html_e( $footer_bg['url'] ); ?>');">
		<div class="container">
			<div class="columns">
				<div class="column-50 first">
					<h2 style="color:<?php echo $ctaText; ?>"><?php the_field('footer_value_proposition'); ?></h2>
					<p style="color:<?php echo $ctaText; ?>"><?php the_field('footer_incentive_offer'); ?></p>
					<div class="spacer-30"></div>
                    <div class="cta-row">
                    <p class="header-cta-text" style="color:<?php echo $headerText; ?>"><?php the_field('header_cta_text'); ?></p>
                        <a href="tel:<?php the_field('cta_phone_number'); ?>" title="Call Today" class="btn"><?php the_field('cta_phone_number'); ?></a>
                        <p style="color:<?php echo $headerText; ?>" class="lower-cta-text"><?php the_field('cta_text_lower'); ?></p>    
                    </div>
				</div>
				<div class="column-50">
					<div class="footer-cta-form"><?php the_field('form_embed'); ?></div>
				</div>
			</div>
		</div>
	</section>







	<section id="page-footer" style="background-color:<?php echo $pageFooterBG; ?>">
		<div class="container">
			<div class="columns">
				<div class="column-50 first">
				<div id="head-logo">
					<a href="/" class="custom-logo-link" rel="home" itemprop="url">
                        <img src="/wp-content/uploads/2022/08/KNR_Logo.svg" class="custom-logo" alt="KNR Legal">
					</a>
				</div>
				</div>
				<div class="column-50">
					<h3 style="color:<?php echo $pageFooterText; ?>"><?php the_field('page_footer_cta'); ?></h3>
					<p style="color:<?php echo $pageFooterText; ?>"><?php the_field('page_footer_disclaimer'); ?></p>
				</div>
			</div>
		</div>
	</section>

</div>

<?php get_footer(); ?>
