<?php
/**
 * Search results template.
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
                    <div class="spacer-60"></div>
                    <h1 class="post-title"><?php printf( esc_html__( 'Search results for "%s"', 'postali' ), get_search_query() ); ?></h1>
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
                        <?php if (!has_post_thumbnail( $post->ID ) ) { ?>
                        <div class="blog-holder-main no-photo">
                        <?php } else { ?>
                        <div class="blog-holder-main">
                        <?php } ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

                                <?php 
                                $postType = get_post_type_object(get_post_type());
                                if ($postType) { ?>
                                    <span class="post-type"><?php echo esc_html($postType->labels->singular_name); ?></span>
                                <?php } ?>

                                <h2><?php the_title(); ?></h2>

                                <?php $pageType = get_page_template_slug(); 

                                // loop through templates & grab the correct content field to display
                                if($pageType == 'page-practice-area-parent.php') {
                                    if( have_rows('main_content') ):
                                    while( have_rows('main_content') ): the_row();
                                        $content = get_sub_field('block_intro_copy'); ?>
                                        <p><?php echo wp_trim_words( $content , '20' ); ?></p>
                                    <?php break;
                                    endwhile;
                                    endif;
                                } elseif($pageType == 'page-interior.php') { 
                                    echo the_excerpt(); 
                                } elseif($pageType == 'page-practice-area-child.php') { 
                                    $content = get_field('main_content'); ?>
                                    <p><?php echo wp_trim_words( $content , '20' ); ?></p>
                                <?php } else { 
                                    $content = get_the_content(); ?>
                                    <p><?php echo wp_trim_words( $content , '20' ); ?></p>
                                <?php } ?>

                            </a>
                        </div>
                        <?php if (has_post_thumbnail( $post->ID ) ): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                            <div class="blog-holder-img" style="background-image: url('<?php echo $image[0]; ?>')"></div>
                        <?php endif; ?>
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

<?php get_footer();
