<?php
/**
 * The template for displaying all single posts.
 *
 * @package inhabitent_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="wrapper">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large' ); ?>
				<?php endif; ?>
			</div>
			<div class="container">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<span class="price"><?php echo CFS()->get( 'price' ) ?></span>	
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php inhabitent_entry_footer(); ?>
					<p>
						<span class="box-link"><i class="fa fa-facebook-f"></i> Like</span>
						<span class="box-link"><i class="fa fa-twitter"></i> Tweet</span>
						<span class="box-link"><i class="fa fa-pinterest-p"></i> Pin</span>
					</p>
				</footer><!-- .entry-footer -->
			</div>
		</article><!-- #post-## -->



		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>