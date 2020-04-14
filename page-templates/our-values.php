<?php
/**
 * Template Name: Our Values Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<?php include(get_template_directory() . '/global-templates/template-parts/hero-banner.tpl'); ?>

<section class="generic bg-white">
	<div class="ethics-wrapper">
		<h1><?php the_field('ethics_headline'); ?></h1>
		<p><?php the_field('ethics_intro'); ?></p>
		<div class="container">
			<div class="row">
				<?php if( have_rows('ethics_images') ):
						
					while ( have_rows('ethics_images') ) : the_row();
						$ethics_image = get_sub_field('ethics_image');
						$ethics_links = get_sub_field('ethics_links');
						$ethics_text = get_sub_field('ethics_text');
					?>					
						<div class="col-6 col-md-3">
							<img src="<?php echo $ethics_image['url']; ?>" class="ethics_image">
							<p><?php echo $ethics_text; ?></p>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php include(get_template_directory() . '/global-templates/template-parts/case-studies.tpl'); ?>

<?php include(get_template_directory() . '/global-templates/template-parts/banner-cta.tpl'); ?>
<?php get_footer(); ?>
