<?php
/**
 * The template for displaying the footer.
 *
 * @package inhabitent_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="container">
					<div class="footer-widget-area" role="complementary">
						<?php dynamic_sidebar( 'sidebar-2' ); ?>
					</div><!-- #secondary -->
					<div class="site-branding">
						<h1 class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="nav-logo" alt="Home Page Link" src="<?php echo get_template_directory_uri()?>/images/inhabitent-logo-text.svg"></a>
					</div><!-- .site-branding -->
				</div>
				<div class="site-info">
					Copyright © 2016 Inhabitent
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
