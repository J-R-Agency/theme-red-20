<?php
/**
 * Partial template for flexible content in templates
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php

// Check value exists.
if( have_rows('flexible_content_block') ):

    // Loop through rows.
    while ( have_rows('flexible_content_block') ) : the_row();

          // -------------------------- //
         // -- CASE: TWO COLUMN BLOCK -//
        // -------------------------- //
        if( get_row_layout() == 'fc_two_column_block' ):
        	
        	echo "<div class='flex-row'>";
        			
			if( have_rows('tcb_left_column') ) :
				while ( have_rows('tcb_left_column') ) : the_row();
				
					get_template_part( 'loop-templates/column', 'flexible' );
										
				endwhile;
			endif;
			
			if( have_rows('tcb_right_column') ) :
				while ( have_rows('tcb_right_column') ) : the_row();
				
					get_template_part( 'loop-templates/column', 'flexible' );
					
				endwhile;
			echo "
			</div>";
			endif;	

          // -------------------------- //
         // ---- CASE: BRAND BLOCK ----//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_brands_block' ):
       
       		$bb_style = get_sub_field('bb_style'); // Style (select)
       		$bb_text = get_sub_field('bb_text');
       		$bb_background_image = get_sub_field('bb_background_image');
       		
       		if ($bb_style == 'primary'):
	   			echo "<section class='fc_brands_block primary' style='background-image:url(".$bb_background_image['url'].");'>
	   					<img src='".get_template_directory_uri()."/assets/images/red-logo-line.png' id='red-logo-line'>
	   			";
	   				if( have_rows('businesses', 'option') ):
						echo "
							<div class='business-logos'>
								<ul class='business-logos-list-full'>
							";
						
							while( have_rows('businesses', 'option') ): the_row();
								$business_logo = get_sub_field('business_logo', 'option'); // Image
								$business_website = get_sub_field('business_website', 'option'); // Website link
								
								echo "
								    <li>
								    	<a href='".$business_website['url']."' target='".$business_website['target']."'><img src='".$business_logo['business_logo_white']['url']."' alt='".$business_logo['business_logo_white']['alt']."'></a>
								    </li>";
							
							endwhile;
						echo "</ul></div>";
					endif;	   				
	   			echo "</section>";	
	   		elseif($bb_style == 'secondary'):
	   			echo "<section class='fc_brands_block secondary');'>
	   				<p>".$bb_text."</p>
	   			";
	   				if( have_rows('businesses', 'option') ):
						echo "
							<div class='business-logos'>
								<ul class='business-logos-list-full'>
							";
						
							while( have_rows('businesses', 'option') ): the_row();
								$business_logo = get_sub_field('business_logo', 'option'); // Image
								$business_website = get_sub_field('business_website', 'option'); // Website link
								
								echo "
								    <li>
								    	<a href='".$business_website['url']."' target='".$business_website['target']."'><img src='".$business_logo['business_logo_white']['url']."' alt='".$business_logo['business_logo_white']['alt']."'></a>
								    </li>";
							
							endwhile;
						echo "</ul></div>";
					endif;	   				
	   			echo "</section>";		
	   		endif;
		    
        endif;        

    // End loop.
    endwhile;

// No value.
else :
    
endif;

?>