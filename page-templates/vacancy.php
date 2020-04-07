<?php
/**
 * Template Name: Vacancy Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<?php include(get_template_directory() . '/global-templates/template-parts/hero-banner-job.tpl'); ?>
<section class="generic bg-white dog-overlay-vacancy">
	
	<!-- Post Content -->
	<div class="post-content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
	
	<!-- Benefits -->
	<div class="checklist-container horizontal-center">
		<h2><?php echo the_field('checklist_title'); ?></h2>
		<?php if( have_rows('checklist_items') ): ?>
		
			<ul class="checklist">
		
			<?php while( have_rows('checklist_items') ): the_row(); 
		
				// vars
				$checklist_item = get_sub_field('checklist_item');
		
				?>
		
				<li class="checklist-item">
	
				    <p><strong><?php echo $checklist_item; ?></strong></p>
		
				</li>
		
			<?php endwhile; ?>
		
			</ul>
		
		<?php endif; ?>	
		<h2>Application Form</h2>	
		<?php echo do_shortcode('[contact-form-7 id="434" title="Job Application Form"]');?>
	</div>
	
</section>

<?php get_footer(); ?>
