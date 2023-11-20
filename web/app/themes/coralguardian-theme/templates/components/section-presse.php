<?php
	global $flexible_count;
	$paddingtop	= get_sub_field('padding_top');
	$title		= get_sub_field('title');
	$resume		= get_sub_field('resume_de_la_section');
	$bgcolor	= get_sub_field('bg_color');
	$desc		= get_sub_field('court_resume');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-sectionpress cbo-bg-<?php echo $bgcolor ?>">
	<div class="section-inner sectionpress-inner">
		<div class="cbo-container container-padding paddingtop-<?php echo $paddingtop ?>">
			<?php if( get_sub_field('title') ): ?>
				<h2 class="cbo-title-2">
					<?php echo $title ?>
				</h2>
			<?php endif; ?>

			<?php if( get_sub_field('resume_de_la_section') ): ?>
				<div class="cbo-chapo slide-up">
					<?php echo $resume ?>
				</div>
			<?php endif; ?>
		
			<div class="list-el">
				<?php
					if( have_rows('blocs') ): 
					while( have_rows('blocs') ): the_row();
					$typelink	= get_sub_field('type_de_lien');
					$pic		= get_sub_field('pic');
				?>
					<a
						class="el-inner slide-up"
						<?php if($typelink == 'lienext'): ?>href="<?php the_sub_field('lien'); ?>" <?php endif; ?>
						<?php if($typelink == 'file'): ?>href="<?php the_sub_field('fichier'); ?>"<?php endif; ?>
						target="_blank"
					>
						<span class="inner-content">
							<?php if( get_sub_field('pic') ): ?>
								<div class="inner-picture cbo-picture-contain">
									<img
										src="<?php echo $pic['sizes']['xsmall']; ?>"
										srcset="<?php echo $pic['sizes']['xsmall'] ?> 320w, <?php echo $pic['sizes']['xsmall'] ?> 768w, <?php echo $pic['sizes']['xsmall'] ?> 1024w, <?php echo $pic['sizes']['xsmall'] ?> 1280w"
										alt="<?php echo $pic["alt"]; ?>"
										loading="lazy"
										width="100px" height="100px"
									>
								</div>
							<?php endif; ?>
							<span class="inner-title cbo-title-3">
								<?php the_sub_field('titre_du_bloc'); ?>
							</span>
							<span class="inner-desc">
								<?php the_sub_field('description'); ?>
							</span>
						</span>
					</a>
				<?php
					endwhile;
					endif;
				?>
			</div>
		</div>
	</div>
</section>