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
         // -- CASE: ONE COLUMN BLOCK -//
        // -------------------------- //
       // elseif( get_row_layout() == 'fc_two_column_block' ): 


		    
        endif;        

    // End loop.
    endwhile;

// No value.
else :
    
endif;

?>