<?php
/**
 * Template Name: Location Homepage - Updated
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
        <div class="container bordered">
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
                    <div class="banner-img">
                    <?php 
                    $image = get_field('banner_location_photo');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    </div>
                    <div class="img-tag">
                        <p><?php the_field('banner_photo_tag'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="location-body">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <div class="content-block">
                        <p class="sub-text"><?php the_field('overview_highlight_text'); ?></p>
                        <h2><?php the_field('overview_h2'); ?></h2>
                        <?php the_field('overview_content'); ?>

                        <div class="mobile-show">
                            <div class="result-holder">
                        
                            <?php if( have_rows('overview_case_results') ): ?>
                            <?php $n=1; ?>
                            <?php while( have_rows('overview_case_results') ): the_row(); ?>
                                <?php $post_object = get_sub_field('result'); ?>
                                <?php if( $post_object ): ?>
                                <?php // override $post
                                $post = $post_object;
                                setup_postdata( $post );
                                ?>

                                <div class="result-holder-main" id="result_<?php echo $n; ?>">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <h2 class="hh-1"><?php the_title(); ?></h2>
                                        <?php 
                                        $content = get_the_content(); ?>
                                        <p><?php echo wp_trim_words( $content , '18' ); ?></p>
                                    </a>
                                    
                                    <div class="meta-container">
                                        <div class="container-row">
                                            <div class="col1">Case Type</div>
                                            <div class="col2">&nbsp;</div>
                                            <div class="col3">
                                            <?php 
                                                // SHOW YOAST PRIMARY CATEGORY, OR FIRST CATEGORY
                                                $category = get_the_category();
                                                $useCatLink = true;
                                                // If post has a category assigned.
                                                if ($category){
                                                    $category_display = '';
                                                    $category_link = '';
                                                    if ( class_exists('WPSEO_Primary_Term') ){
                                                    // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
                                                    $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
                                                    $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
                                                    $term = get_term( $wpseo_primary_term );
                                                    if (is_wp_error($term)) { 
                                                        // Default to first category (not Yoast) if an error is returned
                                                        $category_display = $category[0]->name;
                                                        $category_link = get_category_link( $category[0]->term_id );
                                                    } else { 
                                                        // Yoast Primary category
                                                        $category_display = $term->name;
                                                        $category_link = get_category_link( $term->term_id );
                                                    }
                                                } 
                                                else {
                                                    // Default, display the first category in WP's list of assigned categories
                                                    $category_display = $category[0]->name;
                                                    $category_link = get_category_link( $category[0]->term_id );
                                                }
                                                // Display category
                                                if ( !empty($category_display) ){
                                                    echo '<span class="post-category">'.htmlspecialchars($category_display).'</span>';
                                                }

                                                }
                                                ?>
                                            </div>
                                        </div>
                                        
                                        <div class="container-row last">
                                            <div class="col1">Settlement $</div>
                                            <div class="col2">&nbsp;</div>
                                            <div class="col3">
                                                <?php $result_value = get_field('case_result_value');
                                                $formatted = number_format($result_value,2); ?>
                                                $<?php echo $formatted; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <?php $n++; ?>
                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                            <?php endif; ?>
                            <?php endwhile; ?>
                            <?php endif; ?>

                                <div class="more-results">
                                    <p><a href="/results/" class="ignore-highlight">View More Case Results</a></p>
                                </div>
                            </div>
                        </div>

                        <?php if( have_rows('on-page-nav') ): ?>
                        <p class="on-page">On Page Navigation</p>
                        <ul>
                        <?php while( have_rows('on-page-nav') ): the_row(); ?>  
                            <li><a href="<?php the_sub_field('nav_anchor'); ?>" class="ignore-highlight"><?php the_sub_field('nav_title'); ?></a></li>
                        <?php endwhile; ?>
                        </ul>
                        <?php endif; ?> 

                    </div>
                </div>
                <div class="column-33 mobile-hide">
                    <div class="result-holder">
                    
                    <?php if( have_rows('overview_case_results') ): ?>
                    <?php while( have_rows('overview_case_results') ): the_row(); ?>
                        <?php $post_object = get_sub_field('result'); ?>
                        <?php if( $post_object ): ?>
                        <?php // override $post
                        $post = $post_object;
                        setup_postdata( $post );
                        ?>

                        <div class="result-holder-main">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <h2 class="hh-1"><?php the_title(); ?></h2>
                                <?php 
                                $content = get_the_content(); ?>
                                <p><?php echo wp_trim_words( $content , '18' ); ?></p>
                            </a>
                            
                            <div class="meta-container">
                                <div class="container-row">
                                    <div class="col1">Case Type</div>
                                    <div class="col2">&nbsp;</div>
                                    <div class="col3">
                                    <?php 
                                        // SHOW YOAST PRIMARY CATEGORY, OR FIRST CATEGORY
                                        $category = get_the_category();
                                        $useCatLink = true;
                                        // If post has a category assigned.
                                        if ($category){
                                            $category_display = '';
                                            $category_link = '';
                                            if ( class_exists('WPSEO_Primary_Term') ){
                                            // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
                                            $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
                                            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
                                            $term = get_term( $wpseo_primary_term );
                                            if (is_wp_error($term)) { 
                                                // Default to first category (not Yoast) if an error is returned
                                                $category_display = $category[0]->name;
                                                $category_link = get_category_link( $category[0]->term_id );
                                            } else { 
                                                // Yoast Primary category
                                                $category_display = $term->name;
                                                $category_link = get_category_link( $term->term_id );
                                            }
                                        } 
                                        else {
                                            // Default, display the first category in WP's list of assigned categories
                                            $category_display = $category[0]->name;
                                            $category_link = get_category_link( $category[0]->term_id );
                                        }
                                        // Display category
                                        if ( !empty($category_display) ){
                                            echo '<span class="post-category">'.htmlspecialchars($category_display).'</span>';
                                        }

                                        }
                                        ?>
                                    </div>
                                </div>
                                
                                <div class="container-row last">
                                    <div class="col1">Settlement $</div>
                                    <div class="col2">&nbsp;</div>
                                    <div class="col3">
                                        <?php $result_value = get_field('case_result_value');
                                        $formatted = number_format($result_value,2); ?>
                                        $<?php echo $formatted; ?>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>

                    <div class="more-results">
                        <p><a href="/results/" class="ignore-highlight">View More Case Results</a></p>
                    </div>

                    </div>
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
                    <iframe src="<?php echo $map ?>" width="600" height="450" style="border:0;" allowfullscreen="" class="ignore-lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                <div class="column-75 center block">
                    <?php 
                    $image = get_field('section_2_photo');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <div class="spacer-60"></div>
                    <?php endif; ?>

                    <div class="content-block" id="<?php the_field('first_section_anchor'); ?>">
                        <p class="sub-text"><?php the_field('first_section_highlight_text'); ?></p>
                        <h2><?php the_field('first_section_h2'); ?></h2>
                        <?php the_field('first_section_intro'); ?>
                        <div class="top-awards">
                            <div class="first-content-left">
                                <?php the_field('first_section_content'); ?>
                            </div>
                            <div class="first-content-awards">
                                <h3><?php the_field('first_section_awards_headline'); ?></h3>
                                <?php if( have_rows('awards','options') ): ?>
                                <div class="landing-awards">
                                <?php while( have_rows('awards','options') ): the_row(); ?>  
                                <?php 
                                    $award = get_sub_field('award_logo');
                                    if( !empty( $award ) ): ?>
                                        <div class="img-block">
                                            <img src="<?php echo esc_url($award['url']); ?>" alt="<?php echo esc_attr($award['alt']); ?>" />
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                                </div>
                                <?php endif; ?> 
                            </div>
                        </div>

                        <?php if (get_field('first_add_video')) { ?>
                        <div class="spacer-60"></div>
                        <div class="video-box">
                            <div class="video-box-top">
                                <h3 class="underlined"><?php the_field('first_video_title'); ?></h3>
                                <div class="video-tag">Video</div>
                            </div>
                            <div class="video-box-main">
                                <div class="video-box-left">
                                    <p><strong>Topics we’ll cover in the following video:</strong></p>
                                    <?php the_field('first_video_content'); ?>
                                    <div class="spacer-15"></div>
                                    <p><strong>Time: <?php the_field('first_video_runtime'); ?></strong></p>
                                </div>
                                <div class="video-box-right">
                                <a class="video-link" href="<?php the_field('video_url'); ?>" title="" data-lity>
                                    <video class="autoplay-thumb-location" width="500" height="auto" muted autoplay loop poster="/wp-content/uploads/2023/06/knr-branding-vid-thumbnail.jpg">
                                        <source src="<?php the_field('first_video_url'); ?>" type="video/mp4">
                                    </video>
                                </a>
                                    <div class="spacer-15"></div>
                                    <p class="sans"><a href="<?php the_field('first_video_url'); ?>" title="" class="btn green rounded" data-lity>Play video </a></p>
                                </div>
                            </div>   
                        </div>
                    <?php } ?>
                    </div>

                    <?php if( have_rows('top_section_content_blocks') ): ?>
                    <?php while( have_rows('top_section_content_blocks') ): the_row(); ?>  
                    <div class="content-block" id="<?php the_sub_field('section_anchor'); ?>">
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
                        <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>

    <section class="results-block">
        <div class="container">
            <div class="columns">  
                <div class="column-full centered center">
                    <p class="sub-text">Our Results</p>
                    <div class="spacer-break"></div>
                    <h2><?php the_field('case_results_h2'); ?></h2>
                </div>
                <div class="column-full">              
                    <div class="result-holder">
                    
                    <?php if( have_rows('case_results') ): ?>
                    <?php while( have_rows('case_results') ): the_row(); ?>
                        <?php $post_object = get_sub_field('case_result'); ?>
                        <?php if( $post_object ): ?>
                        <?php // override $post
                        $post = $post_object;
                        setup_postdata( $post );
                        ?>

                        <div class="result-holder-main">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <h2 class="hh-1"><?php the_title(); ?></h2>
                                <?php 
                                $content = get_the_content(); ?>
                                <p><?php echo wp_trim_words( $content , '18' ); ?></p>
                            </a>
                            
                            <div class="meta-container">
                                <div class="container-row">
                                    <div class="col1">Case Type</div>
                                    <div class="col2">&nbsp;</div>
                                    <div class="col3">
                                    <?php 
                                        // SHOW YOAST PRIMARY CATEGORY, OR FIRST CATEGORY
                                        $category = get_the_category();
                                        $useCatLink = true;
                                        // If post has a category assigned.
                                        if ($category){
                                            $category_display = '';
                                            $category_link = '';
                                            if ( class_exists('WPSEO_Primary_Term') ){
                                            // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
                                            $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
                                            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
                                            $term = get_term( $wpseo_primary_term );
                                            if (is_wp_error($term)) { 
                                                // Default to first category (not Yoast) if an error is returned
                                                $category_display = $category[0]->name;
                                                $category_link = get_category_link( $category[0]->term_id );
                                            } else { 
                                                // Yoast Primary category
                                                $category_display = $term->name;
                                                $category_link = get_category_link( $term->term_id );
                                            }
                                        } 
                                        else {
                                            // Default, display the first category in WP's list of assigned categories
                                            $category_display = $category[0]->name;
                                            $category_link = get_category_link( $category[0]->term_id );
                                        }
                                        // Display category
                                        if ( !empty($category_display) ){
                                            echo '<span class="post-category">'.htmlspecialchars($category_display).'</span>';
                                        }

                                        }
                                        ?>
                                    </div>
                                </div>
                                
                                <div class="container-row last">
                                    <div class="col1">Settlement $</div>
                                    <div class="col2">&nbsp;</div>
                                    <div class="col3">
                                        <?php $result_value = get_field('case_result_value');
                                        $formatted = number_format($result_value,2); ?>
                                        $<?php echo $formatted; ?>
                                    </div>
                                </div>
                            </div>
                        </div>  


                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>

                    </div>

                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="location-body">
        <div class="container">
            <div class="columns">
                <?php if( have_rows('bottom_section_content_blocks') ): ?>
                <div class="column-75 center block">
                    <?php while( have_rows('bottom_section_content_blocks') ): the_row(); ?>  
                    <div class="content-block" id="<?php the_sub_field('section_anchor'); ?>">
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

    <section class="testimonials">
        <div class="container">
            <div class="columns testimonial-holder">
                <div class="column-75 center">

                <div class="testimonials-heading">  
                    <div class="post-tag">Testimonials</div>
                </div>

                <?php if( have_rows('testimonials') ): ?>
                <?php while( have_rows('testimonials') ): the_row(); ?>

                <?php $post_object = get_sub_field('testimonial'); ?>
                <?php if( $post_object ): ?>
                    <?php // override $post
                    $post = $post_object;
                    setup_postdata( $post );
                    ?>

                    <div class="testimonial-holder-main">
                        <div class="author-rating"><span class="stars">★★★★★</span> <p class="small"><?php the_field('client_name'); ?></p></div>
                        <?php the_content(); ?>
                        <?php if(get_field('review_source')) {
                            $review_source = get_field('review_source');
                            if ($review_source == 'google') { ?>
                                <img src="/wp-content/uploads/2022/09/reviews-google.png" class="review-logo">
                            <?php } else { ?>
                                <img src="/wp-content/uploads/2022/09/reviews-facebook.png" class="review-logo">
                            <?php } ?>
                        <?php } ?>

                    </div>

                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

                    <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>

                <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="location-body">
        <div class="container">
            <div class="columns">
                <div class="column-75 center block resources">
                    <div class="content-block" id="<?php the_field('resource_section_anchor'); ?>">
                        <p class="sub-text"><?php the_field('resource_section_highlight_text'); ?></p>
                        <h2><?php the_field('resource_section_h2'); ?></h2>
                        <div class="spacer-30"></div>
                        <?php if( have_rows('resource') ): ?>
                        <?php while( have_rows('resource') ): the_row(); ?>
                            <h3><?php the_sub_field('resources_title'); ?></h3>
                            <p><?php the_sub_field('resources_copy'); ?></p>
                            <?php if (get_sub_field('resources_add_buttons')) { ?>
                                <?php $n=1; ?>
                                <?php if( have_rows('resource_buttons') ): ?>
                                    <?php while( have_rows('resource_buttons') ): the_row(); ?>
                                        <a href="<?php the_sub_field('button_link'); ?>" title="<?php the_sub_field('button_text'); ?>" class="btn black btn_<?php echo $n; ?>" <?php if(get_sub_field('external_link')) {?> target="_blank"<?php } ?>><?php the_sub_field('button_text'); ?></a><br>
                                        <?php $n++; ?>
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
                    <div class="content-block" id="<?php the_field('faq_section_anchor'); ?>">
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

    <section class="pre-footer-new">
        <div class="container wide">
            <div class="columns normal">
                <div class="column-50 white padded">
                    <?php the_field('pre_footer_main_content_block'); ?>
                    <div class="bullet-contact">
                        <a href="tel:8004878669" title="Call KNR Today" class="bullet"><img src="/wp-content/uploads/2022/10/knr-hurt-now.png" alt="Call KNR Legal Today"></a>
                        <?php
                        $post_data = get_post($post->post_parent);
                        $parent_slug = $post_data->post_name;
                        ?>
                        <a href="/<?php echo $parent_slug; ?>/contact/" title="More On Comparative Negligence in Ohio" class="btn black">Contact KNR</a>
                    </div>
                    <div class="spacer-30"></div>
                    <div class="pre-footer_bottom-text">12 Convenient Locations <span>//</span> Free Consultations <span>//</span> Available 24/7 <span>//</span> No Recovery, No Fee</div>
                </div>
                <div class="column-50 img-bg" style="background-image:url(/wp-content/uploads/2023/10/homepage-1-2.jpg);">
                    <div class="caption"><span>At KNR, we ask, <strong>'what can we do?'</strong> so you move on with more.</span></div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();?>