<?php
/**
 * The template for displaying product archive page.
 * Template Name: Product Archive
 *
 * @package inhabitent_Theme
 */
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header archive-header">
					<section class="tax-description container">
          <h1><?php single_term_title() ?></h1>
          <?php the_archive_description( '<p>', '</p>' )?>
				</section>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<a href="<?php the_permalink()?>" class="entry-link">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'medium_large' ); ?>
					<?php endif; ?>
				</a>
				<!-- .entry-header -->

				<div class="entry-content">
					<span class="title"><?php the_title(); ?></span>
					<div></div>
					<span class="price"><?php echo CFS()->get( 'price' ) ?></span>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>