<?php
add_action( 'rest_api_init', function () {
	add_action( 'rest_pre_serve_request', function () {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
	} );
}, 15 );
function bones_ahoy() {

	//Allow editor style.
	add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );
	  require_once( 'library/inc/custom-cleanup.php' );
	  require_once( 'library/inc/custom-admin.php' );
	}
	add_action( 'after_setup_theme', 'bones_ahoy' );


	/* ************************* */
	// Register menu
	/* ************************* */
	register_nav_menus( array(
		'Smartphone' => 'Menu Smartphone',
	) );


	/* ************************* */
	/* ADD BUTTON TO WYSIWYG EDITOR */
	/* ************************* */
	function add_style_select_button($buttons) {
		array_unshift($buttons, 'styleselect');
		return $buttons;
	}
	add_filter('mce_buttons_2', 'add_style_select_button');
	function my_mce_before_init_insert_formats( $init_array ) {
		$style_formats = array(
			array(
				'title' => 'Bouton vert',
				'block' => 'a',
				'classes' => 'button green-button ripple',
				'wrapper' => true,
			),
			array(
				'title' => 'Bouton bleu foncé',
				'block' => 'a',
				'classes' => 'button darkblue-button ripple',
				'wrapper' => true,
			),
			array(
				'title' => 'Bouton bleu clair',
				'block' => 'a',
				'classes' => 'button lightblue-button ripple',
				'wrapper' => true,
			),
			array(
				'title' => 'Bouton blanc',
				'block' => 'a',
				'classes' => 'button white-button ripple',
				'wrapper' => true,
			),
			array(
				'title' => 'Bouton cerné bleu',
				'block' => 'a',
				'classes' => 'button border-button ripple',
				'wrapper' => true,
			),
			array(
				'title' => 'Bouton cerné bleu clair',
				'block' => 'a',
				'classes' => 'button lightborder-button ripple',
				'wrapper' => true,
			),
			array(
				'title' => 'Texte bleu clair',
				'block' => 'strong',
				'classes' => 'colorlightblue',
				'wrapper' => true,
			),
		);
		$init_array['style_formats'] = json_encode( $style_formats );
		return $init_array;
	}
	add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


	/* ************************* */
	/* LIMITATION CARACTÈRES ZONE D'EXTRAIT */
	/* ************************* */
	function new_excerpt_length($length) {
		return 25;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
	

	/* ************************* */
	/* POINTS DE SUPENSIONS THE EXERPT */
	/* ************************* */
	function wp_bootstrap_excerpt_more($more) {
		global $post;
		return '... ';
	}
	add_filter('excerpt_more', 'wp_bootstrap_excerpt_more');


	/* ************************* */
	/* WIDGETS REGISTER */
	/* ************************* */
	function arphabet_widgets_init() {
		register_sidebar( array(
			'name' => 'Texte présentation Footer',
			'id' => 'footer-desc',
			'before_widget' => '<div class="footer-col">',
			'after_widget' => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		) );
		register_sidebar( array(
			'name' => 'Menus footer',
			'id' => 'footer-menus',
			'before_widget' => '<div class="footer-col">',
			'after_widget' => '</div>',
			'before_title' => '<span class="widget-title">',
			'after_title' => '</span>',
		) );
		register_sidebar( array(
			'name' => 'Sélecteur de langues smartphone',
			'id' => 'language-selector',
			'before_widget' => '<div class="">',
			'after_widget' => '</div>',
		) );

	}
	add_action( 'widgets_init', 'arphabet_widgets_init' );


	/* ************************* */
	/* AJOUT OPTIONS AU DASHBOARD */
	/* ************************* */
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page();
	}

	/* ************************* */
	/* CRÉATION PAGINATION */
	/* ************************* */
	function page_navi($before = '', $after = '') {
		global $wpdb, $wp_query;
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		if ( $numposts <= $posts_per_page ) { return; }
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = 7;
		$pages_to_show_minus_1 = $pages_to_show-1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}

		echo $before.'<ul class="cg-pagination">'."";

		$prevposts = get_previous_posts_link('< Précédent');
		if($prevposts) { echo '<li class="paginate-prev">' . $prevposts  . '</li>'; }
		else { echo '<li class="disabled"><a href="#"></a></li>'; }

		for($i = $start_page; $i  <= $end_page; $i++) {
			if($i == $paged) {
				echo '<li class="active"><a href="#">'.$i.'</a></li>';
			} else {
				echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
			}
		}

		$nextposts = get_next_posts_link('Suivant >');
		if($nextposts) { echo '<li class="paginate-next">' . $nextposts  . '</li>'; }
		else { echo '<li class="disabled"><a href="#"></a></li>'; }

		if ($end_page < $max_page) {
			$last_page_text = "&raquo;";
			echo '<li class="next"><a href="'.get_pagenum_link($max_page).'" title="Last">'.$last_page_text.'</a></li>';
		}
		echo '</ul>'.$after."";
	}


	/* ************************* */
	/* EXCLUDE PAGES FROM WORDPRESS SEARCH */
	/* ************************* */
	if (!is_admin()) {
		function wpb_search_filter($query) {
			if ($query->is_search) {
				$query->set('post_type', 'post');
			}
			return $query;
		}
		add_filter('pre_get_posts','wpb_search_filter');
	}


	/* ************************* */
	/* DISABLE GUTEMBERG */
	/* ************************* */
	// disable for posts
	add_filter('use_block_editor_for_post', '__return_false', 10);
	// disable for post types
	add_filter('use_block_editor_for_post_type', '__return_false', 10);


	/* ************************* */
	/* PERSONNALISATION ESPACE DE CONNEXION */
	/* ************************* */
	function childtheme_custom_login() {
		echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/library/css/style.css" />';
	}
	add_action('login_head', 'childtheme_custom_login');

	/* ********** */
	/* A retirer lorsque la configuration des mails sera ok */
	add_filter('wpcf7_spam', '__return_false');
?>
