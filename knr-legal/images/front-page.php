<?php
/**
 * Template Name: Front Page
 * @package KNR Legal
 * @author Postali LLC
**/
get_header();
$left_cta = get_field('hero_left_cta');
$right_cta = get_field('hero_right_cta');
$review_banner = get_field('review_banner');
$review_banner_badge = $review_banner['review_badge'];
?>

<div id="front-page">

    <div class="body-container">

        <section class="hp-main-banner">
            <div class="hero-background-img" style="background-image: url('<?php the_field('hero_background_image'); ?>');"></div>
            <div class="container bordered">
                <div class="columns bottom">
                    <div class="column-50 block">
                        <?php the_field('banner_left_content'); ?>
                        <div class="spacer-15 mobile"></div>
                        <div class="banner-cta">
                            <div class="cta-blocks">
                                <div class="block">
                                    <a class="ignore-highlight" href="<?php esc_html_e($left_cta['block_link']['url']); ?>">
                                        <img class="icon" src="<?php esc_html_e($left_cta['icon']); ?>" alt="contact icon">
                                        <span class="block-highlight"><?php _e($left_cta['copy']); ?></span>
                                    </a>
                                </div>
                                <div class="block">
                                <a class="ignore-highlight" href="<?php esc_html_e($right_cta['block_link']['url']); ?>">
                                        <img class="icon" src="<?php esc_html_e($right_cta['icon']); ?>" alt="contact icon">
                                        <span class="block-highlight"><?php _e($right_cta['copy']); ?></span>
                                    </a>
                                </div>
                            </div>
                            <p class="small">Free Consultations // Available 24/7</p>
                        </div>
                        <div class="spacer-90 mobile"></div>
                    </div>
                    <div class="column-50 centered">                        
                    <?php 
                        set_query_var('random_partner','name');
                        $data = array(
                            'btn_text' 	=> 'Our Attorneys',
                            'btn_link'	=>	'/our-attorneys/'
                        );
                        get_template_part( 'block', 'random-partner', $data );
                        set_query_var('random_partner', false);
                    ?>
                    </div>
                </div>
            </div>
            <div class="spacer-30"></div>
            <div class="container">
                <div class="columns">
                    <div class="column-50 review block">
                    <?php
                    $review_left = get_field('banner_review_left');
                    if( $review_left ): ?>
                        <?php $title = get_the_title( $review_left->ID );
                        $quote = get_field( 'quote', $review_left->ID );
                        $client_name = get_field( 'client_name', $review_left->ID );
                        $review_source = get_field( 'review_source', $review_left->ID );
                        ?>
                        <h4>"<?php echo  $review_left->post_content; ?>"</h4>
                        <div class="author-rating"><span class="stars">★★★★★</span> <p class="small"><?php echo esc_html( $quote['client_name'] ); ?></p></div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="hp-firm-overview">
            <div class="container wide">
                <div class="columns normal">
                    <div class="column-50 white padded">
                        <div class="padded-content">
                            <?php the_field('firm_overview_left_content'); ?>
                        </div>
                    </div>
                    <div class="column-50 img-bg" style="background-image:url(<?php the_field('firm_overview_photo'); ?>);">
                        <div class="caption"><span><?php the_field('firm_overview_vertical_caption'); ?></span></div>
                    </div>
                </div>
            </div>
        </section>

        <?php get_template_part('block','touts'); ?>

        <section class="hp-knr-difference">
            <div class="container">
                <div class="columns">
                    <div class="column-50 centered center block">
                        <p class="sub-text"><?php the_field('difference_sub_title'); ?></p>
                        <h3><?php the_field('difference_title'); ?></h3>
                        <p class="form-cta-desktop"><?php the_field('difference_copy'); ?></p>
                        <div class="spacer-15"></div>
                        <?php $video_group = get_field('difference_video_embed'); ?>
                    </div>
                    <div class="column-75 center">
                        <div class="video-embed-wrapper video-cover">
                            <!-- <div class="responsive-wrapper"> -->
                                <video class="video-embed">
                                    <source src="<?php echo $video_group['video_url']; ?>" type="video/mp4">
                                </video>
                            <!-- </div> -->
                            <!-- <div class="responsive-wrapper"> -->
                                <video class="autoplay-thumb" width="500" height="auto" muted autoplay loop>
                                    <source src="<?php echo $video_group['thumbnail_short_video']; ?>" type="video/mp4">
                                </video>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="hp-we-can-help">
            <div class="container">
                <div class="columns">
                    <div class="column-50 centered center block">
                        <?php the_field('accident_details_intro_copy','options'); ?>
                        <p class="form-cta-desktop"><?php the_field('accident_details_cta_desktop','options'); ?></p>
                    </div>

                    <p class="form-cta-mobile"><?php the_field('accident_details_cta_mobile','options'); ?></p>

                    <div class="accident-form-mobile">
                        <span class="icon-plus"></span>
                    </div>

                    <div class="accident-details-form">
                        <p class="mobile-instructions">Please select all that apply to your situation, then click the button at the bottom of the list to see how we can help</p>
                        <form action="/accident-details/" method="POST">
                            <div class="form-box">
                                
                                <input type="checkbox" class="checkbox-input" id="checkbox1" name="Q1">
                                <label for="checkbox1">
                                    <span class="label-text"><?php the_field('q1','options'); ?></span>
                                    <span class="checkbox"></span>
                                </label>
                                                            
                                <input type="checkbox" class="checkbox-input" id="checkbox2" name="Q2">
                                <label for="checkbox2">
                                    <span class="label-text"><?php the_field('q2','options'); ?></span>
                                    <span class="checkbox"></span>
                                </label>
                                                            
                                <input type="checkbox" class="checkbox-input" id="checkbox3" name="Q3">
                                <label for="checkbox3">
                                    <span class="label-text"><?php the_field('q3','options'); ?></span>
                                    <span class="checkbox"></span>
                                </label>
                                                            
                                <input type="checkbox" class="checkbox-input" id="checkbox4" name="Q4">
                                <label for="checkbox4">
                                    <span class="label-text"><?php the_field('q4','options'); ?></span>
                                    <span class="checkbox"></span>
                                </label>
                                                            
                                <input type="checkbox" class="checkbox-input" id="checkbox5" name="Q5">
                                <label for="checkbox5">
                                    <span class="label-text"><?php the_field('q5','options'); ?></span>
                                    <span class="checkbox"></span>
                                </label>
                                                            
                                <input type="checkbox" class="checkbox-input" id="checkbox6" name="Q6">
                                <label for="checkbox6">
                                    <span class="label-text"><?php the_field('q6','options'); ?></span>
                                    <span class="checkbox"></span>
                                </label>
                                                            
                                <input type="checkbox" class="checkbox-input" id="checkbox7" name="Q7">
                                <label for="checkbox7">
                                    <span class="label-text"><?php the_field('q7','options'); ?></span>
                                    <span class="checkbox"></span>
                                </label>
                                                            
                                <input type="checkbox" class="checkbox-input" id="checkbox8" name="Q8">
                                <label for="checkbox8">
                                    <span class="label-text"><?php the_field('q8','options'); ?></span>
                                    <span class="checkbox"></span>
                                </label>
                                                            
                                <input type="checkbox" class="checkbox-input" id="checkbox9" name="Q9">
                                <label for="checkbox9">
                                    <span class="label-text"><?php the_field('q9','options'); ?></span>
                                    <span class="checkbox"></span>
                                </label>
                                                            
                                <input type="checkbox" class="checkbox-input" id="checkbox10" name="Q10">
                                <label for="checkbox10">
                                    <span class="label-text"><?php the_field('q10','options'); ?></span>
                                    <span class="checkbox"></span>
                                </label>
                            </div>
                            <button type="submit" class="btn black disabled" id="submit">
                                <strong>We Can Help.</strong> Here’s How.
                            </button>
                        </form>
                    </div>  

                </div>
            </div>
        </section>

        <section class="hp-why-get">
            <div class="container thin bordered">
                <div class="columns bottom">
                    <div class="column-50">
                        <?php the_field('why_lawyer_left_content'); ?>

                        <?php if( have_rows('why_lawyer_reviews_rating') ): ?>
                        <div class="reviews-rating">
                        <?php while( have_rows('why_lawyer_reviews_rating') ): the_row(); ?>  
                            
                                <div class="reviews-rating-block">
                                    <div class="reviews-rating-icon">
                                        <?php 
                                        $icon = get_sub_field('reviews_rating_icon');
                                        if( !empty( $icon ) ): ?>
                                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="reviews-rating-text">
                                        <span class="large"><?php the_sub_field('reviews_rating_large_text'); ?></span>
                                        <?php the_sub_field('reviews_rating_small_text'); ?>
                                    </div>
                                </div>
                            
                        <?php endwhile; ?>
                        </div>
                        <?php endif; ?> 
                        <div class="spacer-30"></div>

                    </div>
                    <div class="column-50 centered">
                    <?php 
                        set_query_var('random_partner','name');
                        $data = array(
                            'btn_text' 	=> 'Our Attorneys',
                            'btn_link'	=>	'/our-attorneys/'
                        );
                        get_template_part( 'block', 'random-partner', $data );
                        set_query_var('random_partner', false);
                    ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="hp_practice-areas">
            <div class="container thin">
                <?php the_field('hp_practice_areas_copy'); ?>
            </div>
            <div class="spacer-15"></div>
            <div class="container wide">
            <?php $n=1 ?>
                <?php if( have_rows('practice_area') ): ?>
                <?php while( have_rows('practice_area') ): the_row(); ?> 
                <div class="practice-area-box">
                    <div class="box-content">
                        <?php $practice_area = get_sub_field('hp_practice_area_name'); ?>
                        <div class="box-vertical">
                            <span><?php the_sub_field('hp_practice_area_caption') ?></span>
                        </div>
                        <div class="box-content-main">
                            <h2><?php echo $practice_area; ?>s</h2>
                            <p><?php the_sub_field('hp_practice_area_copy') ?></p>
                            <div class="spacer-60 mobile"></div>
                            <a href="<?php the_sub_field('hp_practice_area_page_link'); ?>" class="btn red" title="More About <?php echo $practice_area; ?>s">More About <?php echo $practice_area; ?>s</a>
                        </div>
                        <div class="practice-area-bg-img" style="background-image:url('<?php the_sub_field('hp_practice_area_bg_img'); ?>'); ?>"></div>
                    </div>
                    <div class="slide-out" id="slide-out<?php echo $n; ?>">
                        <span class="open" id="open<?php echo $n; ?>"></span>
                        <span class="title"><span class="title-text"><?php echo $practice_area; ?> Results</span></span>
                        <div class="box-text" id="box-text<?php echo $n; ?>">
                            <span class="result-title"><?php the_sub_field('hp_practice_area_result') ?></span>
                            <a href="/results/" title="See More Results">See More Results</a>
                        </div>
                    </div>
                </div>
                <div class="spacer-60"></div>
                <?php $n++; ?>
                <?php endwhile; ?>
                <?php endif; ?>    
                <div class="practice-area-box-all">
                    <div class="box-content">
                        <div class="left-column">
                            <div class="box-content-main">
                                <?php the_field('hp_all_practice_areas_copy'); ?>                    
                            </div>
                            <div class="practice-area-bg-img" style="background-image:url('<?php the_field('hp_all_practice_area_bg_img'); ?>'); ?>"></div>
                        </div>
                        <div class="right-column">
                        <?php if( have_rows('hp_all_practice_areas_list') ): ?>
                            <ul>
                            <?php while( have_rows('hp_all_practice_areas_list') ): the_row(); ?>     
                                <li><a href="<?php the_sub_field('hp_practice_area_page_link'); ?>" class="ignore-highlight" title="More About <?php the_sub_field('hp_practice_area_name'); ?>"><?php the_sub_field('hp_practice_area_name'); ?></a></li>
                            <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>   
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

        <section class="hp_knr-cares">
            <div class="container">
                <div class="columns">
                    <div class="column-66 centered center block">
                        <?php the_field('hp_knr_cares_copy'); ?>
                    </div>
                </div>
            </div>
            
            <div class="container wide">
                <div class="columns">
                    <div class="column-full">
                        <?php
                        $community_query = new WP_Query( array(
                            'post_type' => 'communitysupport',
                            'posts_per_page'    => 4,
                        ) );
                        ?>

                        <?php $slider_caption = get_field('hp_knr_cares_slider_caption'); ?>

                        <div id="community-slider" class="slide">
                        <?php while( $community_query->have_posts() ) : $community_query->the_post(); ?>   
                            <div class="slider-container">
                                <div class="slider-nav">
                                    <div class="slide-pagination">
                                        <div class="slider-next-button-slick"><span class="icon-chevron-right"></span></div><span class="pagingInfo"></span><div class="slider-prev-button-slick"><span class="icon-chevron-left"></span></div>
                                    </div>
                                </div>
                                <div class="slider-main">
                                    <div class="slider-main-holder">
                                        <div class="post-tag">KNR Cares</div>
                                        <div class="post-content">
                                            <p class="large"><strong><?php the_title(); ?></strong></p>
                                            <?php 
                                            $content = get_the_content(); ?>
                                            <p><?php echo wp_trim_words( $content , '20' ); ?></p>
                                        </div>
                                        <div class="post-button">
                                            <a href="<?php the_permalink(); ?>" title="Learn more about this!"><span class="icon-arrow-right"></span><span class="btn-text">Go to Event</span></a>
                                        </div>
                                        <div class="slider-dots"></div> 
                                    </div>    
                                </div>
                                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                <?php endif; ?>

                                <div class="slider-photo" style="background-image: url('<?php echo $image[0]; ?>')">
                                    <div class="slider-caption"><p><?php echo $slider_caption; ?></p></div>
                                </div>
                            </div>    
                            <?php endwhile; wp_reset_postdata(); ?> 
                        </div>     
                    </div>
                </div>
            </div>
        </section>

        <section class="hp-injury-process">
            <div class="container wide">
                <div class="columns normal">
                    <div class="column-50 white padded">
                        <div class="padded-content">
                            <?php the_field('personal_injury_process_left_content'); ?>
                        </div>
                    </div>
                    <div class="column-50 img-bg" style="background-image:url(<?php the_field('personal_injury_process_photo'); ?>);">
                        <div class="caption"><span><?php the_field('personal_injury_process_vertical_caption'); ?></span></div>
                    </div>
                    <div class="spacer-break mobile"></div>
                    <div class="column-50 locations-accordion padded black ignore-highlight">
                        <h3><?php the_field('locations_accordion_headline'); ?></h3>
                        <p><?php the_field('locations_accordion_copy'); ?></p>
                        <span class="open" id="open-locations"></span>
                        <div class="locations-expand">

                        <?php
                            $args = array( 'container' => false, 'theme_location' => 'footer-locations' );
                            wp_nav_menu( $args );
                        ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="hp-best-choice">
            <div class="container thin bordered">
                <div class="columns bottom">
                    <div class="column-50">
                        <?php the_field('best_choice_left_content'); ?>
                        <?php if( have_rows('best_choice_left_content_icons') ): ?>
                        <div class="spacer-15"></div>
                        <div class="choice-icons">
                        <?php while( have_rows('best_choice_left_content_icons') ): the_row(); ?>  
                            <div class="choice-icon">
                                <?php 
                                $icon = get_sub_field('icon');
                                if( !empty( $icon ) ): ?>
                                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                                <?php endif; ?>
                                <p class="x-small"><?php the_sub_field('caption'); ?></p>
                            </div>
                        <?php endwhile; ?>
                        </div>
                        <?php endif; ?> 
                        <div class="spacer-15"></div>
                    </div>
                    <div class="column-50">

                        <?php
                        $min=1;
                        $max=3;
                        $random = rand($min,$max);
                        ?>

                        <img src="/wp-content/uploads/2022/08/homepage-client-cutout-<?php echo $random; ?>.png" alt="KNR Client image" class="client-img">

                        <div class="post-button">
                            <a href="/about-us/client-testimonials/" title="Read our Reviews"><span class="icon-arrow-right"></span><span class="btn-text">Our Reviews</span></a>
                        </div>

  
                    </div>
                </div>
            </div>
            
            <div class="spacer-30"></div>

            <div class="container thin">
                <div class="columns">
                    <div class="column-50 review">
                    <?php
                    $review_left = get_field('review_left');
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
                    $review_right = get_field('review_right');
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

        <section class="hp-related-articles">
        <div class="container">
            <div class="columns">
                <div class="column-66 center centered">
                    <?php the_field('hp_related_info_copy'); ?>
                </div>
                <div class="spacer-30"></div>
                <div class="column-66 center">
                <?php get_template_part('block','related-articles'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="hp-working-with-knr">
        <div class="container">
            <div class="columns">
                <div class="column-66 center centered">
                    <span class="icon-quotes-icon"></span>
                    <h3><?php the_field('hp_quote_text'); ?></h3>
                </div>
            </div>
        </div>       
    </section>

        <?php get_template_part('block','pre-footer'); ?>

    </div>

</div><!-- #front-page -->

<?php get_footer();?>