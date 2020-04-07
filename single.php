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

<div class="post-hero-image">
	<?php echo get_the_post_thumbnail(); ?>
</div>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">


			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>
							
							<div class="post-navigation">
								<?php
									$post_id = $post->ID; // current post ID
									$caseStudy = get_category_by_slug('case-study');
												
									$args = array( 
									    'category__not_in' => $caseStudy,
									    'orderby'  => 'post_date',
									    'order'    => 'DESC'
									);
									$posts = get_posts( $args );
									// get IDs of posts retrieved from get_posts
									$ids = array();
									foreach ( $posts as $thepost ) {
									    $ids[] = $thepost->ID;
									}
									// get and echo previous and next post in the same category
									$thisindex = array_search( $post_id, $ids );
									$previd    = isset( $ids[ $thisindex - 1 ] ) ? $ids[ $thisindex - 1 ] : 0;
									$allid     = isset( $ids[ $thisindex] ) ? $ids[ $thisindex] : 0;
									$nextid    = isset( $ids[ $thisindex + 1 ] ) ? $ids[ $thisindex + 1 ] : 0;
									
									if ( $previd ) {
									    ?><a id="prev" rel="prev" href="<?php echo get_permalink($previd) ?>"><span>&larr;</span> <p>Previous news article</p></a>
									    <?php
									}
									if ( $allid ) {
										?><a id="all" href="<?php echo site_url();?>/news" class="link"><div class="btn_red-border">View All News</div></a><?php
									}
									
									if ( $nextid ) {
									    ?><a id="next" rel="next" href="<?php echo get_permalink($nextid) ?>"><p>Next news article</p><span>&rarr;</span></a><?php
									}
								?>
							</div>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->
<section class="bottom-section"></section>

<?php get_footer();
