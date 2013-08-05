<?php get_header(); ?>

	<div class="content">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<h1 class="post title"><?php the_title(); ?></h1>
					<section class="meta">
						<small><?php the_time(get_option('date_format')); ?> by <?php the_author() ?> </small>
					</section>
					<section class="entry">
						<?php the_content('Read more'); ?>
					</section>
					<?php wp_link_pages( array('before' => '<p style="clear: both;">' . __('Pages:')) ); ?>
					<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?></p>
				</article>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>
