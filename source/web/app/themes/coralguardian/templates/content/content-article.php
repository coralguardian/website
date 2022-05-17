<?php
	$featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$category = get_the_category();
	$category_name = isset($category[0]) ? $category[0]->name : 'Page';
	$category_link = isset($category[0]) ? get_category_link($category[0]) : '#';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('bloc-article slide-up'); ?> role="article">
	<a href="<?php the_permalink(); ?>" class="cg-ghost-link"></a>
	<div class="bloc-article_top">
		<span class="bloc-article_img lazy" data-bg="<?php echo $featuredImage; ?>">
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