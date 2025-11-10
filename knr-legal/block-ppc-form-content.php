<!-- Add 50-50 form & content section to PPC landing page -->
<section id="benefits" style="background-color:<?php echo $benefitsBG; ?>">
		<div class="container">
			<div class="columns">
                <div class="column-full centered">
					<h2 style="color:<?php echo $benefitsText; ?>"><?php the_field('benefits_headline'); ?></h2>
                    <div class="spacer-15"></div>
                </div>
                <div class="column-50">
					<div class="footer-cta-form"><?php the_field('form_embed'); ?></div>
                </div>
				<div class="column-50">
                    <?php if ( get_field('add_attention') == true ) { ?>
                        <div class="attention-box">
                            <span class="alert"><span class="alert_icon">!</span><span class="alert_text">Attention</span></span>
                            <div class="attention-box_inner">
                                <?php the_field('attention_content'); ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if( have_rows('benefits_repeater') ): ?>
                    <?php while( have_rows('benefits_repeater') ) : the_row(); ?>
                        <div class="h4-section">
                            <h4 style="color:<?php echo $benefitsText; ?>"><?php the_sub_field('benefit_title'); ?></h4>
                            <p style="color:<?php echo $benefitsText; ?>"><?php the_sub_field('benefit_copy'); ?></p>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="cta">
                        <p class="header-cta-text" style="color:<?php echo $benefitsText; ?>"><?php the_field('header_cta_text'); ?></p>
                        <a href="tel:<?php the_field('header_cta_phone'); ?>" title="Call Today" class="btn"><?php the_field('header_cta_phone'); ?></a>
                    </div>
				</div>
			</div>
		<div>
	</section>