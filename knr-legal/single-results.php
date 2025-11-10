<?php
/**
 * Single template
 *
 * @package KNR Legal
 * @author Postali LLC
 */

$blogDefault = get_field('default_blog_image', 'options');

get_header();?>

<div class="body-container">

    <section class="page-header">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <p id="breadcrumbs"><span><span><a href="/">Homepage</a> / <a href="/results/">Results</a> / <span class="breadcrumb_last" aria-current="page"><?php the_title(); ?></span></span></span></p>
                </div>
                <div class="column-full center centered block">
                    <p class="sub-text">KNR Legal Blog</p>
                    <h1><?php the_title(); ?></h1>
                    <div class="category-list">
                        <p class="small">
                            <span class="post-meta"><strong>Posted in: </strong> 
                                <div class="category-link">
                                    <ul class="categories">
                                    <?php
                                    // to display categories without a link
                                    foreach ( ( get_the_category() ) as $category ) { ?>
                                        <li><?php echo $category->cat_name; ?></li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="blog-post">
        <div class="container">
            <div class="columns">
                <div class="column-33">
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
                <div class="column-66 block">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- related readings repeater -->

    <section class="related-readings">
        <div class="container wide">
            <div class="columns">
                <div class="column-full">
                    <h4>Related Readings</h4>
                    <?php
                    $related = get_posts( 
                        array( 
                            'category__in' => wp_get_post_categories( $post->ID ), 
                            'numberposts'  => 4, 
                            'post__not_in' => array( $post->ID ) 
                        ) 
                    );
                    
                    if( $related ) { ?>
                    <div id="related-posts-slider" class="slide">
                    <?php foreach( $related as $post ) {
                        setup_postdata($post); { ?>
                        <div class="slider-container">
                            <div class="slider-nav">
                                <div class="slide-pagination">
                                    <div class="slider-prev-button-slick"><span class="icon-chevron-left"></span></div><span class="pagingInfo"></span><div class="slider-next-button-slick"><span class="icon-chevron-right"></span></div>
                                </div>
                            </div>
                            <div class="slider-main">
                                <div class="slider-main-holder">
                                    <div class="post-tag">Blog Post</div>
                                    <div class="post-content">
                                        <h4><strong><?php the_title(); ?></strong></h4>
                                    </div>
                                </div>    
                            </div>
                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                            <?php endif; ?>
                            <div class="slider-photo" style="background-image: url('<?php echo $image[0]; ?>')"></div>
                        </div>    

                        
                    <?php } } wp_reset_postdata(); ?>
                    </div> 
                    <?php } ?>
                    <a href="<?php the_permalink(); ?>" class="btn black">Visit Blog Page</a>
                </div>
            </div>
        </div>

    </section>

</div>

<?php get_footer(); ?>