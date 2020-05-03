<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package stronghold
 */

if ( ! function_exists( 'stronghold_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function stronghold_paging_nav() { 
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation clearfix" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'stronghold' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'stronghold' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'stronghold' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif; 
if ( ! function_exists( 'stronghold_entry_top_meta' ) ) : 
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function stronghold_entry_top_meta() {   
	// Post meta data 
	
	  $single_post_top_meta = get_theme_mod('single_post_top_meta', array(1,2,6) );
      // echo '<pre>',print_r($single_post_top_meta),'</pre>';
	
    if ( 'post' == get_post_type() ) {  
		foreach ($single_post_top_meta as $key => $value) {
		    if( $value == '1') { 
		    	global $post;?>
		  	    <span class="date-structure">				
					<span class="dd"><a class="url fn n" href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'),get_the_time('d')); ?>"><i class="fa fa-clock-o"></i><?php the_time('j M Y'); ?></a></span>		
				</span>
	<?php   }elseif( $value == 2) {
				printf(
					_x( '%s', 'post author', 'stronghold' ),
					'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
				);	
			}elseif( $value == 3)  {
				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
					echo ' <span class="comments-link"><i class="fa fa-comments"></i>';
					comments_popup_link( __( 'Leave a comment', 'stronghold' ), __( '1 Comment', 'stronghold' ), __( '% Comments', 'stronghold' ) );
					echo '</span>';
			    }
	        }elseif( $value == 4) {
				$categories_list = get_the_category_list( __( ', ', 'stronghold' ) );
				if ( $categories_list ) {
					printf( '<span class="cat-links"><i class="fa fa-folder-open"></i> ' . __( '%1$s ', 'stronghold' ) . '</span>', $categories_list );
				}	
		    }elseif( $value == 5)  {
	    		/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'stronghold' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links"><i class="fa fa-tags"></i> ' . __( '%1$s ', 'stronghold' ) . '</span>', $tags_list );
				}			
		    }elseif( $value == 6) {
		        edit_post_link( __( 'Edit', 'stronghold' ), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>' );
		    }
	    }
	}
}

endif;
if ( ! function_exists( 'stronghold_entry_bottom_meta' ) ) : 
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function stronghold_entry_bottom_meta() {   
	// Post meta data 
	
	$single_post_bottom_meta = get_theme_mod('single_post_bottom_meta', array(3,4,5) );

	if ( 'post' == get_post_type() ) {  
		foreach ($single_post_bottom_meta as $key => $value) {
		    if( $value == '1') { ?>
		  	    <span class="date-structure">				
					<span class="dd"><a class="url fn n" href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'),get_the_time('d')); ?>"><i class="fa fa-clock-o"></i><?php the_time('j M Y'); ?></a></span>	
				</span>
	<?php   }elseif( $value == 2) {
				printf(
					_x( '%s', 'post author', 'stronghold' ),
					'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
				);	
			}elseif( $value == 3)  {
				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
					echo ' <span class="comments-link"><i class="fa fa-comments"></i>';
					comments_popup_link( __( 'Leave a comment', 'stronghold' ), __( '1 Comment', 'stronghold' ), __( '% Comments', 'stronghold' ) );
					echo '</span>';
			    }
	        }elseif( $value == 4) {
				$categories_list = get_the_category_list( __( ', ', 'stronghold' ) );
				if ( $categories_list ) {
					printf( '<span class="cat-links"><i class="fa fa-folder-open"></i> ' . __( '%1$s ', 'stronghold' ) . '</span>', $categories_list );
				}	
		    }elseif( $value == 5)  {
	    		/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'stronghold' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links"><i class="fa fa-tags"></i> ' . __( '%1$s ', 'stronghold' ) . '</span>', $tags_list );
				}			
		    }elseif( $value == 6) {
		        edit_post_link( __( 'Edit', 'stronghold' ), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>' );
		    }
	    }
	}
}

