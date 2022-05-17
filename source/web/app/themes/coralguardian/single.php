<?php
	get_header();
	$term = get_queried_object();
	$featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$category = get_the_category();
	$category_name = isset($category[0]) ? $category[0]->name : 'N.C';
	$category_link = isset($category[0]) ? get_category_link($category[0]) : '#';
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('cg-page-single'); ?> itemscope itemtype="http://schema.org/BlogPosting">
		<section class="cg-section-hero lazy" data-parallax="scroll" data-image-src="<?php echo $featuredImage; ?>">
			<div class="container hero-content cg-relative">
				<a href="<?php echo $category_link; ?>" class="button green-button ripple"><?php echo $category_name; ?></a>
				<div class="hero-title"><h1><?php the_title() ?></h1></div>
			</div>
			<div class="cg-mask low"></div>
		</section><!-- End .cg-section-hero -->
		<div class="container">
			<div class="cg-autor">
				<?php
					echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
				?>
				<?php if(ICL_LANGUAGE_CODE=='fr'): ?>
					<span class="autor-name"><strong>Publié par <?php echo get_the_author(); ?></strong> | Publié le <?php echo get_the_date(); ?></span>
				<?php elseif(ICL_LANGUAGE_CODE=='en'): ?>
					<span class="autor-name"><strong>Published by <?php echo get_the_author(); ?></strong> | Published on <?php echo get_the_date(); ?></span>
				<?php endif;?>
			</div>
			<div class="page-single-content cg-cms"><?php the_content() ?></div>
			<div class="cg-tags-container"><?php the_tags( '', '', '' ); ?></div>
		</div><!-- End .container -->
		<?php if(has_tag()): ?>
			<section class="cg-section section-blue">
				<div class="container">
					<h3 class="main-title">Ces articles pourraient vous intéresser</h3>
					<div class="cg-articles-similar listing-articles">
						<?php $orig_post = $post;
							global $post;
							$tags = wp_get_post_tags($post->ID);
							if ($tags) {
								$tag_ids = array();
								foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
								$args=array(
									'tag__in' => $tag_ids, // Similar by tags
									'post__not_in' => array($post->ID), // Ignore this post
									'posts_per_page'=>4, // Number of related posts that will be shown.
									'ignore_sticky_posts'=>1 
								);
								$my_query = new wp_query( $args );
								if( $my_query->have_posts() ) {
									while( $my_query->have_posts() ) {
										$my_query->the_post();
										$featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class('bloc-article slide-up'); ?> role="article">
								<a href="<?php the_permalink(); ?>" class="cg-ghost-link"></a>
								<div class="bloc-article_top">
									<span class="bloc-article_img lazy" data-bg="<?php echo $featuredImage; ?>">
										<a href="<?php echo $category_link; ?>" class="bloc-article_cat"><?php echo $category_name; ?></a>
									</span>
									<div class="bloc-article_content">
										<h3 class="bloc-article_title"><?php the_title(); ?></h3>
										<div class="bloc-article_desc"><?php the_excerpt(); ?></div>
									</div>
								</div>
								<span class="bloc-article_date"><?php echo get_the_date(); ?></span>
							</article> 
						<?php 
									}
								}
							}
							$post = $orig_post;
							wp_reset_query();
						?>
					</div><!-- End .cg-articles-similar -->
				</div>
			</section>
		<?php endif; ?>
		<?php comments_template(); ?> 
	</article><!-- End .he-page-single-->
<?php
	get_footer();
?>