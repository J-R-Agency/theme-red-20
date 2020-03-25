<section>
	<div class='flex-row'>
		<?php if( have_rows('businesses', 'option') ): ?>
		
		    <div class='flex-column-2'>
		
		    <?php while( have_rows('businesses', 'option') ): the_row();
		    	$business_logo = get_sub_field('business_logo', 'option'); // Image
		    ?>
		
		        <img src='<?php echo $business_logo['business_logo_color']['url']; ?>' class='logo'>
		
		    <?php endwhile; ?>
		
		    </div>
		
		<?php endif; ?>
		<div class='flex-column-2'>
			
		</div>
	</div>
</section>