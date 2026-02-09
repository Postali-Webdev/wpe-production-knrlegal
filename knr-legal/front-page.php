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
$review_banner_link = $review_banner['notice_banner_link'];
?>

<div id="front-page">

    
    <?php get_template_part('block', 'banner');?>
	

    <div class="body-container">

        <section class="hp-main-banner">
            <div class="hero-background-img" style="background-image: url('<?php echo $GLOBALS['banner_img']; ?>');"></div>
            <div class="container bordered">
                <div class="columns center">
                    <div class="column-50 block">
                        <?php the_field('banner_left_content'); ?>
                        <div class="banner-cta">
                            <div class="cta-blocks">
                                <div class="block">
                                    <a class="ignore-highlight" href="<?php esc_html_e($right_cta['block_link']['url']); ?>">
                                        <img class="icon" src="<?php esc_html_e($right_cta['icon']); ?>" alt="contact icon">
                                        <span class="block-highlight"><?php _e($right_cta['copy']); ?></span>
                                    </a>
                                </div>
                                <div class="block">
                                    <a class="ignore-highlight" href="<?php esc_html_e($left_cta['block_link']['url']); ?>">
                                        <img class="icon" src="<?php esc_html_e($left_cta['icon']); ?>" alt="contact icon">
                                        <span class="block-highlight"><?php _e($left_cta['copy']); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="spacer-90 mobile"></div>
                    </div>
                    <?php $banner_video_group = get_field('banner_video_embed'); ?>
                    <div class="column-50 right">                        
                        <div class="video-embed-wrapper video-cover">
                            <video class="video-embed auto-play-cover">
                                <source src="<?php echo $banner_video_group['video_url']; ?>" type="video/mp4">
                            </video>

                            <?php $banner_thumbnail_img = $banner_video_group['thumbnail_image']['url'] . '.webp'; ?>

                            <video class="autoplay-thumb" width="500" height="auto" muted autoplay loop poster="<?php echo $banner_thumbnail_img; ?>">
                                <source src="<?php echo $banner_video_group['thumbnail_short_video']; ?>" type="video/mp4">
                            </video>
                        </div>

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
                            <video class="video-embed auto-play-cover">
                                <source src="<?php echo $video_group['video_url']; ?>" type="video/mp4">
                            </video>

                            <?php $thumbnail_img = $video_group['thumbnail_image']['url'] . '.webp'; ?>
                        
                            <video class="autoplay-thumb" width="500" height="auto" muted autoplay loop poster="<?php echo $thumbnail_img; ?>">
                                <source src="<?php echo $video_group['thumbnail_short_video']; ?>" type="video/mp4">
                            </video>
                        </div>

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

                    </div>
                </div>
            </div>
        </section>

        <section class="hp-more-about">
            <div class="container">
                <div class="columns centered">
                    <p class="sub-text"><?php the_field('more_about_headline'); ?></p>
                    <div class="spacer-30"></div>
                    <?php if( have_rows('more_about_touts') ): ?>
                    <?php while( have_rows('more_about_touts') ): the_row(); ?>  
                        
                        <div class="column-25 centered">
                            <h3><?php the_sub_field('tout_headline'); ?></h3>
                            <p><?php the_sub_field('tout_copy'); ?></p>
                        </div>

                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="hp-why-get">
            <div class="container thin bordered">
                <div class="columns bottom">
                    <div class="column-50 block">
                        <?php the_field('why_lawyer_left_content'); ?>
                        <a href="<?php the_field('why_lawyer_button_link'); ?>" class="btn black"><?php the_field('why_lawyer_button_text'); ?></a>
                        <div class="spacer-60"></div>

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

        <section class="hp-in-the-media">
            <div class="container thin">
                <div class="columns">
                    <div class="column-50">
                        <?php the_field('in_the_media_left_content'); ?>
                    </div>
                    <div class="column-50 centered logos">
                        
                        <div class="slider-prev-button-slick"><span class="icon-arrow-left"></span></div>
                        <div id="media-slider" class="slide">
                        
                        <?php if( have_rows('in_the_media_logos') ): ?> 
                        <?php while( have_rows('in_the_media_logos') ): the_row(); ?>  
                            
                            
                            <div class="media-logo">
                            <?php 
                            $image = get_sub_field('logo');
                            if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                            </div>
                            
                        <?php endwhile; ?>
                        <?php endif; ?>

                        </div>

                        <div class="slider-next-button-slick"><span class="icon-arrow-right"></span></div>

                    </div>
                    <div class="spacer-30"></div>
                </div>
            </div>
        </section>

        <section class="hp_when-do-you-need">
            <div class="container thin">
                <div class="columns">
                    <div class="column-50">
                        <?php the_field('when_left_content'); ?>
                    </div>
                    <div class="column-50">
                        
                        <?php
                        $testimonial = get_field('when_testimonial');
                        $post_id = $testimonial->ID;
                        $group_values = get_field('video', $post_id);
                        
                        // Get sub field values.
                        $image = $group_values['video_thumbnail'];
                        $link = $group_values['video_url'];
                        $quote = $group_values['client_quote'];
                        $client = $group_values['client_name'];

                        ?>
                        <div class="testimonial-holder-main video">
                            <a href="<?php echo esc_html($link); ?>" class="video-testimonial" data-lity="">
                                <span class="icon-play"></span>
                                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                            </a>
                            <div class="spacer-30"></div>
                            <div class="testimonial-content">
                                <p class="small"><?php echo esc_html($client); ?></p>
                                <p>"<?php echo esc_html($quote); ?>"</p>

                                <?php $name = substr_replace($client ,"",-1) . "\n"; ?>
                                <a href="<?php echo esc_html($link); ?>" class="btn rounded" data-lity="">Hear <?php echo trim($name); ?>'s Story</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="spacer-90 mobile"></div>

        <section class="hp_practice-areas">
            <div class="container thin">
                <div class="columns">
                    <div class="column-full centered block">
                        <?php the_field('hp_practice_areas_copy'); ?>
                    </div>
                </div>
            </div>
            <div class="spacer-15"></div>
            <div class="container pa-boxes">
            <?php $n=1 ?>
                <?php if( have_rows('practice_area') ): ?>
                <?php while( have_rows('practice_area') ): the_row(); ?> 
                <div class="practice-area-box">
                    <div class="box-content">
                        <?php $practice_area = get_sub_field('hp_practice_area_name'); ?>
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

        <section class="hp_office-locations" style="background-image: url('<?php the_field('hp_office_locations_bg'); ?>');">
            <div class="container thin">
                <div class="columns">
                    <div class="column-50">
                        <h3><?php the_field('hp_office_locations_title'); ?></h3>
                        <p><?php the_field('hp_office_locations_copy'); ?></p>
                    </div>
                    <div class="column-50">
                    <?php if( have_rows('hp_office_locations') ): ?>
                        <ul>
                        <?php while( have_rows('hp_office_locations') ): the_row(); ?>  
                            <li>
                                <a href="<?php the_sub_field('location_page_link'); ?>" class="ignore-highlight"><?php the_sub_field('location_name'); ?></a>
                            </li>
                            <?php $n++; ?>
                        <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
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
                </div>
            </div>
        </section>


        <section class="hp-process-works">
            <div class="container">
                <div class="columns">
                    <div class="column-full centered">
                        <h2><?php the_field('process_headline'); ?></h2>
                    </div>
                    <div class="spacer-30"></div>
                    <?php if( have_rows('process_steps') ): ?>
                    <?php $n=1; ?>
                    <?php while( have_rows('process_steps') ): the_row(); ?>  
                        <div class="column-25 block">
                            <div class="process-number"><?php echo $n; ?></div>
                            <h3><?php the_sub_field('process_headline'); ?></h3>
                            <p><?php the_sub_field('process_copy'); ?></p>
                        </div>
                    <?php $n++; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="spacer-30"></div>
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