<?php get_header(); ?>

		<div class="content">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

						<section class="entry">
							<?php the_content('Read more'); ?>
						</section>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>

<?php get_footer(); ?>
