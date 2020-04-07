<?php
/**
 * Template Name: Contact Template
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
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<section class="generic bg-white">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="contact-left">
					<h1><?php the_field('contact_headline'); ?></h1>
					<p><?php the_field('contact_copy'); ?></p>
					<p><strong><?php the_field('contact_address'); ?></strong></p>
					<hr class="hero-line post" width=50% style="border-color: #d11317;">
					<p><strong><a href="mailto:<?php the_field('contact_email'); ?>"><?php the_field('contact_email'); ?></a></strong></p>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="contact-right">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
	
<?php endwhile; endif; ?>
<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>
<?php include(get_template_directory() . '/global-templates/template-parts/contact-columns.tpl'); ?>
<?php include(get_template_directory() . '/global-templates/template-parts/banner-cta.tpl'); ?>

<?php get_footer(); ?>
