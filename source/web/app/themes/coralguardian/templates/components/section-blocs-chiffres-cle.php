<?php
	global $flexible_count;
	$topmarge	= get_sub_field('marge_du_haut');
	$botmarge	= get_sub_field('marge_du_bas');
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$desc		= get_sub_field('resume_de_la_section');
	$blocs		= get_sub_field('blocs');
	$addbt		= get_sub_field('ajouter_un_bouton');
	$bttype		= get_sub_field('type_de_bouton');
	$bttxt		= get_sub_field('texte_du_bouton');
	$btlink		= get_sub_field('lien_du_bouton');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cg-section-blocs-number cg-section section-<?php echo $bgcolor ?> cg-marge-top-<?php echo $topmarge ?> cg-marge-bot-<?php echo $botmarge ?>">
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

		<div class="blocs-number-container">
			<?php foreach($blocs as $bloc): ?>
				<div class="current-bloc bloc-number slide-up">
					<span class="number"><?php echo $bloc["chiffre_cle"]; ?></span>
					<span class="bloc-desc"><?php echo $bloc["description"]; ?></span>
				</div>
			<?php endforeach; ?>
		</div>
		<?php if($addbt == 1): ?>
			<a href="<?php echo $btlink ?>" class="button ripple button--center <?php echo $bttype ?>"><?php echo $bttxt ?></a>
		<?php endif; ?>
	</div><!-- End .container -->
</section><!-- End .cg-section-blocs-number -->