endif;




function stronghold_posted_on() {   
	printf( __( '<span class="byline"> %1$s</span>', 'stronghold' ),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s"><i class="fa fa-user"></i>%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
	if ( ! post_password_required() && ( comments_open() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( '<i class="fa fa-comments"></i> Leave a comment', 'stronghold' ), __( '1 Comment', 'stronghold' ), __( '<i class="fa fa-comments"></i> % Comments', 'stronghold' ) ); ?></span>
	<?php
	endif;	
	edit_post_link( __( '<span class="edit-link"><i class="fa fa-pencil"></i> Edit</span>', 'stronghold' ), '', '' ); 
}

if ( ! function_exists( 'stronghold_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function stronghold_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'stronghold' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links"><i class="fa fa-folder-open"></i> ' . __( '%1$s ', 'stronghold' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'stronghold' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><i class="fa fa-tags"></i> ' . __( '%1$s ', 'stronghold' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"> ';
		comments_popup_link( __( 'Leave a comment', 'stronghold' ), __( '1 Comment', 'stronghold' ), __( '% Comments', 'stronghold' ) );
		echo '</span>';
	}
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function stronghold_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'stronghold_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'stronghold_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so stronghold_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so stronghold_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in stronghold_categorized_blog.
 */
function stronghold_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'stronghold_categories' );
}
add_action( 'edit_category', 'stronghold_category_transient_flusher' );
add_action( 'save_post',     'stronghold_category_transient_flusher' );

if ( ! function_exists( 'stronghold_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function stronghold_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'stronghold' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'stronghold' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="comment-meta">
				<div class="comments-avator">
					<div class="overlay"></div>
					<?php if ( 0 != $args['avatar_size'] ) { echo get_avatar( $comment, $args['avatar_size']=130); } ?>
				</div>
				<span class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '- %1$s at %2$s', '1: date, 2: time', 'stronghold' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'stronghold' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' ); ?>
				</span><!-- .comment-metadata -->
				<span class="comment-author vcard">
					<?php printf( __( '%s', 'stronghold' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</span><!-- .comment-author -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'stronghold' ); ?></p>
				<?php endif; ?>

			<div class="comment-content">
				<?php comment_text(); ?>
				<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<div class="reply"><i class="fa fa-reply"></i>',
						'after'     => '</div>',
					) ) );
				?>				
			</div><!-- .comment-content -->
			</div><!-- .comment-meta -->

		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for stronghold_comment()

// Recent Posts with featured Images to be displayed on home page
if( ! function_exists('stronghold_recent_posts') ) {
	function stronghold_recent_posts() {
		$output = '';
		$posts_per_page  = get_theme_mod('recent_posts_count', get_option('post_per_page') );
		$post_ID  = explode (',',get_theme_mod('recent_posts_exclude'));
		// WP_Query arguments
		$args = array (
			'post_type'              => 'post',
			'post_status'            => 'publish',
			'posts_per_page'         => 4,
			'ignore_sticky_posts'    => true,
			'order'                  => 'DESC',
			'post__not_in'           => $post_ID,
		);

		//'posts_per_page'         => $posts_per_page,

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			$output .= '<div class="post-wrapper">';
			$output .= '<h3>' . apply_filters('stronghold_latest_post_title',__('Latest Posts','stronghold') ). '</h3>';
			$output .= '<div class="latest-posts">';
			while ( $query->have_posts() ) {
				$query->the_post();
				$output .= '<div class="latest-post eight columns">';
					$output .= '<div class="latest-post-thumb eight columns">';
					if ( has_post_thumbnail() ) {
						$output .= get_the_post_thumbnail();
					}
					else {
						$output .= '<img src="' . get_template_directory_uri() . '/images/thumbnail-default.png" alt="" >';
					}
					$output .= '</div><!-- .latest-post-thumb -->';
					$output .= '<div class="latest-post-content eight columns">';
						$output .= '<h3><a href="'. get_permalink() . '">' . get_the_title() . '</a></h3>';
						$output .= '<p>' . get_the_excerpt() . '</p>';
						 $more_text = get_theme_mod('more_text');
							if( $more_text && !empty( $more_text ) ) { 
								$more_link_text = sprintf(__('%1$s','stronghold'), $more_text );   
							}else{
								$more_link_text = __('Read More','stronghold'); 
							}
						$output .= '<p><a href="' . get_permalink() . '" class="btn-readmore">' . $more_link_text .'</a></p>';
					$output .= '</div><!-- .latest-post-content -->';
				$output .= '</div><!-- .latest-post -->';
			}
			$output .= '<br class="clear"></div><!-- .latest-posts -->';
			$output .= '</div><!-- .post-wrapper -->';
		} 
		$query = null;
		// Restore original Post Data
		wp_reset_postdata();
		echo $output;
	}
}

/**
  * Generates Breadcrumb Navigation
  */
 
 if( ! function_exists( 'stronghold_breadcrumbs' )) {
 
	function stronghold_breadcrumbs() {
		/* === OPTIONS === */
		$text['home']     = __( '<i class="fa fa-home"></i>','stronghold' ); // text for the 'Home' link
		$text['category'] = __( 'Archive by Category "%s"','stronghold' ); // text for a category page
		$text['search']   = __( 'Search Results for "%s" Query','stronghold' ); // text for a search results page
		$text['tag']      = __( 'Posts Tagged "%s"','stronghold' ); // text for a tag page
		$text['author']   = __( 'Articles Posted by %s','stronghold' ); // text for an author page
		$text['404']      = __( 'Error 404','stronghold' ); // text for the 404 page

		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$breadcrumb_char = get_theme_mod( 'breadcrumb_char', '1' );
		if ( $breadcrumb_char ) {
		 switch ( $breadcrumb_char ) {
		 	case '2' :
		 		$delimiter = ' / ';
		 		break;
		 	case '3':
		 		$delimiter = ' > ';
		 		break;
		 	case '1':
		 	default:
		 		$delimiter = ' &raquo; ';
		 		break;
		 }
		}

		$before      = '<span class="current">'; // tag before the current crumb
		$after       = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post;
		$homeLink = home_url() . '/';
		$linkBefore = '<span typeof="v:Breadcrumb">';
		$linkAfter = '</span>';
		$linkAttr = ' rel="v:url" property="v:title"';
		$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

		if (is_home() || is_front_page()) {

			if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';

		} else {

			echo '<div id="crumbs" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;

			if ( is_category() ) {
				$thisCat = get_category(get_query_var('cat'), false);
				if ($thisCat->parent != 0) {
					$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					echo $cats;
				}
				echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

			} elseif ( is_search() ) {
				echo $before . sprintf($text['search'], get_search_query()) . $after;

			} elseif ( is_day() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
				echo $before . get_the_time('d') . $after;

			} elseif ( is_month() ) {
				echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
				echo $before . get_the_time('F') . $after;

			} elseif ( is_year() ) {
				echo $before . get_the_time('Y') . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
					if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, $delimiter);
					if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
					$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
					$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
					echo $cats;
					if ($showCurrent == 1) echo $before . get_the_title() . $after;
				}

			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;

			} elseif ( is_attachment() ) {
				$parent = get_post($post->post_parent);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
				printf($link, get_permalink($parent), $parent->post_title);
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

			} elseif ( is_page() && !$post->post_parent ) {
				if ($showCurrent == 1) echo $before . get_the_title() . $after;

			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

			} elseif ( is_tag() ) {
				echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

			} elseif ( is_author() ) {
		 		global $author;
				$userdata = get_userdata($author);
				echo $before . sprintf($text['author'], $userdata->display_name) . $after;

			} elseif ( is_404() ) {
				echo $before . $text['404'] . $after;
			}

			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo __('Page', 'stronghold' ) . ' ' . get_query_var('paged');
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
			}

			echo '</div>';

		}
	} // end stronghold_breadcrumbs()

}

