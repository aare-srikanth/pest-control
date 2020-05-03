<?php
if(! function_exists('stronghold_footer_credits') ) {
	function stronghold_footer_credits() { 
		printf( '<p> %1$s <a href="%2$s" target="_blank"> %3$s</a> %4$s <a href="%5$s" target="_blank" rel="designer">%6$s</a></p>', __('Powered by','stronghold'), esc_url( 'http://wordpress.org/'), __('WordPress.','stronghold'), __('Theme: Stronghold by','stronghold'), esc_url('http://www.webulousthemes.com/'), __('Webulous Themes','stronghold')) ;
    }  
}
	
	add_action('stronghold_credits','stronghold_footer_credits');

if(! function_exists('stronghold_before_branding_widgets') ) {
	function stronghold_before_branding_widgets() {
		?>
			<?php if( is_active_sidebar('top-right' ) ) : ?>
				<div class="social">
					<?php dynamic_sidebar('top-right' ); ?> 
				</div>
			<?php endif; ?>     
		<?php
	}
	
}
add_action('stronghold_before_branding','stronghold_before_branding_widgets');

/* MORE TEXT VALUE */

add_filter( 'the_content_more_link','stronghold_more_text_value');
if(! function_exists('stronghold_more_text_value') ) {
	function stronghold_more_text_value( ) {
		$more_text = get_theme_mod('more_text');
		if( $more_text && !empty( $more_text ) ) { 
			$more_link_text = sprintf(__('%1$s','stronghold'), $more_text );   
		}else{
			$more_link_text = __('Read More','stronghold'); 
		}
		return '<a class="btn-more-link btn-readmore btn btn-mini" href="' . get_permalink() . '">'.$more_link_text.'</a>';
	} 
}

/**
 * Configuration sample for the Kirki Customizer.
 * The function's argument is an array of existing config values
 * The function returns the array with the addition of our own arguments
 * and then that result is used in the kirki/config filter
 *
 * @param $config the configuration array
 *
 * @return array
 */

function stronghold_demo_configuration_sample_styling( $config ) {
	return wp_parse_args( array(
		'color_accent' => '#00c1cf',
		'color_back'   => '#FFFFFF',
		'width'   => '320px',
	), $config );
}
add_filter( 'kirki/config', 'stronghold_demo_configuration_sample_styling' );    

add_action('stronghold_blog_layout_class_wrapper_before','stronghold_blog_layout_wrapper_class_before');
if(! function_exists('stronghold_blog_layout_wrapper_class_before') ) {

	function stronghold_blog_layout_wrapper_class_before() {
		$blog_layout = get_theme_mod('blog_layout',1);
		switch ( $blog_layout ) {
			case 2: ?>
				<div class="eight columns blog-box">	
	<?php	break;
	        case 3: ?>
			    <div class="one-third column blog-box">
	<?php	break;
	        case 4: ?>
			    <div class="eight columns masonry-post blog-box">
	<?php	break;
			case 5: ?>  
			   <div class="one-third column masonry-post blog-box">	
	<?php	break;

		}
	}
}
   
add_action('stronghold_blog_layout_class_wrapper_after','stronghold_blog_layout_wrapper_class_after');
if(! function_exists('stronghold_blog_layout_wrapper_class_after') ) {
	function stronghold_blog_layout_wrapper_class_after() {
	    $blog_layout = get_theme_mod('blog_layout',1 );
		   if(  isset( $blog_layout ) && $blog_layout  > 1 ) { ?>
	          </div>
	<?php	}
	}
}

add_action('wp_head', 'stronghold_masonry_custom_js');
if(! function_exists('stronghold_masonry_custom_js') ) {

	function stronghold_masonry_custom_js() {

	  if( get_theme_mod('blog_layout',1) == 4 || get_theme_mod('blog_layout',1) == 5 ) { ?>

	    <script type="text/javascript">
		    jQuery(document).ready( function($) {
				  $('.masonry-blog-content').imagesLoaded(function () {
			            $('.masonry-blog-content').masonry({
			                itemSelector: '.masonry-post',
			                gutter: 0,
			                transitionDuration: 0,
			            }).masonry('reloadItems');
			      });
		    });
	    </script> 

<?php }
	}
}


add_action('stronghold_before_header','stronghold_before_header_video');
if(!function_exists('stronghold_before_header_video')){
	function stronghold_before_header_video() {
		if(function_exists('the_custom_header_markup') ) { ?>
		    <div class="custom-header-media">
				<?php the_custom_header_markup(); ?>
			</div>
	    <?php } 
	}
}
