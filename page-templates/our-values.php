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
	<div class="charity-wrapper">
		<h1><?php the_field('charity_headline'); ?></h1>
		<p><?php the_field('charity_intro'); ?></p>
		<div class="container">
			<div class="row">
				<?php if( have_rows('charity_logos') ):
						
					while ( have_rows('charity_logos') ) : the_row();
						$charity_logo_images = get_sub_field('charity_logo_images');
						$charity_links = get_sub_field('charity_links');
					?>					
						<div class="col-6 col-md-3">
							<a href="<?php echo $charity_links['url']?>" target="<?php echo $charity_links['target']?>"><img src="<?php echo $charity_logo_images['url']; ?>" class="charity-logo"></a>
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
