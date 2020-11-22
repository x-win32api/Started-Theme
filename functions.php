<?php
/**
 * Started functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Started
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'started_setup' ) ) :

	set_post_thumbnail_size(460,300,TRUE);

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function started_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Started, use a find and replace
		 * to change 'started' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'started', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'started' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'started_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'started_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function started_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'started_content_width', 640 );
}
add_action( 'after_setup_theme', 'started_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function started_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'started' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'started' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'started_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function started_scripts() {
	wp_enqueue_style( 'started-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'started-style', 'rtl', 'replace' );

	wp_enqueue_script( 'started-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
//add_action( 'wp_enqueue_scripts', 'started_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/ajax.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
//	require get_template_directory() . '/inc/jetpack.php';
}




// шаблон вывода комментариев

function mytheme_comment($comment, $args, $depth){
    $GLOBALS['comment'] = $comment; ?>
 
<div class="comment-block">  
		  
		
		<div class="comment-autor">
					<?php printf(__('<div class="comment-autor-name">%s</cite> '),  get_comment_author()) ?>
		</div>
  
		  
	<?php if ($comment->comment_approved == '0') : ?>

	<em><?php _e('Your comment is awaiting moderation.') ?></em>
	<br/>
	<?php endif; ?>
  
 
		<div class="comment-content">  
			<div class="comment-content-text">
				<?php comment_text() ?>
			</div>				
			<div class="reply-data-wrapper">
				<div class="comment-meta commentmetadata">
					<?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?>
					<?php edit_comment_link(__('(Edit)'),'  ','') ?>
				</div>  

				<div class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>   
			</div>
		</div>	

</div>  
		
  <?php }