<!-- Hero image -->
<?php
	$banner_cta = get_field('banner_cta');
if( $banner_cta ): ?>
	
	<!-- Link only -->
	<?php
		if ($banner_cta['cta_style']=='primary'):
	?>
	<div class="banner-cta link">
		<h2><?php echo $banner_cta['cta_text']; ?></h2>		
		<a href="<?php echo $banner_cta['cta_link']['url']?>" target="<?php echo $banner_cta['cta_link']['target']?>" class="btn_white-border margin-horizontal"><?php echo $banner_cta['cta_link']['title']?></a>
	</div>
	
	<!-- Social media -->	
	<?php elseif ($banner_cta['cta_style']=='secondary'):
	?>
	<div class="banner-cta social-media">

		<div class="banner-cta-left">
			<h2><?php echo $banner_cta['cta_text']; ?></h2>	
		</div>

		<div class="banner-social-media">
			<?php include(get_template_directory() . '/global-templates/template-parts/social-media.php'); ?>
		</div>

	</div>
	<?php endif; ?>
	
<?php endif ?>