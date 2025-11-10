<?php
/**
 * Law Category Interior Page
 * Template Name: Find a Location
 * @package KNR Legal
 * @author Postali LLC
 */
get_header(); ?>

<div class="body-container">

    <section class="page-header <?php if (empty($featImg)) { ?>no-bottom-pad<?php } ?> black">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>                 </div>
                <div class="column-full center centered block">
                    <h1><?php the_title(); ?></h1>
                    <div class="spacer-60"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="interior-content black">
        <div class="container">
            <div class="columns">
                <div class="column-full block">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="pre-footer">
        <div class="container">
            <div class="columns">
                <div class="spacer-90"></div>
                <div class="column-66 center centered block">
                    <?php the_field('pre_footer_main_content_block'); ?>
                    <a href="tel:8004878669" title="Call KNR Today" class="bullet"><img src="/wp-content/uploads/2022/10/knr-hurt-now.png" alt="Call KNR Legal Today"></a>
                    <div class="spacer-15"></div>
                    <div class="pre-footer_bottom-text">12 Convenient Locations <span>//</span> Free Consultations <span>//</span> Available 24/7 <span>//</span> No Recovery, No Fee</div>
                </div>
            </div>
        </div>
    </section>

</div>
	
	
<?php get_footer(); ?>