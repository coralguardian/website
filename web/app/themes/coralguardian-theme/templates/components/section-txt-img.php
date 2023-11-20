<?php
	global $flexible_count;
	$paddingtop	= get_sub_field('padding_top');
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$desc		= get_sub_field('court_resume');
	$picpos		= get_sub_field('position_de_limage');
	$txt		= get_sub_field('texte');
	$pic		= get_sub_field('image');
	$animtxt	= get_sub_field('animation_du_texte');
	$animpic	= get_sub_field('animation_de_limage');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-sectiontxtimg cbo-bg-<?php echo $bgcolor ?>">
	<div class="section-inner sectiontxtimg-inner">
		<div class="cbo-container container-large container-padding paddingtop-<?php echo $paddingtop ?>">

			<?php if( get_sub_field('title') ): ?>
				<h2 class="cbo-title-2">
					<?php echo $title ?>
				</h2>
			<?php endif; ?>

			<?php if( get_sub_field('court_resume') ): ?>
				<div class="cbo-chapo slide-up">
					<?php echo $desc ?>
				</div>
			<?php endif; ?>

			<div class="sectiontxtimg-container pic-<?php echo $picpos ?>">
				<div class="container-picture cbo-picture-cover  slide-<?php echo $animpic ?>">
					<img
						src="<?php echo $pic['sizes']['large']; ?>"
						srcset="<?php echo $pic['sizes']['small'] ?> 320w, <?php echo $pic['sizes']['small'] ?> 768w, <?php echo $pic['sizes']['large'] ?> 1024w, <?php echo $pic['sizes']['large'] ?> 1280w"
						alt="<?php echo $pic["alt"]; ?>"
						loading="lazy"
						width="500px" height="1000px"
					>
				</div>

				<div class="container-txt cbo-cms slide-<?php echo $animtxt ?>" >
					<?php echo $txt ?>
				</div>
			</div>
		</div>
	</div>
</section>