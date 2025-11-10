<?php
/**
 * Sitemap Page
 * Template Name: Sitemap
 * @package KNR Legal
 * @author Postali LLC
 */
get_header(); ?>

<div class="body-container">

    <section class="page-header">
        <div class="container bordered">      
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
            <div class="columns">
                <div class="column-66 block">
                    <h1><?php the_title(); ?></h1>
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

    <section id="sitemap">
        <div class="container">
			<div class="columns">
                <?php if (have_posts()) : 
		        while (have_posts()) : the_post(); ?>
                <div class="column-50 block">
					<h2>Pages</h2> 
					<ul class="sitemap">
                        <?php 
                        $templates = array(
                            'page-ppc-landing.php',
                            'page-ppc-detailed-landing.php',
                            'page-ppc-landing_v2.php',
                            'page-ppc-landing_v3.php',
                            'page-ppc-landing-pmax.php',
                            'ppc-block.php'
                        );
                        
                        $ppc_ids = array();
                        foreach ( $templates as $template ) {
                            $args = [
                                'post_type'  => 'page',
                                'fields'     => 'ids',
                                'nopaging'   => true,
                                'meta_key'   => '_wp_page_template',
                                'meta_value' => $template
                            ];

                            $ppc_pages = get_posts( $args );
                            $ppc_ids = array_merge($ppc_ids, $ppc_pages);
                        }
                        $ppc_list = implode(', ', $ppc_ids);
                        $page_args = array(
                            'exclude' => $ppc_list,
                            'title_li' => null
                        );
                        wp_list_pages($page_args); 
                        ?>
						
						<li><a href="/results/">Case Results</a></li>
						<li><a href="/about-us/client-testimonials/">Testimonials</a></li>
					</ul> 
				</div>
                <div class="column-50 block">
                    <h2>Blog Categories</h2> 
                    <ul class="categories">
                        <?php
                        $post_categories = wp_list_categories( array(
                            'show_count'       => true,
                            'orderby'          => 'name',
                            'style'            => 'none',
                            'hide_empty'       => 1,
                        ) );
                        echo $post_categories; 
                        ?>

                    </ul>
                    <div class="spacer-30"></div>
					<h2>Blog Posts</h2> 
					<div class="spacer-30"></div>
					<ul class="sitemap">
						<?php wp_get_archives('type=postbypost'); ?>
					</ul>
				</div>
                <?php endwhile; ?>
	            <?php endif; ?>

			</div>
        </div>	
    </section>


</div>

<?php get_footer(); ?>