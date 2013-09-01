	</div> <!-- End .content -->
	<?php get_sidebar() ?>
	<footer>

		<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>

		<div class="footer-wrapper">
			<div class="footer-widgets">
				<?php dynamic_sidebar('footer'); ?>
			</div>

			<?php if ( has_nav_menu( 'footer' ) ) wp_nav_menu( array('theme_location' => 'footer', 'container' => 'nav', 'container_id' => '', 'container_class' => 'footer-menu', 'menu_class' => 'footer-menu-ul', 'depth' => 1) ); ?>
			<?php wp_footer(); ?>
		</div>
	</footer>
</body>
</html>
