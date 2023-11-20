<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$desc		= get_sub_field('court_resume');
	$formnews	= get_sub_field('form_new');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-sectionnewsletter">
	<div class="cbo-container container-padding sectionnewsletter-inner">
		<div class="sectionnewsletter-content">
			<?php if( get_sub_field('title') ): ?>
				<h2 class="cbo-title-2"><?php echo $title ?></h2>
			<?php endif; ?>

			<?php if( get_sub_field('court_resume') ): ?>
				<div class="cbo-chapo slide-up">
					<?php echo $desc ?>
				</div>
			<?php endif; ?>

			<?php if( get_sub_field('form_new') ): ?>
				<div class="sectionnewsletter-form slide-up <?php echo $txtsize ?? "" ?>">
					<?php echo $formnews ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>