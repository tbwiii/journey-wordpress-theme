<?php

add_filter( 'cmb_meta_boxes', 'sermon_metaboxes' );
add_filter( 'cmb_meta_boxes', 'hero_slide_metaboxes' );

function sermon_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_sermon_';

	$meta_boxes[] = array(
		'id'         => 'av_box',
		'title'      => 'Audio & Video',
		'pages'      => array( 'sermons', 'page' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Video ID',
				'desc' => '<br>Youtube Example: "oHg5SJYRHA0" Everything between "v=" and "&" in the address: <br> http://www.youtube.com/watch?v=oHg5SJYRHA0&feature=fvwp',
				'id'   => $prefix . 'video_id',
				'type' => 'text_small',
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

function hero_slide_metaboxes ( array $meta_boxes ) {

	$prefix = '_hero_';

	$meta_boxes[] = array(
		'id'         => 'link_options',
		'title'      => 'Slide Link Options',
		'pages'      => array( 'hero_slides' ), // Post type
		'context'    => 'side',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'URL',
				'desc' => 'Where the slide should navigate',
				'id'   => $prefix . 'url',
				'type' => 'text',
			),
		),
	);

	return $meta_boxes;
}

add_action( 'init', 'journey_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function journey_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'cmb/init.php';

}

?>
