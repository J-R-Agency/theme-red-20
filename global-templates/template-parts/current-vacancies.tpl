
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
<!--<img src="<?php echo get_template_directory_uri(); ?>/assets/logos/<?php echo $san_cat; ?>-logo-white.png" class="vacancy-logo">-->
									<?php
									if( have_rows('businesses', 'option') ):
										while ( have_rows('businesses', 'option') ) : the_row();
											$business_logo = get_sub_field('business_logo', 'option'); // Image
											$business_brand = get_sub_field('business_brand', 'option');
											$business_name = $business_brand['business_name'];
											
											$san_name = sanitize_title($business_name);
											
												if ($san_name == $san_cat):
													echo
													"<img class='vacancy-logo' src='".$business_logo['business_logo_white']['url']."'>";
												endif;
											
										endwhile;
									endif;
									?>
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
					
			<?php 
			endwhile;
		endif; ?>						    
		<?php wp_reset_query(); ?>		
	
</section>
