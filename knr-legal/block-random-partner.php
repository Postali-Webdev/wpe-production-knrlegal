<?php 
$partner_query = new WP_Query( array(
    'posts_per_page'    => 1,
    'post_type'         => 'attorneys', 
    'order'             => 'ASC',
    'meta_key'			=> 'last_name',
    'orderby'			=> 'rand',
    'post_status'       => 'publish',
    'post__not_in'      => array(4373),
    'meta_query'        => array (
        array (
            'key' => 'attorney_title', 
            'value' => array ('founding partner', 'managing partner', 'senior partner', 'partner'), 
            'compare' => 'in',
        ),  
    ),
) );
?>
<?php while( $partner_query->have_posts() ) : $partner_query->the_post(); ?>
    <div class="attorney-box">

        <?php $show_hide = get_query_var( 'random_partner' ); ?>

        <div class="partner-block-info">
            <?php if ($show_hide == 'recovered' || ($show_hide == 'both')) { ?>
            <div class="banner-callout">
                <span class="large">10,000+</span>
                <p class="x-small">Clients and Millions Recovered</p>
            </div>
            <?php } ?>

            <?php if ($show_hide == 'both') { ?>
                <div class="separator"></div>
            <?php } ?>

            <?php if ($show_hide == 'name' || ($show_hide == 'both')) { ?>
            <a class="attorney-name" href="<?php the_permalink(); ?>">
                <p class="small"><?php the_title(); ?></p>
                <p class="x-small"><?php the_field('attorney_title'); ?></p>
            </a>
            <?php } ?>
        </div>

        <?php 
        $attorney_image = get_field('partner_photo');
        if( !empty( $attorney_image ) ): ?>
            <img src="<?php echo esc_url($attorney_image['url']); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>

        <?php if (!is_page_template('form-success.php' || 'page-template-page-contact.php')  && !is_post_type_archive('results') || is_page_template('front-page.php')) { ?>
        <div class="post-button">

            <?php global $data; //dont forget use globally ?>
            <?php if (empty($data)) { ?>

            <?php } else { ?>
            <a href="<?php echo $data['btn_link']; ?>" title="Meet Our Attorneys"><span class="icon-arrow-right"></span><span class="btn-text"><?php echo $data['btn_text']; ?></span></a>
            <?php unset($data); ?>
            <?php } ?>
        </div>
        <?php  } ?>

    </div>
<?php endwhile; wp_reset_postdata(); ?>