<?php
/**
 * Template Name: Front Page
 * @package KNR Legal
 * @author Postali LLC
 */
$fpHeadline = get_field('fp_top_section_headline');
get_header();?>
<div id="frontpage">

	<section id="fp-banner">

		<?php get_template_part('block', 'banner');?>

	</section>
	
	<section id="fp-top">

		
	</section>

</div><!-- #content -->
<?php get_footer();?>