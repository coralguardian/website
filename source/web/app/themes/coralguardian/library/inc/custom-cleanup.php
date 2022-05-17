<?php 

/* --------------------------
   NETTOYAGE DE WORDPRESS
-------------------------- */

/* Nettoyage du wp_head */
function bones_head_cleanup() {
  remove_action( 'wp_head', 'rsd_link' );
  remove_action( 'wp_head', 'wlwmanifest_link' );
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
  remove_action( 'wp_head', 'wp_generator' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
  remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  add_filter( 'style_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
  add_filter( 'script_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
}


/* Suppression des accents des fichiers uploadés */
add_filter( 'sanitize_file_name', 'remove_accents' );


/* Nettoyage titre et meta description */

function rw_title( $title, $sep, $seplocation ) {
  global $page, $paged;

  // Don't affect in feeds.
  if ( is_feed() ) return $title;

  // Add the blog's name
  if ( 'right' == $seplocation ) {
    $title .= get_bloginfo( 'name' );
  } else {
    $title = get_bloginfo( 'name' ) . $title;
  }

  // Set separator
  if($sep == '')
    $sep = '-';

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 ) {
    $title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
  }

  return $title;
}

// remove WP version from RSS
function bones_rss_version(){ 
  return ''; 
}

// remove WP version from scripts
function bones_remove_wp_ver_css_js( $src ) {
  if ( strpos( $src, 'ver=' ) )
    $src = remove_query_arg( 'ver', $src );
  return $src;
}

// remove injected CSS for recent comments widget
function bones_remove_wp_widget_recent_comments_style() {
  if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
    remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
  }
}

// remove injected CSS from recent comments widget
function bones_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
  }
}

// remove injected CSS from gallery
function bones_gallery_style($css) {
  return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function bones_filter_ptags_on_images($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// edit excerpt more
function bones_excerpt_more($more) {
  global $post;
  return '...';
}











	/* --------------------------
	   SCRIPTS & ENQUEUEING
	-------------------------- */
	function bones_scripts_and_styles() {
	  global $wp_styles;
	  if (!is_admin()) {
		  wp_register_style( 'bones-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );
		  wp_enqueue_style( 'bones-stylesheet' );
		  
		  
		  
		  
		  
		  
		  
		 
		  
		
	  }
	}















	/* --------------------------
	   THEME SUPPORT
	-------------------------- */


	function bones_theme_support() {

	  // Thumbnails

	  add_theme_support( 'post-thumbnails' );
	  set_post_thumbnail_size(125, 125, true);

	  // RSS thingy

	  add_theme_support('automatic-feed-links');

	  // WP menus

	  add_theme_support( 'menus' );
	  register_nav_menus(
		array(
		  'main-nav' => 'Menu principal',  
		  'footer-nav' => 'Menu footer'
		)
	  );

	  // Enable support for HTML5 markup.

	  add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	  ));
	}



	/* --------------------------
	   REMOVE STYLES
	-------------------------- */
	// remove cf7 styles
	function cf7_deregister_styles() {
		wp_deregister_style( 'contact-form-7' );
	}

	// remove social warfare styles
	add_filter( 'swp_header_html', '__return_false', PHP_INT_MAX );

	function social_warfare_block_deregister_styles() {
		wp_deregister_style( 'social_warfare' );
	}

	function social_warfare_block2_deregister_styles() {
		wp_deregister_style( 'social-warfare-block-css' );
	}

	// remove Block library styles
	function blocklibrary_deregister_styles() {
		wp_deregister_style( 'wp-block-library' );
	}

	// remove Send in blue styles
	function sendinblue_deregister_styles() {
		wp_deregister_style( 'sib-front-css' );
	}

	// remove WPML admin bar styles
	function wpml_adminbar_deregister_styles() {
		wp_deregister_style( 'wpml-tm-admin-bar' );
	}

	// remove WPML menu item styles
	function wpml_menuitem_deregister_styles() {
		wp_deregister_style( 'wpml-menu-item-0' );
	}
	


	/* --------------------------
	   CLEANUP PROCESS
	-------------------------- */
	// launching operation cleanup
	add_action( 'init', 'bones_head_cleanup' );
	// A better title
	add_filter( 'wp_title', 'rw_title', 10, 3 );
	// Remove WP version from RSS
	add_filter( 'the_generator', 'bones_rss_version' );
	// Remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
	// Clean up comment styles in the head
 	 add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
	// Clean up gallery output in wp
	add_filter( 'gallery_style', 'bones_gallery_style' );
	// Enqueue base scripts and styles
	add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
	// Remove CF7 styles
	add_action( 'wp_print_styles', 'cf7_deregister_styles', 100 );
	// Remove Social Warfare styles
	add_action( 'wp_print_styles', 'social_warfare_block_deregister_styles', 100 );
	// Remove Block library styles
	add_action( 'wp_print_styles', 'blocklibrary_deregister_styles', 100 );
	// Remove Send in blue styles
	add_action( 'wp_print_styles', 'sendinblue_deregister_styles', 100 );
	// Remove WPML admin bar styles
	add_action( 'wp_print_styles', 'wpml_adminbar_deregister_styles', 100 );
	// Remove Social Warfare 2 styles
	add_action( 'wp_print_styles', 'social_warfare_block2_deregister_styles', 100 );
	// Remove WPML menu item styles
	add_action( 'wp_print_styles', 'wpml_menuitem_deregister_styles', 100 );
	// launching this stuff after theme setup
	bones_theme_support();



?>