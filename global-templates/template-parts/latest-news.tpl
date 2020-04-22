
<section class="generic bg-light-grey dog-overlay-cs">
	<div class="container">
		<div class="row">
			<div class="col-12 horizontal-center">
				<h1>Latest News</h1>
			</div>
		</div>
	
		<div class="row blog-posts">
			<?php
				$caseStudy = get_category_by_slug('case-study');
				$caseStudyID = $caseStudy->term_id;		
				
				$wp_query = new WP_Query(array(
					'post_type'=>'post',
					'post_status'=>'publish',
					'posts_per_page'=>7,
					'category__not_in' => array($caseStudyID),
				));															
			?>
			<!-- WHILE LOOP -->
		    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
		    	<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
		    	
					<?php include (get_template_directory() . '/global-templates/cards/news-card-featured.tpl'); ?>
		    		
		    	<?php else : ?>
					<?php include (get_template_directory() . '/global-templates/cards/news-card.tpl'); ?>
				<?php endif; ?>
		
			<?php endwhile; ?>
										    
			<?php wp_reset_query(); ?>
		</div>
		<div class="row">
			<div class="col-12">
				<a href="<?php echo esc_url( home_url( '/news-archive' ) ); ?>" class="link" style="float:right;"><div class="btn_black-border">More News</div></a>
			</div>		
		</div>
	</div>
</section>