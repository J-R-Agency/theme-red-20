<?php
/**
 * Template Name: News Archive Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<section class="generic bg-white">
	<div class="container">
		<div class="row">
			<div class="col-12 horizontal-center">
				<h1>News Archive</h1>
			</div>
		</div>
	
		<div class="row blog-posts">
			<?php
				$caseStudy = get_category_by_slug('case-study');
				
				$wp_query = new WP_Query(array(
					'post_type'=>'post',
					'post_status'=>'publish',
					'posts_per_page'=>5,
					'category__not_in' => $caseStudy,
					'paged' => ( get_query_var('paged') ? get_query_var('paged') : 0)
				));															
			?>
			<!-- WHILE LOOP -->
		    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
		    	
					<?php include (get_template_directory() . '/global-templates/cards/news-card-featured.tpl'); ?>

			<?php endwhile; ?>
										    
			<?php wp_reset_postdata(); ?>
			<div class="container">
				<div class="row">
					<div class="col-12 horizontal-center">
						<?php understrap_pagination(); ?>
					</div>
				</div>
			</div>
			
		</div>
		
	</div>					
</section>
<section class="bottom-section"></section>

<?php get_footer(); ?>
