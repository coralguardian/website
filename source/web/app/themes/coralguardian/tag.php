<?php
	get_header();
	$term			= get_queried_object();
	$catmainpic 	= get_field('image_principale', $term);
	$featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>

	<div class="cg-page-tags">

		<section class="cg-section-hero" data-parallax="scroll" data-image-src="<?php echo $catmainpic; ?>">
			<div class="container hero-content">
				<span>
					Votre recherche avec le tag
				</span>
				<div class="hero-title">
					<h1><?php single_cat_title(); ?></h1>
				</div>
				<div class="intro-txt">
					<?php echo tag_description(); ?>
				</div>
			</div>
			<div class="cg-mask low"></div>
		</section><!-- End .cg-section-hero -->
		
		
		<div class="container">
			<div class="listing-articles">
				<?php
					if (have_posts()) :
					while (have_posts()) : the_post();
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
								<svg id="svg">
									<defs>
										<filter id="disFilter">
											<feTurbulence type="turbulence" baseFrequency="0.01" numOctaves="3" seed="1" result="turbulence">
												<animate attributeName="baseFrequency" values="0.01;0.005;0.01;" dur="30s" begin="0" repeatCount="indefinite" />
											</feTurbulence>
											<feDisplacementMap in="SourceGraphic" in2="turbulence" scale="30" xChannelSelector="R" yChannelSelector="B" result="displacement" />
										</filter>
									</defs>
									<g id="background">
										<image xlink:href="<?php echo $featuredImage; ?>" x="0" y="0" height="100%" width="100%" preserveAspectRatio="xMidYMid slice" />
									</g>
								</svg>
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
					else :
				?>
					<article id="post-not-found">
						<h3 class="main-title"><?php _e("Aucun article trouvé", "wpbootstrap"); ?></h3>
						<div class="txt-intro"><p><?php _e("Désolé, aucun article ne correspond à votre recherche", "wpbootstrap"); ?></p></div>
					</article>
				<?php endif; ?>
			</div><!-- End .listing-articles -->
			<?php page_navi(); ?>
		</div><!-- End .container -->
	</div><!-- End .cg-page-tags -->
        
<?php
	get_footer();
?>