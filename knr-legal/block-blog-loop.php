<?php
    $blogDefault = get_field('default_blog_image', 'options');
?>

<?php while( have_posts() ) : the_post(); ?>
<div class="blog-holder">
    <div class="blog-holder-main">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <h2><?php the_title(); ?></h2>
        </a>
        <p class="small"><strong>Posted in:</strong> <?php $categories = get_the_category();
            foreach($categories as $category) {
            echo '<a href="' . get_category_link($category->term_id) . '" class="category-link">' . $category->name . '</a>';
            }
            ?>  
        </p>
    </div>
    <?php if (has_post_thumbnail( $post->ID ) ): ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
        <div class="blog-holder-img" style="background-image: url('<?php echo $image[0]; ?>')"></div>
    <?php else: ?>
        <div class="blog-holder-img" style="background-image:url(<?php echo $blogDefault; ?>);"></div>
    <?php endif; ?>
    <div class="caption">
        <span><?php echo the_date(); ?></span>
    </div>
    
</div>
<?php endwhile; wp_reset_postdata(); ?>