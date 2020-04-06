<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="post-excerpt">
			<?php the_excerpt(); ?>
		</div>


	</header><!-- .entry-header -->

	<div class="post-content">
		<?php the_content(); ?>

	</div><!-- .entry-content -->
	
	<div class="post-footer">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-3">
			    <?php
			    		$categories = get_the_category();
		 
						if ( ! empty( $categories )) {
						    $san_cat = sanitize_title( $categories[0]->name );  
						}
			    ?>	
					<img src="<?php echo get_template_directory_uri(); ?>/assets/logos/<?php echo $san_cat; ?>-logo-color.png">
				</div>
				<div class="col-12 col-lg-9" style="display:flex;">
					<div class="category-description">
						<strong><?php echo esc_html( $categories[0]->name ); ?></strong>
						<?php $catID = get_the_category(); echo category_description( $catID [0] ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</article><!-- #post-## -->
