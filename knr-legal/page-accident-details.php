<?php
/**
 * Law Category Interior Page
 * Template Name: Accident Details
 * @package KNR Legal
 * @author Postali LLC
 */
get_header(); ?>

<div class="body-container">

    <section class="page-header">
        <div class="container bordered">
            
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 

            <div class="columns bottom">
                <div class="column-66 block">
                <?php while( have_posts() ) : the_post(); ?>
                    <a href="/" class="btn green rounded bordered"><span class="icon-arrow-left"></span> &nbsp; Back to Homepage</a>
                    <div class="spacer-30"></div>
                    <h1><?php the_title(); ?></h1>
                    <div class="spacer-60 mobile"></div>
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
        
        <div class="spacer-60"></div>

        <div class="container">
            <div class="columns">
                <h3>Your Selections:</h3>
                    
                <div class="selections">
                    <?php if (!empty($_POST['Q1'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q1','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a1','options'); ?></p></div>
                    </div>
                    <?php } ?>

                    <?php if (!empty($_POST['Q2'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q2','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a2','options'); ?></p></div>
                    </div>
                    <?php } ?>

                    <?php if (!empty($_POST['Q3'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q3','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a3','options'); ?></p></div>
                    </div>
                    <?php } ?>

                    <?php if (!empty($_POST['Q4'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q4','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a4','options'); ?></p></div>
                    </div>
                    <?php } ?>

                    <?php if (!empty($_POST['Q5'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q5','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a5','options'); ?></p></div>
                    </div>
                    <?php } ?>

                    <?php if (!empty($_POST['Q6'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q6','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a6','options'); ?></p></div>
                    </div>
                    <?php } ?>

                    <?php if (!empty($_POST['Q7'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q7','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a7','options'); ?></p></div>
                    </div>
                    <?php } ?>

                    <?php if (!empty($_POST['Q8'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q8','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a8','options'); ?></p></div>
                    </div>
                    <?php } ?>

                    <?php if (!empty($_POST['Q9'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q9','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a9','options'); ?></p></div>
                    </div>
                    <?php } ?>

                    <?php if (!empty($_POST['Q10'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q10','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a10','options'); ?></p></div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="on-page-cta" style="background-image:url(<?php the_field('on_page_cta_bg','options'); ?>);">
        <div class="container wide">
            <div class="columns">
                <div class="column-50 centered center block">
                    <h2><?php the_field('on_page_cta_headline','options'); ?></h2>
                    <a href="/contact/" class="btn rounded green wide">Get in Touch!</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="columns">

                <h3>Other ways we can help:</h3>
                    
                <div class="other-ways">    
                    <?php if (empty($_POST['Q1'])) { ?>
                    <div class="column-50">
                        <div class="accident-question grey"><?php the_field('q1','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a1','options'); ?></p></div>
                    </div>
                    <?php } ?>
    
                    <?php if (empty($_POST['Q2'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q2','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a2','options'); ?></p></div>
                    </div>
                    <?php } ?>
    
                    <?php if (empty($_POST['Q3'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q3','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a3','options'); ?></p></div>
                    </div>
                    <?php } ?>
    
                    <?php if (empty($_POST['Q4'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q4','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a4','options'); ?></p></div>
                    </div>
                    <?php } ?>
    
                    <?php if (empty($_POST['Q5'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q5','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a5','options'); ?></p></div>
                    </div>
                    <?php } ?>
    
                    <?php if (empty($_POST['Q6'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q6','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a6','options'); ?></p></div>
                    </div>
                    <?php } ?>
    
                    <?php if (empty($_POST['Q7'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q7','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a7','options'); ?></p></div>
                    </div>
                    <?php } ?>
    
                    <?php if (empty($_POST['Q8'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q8','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a8','options'); ?></p></div>
                    </div>
                    <?php } ?>
    
                    <?php if (empty($_POST['Q9'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q9','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a9','options'); ?></p></div>
                    </div>
                    <?php } ?>
    
                    <?php if (empty($_POST['Q10'])) { ?>
                    <div class="column-50">
                        <div class="accident-question"><?php the_field('q10','options'); ?></div>
                        <div class="accident-answer"><p><?php the_field('a10','options'); ?></p></div>
                    </div>
                    <?php } ?>
                </div>

                <?php endwhile; ?>

            </div>
        </div>

</div>
	
	
<?php get_footer(); ?>