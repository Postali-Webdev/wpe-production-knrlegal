    <section class="attorney-slider">
        <div class="container">
            <div class="columns">

                <div class="slide-pagination">
                    <div class="prev-button-slick"><span class="icon-arrow-left"></span></div><span class="pagingInfo"></span><div class="next-button-slick"><span class="icon-arrow-right"></span></div>
                </div>

                <h3>Our Partners</h3>
                <div id="attorney-slider" class="slide">

                <?php if( have_rows('partners','options') ): ?>
                <?php while( have_rows('partners','options') ): the_row(); ?>
                    <?php $post_object = get_sub_field('partner'); ?>
                    <?php if( $post_object ): ?>
                        <?php // override $post
                        $post = $post_object;
                        setup_postdata( $post );
                        ?>

                        <div class="column-25 block">
                            <div class="attorney-profile-box">
                                <a href="<?php the_permalink(); ?>" title="Visit <?php the_field('first-name'); ?>'s profile">
                                    <div class="attorney-photo">
                                    <?php 
                                    $image = get_field('attorney_photo');
                                    if( !empty( $image ) ): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                    <div class="post-button">
                                        <div>
                                            <span class="icon-arrow-right"></span>
                                        </div>
                                    </div>
                                    </div>
                                </a>
                                <div class="attorney-details">
                                    <a href="<?php the_permalink(); ?>" title="Visit <?php the_field('first_name'); ?>'s profile" class="attorney-link"><?php the_title(); ?></a>
                                    <p class="small"><?php the_field('attorney_location'); ?> Office</p>
                                    <p class="small"><strong>P</strong> <a href="tel:<?php the_field('phone_number'); ?>" title="Call <?php the_title(); ?> today"><?php the_field('phone_number'); ?></a></p>
                                </div>
                            </div>
                        </div>

                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
                </div>

                <a href="/our-attorneys/" class="btn black">View All Attorneys</a>

            </div>
        </div>
    </section>