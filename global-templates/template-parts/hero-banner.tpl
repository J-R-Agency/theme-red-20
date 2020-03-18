<!-- Hero image -->
<?php if ( has_post_thumbnail() ): ?>
	<?php $thumb = get_the_post_thumbnail_url(); ?>
	<?php
		$hero = get_field('hero');
	if( $hero ): ?>
		<div class="hero <?php echo $hero['hero_style']?>">
			<div class="hero-copy <?php echo $hero['hero_style']?>">
				<div class="hero-title <?php echo $hero['hero_style']?>">
					<?php echo $hero['hero_title']; ?>
				</div>
				<div class="hero-intro <?php echo $hero['hero_style']?>">
					<?php echo $hero['hero_intro']; ?>

				</div>
									<?php
						if (!empty($hero['hero_cta_link'])) {
							echo "<a class='btn_white-border margin-vertical' href='".$hero['hero_cta_link']['url']."'>".$hero['hero_cta_link']['title']."</a>";
						}
					?>
			</div>
			<div class="hero-image <?php echo $hero['hero_style']?>">	
				<img src="<?php echo $thumb; ?>">
			</div>	
		</div>
	<?php endif ?>
<?php endif ?>