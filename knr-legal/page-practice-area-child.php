<?php
/**
 * Law Category Interior Page
 * Template Name: Practice Area Child
 * @package KNR Legal
 * @author Postali LLC
 */
get_header(); ?>

<?php
if ( is_page() ) {
    if( $post->post_parent ) {
        $children = wp_list_pages( 'title_li=&child_of='.$post->post_parent.'&echo=0' );
    } else {
        $children = wp_list_pages( 'title_li=&child_of='.$post->ID.'&echo=0' );
    }

    $parent_title = get_the_title( $post->post_parent );
    $parent_link = get_the_permalink( $post->post_parent );

    // let's get the parent category
    $category = get_the_category(); 
    $category_parent_id = $category[0]->category_parent;
    if ( $category_parent_id != 0 ) {
        $category_parent = get_term( $category_parent_id, 'category' );
        $main_cat = $category_parent->name;
    } else {
        $main_cat = $category[0]->name;
    }

} ?>

<div class="body-container" id="<?php echo $main_cat; ?>">

<?if  ( $_SESSION['office_location'] <> 'global' ) { ?>
    <div class="spacer-30"></div>
<?php } ?>

    <section class="page-header">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                </div>
                <div class="column-full center centered block">
                    <p class="sub-text">
                    <a href="<?php echo $parent_link; ?>" title="<?php echo $parent_title; ?>"><?php echo $main_cat; ?></a>
                    </p>
                    <h1><?php the_field('page_title'); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section>
        <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
        <?php if (!empty($featImg)) { ?>
        <div class="container wide">
            <div class="columns">
                <div class="column-full featured-image" style="background-image:url(<?php echo $featImg[0]; ?>);">
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="container wide main-content">
            <div class="columns">
                <div class="column-50 block">
                    <?php if (get_field('banner_sub_head')) { ?>
                        <div class="spacer-60"></div>
                        <?php the_field('banner_sub_head'); ?>
                    <?php } ?>
                    <?php the_field('main_content'); ?>
                </div>


                <div class="column-50 child-pages block">
                <?php if( have_rows('practice_areas','options') ): ?>
                <?php while( have_rows('practice_areas','options') ): the_row(); ?>  

                    <?php 
                    $term = get_sub_field('practice_area');
                    if( $term ): ?>
                        <?php $current_term = $term->name; ?>
                        <?php if ($current_term == $main_cat) { ?>

                        <?php $found = true; ?>

                        <?php if( have_rows('featured_child_pages') ): ?>
                        <div class="box-header">
                            Other Types of <?php echo $main_cat; ?>
                        </div>
                        <div class="box-content">
                            <ul>
                            <?php while( have_rows('featured_child_pages') ): the_row(); ?> 
                                <li>
                                <?php $link = get_sub_field( 'page_link' ); ?>
                                    <a class="ignore-highlight" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>">
                                        <?php the_sub_field('page_title'); ?>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                            </ul>
                            <div class="spacer-30"></div>
                            <a href="/practice-areas/" class="btn black">View All Types of <?php echo $main_cat; ?></a>
                            <?php endif; ?> 
                        </div>   

                        <?php } ?>
                    <?php endif; ?>

                <?php endwhile; ?>
                <?php endif; ?> 

                <?php if (!$found) { ?>
                    <div class="box-header">
                        Our Practice Areas
                    </div>
                    <div class="box-content">
                    <?php
                        $args = array( 'container' => false, 'theme_location' => 'child-page-global', );
                        wp_nav_menu( $args );
                    ?>
                    <div class="spacer-30"></div>
                    <a href="/practice-areas/" class="btn black ignore-highlight">View All Cases We Handle</a>
                    </div>
                <?php } ?>
                </div>

            </div>
        </div>
    </section>

    <!-- related readings repeater -->

    <?php get_template_part('block','related-readings'); ?>

    <?php get_template_part('block','helpful-resources'); ?>

</div>

<?php get_footer(); ?>