<?php

  // -------------------------- //
 // ----- CTA WITH IMAGE ------//
// -------------------------- //
if( get_row_layout() == 'tcb_cta_with_image' ):
	$tcb_cta_background_image = get_sub_field('tcb_cta_background_image');
	$tcb_cta_title = get_sub_field('tcb_cta_title');
	$tcb_cta_text = get_sub_field('tcb_cta_text');
	$tcb_cta_link = get_sub_field('tcb_cta_link');
	$tcb_cta_style = get_sub_field('tcb_cta_style');
	$tcb_cta_image_hover = get_sub_field('tcb_cta_image_hover');
	
	// STYLE: PRIMARY
	if ($tcb_cta_style == 'primary'):
		echo "
			<div class='flex-column-2'>
				<a href='".$tcb_cta_link['url']."' target='".$tcb_cta_link['target']."' class='tcb-cta-link'>
				<div class='tcb_cta_container'>
				
					<div class='hover' style='background-image: url(".$tcb_cta_image_hover['url'].")'></div>
					
						<div class='tcb_cta ".$tcb_cta_style."' style='background-image:url(".$tcb_cta_background_image['url'].");'>
							<h2>".$tcb_cta_title."</h2>
							<p>".$tcb_cta_text."</p>
							<a href='".$tcb_cta_link['url']."' target='".$tcb_cta_link['target']."' class='link margin-vertical'><div class='btn_red-border'>".$tcb_cta_link['title']."</div></a>
						</div>
					
				</div>
				</a>
			</div>
			";		
	// STYLE: SECONDARY
	elseif ($tcb_cta_style == 'secondary'):
		echo "
			<div class='flex-column-2'>
				<div class='tcb_cta ".$tcb_cta_style."' style='background-image:url(".$tcb_cta_background_image['url'].");'>
					<h2>".$tcb_cta_text."</h2>
					<div class='tcb_cta_link'>
						<a href='".$tcb_cta_link['url']."' target='".$tcb_cta_link['target']."' class='link margin-vertical'><div class='btn_white-border'>".$tcb_cta_link['title']."</div></a>
					</div>
				</div>
			</div>
			";	
	endif;
	
  // -------------------------- //
 // ---------- IMAGE ----------//
// -------------------------- //
elseif( get_row_layout() == 'tcb_image' ):
	$tcb_image = get_sub_field('tcb_image'); // Image
	$tcb_image_hover = get_sub_field('tcb_image_hover'); // Image
	$tcb_link = get_sub_field('tcb_link'); // Image
	echo "
		<div class='flex-column-2'>
			<div class='tcb-image'>";
	
		if ($tcb_link) {
			echo "<a href='".$tcb_link['url']."' target='".$tcb_link['target']."'>";
		}
		
		echo "
		<div class='logo' style='background-image: url(".$tcb_image['url'].")'></div>
		";
		
		if ($tcb_link) {
			echo "</a>";
		}
	echo "</div>
	</div>";						

  // -------------------------- //
 // ---------- BRAND ----------//
// -------------------------- //
elseif( get_row_layout() == 'tcb_brands' ):
	echo "
		<div class='flex-column-2'>
			<div class='business-logos-wrapper'>
			<p><strong>Our Brands:</strong></p>";
			if( have_rows('businesses', 'option') ):
				
				
				echo "
					<div class='business-logos'>
						<ul class='business-logos-list'>
					";
				
					while( have_rows('businesses', 'option') ): the_row();
						$business_logo = get_sub_field('business_logo', 'option'); // Image
						$business_links = get_sub_field('business_links', 'option'); // Profile
						$business_name = get_sub_field('business_name', 'option');
						$enable = get_sub_field('enable', 'option');
						$san_name = sanitize_title($business_name);  						
						
						if ($enable == false) {
							echo "
							    <li>
							    	<a href='".$business_links['business_profile']['url']."'><img src='".$business_logo['business_logo_color']['url']."' alt='".$business_logo['business_logo_color']['alt']."'></a>
							    </li>";							
						} else {
							echo "";
						}

					
					endwhile;
				
				echo "</ul></div></div>";
			
			endif;
	echo "</div>";
							
endif;

?>