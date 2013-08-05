<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<section class="entry">
				<?php the_content('Read more'); ?>
			</section>
			<p class="postmetadata">Posted in <?php the_category(', ') ?></p>
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
