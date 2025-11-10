<?php
/**
 * Template Name: Post Archive - Community Support
 * 
 * @package KNR Legal
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">

    <section class="page-header black">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                </div>
                <div class="column-50">
                    <h1><?php the_field('communitysupport_page_title','options'); ?></h1>
                    <p><?php the_field('communitysupport_intro_copy','options'); ?></p>
                </div>
                <div class="column-50">
                <?php 
                $image = get_field('communitysupport_header_photo','options');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="spacer-60"></div>
        <div class="container wide">
            <div class="columns normal">
                <div class="column-50 white padded">
                    <div class="padded-content">
                        <?php the_field('communitysupport_headerbox_left_content','options'); ?>
                    </div>
                </div>
                <div class="column-50 img-bg" style="background-image:url(<?php the_field('communitysupport_headerbox_photo','options'); ?>);">
                    <div class="caption"><span><?php the_field('communitysupport_headerbox_vertical_caption','options'); ?></span></div>
                </div>
            </div>
        </div>
    </section>

    <section class="toggle">
        <div class="container">
            <h2><?php the_field('communitysupport_body_headline','options'); ?></h2>

            <div class="communitysupport-toggle-container">
                <p id="filter-by">Filter by:  <span class="current"></span></p>
                <div class="filter-selections">
                    <div data="all" id="all" class="communitysupport-toggle-item btn rounded transparent active">All of Ohio</div>
                    <div data="northwest" id="northwest" class="communitysupport-toggle-item btn rounded transparent">Northwest Ohio</div>
                    <div data="northeast" id="northeast" class="communitysupport-toggle-item btn rounded transparent">Northeast Ohio</div>
                    <div data="central" id="central" class="communitysupport-toggle-item btn rounded transparent">Central Ohio</div>
                    <div data="southwest" id="southwest" class="communitysupport-toggle-item btn rounded transparent">Southwest Ohio</div>
                    <!-- comment this button out for now, no southeast posts at the moment 
                    <div data="southeast" id="southeast" class="communitysupport-toggle-item btn rounded transparent">Southeast Ohio</div>
                    -->
                </div>
            </div>
        </div>
    </section>  

    <section id="blog-holder">
        <div class="container wide">
            <div class="columns">
                <div class="column-full block">
                    <div class="communitysupport-holder">

                    <?php 
                        $support_query = new WP_Query(array(
                            'posts_per_page'    => 10,
                            'post_type'         => 'communitysupport', 
                            'order'             => 'DESC',
                            'post_status'       => 'publish',
                            'paged'             => 1,
                            'meta_query' => array (
                                array (
                                    'key'       => 'location', 
                                    'value'     => 'all', 
                                    'compare'   => 'LIKE'
                                ),  
                            ),
                        ));

                        ?>

                        <?php while ($support_query->have_posts()): $support_query->the_post()?>     
            
                            <?php get_template_part('block','communitysupport-output'); ?> 

                        <?php endwhile;?>

                    </div>

                    <div class="load-more">
                        <a href="#!" class="btn transparent rounded communitysupport-btn-load-more">Load More Posts</a> 
                    </div>

                    <?php wp_reset_query(); ?>

                </div>
            </div>
        </div><!-- #content -->
    </section>

</div>

<section class="support-cta">
    <div class="container">
        <div class="columns">
            <div class="column-66 centered center block">
                <span class="icon-support-ribbon"></span>
                <h2>Have a cause or event you’d like us to support?</h2>
                <a href="/about-us/sponsorships/" class="btn rounded green wide">Get in Touch!</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
