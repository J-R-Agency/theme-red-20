<?php
/**
 * Template Name: Careers Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<section class="generic bg-white dog-overlay-careers">
	<h1 class="horizontal-center"><?php the_field('careers_headline'); ?></h1>
	<?php
		$careers_intro = get_field('careers_intro');
	?>
	<div class="careers-intro">
		<div class="embed-container">
			<?php echo $careers_intro['careers_video_embed']; ?>
		</div>
		<p><?php echo $careers_intro['careers_intro_copy']; ?></p>
	</div>
	
	<div class="careers-benefits">
	<?php
		$careers_benefits = get_field('careers_benefits');
	?>	
		<h1><?php echo $careers_benefits['careers_benefits_headline']; ?></h1>
		<p><?php echo $careers_benefits['careers_benefits_copy']; ?></p>
		
		<div class="flex-row">
		<?php if ( have_rows( 'careers_benefits' ) ) : ?>
			<?php while ( have_rows( 'careers_benefits' ) ) : the_row(); ?>
				<?php if( have_rows('careers_benefits_list') ):
						
					while ( have_rows('careers_benefits_list') ) : the_row();
						$careers_benefits_icon = get_sub_field('careers_benefits_icon');
						$careers_benefits_list_item = get_sub_field('careers_benefits_list_item');
					?>	
						<!-- ECHO THE CONTENT -->
						<div class="flex-column-5">
							<img src="<?php echo $careers_benefits_icon['url']; ?>" class="benefits-icon">
							<p class="benefits-list-item"><?php echo $careers_benefits_list_item; ?></p>
						</div>
						
					<?php endwhile; ?>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		</div>
		
	</div>
	
</section>

<?php get_footer(); ?>
