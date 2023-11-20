<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$onglpos	= get_sub_field('alignement_des_onglets');
	$styletabs	= get_sub_field('tabs_style');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-sectiononglets cbo-bg-<?php echo $bgcolor ?>">
	<div class="section-inner sectionblocs-inner">
		<div class="cbo-container container-padding paddingtop-<?php echo $paddingtop ?>">
		<?php if( get_sub_field('title') ): ?>
			<h2 class="cbo-title-2"><?php echo $title ?></h2>
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
					<div class="cg-accordion-inner cbo-cms">
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
		</div>	

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
									<img
										src="<?php echo $onglettitlepic['sizes']['thumbnail']; ?>"
										srcset="<?php echo $onglettitlepic['sizes']['thumbnail'] ?> 320w, <?php echo $onglettitlepic['sizes']['thumbnail'] ?> 768w, <?php echo $onglettitlepic['sizes']['thumbnail'] ?> 1024w, <?php echo $onglettitlepic['sizes']['thumbnail'] ?> 1280w"
										alt="<?php echo $onglettitlepic["alt"]; ?>"
										loading="lazy"
										class="cg-onglet_title-pic"
										width="50px" height="50px"
									>
								<?php endif; ?>
								<?php echo $titre; ?>
							</span>
							<?php $counter_nav++; ?>
						<?php endwhile; ?>
					</div>
					<?php
						while( have_rows('onglets') ): the_row();
						$texte = get_sub_field('texte_de_longlet');
					?>
						<div class="cg-onglets_content cbo-cms <?php if ($counter_div == 1) : ?>active<?php endif; ?>"  id="contenu_onglet_<?php echo $counter_div; ?>-<?php echo $flexible_count; ?>">
							<?php echo $texte; ?>
						</div>
						<?php $counter_div++; ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if($styletabs == 'fish'): ?>
			<?php 
				if( have_rows('onglets') ):
				$counter_nav = 1;
				$counter_div = 1;
			?>
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
					</div>

					<?php
						while( have_rows('onglets') ): the_row();
						$txt		= get_sub_field('texte_de_longlet');
						$addpic		= get_sub_field('ajouter_une_image');
						$pic		= get_sub_field('image');
					?>
						<div class="cg-onglets_content <?php if ($counter_div == 1) : ?>active<?php endif; ?>"  id="contenu_onglet_<?php echo $counter_div; ?>-<?php echo $flexible_count; ?>">
							<?php if($addpic == 1): ?>
								<div class="onglet-txt-img-container">
									<div class="cbo-picture-cover">
										<img
											src="<?php echo $pic['sizes']['large']; ?>"
											srcset="<?php echo $pic['sizes']['small'] ?> 320w, <?php echo $pic['sizes']['small'] ?> 768w, <?php echo $pic['sizes']['large'] ?> 1024w, <?php echo $pic['sizes']['large'] ?> 1280w"
											alt="<?php echo $pic["alt"]; ?>"
											loading="lazy"
											width="500px" height="500px"
										>
									</div>
									<div class="onglet-txt-img_txt cbo-cms">
										<div class="txt-content">
											<?php echo $txt ?>
										</div>
									</div>
								</div>
							<?php endif; ?>

							<?php if($addpic == 0): ?>
								<div class="section-txt-img_txt cbo-cms">
									<?php echo $txt ?>
								</div>
							<?php endif; ?>
						</div>
						<?php $counter_div++; ?>
					<?php endwhile; ?>

				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>