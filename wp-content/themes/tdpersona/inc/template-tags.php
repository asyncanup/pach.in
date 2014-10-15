<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package tdpersona
 * @since tdpersona 1.0
 */

if ( ! function_exists( 'tdpersona_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since tdpersona 1.0
 */
function tdpersona_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = 'site-navigation paging-navigation';
	if ( is_single() )
		$nav_class = 'site-navigation post-navigation';

	?>
	<nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '<i class="fa fa-angle-double-left"></i>', 'Previous post link', 'tdpersona' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '<i class="fa fa-angle-double-right"></i>', 'Next post link', 'tdpersona' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav"><i class="fa fa-angle-double-left"></i></span> Older posts', 'tdpersona' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav"><i class="fa fa-angle-double-right"></i></span>', 'tdpersona' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif; // tdpersona_content_nav

if ( ! function_exists( 'tdpersona_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since tdpersona 1.0
 */
function tdpersona_posted_on() {
	if ( 'post' == get_post_type() )  {
		$categories_list = get_the_category_list( __( ', ', 'tdpersona' ) );
	} else {
		$categories_list = '';
	}

	if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
		ob_start();
		$comments_link = comments_popup_link( __( 'Leave a comment', 'tdpersona' ), __( '1 Comment', 'tdpersona' ), __( '% Comments', 'tdpersona' ) );
		$comments = ob_get_contents();
		ob_end_clean();

		$comment_sep = '<span class="sep"> / </span>';

	} else {
		$comments = '';
		$comment_sep = '';
	}

	printf( __( '
				<span class="author vcard">
					<a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a>
				</span>
				<span class="sep"> / </span>
				<span class="entry-comments">%5$s</span>
				', 'tdpersona' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all poems by %s', 'tdpersona' ), get_the_author() ) ),
		get_the_author(),
		$categories_list,
		$comments
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 *
 * @since tdpersona 1.0
 */
function tdpersona_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so _s_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so _s_categorized_blog should return false.
		return false;
	}
}

/**
 * Returns post date
 *
 * @since tdpersona 1.0
 */
 function tdpersona_post_date() {
 	$date_format = get_theme_mod( 'tdpersona_blog_date_format', 'mdy' );
 	$day = get_the_time('d');
 	$month = get_the_time('m');
 	$year = get_the_time('Y');

 	if( $date_format === 'dmy' ) {
 		$date_format_html = '<span class="m-d">'.$day.'/'.$month.'</span><span class="year">'.$year.'</span>';
 	} else {
		$date_format_html = '<span class="m-d">'.$month.'/'.$day.'</span><span class="year">'.$year.'</span>';
 	}

 	if ( get_post_format() === 'quote' ) {
 		$post_icon = '<i class="fa fa-quote-right"></i>';
 	} else if ( get_post_format() === 'aside' ) {
 		$post_icon = '<i class="fa fa-thumb-tack"></i>';
 	} else if ( get_post_format() === 'gallery' ) {
 		$post_icon = '<i class="fa fa-camera"></i>';
 	} else if ( get_post_format() === 'image' ) {
 		$post_icon = '<i class="fa fa-picture-o"></i>';
 	} else if ( get_post_format() === 'status' ) {
 		$post_icon = '<i class="fa fa-bullhorn"></i>';
 	} else if ( get_post_format() === 'video' ) {
 		$post_icon = '<i class="fa fa-film"></i>';
 	} else if ( get_post_format() === 'audio' ) {
 		$post_icon = '<i class="fa fa-music"></i>';
 	} else if ( get_post_format() === 'chat' ) {
 		$post_icon = '<i class="fa fa-comments-o"></i>';
 	} else if ( get_post_format() === 'link' ) {
 		$post_icon = '<i class="fa fa-link"></i>';
 	}  else {
 		$post_icon = '<i class="fa fa-pencil"></i>';
 	}

 	$output = '<div class="post-icon-box border-radius-circle">';
	$output .= '<a href="'.get_permalink().'">'.$post_icon.'</a>';
	$output .= '</div><!-- .post-icon-box -->';

	$output .= '<div class="entry-date">';
	$output .= '<a href="'.get_permalink().'">'.$date_format_html.'</a>';
	$output .= '</div><!-- .entry-date -->';

	echo $output;
 }

/**
 * Returns post date (Alternative)
 *
 * @since tdpersona 1.0
 */
function tdpersona_post_date_alt() {
	// Set up and print post meta information.
	printf( '<span class="entry-date-alt"><a href="%1$s" rel="bookmark"><time class="entry-date-time" datetime="%2$s">%3$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
}

/**
 * Flush out the transients used in tdpersona_categorized_blog
 *
 * @since tdpersona 1.0
 */
function tdpersona_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'tdpersona_category_transient_flusher' );
add_action( 'save_post', 'tdpersona_category_transient_flusher' );