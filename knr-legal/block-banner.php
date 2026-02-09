<?php 
$banner_group = get_field('global_banner', 'options');
$enable_banner = $banner_group['enable_global_banner'];
$copy = $banner_group['copy'];
$review_badge = $banner_group['review_badge'];
$button = $banner_group['notice_banner_link'];
if( $enable_banner ) : ?>

<div class="notice-banner">
    <div class="copy">
        <p class="sub-text"><?php echo $copy; ?></p>
    </div>
    <a href="<?php echo $button['url']; ?>" class="btn red"><?php echo $button['title']; ?></a>
</div>

<?php endif; ?>