
<section class="generic bg-dark-grey horizontal-center bottom-section">
	<h1><p>Our Current <span style="color:#d11317;">Vacancies</span></p></h1>
	<p>Let's connect you to your perfect career</p>
	
	
		<?php				
			$args = array(
				'post_type'=>'page',
				'post_parent'=> $post->ID,
				'post_status'=>'publish',
				'posts_per_page'=> -1,
			);
			
			$parent = new WP_Query( $args );
			
			if ( $parent->have_posts() ) : 													
		?>
		
			<!-- WHILE LOOP -->
		    <?php while ( $parent->have_posts() ) : $parent->the_post();
		    		$categories = get_the_category();
	 
					if ( ! empty( $categories )) {
					    $san_cat = sanitize_title( $categories[0]->name );  
					}
		    	?>
			        
				    <div class="vacancy-container">
						<div class="container">
							<div class="row">
								<div class="col-12 col-lg-3">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/logos/<?php echo $san_cat; ?>-logo-white.png" class="vacancy-logo">
								</div>
								<div class="col-12 col-lg-9">
									<div class="vacancy-description">
										<h2><?php echo the_title(); ?></h2>
										<p><?php echo the_excerpt(); ?> 
										<a href="<?php echo the_permalink(); ?>">FIND OUT MORE</a>
									</div>
								</div>
							</div>
						</div>	
					</div>	
					
			<?php endwhile; ?>
		<?php endif; ?>						    
		<?php wp_reset_query(); ?>		
	
</section>