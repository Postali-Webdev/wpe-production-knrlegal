<?php
/**
 * Law Category Interior Page
 * Template Name: Hona
 * @package KNR Legal
 * @author Postali LLC
 */
get_header(); ?>

<div class="body-container">

    <section class="page-header <?php if (empty($featImg)) { ?>no-bottom-pad<?php } ?>">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?></div>
                <div class="column-full center centered block">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="interior-content">
        <div class="container wide">
            <div class="columns">
                <div class="column-66 block center">
                    <?php the_content(); ?>                    
                </div>
            </div>
        </div>
    </section>
</div>
	
<?php get_footer(); ?>