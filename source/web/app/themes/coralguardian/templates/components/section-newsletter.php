<?php
	global $flexible_count;
	$topmarge	= get_sub_field('marge_du_haut');
	$botmarge	= get_sub_field('marge_du_bas');
	$title		= get_sub_field('title');
	$desc		= get_sub_field('court_resume');
	$formnews	= get_sub_field('form_new');
?>

<section id="section-<?php echo $flexible_count; ?>" class="cg-section-newsletter cg-section section-<?php echo $bgcolor ?? "" ?> cg-marge-top-<?php echo $topmarge ?> cg-marge-bot-<?php echo $botmarge ?>">
	<div class="container">
		<?php if( get_sub_field('title') ): ?>
			<h2 class="main-title"><?php echo $title ?></h2>
		<?php endif; ?>
		
		<?php if( get_sub_field('court_resume') ): ?>
			<div class="intro-txt cg-big-txt slide-up">
				<?php echo $desc ?>
			</div>
		<?php endif; ?>
		
		<?php if( get_sub_field('form_new') ): ?>
			<div class="section-txt-content cg-cms slide-up <?php echo $txtsize ?? "" ?>">
				<?php echo $formnews ?>
			</div>
		<?php endif; ?>
	</div><!-- End .container -->
</section><!-- End .cg-section-newsletter -->