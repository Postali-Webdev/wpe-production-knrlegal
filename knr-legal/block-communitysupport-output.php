<div class="post-container">
    <div class="post-main">
        <div class="post-main-holder">
            <div class="post-tag"><?php the_field('post_type'); ?></div>
            <div class="post-content">
                <p class="large"><strong><?php the_title(); ?></strong></p>
                <?php 
                $content = get_the_content(); ?>
                <p><?php echo wp_trim_words( $content , '20' ); ?></p>
            </div>
            <div class="post-button">
                <a href="<?php the_permalink(); ?>" title="Learn more about this!"><span class="icon-arrow-right"></span><span class="btn-text">Learn More</span></a>
            </div>
        </div>    
    </div>
    <?php if (has_post_thumbnail( $post->ID ) ) { ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
        <div class="post-photo" style="background-image: url('<?php echo $image[0]; ?>')">
    <?php } else { ?>
        <div class="post-photo" style="background-image: url('/wp-content/uploads/2022/11/community-generic.jpeg')">
    <?php } ?>
    </div>
</div>   