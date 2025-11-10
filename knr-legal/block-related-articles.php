<?php if( have_rows('related_articles') ): ?>
    <?php while( have_rows('related_articles') ): the_row(); ?>
        <?php $post_object = get_sub_field('resource_article'); ?>
        <?php if( $post_object ): ?>
            <?php // override $post
            $post = $post_object;
            setup_postdata( $post );
            ?>

            <?php if (get_sub_field('resource_tag') == 'article') { ?><!-- if this is an article -->

            <div class="bordered-box">
            <div class="resource-tag"><?php the_sub_field('resource_tag'); ?></div>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">  
                    <div class="bordered-box-top">
                        <h4><?php the_title(); ?></h4>
                    </div>
                    <div class="bordered-box-bottom">
                        <div class="column-full">
                            <div class="blog-detail-block_1">
                                <p><span>Written By:</span><br>Kisling, Nestico & Redick, LLC</p>
                            </div>
                            <div class="blog-detail-block_2">
                                <p><span>Date Posted:</span><br> <?php the_date( 'M d, Y' ); ?></p>
                            </div>
                            <div class="blog-detail-block_3">
                                <p>
                                    <span>Category:</span><br>
                                    <?php
                                    // to display categories without a link
                                    foreach((get_the_category()) as $category) {
                                        echo '<span class="category">' . $category->cat_name . '</span>';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="post-button">
                        <div><span class="icon-arrow-right"></span><span class="btn-text">Read Article</span></div>
                    </div>

                </a>
            </div>

            <?php } elseif (get_sub_field('resource_tag') == 'resource') { ?> <!-- if this is a resource -->

            <div class="bordered-box">
            <div class="resource-tag"><?php the_sub_field('resource_tag'); ?></div>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">  
                    <div class="bordered-box-top">
                        <h4><?php the_title(); ?></h4>
                    </div>
                    <div class="bordered-box-bottom">
                        <div class="column-full">
                            <div class="article-detail-block">
                            <?php 
                            $content = get_the_content(); ?>
                            <p><?php echo wp_trim_words( $content , '20' ); ?></p>

                            </div>
                        </div>
                    </div>

                    <div class="post-button">
                        <div><span class="icon-arrow-right"></span><span class="btn-text">Visit Page</span></div>
                    </div>

                </a>
            </div>
            <?php } ?>

            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>
    <?php endwhile; ?>
    <?php endif; ?>