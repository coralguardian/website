<?php
	/* Template Name: Template Page flexible */
	get_header();
?>
    <div class="page-flexible">
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
						get_template_part( 'templates/components/section-adoption');
		
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
	</div><!-- End .page-flexible -->
<?php
	get_footer();
?>