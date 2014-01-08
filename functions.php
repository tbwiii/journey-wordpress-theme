<?php

	add_action( 'admin_init', 'tw_admin_setup' );

	function tw_admin_setup () {
		add_settings_field(
				'location-name',
				'Location Name',
				'tw_location_setting',
				'general'
		);

		 register_setting(
			'general',
			'location_name'
		);
	}

	function tw_location_setting () {
		$location = get_option( 'location_name' );
		?>

			<input type="text" name="location_name" placeholder="No Location Set" value="<?php echo $location ?>">
		<?php

	}

/* =CUSTOMIZATION */

	add_image_size( 'full', 960, 400, 1 );

	// Post thumbnails

		add_theme_support( 'post-thumbnails' );


/* =SCRIPTS: Queue support scripts to be included in wp_head() */

	add_action('wp_enqueue_scripts', 'journey_enqueue_scripts');
	function journey_enqueue_scripts() {
		$scripts = array(
			array(
				'handle' => 'modernizr',
				'src' => get_template_directory_uri() . '/scripts/modernizr-2.0.6.min.js',
				'deps' => array('jquery'),
				'ver' => false,
				'in_footer' => false
			),
			array(
				'handle' => 'selectivizr',
				'src' => get_template_directory_uri() . '/scripts/selectivizr.js',
				'deps' => array('jquery'),
				'ver' => false,
				'in_footer' => false
			),
			array(
				'handle' => 'css3-mediaqueries',
				'src' => get_template_directory_uri() . '/scripts/css3-mediaqueries.js',
				'deps' => array('jquery'),
				'ver' => false,
				'in_footer' => false
			),
			array(
				'handle' => 'hoverIntent',
				'src' => get_template_directory_uri() . '/scripts/jquery.hoverIntent.minified.js',
				'deps' => array('jquery'),
				'ver' => false,
				'in_footer' => true
			),
			array(
				'handle' => 'journey',
				'src' => get_template_directory_uri() . '/scripts/journey_scripts.js',
				'deps' => array('jquery'),
				'ver' => false,
				'in_footer' => true
			)
		);
		foreach ( $scripts as $script ) {
			wp_enqueue_script(
				$script['handle'],
				$script['src'],
				$script['deps'],
				$script['ver'],
				$script['in_footer']
			);
		}
	}

	add_action('wp_enqueue_scripts', 'journey_enqueue_styles');
	function journey_enqueue_styles () {
		$styles = array (
			array(
				'handle' => 'fonts',
				'src' => 'http://fonts.googleapis.com/css?family=Lato:300:400|Open+Sans',
				'deps' => array(),
				'ver' => false,
				'media' => 'screen'
			),
			array(
				'handle' => 'styles',
				'src' =>  get_template_directory_uri() . '/styles/style.css',
				'deps' => array('fonts'),
				'ver' => false,
				'media' => 'screen'
			)
		);
		foreach ( $styles as $style ) {
			wp_enqueue_style(
				$style['handle'],
				$style['src'],
				$style['deps'],
				$style['ver'],
				$style['media']
			);
		}

	}

/* =MENUS: Theme locations */

	$menus = array(
		'main' => 'Main Menu',
		'footer' => 'Footer Menu'
	);
	register_nav_menus( $menus );

/* =SIDEBARS */

	// Define and register sidebars to be available

		function spm_get_sidebars() {
			$sidebars = array(
				array(
					'key' => 'home_widgets',
					'name' => 'Home Widgets',
					'description' => 'Home page widgets'

				),
				array(
					'key' => 'sidebar',
					'name' => 'Sidebar',
					'description' => 'The main widget area'

				),
				array(
					'key' => 'footer',
					'name' => 'Footer Widgets',
					'description' => 'Widgets at the bottom of the page'
				)
			);
			return $sidebars;
		}

		$sidebars = spm_get_sidebars();
		foreach ( $sidebars as $sidebar ) {
			register_sidebar(array(
				'id' => $sidebar['key'],
				'name' => $sidebar['name'],
				'description' => $sidebar['description'],
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>',
			));
		}

	// Process [shortcodes] in the default text widget

		add_filter('widget_text', 'do_shortcode');


	// Options panel

		add_action('admin_menu', 'journey_slide_boxes');
		function journey_slide_boxes() {
			add_meta_box( 'journey_slide_options', __('Slide Options'), 'spm_slide_options', 'spm_slide', 'side', 'high' );
		}
		function journey_slide_options() {
			global $post;
			$_options = get_post_meta($post->ID, '_options', true);
			?>
			<p>
				<label>URL: <input type="text" id="_options-url" name="_options[url]" value="<?php echo $_options['url']; ?>" style="width: 100%;" /></label><br>
				<label><input type="checkbox" id="_options-target" name="_options[target]" <?php echo ($_options['target']) ? 'checked' : ''; ?> value="_blank" /> Open in a new window</label>
			</p> -->
			<?php
		}
?>
