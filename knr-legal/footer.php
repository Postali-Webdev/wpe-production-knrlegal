<?php
/**
 * Theme footer
 *
 * @package KNR Legal
 * @author Postali LLC
**/


if (is_tree('19502')) { 
    $location = '/akron/';
} elseif (is_tree('12402')) { 
    $location = '/beachwood/';
} elseif (is_tree('12400')) {
    $location = '/canton/';
} elseif (is_tree('12392')) {
    $location = '/cincinnati/';
} elseif (is_tree('12388')) {
    $location = '/cleveland/';
} elseif (is_tree('12390')) {
    $location = '/columbus/';
} elseif (is_tree('12394')) {
    $location = '/dayton/';
} elseif (is_tree('12405')) {
    $location = '/independence/';
} elseif (is_tree('12396')) {
    $location = '/toledo/';
} elseif (is_tree('12398')) {
    $location = '/youngstown/';
} else {
    $location = '/';
}

?>
<div class="finish-line"></div>
<footer>
    <section class="footer ignore-highlight">

        <!-- intro/contact form -->
        <div class="columns copy-and-form">
            <div class="column-33">
                <div class="container">
                    <a href="<?php echo $location; ?>" class="custom-logo-link" rel="home"><img src="/wp-content/uploads/2022/08/KNR_Logo.svg" class="custom-logo" alt="Kisling, Nestico &amp; Redick logo"></a>
                    <div class="spacer-30"></div>
                    <?php the_field('footer_upper_copy', 'options'); ?>
                </div>
            </div>
            <div class="column-66">
                <div class="form-wrapper">
                    <div class="contact-inner-wrapper">
                        <?php $cta_group = get_field('footer_contact_form_cta', 'options'); 
                        $pill_title = $cta_group['green_pill_title']; 
                        $large_title = $cta_group['large_title'];
                        $copy = $cta_group['copy'];
                        ?>
                        <p class="green-pill"><?php echo esc_html($pill_title); ?></p>
                        <p class="large-title"><?php echo esc_html($large_title); ?></p>
                        <p><?php echo $copy; ?></p>
                    </div>
                    <div class="form-inner-wrapper">
                        <?php echo do_shortcode(get_field('footer_form_embed', 'options')); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- socials and practice areas -->
        <div class="container wide social-and-menus">
            <div class="columns">
                <div class="column-25 block">
                    <?php $phone_image = get_field('footer_phone_number_image', 'options');
                    if( $phone_image ) : ?>
                        <a href="tel:<?php echo get_field('global_phone', 'options'); ?>"><?php echo wp_get_attachment_image( $phone_image['ID'], 'full', '', array( 'class' => 'phone-icon' ) ); ?></a>
                        <a href="mailto:<?php echo get_field('global_email', 'options'); ?>" class="email"><?php echo esc_html(get_field('global_email', 'options')); ?></a>
                        <?php
                            $args = array( 'container' => false, 'theme_location' => 'social-media-menu' );
                            wp_nav_menu( $args );
                        ?>
                    <?php endif; ?>
                </div>
                <div class="column-75 links-column">
                    <div class="practice-areas">
                        <div class="line-wrapper"><p class="grey-pill">How Can We Help?</p><div class="line"></div></div>
                        <?php
                            $args = array( 'container' => false, 'theme_location' => 'footer-practice-areas' );
                            wp_nav_menu( $args );
                        ?>
                    </div>
                    <div class="quick-links">
                        <div class="line-wrapper"><p class="grey-pill">Who We Are</p><div class="line"></div></div>
                        <?php
                            $args = array( 'container' => false, 'theme_location' => 'footer-quick-links' );
                            wp_nav_menu( $args );
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- location addresses -->
        <div class="container wide locations">
            <?php 
                $locations = [
                    'akron',
                    'beachwood',
                    'canton',
                    'cincinnati',
                    'cleveland',
                    'columbus',
                    'columbus_downtown',
                    'dayton',
                    'independence',
                    'toledo',
                    'westlake',
                    'youngstown'
                ];
            ?>
            <div class="line-wrapper"><p class="grey-pill extra-text"><?php echo count($locations); ?> Locations throughout Ohio for your convenience</p><div class="line"></div></div>
            <div class="locations-grid">
                
                    <?php
                    foreach($locations as $location) {
                        $location_group = get_field($location . '_details', 'options');
                        if( $location_group ) {
                            $name = $location_group['location_name'];
                            $address = $location_group['location_address'];
                            $city = $location_group['location_city'];
                            $state = $location_group['location_state'];
                            $zip = $location_group['location_zip_code'];
                            $phone_number = $location_group['location_phone_number'];
                            $directions_link = $location_group['location_directions_link'];
                            $page_link = $location_group['page_link'];
                            ?>
                            <div class="location">
                                <p class="name">
                                    <?php if($page_link) : ?>
                                    <a href="<?php echo esc_url($page_link); ?>">
                                    <?php endif; ?>
                                        <?php echo esc_html($name); echo $location == 'columbus_downtown' ? ' (Downtown)' : ''; ?>
                                    <?php if($page_link) : ?>
                                    </a>
                                    <?php endif; ?>
                                </p>
                                <p class="address">
                                    <a target="_blank" href="<?php echo esc_url($directions_link); ?>">
                                        <?php echo esc_html($address); ?>, <br> <?php echo esc_html($city); ?>, <?php echo esc_html($state); ?> <?php echo esc_html($zip); ?>
                                    </a>
                                </p>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
        
        <!-- disclaimer and copyright -->
         <div class="disclaimer-and-copyright">
            <div class="container wide">
                <div class="columns">
                    <div class="column-full">
                        <?php the_field('disclaimer_text','options'); ?>
                        <div class="line-break"></div>
                        <p>© <?php echo date('Y'); ?> by Kisling, Nestico & Redick. All rights reserved. Click for <a href="/sitemap/" title="Sitemap">sitemap</a> || Click for our <a href="/privacy-policy/" title="Privacy Policy">Privacy Policy</a></p>
                        <?php if(is_page_template('front-page.php')) { ?>
                        <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:20px 0;"></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>

<!-- Criteo Loader File -->
<script type="text/javascript" src="//dynamic.criteo.com/js/ld/ld.js?a=56512" async="true"></script>
<!-- END Criteo Loader File -->

<?php wp_footer(); ?>

</body>
</html>


