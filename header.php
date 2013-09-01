<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<title><?php wp_title('&lsaquo;', true, 'right'); ?></title>

	<link href="<?php bloginfo('stylesheet_directory'); ?>/style.css" rel="stylesheet" type="text/css" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<nav class="main-menu">
		<?php if ( has_nav_menu( 'main' ) ) wp_nav_menu( array('theme_location' => 'main','container' => '', 'menu_class' => '') ); ?>
	</nav>
	<header class="main clearfix">
		<a class="toggle-menu" href="#"> </a>
		<a href="<?php bloginfo("url") ?>" class="mobile-logo">
			<img class="cross" src="<?php bloginfo("template_url") ?>/images/mobile_cross.png" alt="">
			<img class="name" src="<?php bloginfo("template_url") ?>/images/mobile_name.png" alt="">
		</a>
		<a class="logo" href="<?php bloginfo("url") ?>">
			<img src="<?php bloginfo("template_url") ?>/images/logo.png" alt="The Journey">
		</a>

		<div class="church-name">
			<div><span><?php echo get_option( 'location_name' ) ?></span></div>
		</div>
	</header>

	<div class="wrap clearfix">
		<?php if (function_exists (journey_slideshow) && is_front_page()) {
			journey_slideshow ();
		}?>




