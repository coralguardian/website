<?php
	get_header();
?>
	<div class="cg-page-archive cg-page-search">
		<section id="section-<?php echo $flexible_count; ?>" class="cbo-hero">
			<div class="cbo-container container-large container-nomargin container-padding hero-inner">
				<div class="inner-content cg-relative">
					<span>
						<?php _e( 'Please find below the list of search results for:', "wpbootstrap") ?>
					</span>
					<div class="content-title">
						<h1><?php printf( __( '%s'), get_search_query() ); ?></h1>
					</div>
					<div class="cbo-chapo slide-up">
						<?php echo category_description(); ?>
					</div>
				</div>
			</div>
			<div class="hero-picture cbo-picture-cover">
				<img
					src="<?php echo get_template_directory_uri(); ?>/library/img/coral-guardian-bg-404.jpg"
					alt="Coral Guradian"
					loading="lazy"
					width="1900px" height="700px"
				>
			</div>
		</section>
			
		<div class="cbo-container container-large">
			<div class="listing-articles">
				<?php
					if (have_posts()) :
					while (have_posts()) : the_post();
					get_template_part('templates/content/content', 'article');
					endwhile;
					endif;
				?>
			</div>
		</div>

		<div class="cbo-container container-large">
			<?php page_navi(); ?>
		</div>
	</div>
<?php
	get_footer();
?>