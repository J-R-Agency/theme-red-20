<?php

// check if the repeater field has rows of data
if( have_rows('executive_profile') ):
	$count = 0;?>
<section class="executive-profiles-wrapper">
	
<section class="generic bg-white">
	<div class="executive-profiles-intro">
		<h1><?php the_field('ep_headline');?></h1>
		<p><?php the_field('ep_intro');?></p>
	</div>
</section>
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
		  	<div class='president-wrapper'>
			  	<!-- image -->
			  	<div class="president-profile" style="background-image: url(<?php echo $portrait['url']; ?>)"></div>
			  	<!-- hover image -->
			  	<div class="president-hover" style="background-image: url(<?php echo $hover_image['url']; ?>)"></div>
			
			
			  	<!-- description -->
			  	<div class="president-description dog-overlay">
					<h2><strong><?php echo $name; ?></strong></h2>
					<p class="ep-position"><strong><?php echo $position; ?></strong></p>
					<p><?php echo $bio; ?></p>
			  	</div>
		  	</div>
		  		  	
		  	<?php else: ?>
		  	<div class="ep-individual-wrapper">
				<div class="executive-profile" href="#" style="background-image: url(<?php echo $portrait['url']; ?>)">
					<div class="ep-description">
						<p><strong><?php echo $name; ?></strong></p>
						<p><?php echo $position; ?></p>
					</div>
				</div>
				<div class="ep-hover" style="background-image: url(<?php echo $hover_image['url']; ?>)"></div>
		  	</div>
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