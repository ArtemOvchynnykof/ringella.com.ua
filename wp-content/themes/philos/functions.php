<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0
 */

/**
 * Nileforest only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
load_theme_textdomain( 'philos', get_template_directory() . '/languages' );
function nileforest_setup() {
	/*
	 * Make theme available for translation.	
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'philos' to the name of your theme in all the template files.
	 */	
	load_theme_textdomain( 'philos', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'nileforest-featured-image', 1140, 500, true );

	add_image_size( 'nileforest-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 1140;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => esc_html__( 'Top Menu', 'philos' ),
		'social' => esc_html__( 'Social Links Menu', 'philos' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form','comment-list','gallery','caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside','image','video','quote','link','gallery','audio',
	) );
	
	add_theme_support( 'custom-background' ); 
	
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', nileforest_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array('text_business_info','search','text_about',),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array('text_business_info',),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array('text_about','search',),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'philos' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'philos' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'philos' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => esc_html__( 'Top Menu', 'philos' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => esc_html__( 'Social Links Menu', 'philos' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);
	
	$starter_content = apply_filters( 'nileforest_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'nileforest_setup' );

/**
 * add function for woocommerce support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
	//add woocommerce gallery Zoom
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nileforest_content_width() {

	$content_width = $GLOBALS['content_width'];	
	
	$content_width = 1140;
	
	$GLOBALS['content_width'] = apply_filters( 'nileforest_content_width', $content_width );
}
add_action( 'template_redirect', 'nileforest_content_width', 0 );

/**
 * Register custom fonts.
 */
function nileforest_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'philos' );	
	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		$font_families[] = 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);		
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function nileforest_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'nileforest-fonts', 'queue' ) && 'preconnect' === $relation_type ) {		
		$urls[] = array(
			'href' => '//fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'nileforest_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nileforest_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'philos' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'philos' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	
	//Footer Area First
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top Column Area 1', 'philos' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'philos' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
	//Footer Area Second
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top Column Area 2', 'philos' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'philos' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
	//Footer Area Third
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top Column Area 3', 'philos' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'philos' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
	//Footer Area Fourth
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top Column Area 4', 'philos' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'philos' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
	//Footer Area Fifth
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top Column Area 5', 'philos' ),
		'id'            => 'footer-5',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'philos' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
	//Footer Copyright Area
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom Column Area', 'philos' ),
		'id'            => 'footer-bottom',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'philos' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );	
}
add_action( 'widgets_init', 'nileforest_widgets_init' );


/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 */
function nileforest_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'nileforest_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function nileforest_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'nileforest_pingback_header' );

/**
 * Display custom color CSS.
 */
function nileforest_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo nileforest_custom_colors_css(); ?>
	</style>	
	
<?php }

add_action( 'wp_head', 'nileforest_colors_css_wrap' );
/**
 * Enqueue scripts and styles.
 */
function nileforest_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'nileforest-fonts', nileforest_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'nileforest-style', get_stylesheet_uri() );
	
	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'nileforest-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'nileforest-style' ), '1.0' );
		wp_style_add_data( 'nileforest-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'nileforest-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'nileforest-style' ), '1.0' );
	wp_style_add_data( 'nileforest-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'nileforest-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$nileforest_l10n = array(
		'quote'          => nileforest_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'nileforest-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$nileforest_l10n['expand']         = esc_html__( 'Expand child menu', 'philos' );
		$nileforest_l10n['collapse']       = esc_html__( 'Collapse child menu', 'philos' );
		$nileforest_l10n['icon']           = nileforest_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	wp_enqueue_script( 'nileforest-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'nileforest-skip-link-focus-fix', 'nileforestScreenReaderText', $nileforest_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/framework/css/bootstrap.css', array(), 'v4.0.0' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/framework/css/font-awesome.min.css', array(), 'v4.7.0');
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/framework/css/animate.css', array(), 'v3.5.1');
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/framework/css/owl.carousel.css', array(), 'v2.2.0');
	wp_enqueue_style( 'philos-styles', get_template_directory_uri() . '/framework/css/styles.css', array(), 'v1.0.0');
	wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/framework/css/nice-select.css', array(), 'v1.0.0');
	wp_enqueue_style( 'philos-theme', get_template_directory_uri() . '/framework/css/philos-theme.css', array(), 'v1.0.0');	
	wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/framework/css/woocommerce.css', array(),'v3.1.0');
	wp_enqueue_style( 'maxmegamenu', get_template_directory_uri() . '/framework/css/maxmegamenu.css', array(), 'v2.3.7.1');
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/framework/css/magnific-popup.css', array(), 'v1.0.0');
	
	//Add jQuery
	//default wordpress library 
	wp_enqueue_script('jquery-ui-tabs');	
	wp_enqueue_script( 'tether', get_template_directory_uri() . '/framework/js/tether.min.js', array(), 'v1.0.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/framework/js/bootstrap.min.js', array(), 'v4.0.0', true );	
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/framework/js/owl.carousel.js', array(), 'v2.2.0', true );
	wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/framework/js/jquery.nice-select.min.js', array(), 'v1.0.0', true );
	wp_enqueue_script( 'cookie', get_template_directory_uri() . '/framework/js/jquery.cookie.js', array(), 'v1.4.1', true );
	wp_enqueue_script( 'tipr', get_template_directory_uri() . '/framework/js/tipr.js', array(), 'v3.2.0', true );
	wp_enqueue_script( 'jpreLoader', get_template_directory_uri() . '/framework/js/jpreLoader.js', array(), 'v2.1.0', true );	
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/framework/js/isotope.pkgd.min.js', array(), 'v2.1.0', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/framework/js/imagesloaded.pkgd.min.js', array(), 'v3.2.2', true );	
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/framework/js/jquery.magnific-popup.js', array(), 'v1.0.0', true );	
	wp_enqueue_script( 'philos-custom', get_template_directory_uri() . '/framework/js/philos-custom.js', array(), 'v1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'nileforest_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Nileforest 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function nileforest_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 400px, 546px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'nileforest_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 * 
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function nileforest_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'nileforest_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function nileforest_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 400px, 546px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'nileforest_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function nileforest_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'nileforest_front_page_template' );

/*** Implement the Custom Header feature.*/
require_once (trailingslashit( get_template_directory() ).'inc/custom-header.php');

/*** Custom template tags for this theme.*/
require_once (trailingslashit( get_template_directory() ).'inc/template-tags.php');

/*** Additional features to allow styling of the templates.*/
require_once (trailingslashit( get_template_directory() ).'inc/template-functions.php');

/*** Customizer additions.*/
require_once (trailingslashit( get_template_directory() ).'inc/customizer.php');

/*** SVG icons functions and filters.*/
require_once (trailingslashit( get_template_directory() ).'inc/icon-functions.php');

/*** Add theme Framewrok */
get_template_part( '/framework/theme','framework');