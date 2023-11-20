<?php  
	function remove_admin_login_header() {
		remove_action('wp_head', '_admin_bar_bump_cb');
	}
	add_action('get_header', 'remove_admin_login_header');

	// Hooks
	add_filter( 'upload_mimes', 'cbo_mime_types' );
	add_filter( 'wp_check_filetype_and_ext', 'cbo_file_types', 10, 4 );

	// Autoriser l'import des fichiers SVG et WEBP
	function cbo_mime_types( $mimes ){
		$mimes['svg'] = 'image/svg+xml';
		$mimes['webp'] = 'image/webp';
		return $mimes;
	}

	// Contrôle de l'import d'un WEBP
	function cbo_file_types( $types, $file, $filename, $mimes ) {
		if ( false !== strpos( $filename, '.webp' ) ) {
			$types['ext'] = 'webp';
			$types['type'] = 'image/webp';
		}
		return $types;
	}

	// Nettoyage de l'adminbar du back office - Items principaux
	function wps_admin_bar() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_node('wp-logo');
		$wp_admin_bar->remove_node('comments');
		$wp_admin_bar->remove_node('wpseo-menu');
	}
	add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );


	/* Suppression de l'admin bar */
	show_admin_bar(false);

	add_filter( 'xmlrpc_enabled', '__return_false' );
	remove_action( 'wp_head', 'rsd_link' );


	/* Désactiver les fluxs RSS */
	function itsme_disable_feed() {
		wp_die( __( 'No feed available, please visit our <a href="'. esc_url( home_url( '/' ) ) .'">website</a> :)' ) );
	}

	add_action('do_feed', 'itsme_disable_feed', 1);
	add_action('do_feed_rdf', 'itsme_disable_feed', 1);
	add_action('do_feed_rss', 'itsme_disable_feed', 1);
	add_action('do_feed_rss2', 'itsme_disable_feed', 1);
	add_action('do_feed_atom', 'itsme_disable_feed', 1);
	add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
	add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);

	/* Pied de page administration */
	function remove_footer_admin () {
		echo 'Proudly handcrafted by <a href="http:http://julien-brochard.fr/">Julien B</a>';
	}
	add_filter('admin_footer_text', 'remove_footer_admin');

?>