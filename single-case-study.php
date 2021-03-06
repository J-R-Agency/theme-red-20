<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php include(get_template_directory() . '/global-templates/template-parts/hero-banner-post.tpl'); ?>

<section class="generic bg-white">
	<div class="three-column">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<?php include(get_template_directory() . '/global-templates/template-parts/our-involvement.tpl'); ?>
<?php include(get_template_directory() . '/global-templates/template-parts/photo-gallery.tpl'); ?>
<?php include(get_template_directory() . '/global-templates/template-parts/banner-cta.tpl'); ?>

<?php get_footer();
