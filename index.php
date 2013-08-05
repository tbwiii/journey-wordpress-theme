<?php get_header(); ?>

<?php $type = get_post_type(); ?>
<div class="content">
	<?php get_template_part('loop', $type); ?>
</div>

<?php get_footer(); ?>
