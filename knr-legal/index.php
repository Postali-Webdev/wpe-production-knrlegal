<?php
/**
 * Template Name: Blog
 * 
 * @package KNR Legal
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">

    <section class="page-header">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    <div class="spacer-60 mobile"></div>
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <div class="spacer-30"></div>

    <section id="blog-holder">
        <div class="container wide">
            <div class="columns">
                <div class="column-full block">

                    <div class="blog-toggle-container">
                        <span class="small">Filter by:</span>

                        <a href="/blog/" class="btn rounded transparent active">All</a>
                        <a href="/category/car-accidents/" class="btn rounded transparent">Car Accidents</a>
                        <a href="/category/truck-accidents/" class="btn rounded transparent">Truck Accidents</a>
                        <a href="/category/motorcycle-accidents/" class="btn rounded transparent">Motorcycle Accidents</a>
                        <a href="/category/ohio-personal-injury/" class="btn rounded transparent">Personal Injury</a>

                        <a class="all-categories">View All Categories <span>+</span></a>

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
                                    'post_type' => 'results', 
                                    'posts_per_page'    => -1,
                                    'cat'               => $category_id,
                                ) );
                                $count = $cat_query->found_posts; ?>

                                
                                <?php 
                                // output category button if category is not empty
                                if ($count != 0) { ?>
                                    <a href="/category/<?php echo $cat->slug; ?>/" class="btn rounded transparent"><?php echo $cat->name; ?></a>
                                <?php } ?>

                            <?php } ?>

                        <?php wp_reset_query();  // Restore global post data  ?> 
                        </ul>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-results">
        <div class="container wide">
            <div class="columns">  
                <div class="column-full"> 

                    <?php
                    $args = array (
                        'post_type' => 'post',
                        'post_per_page' => '10',
                        'post_status' => 'publish',
                        'order' => 'DESC',
                        'paged' => $paged,
                    );
                    $wp_query = new WP_Query($args);
                    ?>

                    <?php get_template_part('block','blog-loop'); ?>
                </div>
            </div>
        </div><!-- #content -->
    </section>

    <section class="pagination">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <?php the_posts_pagination(); ?>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
