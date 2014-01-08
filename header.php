<!doctype html>
<!--



	 .oooooo..o           oooo   o8o     oooooooooo.
	d8P'    `Y8           `888   `"'     `888'   `Y8b
	Y88bo.       .ooooo.   888  oooo      888      888  .ooooo.   .ooooo.
	 `"Y8888o.  d88' `88b  888  `888      888      888 d88' `88b d88' `88b
	     `"Y88b 888   888  888   888      888      888 888ooo888 888   888
	oo     .d8P 888   888  888   888      888     d88' 888    .o 888   888
	8""88888P'  `Y8bod8P' o888o o888o    o888bood8P'   `Y8bod8P' `Y8bod8P'



			  .oooooo.    oooo                      o8o
			 d8P'  `Y8b   `888                      `"'
			888            888   .ooooo.  oooo d8b oooo   .oooo.
			888            888  d88' `88b `888""8P `888  `P  )88b
			888     ooooo  888  888   888  888      888   .oP"888
			`88.    .88'   888  888   888  888      888  d8(  888
			 `Y8bood8P'   o888o `Y8bod8P' d888b    o888o `Y888""8o

-->

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
	<div class="master-wrap">

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

	<div class="wrap clearfix content-wrapper">
		<?php if (function_exists (journey_slideshow) && is_front_page()) {
			journey_slideshow ();

			echo '<div class="home-widgets">';
				dynamic_sidebar('home_widgets');
			echo "</div>";
		}?>




