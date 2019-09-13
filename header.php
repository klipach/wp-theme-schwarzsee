<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>"/>
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen"/>
	<?php wp_head(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="referrer" content="origin"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<nav class="menu__wrapper" role="navigation">
		<input type="checkbox" />
		<span></span>
		<span></span>
		<span></span>
		<div class="menu__logo">schwarzsee</div>
		<?php wp_nav_menu(['theme_location' => '', 'container' => '' , 'menu_class' => 'menu' ]); ?>
	</nav>
	<div id="content" class="site-content">

