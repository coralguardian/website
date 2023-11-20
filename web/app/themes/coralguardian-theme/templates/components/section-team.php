<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$outro	= get_sub_field('outro');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-sectionteam">
	<div class="cbo-container">
		<?php if( get_sub_field('title') ): ?>
			<h2 class="cbo-title-2">
				<?php echo $title ?>
			</h2>
		<?php endif; ?>

		<?php
			if( have_rows('onglets') ):
			$counter_nav = 1;
			$counter_div = 1;
		?>
			<div class="cg-onglets-container">
				<div class="cg-onglets">
					<?php
						while( have_rows('onglets') ): the_row();
						$titre = get_sub_field('titre_de_longlets');
						$onglettitlepic = get_sub_field('image_de_longlet');
					?>
						<div class="cg-onglet_title <?php if ($counter_nav == 1) : ?>active<?php endif; ?>" id="onglet_<?php echo $counter_nav; ?>-<?php echo $flexible_count; ?>" >
							<div class="cg-onglet_title-pic cbo-picture-contain">
								<img
									src="<?php echo $onglettitlepic['sizes']['thumbnail']; ?>"
									srcset="<?php echo $onglettitlepic['sizes']['thumbnail'] ?> 320w, <?php echo $onglettitlepic['sizes']['thumbnail'] ?> 768w, <?php echo $onglettitlepic['sizes']['thumbnail'] ?> 1024w, <?php echo $onglettitlepic['sizes']['thumbnail'] ?> 1280w"
									alt="<?php echo $onglettitlepic["alt"]; ?>"
									loading="lazy"
									width="150px" height="150px"
								>
							</div>
							<?php echo $titre; ?>
						</div>
						<?php $counter_nav++; ?>
					<?php endwhile; ?>
				</div>

				<div class="team-role">
					<span class="role--blue">Employé·e·s</span>
					<span class="role--sand">Bénévoles</span>
				</div>

				<?php
					while( have_rows('onglets') ): the_row();
					$texte = get_sub_field('texte_de_longlet');
					$outro_de_longlet = get_sub_field('outro_de_longlet');
				?>
					<div class="list-el cg-onglets_content <?php if ($counter_div == 1) : ?>active<?php endif; ?>"  id="contenu_onglet_<?php echo $counter_div; ?>-<?php echo $flexible_count; ?>">
						<?php
							if( have_rows('contenu') ):
							while( have_rows('contenu') ): the_row();
							$pic = get_sub_field('photo_de_profil');
							$name = get_sub_field('nom');
							$desc = get_sub_field('courte_description');
							$fonction = get_sub_field('fonction');
						?>
							<div class="el-inner <?php if($fonction == 'salary'): ?>inner-salary<?php endif; ?>">
								<div class="inner-pic cbo-picture-cover">
									<img
										src="<?php echo $pic['sizes']['thumbnail']; ?>"
										srcset="<?php echo $pic['sizes']['thumbnail'] ?> 320w, <?php echo $pic['sizes']['thumbnail'] ?> 768w, <?php echo $pic['sizes']['thumbnail'] ?> 1024w, <?php echo $pic['sizes']['thumbnail'] ?> 1280w"
										alt="<?php echo $pic["alt"]; ?>"
										loading="lazy"
										width="150px" height="150px"
									>
								</div>
								<span class="inner-name sub-title">
									<?php echo $name; ?>
								</span>
								<span class="inner-desc">
									<?php echo $desc; ?>
								</span>
							</div>
						<?php
							endwhile;
							endif;
						?>

						<div class="ongletscontent-outro cbo-cms">
							<?php echo $outro_de_longlet; ?>
						</div>
					</div>
				<?php 
					$counter_div++;
					endwhile;
				?>
			</div>
		<?php endif; ?>

		<?php if( get_sub_field('outro') ): ?>
			<div class="cbo-chapo slide-up">
				<?php echo $outro ?>
			</div>
		<?php endif; ?>	
	</div>
</section>