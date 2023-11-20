<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$txt		= get_sub_field('texte');
	$form		= get_sub_field('formulaire_dadoption');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-sectioncontact cbo-bg-<?php echo $bgcolor ?>">
	<div class="section-inner sectioncontact-inner">
		<div class="cbo-container container-padding sectioncontact-container">
			<div class="sectioncontact-content slide-right">
				<?php if( get_sub_field('title') ): ?>
					<h2 class="sectioncontact-title cbo-title-2">
						<?php echo $title ?>
					</h2>
				<?php endif; ?>
				<div class="cbo-chapo">
					<?php echo $txt ?>
				</div>
			</div>

			<div class="sectioncontact-form slide-left">
				<?php echo $form ?>
			</div>
		</div>
	</div>
</section>