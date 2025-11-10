<?php
/**
 * Single template
 *
 * @package KNR Legal
 * @author Postali LLC
 */

$blogDefault = get_field('default_blog_image', 'options');

get_header();?>

<div class="body-container">

    <section class="page-header">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <p id="breadcrumbs"><span><span><a href="/">Homepage</a> / <a href="/blog/">Legal Blog</a> / <span class="breadcrumb_last" aria-current="page"><?php the_title(); ?></span></span></span></p>
                </div>
                <div class="column-full center centered block">
                    <p class="sub-text">KNR Legal Blog</p>
                    <h1><?php the_title(); ?></h1>
                    <p class="small"><span class="post-meta"><strong>Posted in: </strong> <span class="category-link"><?php the_category( ' ' ); ?></span></span></p>
                </div>
            </div>
        </div>
    </section>

    <section id="blog-post">
        <div class="container wide">
            <div class="columns">
                <?php if ( has_post_thumbnail() ) { ?>
                <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                <div class="column-full blog-header" style="background-image:url(<?php echo $featImg[0]; ?>);">
                <?php } else { ?>
                <div class="column-full blog-header" style="background-image:url(<?php echo $blogDefault; ?>);">                   
                <?php } ?>
                <?php if (get_field('header_caption')) { ?>
                    <div class="header-caption">
                        <?php the_field('header_caption'); ?>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>

        <div class="spacer-60"></div>

        <div class="container">
            <div class="columns">
                <div class="column-33">
                    <div class="meta-container">
                        <div class="container-row">
                            <div class="col1">Written by</div>
                            <div class="col2">&nbsp;</div>
                            <div class="col3">
                            <?php 
                            $partner_query = new WP_Query( array(
                                'posts_per_page'    => 1,
                                'post_type'         => 'attorneys', 
                                'order'             => 'ASC',
                                'meta_key'			=> 'last_name',
                                'orderby'			=> 'rand',
                                'post_status'       => 'publish',
                                'post__not_in'      => array(4373),
                                'meta_query' => array (
                                    array (
                                        'key' => 'attorney_title', 
                                        'value' => array ('founding partner', 'managing partner', 'senior partner', 'partner'), 
                                        'compare' => 'in',
                                    ),  
                                ),
                            ) );
                            ?>
                            <?php while( $partner_query->have_posts() ) : $partner_query->the_post(); ?>
                                <?php 
                                $attorney_image = get_field('attorney_photo');
                                if( !empty( $attorney_image ) ): ?>
                                    <div class="author-headshot" style="background-image:url(<?php echo esc_url($attorney_image['url']); ?>);"></div>
                                <?php endif; ?>
                            <?php endwhile; wp_reset_postdata(); ?>
                                KNR Legal
                            </div>
                        </div>
                        
                        <div class="container-row">
                            <div class="col1">Date posted</div>
                            <div class="col2">&nbsp;</div>
                            <div class="col3"><?php the_date(); ?></div>
                        </div>
                        
                        <div class="container-row last">
                            <div class="col1">Share</div>
                            <div class="col2">&nbsp;</div>
                            <div class="col3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>" target="_new" rel="noopener noreferrer">
                                    <div class="icon"><span class="icon-facebook"></span></div>
                                </a> 
                                <a title="Click to share this post on Twitter" href="http://twitter.com/intent/tweet?text=Currently reading <?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                                    <div class="icon"><span class="icon-twitter"></span></div>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle/?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>" target="_new" rel="noopener noreferrer">
                                    <div class="icon"><span class="icon-linkedin"></span></div>
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column-66 block">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- related readings repeater -->

    <?php get_template_part('block','related-readings'); ?>

</div>

<?php get_footer(); ?>