<!-- BLOG CARD -->
<div class="col-12 col-lg-4 col-md-4">
	
		<div class="case-study-card">
	    	<!-- image -->
	    	<a href="<?php the_permalink(); ?>" class="link">
		    	<div class="case-study-card__img">
		    		<?php if ( has_post_thumbnail() ) {
			    		echo "<img src=\"" . get_the_post_thumbnail_url() . "\">";
		    		} else { 
		    			echo "<img src='". get_template_directory_uri() ."/assets/images/news-card-placeholder.jpg'>";
		    		} ?>
			    </div><!--end image -->
		    </a>
		    
	    	<!-- title -->
        	<div class="case-study-card__title">
	        	<a href="<?php the_permalink(); ?>" class="link"><?php the_title(); ?></a>
	        </div><!-- end title -->

    	</div><!-- end blog card -->
    
</div><!-- end col -->
