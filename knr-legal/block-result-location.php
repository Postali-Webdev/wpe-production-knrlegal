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