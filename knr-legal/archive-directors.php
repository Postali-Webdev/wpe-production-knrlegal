<?php
/**
 * Post Archive - Managers
 *
 * @package KNR Legal
 * @author Postali LLC
 */


get_header(); 


$wp_query = new WP_Query( array(
    'posts_per_page'    => -1,
    'post_type'         => 'Directors', 
    'order'             => 'ASC',
    'meta_key'			=> 'last_name',
	'orderby'			=> 'meta_value',
    'post_status'       => 'publish',
) );


?>

<div class="body-container">    

    <section class="attorney-search">
        <div class="container">
            <div class="columns">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                <div class="column-full block">
                    <h1>Our Leadership</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="all-attorneys">
        <div class="container">
            <div class="columns">
            <?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
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

<?php get_footer();
