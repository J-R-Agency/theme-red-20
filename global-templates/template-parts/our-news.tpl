
<section class="generic bg-light-grey">
	<div class="container">
		<div class="row">
			<div class="col-12 horizontal-center">
				<h1>Our News</h1>
			</div>
		</div>
	
		<div class="row blog-posts">
			<?php
				$caseStudy = get_category_by_slug('case-study');
				
				$wp_query = new WP_Query(array(
					'post_type'=>'post',
					'post_status'=>'publish',
					'posts_per_page'=>3,
					'category__not_in' => $caseStudy
				));															
			
			// The Loop
			if ( $wp_query->have_posts() ):
				while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
		    
				<?php include (get_template_directory() . '/global-templates/cards/news-card.tpl'); ?>
		
			<?php
				endwhile;
			endif; ?>
										    
			<?php wp_reset_query(); ?>
		</div>
	</div>
</section>