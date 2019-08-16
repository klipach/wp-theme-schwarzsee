<?php

/*-----------------------------------------------------------------------------------*/
/*	Main theme setup
/*-----------------------------------------------------------------------------------*/

function schwarzsee_setup() {
	load_theme_textdomain( 'schwarzsee', get_template_directory() . '/languages' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'main' => __( 'Main Menu' ),
		)
	);

	add_editor_style('css/editor.css');
}

add_action( 'after_setup_theme', 'schwarzsee_setup' );

/*-----------------------------------------------------------------------------------*/
/*	Add theme css files
/*-----------------------------------------------------------------------------------*/

function schwarzsee_enqueue_styles()
{
	// register our stylesheets
	wp_register_style('main', get_template_directory_uri() . '/css/styles.css');
	wp_register_style('menu', get_template_directory_uri() . '/css/menu.css');

	// enqueue our stylesheets
	wp_enqueue_style('main');
	wp_enqueue_style('menu');
}

add_action('wp_enqueue_scripts', 'schwarzsee_enqueue_styles');

/*-----------------------------------------------------------------------------------*/
/*	Add custom logo to admin login form
/*-----------------------------------------------------------------------------------*/

function schwarzsee_login_stylesheet()
{
	wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/login.css' );
}

add_action( 'login_enqueue_scripts', 'schwarzsee_login_stylesheet' );


function schwarzsee_add_robots_txt($text)
{
	$text .= "Disallow: /wp/\n";
	$text .= "Disallow: /wp-trackback\n";
	$text .= "Disallow: /wp-feed\n";
	$text .= "Disallow: /wp-comments\n";
	$text .= "Disallow: /category/\n";
	$text .= "Disallow: /author/\n";
	$text .= "Disallow: /page/\n";
	$text .= "Disallow: /tag/\n";
	$text .= "Disallow: /feed/\n";
	$text .= "Disallow: */feed\n";
	$text .= "Disallow: */trackback\n";
	$text .= "Disallow: */comments\n";
	$text .= "Disallow: /*?\n";
	$text .= "Disallow: /*?*\n";
	$text .= "Disallow: /*.php\n";
	$text .= "Allow: /wp/wp-includes/js/*/*.js*\n";
	$text .= "Allow: /wp/wp-includes/js/*.js*\n";
	$text .= "Allow: /wp/wp-includes/css/*/*.css*\n";
	$text .= "Host: " . get_bloginfo( 'url' ) . "\n";

	return $text;
}

add_filter( 'robots_txt', 'schwarzsee_add_robots_txt', 10);

/*-----------------------------------------------------------------------------------*/
/* Remove unnecessary elements in <head>. Tags description http://www.wordpressplugins.ru/faq/remove-wphead.html
/*-----------------------------------------------------------------------------------*/
remove_action( 'wp_head', 'feed_links_extra', 3);
remove_action( 'wp_head', 'feed_links', 2);
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10);
remove_action( 'wp_head', 'start_post_rel_link', 10);
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10); // remove prev/next
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7);
remove_action( 'wp_head', 'rest_output_link_wp_head', 10);
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'template_redirect', 'rest_output_link_header', 11 ); // remove response header - Link rel='https //api.w.org/'
remove_action( 'template_redirect', 'wp_shortlink_header', 11); // remove shortlink
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10); // remove shortlink
add_filter( 'aioseop_prev_link', '__return_empty_string' ); //remove prev/next for all in one SEO
add_filter( 'aioseop_next_link', '__return_empty_string' ); //remove prev/next for all in one SEO
add_filter( 'emoji_svg_url', '__return_false' ); // remove rel='dns-prefetch' href='//s.w.org'
