<section class="touts">
    <div class="container">
        <div class="columns">
        <?php if( have_rows('touts','options') ): ?>
        <?php while( have_rows('touts','options') ): the_row(); ?>  
        <div class="column-20">
            <h3><?php the_sub_field('tout_headline'); ?></h3>
            <p class="small"><?php the_sub_field('tout_copy'); ?></p>
        </div>
        <?php endwhile; ?>
        <?php endif; ?> 
        </div>
        <div class="spacer-line"></div>
    </div>
    <div class="container">
        <div class="columns">
        <?php if( have_rows('testimonials','options') ): ?>
        <?php while( have_rows('testimonials','options') ): the_row(); ?>  
        <div class="column-50 review block">
            <h4>"<?php the_sub_field('testimonial_quote'); ?>"</h4>
            <div class="author-rating"><span class="stars">★★★★★</span> <p class="small"><?php the_sub_field('testimonial_author'); ?></p></div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?> 
        </div>
    </div>
</section>