<?php
/**
 * Law Category FAQ Page
 * Template Name: FAQ
 * @package KNR Legal
 * @author Postali LLC
 */
get_header(); ?>

<div class="body-container">

    <section class="page-header">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>                 </div>
                <div class="column-full center centered block">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="interior-header">
        <div class="container wide">
            <div class="columns">
                <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                <div class="column-full blog-header" style="background-image:url(<?php echo $featImg[0]; ?>);">
                </div>
            </div>
        </div>
    </section>

    <section class="interior-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block center">
                    <?php the_content(); ?>

                    <?php if( have_rows('faqs') ): ?>
                        <div class="accordions">
                            <?php while( have_rows('faqs') ) : the_row(); 
                                $headline = get_sub_field('faq_question');
                                $content = get_sub_field('faq_answer'); ?>
                                <div class="accordions_title"><h3><?php echo $headline; ?></h3><span></span></div>
                                <div class="accordions_content"><?php echo $content; ?></div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

</div>
	
	
<?php get_footer(); ?>