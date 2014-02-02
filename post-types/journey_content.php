<?php
/*
Plugin Name: Journey Post Types
Plugin URI: http://www.thejourneyhiram.com
Description: A demo plugin
Version: 1.0
Author: The Journey Church
Author URI: http://www.thejourneyhiram.com
License: GPL2
*/

add_action( 'init', 'journey_content_types_init');
add_action( 'init', 'journey_meta_boxes', 9999 );
add_action( 'wp_enqueue_scripts', 'add_hero_files' );

add_filter( "single_template", "add_slide_template" ) ;

function journey_content_types_init () {
	require_once( 'post_types.php' );
	require_once( 'meta_boxes.php' );

}

function add_slide_template ($single_template) {
 global $post;

 if ($post->post_type == 'hero_slides') {
     $single_template = get_template_directory_uri() .'/post-types/page-slides.php';
 }
 return $single_template;
}

function add_hero_files () {


	if (is_front_page()) {

		$script_path = get_template_directory_uri() . '/post-types/scripts/jquery.flexslider-min.js';
		$style_path = get_template_directory_uri() . '/post-types/css/flexslider.css';
		wp_register_script( 'hero_slides_script', $script_path, "jQuery", false, true );
		wp_register_style( 'hero_slides_styles', $style_path );
		wp_enqueue_script('hero_slides_script');
		wp_enqueue_style('hero_slides_styles');
	}
}

	function journey_slideshow () {
			$args = array( 'post_type' => 'hero_slides' );
			$loop = new WP_Query( $args);

			if ( $loop->have_posts() ) : ?>
				<div class="flexslider">
				<ul class="slides">
			   <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

			       <?php $meta = get_post_meta(get_the_id(), ''); ?>
				        <li>
				        	<a href="<?php echo $meta[_hero_url][0]; ?>">
					          <?php the_post_thumbnail("full"); ?>
					          <?php if (get_the_title()) : ?>
									<h3><?php the_title(); ?></h3>
						      <?php endif; ?>
					         <?php if (get_the_excerpt()) :?>
								<div class="excerpt">
						          	<?php the_excerpt(); ?>
						          </div>
						      <?php endif; ?>
					        </a>
				        </li>
			    <?php endwhile; ?>
			    </ul>
				</div>
					<?php endif;
	}
?>
