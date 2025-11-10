<section class="pre-footer">
    <?php
    $min=1;
    $max=3;
    $rand = rand($min,$max);
    ?>
    <div class="container wide" style="background-image:url('/wp-content/uploads/2023/01/prefooter-<?php echo $rand; ?>-1.jpg');"></div>
    <?php $rand  = 0; ?>
    <div class="spacer-90"></div>
    <div class="container">
        <div class="columns">
            <div class="column-66 center centered block">
                <?php the_field('pre_footer_main_content_block'); ?>
                <a href="tel:8004878669" title="Call KNR Today" class="bullet"><img src="/wp-content/uploads/2022/10/knr-hurt-now.png" alt="Call KNR Legal Today"></a>
                <div class="spacer-15"></div>
                <div class="pre-footer_bottom-text">12 Convenient Locations <span>//</span> Free Consultations <span>//</span> Available 24/7 <span>//</span> No Recovery, No Fee</div>
            </div>
        </div>
    </div>
</section>