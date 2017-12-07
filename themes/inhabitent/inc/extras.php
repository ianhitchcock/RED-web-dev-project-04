<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package inhabitent_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function inhabitent_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'inhabitent_body_classes' );


// Remove "Editor" links from sub-menus
function inhabitent_remove_submenus() {
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
	remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'inhabitent_remove_submenus', 110 );


//login logo
function inhabitent_login_logo() {
	echo '<style type="text/css">
			#login h1 a { 
				background-image:url('.get_stylesheet_directory_uri().'/images/inhabitent-logo-text-dark.svg);
				background-size: contain;
				height: 50px;
				width: 300px; }                            
	</style>';
}
add_action('login_head', 'inhabitent_login_logo');

function inhabitent_login_logo_url( $url ) {
	return home_url();
}
add_filter( 'login_headerurl', 'inhabitent_login_logo_url' );

function inhabitent_login_logo_url_title(){
	return 'Inhabitent';
}
add_filter('login_headertitle', 'inhabitent_login_logo_url_title');

//dynamic css
function inhabitent_dynamic_css() {
	
	if ( ! is_page_template( 'page_templates/about.php') ) {
		return;
	}
	
	$image = CFS()->get( 'about_header_image' );

	if ( ! $image ) {
		return;
	}
	
	$hero_css = ".page-template-about .entry-header {
		background:
			linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
			url({$image}) no-repeat center bottom;
		background-size: cover;
		height: 100vh;
		width: 100vw;
	}";
	
	wp_add_inline_style( 'inhabitent-style' , $hero_css );
}
add_action( 'wp_enqueue_scripts', 'inhabitent_dynamic_css');

//filter to only products for product tax
function product_archive_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ( is_tax( 'product-type' ) ) {
      $query->set('post_type', 'product');
    }
  }
}

add_action('pre_get_posts','product_archive_filter');


function hwl_home_pagesize( $query ) {
	if ( is_admin() || ! $query->is_main_query() )
			return;

	if ( is_home() ) {
			// Display only 5 post for the original blog archive
			$query->set( 'posts_per_page', 5 );
			return;
	}

	if ( is_search() ) {
		// Display only 10 post for the search search prducts too!
		$query->set( 'posts_per_page', 10 );
		$query->set( 'post_type', array( 'post' , 'product' ) );
		return;
	}

	if ( is_post_type_archive( 'product' ) ) {
			// Display 16 posts for a custom post type called products
			$query->set( 'posts_per_page', 16 );
			return;
	}
}
add_action( 'pre_get_posts', 'hwl_home_pagesize', 1 );

//remove more broad classes for less styling conflicts
function remove_broad_classes( $classes ) {
	if ( is_front_page() || is_page_template( 'page_templates/about.php' ) ) {
		unset( $classes[array_search( 'page', $classes)] );
	}
	if ( is_post_type_archive( 'product' ) || is_tax( 'product-type' ) ) {
		unset( $classes[array_search( 'archive', $classes)] );
	}
	if ( is_singular( 'product' ) ) {
		unset( $classes[array_search( 'single', $classes)] );
	}
return $classes;
}
add_filter('body_class', 'remove_broad_classes' );
