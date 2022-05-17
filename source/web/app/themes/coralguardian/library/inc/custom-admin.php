<?php  

/* --------------------------
   ROLES UTILISATEURS
-------------------------- */

/* Création d'un nouveau rôle 'developer' */

add_action('init', 'cbones_developer_role');
function cbones_developer_role()
{
    global $wp_roles;
    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();

    $adm = $wp_roles->get_role('administrator');    
    $wp_roles->add_role('developer', 'Développeur', $adm->capabilities);
}

/* --------------------------
   PERSONNALISATION
-------------------------- */

add_action( 'admin_init', 'my_remove_menu_pages' );
function my_remove_menu_pages() {

	global $user_ID;
	if( !current_user_can('developer') ){
		remove_menu_page('index.php'); // Dashboard
		remove_menu_page('link-manager.php'); // Links
		remove_menu_page('edit-comments.php'); // Comments
		remove_menu_page('plugins.php'); // Plugins
		remove_menu_page('themes.php'); // Appearance
		remove_menu_page('tools.php'); // Tools
		remove_menu_page('options-general.php'); // Settings

		/* Plugins */
		remove_menu_page('edit.php?post_type=acf-field-group'); // ACF
		remove_menu_page('wpcf7'); // Contact form 7
	}
}

/* Suppression de l'admin bar */
show_admin_bar(false);

/* Suppression des liens de l'admin bar */
add_action( 'admin_bar_menu', 'remove_wp_nodes', 999 );
function remove_wp_nodes() 
{
    global $wp_admin_bar;  
    if( !current_user_can('developer') ){

	    $wp_admin_bar->remove_node( 'wp-logo' );
	    $wp_admin_bar->remove_node( 'new-post' );
	    $wp_admin_bar->remove_node( 'new-link' );
	    $wp_admin_bar->remove_node( 'new-page' );
	    $wp_admin_bar->remove_node( 'comments' );
	    $wp_admin_bar->remove_node( 'updates' );
	    $wp_admin_bar->remove_node( 'wpseo-menu' );
	}
}

/* Suppression du dashboard */

add_filter( 'current_screen', 'dashboard_redirect' );
function dashboard_redirect( $url ) {
    $screen = get_current_screen();
    if($screen->base == 'dashboard')
    	wp_redirect('edit.php?post_type=page');
}

/* Autoriser l'upload des fichiers SVG */
function wpc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');

/* Pied de page administration */

function remove_footer_admin () {
	echo 'Proudly handcrafted by <a href="http://julien-brochard.fr/">JB</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


/* --------------------------
   XML-RPC & API
-------------------------- */


/* Empêcher l'accès à l'API pour les users non connectés */
/*
 * EDIT Benoit 16/03/2022
 *
 * Il ne faut pas gérer ça de façon globale, certaines route rest custom ont besoin d'être public
 * Il faut ajouter des permissions pour chaque route via 'permission_callback'
 */

//function secure_api( $result ) {
//	if ( ! empty( $result ) ) {
//	    return $result;
//	}
//	if ( ! is_user_logged_in() ) {
//	    return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );
//	}
//	return $result;
//}
//add_filter('rest_authentication_errors', 'secure_api');

/* Désactiver XML-RPC */

add_filter( 'xmlrpc_enabled', '__return_false' );
remove_action( 'wp_head', 'rsd_link' );


/* --------------------------
   RSS FEEDS
-------------------------- */


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

?>