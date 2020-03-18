<!-- Hero image -->
<?php if ( has_post_thumbnail() ): ?>
	<?php $thumb = get_the_post_thumbnail_url(); ?>
	<?php
		$hero = get_field('hero');
	if( $hero ): ?>
		<div class="hero post">
			<div class="hero-copy post">
				<div class="hero-title post">
					<?php echo the_title(); ?>
				</div>
				<hr class="hero-line post" width=50%>
				<div class="hero-intro post">
					<p><?php echo $hero['hero_intro']; ?></p>
				</div>
			</div>
			<div class="hero-image post">	
				<img src="<?php echo $thumb; ?>">
			</div>	
		</div>
	<?php endif ?>
<?php endif ?>