<?php
/**
 * Template Name: Form Success
 * @package KNR Legal
 * @author Postali LLC
**/
get_header();?>

<div id="front-page">

    <div class="body-container">

        <section class="hp-main-banner">
            <div class="container bordered">
                <div class="columns bottom">
                    <div class="column-50 block">
                        <?php the_field('banner_left_content'); ?>
                        <div class="spacer-15"></div>
                        <div class="banner-cta">
                            <a href="/" title="Back to homepage" class="btn black">Back to Homepage</a> &nbsp; &nbsp; <a href="/results/" title="View our case results" class="btn black">View our results</a> 
                            <div class="spacer-30"></div>
                            <p class="small">12 Ohio Locations // Free Consultations // Available 24/7 // No Recovery, No Fee</p>
                        </div>
                        <div class="spacer-60"></div>
                    </div>
                    <div class="column-50 centered">
                        <?php 
                            set_query_var('random_partner','both');
                            get_template_part('block','random-partner'); 
                            set_query_var('random_partner', false);
                        ?>
                    </div>
                </div>
            </div>
            <div class="spacer-30"></div>
            <div class="container">
                <div class="columns">
                    <div class="column-50 review">
                    <?php
                    $review_left = get_field('banner_review_left');
                    if( $review_left ): ?>
                        <?php $title = get_the_title( $review_left->ID );
                        $client_name = get_field( 'client_name', $review_left->ID );
                        $review_source = get_field( 'review_source', $review_left->ID );
                        ?>
                        <h4>"<?php echo esc_html( $review_left->post_content ); ?>"</h4>
                        <div class="author-rating"><span class="stars">★★★★★</span> <p class="small"><?php echo esc_html( $review_left->client_name ); ?></p></div>
                    <?php endif; ?>
                    </div>
                    <div class="column-50 review">
                    <?php
                    $review_right = get_field('banner_review_right');
                    if( $review_right ): ?>
                        <?php $title = get_the_title( $review_right->ID );
                        $client_name = get_field( 'client_name', $review_right->ID );
                        $review_source = get_field( 'review_source', $review_right->ID );
                        ?>
                        <h4>"<?php echo esc_html( $review_right->post_content ); ?>"</h4>
                        <div class="author-rating"><span class="stars">★★★★★</span> <p class="small"><?php echo esc_html( $review_right->client_name ); ?></p></div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="spacer-90"></div>

</div><!-- #front-page -->

<?php get_footer();?>