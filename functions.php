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

	// Post thumbnails

		add_theme_support( 'post-thumbnails' );


/* =SCRIPTS: Queue support scripts to be included in wp_head() */

	add_action('wp_enqueue_scripts', 'spm_enqueue_scripts');
	function spm_enqueue_scripts() {
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
					'key' => 'sidebar',
					'name' => 'Sidebar',
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

		add_action('admin_menu', 'spm_slide_boxes');
		function spm_slide_boxes() {
			add_meta_box( 'spm_slide_options', __('Slide Options'), 'spm_slide_options', 'spm_slide', 'side', 'high' );
		}
		function spm_slide_options() {
			global $post;
			$_options = get_post_meta($post->ID, '_options', true);
			?>
			<p>
				<label>URL: <input type="text" id="_options-url" name="_options[url]" value="<?php echo $_options['url']; ?>" style="width: 100%;" /></label><br>
				<label><input type="checkbox" id="_options-target" name="_options[target]" <?php echo ($_options['target']) ? 'checked' : ''; ?> value="_blank" /> Open in a new window</label>
			</p> -->
			<?php
		}



/* =OPTIONS */

/* =TEMPLATES / SNIPPETS */

	/* Blank Post Type
	register_post_type('post_type',
		array(
			'labels' => array(
				'name' => __('Posts'),
				'singular_name' => __('Post'),
				'add_new_item' => __('Add New Post'),
				'edit_item' => __('Edit Post'),
				'new_item' => __('New Post'),
				'view_item' => __('View Post'),
				'search_items' => __('Search Posts'),
				'not_found' => __('No posts found'),
				'not_found_in_trash' => __('No posts found in Trash')
			),
			'public' => true,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes')
		)
	);
	*/

	/* Blank Taxonomy (Category)
	register_taxonomy('taxonomy', 'post_type',
		array(
			'hierarchical' => true,
			'labels' => array(
				'name' => __('Categories'),
				'singular_name' => __('Category'),
				'search_items' =>  __('Search Categories'),
				'popular_items' => __('Popular Categories'),
				'all_items' => __('All Categories'),
				'parent_item' => __('Parent Category'),
				'parent_item_colon' => __('Parent Category:'),
				'edit_item' => __('Edit Category'),
				'update_item' => __('Update Category'),
				'add_new_item' => __('Add New Category'),
				'new_item_name' => __('New Category')
			),
			'show_ui' => true,
			'query_var' => true
		)
	);
	*/

	/* Blank Taxonomy (Tag)
	register_taxonomy('taxonomy', 'post_type',
		array(
			'hierarchical' => false,
			'labels' => array(
				'name' => __('Tags'),
				'singular_name' => __('Tag'),
				'search_items' =>  __('Search Tags'),
				'popular_items' => __('Popular Tags'),
				'all_items' => __('All Tags'),
				'parent_item' => __('Parent Tag'),
				'parent_item_colon' => __('Parent Tag:'),
				'edit_item' => __('Edit Tag'),
				'update_item' => __('Update Tag'),
				'add_new_item' => __('Add New Tag'),
				'new_item_name' => __('New Tag'),
				'separate_items_with_commas' => __('Separate tags with commas'),
				'choose_from_most_used' => __('Choose from most used tags')
			),
			'show_ui' => true,
			'query_var' => true
		)
	);

	/* Blank Widget
	add_action('widgets_init', 'spm_register_blank_widget');
	function spm_register_blank_widget() { register_widget('SPM_Blank_Widget'); }
	class SPM_Blank_Widget extends WP_Widget {

		function __construct() {
			$widget_ops = array('classname' => 'spm_blank_widget', 'description' => __('Widget description...'));
			//$control_ops = array('width' => 400, 'height' => 350);
			parent::__construct('spm_blank_widget', __('Widget Title'), $widget_ops, $control_ops);
		}

		function widget( $args, $instance ) {
			global $post;
			extract($args);
			$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);

			echo $before_widget;
			if ($title) { echo $before_title . $title . $after_title; }
			// Widget content
			echo $after_widget;
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
		}

		function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
			$title = strip_tags($instance['title']);
			?><p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p><?php
		}
	}
	*/

/* SHORT CODES */

	/* Blank Shortcode
	function sc_blank($atts) {
		extract( shortcode_atts( array(
			'foo' => 'something'
		), $atts ) );
		$html = '';
		return $html;
	}
	add_shortcode( 'blank', 'sc_blank' );
	*/

?>
