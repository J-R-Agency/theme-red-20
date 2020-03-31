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
				<img src="<?php echo get_template_directory_uri(); ?>/assets/logos/<?php echo $san_cat; ?>-logo-color.png">
				<a class="link job-hero-btn" href="#">
				<div class="btn_black-border">
					Read About <?php echo esc_html( $categories[0]->name ); ?>
				</div>
			</a>
			</div>
		</div>	
	</div>
