<?php 
$banner_group = get_field('global_banner', 'options');
$enable_banner = $banner_group['enable_global_banner'];
$copy = $banner_group['copy'];
$review_badge = $banner_group['review_badge'];
$button = $banner_group['notice_banner_link'];
if( $enable_banner ) : ?>

<div class="review-banner">
    <p class="banner-text">
        <?php echo $copy; ?>
        <a href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
    </p>
    
</div>

<?php endif; ?>