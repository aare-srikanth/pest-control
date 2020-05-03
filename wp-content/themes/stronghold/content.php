<?php
/**
 * @package stronghold
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="entry-content">
	<?php 
		$featured_image = get_theme_mod( 'featured_image',true );
	    $featured_image_size = get_theme_mod ('featured_image_size','1');
		if( $featured_image ) : 
		        if ( $featured_image_size == '1' ) :?>		
						<div class="thumb">
						  <?php	if( $featured_image && has_post_thumbnail() ) : 
								    the_post_thumbnail('stronghold-blog-full-width');
			                     endif;?>
			            </div> <?php
		        else: ?>
		 	            <div class="thumb">
		 	                 <?php if( has_post_thumbnail() && ! post_password_required() ) :   
					               the_post_thumbnail('stronghold-small-featured-image-width');
								endif;?>
			             </div>  <?php				
	            endif; 
		endif; ?>    
		<?php do_action('uniq_before_entry_header'); ?>

		<div class="entry-body">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title( '', '' ); ?></a></h1>
			<?php
			/* translators: %s: Name of current post */
				the_content();
			?>
		</div> 	
		<?php do_action('stronghold_after_entry_header'); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages: ', 'stronghold' ),
				'after'  => '</div>',
			) );
		?>

		<br class="clear" />
	</div><!-- .entry-content -->

	<?php do_action('stronghold_before_entry_footer'); ?>
	<?php if ( get_theme_mod('enable_single_post_bottom_meta', true ) ): ?>
		<footer class="entry-footer">
			<?php if(function_exists('stronghold_entry_bottom_meta') ) {
			     stronghold_entry_bottom_meta();
			} ?>
		</footer><!-- .entry-footer -->
	<?php endif;?>
<?php do_action('stronghold_after_entry_footer'); ?>

</article><!-- #post-## -->