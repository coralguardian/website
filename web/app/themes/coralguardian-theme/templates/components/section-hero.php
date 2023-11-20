<?php
	global $flexible_count;
	$pic		= get_sub_field('pic');
	$title		= get_sub_field('title');
	$desc		= get_sub_field('texte_dintroduction');
	$addform	= get_sub_field('ajouter_un_formulaire_dadoption');
	$form		= get_sub_field('formulaire');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-hero">
	<div class="cbo-container container-large container-nomargin container-padding hero-inner">
		<div class="inner-content cg-relative">
			<?php if($addform == 1): ?>
				<div class="hero-form">
					<div class="hero-form-left">
						<div class="content-title">
							<?php echo $title ?>
						</div>
						<?php if( get_sub_field('texte_dintroduction') ): ?>
							<div class="cbo-chapo">
								<?php echo $desc ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="hero-form-right">
						<?php echo $form ?>
					</div>
				</div>

			<?php else : ?>

				<div class="content-title">
					<?php echo $title ?>
				</div>
				<?php if( get_sub_field('texte_dintroduction') ): ?>
					<div class="cbo-chapo">
						<?php echo $desc ?>
					</div>
				<?php endif; ?>

			<?php endif; ?>
		</div>
	</div>
	<div class="hero-picture cbo-picture-cover">
		<img
			src="<?php echo $pic['sizes']['xlarge']; ?>"
			srcset="<?php echo $pic['sizes']['xlarge'] ?> 320w, <?php echo $pic['sizes']['xlarge'] ?> 768w, <?php echo $pic['sizes']['xlarge'] ?> 1024w, <?php echo $pic['sizes']['xlarge'] ?> 1280w"
			alt="<?php echo $pic["alt"]; ?>"
			loading="lazy"
			width="1900px" height="700px"
		>
	</div>
</section>