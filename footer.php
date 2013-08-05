	</div> <!-- End .content -->
	<?php get_sidebar() ?>
	<footer>

		<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>

		<?php if ( has_nav_menu( 'footer' ) ) wp_nav_menu( array('theme_location' => 'footer', 'container' => 'nav', 'container_id' => 'footer-menu', 'container_class' => '', 'menu_class' => 'sf-menu', 'depth' => 1) ); ?>
		<?php wp_footer(); ?>
	</footer>
</body>
</html>
