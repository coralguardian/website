<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$onglpos	= get_sub_field('alignement_des_onglets');
	$styletabs	= get_sub_field('tabs_style');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cg-section-onglets cg-section section-<?php echo $bgcolor ?>">
	<div class="container">
		<?php if( get_sub_field('title') ): ?>
			<h2 class="main-title"><?php echo $title ?></h2>
		<?php endif; ?>

		<div class="accordeon slide-up">
			<?php
				if( have_rows('onglets') ):
				while( have_rows('onglets') ): the_row();
				$titre	= get_sub_field('titre_de_longlet');
				$txt	= get_sub_field('texte_de_longlet');
				$addpic	= get_sub_field('ajouter_une_image');
				$pic	= get_sub_field('image');
			?>
				<div class="cg-accordeon-content">
					<span class="toggle cg-accordeon_title" href="javascript:void(0);">
						<?php echo $titre; ?>
					</span>
					<div class="cg-accordion-inner cg-cms cg-big-txt">
						<?php if($addpic == 1): ?>
							<div class="onglet-txt-img_pic" style="background: url('<?php echo $pic["url"]; ?>') no-repeat 50% 50%; background-size:cover;"></div>
						<?php endif; ?>
						<?php echo $txt ?>
					</div>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div><!-- End .cg-accordeon -->		
		<!-- Affichage des onglets simples -->
		<?php if($styletabs == 'simple'): ?>
			<?php if( have_rows('onglets') ):?>
				<?php $counter_nav = 1; ?>
				<?php $counter_div = 1; ?>
				<div class="cg-onglets-container">
					<div class="cg-onglets">
						<?php
							while( have_rows('onglets') ): the_row();
							$titre = get_sub_field('titre_de_longlet');
					 		$onglettitlepic = get_sub_field('image_de_longlet');
						?>
							<span class="cg-onglet_title <?php if ($counter_nav == 1) : ?>active<?php endif; ?>" id="onglet_<?php echo $counter_nav; ?>-<?php echo $flexible_count; ?>" >
								<?php if( get_sub_field('image_de_longlet') ): ?>
									<img class="lazy cg-onglet_title-pic" data-src="<?php echo $onglettitlepic["url"]; ?>" alt="<?php echo $onglettitlepic["alt"]; ?>"/>
								<?php endif; ?>
								<?php echo $titre; ?>
							</span>
							<?php $counter_nav++; ?>
						<?php endwhile; ?>
					</div><!-- End .cg-onglets -->
					<?php
						while( have_rows('onglets') ): the_row();
						$texte = get_sub_field('texte_de_longlet');
					?>
						<div class="cg-onglets_content cg-big-txt cg-cms <?php if ($counter_div == 1) : ?>active<?php endif; ?>"  id="contenu_onglet_<?php echo $counter_div; ?>-<?php echo $flexible_count; ?>">
							<?php echo $texte; ?>
						</div>
						<?php $counter_div++; ?>
					<?php endwhile; ?>
				</div><!-- End .cg-onglets-container -->
			<?php endif; ?>
		<?php endif; ?><!-- Fin de l'affichage des onglets simples -->
		<?php if($styletabs == 'fish'): ?><!-- Affichage des onglets avec le poisson -->
			<?php if( have_rows('onglets') ):?>
				<?php $counter_nav = 1; ?>
				<?php $counter_div = 1; ?>
				<div class="cg-onglets-container onglets-fish">
					<div class="cg-onglets">
						<?php
							while( have_rows('onglets') ): the_row();
							$titre = get_sub_field('titre_de_longlet');
						?>
							<span class="cg-onglet_title <?php if ($counter_nav == 1) : ?>active<?php endif; ?>" id="onglet_<?php echo $counter_nav; ?>-<?php echo $flexible_count; ?>" >
								<?php echo $titre; ?>
							</span>
							<?php $counter_nav++; ?>
						<?php endwhile; ?>
					</div><!-- End .cg-onglets -->
					<?php
						while( have_rows('onglets') ): the_row();
						$txt		= get_sub_field('texte_de_longlet');
						$addpic		= get_sub_field('ajouter_une_image');
						$pic		= get_sub_field('image');
					?>
						<div class="cg-onglets_content <?php if ($counter_div == 1) : ?>active<?php endif; ?>"  id="contenu_onglet_<?php echo $counter_div; ?>-<?php echo $flexible_count; ?>">
							<?php if($addpic == 1): ?>
								<div class="onglet-txt-img-container">
									<div class="onglet-txt-img_pic">
										<img class="lazy" data-src="<?php echo $pic["url"]; ?>" alt="<?php echo $pic["alt"]; ?>"/>
									</div>
									<div class="onglet-txt-img_txt cg-cms cg-big-txt">
										<?php echo $txt ?>
									</div>
								</div>
							<?php endif; ?>

							<?php if($addpic == 0): ?>
								<div class="section-txt-img_txt cg-cms">
									<?php echo $txt ?>
								</div>
							<?php endif; ?>
						</div><!-- End .cg-onglets_content -->
						<?php $counter_div++; ?>
					<?php endwhile; ?>
				</div><!-- End .cg-onglets-container -->
			<?php endif; ?>
		<?php endif; ?>
		<!-- Fin de l'affichage des ongles avec le poisson -->
	</div><!-- End .container -->
</section><!-- End .cg-section-onglets -->