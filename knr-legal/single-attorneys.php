<?php
/**
 * Single template - Attorneys
 *
 * @package KNR Legal
 * @author Postali LLC
 */


get_header();?>

<div class="body-container">

    <section class="bio-top">
        <div class="container">
        <?php while( have_posts() ) : the_post(); ?>
            <div class="columns">
                <div class="column-50 bio-top-left">
                <?php 
                $image = get_field('attorney_photo');
                if( !empty( $image ) ): ?>
                    <div class="attorney-image" style="background-image:url('<?php echo esc_url($image['url']); ?>');"></div>
                <?php endif; ?>
                    <div class="bio-practice-areas">
                        <div class="accordions">
                            <div class="accordions_title"><h3><?php the_field('first_name'); ?>'s Areas of Practice</h3><span></span></div>
                            <div class="accordions_content"><?php the_field('areas_of_practice'); ?></div>
                        </div>
                    </div>
                </div>

                <div class="column-50 bio-top-right block">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    <div class="spacer-30 mobile"></div>
                    <p class="sub-text">Our Team</p>
                    <h1><?php the_title(); ?></h1>
                    <p class="attorney-title"><?php the_field('attorney_title'); ?></p>
                    <?php the_content(); ?>
                </div>
            </div>
        </section>

        <section class="bio-bottom">
            <div class="container wide">
                <div class="columns professional-details">

                    <?php if(get_field('professional_profiles_reviews')) { ?>
                    <div class="column-33 pro-details block">
                        <p class="pro-details-header">Professional Profiles and Reviews</p>
                        <?php the_field('professional_profiles_reviews'); ?>
                    </div>
                    <?php } ?>

                    <?php if(get_field('bar_admissions')) { ?>
                    <div class="column-33 pro-details block">
                        <p class="pro-details-header">Bar Admissions</p>
                        <?php the_field('bar_admissions'); ?>
                    </div>
                    <?php } ?>

                    <?php if(get_field('education')) { ?>
                    <div class="column-33 pro-details block">
                        <p class="pro-details-header">Education</p>
                        <?php the_field('education'); ?>
                    </div>
                    <?php } ?>

                    <?php if(get_field('honors_awards')) { ?>
                    <div class="column-33 pro-details block">
                        <p class="pro-details-header">Honors & Awards</p>
                        <?php the_field('honors_awards'); ?>
                    </div>
                    <?php } ?>

                    <?php if(get_field('professional_memberships')) { ?>
                    <div class="column-33 pro-details block">
                        <p class="pro-details-header">Professional Associations</p>
                        <?php the_field('professional_memberships'); ?>
                    </div>
                    <?php } ?>

                    <?php if(get_field('professional_experience')) { ?>
                    <div class="column-33 pro-details block">
                        <p class="pro-details-header">Professional Experience</p>
                        <?php the_field('professional_experience'); ?>
                    </div>
                    <?php } ?>

                    <?php if ( have_rows('add_creds') ) : 
                        while ( have_rows('add_creds') ) : the_row(); ?>
                            <div class="column-33 pro-details block">
                                <p class="pro-details-header"><?php the_sub_field('add_cred_title'); ?></p>
                                <?php the_sub_field('add_cred_content'); ?>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </section>

    <?php endwhile; ?>

    <?php get_template_part('block','attorney-slider'); ?>

</div>

<?php get_footer(); ?>