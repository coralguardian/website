<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$titledonnees = get_sub_field('titre_des_donnees');
	$txtdonnees = get_sub_field('texte_des_donnees');
?>

<section id="section-<?php echo $flexible_count; ?>" class="cg-section-donnes cg-section section-<?php echo $bgcolor ?>">
	<div class="container">
		<?php if( get_sub_field('title') ): ?>
			<h2 class="main-title"><?php echo $title ?></h2>
		<?php endif; ?>
		<div class="cg-onglets-container">
			<?php 
				if( have_rows('onglets') ):
				$counter_nav = 1;
				$counter_pic = 1;
				$counter_div = 1;
			?>
				<div class="cg-onglets">
					<div class="cg-onglets-inner">
						<?php
							while( have_rows('onglets') ): the_row();
							$titre = get_sub_field('titre_de_longlet');
							$ongletpic = get_sub_field('image_de_longlet');
						?>
							<span class="cg-onglet_title <?php if ($counter_nav == 1) : ?>active<?php endif; ?>" id="onglet_<?php echo $counter_nav; ?>-<?php echo $flexible_count; ?>" >
								<?php echo $titre; ?>
							</span>
							<span class="onglet-pic lazy <?php if ($counter_pic == 1) : ?>active<?php endif; ?>" id="pic_onglet_<?php echo $counter_nav; ?>-<?php echo $flexible_count; ?>" data-bg="<?php echo $ongletpic; ?>"></span>
							<?php $counter_nav++; ?>
							<?php $counter_pic++; ?>
						<?php endwhile; ?>
						
					</div>
				</div><!-- End .cg-onglets -->
			<?php endif; ?>
			
			<div class="donnees-container">
				<span class="donnees-title"><?php echo $titledonnees; ?></span>
				<span class="donnees-txt"><?php echo $txtdonnees; ?></span>
				
				<div class="svg-container">
					<svg name="Graph chart" class="graph" version="1.1" x="0px" y="0px" viewBox="0 0 404 282" style="enable-background:new 0 0 404 282" xml:space="preserve">
						
						<g id="Layer_1">
							<g id="Graphique" transform="translate(39.000000, 234.000000)">
								<path class="graph-line" d="M316.5-5.5l14,7l-14,7v-6H4.5c-0.6,0-1-0.4-1-1c0-0.5,0.4-0.9,0.9-1l0.1,0h312V-5.5z"></path>
							</g>
							<g id="Group" transform="translate(40.000000, 194.000000)">
								<line class="small-line" x1="4.5" y1="21.5" x2="10.5" y2="21.5"></line>
								<line class="small-line" x1="4.5" y1="1.5" x2="10.5" y2="1.5"></line>
								<line class="small-line" x1="4.5" y1="-18.5" x2="10.5" y2="-18.5"></line>
								<line class="small-line" x1="4.5" y1="-38.5" x2="10.5" y2="-38.5"></line>
								<line class="small-line" x1="4.5" y1="-58.5" x2="10.5" y2="-58.5"></line>
								<line class="small-line" x1="4.5" y1="-78.5" x2="10.5" y2="-78.5"></line>
								<line class="small-line" x1="4.5" y1="-98.5" x2="10.5" y2="-98.5"></line>
								<line class="small-line" x1="4.5" y1="-118.5" x2="10.5" y2="-118.5"></line>
								<line class="small-line" x1="4.5" y1="-138.5" x2="10.5" y2="-138.5"></line>
							</g>
							<path class="graph-line" d="M43,12l7,14l-6,0l0.5,209.6c0,0.6-0.4,1-1,1c-0.5,0-0.9-0.4-1-0.9l0-0.1L42,26l-6,0L43,12z"></path>
						</g>
					</svg>
					
					<div class="chart-container">
						<?php
							if( have_rows('onglets') ):
							while( have_rows('onglets') ): the_row();
						?>
							<div class="cg-onglets_content cg-cms <?php if ($counter_div == 1) : ?>active<?php endif; ?>"  id="contenu_onglet_<?php echo $counter_div; ?>-<?php echo $flexible_count; ?>">
								<div class="bar-chart-container">
									<?php
										if( have_rows('donnees') ):
										while( have_rows('donnees') ): the_row();
										$nombre = get_sub_field('nombre');
									?>
										<span class="bar-chart" data-percent="<?php echo $nombre; ?>">
											<span><?php echo $nombre; ?></span>
										</span>
									<?php
										endwhile;
										endif;
										$counter_div++;
									?>
								</div>
							</div><!-- End .cg-onglets_content -->
						<?php
							endwhile;
							endif;
						?>
					</div><!-- End .chart-container -->
				</div><!-- End .svg-container -->
			</div><!-- End .donnees-container -->
		</div><!-- End .cg-onglets-container -->
	</div><!-- End .container -->
</section><!-- End .cg-section-donnes -->