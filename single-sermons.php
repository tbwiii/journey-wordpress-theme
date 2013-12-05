<?php get_header(); ?>

	<div class="content sermon-content">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					$video_id = get_post_meta( get_the_ID(), '_sermon_video_id', true );
				 ?>

				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

					<h1 class="post title"><?php the_title(); ?></h1>

					<?php if ( $video_id ) : ?>

					<div class="sermon-container">
						<iframe class="sermon-video" id="ytplayer" type="text/html"
						  src="http://www.youtube.com/embed/<?php echo $video_id ?>?origin=http://example.com" frameborder="0">
						</iframe>
					</div>

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