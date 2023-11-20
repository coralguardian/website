<?php
	$featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$category = get_the_category();
	$category_name = isset($category[0]) ? $category[0]->name : 'Page';
	$category_link = isset($category[0]) ? get_category_link($category[0]) : '#';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cbo-article slide-up'); ?> role="article">
	<a href="<?php the_permalink(); ?>" class="article-inner">
		<span class="article-top">
			<span class="article-picture">
				<span class="picture-category">
					<?php echo $category_name; ?>
				</span>
				<figure class="picture-inner cbo-picture-cover">
					<?php the_post_thumbnail( 'small' ); ?>
				</figure>
			</span>

			<span class="article-content">
				<h3 class="content-title cbo-title-3">
					<?php the_title(); ?>
				</h3>
				<span class="content-desc">
					<?php the_excerpt(); ?>
				</span>
			</span>
		</span>

		<span class="article-date">
			<?php echo get_the_date(); ?>
		</span>
	</a>
</article>