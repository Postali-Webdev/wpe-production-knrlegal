<?php
/**
 * AboutTemplate
 * Template Name: About
 *
 * @package KNR Legal
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">

    <section class="page-header">
        <div class="container bordered">
            <div class="columns bottom">
                <div class="column-full">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                </div>
                <div class="column-66 block">
                    <h1><?php the_field('page_title'); ?></h1>     
                    <?php the_field('banner_value_proposition'); ?>
                </div>
                <div class="column-33 bottom">
                    <?php 
                        set_query_var('random_partner','recovered');
                        get_template_part('block','random-partner'); 
                        set_query_var('random_partner', false);
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="timeline">
        <div class="container"> 
            <div class="columns">
                <div class="column-33 block">
                    <div class="spacer-30"></div>
                    <?php the_field('history_left_column'); ?>
                </div>
                <div class="column-66">
                <?php if( have_rows('history_timeline') ): ?>
                <?php while( have_rows('history_timeline') ): the_row(); ?>  
                        <div class="timeline-event">
                            <div class="date">
                                <?php the_sub_field('timeline_date'); ?>
                            </div>
                            <div class="spacer-break"></div>
                            <div class="event">
                                <div class="text">
                                    <?php the_sub_field('timeline_copy'); ?>
                                </div>
                            </div>
                        </div>
                <?php endwhile; ?>
                <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>

    <section class="video" id="video">
        <div class="container">
            <div class="columns">
                <?php $video_group = get_field('anniversary_video_embed'); ?>
                <div class="column-75 center centered">
                    <h3>Celebrating 20 Years of Excellence</h3>
                    <div class="video-embed-wrapper video-cover">
                        <video class="video-embed auto-play-cover">
                            <source src="<?php echo $video_group['video_url']; ?>" type="video/mp4">
                        </video>
                    
                        <video class="autoplay-thumb" width="500" height="auto" muted autoplay loop poster="<?php echo $video_group['thumbnail_image']['url']; ?>">
                            <source src="<?php echo $video_group['thumbnail_short_video']; ?>" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-experience">
        <div class="container wide">
            <div class="columns normal">
                <div class="column-50 white padded">
                    <div class="padded-content">
                        <?php the_field('experience_left_content'); ?>
                    </div>
                </div>
                <div class="column-50 img-bg" style="background-image:url(<?php the_field('experience_photo'); ?>);">
                    <div class="caption"><span><?php the_field('experience_vertical_caption'); ?></span></div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('block','attorney-slider'); ?>

    <section class="about-locations">
        <div class="container wide">
            <div class="practice-area-box">
                <div class="box-content">
                    <div class="box-vertical">
                        <span><?php the_field('locations_caption_text'); ?></span>
                    </div>
                    <div class="box-content-main">
                        <?php the_field('locations_copy') ?>
                    </div>
                    <div class="practice-area-bg-img" style="background-image:url('<?php the_field('locations_bg_img'); ?>')"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-community">
        <div class="container">
            <div class="columns">
                <div class="column-66 center">
                    <h3>About the Community</h3>
                    <?php 
                    $image = get_field('community_image');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    <div class="spacer-60"></div>
                    <?php the_field('community_copy'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="about-faqs">
        <div class="container">
            <p class="sub-text"><?php the_field('faqs_sub_text'); ?></p>
            <h2><?php the_field('faqs_section_title'); ?></h2>
        </div>
        <div class="container wide">
            <div class="spacer-30"></div>
            <div class="columns normal">
                <div class="column-50 white padded">
                    <div class="padded-content">
                    <?php if( have_rows('faqs') ): ?>
                    <?php while( have_rows('faqs') ): the_row(); ?>  
                        <div class="faq-holder">
                            <strong><?php the_sub_field('faq_question'); ?></strong>
                            <p><?php the_sub_field('faq_answer'); ?></p>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?> 
                    </div>
                </div>
                <div class="column-50 img-bg" style="background-image:url(<?php the_field('faqs_photo'); ?>);">
                    <div class="caption"><span><?php the_field('faqs_vertical_caption'); ?></span></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="columns">
                <div class="spacer-90"></div>
                <div class="column-66 center">
                    <h3><?php the_field('price_section_title'); ?></h3>
                    <?php the_field('price_copy'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="working-with">
        <div class="container wide" style="background-image:url(<?php the_field('working_with_background_image'); ?>);">
            <div class="columns">
                <div class="working-with-image" style="background-image:url(<?php the_field('working_with_background_image'); ?>);"></div>
                <div class="working-with-caption">
                    <h3><?php the_field('working_with_caption_title'); ?></h3>
                    <?php the_field('working_with_caption_text'); ?>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>