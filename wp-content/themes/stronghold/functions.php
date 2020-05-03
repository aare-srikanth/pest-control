<?php
/**
 * stronghold functions and definitions
 *
 * @package stronghold
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 780; /* pixels */
}

if ( ! function_exists( 'stronghold_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function stronghold_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on stronghold, use a find and replace
	 * to change 'stronghold' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'stronghold', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_editor_style( 'css/editor-style.css' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'stronghold' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
	

	add_theme_support( 'custom-logo' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'stronghold_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * Add Additional image sizes
	 *
	 */

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'stronghold_recent-post-img', 380, 350, true);
	add_image_size( 'stronghold_service-img', 100, 100, true);
	add_image_size( 'stronghold-blog-full-width', 1200,350, true );
	add_image_size( 'stronghold-small-featured-image-width', 450,350, true );
	add_image_size( 'stronghold-blog-large-width', 800,350, true );
	add_image_size( 'stronghold-thumbnail-large', 400,200, true );
	add_image_size( 'stronghold-thumbnail-small', 130,90, true );
	add_image_size( 'stronghold-magazine_slider_thumbnail', 800,430, true );
	add_image_size( 'stronghold-highlighted-post', 550,300, true );

		// Define and register starter content to showcase the theme on new sites.
	$starter_content = array( 
		'widgets' => array(
		
			'top-left' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'text' , 
		        	// Widget $instance -> settings 
					array(
					  'text'  => '<ul><li><i class="fa fa-map-marker"></i>Street N1, 12345, Washington D.C</li></ul>'
					)
				)
			),

			// Put two core-defined widgets in the footer 2 area.
			'top-right' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'text' , 
		        	// Widget $instance -> settings 
					array(
					  'text'  => '<ul><li><a class="waves-effect waves-light rippler rippler-default" href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li><li><a class="waves-effect waves-light rippler rippler-default" href="http://plus.google.com/"><i class="fa fa-google-plus"></i></a></li><li><a class="waves-effect waves-light rippler rippler-default" href="http://www.instagram.com/"><i class="fa fa-instagram"></i></a></li><li><a class="waves-effect waves-light rippler rippler-default" href="http://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li><li><a class="waves-effect waves-light rippler rippler-default" href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li></ul>'
					)
				),
			),

			'footer' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'text' , 
		        	// Widget $instance -> settings 
					array(
					  'title' => 'StrongHold',
					  'text'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived.'
					)
				)
			),
			'footer-2' => array(
				// Widget ID
			    'archives'
			),
			'footer-3' => array(
				// Widget ID
			    'categories'
			),

			'footer-4' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'text' , 
		        	// Widget $instance -> settings 
					array(
					  'title' => 'Company Address',
					  'text'  => '<ul><li><i class="fa fa-map-marker"></i> Po Box CT16122 Colin Street West, Australia </li><li><i class="fa fa-phone"></i> +123 456 7890</li><li><i class="fa fa-fax"></i> 03 5481 2221</li><li><i class="fa fa-envelope"></i> <a href="mailto:info@gmail.com">info@gmail.com</a></li></ul>'
					)
				)
			),

		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home' => array(
				'post_type' => 'page',
			),
			'blog' => array(
				'post_type' => 'page',
			),
			/*'post-one' => array(
	            'post_type' => 'post',
	            'post_title' => __( 'Post One', 'stronghold'),
	            'post_content' => sprintf( __('<h1> Slider Setting </h1><p>You haven\'t created any slider yet. Create a post, set your slider image as Post\'s featured image ( Recommended image size 1280*450 ) ). Go to Customizer and click stronghold Options => Home and select Slider Post Category and No.of Sliders.<p><a href="%1$s"target="_blank"> Customizer </a></p>', 'stronghold'),  admin_url('customize.php') ),
	            'thumbnail' => '{{post-featured-image}}',
	        ),
	        'post-two' => array(
	            'post_type' => 'post',
	            'post_title' => __( 'Post Two', 'stronghold'),
	            'post_content' => sprintf( __('<h1> Slider Setting </h1><p>You haven\'t created any slider yet. Create a post, set your slider image as Post\'s featured image ( Recommended image size 1280*450 ) ). Go to Customizer and click stronghold Options => Home and select Slider Post Category and No.of Sliders.<p><a href="%1$s"target="_blank"> Customizer </a></p>', 'stronghold'),  admin_url('customize.php') ),
	            'thumbnail' => '{{post-featured-image}}',
	        ),  
			'service-one' => array(  
				'post_type' => 'page',
				'post_title' => __( 'Responsive Layout', 'stronghold'),
	            'post_content' => sprintf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click stronghold Options => Home => Service Section #1 and select page from  dropdown page list.','stronghold'), admin_url('customize.php') ),
				'thumbnail' => '{{page-images}}',
			),
			'service-two' => array(
				'post_type' => 'page',
				'post_title' => __( 'Awesome Slider', 'stronghold'),
	            'post_content' => sprintf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click stronghold Options => Home => Service Section #1 and select page from  dropdown page list.','stronghold'), admin_url('customize.php') ),
				'thumbnail' => '{{page-images}}',
			),
			'service-three' => array(
				'post_type' => 'page',
				'post_title' => __( 'Fully Customizable', 'stronghold'),
	            'post_content' => sprintf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click stronghold Options => Home => Service Section #1 and select page from  dropdown page list.','stronghold'), admin_url('customize.php') ),
				'thumbnail' => '{{page-images}}',
			),	*/		
		),

		// Create the custom image attachments used as post thumbnails for pages.
		/*'attachments' => array(
			'post-featured-image' => array( 
				'post_title' => __( 'slider one', 'stronghold' ),
				'file' => 'images/slider.png', // URL relative to the template directory.
			),
			'page-images' => array(
				'post_title' => __( 'Page Images', 'stronghold' ),
				'file' => 'images/page.png', // URL relative to the template directory.
			),
		), */

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),  

		// Set the front page section theme mods to the IDs of the core-registered pages.
		/*'theme_mods' => array( 
			'slider_cat' => '1',
			'service_1' => '{{service-one}}',
			'service_2' => '{{service-two}}',
			'service_3' => '{{service-three}}', 
		),*/

	);

	$starter_content = apply_filters( 'stronghold_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );

}
endif; // stronghold_setup
add_action( 'after_setup_theme', 'stronghold_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function stronghold_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'stronghold' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar Left', 'stronghold' ),
		'id'            => 'sidebar-left',
		'description'   => __( 'Left Sidebar', 'stronghold' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Top Left', 'stronghold' ),
		'id'            => 'top-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Top Right', 'stronghold' ),
		'id'            => 'top-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebars( 4, array(
		'name'          => __( 'Footer %d', 'stronghold' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Nav', 'stronghold' ),
		'id'            => 'footer-nav',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'stronghold_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/includes/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Free Theme upgrade page 
 */
require get_template_directory() . '/includes/theme_upgrade.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';
/**
 * Implement the Custom Header feature.
 */
require  get_template_directory()  . '/includes/custom-header.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load Theme Options Panel
 */
require get_template_directory() . '/admin/theme-options.php';

/**
 * Inline style ( Theme Options )
 */
require get_template_directory() . '/includes/styles.php';

/**
 * Load Filter and Hook functions
 */
require get_template_directory() . '/includes/hooks-filters.php';

/* Woocommerce support */

add_theme_support('woocommerce');
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content', 'stronghold_output_content_wrapper');


function stronghold_output_content_wrapper() {
	$woocommerce_sidebar = get_theme_mod('woocommerce_sidebar',true ) ;
	if( $woocommerce_sidebar ) {
        $woocommerce_sidebar_column = 'eleven';
    }else {
        $woocommerce_sidebar_column = 'sixteen';
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar');
    }
	echo '<div class="site-content container" id="content"><div id="primary" class="content-area '. $woocommerce_sidebar_column .' columns">';	
}

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
add_action( 'woocommerce_after_main_content', 'stronghold_output_content_wrapper_end' );

function stronghold_output_content_wrapper_end () {
	echo "</div>";
}

add_action( 'init', 'stronghold_remove_wc_breadcrumbs' );  
function stronghold_remove_wc_breadcrumbs() {
   	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

include_once( get_template_directory() . '/admin/theme-options.php' );


add_action('after_setup_theme', 'stronghold_rename_template');   

if( !function_exists('stronghold_rename_template') ) {
	function stronghold_rename_template() {
	   $args = array(
	        'post_type' => 'page',
	        'posts_per_page' => -1
	    );

	$template_query =  new WP_Query($args);

	if( $template_query->have_posts() ) {
	   	while ( $template_query->have_posts() ) :
	   	     $template_query->the_post(); 
	   	     $old_template_name = get_post_meta( get_the_ID(), '_wp_page_template', true );
	   	    // echo $old_template_name .'</br>';
	   	     switch ( $old_template_name ) {
	       	    	case 'page-full-width.php':
	       	    		$new_template_name = 'template-full-width.php';
	       	    		break;
	   	    		case 'page-leftsidebar.php':
	   	    		   $new_template_name = 'template-leftsidebar.php';
	   	    		   break;
	   	    		case 'page-rightsidebar.php':
	   	    		    $new_template_name = 'template-rightsidebar.php';
	   	    		    break;
	   	    		default:
	   	    		    $new_template_name = $old_template_name;
			}
			if( $old_template_name != $new_template_name) {	
			   update_post_meta( get_the_ID(), '_wp_page_template' ,$new_template_name ,$old_template_name );
			}
	     endwhile; // end of the loop. 
	}
	$template_query = null;
	wp_reset_postdata();
		
	}
}