<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$txt		= get_sub_field('texte');
	$formpos	= get_sub_field('position_du_formulaire');
	$form		= get_sub_field('formulaire_dadoption');
	$animtxt	= get_sub_field('animation_du_texte');
	$animform	= get_sub_field('animation_du_formulaire');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cg-section-adoption cg-section section-<?php echo $bgcolor ?> cg-marge-top-<?php echo $topmarge ?? "" ?> cg-marge-bot-<?php echo $botmarge ?? "" ?>">
	<div class="container">
		<div class="section-adoption-container form-<?php echo $formpos ?>">
			<div class="section-adoption-txt cg-cms cg-big-txt slide-<?php echo $animtxt ?>">
				<?php if( get_sub_field('title') ): ?>
					<h2 class="main-title">
						<?php echo $title ?>
					</h2>
				<?php endif; ?>
				<?php echo $txt ?>
			</div>
			<div class="section-adoption-form slide-<?php echo $animform ?>">
				<?php echo $form ?>
			</div>
		</div><!-- End .txt-img-container -->
	</div><!-- End .container -->
</section><!-- End .cg-section-txt-img -->