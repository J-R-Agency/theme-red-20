if( get_row_layout() == 'tcb_cta_with_image' ):
	echo "
		<div class='col-12 col-md-6'>
		</div>
		";
elseif( get_row_layout() == 'tcb_image' ):
	$tcb_image = get_sub_field('tcb_image'); // Image
	echo "
		<div class='col-12 col-md-6'>
			<div class='tcb_image'>
				<img src='".$tcb_image['url']."'>
			</div>
		</div>
		";						

elseif( get_row_layout() == 'tcb_brands' ):
	echo "
		<div class='col-12 col-md-6'>
			Brands
		</div>
		";						
endif;