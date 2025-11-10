<?php
/**
 * Post archive template.
 *
 * @package KNR Legal
 * @author Postali LLC
 */

$category = get_queried_object();
$get_category = $category->slug;
$cat_name = $category->name;

$_SESSION['current_category'] = $get_category;

$cat_id = get_query_var('cat');

get_header(); ?>


<div class="body-container">

    <section class="page-header">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                <p id="breadcrumbs"><span><span><a href="/">Homepage</a> / <a href="/blog/">Legal Blog</a> / <span class="breadcrumb_last" aria-current="page"><?php echo $cat_name; ?></span></span></span></p>
                    <div class="spacer-60"></div>
                    <h1>Legal Blog -<br><?php echo $cat_name; ?></h1>
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
                        <a href="/category/<?php echo $get_category; ?>/" class="btn rounded transparent active"><?php echo $cat_name; ?></a>
                        <span class="reset"><a href="/blog/" title="Reset Filter">Reset Filter</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-results">
        <div class="container wide">
            <div class="columns">
                <div class="column-full">
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