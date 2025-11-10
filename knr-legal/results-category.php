<?php
/**
 * Category Interior Page - Results
 * Template Name: Results Category
 * @package KNR Legal
 * @author Postali LLC
 */

$category = get_queried_object();
$get_category = $category->slug;

$_SESSION['current_category'] = $get_category;

$cat_id = get_query_var('cat');

get_header(); ?>

<div class="body-container">

    <section class="page-header">
        <div class="container bordered">
            <div class="columns">
                <div class="column-full">
                    <p id="breadcrumbs"><span><span><a href="/">Homepage</a> / <a href="/results/">Results</a> / <span class="breadcrumb_last" aria-current="page"><?php echo single_cat_title(); ?></span></span></span></p>
                </div>
                <div class="spacer-60"></div>
                <div class="column-full">
                    <h1>Case Results - <?php echo single_cat_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section id="results-holder">
        <div class="container">
            <div class="columns">
                <div class="column-full block">
                    <div class="posts-filter">

                        <span class="small">Filter by:</span>

                        <a href="/results/" title="All results" class="btn rounded transparent">All</a>
                        <a href="/category/car-accidents/" title="Car accident results" class="btn rounded transparent <?php if($get_category == 'car-accidents'){ ?>active<?php } ?>">Car Accidents</a>
                        <a href="/category/truck-accidents/" title="Truck accident results" class="btn rounded transparent <?php if($get_category == 'truck-accidents'){ ?>active<?php } ?>">Truck Accidents</a>
                        <a href="/category/motorcycle-accidents/" title="Motorcycle accident results" class="btn rounded transparent <?php if($get_category == 'motorcycle-accidents'){ ?>active<?php } ?>">Motorcycle Accidents</a>
                        <a href="/category/ohio-personal-injury/" title="Personal injury results" class="btn rounded transparent <?php if($get_category == 'ohio-personal-injury'){ ?>active<?php } ?>">Personal Injury</a>

                        <a class="all-categories active">View All Categories <span>+</span></a>

                    </div>

                    <div class="expand-categories active">
                        <?php
                            wp_list_categories_for_post_type('results')
                        ?>
                    </div>

                    <div class="spacer-90"></div>
                
                    <div class="result-holder">
                    <?php
                        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
                        $wp_query = new WP_Query(array(
                            'posts_per_page'    => 6,
                            'post_type'         => 'results',
                            'meta_key'			=> 'case_result_value',
                            'orderby'			=> 'meta_value_num',
                            'order'				=> 'DESC',
                            'cat'               => $cat_id
                        ));
                        
                        while ($wp_query->have_posts()): $wp_query->the_post()?>   
                        
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

                        <?php endwhile; ?>
                    </div>
                    
                    <div class="spacer-30"></div>

                    <?php                    
                    // don't display the button if there are not enough posts
                    if (  $wp_query->max_num_pages > 1 ) { ?>
                        <a class="btn-load-more btn transparent rounded" data-category="<?php echo esc_attr($cat_id); ?>">Load More Results</a>
                    <?php } ?>

                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div><!-- #content -->
    </section>    

</div>



<?php get_footer(); ?>