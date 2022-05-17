<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$scrolllink	= get_sub_field('scroll_link');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cg-section-team cg-section section-<?php echo $bgcolor ?>">
	<div class="container">
		<?php if( get_sub_field('title') ): ?>
			<h2 class="main-title">
				<?php echo $title ?>
			</h2>
		<?php endif; ?>
		
		<div class="accordeon slide-up">
			<?php
				if( have_rows('onglets') ):
				while( have_rows('onglets') ): the_row();
				$titre = get_sub_field('titre_de_longlets');
			?>
				<div class="cg-accordeon-content">
					<span class="toggle cg-accordeon_title" href="javascript:void(0);">
						<?php echo $titre; ?>
					</span>
					<div class="cg-accordion-inner st-cms">
						<?php
							if( have_rows('contenu') ):
							while( have_rows('contenu') ): the_row();
							$pic = get_sub_field('photo_de_profil');
							$name = get_sub_field('nom');
							$desc = get_sub_field('courte_description');
						?>
							<div class="bloc-team">
								<span class="team-pic" style="background:url(<?php echo $pic; ?>) no-repeat center;background-size:cover"></span>
								<span class="team-name sub-title"><?php echo $name; ?></span>
								<span class="team-desc"><?php echo $desc; ?></span>
							</div>
						<?php
							endwhile;
							endif;
						?>
					</div>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div><!-- End .cg-accordeon -->

		<?php if( have_rows('onglets') ):?>
			<?php $counter_nav = 1; ?>
			<?php $counter_div = 1; ?>
			<div class="cg-onglets-container">
				<div class="cg-onglets">
					<?php
						while( have_rows('onglets') ): the_row();
						$titre = get_sub_field('titre_de_longlets');
						$onglettitlepic = get_sub_field('image_de_longlet');
					?>
						<span class="cg-onglet_title <?php if ($counter_nav == 1) : ?>active<?php endif; ?>" id="onglet_<?php echo $counter_nav; ?>-<?php echo $flexible_count; ?>" >
							<img class="cg-onglet_title-pic" src="<?php echo $onglettitlepic; ?>" alt="L'équipe Coral Guardian">
							<?php echo $titre; ?>
						</span>
						<?php $counter_nav++; ?>
					<?php endwhile; ?>
				</div><!-- End .cg-onglets -->

				<?php
					while( have_rows('onglets') ): the_row();
					$texte = get_sub_field('texte_de_longlet');
				?>
					<div class="cg-onglets_content <?php if ($counter_div == 1) : ?>active<?php endif; ?>"  id="contenu_onglet_<?php echo $counter_div; ?>-<?php echo $flexible_count; ?>">
						<?php
							if( have_rows('contenu') ):
							while( have_rows('contenu') ): the_row();
							$pic = get_sub_field('photo_de_profil');
							$name = get_sub_field('nom');
							$desc = get_sub_field('courte_description');
						?>
							<div class="bloc-team">
								<span class="team-pic lazy" style="background:url(<?php echo $pic; ?>) no-repeat center;background-size:cover"></span>
								<span class="team-name sub-title"><?php echo $name; ?></span>
								<span class="team-desc"><?php echo $desc; ?></span>
							</div>
						<?php
							endwhile;
							endif;
						?>
					</div>
					<?php $counter_div++; ?>
				<?php endwhile; ?>
			</div><!-- End .cg-onglets-container -->
		<?php endif; ?>
	</div><!-- End .container -->
</section><!-- End .cg-section-team -->