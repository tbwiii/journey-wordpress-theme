<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <li>
      <?php
       $meta = get_post_meta(get_the_id(), '');

       ?>
        <a href="<?php echo $meta[_hero_url][0]; ?>">
          <?php the_post_thumbnail("full"); ?>
          <h3><?php the_title(); ?></h3>
          <?php the_excerpt(); ?>
        </a>

    </li>
    <?php comments_template(); ?>
  <?php endwhile; ?>
<?php endif; ?>
