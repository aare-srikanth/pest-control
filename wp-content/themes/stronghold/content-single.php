<?php
/**
 * @package stronghold
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
$single_featured_image = get_theme_mod( 'single_featured_image',true );
$single_featured_image_size = get_theme_mod ('single_featured_image_size',1);
if ($single_featured_image_size != 3 ) {
if ( $single_featured_image ) :
	 if ( $single_featured_image_size == 1 ) :?>
	 		<div class="post-thumb blog-thumb">
	 <?php  if( has_post_thumbnail() && ! post_password_required() ) :   
				the_post_thumbnail('stronghold-blog-large-width');  
			
			endif;?>
			</div><?php
		 else: ?>
		 	<div class="post-thumb blog-thumb"><?php
		 	if( has_post_thumbnail() && ! post_password_required() ) :   
					the_post_thumbnail('stronghold-small-featured-image-width');		
			endif;?>
			</div><?php
	endif; 
endif;
} ?>

	

	<header class="entry-header">
		<div class="entry-meta header-entry-meta">
			<?php stronghold_post_date(); ?>		
		</div><!-- .entry-meta -->
		<div class="entry-title-meta">
			<h1 class="entry-title"><?php the_title( '','' ); ?></h1>
			<?php if ( get_theme_mod('enable_single_post_top_meta',true ) ): ?>
				<?php stronghold_entry_top_meta(); ?>
			<?php endif; ?>
		</div>
	</header><!-- .entry-header -->

	

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages: ', 'stronghold' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_theme_mod('enable_single_post_bottom_meta', true ) ): ?>
	<footer class="entry-footer">
	<?php if(function_exists('stronghold_entry_bottom_meta') ) {
		     stronghold_entry_bottom_meta();
		} ?>
	</footer><!-- .entry-footer -->
<?php endif;?>

</article><!-- #post-## -->

	
