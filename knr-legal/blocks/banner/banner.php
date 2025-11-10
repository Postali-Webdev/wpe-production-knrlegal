<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $title = get_field('title_h1');
    $copy = get_field('banner_copy');
    $bg_image = get_field('banner_image');
    $cta = get_field('cta');
?>

<section id="banner">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <h1><?php echo $title; ?></h1>
                <p><?php echo $copy; ?></p>

                <?php
                if( $cta ): ?>

                <div class="ppc-cta-block">
                    <p><?php echo $cta['copy']; ?></p>
                    <?php
                    $link = $cta['button'];
                    if( $link ) { 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <div class="spacer-15"></div>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn"><?php echo esc_html( $link_title ); ?></a>    
                    <?php } ?>                
                </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php if( !empty( $bg_image ) ) { ?>
<section id="banner-img">
    <img src="<?php echo esc_url($bg_image['url']); ?>" alt="<?php echo esc_attr($bg_image['alt']); ?>" />
</section>
<?php } ?>