<?php
	get_header();
	$term			= get_queried_object();
	$catmainpic 	= get_field('image_principale', $term);
	$featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
	<div class="cg-page-archive cg-page-tags">
		<section id="section-<?php echo $flexible_count; ?>" class="cbo-hero">
			<div class="cbo-container container-large container-nomargin container-padding hero-inner">
				<div class="inner-content cg-relative">
					<div class="content-title">
						<h1><?php single_cat_title(); ?></h1>
					</div>
					<div class="cbo-chapo slide-up">
						<?php echo category_description(); ?>
					</div>
				</div>
			</div>
			<div class="hero-picture cbo-picture-cover">
				<img
					src="<?php echo $catmainpic['sizes']['xlarge']; ?>"
					srcset="<?php echo $catmainpic['sizes']['xlarge'] ?> 320w, <?php echo $catmainpic['sizes']['xlarge'] ?> 768w, <?php echo $catmainpic['sizes']['xlarge'] ?> 1024w, <?php echo $catmainpic['sizes']['xlarge'] ?> 1280w"
					alt="<?php echo $catmainpic["alt"]; ?>"
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