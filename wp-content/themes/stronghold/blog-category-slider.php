<?php
/**
 * The template for displaying blog-category-slider 
 *
 * display slider
 *
 * @package stronghold
 */

$stronghold_blog_slider_cat = get_theme_mod( 'blog_slider_cat', '' );
$stronghold_blog_slider_count = get_theme_mod( 'blog_slider_count', 5 );
$stronghold_blog_slider_posts = array(
	'cat' => absint($stronghold_blog_slider_cat),
	'posts_per_page' => absint($stronghold_blog_slider_count)
);

	if ($stronghold_blog_slider_cat) {
		$stronghold_query = new WP_Query($stronghold_blog_slider_posts);
			if( $stronghold_query->have_posts()) : ?>
				<div class="flexslider">
					<ul class="slides">
						<?php while($stronghold_query->have_posts()) :
								$stronghold_query->the_post();
								if( has_post_thumbnail() ) : ?>
								    <li>
								    	<div class="flex-image">
								    		<?php the_post_thumbnail('full'); ?>
								    	</div>
								    	<?php $content = get_the_content();
								    	if( !empty($content) ) :?>
									    	<div class="flex-caption">
									    		<?php the_content(); ?>
									    	</div>
									    <?php endif; ?>
								    </li>
								<?php endif; ?>
						<?php endwhile; ?>
					</ul>
				</div>
			<?php endif; ?>
			<?php  
				$stronghold_query = null;
				wp_reset_postdata();	
	}elseif( current_user_can('manage_options') ) {	?>	
		<div class="flexslider">  
			<ul class="slides">	          
				<li>   	
					<div class="flex-image">
						<?php echo '<img src="' . get_template_directory_uri() . '/images/slider.png" alt="" >';?>	
					</div>
					<?php	
					$slide_description = sprintf('<h1> %1$s </h1><p>%2$s</p><p><a href="%3$s" target="_blank"> %4$s</a></p>',__('Slider Setting','stronghold'), __('You haven\'t created any slider yet. Create a post, set your slider image as Post\'s featured image ( Recommended image size 1280*450 ). Go to Customizer and click stronghold Options => Blog => Blog Page and select blog Slider Post Category and No.of Sliders.','stronghold'), esc_url(admin_url('customize.php')) , __('Customizer','stronghold'));?>
					<div class="flex-caption"> <?php echo $slide_description;?></div>
				</li>
			</ul>
		</div><!-- flex-slider end -->	<?php
	}