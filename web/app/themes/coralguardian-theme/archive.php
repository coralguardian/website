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

		<section id="section-<?php echo $flexible_count; ?>" class="cbo-hero">
			<div class="cbo-container container-large container-nomargin container-padding hero-inner">
				<div class="inner-content cg-relative">
					<div class="content-title">
						<h1><?php single_cat_title(); ?></h1>
					</div>
					<div class="cbo-chapo slide-up">
						<?php echo category_description(); ?>
						<?php if(ICL_LANGUAGE_CODE=='fr'): ?>
							<p><a class="button ripple white-button search-button" href="#">Parcourir</a></p>
						<?php elseif(ICL_LANGUAGE_CODE=='en'): ?>
							<p><a class="button ripple white-button search-button" href="#">Search</a></p>
						<?php endif;?>
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
			<ul class="categories-container">
				<?php 
					$hierarchical = false;
					wp_list_categories( array(
						'hierarchical' => $hierarchical,
						'title_li' => ''
					) );
				?> 
			</ul>
			<div class="categories-select">
				<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
					<?php foreach( $categories as $category ): ?>
						<option value="<?php echo get_term_link($category); ?>"<?php echo ($current == $category->slug) ? ' selected="selected"':''; ?>><?php echo $category->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

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