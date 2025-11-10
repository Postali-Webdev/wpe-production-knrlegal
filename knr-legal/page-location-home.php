<?php
/**
 * Template Name: Location Homepage
 * @package KNR Legal
 * @author Postali LLC
**/

get_header();?>

<?php $location_details = '' . $_SESSION['office_location'] . '_details'; ?>

<?php 
    if( have_rows($location_details, 'options') ):
    while( have_rows($location_details, 'options') ): the_row();

        $address = get_sub_field('location_address');
        $city = get_sub_field('location_city');
        $state = get_sub_field('location_state');
        $zip = get_sub_field('location_zip_code');
        $phone = get_sub_field('location_phone_number');
        $fax = get_sub_field('location_fax_number');
        $directions = get_sub_field('location_directions_link');
        $map = get_sub_field('location_map_embed');

    endwhile;
    endif;
?>

<div class="body-container">

    <section class="page-banner">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <p class="sub-text">Welcome to KNR</p>
                    <h1><?php the_field('banner_headline'); ?></h1>
                    <p class="banner-subhead"><?php the_field('banner_subheading'); ?></p>
                    <div class="banner-cta">
                        <a href="tel:<?php echo $phone ?>" title="Call our <?php echo $city; ?> Office" class="btn black"><?php echo $phone ?></a> <p class="small">Free Consultations // Available 24/7</p>
                    </div>
                    <div class="spacer-30"></div>
                    <?php the_field('banner_intro_copy'); ?>
                </div>
                <div class="column-33">
                    &nbsp;
                </div>
            </div>
        </div>

        <div class="spacer-60"></div>
        
        <div class="container wide location-details">
            <div class="columns normal">
                <div class="location-details-left">
                    <h4>Our <span class="capitalize"><?php echo $_SESSION['office_location'] ?></span> Office</h4>
                    <div class="spacer-15"></div>
                    <div class="contact_left">
                        <div class="spacer-15"></div>
                        <span class="post-tag">Address</span>
                        <p class="small"><?php echo $address ?><br>
                        <?php echo $city ?>, <?php echo $state ?> <?php echo $zip ?>
                        <span class="spacer-15"></span>
                        <a href="<?php echo $directions ?>" target="_blank" title="Directions to our <?php echo $city ?> office"  class="ignore-highlight"><strong>Directions</strong></a>
                        </p>
                    </div>
                    <div class="contact_right">
                    <div class="spacer-15"></div>
                        <span class="post-tag">Contact</span>
                        <p class="small"><a href="tel:<?php echo $phone ?>" title="Call our <?php echo $city; ?> Office" class="ignore-highlight"><?php echo $phone ?></a>
                        <span class="spacer-15"></span>
                        <strong>Available 24/7</strong>
                        </p>
                    </div>
                </div>
                <div class="location-details-right">
                    <iframe src="<?php echo $map ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <?php if ($_SESSION['office_location'] == 'columbus') { ?>
            <?php get_template_part('block','columbus-downtown'); ?>
        <?php } ?>

    </section>

    <section class="location-body">
        <div class="container">
            <div class="columns">
                <?php if( have_rows('top_section_content_blocks') ): ?>
                <div class="column-75 center block">
                    <?php while( have_rows('top_section_content_blocks') ): the_row(); ?>  
                    <div class="content-block">
                        <p class="sub-text"><?php the_sub_field('section_highlight_text'); ?></p>
                        <h2><?php the_sub_field('section_h2'); ?></h2>
                        <?php the_sub_field('section_content'); ?>
                        <?php if (get_sub_field('add_video')) { ?>
                            <div class="spacer-60"></div>
                            <div class="video-box">
                                <div class="video-box-top">
                                    <h3 class="underlined"><?php the_sub_field('video_title'); ?></h3>
                                    <div class="video-tag">Video</div>
                                </div>
                                <div class="video-box-main">
                                    <div class="video-box-left">
                                        <p><strong>Topics we’ll cover in the following video:</strong></p>
                                        <?php the_sub_field('video_content'); ?>
                                        <div class="spacer-15"></div>
                                        <p><strong>Time: <?php the_sub_field('video_runtime'); ?></strong></p>
                                    </div>
                                    <div class="video-box-right">
                                    <a class="video-link" href="<?php the_sub_field('video_url'); ?>" title="" data-lity>
                                        <video class="autoplay-thumb-location" width="500" height="auto" muted autoplay loop poster="/wp-content/uploads/2023/06/knr-branding-vid-thumbnail.jpg">
                                            <source src="/wp-content/uploads/2023/06/knr-brand_trimmed.webm" type="video/mp4">
                                        </video>
                                    </a>
                                        <div class="spacer-15"></div>
                                        <p class="sans"><a href="<?php the_sub_field('video_url'); ?>" title="" class="btn green rounded" data-lity>Play video </a></p>
                                    </div>
                                </div>   
                            </div>
                        <?php } ?>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?> 
            </div>
        </div>
    </section>

    <?php get_template_part('block','touts'); ?>

    <section class="location-body">
        <div class="container">
            <div class="columns">
                <?php if( have_rows('bottom_section_content_blocks') ): ?>
                <div class="column-75 center block">
                    <?php while( have_rows('bottom_section_content_blocks') ): the_row(); ?>  
                    <div class="content-block">
                        <p class="sub-text"><?php the_sub_field('section_highlight_text'); ?></p>
                        <h2><?php the_sub_field('section_h2'); ?></h2>
                        <?php the_sub_field('section_content'); ?>
                        <?php if (get_sub_field('add_video')) { ?>
                            <div class="spacer-60"></div>
                            <div class="video-box">
                                <div class="video-box-top">
                                    <h3 class="underlined"><?php the_sub_field('video_title'); ?></h3>
                                    <div class="video-tag">Video</div>
                                </div>
                                <div class="video-box-main">
                                    <div class="video-box-left">
                                        <p><strong>Topics we’ll cover in the following video:</strong></p>
                                        <?php the_sub_field('video_content'); ?>
                                        <div class="spacer-15"></div>
                                        <p><strong>Time: <?php the_sub_field('video_runtime'); ?></strong></p>
                                    </div>
                                    <div class="video-box-right">
                                    <a class="video-link" href="<?php the_sub_field('video_url'); ?>" title="" data-lity>
                                        <video class="autoplay-thumb-location" width="500" height="auto" muted autoplay loop poster="/wp-content/uploads/2023/06/knr-branding-vid-thumbnail.jpg">
                                            <source src="/wp-content/uploads/2023/06/knr-brand_trimmed.webm" type="video/mp4">
                                        </video>
                                    </a>
                                        <div class="spacer-15"></div>
                                        <p class="sans"><a href="<?php the_sub_field('video_url'); ?>" title="" class="btn green rounded" data-lity>Play video </a></p>
                                    </div>
                                </div>   
                            </div>
                        <?php } ?>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?> 

                <div class="column-75 center block resources">
                    <div class="content-block">
                        <p class="sub-text"><?php the_field('resource_section_highlight_text'); ?></p>
                        <h2><?php the_field('resource_section_h2'); ?></h2>
                        <div class="spacer-30"></div>
                        <?php if( have_rows('resource') ): ?>
                        <?php while( have_rows('resource') ): the_row(); ?>
                            <h3><?php the_sub_field('resources_title'); ?></h3>
                            <p><?php the_sub_field('resources_copy'); ?></p>
                            <?php if (get_sub_field('resources_add_buttons')) { ?>
                                <?php if( have_rows('resource_buttons') ): ?>
                                    <?php while( have_rows('resource_buttons') ): the_row(); ?>
                                        <a href="<?php the_sub_field('button_link'); ?>" title="<?php the_sub_field('button_text'); ?>" class="btn black" <?php if(get_sub_field('external_link')) {?> target="_blank"<?php } ?>><?php the_sub_field('button_text'); ?></a><br>
                                    <?php endwhile; ?>
                                <?php endif; ?> 
                            <?php } ?>
                            <div class="spacer-60"></div>
                        <?php endwhile; ?>
                        <?php endif; ?> 
                    </div>
                </div>

                <div class="column-75 center block related">
                    <div class="content-block">
                        <h3><?php the_field('related_section_h3'); ?></h3>
                        <p><?php the_field('related_section_copy'); ?></p>
                        <div class="spacer-30"></div>
                        <?php get_template_part('block','related-articles'); ?>
                    </div>
                </div>

                <div class="column-75 center block faq">
                    <div class="content-block">
                        <p class="sub-text"><?php the_field('faq_section_highlight_text'); ?></p>
                        <h2><?php the_field('faq_section_h2'); ?></h2>
                        <div class="spacer-30"></div>
                        <?php if( have_rows('faqs_repeater') ): ?>
                        <div class="accordions">
                            <?php while( have_rows('faqs_repeater') ) : the_row(); 
                                $headline = get_sub_field('accordion_title');
                                $content = get_sub_field('accordion_content'); ?>
                                <div class="accordions_title"><h3><?php echo $headline; ?></h3><span></span></div>
                                <div class="accordions_content"><?php echo $content; ?></div>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('block','pre-footer'); ?>

</div>

<?php get_footer();?>