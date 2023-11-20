<?php
	get_header();
	$term = get_queried_object();
	$featuredImage = isset($post) ? wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) : "";
	$category = get_the_category();
	$category_name = isset($category[0]) ? $category[0]->name : 'N.C';
	$category_link = isset($category[0]) ? get_category_link($category[0]) : '#';
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('cg-page-single'); ?> itemscope itemtype="http://schema.org/BlogPosting">

		<section class="cbo-hero">
			<div class="cbo-container container-large container-nomargin container-padding hero-inner">
				<div class="inner-content cg-relative">
					<a href="<?php echo $category_link; ?>" class="button green-button ripple">
						<?php echo $category_name; ?>
					</a>
					<div class="content-title">
						<h1><?php the_title() ?></h1>
					</div>
				</div>
			</div>
			<div class="hero-picture cbo-picture-cover">
				<img src="<?php echo $featuredImage; ?>" itemprop="image" alt="<?php the_title(); ?>" loading="lazy" width="1900px" height="700px">
			</div>
		</section>

		<div class="cbo-container">
			<div class="cg-autor">
				<?php
                if (isset($author_bio_avatar_size)) {
                    echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
                }
				?>
				<?php if(ICL_LANGUAGE_CODE=='fr'): ?>
					<span class="autor-name"><strong>Publié par <?php echo get_the_author(); ?></strong> | Publié le <?php echo get_the_date(); ?></span>
				<?php elseif(ICL_LANGUAGE_CODE=='en'): ?>
					<span class="autor-name"><strong>Published by <?php echo get_the_author(); ?></strong> | Published on <?php echo get_the_date(); ?></span>
				<?php endif;?>
			</div>
		</div>

		<div class="cbo-container">
			<div class="page-single-content cbo-cms">
				<?php the_content() ?>
			</div>
		</div>

		<?php
			global $flexible_count;
			if( have_rows('flexible_layout') ):
				while ( have_rows('flexible_layout') ) : the_row();
				++$flexible_count;
								
					////////////////////
					//  SECTION HERO
					if( get_row_layout() == 'hero' ): 
						get_template_part( 'templates/components/section-hero');
						
					///////////////////
					//  BLOCS ARTICLES
					elseif( get_row_layout() == 'tranche_articles' ): 
						get_template_part( 'templates/components/section-articles');
				
					///////////////////
					//  BLOCS RELATION
					elseif( get_row_layout() == 'tranche_relation' ): 
						get_template_part( 'templates/components/section-relation');
				
					///////////////////
					//  SECTION VIDEO
					elseif( get_row_layout() == 'tranche_video' ): 
						get_template_part( 'templates/components/section-video');
				
					///////////////////
					//  SECTION TEXTE
					elseif( get_row_layout() == 'tranche_texte' ): 
						get_template_part( 'templates/components/section-txt-simple');
				
					///////////////////
					//  SECTION BLOCS
					elseif( get_row_layout() == 'tranche_blocs' ): 
						get_template_part( 'templates/components/section-blocs');
				
					///////////////////
					//  SECTION TEXTE ET IMAGE
					elseif( get_row_layout() == 'tranche_texte_et_image' ): 
						get_template_part( 'templates/components/section-txt-img');
				
					///////////////////
					//  SECTION BLOCS CHIFFRES CLES
					elseif( get_row_layout() == 'tranche_blocs_chiffres_cle' ): 
						get_template_part( 'templates/components/section-blocs-chiffres-cle');
				
					///////////////////
					//  SECTION TEXTE ET IMAGE
					elseif( get_row_layout() == 'tranche_onglets' ): 
						get_template_part( 'templates/components/section-onglets');
				
					///////////////////
					//  SECTION FEATURED
					elseif( get_row_layout() == 'tranche_mise_en_avant' ): 
						get_template_part( 'templates/components/section-featured');
				
					///////////////////
					//  SECTION BLOCS PROGRAMME
					elseif( get_row_layout() == 'tranche_blocs_programme' ): 
						get_template_part( 'templates/components/section-blocs-programme');
				
					///////////////////
					//  SECTION PARTENAIRES
					elseif( get_row_layout() == 'tranche_partenaires' ): 
						get_template_part( 'templates/components/section-partenaires');
				
					///////////////////
					//  SECTION TEAM
					elseif( get_row_layout() == 'tranche_equipe' ): 
						get_template_part( 'templates/components/section-team');
				
					///////////////////
					//  SECTION ADOPTION
					elseif( get_row_layout() == 'tranche_adoption' ): 
						get_template_part( 'templates/components/section-contact');
				
					///////////////////
					//  SECTION SLIDER
					elseif( get_row_layout() == 'tranche_slider' ): 
						get_template_part( 'templates/components/section-slider');
							
					///////////////////
					//  SECTION DONNEES
					elseif( get_row_layout() == 'tranche_donnes' ): 
						get_template_part( 'templates/components/section-donnees');
						
					///////////////////
					//  SECTION NEWSLETTER
					elseif( get_row_layout() == 'tranche_newsletter' ): 
						get_template_part( 'templates/components/section-newsletter');
				
					///////////////////
					//  SECTION MAP
					elseif( get_row_layout() == 'tranche_map' ): 
						get_template_part( 'templates/components/section-map');
				
					///////////////////
					//  SECTION MAP
					elseif( get_row_layout() == 'tranche_presse' ): 
						get_template_part( 'templates/components/section-presse');
						
				
					endif;
				endwhile;
			endif;
		?>
		<div class="cbo-container">
			<div class="cg-tags-container">
				<?php the_tags( '', '', '' ); ?>
			</div>
		</div>

		<?php if(has_tag()): ?>
			<section class="cbo-sectionrelation cbo-bg-blue">
				<div class="section-inner sectionrelation-inner">
					<div class="cbo-container container-padding">
						<h3 class="cbo-title-2">
							Ces articles pourraient vous intéresser
						</h3>
						<div class="list-el sectionrelation-listing">
							<?php $orig_post = $post;
								global $post;
								$tags = wp_get_post_tags($post->ID);
								if ($tags) {
									$tag_ids = array();
									foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
									$args=array(
										'tag__in' => $tag_ids,
										'post__not_in' => array($post->ID),
										'posts_per_page'=>4,
										'ignore_sticky_posts'=>1 
									);
									$my_query = new wp_query( $args );
									if( $my_query->have_posts() ) {
										while( $my_query->have_posts() ) {
											$my_query->the_post();
											$featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
											get_template_part('templates/content/content','article');
										}
									}
								}
								$post = $orig_post;
								wp_reset_query();
							?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>
		<?php comments_template(); ?> 
	</article>
<?php
	get_footer();
?>