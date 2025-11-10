<?php
/**
 * Law Category Interior Page
 * Template Name: Practice Area Parent
 * @package KNR Legal
 * @author Postali LLC
 */
get_header(); ?>

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

<?if  ( $_SESSION['office_location'] <> 'global' ) { ?>
    <div class="spacer-30"></div>
<?php } ?>

    <section class="page-header">
        <div class="container bordered">
            <div class="columns bottom">
                <div class="column-full center">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                </div>
                <div class="column-50">
                <h1><?php the_field('page_title'); ?></h1>
                <p class="banner-subhead"><?php the_field('banner_sub_head'); ?></p>
                <?php if($_SESSION['office_location'] != 'global') { ?>
                    <a href="tel:<?php echo $phone ?>" title="Call our <?php echo $city; ?> Office" class="btn black"><?php echo $phone ?></a> 
                <?php } else { ?>
                    <a href="tel:<?php the_field('global_phone','options') ?>" title="Call our <?php echo $city; ?> Office" class="btn black"><?php the_field('global_phone','options') ?></a> 
                <?php } ?>
                <div class="spacer-30"></div>
                <p class="x-small">12 Ohio Locations <span class="red">//</span> Free Consultations <span class="red">//</span> Available 24/7 <span class="red">//</span> No Recovery, No Fee</p>
                <div class="spacer-15"></div>
                </div>
                <div class="column-50 on-page">
                    <?php 
                        set_query_var('random_partner','name');
                        get_template_part('block','random-partner'); 
                        set_query_var('random_partner', false);
                    ?>
                    <span class="top-detector"></span>
                </div>
            </div>
        </div>

        <div class="on-page-nav-follower">
            <div class="accordions">
                <div class="accordions_title"><h3>What Can I Help You With Today?</h3><span></span></div>
                <div class="accordions_content">
                <?php if( have_rows('main_content') ): ?>
                <?php $m=1; ?>
                <ul>
                <?php while( have_rows('main_content') ): the_row(); ?>  
                    <?php if (get_sub_field('h2_block_subhead')) { ?>
                        <li>
                            <a href="#panel_<?php echo $m; ?>" class="ignore-highlight on-page-links">
                            <?php if (get_sub_field('on_page_nav_link_text')) { ?>
                                <?php the_sub_field('on_page_nav_link_text'); ?>
                            <?php } else { ?>
                                <?php the_sub_field('block_headline'); ?>
                            <?php } ?>
                        </a>
                    </li>
                    <?php } ?>
                <?php $m++; ?>
                <?php endwhile; ?>
                </ul>
                <?php endif; ?> 
                </div>
            </div>
        </div>

        <div class="container">
            <div class="columns">
                <div class="column-50 review">
                    <div class="spacer-30"></div>
                    <?php 
                    $review_banner = get_field('banner_testimonial');
                    if( $review_banner ): ?>
                        <?php $title = get_the_title( $review_banner->ID );
                        $client_name = get_field( 'client_name', $review_banner->ID );
                        $review_source = get_field( 'review_source', $review_banner->ID );
                        ?>
                        <h4>"<?php echo esc_html( $review_banner->post_content ); ?>"</h4>
                        <div class="author-rating"><span class="stars">★★★★★</span> <p class="small"><?php echo esc_html( $review_banner->client_name ); ?></p></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>    
   
    <?php $n=1 ?>
    <?php if( have_rows('main_content') ): ?>
    <?php while( have_rows('main_content') ): the_row(); ?>      
	<section class="parent-content-block" id="panel_<?php echo $n; ?>">
        <div class="container wide">
            <div class="columns normal">
                <div class="column-50 white padded">
                    <div class="padded-content">
                        <p class="sub-text"><?php the_sub_field('h2_block_subhead'); ?></p>
                        <h2><?php the_sub_field('block_headline'); ?></h2>
                        <?php the_sub_field('block_intro_copy'); ?>
                    </div>
                </div>
                <?php if (get_sub_field('block_image_unique')) { ?>
                <div class="column-50 img-bg" style="background-image:url('<?php the_sub_field('block_image_unique_img'); ?>');">
                    <div class="caption"><span><?php the_sub_field('block_image_caption'); ?></span></div>
                </div>
                <?php } else { ?>
                <div class="column-50 img-bg" style="background-image:url('/wp-content/uploads/2022/11/practice-area-<?php echo $n; ?>-1.jpg');">
                    <div class="caption"><span><?php the_sub_field('block_image_caption'); ?></span></div>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="container margin-left">
            <div class="columns">
            <?php if (get_sub_field('include_in_this_section') == 'none') : ?>
                <div class="column-full content block">
            <?php else : ?>
                <div class="column-50 content block">
            <?php endif; ?>
                    <div class="spacer-60"></div>
                    <?php the_sub_field('main_copy_block'); ?>
                </div>
                <div class="column-50 extra">
                <?php if (get_sub_field('include_in_this_section') == 'awards') { ?>
                    <div class="award">
                        <div class="post-tag">Awards</div>
                        <div id="awards-slider" class="slide">
                            <?php $i=1 ?>
                            <?php if( have_rows('awards','options') ): ?>
                            <?php while( have_rows('awards','options') ): the_row(); ?>  
                                <div class="column-50" id="award_<?php echo $n; ?>">
                                <?php 
                                $image = get_sub_field('award_logo');
                                if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php the_sub_field('award_title') ?>" />
                                <?php endif; ?>
                                </div>
                                <?php $i++; ?>
                            <?php endwhile; ?>
                            <?php endif; ?> 
                        </div>
                    </div>
                <?php } elseif (get_sub_field('include_in_this_section') == 'result') { ?>
                    <div class="result">
                        <div class="case-result">
                        <?php
                        $custom_result = get_sub_field('case_result');
                        if( $custom_result ): ?>

                        <?php $title = get_the_title( $custom_result->ID );
                        $content = get_the_excerpt( $custom_result->ID ); ?>

                        <h4 id="hh-1"><?php echo $title; ?></h4>
                        <p class="small"><?php echo wp_trim_words( $content , '18' ); ?></p>

                            <div class="meta-container">
                                <div class="container-row">
                                    <div class="col1">Case Type</div>
                                    <div class="col2">&nbsp;</div>
                                    <div class="col3">
                                    <?php 
                                        // SHOW YOAST PRIMARY CATEGORY, OR FIRST CATEGORY
                                        $category = get_the_category($custom_result->ID);
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
                                        <?php $result_value = get_field('case_result_value', $custom_result->ID );
                                        $formatted = number_format($result_value,2); ?>
                                        $<?php echo $formatted; ?>
                                    </div>
                                </div>
                                
                        <?php endif; ?>
                            
                        </div>
                    </div>

                <?php } ?>

                <?php if ($n == 1) { ?>
                <?php if(get_sub_field('also_include_in_this_section')) { ?>

                    <div class="sidebar-nav">
                        <div class="nav-header">
                            <div class="post-tag">Practice Areas</div>
                        </div>

                        <div class="spacer-30"></div>
                        <ul>
                        <?php if( have_rows('sidebar_practice_areas_menu') ): ?>
                        <?php while( have_rows('sidebar_practice_areas_menu') ): the_row(); ?>  
                            <li><a href="<?php the_sub_field('page_link'); ?>" class="ignore-highlight"><?php the_sub_field('page_title'); ?></a></li>
                        <?php endwhile; ?>
                        <?php endif; ?> 
                        </ul>
                        <div class="view-all">
                            <?php
                            $post_data = get_post($post->post_parent);
                            $parent_slug = $post_data->post_name;
                            ?>
                            <p><a href="/<?php echo $parent_slug; ?>/practice-areas/" title="All practice areas" class="ignore-highlight">View All Practice Areas</a></p>
                        </div>
                    </div>
                <?php } ?>
                <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <?php if ($n == 1) { ?>
    <!-- add testimonials block after first section -->
    
    <section class="parent-testimonial-block">
        <div class="container bordered">
            <div class="columns bottom">
                <div class="column-50 block">
                    <?php
                    $review_block = get_field('full_testimonial');
                    if( $review_block ): ?>
                        <?php $client_name = get_field( 'client_name', $review_block->ID );
                        $review_source = get_field( 'review_source', $review_block->ID );
                    ?>
                    <p class="sub-text">What Our Clients Are Saying</p>
                    <div class="author-rating"><span class="stars">★★★★★</span> <p class="small"><?php echo esc_html( $review_block->client_name ); ?></p></div>
                    <div class="spacer-15"></div>
                    <h2>"<?php the_field('testimonial_callout'); ?>"</h2>
                    <p class="sub-text">Full Review:</p>
                    <p>"<?php echo esc_html( $review_block->post_content ); ?>"</p>
                    <div class="spacer-15"></div>
                    <?php if (!empty($review_source)) { ?>
                        <img src="/wp-content/uploads/2022/09/reviews-<?php echo $review_source; ?>.png" class="reviews-logo">
                        <div class="spacer-60"></div>
                    <?php  } ?>
                    <?php endif; ?>
                </div>
                <div class="column-50 centered">
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
    </section>

    <?php } ?>

    <?php $n++ ?>

    <?php endwhile; ?>
    <?php endif; ?> 


    <?php if( have_rows('related_articles') ): ?>
    <section class="related-readings">
        <div class="container wide">
            <div class="columns">
                <div class="column-full">
                    
                    <h4>Related Readings</h4>
                    <div id="related-posts-slider" class="slide">
                    <?php while( have_rows('related_articles') ): the_row(); ?>  
                        
                        <?php 
                        $post_object = get_sub_field('article');
                        if( $post_object ): ?>
                            <?php $title = get_the_title( $post_object->ID );
                            $image = get_post_thumbnail_id( $post_object->ID );
                            $category = get_the_category($post_object->ID);
                            $permalink = get_permalink($post_object->ID);
                            ?>
                        <?php endif; ?>

                        <div class="slider-container">
                        <div class="slider-nav">
                            <div class="slide-pagination">
                                <div class="slider-next-button-slick"><span class="icon-chevron-right"></span></div><span class="pagingInfo"></span><div class="slider-prev-button-slick"><span class="icon-chevron-left"></span></div>
                            </div>
                        </div>
                        <div class="slider-main">
                            <div class="slider-main-holder">
                                <div class="post-tag">Blog Post</div>
                                <div class="post-content">
                                    <a href="<?php echo esc_html($permalink) ?>" title="<?php echo esc_html( $title ); ?>">
                                        <h4><strong><?php echo esc_html( $title ); ?></strong></h4>
                                    </a>
                                    <p class="small"><strong>Posted in:</strong> 
                                    <?php 
                                    // SHOW YOAST PRIMARY CATEGORY, OR FIRST CATEGORY
                                    
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
                                        if ( $useCatLink == true && !empty($category_link) ){
                                            echo '<span class="post-category">';
                                            echo '<a href="'.$category_link.'">'.htmlspecialchars($category_display).'</a>';
                                            echo '</span>';
                                        } else {
                                            echo '<span class="post-category">'.htmlspecialchars($category_display).'</span>';
                                        }
                                    }

                                    }
                                    ?> 
                                    </p>
                                </div>
                            </div>    
                        </div>
                        <?php if (has_post_thumbnail( $post_object->ID ) ): ?>
                        <?php $image = wp_get_attachment_image_src( $image, 'single-post-thumbnail' ); ?>
                        <?php endif; ?>
                        <div class="slider-photo" style="background-image: url('<?php echo $image[0]; ?>')"></div>
                    </div> 
                    <?php endwhile; ?>
                    
                </div>
            </div>
        </div>
    </section>

    <?php else: ?>
    <?php get_template_part('block','related-readings'); ?>
    <?php endif; ?> 

    
    <?php get_template_part('block','helpful-resources'); ?>

    <?php get_template_part('block','pre-footer'); ?>


</div>
	
	
<?php get_footer(); ?>

