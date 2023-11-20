<?php
	global $flexible_count;
	$bgcolor	= get_sub_field('bg_color');
	$paddingtop	= get_sub_field('padding_top');
	$title		= get_sub_field('title');
	$desc		= get_sub_field('resume_de_la_section');
	$size		= get_sub_field('taille_de_la_section');
	$blocstitle	= get_sub_field('titre_des_blocs');
	$addbt		= get_sub_field('ajouter_un_bouton');
	$bttype		= get_sub_field('type_de_bouton');
	$bttxt		= get_sub_field('texte_du_bouton');
	$btlink		= get_sub_field('lien_du_bouton');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-sectionblocs cbo-bg-<?php echo $bgcolor ?>">
	<div class="section-inner sectionblocs-inner">
		<div class="cbo-container container-padding paddingtop-<?php echo $paddingtop ?>">
			<?php if( get_sub_field('title') ): ?>
				<h2 class="cbo-title-2">
					<?php echo $title ?>
				</h2>
			<?php endif; ?>

			<?php if( get_sub_field('resume_de_la_section') ): ?>
				<div class="cbo-chapo slide-up">
					<?php echo $desc ?>
				</div>
			<?php endif; ?>

			<?php if( get_sub_field('titre_des_blocs') ): ?>
				<h3 class="sectionblocs-title cbo-title-3 slide-up">
					<?php echo $blocstitle ?>
				</h3>
			<?php endif; ?>

			<div class="list-el size-<?php echo $size ?>">
				<?php
					if( have_rows('blocs') ): 
					while( have_rows('blocs') ): the_row();
					$url		= get_sub_field('bloc_url');
					$picto		= get_sub_field('picto');
					$chiffre		= get_sub_field('chiffre');
					$title		= get_sub_field('titre_du_bloc');
					$description		= get_sub_field('description');
				?>
					<div class="el-inner slide-up <?php the_sub_field('couleur_du_bloc'); ?>">
						<?php if( get_sub_field('bloc_url') ): ?>
							<a class="inner-content" href="<?php echo $url ?>">
						<?php else : ?>
							<div class="inner-content">
						<?php endif; ?>

							<?php if( get_sub_field('ajouter_une_image') ): ?>
								<div class="content-pic cbo-picture-contain slide-up">
									<img
										src="<?php echo $picto['sizes']['thumbnail']; ?>"
										srcset="<?php echo $picto['sizes']['thumbnail'] ?> 320w, <?php echo $picto['sizes']['thumbnail'] ?> 768w, <?php echo $picto['sizes']['thumbnail'] ?> 1024w, <?php echo $picto['sizes']['thumbnail'] ?> 1280w"
										alt="<?php echo $picto["alt"]; ?>"
										loading="lazy"
										width="91px" height="95px"
									>
								</div>
							<?php endif; ?>
							
							<?php if( get_sub_field('ajouter_un_chiffre_cle') ): ?>
								<span class="bloc-number slide-up"><?php echo $chiffre ?></span>
							<?php endif; ?>
							
							<span class="cbo-title-3 content-title">
								<?php echo $title ?>
							</span>

							<?php if( get_sub_field('description') ): ?>
								<span class="content-desc">
									<?php echo $description ?>
								</span>
							<?php endif; ?>

						<?php if( get_sub_field('bloc_url') ): ?>
							</a>
						<?php else : ?>
							</div>
						<?php endif; ?>
					</div>
				<?php
					endwhile;
					endif;
				?>
			</div>

			<?php if($addbt == 1): ?>
				<div class="cbo-buttonscontainer">
					<a href="<?php echo $btlink ?>" class="button ripple <?php echo $bttype ?>"><?php echo $bttxt ?></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>