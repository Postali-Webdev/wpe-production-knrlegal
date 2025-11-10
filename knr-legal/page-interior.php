<?php
/**
 * Law Category Interior Page
 * Template Name: Interior
 * @package KNR Legal
 * @author Postali LLC
 */
get_header(); ?>

<div class="body-container">

    <section class="page-header <?php if (empty($featImg)) { ?>no-bottom-pad<?php } ?>">
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

    <?php if (is_page('16522')) { ?> <!-- why hire a/b -->

        <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
        <?php if (!empty($featImg)) { ?>
        <section class="interior-header">
            <div class="container wide">
                <div class="columns">
                    <a class="column-full blog-header overlay" style="background-image:url(<?php echo $featImg[0]; ?>);" href="<?php the_field('video_url'); ?>" data-lity>
                        <span class="icon-play"></span>
                    </a>
                </div>
            </div>
        </section>
        <?php } ?>

    <?php } else { ?>

        <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
        <?php if (!empty($featImg)) { ?>
        <section class="interior-header">
            <div class="container wide">
                <div class="columns">
                    <div class="column-full blog-header" style="background-image:url(<?php echo $featImg[0]; ?>);">
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>

    <?php } ?>

    <?php if(is_page(14366)) { 
        
        // about our firm
        get_template_part('block','video-gallery'); 

    } ?>

    <section class="interior-content">
        <div class="container wide">
            <div class="columns">
                <div class="column-66 block center">
                    <?php the_content(); ?>

                    <?php if( is_page(18396) ) : ?>
                        
                        <div class="wish-lists">
                        <?php if( have_rows('wish_lists') ): ?>
                        <?php while( have_rows('wish_lists') ): the_row(); ?>  
                            <div class="column-full block">
                                <h3><?php the_sub_field('county'); ?></h3>
                                <?php if( have_rows('teacher_details') ): ?>
                                <ul class="wish-list">
                                    <?php while( have_rows('teacher_details') ): the_row(); ?>  
                                    <li><strong><?php the_sub_field('teacher_name'); ?></strong>  (<?php the_sub_field('school_district'); ?>)  &nbsp; | &nbsp; <a href="<?php the_sub_field('amazon_wish_list'); ?>" rel="nofollow" target="blank" class="no-highlight">Wishlist</a></li>
                                    <?php endwhile; ?>
                                </ul>
                                <?php endif; ?> 
                            </div>
                        <?php endwhile; ?>
                        <?php endif; ?> 
                        </div>

                    <?php endif; ?>

                    <?php if( is_page(14347) ) : ?>
                        <?php get_template_part('block','scholarship-slider'); ?>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </section>

    <?php if(is_page(14507)) { ?>
        
    <section class="our-awards">
        <div class="container wide">
            <div class="columns">
                <div class="column-66 block center">

                <?php if( have_rows('awards','options') ): ?>
                <?php while( have_rows('awards','options') ): the_row(); ?>  
                    <div class="awards-container">
                        <div class="award-logo">
                        <?php 
                        $logo = get_sub_field('award_logo');
                        if( !empty( $logo ) ): ?>
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                        <?php endif; ?>
                        </div>
                        <div class="award-description">
                            <h4><?php the_sub_field('award_title'); ?></h4>
                            <p><?php the_sub_field('award_description'); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?> 

                </div>
            </div>
        </div>
    </section>

    <?php } ?>


</div>
	
	
<?php get_footer(); ?>