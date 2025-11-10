<?php 
    // set category of this practice area
    $categories = get_the_category();
    $this_category = $categories[0]->cat_name;
    ?>

    <?php if( have_rows('helpful_resources','options') ): ?>
    <?php while( have_rows('helpful_resources','options') ): the_row(); ?>  

        <?php 
        // set category of resources for this parent page
        $term = get_sub_field('practice_area_category');
        if( $term ): ?>

        <?php 
        // display resources section if both categories match
        $resource_category = $term->name; 
        if ($resource_category == $this_category) { ?>
        <?php $found = true; ?>
            
        <section class="helpful-resources">
            <div class="container">
                <div class="post-tag">Helpful <?php echo $resource_category; ?> Resources</div>
                <div class="columns">
                <?php while( have_rows('resources') ): the_row(); ?>  
                    <?php if (get_sub_field('resource_type') == 'onsite') { ?>
                        <?php 
                        $onsite = get_sub_field('page_on_site');
                        if( $onsite ): ?>
                            <?php $title = get_the_title( $onsite->ID );
                            $permalink = get_the_permalink( $onsite->ID );

                        ?>
                        <a class="column-20 resource" href="<?php echo esc_html($permalink); ?>">
                            <span class="underline"><?php echo esc_html($title); ?></span>
                        </a>
                    <?php endif; ?>
                        
                    <?php } else { ?>
                        <a class="column-20 resource" href="<?php echo esc_html($permalink); ?>" target="_blank">
                            <span class="underline"><?php the_sub_field('external_link_text'); ?></span>
                        </a>
                    <?php } ?>
                <?php endwhile; ?>
                </div>
                <div class="columns">
                    <div class="column-full">
                    <?php if( have_rows('additional_resources') ): ?>
                        <div class="spacer-30"></div>
                        <div class="accordions resources">
                        <div class="accordions_title"><p class="small"><strong>View all <?php echo $resource_category; ?> resources</strong></p><span></span></div>
                        <div class="accordions_content">
                            <ul>
                            <?php while( have_rows('additional_resources') ): the_row(); ?>  
                                <li>
                                    <?php 
                                    $additional = get_sub_field('page_on_site');
                                    if( $additional ): ?>
                                        <?php $title = get_the_title( $additional->ID );
                                        $permalink = get_the_permalink( $additional->ID );

                                    ?>
                                    <a href="<?php echo esc_html($permalink); ?>"><?php echo esc_html($title); ?></a>
                                    <?php endif; ?>
                                </li>
                            <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>


        <?php } ?>

        <?php endif; ?>

    <?php endwhile; ?>
    <?php endif; ?> 