<?php if(get_field('review_type') == 'video') { ?>
    <?php if( have_rows('video') ): ?>
    <?php while( have_rows('video') ): the_row(); 

        // Get sub field values.
        $image = get_sub_field('video_thumbnail');
        $link = get_sub_field('video_url');
        $quote = get_sub_field('client_quote');
        $client = get_sub_field('client_name');

        ?>
        <div class="testimonial-holder-main video">
            <a href="<?php the_sub_field('video_url'); ?>" class="video-testimonial" data-lity="">
                <span class="icon-play"></span>
                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
            </a>
            <div class="spacer-30"></div>
            <div class="testimonial-content">
                <p class="small"><?php echo esc_html($client); ?></p>
                <p>"<?php echo esc_html($quote); ?>"</p>

                <?php $name = substr_replace($client ,"",-1) . "\n"; ?>
                <a href="<?php the_sub_field('video_url'); ?>" class="btn rounded" data-lity="">Hear <?php echo trim($name); ?>'s Story</a>
            </div>
        </div>

    <?php endwhile; ?>
    <?php endif; ?>

<?php } else { ?>

    <?php if( have_rows('quote') ): ?>
    <?php while( have_rows('quote') ): the_row(); ?>

    <?php if(get_sub_field('attribute_this_review')) { ?>   

    <div class="testimonial-holder-main partner">
        <div class="testimonial-left">
            <div class="author-rating"><span class="stars">★★★★★</span> <p class="small"><?php the_sub_field('client_name'); ?></p></div>
            <span><?php the_content(); ?></span>
            <?php if(get_sub_field('review_source')) {
                $review_source = get_sub_field('review_source');
                if ($review_source == 'google') { ?>
                    <img src="/wp-content/uploads/2022/09/reviews-google.png" class="review-logo">
                <?php } else { ?>
                    <img src="/wp-content/uploads/2022/09/reviews-facebook.png" class="review-logo">
                <?php } ?>
            <?php } ?>
        </div>
        <div class="testimonial-right">
        <?php
        $partner = get_sub_field('review_partner');
        if( $partner ): ?>
            <?php $attorney_name = get_the_title( $partner->ID );
            $attorney_title = get_field( 'attorney_title', $partner->ID );
            $attorney_photo = get_field( 'attorney_photo', $partner->ID );
            ?>
            <p class="small">
                <strong><?php echo esc_html($attorney_name); ?></strong><br>
                <?php echo esc_html($attorney_title); ?>
            </p>
            <?php 
            $image = $attorney_photo;
            if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="attorney-photo" />
            <?php endif; ?>
        <?php endif; ?>
        </div>
    </div> 

    <?php } else { ?>

    <div class="testimonial-holder-main">
        <div class="author-rating"><span class="stars">★★★★★</span> <p class="small"><?php the_field('client_name'); ?></p></div>
        <?php the_content(); ?>
        <?php if(get_field('review_source')) {
            $review_source = get_field('review_source');
            if ($review_source == 'google') { ?>
                <img src="/wp-content/uploads/2022/09/reviews-google.png" class="review-logo">
            <?php } else { ?>
                <img src="/wp-content/uploads/2022/09/reviews-facebook.png" class="review-logo">
            <?php } ?>
        <?php } ?>
    </div> 

    <?php } ?> 

    <?php endwhile; ?>
    <?php endif; ?>

<?php } ?>  