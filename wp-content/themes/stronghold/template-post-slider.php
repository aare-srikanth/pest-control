<?php
/**
 * Template Name: Default Template With Post Slider
 *
 * @package stronghold
 */

get_header(); 
get_template_part('breadcrumb'); 
?>	

	
<?php get_template_part('category-slider'); ?>

	<div id="content" class="site-content">
	<div class="container">

	<?php do_action('stronghold_two_sidebar_left'); ?>	

		<div id="primary" class="content-area <?php stronghold_layout_class();?> columns">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	<?php do_action('stronghold_two_sidebar_right'); ?>	

<?php get_footer(); ?>
