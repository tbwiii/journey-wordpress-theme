<?php get_header(); ?>

	<div class="content sermon-content">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					$video_id = get_post_meta( get_the_ID(), '_sermon_video_id', true );
				 ?>

				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

					<h1 class="post title"><?php the_title(); ?></h1>

					<section class="meta">
						<p>Posted on <?php the_time(get_option('date_format')); ?></p>
					</section>

					<?php if ( $video_id ) : ?>
						<?php include( locate_template( "video-module.php" )); ?>
					<?php endif; ?>

					<section class="entry">


						<?php the_content('Read more'); ?>
					</section>
					<?php wp_link_pages( array('before' => '<p style="clear: both;">' . __('Pages:')) ); ?>
				</article>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>