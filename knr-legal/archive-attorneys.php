<?php
/**
 * Post Archive - Attorneys
 *
 * @package KNR Legal
 * @author Postali LLC
 */

$wp_query = new WP_Query( array(
    'posts_per_page'    => -1,
    'post_type'         => 'attorneys', 
    'order'             => 'ASC',
    'meta_key'			=> 'last_name',
	'orderby'			=> 'meta_value',
    'post_status'       => 'publish',
    'post__not_in'      => array(4373),
) );

get_header(); ?>

<div class="body-container">

<script type="text/javascript" id="dropdown-script">

        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        jQuery(document).ready(function ($) { 
            $('.dropbtn').on('click', function() {
                document.getElementById("myDropdown").classList.toggle("show");
            });
        })

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {

                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        jQuery(document).ready(function ($) {

            jQuery(".location_box").click(function () {


                var word = $(this).attr('id');
                var search_type = "city";
                $('.dropbtn').text( $(this).text() );

                $.ajax({
                    url:'../wp-content/themes/knr-legal/db_attorneys.php',
                    type:'GET',
                    data:'word=' + word +'&search_type='+search_type,
                    cache: 'false',
                    success: function(data){
                        $('.blog_holder').html($(data));
                    },
                    error: function(err){
                        alert(err.responseText);
                    }
                });
            });


            jQuery(".search_button").click(function () {


                var word = $('.search_box').val();
                var search_type = "text";

                $.ajax({
                    url:'../wp-content/themes/knr-legal/db_attorneys.php',
                    type:'GET',
                    data:'word=' + word +'&search_type='+search_type,
                    cache: 'false',
                    success: function(data){

                        $('.blog_holder').html($(data));

                    },
                    error: function(err){
                        alert(err.responseText);
                    }
                });
            });


            jQuery(".search_box").keyup(function () {


                var word = $('.search_box').val();
                var search_type = "live";

                $.ajax({
                    url:'../wp-content/themes/knr-legal/db_attorneys.php',
                    type:'GET',
                    data:'word=' + word +'&search_type='+search_type,
                    cache: 'false',
                    success: function(data){
                        $('#results').html($(data));

                    },
                    error: function(err){
                        alert(err.responseText);
                    }
                });
            });

        });

    </script>

    <section class="attorney-search">
        <div class="container">
            <div class="columns">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                <div class="column-full block">
                    <h1>Our Attorneys</h1>
                    <div class="searchandfilter"><div class="SF_container">
                        <input class="search_box" placeholder="Our Attorneys...">
                        <p class="small"><img src="/wp-content/uploads/2022/08/search-finger.png" alt="finger emoji"><strong>Start typing to search for a KNR attorney, or scroll below to browse the directory.</strong></p>
                        <ul id ="results"></ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="all-attorneys">
        <div class="container">
            <div class="columns">
            <?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                <div class="column-25 block">
                    <div class="attorney-profile-box">
                        <a href="<?php the_permalink(); ?>" title="Visit <?php the_field('first_name'); ?>'s profile">
                            <div class="attorney-photo">
                            <?php 
                            $image = get_field('attorney_photo');
                            if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <div class="post-button">
                                <div>
                                    <span class="icon-arrow-right"></span>
                                </div>
                            </div>
                            </div>
                        </a>
                        <div class="attorney-details">
                            <a href="<?php the_permalink(); ?>" title="Visit <?php the_field('first_name'); ?>'s profile" class="attorney-link"><?php the_title(); ?></a>
                            <p class="small"><?php the_field('attorney_location'); ?></p>
                            <p class="small"><strong>P</strong> <a href="tel:<?php the_field('phone_number'); ?>" title="Call <?php the_title(); ?> today"><?php the_field('phone_number'); ?></a></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
            
            </div>
        </div>
    </section>

</div>

<section class="black">
    <div class="container">
        <div class="columns">
            <div class="column-66 center centered block">
                <div class="memorial-photo">
                <?php 
                    $robert = get_field('memorial_photo','options');
                    if( !empty( $robert ) ): ?>
                        <img src="<?php echo esc_url($robert['url']); ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                </div>
                <div class="photo-caption">
                    <?php the_field('memorial_photo_caption','options'); ?>
                </div>
                <div class="spacer-30"></div>
                <h2><?php the_field('memorial_headline','options'); ?></h2>
                <a href="<?php the_field('memorial_button_link','options'); ?>" title="More about Robert Redick" class="btn green rounded"><?php the_field('memorial_button_text','options'); ?></a>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
