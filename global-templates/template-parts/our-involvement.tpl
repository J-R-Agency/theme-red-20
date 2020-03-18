<section class="generic bg-white">
	<h1 class="horizontal-center">Our <div class="red-text">Involvement</div></h1>
		<p class="oi-introduction horizontal-center"><?php the_field('oi_introduction'); ?></p>
		<?php if( have_rows('oi_businesses') ): ?>
			<div class="container">
				<div class="row">
				<?php while( have_rows('oi_businesses') ): the_row(); 
					$oi_business_logo = get_sub_field('oi_business_logo');
					$oi_business_name = get_sub_field('oi_business_name');
					$oi_involvement_description = get_sub_field('oi_involvement_description');
				?>	

						<div class="col-12 col-md-4">
							<div class="oi-business">
								<img src="<?php echo $oi_business_logo['url'];?>" id="oi-business-logo">	
								<p id="oi-business-name"><strong><?php echo $oi_business_name; ?></strong></p>
								<p class="oi-involvement-description"><?php echo $oi_involvement_description; ?></p>
							</div>
						</div>
			<?php endwhile; ?><!-- end OI while loop -->
				</div><!-- end row -->
			</div><!-- end container -->
		<?php endif; ?>	<!-- end OI if statement -->
		
</section>