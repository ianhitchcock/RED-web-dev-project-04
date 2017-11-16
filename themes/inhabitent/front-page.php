<?php
/**
 * The template for displaying all pages.
 *
 * @package inhabitent_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
  
		<main id="main" class="site-main" role="main">

			<section class="product-info container">
				<h2>Shop Stuff</h2>
				<?php
						$terms = get_terms( array(
								'taxonomy' => 'product-type',
								'hide_empty' => 0,
						) );
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
				?>
						<div class="product-type-blocks">

							<?php foreach ( $terms as $term ) : ?>

									<div class="product-type-block-wrapper">
										<img src="<?php echo get_template_directory_uri() . '/images/' . $term->slug; ?>.svg" alt="<?php echo $term->name; ?>" />
										<p><?php echo $term->description; ?></p>
										<p><a href="<?php echo get_term_link( $term ); ?>" class="btn"><?php echo $term->name; ?> Stuff</a></p>
									</div>

							<?php endforeach; ?>

						</div>
						
				<?php endif; ?>
			</section>

		<?php
			$post_args = array( 'post_type' => 'post', 'order' => 'ASC', 'posts_per_page'=> '3' );
			$posts = get_posts( $post_args ); // returns an array of posts
		?>
			<div class="blog-preview">
				<h1>Inhabitent Journal</h1>
			<?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
				<div class="blog-preview-item">
					<div class="thumbnail-wrapper">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'large' ); ?>
					<?php endif; ?>
					</div>
					
					<?php inhabitent_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> 

					<h2><?php the_title() ?></h2>

					<a href="<?php the_permalink() ?>">Read More</a>
				</div>
			<?php endforeach; wp_reset_postdata(); ?>
			</div>  
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
