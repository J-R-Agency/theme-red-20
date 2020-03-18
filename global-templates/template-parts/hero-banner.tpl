<!-- Hero image -->
<?php if ( has_post_thumbnail() ): ?>
	<?php $thumb = get_the_post_thumbnail_url(); ?>
	<?php
		$hero = get_field('hero');
	if( $hero ): ?>
		<div class="hero <?php echo $hero['hero_style']?>">
			<div class="hero-copy <?php echo $hero['hero_style']?>">
				<div class="hero-title <?php echo $hero['hero_style']?>">
					<?php if (is_singular()) { 
						echo the_title();
					} else {
						echo $hero['hero_title'];
					} ?>
				</div>
				<hr class="hero-line <?php echo $hero['hero_style']?>" width=50%>
				<div class="hero-intro <?php echo $hero['hero_style']?>">
					<p><?php echo $hero['hero_intro']; ?></p>
				</div>
			</div>
			<div class="hero-image <?php echo $hero['hero_style']?>">	
				<img src="<?php echo $thumb; ?>">
			</div>	
		</div>
	<?php endif ?>
<?php endif ?>