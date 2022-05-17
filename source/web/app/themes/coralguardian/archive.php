<?php
	get_header();
	$term			= get_queried_object();
	$catmainpic 	= get_field('image_principale', $term);
	$actus = get_page( get_option('page_for_posts') );
	$current = get_queried_object();
	$current = (isset($current->slug)) ? $current->slug : '';
	$categories = get_terms( array(
		'taxonomy' => 'category'
	));
?>
	<div class="cg-page-archive">
		<section class="cg-section-hero" data-parallax="scroll" data-image-src="<?php echo $catmainpic; ?>">
			<div class="container hero-content cg-relative">
				<div class="hero-title"><h1><?php single_cat_title(); ?></h1></div>
				<div class="intro-txt">
					<?php echo category_description(); ?>
					<?php if(ICL_LANGUAGE_CODE=='fr'): ?>
						<p><a class="button ripple white-button search-button" href="#">Parcourir</a></p>
					<?php elseif(ICL_LANGUAGE_CODE=='en'): ?>
						<p><a class="button ripple white-button search-button" href="#">Search</a></p>
					<?php endif;?>
				</div>
			</div>
			<div class="cg-mask low"></div>
		</section><!-- End .cg-section-hero -->

		<div class="container">
			<ul class="categories-container">
				<?php 
					$hierarchical = true;
					wp_list_categories( array(
						'hierarchical' => $hierarchical,
						'title_li' => ''
					) );
				?> 
			</ul><!-- End .categories-container -->
			<div class="categories-select">
				<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
					<?php foreach( $categories as $category ): ?>
						<option value="<?php echo get_term_link($category); ?>"<?php echo ($current == $category->slug) ? ' selected="selected"':''; ?>><?php echo $category->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="listing-articles">
				<?php
					if (have_posts()) :
					while (have_posts()) : the_post();
					$featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					$category = get_the_category();
					$category_name = isset($category[0]) ? $category[0]->name : 'N.C';
					$category_link = isset($category[0]) ? get_category_link($category[0]) : '#';
				?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('bloc-article'); ?> role="article">
						<a href="<?php the_permalink(); ?>" class="cg-ghost-link"></a>
						<div class="bloc-article_top">
							<span class="bloc-article_img" style="background:url(<?php echo $featuredImage; ?>) no-repeat center;background-size:cover">
								<a href="<?php echo $category_link; ?>" class="bloc-article_cat">
									<?php echo $category_name; ?>
								</a>
							</span>
							<div class="bloc-article_content">
								<h3 class="bloc-article_title"><?php the_title(); ?></h3>
								<div class="bloc-article_desc">
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
						<span class="bloc-article_date">
							<?php echo get_the_date(); ?>
						</span>
					</article>
				<?php
					endwhile;
					endif;
				?>
			</div><!-- End .listing-articles -->
			
			<?php page_navi(); ?>
			
		</div><!-- End .container -->

	</div><!-- End .he-page-archive -->

<?php
	get_footer();
?>