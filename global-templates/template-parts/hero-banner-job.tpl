<!-- Hero image -->
	<div class="hero job">
		<div class="hero-copy job">
			<div class="hero-title job">
				<h1><?php echo the_title(); ?></h1>
			</div>
			<hr class="hero-line job" width=50%>
			<div class="hero-intro job">
				<p>
					<strong>
						<?php
						$categories = get_the_category();
						echo esc_html( $categories[0]->name );
						$san_cat = sanitize_title( $categories[0]->name );  
						?>
					</strong>	
				</p>
				<p><?php echo the_excerpt(); ?></p>
			</div>
		</div>
		<div class="hero-image job">
			<div class="vacancy-logo-wrapper">	
				<!--<img src="<?php echo get_template_directory_uri(); ?>/assets/logos/<?php echo $san_cat; ?>-logo-color.png">-->
				
				<?php
					if( have_rows('businesses', 'option') ):
						while ( have_rows('businesses', 'option') ) : the_row();
							$business_logo = get_sub_field('business_logo', 'option'); // Image
							$business_brand = get_sub_field('business_brand', 'option');
							$business_name = $business_brand['business_name'];
							
							$san_name = sanitize_title($business_name);
							
								if ($san_name == $san_cat):
									echo
									"<img src='".$business_logo['business_logo_color']['url']."'>";
								endif;
							
						endwhile;
					endif;
				?>				
				<a class="link job-hero-btn" href="<?php echo site_url();?>/<?php echo $san_cat; ?>">
				<div class="btn_black-border">
					Read About <?php echo esc_html( $categories[0]->name ); ?>
				</div>
			</a>
			</div>
		</div>	
	</div>
