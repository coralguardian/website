<?php
	global $flexible_count;
	$bgcolor	= get_sub_field('bg_color');
	$paddingtop	= get_sub_field('padding_top');
	$title		= get_sub_field('title');
	$desc		= get_sub_field('court_resume');
	$txtsize	= get_sub_field('txt-size');
	$txt		= get_sub_field('zone_de_texte');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-sectiontxt cbo-bg-<?php echo $bgcolor ?>">
	<div class="section-inner sectiontxt-inner">
		<div class="cbo-container container-padding paddingtop-<?php echo $paddingtop ?>">
			<?php if( get_sub_field('title') ): ?>
				<h2 class="cbo-title-2 slide-up">
					<?php echo $title ?>
				</h2>
			<?php endif; ?>

			<?php if( get_sub_field('court_resume') ): ?>
				<div class="cbo-chapo slide-up">
					<?php echo $desc ?>
				</div>
			<?php endif; ?>

			<?php if( get_sub_field('zone_de_texte') ): ?>
				<div class="sectiontxt-content cbo-cms slide-up <?php echo $txtsize ?>">
					<?php echo $txt ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>