
<section class="generic bg-white">
	<h1 class="horizontal-center">Video</h1>
	
<?php if( have_rows('videos_block') ):

	$count = 0;

	while( have_rows('videos_block') ): the_row(); 

		$video_embed = get_sub_field('video_embed');
		$video_title = get_sub_field('video_title');
		$video_description = get_sub_field('video_description');

		?>
		<div class="video-container <?php if ($count != 0): ?> thumb <?php endif; ?>">
			<div class="embed-container">
				<?php echo $video_embed; ?>
			</div>
			
			<?php 
              if ($count == 0):
            ?>
				<p class="video-title">New! <?php echo $video_title; ?></p>
				<p class="video-description"><?php echo $video_description; ?></p>
			<?php endif; ?>
		</div>
	<?php $count++;
		endwhile; 
	endif; ?>
</section>