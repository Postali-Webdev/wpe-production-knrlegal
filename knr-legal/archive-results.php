<?php
/**
 * Template Name: Post Archive - Results
 * 
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
            <div class="columns bottom">
                <div class="column-full">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                </div>
                <div class="column-66">
                    <h1><?php the_field('results_page_title','options'); ?></h1>
                    <?php
                    $featured_result = get_field('results_featured_result','options');
                    if( $featured_result ): ?>
                        <?php $title = get_the_title( $featured_result->ID );
                        $content = get_the_content($featured_result->ID );
                        $category = get_the_category($featured_result->ID );
                        $permalink = get_the_permalink($featured_result->ID );
                        ?>

                        <a href="<?php echo esc_html($permalink); ?>" title="<?php the_title_attribute(); ?>">
                            <h2 class="hh-1"><?php echo esc_html($title); ?></h2>
                            <p><?php echo wp_trim_words( $content , '30' ); ?></p>
                        </a>

                        <div class="meta-container">
                            <div class="container-row">
                                <div class="col1">Case Type</div>
                                <div class="col2">&nbsp;</div>
                                <div class="col3">
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
                                            echo '<div class="results-toggle-item" data="'.$category[0]->slug.'">'.htmlspecialchars($category_display).'</div>';
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
                                    <?php $result_value = get_field('case_result_value', $featured_result->ID );
                                    $formatted = number_format($result_value,2); ?>
                                    $<?php echo $formatted; ?>
                                </div>
                            </div>
                        </div>

                        <?php $post = $featured_result; ?>
                        <?php setup_postdata( $post ); ?>
                        <?php $featured_ID = get_the_ID(); ?>
                        <?php wp_reset_postdata(); ?>

                    <?php endif; ?>         
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

 

    <section id="results-holder">
        <div class="container">
            <div class="columns">
                <div class="column-full block">
                    <div class="results-toggle-container">

                        <span class="small">Filter by:</span>
                        
                        <div data="all" class="results-toggle-item btn rounded transparent active" onClick="(function(){
                            jQuery('.toggle-text').text('View All Categories');
                            return false;
                        })();return false;">All</div>
                        <div data="car-accidents" class="results-toggle-item btn rounded transparent" onClick="(function(){
                            jQuery('.toggle-text').text('View All Categories');
                            return false;
                        })();return false;">Car Accidents</div>
                        <div data="truck-accidents" class="results-toggle-item btn rounded transparent" onClick="(function(){
                            jQuery('.toggle-text').text('View All Categories');
                            return false;
                        })();return false;">Truck Accidents</div>
                        <div data="motorcycle-accidents" class="results-toggle-item btn rounded transparent" onClick="(function(){
                            jQuery('.toggle-text').text('View All Categories');
                            return false;
                        })();return false;">Motorcycle Accidents</div>
                        <div data="ohio-personal-injury" class="results-toggle-item btn rounded transparent" onClick="(function(){
                            jQuery('.toggle-text').text('View All Categories');
                            return false;
                        })();return false;">Personal Injury</div>

                        <a class="all-categories-desktop">View All Categories <span>+</span></a>
                        <a class="all-categories-mobile"><div class="toggle-text">View All Categories</div> <span>+</span></a>

                    </div>

                    <div class="expand-categories">
                        <?php $cats = get_categories('hide_empty=0&exclude=91,93,97,104');  // Get categories ?>

                        <?php if ($cats) : ?>
                            <ul>
                            <?php // Loop through categories to print name and count excluding CPTs ?>
                            <?php foreach ($cats as $cat) { 

                                // Create a query for the category to determine the number of posts
                                $category_id= $cat->term_id;
                                $cat_query = new WP_Query( array( 
                                    'post_type'         => 'results', 
                                    'posts_per_page'    => -1,
                                    'cat'               => $category_id,
                                ) );
                                $count = $cat_query->found_posts; ?>

                                <?php 
                                // output category button if category is not empty
                                if ($count != 0) { ?>
                                    <div data="<?php echo $cat->slug; ?>" class="results-toggle-item btn rounded transparent" onClick="(function(){
                                        jQuery('.toggle-text').text('<?php echo $cat->name; ?>');
                                        return false;
                                    })();return false;"><?php echo $cat->name; ?></div>
                                <?php } ?>

                            <?php } ?>

                        <?php wp_reset_query();  // Restore global post data  ?> 
                        </ul>
                    <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="spacer-90"></div>

        <div class="container wide">
            <div class="columns">  
                <div class="column-full">              
                    <div class="result-holder">
                    <?php
                        $wp_query = new WP_Query(array(
                            'posts_per_page'    => 6,
                            'post_type'         => 'results', 
                            'order'             => 'DESC',
                            'meta_key'          => 'case_result_value',
                            'orderby'           => 'meta_value_num',
                            'post_status'       => 'publish',
                            'post__not_in'      => array( $featured_ID )
                        ));
                        
                        while ($wp_query->have_posts()): $wp_query->the_post()?>   
                        
                        <?php get_template_part('block','results-output'); ?>   

                        <?php endwhile; ?>
                    </div>
                    
                    <div class="spacer-30"></div>

                    <?php                    
                    // don't display the button if there are not enough posts
                    if (  $wp_query->max_num_pages > 1 )
                        echo '<a class="btn-load-more btn transparent rounded">Load More Results</a>'; // you can use <a> as well
                    ?>

                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div><!-- #content -->
    </section>    

</div>



<?php get_footer(); ?>

