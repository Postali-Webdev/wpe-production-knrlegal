<?php
/**
 * ContactTemplate
 * Template Name: Contact
 *
 * @package KNR Legal
 * @author Postali LLC
 */

get_header(); ?>

<?php $location_details = '' . $_SESSION['office_location'] . '_details'; ?>

<?php 
    if( have_rows($location_details, 'options') ):
    while( have_rows($location_details, 'options') ): the_row();

        $address = get_sub_field('location_address');
        $city = get_sub_field('location_city');
        $state = get_sub_field('location_state');
        $zip = get_sub_field('location_zip_code');
        $phone = get_sub_field('location_phone_number');
        $fax = get_sub_field('location_fax_number');
        $directions = get_sub_field('location_directions_link');
        $map = get_sub_field('location_map_embed');

    endwhile;
    endif;
?>

<div class="body-container">

<?if  ( $_SESSION['office_location'] <> 'global' ) { ?>
    <div class="spacer-30"></div>
<?php } ?>

    <section class="page-header">
        <div class="container bordered">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns center">
                <div class="column-50 block">
                    <h1><?php the_field('banner_headline'); ?></h1>
                    <?php the_field('banner_copy'); ?>
                    <div class="spacer-30"></div>
                    <div class="contact-cta">
                        <?php if (!empty($phone)) { ?>
                            <a href="tel:<?php echo $phone ?>" title="Call our Office" class="btn black"><?php echo $phone ?></a> <p class="small"><strong>Free Consultations // Available 24/7</strong></p>
                        <?php } else { ?>
                            <a href="tel:<?php the_field('global_phone','options'); ?>" title="Call our Office" class="btn black"><?php the_field('global_phone','options'); ?></a> <p class="small"><strong>Free Consultations // Available 24/7</strong></p>
                        <?php } ?>
                    </div>
                    <div class="spacer-30"></div>
                    <p class="small">Or, if you prefer you can fill out our online form below.</p>

                    <?php if($_SESSION['office_location'] != 'global') { ?>
                        <div class="spacer-15"></div>
                        <p><strong><?php echo $city; ?> Office</strong>
                        <span class="spacer-15"></span>
                        <?php echo $address; ?><br>
                        <?php echo $city; ?>, <?php echo $state; ?> <?php echo $zip; ?><br>
                        <span class="spacer-15"></span>
                        <a href="<?php echo $directions; ?>" title"Directions to our <?php echo $city; ?> Office" target="blank">Directions</a>
                        </p>
                    <?php } ?>

                    <div class="spacer-30"></div>
                </div>
                <div class="column-50 centered">
                    <?php 
                        set_query_var('random_partner','name');
                        get_template_part('block','random-partner'); 
                        set_query_var('random_partner', false);
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="columns">
                <div class="column-33 block">
                    <h2>Online Form</h2>
                </div>
                <div class="column-66">
                    <?php echo do_shortcode("[gravityform id='2' title='false' description='false']"); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('block','pre-footer'); ?>

</div>

<?php get_footer(); ?>
