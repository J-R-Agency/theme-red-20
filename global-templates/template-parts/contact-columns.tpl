<section>
		<?php if( have_rows('businesses', 'option') ): ?>
		
		    <?php while( have_rows('businesses', 'option') ): the_row();
		    	$business_logo = get_sub_field('business_logo', 'option'); // Image
		    	$business_name = get_sub_field('business_name', 'option'); // Text
		    	$business_locations = get_sub_field('business_locations', 'option');
		    	$business_links = get_sub_field('business_links', 'option'); // Profile
				$enable = get_sub_field('enable', 'option');
		    ?>
		    
		    <?php if ($enable == false): ?>
			    <div class="flex-row contact">
					<div class='flex-column-2'>
						<div class='tcb_cta primary' style='background-image:url(<?php echo $business_logo['business_logo_background_image']['url']; ?>);'>
			        		<img src='<?php echo $business_logo['business_logo_color']['url']; ?>' class='logo'>
						</div>		
			    	</div>
					<div class='flex-column-2'>
						<div class='business-info'>
							<div class="container">
								<div class="row">
									<div class="col-12">
										<h2 class='business-name'><?php echo $business_name; ?></h2>
									</div>
								</div>
								<div class="row">
	
									<?php if( have_rows('business_locations', 'option') ): ?>
										<?php while( have_rows('business_locations', 'option') ): the_row();
											$location_address = get_sub_field('location_address', 'option');
											$email = get_sub_field('email', 'option');
										?>
										<div class="col-12 col-md-6">
											<div class="business-location">											
												<p><?php echo $location_address; ?></p>
												<a href="mailto:<?php echo $email; ?>" class="email-link"><?php echo $email; ?></a>
											</div>
										</div>		
																				
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
									<div class="row">
										<div class="col-12">
											<a href="<?php echo $business_links['business_website']['url']; ?>" target="<?php echo $business_links['business_website']['target']; ?>">Website <span>&rarr;</span></a>
										</div>
									</div>						
							</div>
							
						</div>
					</div>	
			    </div>
			    <?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>

</section>