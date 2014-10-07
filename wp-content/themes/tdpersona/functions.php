<?php
/**
 * tdpersona functions and definitions
 *
 * @package tdpersona
 * @since tdpersona 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since tdpersona 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 600; /* pixels */

if ( ! function_exists( 'tdpersona_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since tdpersona 1.0
 */
function tdpersona_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable support for Custom Background
	 */
	add_theme_support( 'custom-background', apply_filters( 'tdpersona_custom_background_args', array(
		'default-color' => 'fbfbfb',
		'default-image' => '',
	) ) );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tdpersona' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'audio', 'gallery', 'image', 'video', 'quote', 'link', 'aside', 'status', 'chat' ) );
}
endif; // tdpersona_setup
add_action( 'after_setup_theme', 'tdpersona_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since tdpersona 1.0
 */
function tdpersona_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Sidebar', 'tdpersona' ),
		'id' => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget #1', 'tdpersona' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget #2', 'tdpersona' ),
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget #3', 'tdpersona' ),
		'id' => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

}
add_action( 'widgets_init', 'tdpersona_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function tdpersona_scripts() {
	wp_enqueue_style( 'tdpersona-googlefonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' );
	wp_enqueue_style( 'tdpersona-icons', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'tdpersona-framework', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

	wp_enqueue_script( 'tdpersona-js-assets', get_template_directory_uri() . '/js/jquery.assets.js', array( 'jquery' ), '201401', true  );
	wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/tdpersona.js', array( 'jquery' ), '201301', true  );

}
add_action( 'wp_enqueue_scripts', 'tdpersona_scripts' );

/**
 *	Custom style/script to website head
 *	@since tdpersona 1.0
 */
function tdpersona_head() {
	?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri() ?>/js/html5.js"></script>
	<script src="<?php echo get_template_directory_uri() ?>/js/respond.min.js"></script>
	<![endif]-->
	<?php
}
add_action('wp_head', 'tdpersona_head');

/**
 *	Customize excerpts more tag
 *	@since tdpersona 1.0
 */
function tdpersona_excerpt_more($more) {
    global $post;
	return '... <a class="moretag" href="'. get_permalink($post->ID) . '"> <strong>Read More</strong></a>';
}
add_filter('excerpt_more', 'tdpersona_excerpt_more');

/**
*	Add class to excerpt paragraph
*	@since tdpersona 1.0
*/
function tdpersona_add_class_to_excerpt( $excerpt ) {
    return str_replace('<p', '<p class="excerpt"', $excerpt);
}
add_filter( "the_excerpt", "tdpersona_add_class_to_excerpt" );

/**
 *	Remove Gallery Inline Styling
 *	@since tdpersona 1.0
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
*	Add standart post format to archive
*	@since tdpersona 1.0
*/
function tdpersona_add_format_standard_archive($query) {
	if (isset($query->query_vars['post_format']) &&
		$query->query_vars['post_format'] == 'post-format-standard') {
		if (($post_formats = get_theme_support('post-formats')) &&
			is_array($post_formats[0]) && count($post_formats[0])) {
			$terms = array();
			foreach ($post_formats[0] as $format) {
				$terms[] = 'post-format-'.$format;
			}
			$query->is_tax = null;
			unset($query->query_vars['post_format']);
			unset($query->query_vars['taxonomy']);
			unset($query->query_vars['term']);
			unset($query->query['post_format']);
			$query->set('tax_query', array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'post_format',
					'terms' => $terms,
					'field' => 'slug',
					'operator' => 'NOT IN'
				)
			));
		}
	}
}
add_action('pre_get_posts', 'tdpersona_add_format_standard_archive');


/* PACH: CUSTOM CODE */

/* Enable custom CSS for login page */
function custom_login_css() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/login-styles.css" />';
}
add_action('login_head', 'custom_login_css');

/* Link to self from logo on login page */
function my_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url_title() {
	return 'Poetry And Cheap Humor';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/* Always redirect to home page */
function admin_login_redirect( $redirect_to, $request, $user ) {
	return home_url();
}
add_filter("login_redirect", "admin_login_redirect", 10, 3);

/* Check Remember Me by default */
function login_checked_remember_me() {
    add_filter( 'login_footer', 'rememberme_checked' );
}
add_action( 'init', 'login_checked_remember_me' );

function rememberme_checked() {
    echo "<script>jQuery('#rememberme').prop('checked', true), jQuery('#registerform br.clear').remove()</script>";
}

