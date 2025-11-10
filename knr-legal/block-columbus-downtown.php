

<?php 
    if( have_rows('columbus_downtown_details', 'options') ):
    while( have_rows('columbus_downtown_details', 'options') ): the_row();

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

<div class="spacer-15"></div>

<div class="container wide location-details">
    <div class="columns normal">
        <div class="location-details-left">
            <h4>Our Downtown Columbus Office</h4>
            <div class="spacer-break"></div>
            <div class="contact_left">
                <div class="spacer-15"></div>
                <span class="post-tag">Address</span>
                <p class="small"><?php echo $address ?><br>
                <?php echo $city ?>, <?php echo $state ?> <?php echo $zip ?>
                <span class="spacer-15"></span>
                <a href="<?php echo $directions ?>" target="_blank" title="Directions to our <?php echo $city ?> office" class="ignore-highlight"><strong>Directions</strong></a>
                </p>
            </div>
            <div class="contact_right">
                <div class="spacer-15"></div>
                <span class="post-tag">Contact</span>
                <p class="small"><a href="tel:<?php echo $phone ?>" title="Call our <?php echo $city; ?> Office" class="ignore-highlight"><?php echo $phone ?></a>
                <span class="spacer-15"></span>
                <strong>Available 24/7</strong>
                </p>
            </div>
        </div>
        <div class="location-details-right">
            <iframe src="<?php echo $map ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>