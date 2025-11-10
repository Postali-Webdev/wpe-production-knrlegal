<?php
/**
 * Law Category Interior Page
 * Template Name: Practice Area Landing
 * @package KNR Legal
 * @author Postali LLC
 */
get_header(); ?>

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
                <div class="column-66">
                    <h1>Our Practice Areas</h1>
                    <div class="spacer-30"></div>
                </div>
                <div class="column-33">
                    <?php 
                        set_query_var('random_partner','recovered');
                        get_template_part('block','random-partner'); 
                        set_query_var('random_partner', false);
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="all-practice-areas">
        <div class="container">
            <div class="columns">
                <div class="column-full block practice-areas">
                
                <?php 
                // show this block on global practice area landing
                if (!in_array(19502, $post->ancestors) && !in_array(12388, $post->ancestors) && !in_array(12390, $post->ancestors) && !in_array(12392, $post->ancestors) && !in_array(12394, $post->ancestors) && !in_array(12396, $post->ancestors) && !in_array(12398, $post->ancestors) && !in_array(12400, $post->ancestors) && !in_array(12402, $post->ancestors) && !in_array(12405, $post->ancestors) && !in_array(12473, $post->ancestors))  { ?>


                    <!-- parent repeater -->
                    
                    <?php $n = 1; ?>
                    <?php if( have_rows('practice_areas') ): ?>
                    <?php while( have_rows('practice_areas') ): the_row(); ?>  

                    <div class="practice-area-container">

                    <?php $child_count = count(get_sub_field('practice_area_pages')); ?>

                    <div class="practice-area-box">
                        <div class="box-title">
                            <h2><?php the_sub_field('practice_area_parent_title'); ?></h2>
                        </div>
                        <!-- child pages box -->
                        <?php if( have_rows('practice_area_pages') ): ?>
                            <div class="practice-areas-list">
                                <ul>
                                <?php while( have_rows('practice_area_pages') ): the_row(); ?>  
                                <?php if (get_row_index() <= 8) { ?>
                                    <li><a href="<?php the_sub_field('child_page_link'); ?>" title="<?php the_sub_field('child_page_title'); ?>" class="ignore-highlight"><?php the_sub_field('child_page_title'); ?></a></li>
                                <?php } ?>    
                                <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php endif; ?> 

                        <!-- child pages accordion -->
                        <?php if( have_rows('practice_area_pages') ): ?>
                            <div class="practice-areas-list extra_<?php echo $n; ?>">                  
                                <ul>
                                <?php while( have_rows('practice_area_pages') ): the_row(); ?>  
                                <?php if (get_row_index() > 8) { ?>
                                    <li><a href="<?php the_sub_field('child_page_link'); ?>" title="<?php the_sub_field('child_page_title'); ?>" class="ignore-highlight"><?php the_sub_field('child_page_title'); ?></a></li>
                                <?php } ?>    
                                <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php endif; ?> 
                        
                    </div>
                    <?php if ($child_count > 9) { ?>
                    <div class="btn black expand" id="expand_btn_<?php echo $n; ?>" data-target='<?php echo $n; ?>'><?php the_sub_field('practice_area_button_text'); ?> +</div>
                    <?php } ?>
                    <div class="spacer-90 mobile"></div>

                    <?php $n++; ?>

                    </div>

                    <?php endwhile; ?>
                    <?php endif; ?> 

                    <?php } else  { ?>
                        <div class="page-list-header">
                            <?php the_title(); ?>
                        </div>
                        <ul class="wpb_page_list">
                        <?php
                        $mypages = get_pages( 
                            array( 
                                'child_of' => $post->post_parent, 
                                'sort_column' => 'post_name', 
                                'sort_order' => 'asc',
                                'meta_key' => '_wp_page_template',
                                'meta_value' => 'page-practice-area-parent.php',
                                'hierarchical' => 0,
                                 ) );

                        foreach( $mypages as $page ) { ?>
                            <li><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></li>
                        <?php }	?>
                        <ul>

                    <?php } ?>
                </div>
            </div>
        
        </div>
    </section>

</div>
	
	
<?php get_footer(); ?>