<!-- Hero image -->
<?php if ( has_post_thumbnail() ): ?>
	<?php $thumb = get_the_post_thumbnail_url(); ?>
	<?php
		$hero = get_field('hero');
	if( $hero ): ?>
		<div class="hero">
			<div class="hero-copy">
				<?php echo $hero['hero_title']; ?>
				<p><strong><?php echo $hero['hero_primary_intro']; ?></strong></p>
				<p><?php echo $hero['hero_secondary_intro'];?></p>
			</div>
			<div class="hero-image">	
				<img src="<?php echo $thumb; ?>">
			</div>	
		</div>
	<?php endif ?>
<?php endif ?>