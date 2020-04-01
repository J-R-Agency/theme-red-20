<!-- Hero image -->
<?php if ( has_post_thumbnail() ): ?>
	<?php $thumb = get_the_post_thumbnail_url(); ?>
	<?php
		$hero = get_field('hero');
	if( $hero ): ?>
		<div class="hero profile">
			<div class="hero-copy profile">
				<div class="hero-intro profile">
					<p><?php echo $hero['hero_intro']; ?></p>
				</div>
				<div class="hero-cta-link">
					<?php
						if (!empty($hero['hero_cta_link'])) {
							echo "<a href='".$hero['hero_cta_link']['url']."' target='".$hero['hero_cta_link']['target']."' class='link'>";
							
							echo "<div class='btn_red-border'>";
							echo	$hero['hero_cta_link']['title'];
							echo	"</div>
								</a>";
						}
					?>					
				</div>				
			</div>
			<div class="hero-image profile">	
				<img src="<?php echo $thumb; ?>">
			</div>	
		</div>
	<?php endif ?>
<?php endif ?>