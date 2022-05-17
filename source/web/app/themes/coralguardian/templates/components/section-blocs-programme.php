<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$pgsize		= get_sub_field('program_size');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cg-section-blocs-programme cg-section section-<?php echo $bgcolor ?>">
	<div class="container">
		<?php if( get_sub_field('title') ): ?>
			<h2 class="main-title slide-up">
				<?php echo $title ?>
			</h2>
		<?php endif; ?>

		<div class="blocs-container slide-up <?php echo $pgsize ?>">
			<?php
				if( have_rows('blocs') ): 
				while( have_rows('blocs') ): the_row();
			 	$addpic		= get_sub_field('add_bg_pic');
			?>
				<?php if($addpic == 1): ?>
					<div class="current-bloc bloc-programme bloc-progamme-pic lazy" data-bg="<?php the_sub_field('background_pic'); ?>">
						<?php if( get_sub_field('url_du_bloc') ): ?>
							<a class="cg-ghost-link" href="<?php the_sub_field('url_du_bloc'); ?>"></a>
						<?php endif; ?>
						<span class="progamme-year cg-relative"><?php the_sub_field('annee'); ?></span>
						<span class="bloc-title cg-relative"><?php the_sub_field('titre_du_programme'); ?></span>
						<span class="progamme-desc cg-relative"><?php the_sub_field('description'); ?></span>
						<div class="cg-mask medium"></div>
					</div>
				<?php endif; ?>
			
				<?php if($addpic == 0): ?>
					<div class="current-bloc bloc-programme">
						<?php if( get_sub_field('url_du_bloc') ): ?>
							<a class="cg-ghost-link" href="<?php the_sub_field('url_du_bloc'); ?>"></a>
						<?php endif; ?>
						<span class="progamme-year"><?php the_sub_field('annee'); ?></span>
						<span class="bloc-title"><?php the_sub_field('titre_du_programme'); ?></span>
						<span class="progamme-desc"><?php the_sub_field('description'); ?></span>
					</div>
				<?php endif; ?>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div><!-- End .container -->
</section><!-- End .cg-section-blocs-programme -->