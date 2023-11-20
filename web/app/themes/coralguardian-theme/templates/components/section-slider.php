<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$paddingtop	= get_sub_field('padding_top');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-sectionslider cbo-bg-<?php echo $bgcolor ?>">
	<div class="section-inner sectionrelation-inner">
		<div class="cbo-container container-padding paddingtop-<?php echo $paddingtop ?>">
			<?php if( get_sub_field('title') ): ?>
				<h2 class="cbo-title-2">
					<?php echo $title ?>
				</h2>
			<?php endif; ?>

			<div class="slider-container slide-up">
				<?php
					if( have_rows('slider') ):
					while ( have_rows('slider') ) : the_row();
					$pic	= get_sub_field('image');
				?>
					<div class="slider-el">
						<div class="el-inner">
							<div class="inner-content">
								<span class="content-title"><?php  the_sub_field('titre'); ?></span>
								<span class="content-legende"><?php  the_sub_field('legende'); ?></span>
							</div>
							<div class="inner-picture cbo-picture-cover">
								<img
									src="<?php echo $pic['sizes']['small']; ?>"
									srcset="<?php echo $pic['sizes']['small'] ?> 320w, <?php echo $pic['sizes']['small'] ?> 768w, <?php echo $pic['sizes']['small'] ?> 1024w, <?php echo $pic['sizes']['small'] ?> 1280w"
									alt="<?php echo $pic["alt"]; ?>"
									loading="lazy"
									width="600px" height="600px"
								>
							</div>
						</div>
					</div>
				<?php
					endwhile;
					endif;
				?>
			</div>
		</div>
	</div>
</section>