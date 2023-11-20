<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$desc		= get_sub_field('section_intro');
	$bgcolor	= get_sub_field('bg_color');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-sectionprogramme cbo-bg-<?php echo $bgcolor ?>">
	<div class="section-inner sectionprogramme-inner">
		<div class="cbo-container container-padding">
			<?php if( get_sub_field('title') ): ?>
				<h2 class="cbo-title-2">
					<?php echo $title ?>
				</h2>
			<?php endif; ?>

			<?php if( get_sub_field('section_intro') ): ?>
				<div class="cbo-chapo slide-up">
					<?php echo $desc ?>
				</div>
			<?php endif; ?>

			<div class="el-list slide-up">
				<?php
					if( have_rows('blocs') ): 
					while( have_rows('blocs') ): the_row();
					$addpic		= get_sub_field('add_bg_pic');
					$url		= get_sub_field('url_du_bloc');
					$year		= get_sub_field('annee');
					$title		= get_sub_field('titre_du_programme');
					$desc		= get_sub_field('description');
					$pic		= get_sub_field('background_pic');
				?>
					<?php if( get_sub_field('url_du_bloc') ): ?>
						<a class="el-inner" href="<?php echo $url ?>">
					<?php else : ?>
						<span class="el-inner">
					<?php endif; ?>
						<span class="inner-content">
							<span class="inner-year">
								<?php echo $year ?>
							</span>
							<span class="inner-title">
								<?php echo $title ?>
							</span>
							<span class="inner-desc">
								<?php echo $desc ?>
							</span>

							<span class="inner-picture cbo-picture-cover">
								<img
									src="<?php echo $pic['sizes']['small']; ?>"
									srcset="<?php echo $pic['sizes']['small'] ?> 320w, <?php echo $pic['sizes']['small'] ?> 768w, <?php echo $pic['sizes']['small'] ?> 1024w, <?php echo $pic['sizes']['small'] ?> 1280w"
									alt="<?php echo $pic["alt"]; ?>"
									loading="lazy"
									width="300px" height="300px"
								>
							</span>
						</span>
					<?php if( get_sub_field('url_du_bloc') ): ?>
						</a>
					<?php else : ?>
					</span>
					<?php endif; ?>
				<?php
					endwhile;
					endif;
				?>
			</div>
		</div>
	</div>
</section>