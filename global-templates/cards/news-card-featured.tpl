<!-- BLOG CARD (FIRST) -->
					<div class="col-12">
							<div class="news-card__first">
								
								<div class="news-card__left">
							    	<!-- image -->
							    	<div class="news-card__img-large">
								    	<a href="<?php the_permalink(); ?>">
								    		<?php if ( has_post_thumbnail() ) {
									    		echo "<img src=\"" . get_the_post_thumbnail_url() . "\">";
								    		} else { 
								    			echo "<img src='". get_template_directory_uri() ."/assets/images/news-card-placeholder.jpg'>";
								    		} ?>
								    	</a>
								    </div><!--end image -->
								</div>
									
								<div class="news-card__right">
							    	<!-- title -->
						        	<div class="news-card__title">
							        	<a href="<?php the_permalink(); ?>" class="link"><?php the_title(); ?></a>
							        </div><!-- end title -->
							        		   
							    	<!-- category -->
							    	<div class="news-card__category">
								    	<?php the_category(', '); ?>
								    </div><!-- end category-->
								    
								    <div class="news-card__excerpt">
								    	<?php the_excerpt(); ?>
								    	<div class="news-card__button">
									    	<a href="<?php echo the_permalink(); ?>" class="link">
										    	<div class="btn_red-border">Read On</div>
										    </a>
										</div>
								    </div>
								</div>
								
					    	</div><!-- end blog card -->
					  
					</div><!-- end col -->