
<section class="generic bg-white">
	<h1 class="horizontal-center">Video</h1>
	
		<?php if( have_rows('videos_block') ):
				
			while ( have_rows('videos_block') ) : the_row();
			?>
				
				<div class="embed-container">
					It's working
				</div>
		
			<?php endwhile; ?>
		<?php else: ?>
			Test (not working)
		<?php endif; ?>	
</section>