<?php

// check if the repeater field has rows of data
if( have_rows('photo_gallery') ):
	$count = 0;?>
<section class="photo-gallery-wrapper">
	<div class="container">
		<div class="row">
<?php
 	// loop through the rows of data
    while ( have_rows('photo_gallery') ) : the_row();

        // display a sub field value
		$photo = get_sub_field('pg_photo');

		 ?>
		 	<!-- if count = 0 / first row -->
		  	<?php if ($count == 0): ?>
		  		<div class="col-12 no-margins">
			  		<div class="pg-photo" style="background-image: url(<?php echo $photo['url']; ?>)"></div>
		  		</div>  	
		  	<?php else: ?>
		  		<div class="col-12 col-md-4 no-margins">
			  		<div class="pg-photo">
			  			<div class="pg-photo" style="background-image: url(<?php echo $photo['url']; ?>)"></div>
			  		</div>
		  		</div>
			<?php endif; ?>
		<?php    
		$count++;
		endwhile;
		?>
		</div>
	</div>
</section>
<?php else :

    // no rows found

endif;

?>