<?php
	global $flexible_count;
	$topmarge	= get_sub_field('marge_du_haut');
	$botmarge	= get_sub_field('marge_du_bas');
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$desc		= get_sub_field('court_resume');
	$picpos		= get_sub_field('position_de_limage');
	$txt		= get_sub_field('texte');
	$pic		= get_sub_field('image');
	$animtxt	= get_sub_field('animation_du_texte');
	$animpic	= get_sub_field('animation_de_limage');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cg-section-txt-img cg-section section-<?php echo $bgcolor ?> cg-marge-top-<?php echo $topmarge ?> cg-marge-bot-<?php echo $botmarge ?>">
	<div class="container">
		<?php if( get_sub_field('title') ): ?>
			<h2 class="main-title">
				<?php echo $title ?>
			</h2>
		<?php endif; ?>
		<?php if( get_sub_field('court_resume') ): ?>
			<div class="intro-txt cg-big-txt slide-up">
				<?php echo $desc ?>
			</div>
		<?php endif; ?>
		<div class="txt-img-container pic-<?php echo $picpos ?>">
			<div class="section-txt-img_pic lazy slide-<?php echo $animpic ?>" data-bg="<?php echo $pic; ?>"></div>
			<div class="section-txt-img_txt cg-cms cg-big-txt slide-<?php echo $animtxt ?>" >
				<?php echo $txt ?>
			</div>
		</div><!-- End .txt-img-container -->
	</div><!-- End .container -->
</section><!-- End .cg-section-txt-img -->