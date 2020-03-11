<!-- Hero image -->
<?php if ( has_post_thumbnail() ): ?>
	<?php $thumb = get_the_post_thumbnail_url(); ?>
		<div class="hero" style="background-image: url('<?php echo $thumb; ?>');">					
		</div>	
<?php endif ?>