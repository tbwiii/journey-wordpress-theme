<?php
	register_post_type('hero_slides',
		array(
			'labels' => array(
				'name' => __('Hero Slides'),
				'singular_name' => __('Slide'),
				'add_new_item' => __('Add New Slide'),
				'edit_item' => __('Edit Slide'),
				'new_item' => __('New Slide'),
				'view_item' => __('View Slide'),
				'search_items' => __('Search Slides'),
				'not_found' => __('No slides found'),
				'not_found_in_trash' => __('No deleted slides found')
			),
			'public' => true,
			'menu_position' => 2,
			'menu_icon' => get_template_directory_uri() . '/post-types/images/hero_icon.png',
			'supports' => array('title', 'thumbnail', 'excerpt')
		)
	);

	function my_updated_messages( $messages ) {
		global $post, $post_ID;
		$messages['hero_slides'] = array(
			0 => '',
			1 => sprintf( __('Slide updated.')),
			4 => __('Slide updated.'),
			5 => isset($_GET['revision']) ? sprintf( __('Slide restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( __('Slide published.') ),
			7 => __('Slide saved.'),
			8 => sprintf( __('Slide submitted.') ),
			9 => sprintf( __('Slide scheduled for: <strong>%1$s</strong>.'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ) ),
			10 => sprintf( __('Slide draft updated.') ),
		);
		return $messages;
	}
	add_filter( 'post_updated_messages', 'my_updated_messages' );

	register_post_type('sermons',
		array(
			'labels' => array(
				'name' => __('Sermons'),
				'singular_name' => __('Sermon'),
				'add_new_item' => __('Add New Sermon'),
				'edit_item' => __('Edit Sermon'),
				'new_item' => __('New Sermon'),
				'view_item' => __('View Sermon'),
				'search_items' => __('Search Sermons'),
				'not_found' => __('No sermons found'),
				'not_found_in_trash' => __('No deleted sermons found')
			),
			'public' => true,
			'menu_position' => 2,
			'menu_icon' => get_template_directory_uri() . '/post-types/images/sermon_icon.png',
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'page-attributes')
		)
	);

register_taxonomy( 'sermon_cat',
	array('sermons'),
	array('hierarchical' => true,
		'labels' => array(
			'name' => __( 'Series'), /* name of the custom taxonomy */
			'singular_name' => __( 'Series' ), /* single taxonomy name */
			'search_items' =>  __( 'Search Sermon Series' ), /* search title for taxomony */
			'all_items' => __( 'All Sermon Series' ), /* all title for taxonomies */
			'edit_item' => __( 'Edit Sermon Series' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update Sermon Series' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New Sermon Series' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New Sermon Series Name' ) /* name title for taxonomy */
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array(
			'slug' => 'series'
		),
	)
);

 // Styling for the custom post type icon
add_action( 'admin_head', 'journey_post_icons' );
function journey_post_icons() {
    ?>
    <style type="text/css" media="screen">
			#icon-edit.icon32-posts-sermons {background: url(<?php echo get_template_directory_uri() . '/images/sermon_icon_large.png' ?>) no-repeat;}
			#icon-edit.icon32-posts-hero_slides {background: url(<?php echo get_template_directory_uri() .'/images/hero_icon_large.png' ?>) no-repeat;}

			<?php
				global $typenow; if ($typenow=="hero_slides") { ?>
					#edit-slug-box {display: none;}
			<?php } ?>
    </style>
<?php }

