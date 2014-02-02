<?php get_header(); ?>

		<div class="content">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>

					<?php
						$video_id = get_post_meta( get_the_ID(), '_sermon_video_id', true );
					 ?>

					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<h1 class="title"><?php the_title(); ?></h1>

					<?php if ( $video_id ) : ?>

						<?php include( locate_template( "video-module.php" )); ?>
					<?php endif; ?>

						<section class="entry">
							<?php the_content('Read more'); ?>
						</section>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>

<?php get_footer(); ?>
