<?php
/**
 * Template Name: News Article Archive
 * 
 * @package KNR Legal
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">

    <section class="page-header">
        <div class="container">
            <div class="columns">
                <div class="column-66">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    <div class="spacer-60"></div>
                    <h1><?php the_field('news_page_title','options'); ?></h1>
                    <p><?php the_field('news_intro_copy','options'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="media-logos">
        <div class="container wide">
            <div class="columns">
                <div class="column-full">
                    <div class="media-logo">
                        <img src="/wp-content/uploads/2025/01/yahoo.png" alt="">
                        <img src="/wp-content/uploads/2025/01/akrondotcom.png" alt="">
                        <img src="/wp-content/uploads/2025/01/msn.png" alt="">
                        <img src="/wp-content/uploads/2025/01/bostonherald.png" alt="">
                        <img src="/wp-content/uploads/2025/01/buzzfeed.png" alt="">
                        <img src="/wp-content/uploads/2025/01/fox8.png" alt="">
                        <img src="/wp-content/uploads/2025/01/attorneyatlaw.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="blog-holder">
        <div class="container wide">
            <div class="columns">
                <div class="column-full">
                    <?php while( have_posts() ) : the_post(); ?>
                    <div class="blog-holder">
                        <div class="blog-holder-main">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <h2><?php the_title(); ?></h2>
                            </a>
                            <p class="small"><strong>Posted in:</strong> <?php $categories = get_the_category();
                                foreach($categories as $category) {
                                echo '<a href="' . get_category_link($category->term_id) . '" class="category-link">' . $category->name . '</a>';
                                }
                                ?>  
                            </p>
                        </div>
                        <?php if (has_post_thumbnail( $post->ID ) ): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                            <div class="blog-holder-img" style="background-image: url('<?php echo $image[0]; ?>')"></div>
                        <?php else: ?>
                            <div class="blog-holder-img" style="background-image: url('/wp-content/uploads/2023/04/knr-in-the-news.jpg')"></div>
                        <?php endif; ?>
                        <div class="caption">
                            <span><?php echo the_date(); ?></span>
                        </div>
                        
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
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
