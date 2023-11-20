<?php 
	add_action( 'init', 'bones_head_cleanup' );
	add_action( 'wp_enqueue_scripts', 'cbo_scripts_and_styles', 999 );
	add_filter( 'the_generator', 'cbo_remove_rss_version' );
	add_filter( 'protected_title_format', 'cbo_remove_protected_text' );
	add_filter( 'gallery_style', 'cbo_remove_gallery_style' );
	// add_filter( 'script_loader_tag', 'cbo_add_defer_attribute', 10, 2 );
	remove_filter('pre_term_description', 'wp_filter_kses');
	remove_filter('term_description', 'wp_kses_data');


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
		add_filter( 'wp_title', 'cbo_head_title', 10, 3 );
	}

	function wpdocs_theme_name_scripts() {
		wp_enqueue_script( 'sgr_main', 'https://www.coralguardian.org/app/plugins/simple-google-recaptcha/sgr.js?ver=1665990095', array(), '1.0.0', true );
		wp_enqueue_script( 'sib-front-js', 'https://www.coralguardian.org/app/plugins/mailin/js/mailin-front.js?ver=1665990095', array(), '1.0.0', true );
		wp_enqueue_script( 'cookie-law-info', 'https://www.coralguardian.org/app/plugins/cookie-law-info/public/js/cookie-law-info-public.js?ver=2.0.6', array(), '1.0.0', true );
		wp_enqueue_script( 'ppress-flatpickr', 'https://www.coralguardian.org/app/plugins/wp-user-avatar/assets/flatpickr/flatpickr.min.js?ver=5.9.3', array(), '1.0.0', true );
		wp_enqueue_script( 'ppress-select2', 'https://www.coralguardian.org/app/plugins/wp-user-avatar/assets/select2/select2.min.js?ver=5.9.3', array(), '1.0.0', true );
		wp_enqueue_script( 'wpml-legacy-dropdown-0', 'https://www.coralguardian.org/app/plugins/sitepress-multilingual-cms/templates/language-switchers/legacy-dropdown/script.min.js?ver=1', array(), '1.0.0', true );
		// wp_enqueue_script( 'stripe', 'https://js.stripe.com/v3/', array(), '1.0.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

	// remove WP version from scripts
	function bones_remove_wp_ver_css_js( $src ) {
		if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
		return $src;
	}

	// edit excerpt more
	function bones_excerpt_more($more) {
		global $post;
		return '...';
	}

	/* Nettoyage titre et meta description */
	function cbo_head_title( $title, $sep, $seplocation ){
		global $page, $paged;
		if ( is_feed() ) return $title;
		if ( 'right' == $seplocation ) {
			$title .= get_bloginfo( 'name' );
		} else {
			$title = get_bloginfo( 'name' ) . $title;
		}
		if($sep == '')
			$sep = '-';
		$site_description = get_bloginfo( 'description', 'display' );
	
		if ( $paged >= 2 || $page >= 2 ) {
			$title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
		}
		return $title;
	}

	/* Removes or edits the 'Protected:' part from posts titles When the post is protected by password */
	function cbo_remove_protected_text(){
		return __('%s');
	}

	/* Remove WP version from rss feed */
	function cbo_remove_rss_version(){
		return '';
	}

	/* Remove default Gallery styles*/
	function cbo_remove_gallery_style($css) {
		return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
	}

	/* Suppression des accents des fichiers uploadés */
	add_filter( 'sanitize_file_name', 'remove_accents' );

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

	// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
	function bones_filter_ptags_on_images($content){
		return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
	}

	/* Load custom scripts and styles */
	function cbo_scripts_and_styles() {
		if (!is_admin()) {
			wp_register_style(
				'bones-stylesheet',
				get_stylesheet_directory_uri() . '/library/css/style.css',
				array(),
				'screen,print'
			);
			wp_enqueue_style( 'bones-stylesheet' );
		}
	}

	// /* Add defer attr on scripts */
	// function cbo_add_defer_attribute($tag, $handle) {
	// 	if (is_admin() || (
	// 			'jquery-core' !== $handle &&
	// 			'jquery-migrate' !== $handle &&
	// 			'bones-scripts' !== $handle &&
	// 			'contact-form-7' !== $handle &&
	// 			'cookie-law-info' !== $handle &&
	// 			'ppress-flatpickr' !== $handle &&
	// 			'ppress-frontend-script' !== $handle &&
	// 			'ppress-select2' !== $handle &&
	// 			'sgr_main' !== $handle &&
	// 			'wpml-legacy-dropdown-0' !== $handle &&
	// 			'stripe' !== $handle &&
	// 			'sib-front-js' !== $handle &&
	// 			'chunk-vendors' !== $handle &&
	// 			'vue' !== $handle &&
	// 			'social_warfare_script' !== $handle &&
	// 			'app' !== $handle &&
	// 			'regenerator-runtime' !== $handle ))
	// 	return $tag;
	// 	return str_replace( ' src', ' defer="defer" src', $tag );
	// }
	
	/* Enable custom theme supports */
	function bones_theme_support() {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(125, 125, true);
		add_theme_support('automatic-feed-links');
		add_theme_support( 'html5', array(
			'comment-list',
			'search-form',
			'comment-form'
		));
	}

	//Remove Gutenberg Block Library CSS from loading on the frontend
	function smartwp_remove_wp_block_library_css(){
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
	} 
	add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

	/* Remove useless styles */
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
	
	// Remove ppress-frontend styles
	function ppress_frontend_deregister_styles() {
		wp_deregister_style( 'ppress-frontend' );
	}
	
	/* --------------------------
	   CLEANUP PROCESS
	-------------------------- */
	// launching operation cleanup
	add_action( 'init', 'bones_head_cleanup' );
	// Remove WP version from RSS
	add_filter( 'the_generator', 'cbo_remove_rss_version' );
	// Remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
	// Clean up comment styles in the head
	add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
	// Clean up gallery output in wp
	add_filter( 'gallery_style', 'cbo_remove_gallery_style' );
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
	// Remove ppress-frontend styles
	add_action( 'wp_print_styles', 'ppress_frontend_deregister_styles', 100 );
	// launching this stuff after theme setup
	bones_theme_support();

