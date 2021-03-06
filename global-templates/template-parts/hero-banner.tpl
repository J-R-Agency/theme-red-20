<!-- Hero image -->
<?php if ( has_post_thumbnail() ): ?>
	<?php $thumb = get_the_post_thumbnail_url(); ?>
	<?php
		$hero = get_field('hero');
	if( $hero ): ?>
		<div class="hero <?php echo $hero['hero_style']?> bg-<?php echo $hero['hero_color']?>">
			<div class="hero-copy <?php echo $hero['hero_style']?>">
				<div class="hero-title <?php echo $hero['hero_style']?>">
					<?php echo $hero['hero_title']; ?>
				</div> <!-- end title -->
				<div class="hero-intro <?php echo $hero['hero_style']?>">
					<?php echo $hero['hero_intro']; ?>
				</div> <!-- end intro -->
				<div class="hero-cta-link">
					<?php
						if (!empty($hero['hero_cta_link'])) {
							echo "<a href='".$hero['hero_cta_link']['url']."' target='".$hero['hero_cta_link']['target']."' class='link'>";
							
							if ($hero['hero_style']=='tertiary') {
								echo "<div class='btn_white-border'>";
							} else {
								echo "<div class='btn_".$hero['hero_button_color']."-border'>";
							}
							echo	$hero['hero_cta_link']['title'];
							echo	"</div>
								</a>";
						}
					?>					
				</div>

			</div> <!-- end copy -->
			<div class="hero-image <?php echo $hero['hero_style']?>">	
				<img src="<?php echo $thumb; ?>">
			</div>	<!-- end image -->
		</div> <!-- end hero -->
	<?php endif ?>
<?php endif ?>