function stronghold_author() {
	$byline = sprintf(
		_x( '%s', 'post author', 'stronghold' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
	);	

	echo $byline;
}
function stronghold_get_author() {
	$byline = sprintf(
		_x( '%s', 'post author', 'stronghold' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span>'
	);	

	return $byline; 
}

if ( ! function_exists( 'stronghold_post_date' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function stronghold_post_date() {
	printf( __( '%1$s', 'stronghold' ),
		sprintf( '%1$s<span>%2$s</span>',
			get_the_time('j'),
			get_the_time('M')
		)
	);
}
endif;

if ( ! function_exists( 'stronghold_posts_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function stronghold_posts_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'stronghold' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav"><span>&lsaquo;</span></span> Older posts', 'stronghold' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav"><span>&rsaquo;</span></span>', 'stronghold' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


if( ! function_exists( 'stronghold_pagination' )) {
	/**
	 * Generates Pagination without WP-PageNavi Plugin
	 */
	
	function stronghold_pagination($before = '', $after = '') {
		global $wpdb, $wp_query;
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		if ( $numposts <= $posts_per_page ) { return; }
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = 7;
		$pages_to_show_minus_1 = $pages_to_show-1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		echo $before.'<nav class="page-navigation navigation pagination"><ol class="webulous_page_navi clearfix">'."";
		if ($start_page >= 2 && $pages_to_show < $max_page) {
			$first_page_text = __( "First", 'stronghold' );
			echo '<li class="bpn-first-page-link"><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
		}
		echo '<li class="bpn-prev-link">';
		previous_posts_link('&laquo;');
		echo '</li>';
		for($i = $start_page; $i  <= $end_page; $i++) {
			if($i == $paged) {
				echo '<li class="bpn-current">'.$i.'</li>';
			} else {
				echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
			}
		}
		echo '<li class="bpn-next-link">';
		next_posts_link('&raquo;');
		echo '</li>';
		if ($end_page < $max_page) {
			$last_page_text = __( "Last", 'stronghold' );
			echo '<li class="bpn-last-page-link"><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
		}
		echo '</ol></nav>'.$after."";
	}
}

if ( ! function_exists( 'stronghold_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function stronghold_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'stronghold' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav"><span>&lsaquo;</span></span> %title', 'Previous post link', 'stronghold' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title <span class="meta-nav"><span>&rsaquo;</span></span>', 'Next post link',     'stronghold' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

// Related Posts Function (call using stronghold_related_posts(); ) /NecessarY/ May be write a shortcode?
	function stronghold_related_posts() {
		echo '<ul id="webulous-related-posts">';
		global $post;
		$tags = wp_get_post_tags($post->ID);
		$tag_arr = '';
		if($tags) {
			foreach($tags as $tag) { $tag_arr .= $tag->slug . ','; }
	        $args = array(
	        	'tag' => $tag_arr,
	        	'numberposts' => 5, /* you can change this to show more */
	        	'post__not_in' => array($post->ID)
	     	);
	        $related_posts = get_posts($args);
	        if($related_posts) {
	        	foreach ($related_posts as $post) : setup_postdata($post); ?>
		           	<li class="related_post">
		           		<a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('recent-work'); ?></a>
		           		<a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		           	</li>
		        <?php endforeach; }
		    else {
	            echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'stronghold' ) . '</li>'; 
			 }
		}else{
			echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'stronghold' ) . '</li>';
		}
		wp_reset_query();
		
		echo '</ul>';
	}
	/*  Site Layout Option  */
if( !function_exists('stronghold_layout_class') ) {   
	function stronghold_layout_class() {
		if( is_home() &&  ( get_theme_mod('blog_layout',1) == 3 ||  get_theme_mod('blog_layout',1) == 5) ) {
	       echo 'sixteen';
	       return;
		}
	     $sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); 
		     if( 'fullwidth' == $sidebar_position ) {
		     	echo 'sixteen';
		     }elseif('two-sidebar' == $sidebar_position || 'two-sidebar-left' == $sidebar_position || 'two-sidebar-right' == $sidebar_position ) {
		     	echo 'eight';
		     }
		     else{
		     	echo 'eleven';
		     }
		     if ( 'no-sidebar' == $sidebar_position ) { 
		     	echo ' no-sidebar';
		     }
	}
}

/* Two Sidebar Left action */ 

add_action('stronghold_two_sidebar_left','stronghold_double_sidebar_left');   
if( !function_exists('stronghold_double_sidebar_left') ) { 
 function stronghold_double_sidebar_left() {
    $sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); 
		if( 'two-sidebar' == $sidebar_position || 'two-sidebar-left' == $sidebar_position ) :
			 get_sidebar('left'); 
		endif; 
		if('two-sidebar-left' == $sidebar_position || 'left' == $sidebar_position ):
			get_sidebar(); 
		endif; 
 }	
}

/* Two Sidebar Right action */     

 add_action('stronghold_two_sidebar_right','stronghold_double_sidebar_right'); 	
if( !function_exists('stronghold_double_sidebar_right') ) { 
  function stronghold_double_sidebar_right() {
  	 $sidebar_position = get_theme_mod( 'sidebar_position', 'right' ); 
		 if( 'two-sidebar' == $sidebar_position || 'two-sidebar-right' == $sidebar_position || 'right' == $sidebar_position) :
			 get_sidebar(); 
		endif; 	
		if('two-sidebar-right' == $sidebar_position ):
			get_sidebar('left'); 
		endif; 
 }
}


add_action('stronghold_single_flexslider_featured_image','stronghold_single_flexslider_featured_image_top');
if( !function_exists('stronghold_single_flexslider_featured_image_top') ) { 
	function stronghold_single_flexslider_featured_image_top() {
		$single_featured_image = get_theme_mod( 'single_featured_image',true );
		$single_featured_image_size = get_theme_mod ('single_featured_image_size',1);
		if( $single_featured_image && $single_featured_image_size == 3 ) {
		    if( has_post_thumbnail() && ! post_password_required() ) :   
				the_post_thumbnail( 'stronghold-blog-full-width', array('class' => "single_page_flexslider_feature_image") ); 
			endif;
		}
	}
}


add_action('stronghold_single_page_flexslider_featured_image','stronghold_single_page_flexslider_featured_image_top');
if( !function_exists('stronghold_single_page_flexslider_featured_image_top') ) { 
	function stronghold_single_page_flexslider_featured_image_top() {
		$single_page_featured_image = get_theme_mod( 'single_page_featured_image',true );
		$single_page_featured_image_size = get_theme_mod ('single_page_featured_image_size',1);
		if( $single_page_featured_image && $single_page_featured_image_size == 2) {
		    if( has_post_thumbnail() && ! post_password_required() ) :   
				the_post_thumbnail( 'stronghold-blog-full-width', array('class' => "single_page_flexslider_feature_image") ); 
			endif;
		}
	}
}		

/* stronghold Custom Logo */

add_filter( 'get_custom_logo', 'stronghold_custom_logo' );
if( !function_exists('stronghold_custom_logo') ) { 
	function stronghold_custom_logo($html) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo = get_theme_mod( 'logo', '' );
		echo '<h1 class="site-title img-logo">';
		if(!$custom_logo_id && $logo!= '') {	
		    echo '<img src="'.$logo.'">';
		}else{
			echo $html;
		}
		echo '<h1>';
	}
}

if( !function_exists('stronghold_masonry_blog_layout_class') ) { 
	function stronghold_masonry_blog_layout_class() {
		if( is_home() && get_theme_mod('blog_layout',1) == 4 ||  get_theme_mod('blog_layout',1) == 5 ) {
			echo 'masonry-blog-content';
		}
	}
}

if( ! function_exists( 'stronghold_featured_image' ) ) {
	function stronghold_featured_image() {
		$featured_image_size = get_theme_mod ('featured_image_size', 1);
		if ( has_post_thumbnail() && ! post_password_required() ) :
			if( $featured_image_size == 1 ) :
				the_post_thumbnail('stronghold-blog-full-width');
			elseif( $featured_image_size == 2 ) :
				the_post_thumbnail('stronghold-small-featured-image-width');
			elseif( $featured_image_size == 3 ) :
				the_post_thumbnail('full');
			elseif( $featured_image_size == 4 ) :
				the_post_thumbnail('medium');
			elseif( $featured_image_size == 5 ) :
				the_post_thumbnail('large');
			endif;
		endif;
	}
}

if( !function_exists('stronghold_magazine_page_primary_class') ) { 
	function stronghold_magazine_page_primary_class() {
		$magazine_page_sidebar = get_theme_mod('magazine_sidebar',false);
        if( $magazine_page_sidebar ) {
        	echo 'sixteen';
        }else{
        	echo 'eleven';
        }
	}
}

/* Page site style class ( layout )*/

if( !function_exists('stronghold_site_style_class') ) { 
	function  stronghold_site_style_class(){
       $site_style = get_theme_mod('site-style');
	    if( $site_style == 'boxed' )  { 
		  $site_style_class = 'container boxed-container';
		}elseif( $site_style == 'fluid' ){
	       $site_style_class = 'fluid-container';	 
		}
		else{
			 $site_style_class = '';
		} 
		return $site_style_class; 
	}
}

/* Page site style header class ( layout )*/

if( !function_exists('stronghold_site_style_header_class') ) { 
	function  stronghold_site_style_header_class(){
        $site_style = get_theme_mod('site-style');
	    if( $site_style == 'boxed' )  { 
		  $site_style_header_class = 'boxed-header';
		}elseif( $site_style == 'fluid' ){
	       $site_style_header_class = 'fluid-header';
		}
		else{
			 $site_style_header_class = '';
		} 
		return $site_style_header_class;
	}
}

add_action('stronghold_sidebar_right_widget','stronghold_sidebar_right_widget');
if( !function_exists('stronghold_sidebar_right_widget') ) { 
	function stronghold_sidebar_right_widget() {
		    if (  is_active_sidebar( 'sidebar-1' ) ) {
				 dynamic_sidebar('sidebar-1');
			}else { ?>
				<aside id="meta" class="widget">
					<h4 class="widget-title"><?php _e( 'Meta', 'stronghold' ); ?></h4>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
		        </aside><?php 
		   }  
	}
}



/* Admin notice */
/* Activation notice */
add_action( 'load-themes.php',  'stronghold_one_activation_admin_notice'  );

if( !function_exists('stronghold_one_activation_admin_notice') ) {
	function stronghold_one_activation_admin_notice() {
        global $pagenow;
	    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
	        add_action( 'admin_notices', 'stronghold_admin_notice' );
	    } 
	} 
}    

/**
 * Add admin notice when active theme
 *
 * @return bool|null
 */
function stronghold_admin_notice() { ?>
    <div class="updated notice notice-alt notice-success is-dismissible">  
        <p><?php printf( __( 'Welcome! Thank you for choosing %1$s! To fully take advantage of the best our theme can offer please make sure you visit our <a href="%2$s">Welcome page</a>', 'stronghold' ), 'StrongHold', esc_url( admin_url( 'themes.php?page=stronghold_upgrade' ) ) ); ?></p>
    	<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=stronghold_upgrade' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with StrongHold', 'stronghold' ); ?></a></p>
    </div><?php
}