<?php get_header(); ?>
  <?php $loop = new WP_Query( array( 'post_type' => 'sermons') ); ?>

<div class="content">
<?php if ($loop->have_posts()) : ?>

	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php
				$video_id = get_post_meta( get_the_ID(), '_sermon_video_id', true );
			 ?>


			<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<section class="meta">
				<p>Posted on <?php the_time(get_option('date_format')); ?></p>
			</section>

			<?php if ( $video_id ) : ?>
				<?php include( locate_template( "video-module.php" )); ?>
			<?php endif; ?>

			<section class="entry">
				<?php the_content('Read more'); ?>
			</section>
		</article>
	<?php endwhile; ?>

	<?php if ( function_exists( 'wp_pagenavi' ) ) : ?>
		<?php wp_pagenavi(); ?>
	<?php else: ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
	<?php endif; ?>

<?php endif; ?>
</div>

<?php get_footer(); ?>