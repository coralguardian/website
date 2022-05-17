<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$desc		= get_sub_field('resume_de_la_section');
	$size		= get_sub_field('taille_de_la_section');
	$blocstitle	= get_sub_field('titre_des_blocs');
	$addbt		= get_sub_field('ajouter_un_bouton');
	$bttype		= get_sub_field('type_de_bouton');
	$bttxt		= get_sub_field('texte_du_bouton');
	$btlink		= get_sub_field('lien_du_bouton');
	$blalign		= get_sub_field('alignement_des_blocs');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cg-section-blocs cg-section section-<?php echo $bgcolor ?>">
	<div class="container">
		<?php if( get_sub_field('title') ): ?>
			<h2 class="main-title">
				<?php echo $title ?>
			</h2>
		<?php endif; ?>
		<?php if( get_sub_field('resume_de_la_section') ): ?>
			<div class="intro-txt cg-big-txt slide-up">
				<?php echo $desc ?>
			</div>
		<?php endif; ?>
		<?php if( get_sub_field('titre_des_blocs') ): ?>
			<div class="blocs-title slide-up">
				<?php echo $blocstitle ?>
			</div>
		<?php endif; ?>
		<div class="blocs-container <?php echo $size ?> <?php echo $blalign ?>">
			<?php
				if( have_rows('blocs') ): 
				while( have_rows('blocs') ): the_row();
			 	$picto		= get_sub_field('picto');
			?>
				<div class="current-bloc slide-up <?php the_sub_field('couleur_du_bloc'); ?>">
					<?php if( get_sub_field('bloc_url') ): ?>
						<a class="cg-ghost-link" href="<?php the_sub_field('bloc_url'); ?>"></a>
					<?php endif; ?>
					<?php if( get_sub_field('ajouter_une_image') ): ?>
						<img class="bloc-pic slide-up lazy" data-src="<?php echo $picto["url"]; ?>" alt="<?php echo $picto["alt"]; ?>"/>
					<?php endif; ?>
					
					<?php if( get_sub_field('ajouter_un_chiffre_cle') ): ?>
						<span class="bloc-number slide-up"><?php the_sub_field('chiffre'); ?></span>
					<?php endif; ?>
					
					<span class="bloc-title"><?php the_sub_field('titre_du_bloc'); ?></span>
					<span class="bloc-desc"><?php the_sub_field('description'); ?></span>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
		<?php if($addbt == 1): ?>
			<a href="<?php echo $btlink ?>" class="button ripple button--center <?php echo $bttype ?>"><?php echo $bttxt ?></a>
		<?php endif; ?>
	</div><!-- End .container -->
</section><!-- End .cg-section-txt -->