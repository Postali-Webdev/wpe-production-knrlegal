<?php
/**
 * Post Archive - Managers
 *
 * @package KNR Legal
 * @author Postali LLC
 */


get_header(); ?>

<div class="body-container">    

    <section class="attorney-search">
        <div class="container">
            <div class="columns">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                <div class="column-full block">
                    <h1>Our Directors</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="all-attorneys">
        <div class="container">
            <div class="columns">
            <?php while( have_posts() ) : the_post(); ?>
                <div class="column-25 block">
                    <div class="attorney-profile-box">
                        <div class="attorney-photo">
                           <?php 
                            $image = get_field('attorney_photo');
                            if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="attorney-details">
                            <p class="name"><?php echo get_field('first_name') . ' ' . get_field('last_name'); ?></p>
                            <p class="title"><?php the_field('job_title'); ?></p>
                            <p class="small"><strong>E</strong> <a href="mailto:<?php the_field('email_address'); ?>" title="Call <?php the_title(); ?> today"><?php the_field('email_address'); ?></a></p>
                            <p class="small"><strong>P</strong> <a href="tel:<?php echo get_field('phone_number') . ',' . get_field('phone_number_extension'); ?>" title="Call <?php the_title(); ?> today"><?php echo get_field('phone_number') . ' ext. ' . get_field('phone_number_extension'); ?></a></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
            
            </div>
        </div>
    </section>

</div>

<section class="black">
    <div class="container">
        <div class="columns">
            <div class="column-66 center centered block">
                <div class="memorial-photo">
                <?php 
                    $robert = get_field('memorial_photo','options');
                    if( !empty( $robert ) ): ?>
                        <img src="<?php echo esc_url($robert['url']); ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                </div>
                <div class="photo-caption">
                    <?php the_field('memorial_photo_caption','options'); ?>
                </div>
                <div class="spacer-30"></div>
                <h2><?php the_field('memorial_headline','options'); ?></h2>
                <a href="<?php the_field('memorial_button_link','options'); ?>" title="More about Robert Redick" class="btn green rounded"><?php the_field('memorial_button_text','options'); ?></a>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
