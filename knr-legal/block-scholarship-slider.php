

<section class="related-readings">
    <div class="container wide">
        <div class="columns">
            <div class="column-full">
                <h4>Previous Scholarship Winners</h4>

                <?php
                $related = get_posts( 
                    array( 
                        'category__in' => 133, 
                        'numberposts'  => 4, 
                        'post__not_in' => array( $post->ID ) 
                    ) 
                );

                $totalposts = count($related); 

                if ($totalposts > 0) {
                    $show_posts = $related;
                } else {
                    $show_posts = get_posts(
                        array( 
                            'numberposts'  => 4, 
                            'post__not_in' => array( $post->ID ) 
                        ) 
                    );
                }
                    
                ?>

                <div id="related-posts-slider" class="slide">
                <?php foreach( $show_posts as $post ) {
                    setup_postdata($post); { ?>
                    <div class="slider-container">

                        <?php if ($totalposts > 1) { ?>
                        <div class="slider-nav">
                            <div class="slide-pagination">
                                <div class="slider-next-button-slick"><span class="icon-chevron-right"></span></div><span class="pagingInfo"></span><div class="slider-prev-button-slick"><span class="icon-chevron-left"></span></div>
                            </div>
                        </div>

                        <?php } ?>
                    
                        <div class="slider-main">
                            <div class="slider-main-holder">
                                <div class="post-tag">Blog Post</div>
                                <div class="post-content">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <h4><strong><?php the_title(); ?></strong></h4>
                                    </a>
                                    <p class="small"><strong>Posted in:</strong> 
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
                        <?php if (has_post_thumbnail( $post->ID ) ): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                        <?php endif; ?>
                        <div class="slider-photo" style="background-image: url('<?php echo $image[0]; ?>')"></div>
                    </div>    

                <?php } } wp_reset_postdata(); ?>
                </div> 
            </div>
        </div>
    </div>

</section>
