
<?php

// check if the repeater field has rows of data
if( have_rows('executive_profile') ):
	$count = 0;?>
<section class="executive-profiles-wrapper">

<?php
 	// loop through the rows of data
    while ( have_rows('executive_profile') ) : the_row();

        // display a sub field value
		$name = get_sub_field('ep_name');
		$position = get_sub_field('ep_position');
		$portrait = get_sub_field('ep_portrait');
		$hover_image = get_sub_field('ep_hover_image');
		$bio = get_sub_field('ep_bio');
		 ?>
		 	<!-- if count = 0 / first row -->
		  	<?php if ($count == 0): ?>
		  	<div class="president-profile" style="background-image: url(<?php echo $portrait['url']; ?>)">
		  	</div>
		  	<div class="president-description dog-overlay">
				<h2><strong><?php echo $name; ?></strong></h2>
				<p class="ep-position"><strong><?php echo $position; ?></strong></p>
				<p><?php echo $bio; ?></p>
		  	</div>		  	
		  	<?php else: ?>
				<div class="executive-profile" href="#" style="background-image: url(<?php echo $portrait['url']; ?>)">
					<div class="ep-description">
						<p><strong><?php echo $name; ?></strong></p>
						<p><?php echo $position; ?></p>
					</div>
				</div>
				<div class="ep-hover" style="background-image: url(<?php echo $hover_image['url']; ?>)"></div>
			<?php endif; ?>
		<?php    
		$count++;
		endwhile;
		?>
		</section>
<?php else :

    // no rows found

endif;

?>