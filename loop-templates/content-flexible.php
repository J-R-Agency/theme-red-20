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
       		$bb_color = get_sub_field('bb_color');
       		
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
								$business_name = get_sub_field('business_name', 'option');
								$business_links = get_sub_field('business_links', 'option'); // Profile	
								$enable = get_sub_field('enable', 'option');							
								$san_name = sanitize_title($business_name);  
							
								if ($enable == false) {
									echo "
									    <li>
									    	<a href='".$business_links['business_profile']['url']."'><img src='".$business_logo['business_logo_white']['url']."' alt='".$business_logo['business_logo_white']['alt']."'></a>
									    </li>";
								} else {
									echo "";
								}
							
							endwhile;
						echo "</ul></div>";
					endif;	   				
	   			echo "</section>";	
	   		elseif($bb_style == 'secondary'):
	   			echo "<section class='fc_brands_block secondary bg-".$bb_color."');'>
	   				<p>".$bb_text."</p>
	   			";
	   				if( have_rows('businesses', 'option') ):
						echo "
							<div class='business-logos'>
								<ul class='business-logos-list-full'>
							";
						
							while( have_rows('businesses', 'option') ): the_row();
								$business_logo = get_sub_field('business_logo', 'option'); // Image
								$business_name = get_sub_field('business_name', 'option');
								$business_links = get_sub_field('business_links', 'option'); // Profile
								$enable = get_sub_field('enable', 'option');
								$san_name = sanitize_title($business_name);  
								
								
								if ($enable == false) {
									echo "
									    <li>
									    	<a href='".$business_links['business_profile']['url']."'><img src='".$business_logo['business_logo_white']['url']."' alt='".$business_logo['business_logo_white']['alt']."'></a>
									    </li>";
								} else {
									echo "";
								}
							
							endwhile;
						echo "</ul></div>";
					endif;	   				
	   			echo "</section>";
	   		elseif($bb_style == 'tertiary'):
	   			echo "<section class='fc_brands_block tertiary');'>
	   			";
	   				if( have_rows('businesses', 'option') ):
						echo "
							<div class='business-logos-wrapper'>
								<p><strong>".$bb_text."</strong></p>
								<ul class='business-logos-list-full'>
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
									    	<a href='".$business_links['business_profile']['url']."'><img src='".$business_logo['business_logo_color']['url']."' alt='".$business_logo['business_logo_white']['alt']."'></a>
									    </li>";
								} else {
									echo "";
								}
								
								
							
							endwhile;
						echo "</ul></div>";
					endif;	   				
	   			echo "</section>";		   			
	   				
	   		endif;

          // -------------------------- //
         // --- CASE: FULL-WIDTH CTA --//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_cta' ):
       		$cta_text = get_sub_field('cta_text');
       		$cta_background_image = get_sub_field('cta_background_image');
       		$cta_link = get_sub_field('cta_link');
       		
       		echo "
			<div class='flex-column-2'>
				<div class='tcb_cta secondary' style='background-image:url(".$cta_background_image['url'].");'>
					<h2 class='cta_text_full'>".$cta_text."</h2>
					<div class='tcb_cta_link'>
						<a href='".$cta_link['url']."' target='".$cta_link['target']."' class='link margin-vertical'><div class='btn_white-border'>".$cta_link['title']."</div></a>
					</div>
				</div>
			</div>       		
       		
       		";
       		
          // -------------------------- //
         // ---- CASE: BANNER CTA -----//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_banner_cta' ):
       		$bcta_text = get_sub_field('bcta_text');
       		$bcta_link = get_sub_field('bcta_link');
       		
       		echo "
				<div class='banner-cta-mid link'>
					<h2>".$bcta_text."</h2>		
					<a href='".$bcta_link['url']."' target='".$bcta_link['target']."' class='btn_white-border margin-horizontal'>".$bcta_link['title']."</a>
				</div>
       		";       		
       		
       		
          // -------------------------- //
         // ------- CASE: VIDEO -------//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_video' ):
       		$fc_video_embed = get_sub_field('fc_video_embed');
       		
       		echo "
				<div class='fc-embed-container'>".
					$fc_video_embed
				."</div>    		
       		";       		

          // -------------------------- //
         // -------- CASE: TEAM -------//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_team' ):
       		$team_headline = get_sub_field('team_headline');
       		$team_copy = get_sub_field('team_copy');
       		$team_members = get_sub_field('team_members');
       		
       		echo "
			<section class='generic bg-white horizontal-center'>
				<h1>".$team_headline."</h1>  	
				<p>".$team_copy."</p>
				<div class='container'>
					<div class='row' style='justify-content:center;'>";
					
				if ( have_rows( 'team_members' ) ) :
					while ( have_rows( 'team_members' ) ) : the_row();
					$team_member_portrait = get_sub_field('team_member_portrait');
					$team_member_name = get_sub_field('team_member_name');
					$team_member_position = get_sub_field('team_member_position');
					
					echo "
						<div class='col-12 col-lg-3'>
							<img src='". $team_member_portrait['url'] ."' class='team-member-portrait'>
							<p class='team-member-name'><strong>". $team_member_name ."</strong></p>	
							<p class='team-member-position'>". $team_member_position ."</p>			
						</div>
					";	
					
					endwhile;
				endif;
			echo "
					</div>
				</div>	
       		</section>
       		";  


          // -------------------------- //
         // ------- CASE: DOGS --------//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_dogs' ):
       		$dogs_headline = get_sub_field('dogs_headline');
       		$dogs_list = get_sub_field('dogs_list');
       		
       		echo "
			<section class='generic bg-light-grey dog-overlay-cs horizontal-center'>
				<h2>".$dogs_headline."</h2>
				<div class='container'>
					<div class='row' style='justify-content:center;'>";
					
					if ( have_rows( 'dogs_list' ) ) :
						while ( have_rows( 'dogs_list' ) ) : the_row();
							$fc_dog_portrait = get_sub_field('fc_dog_portrait');
							$fc_dog_name = get_sub_field('fc_dog_name');
							
							echo "
								<div class='col-12 col-lg-3'>
									<img src='". $fc_dog_portrait['url'] ."' class='team-member-portrait'>
									<p><strong>". $fc_dog_name ."</strong></p>	
								</div>					
							";
							
						endwhile;
					endif;
					
			echo	"
					</div>
				</div>
			</section>      		
       		
       		";       		
		    
          // -------------------------- //
         // --- CASE: ACHIEVEMENTS ----//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_achievements' ):
       		$achievements_headline = get_sub_field('achievements_headline');
       		$achievements_copy = get_sub_field('achievements_copy');
       		$achievements_list = get_sub_field('achievements_members');
       		
       		echo "
			<section class='generic bg-white horizontal-center'>
				<h1>".$achievements_headline."</h1>  	
				<p>".$achievements_copy."</p>
				<div class='container'>
					<div class='row'>";
					
				if ( have_rows( 'achievements_list' ) ) :
					while ( have_rows( 'achievements_list' ) ) : the_row();
					$fc_achievement = get_sub_field('fc_achievement');
					$number = get_row_index();
					
					echo "
						<div class='col-12 col-lg-3'>
							<div class='achievement-copy'>
							<h1 class='achievement-number'>".$number."</h1>
							". $fc_achievement ."
							</div>
						</div>
					";	
					
					endwhile;
				endif;
			echo "
					</div>
				</div>	
       		</section>
       		";  
		    
          // -------------------------- //
         // ----- CASE: BENEFITS ------//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_benefits' ):
       		$fc_benefits_headline = get_sub_field('fc_benefits_headline');
       		$fc_benefits_copy = get_sub_field('fc_benefits_copy');
       		$fc_benefits_list = get_sub_field('fc_benefits_list');
       		
       		echo "
			<section class='generic bg-white horizontal-center'>
				<h1>".$fc_benefits_headline."</h1>  	
				<p>".$fc_benefits_copy."</p>
				<div class='careers-benefits'>
					<div class='flex-row'>";
					
				if ( have_rows( 'fc_benefits_list' ) ) :
					while ( have_rows( 'fc_benefits_list' ) ) : the_row();
					$fc_benefits_icon = get_sub_field('fc_benefits_icon');
					$fc_benefits_list_item = get_sub_field('fc_benefits_list_item');
					
					echo "
						<div class='flex-column-5'>
							<img src=".$fc_benefits_icon['url']." class='benefits-icon'>
							<p class='benefits-list-item'><strong>". $fc_benefits_list_item ."</strong></p>
						</div>
					";	
					
					endwhile;
				endif;
			echo "
					</div>
				</div>	
       		</section>
       		";  		    

          // -------------------------- //
         // ------ CASE: IMPACT -------//
        // -------------------------- //
       elseif( get_row_layout() == 'fc_impact' ):
       		$impact_headline = get_sub_field('impact_headline');
       		$impact_intro = get_sub_field('impact_intro');
       		
       		echo "
			<!-- Hero image -->
				<div class='impact'>
					<div class='impact-copy'>
						<div class='impact-headline'>
							<h1>".$impact_headline."</h1>
						</div>
						<div class='impact-intro'>
							<p>
								".$impact_intro."
							</p>
						</div>
					</div>
					<div class='impact-wave'></div>
					<div class='impact-timeline'>";
						if ( have_rows( 'impact_timeline' ) ) :
						
							echo "<ul class='timeline'>";
							
							while ( have_rows( 'impact_timeline' ) ) : the_row();
							$timeline_year = get_sub_field('timeline_year');
							$timeline_milestone = get_sub_field('timeline_milestone');		
							
							echo "
								<li class='milestone' data-date='".$timeline_year."'>
									<p>".$timeline_milestone."</p>
								</li>
							
							";
												
							endwhile;
							echo "</ul>";
						endif;							
				echo "</div>
				</div>	
       		";  	
		    
		    
        endif; // Last endif            

    // End loop.
    endwhile;

// No value.
else :
    
endif;

?>