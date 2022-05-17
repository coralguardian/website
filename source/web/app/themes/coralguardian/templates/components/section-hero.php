<?php
	global $flexible_count;
	$pic		= get_sub_field('pic');
	$title		= get_sub_field('title');
	$desc		= get_sub_field('texte_dintroduction');
	$addform	= get_sub_field('ajouter_un_formulaire_dadoption');
	$form		= get_sub_field('formulaire');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cg-section-hero lazy" data-parallax="scroll" data-image-src="<?php echo $pic ?>">
	<div class="container hero-content cg-relative">
		<?php if($addform == 1): ?>
			<div class="hero-form">
				<div class="hero-form-left">
					<div class="hero-title"><?php echo $title ?></div>
					<?php if( get_sub_field('texte_dintroduction') ): ?>
						<div class="intro-txt cg-big-txt slide-up">
							<?php echo $desc ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="hero-form-right">
					<?php echo $form ?>
				</div>
			</div><!-- End .hero-type-form -->
		<?php else : ?>
			<div class="hero-title"><?php echo $title ?></div>
			<?php if( get_sub_field('texte_dintroduction') ): ?>
				<div class="intro-txt cg-big-txt slide-up">
					<?php echo $desc ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div><!-- End .hero-content -->
</section><!-- End .cg-section-hero -->