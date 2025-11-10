<?php
/**
 * Template Name: Post Archive - Testimonials
 * 
 * @package KNR Legal
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">

    <section class="page-header">
        <div class="container bordered">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns bottom">
                <div class="column-66 block">
                    <h1><?php the_field('testimonials_page_title','options'); ?></h1>
                    <?php
                    $review_left = get_field('testimonials_featured_review','options');
                    if( $review_left ): ?>
                        <?php $title = get_the_title( $review_left->ID );
                        $client_name = get_field( 'client_name', $review_left->ID );
                        $review_source = get_field( 'review_source', $review_left->ID );
                        ?>
                        <div class="author-rating"><span class="stars">★★★★★</span> <p><?php echo esc_html( $review_left->client_name ); ?></p></div>
                        <h3>"<?php echo esc_html( $review_left->post_content ); ?>"</h3>
                            <?php if ($review_source == 'google') { ?>
                                <img src="/wp-content/uploads/2022/09/reviews-google.png" class="review-logo">
                            <?php } else { ?>
                                <img src="/wp-content/uploads/2022/09/reviews-facebook.png" class="review-logo">
                            <?php } ?>
                    <?php endif; ?>
                    <div class="spacer-60 mobile"></div>
                </div>
                <div class="column-33 right">
                    <div class="review-rating">
                        <?php the_field('testimonials_rating_block','options'); ?>
                    </div>
                    <?php 
                    $image = get_field('testimonials_client_photo','options');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <div class="spacer-30 mobile"></div>

    <section class="toggle">
        <div class="container">
            <div class="testimonials-toggle-container">
                <div data="video" class="testimonial-toggle-item active btn rounded transparent">Video Testimonials</div>
                <div data="quote" class="testimonial-toggle-item btn rounded transparent">Client Reviews</div>
            </div>
        </div>
    </section>   

    <section id="results-holder">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                <div class="testimonial-holder">
                    <?php
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        $query = new WP_Query(array(
                            'posts_per_page'    => 10,
                            'post_type'         => 'testimonials', 
                            'meta_key'          => 'review_type',
                            'meta_value'        => 'video', 
                            'order'             => 'DESC',
                            'post_status'       => 'publish',
                            'paged'             => 1
                        ));
                        
                        while ($query->have_posts()): $query->the_post(); ?>  
                        
                        <?php get_template_part('block','testimonials-output'); ?> 

                        <?php endwhile; ?>
                    </div>
                    
                    <div class="spacer-30"></div>

                    <div class="load_more">
                        <a href="#!" class="btn transparent rounded testimonials-btn-load-more">Load More Reviews</a> 
                    </div>

                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div><!-- #content -->
    </section>    

</div>



<?php get_footer(); ?>

