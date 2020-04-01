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
				<h1><?php $categories = get_the_category(); echo esc_html( $categories[0]->name ); ?></h1>
			</div>
		</div>
	
		<div class="row blog-posts">
			<?php
				$caseStudy = get_category_by_slug('case-study');
				
				$wp_query = new WP_Query(array(
					'post_type'=>'post',
					'post_status'=>'publish',
					'posts_per_page'=>5,
					'category_name' => 'epic-ventures',
					'paged' => ( get_query_var('paged') ? get_query_var('paged') : 0)
				));															
			?>
			<!-- WHILE LOOP -->
		    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
		    	
					<div class="col-12">
							<div class="news-card__first">
								
								<div class="news-card__left">
							    	<!-- image -->
							    	<div class="news-card__img-large">
								    	<a href="<?php the_permalink(); ?>">
								    		<?php if ( has_post_thumbnail() ) {
									    		echo "<img src=\"" . get_the_post_thumbnail_url() . "\">";
								    		} else { 
								    			echo "<img src='". get_template_directory_uri() ."/assets/images/news-card-placeholder.jpg'>";
								    		} ?>
								    	</a>
								    </div><!--end image -->
								</div>
									
								<div class="news-card__right">
							    	<!-- title -->
						        	<div class="news-card__title">
							        	<a href="<?php the_permalink(); ?>" class="link"><?php the_title(); ?></a>
							        </div><!-- end title -->
							        		   
							    	<!-- category -->
							    	<div class="news-card__category">
								    	<?php the_category(', '); ?>
								    </div><!-- end category-->
								    
								    <div class="news-card__excerpt">
								    	<?php the_excerpt(); ?>
								    </div>
								</div>
								
					    	</div><!-- end blog card -->
					  
					</div><!-- end col -->
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

<?php get_footer(); ?>
