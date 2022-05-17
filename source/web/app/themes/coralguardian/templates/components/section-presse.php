<?php
	global $flexible_count;
	$topmarge	= get_sub_field('marge_du_haut');
	$botmarge	= get_sub_field('marge_du_bas');
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$desc		= get_sub_field('court_resume');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cg-section-presse cg-section section-<?php echo $bgcolor ?>">
	<div class="container">
		<?php if( get_sub_field('title') ): ?>
			<h2 class="main-title"><?php echo $title ?></h2>
		<?php endif; ?>

		<div class="blocs-container">
			<?php
				if( have_rows('blocs') ): 
				while( have_rows('blocs') ): the_row();
				$typelink	= get_sub_field('type_de_lien');
				$pic		= get_sub_field('pic');
			?>
				<div class="bloc-presse slide-up">
					<?php if($typelink == 'lienext'): ?>
						<a class="cg-ghost-link" href="<?php the_sub_field('lien'); ?>" target="_blank"></a>
					<?php endif; ?>
					<?php if($typelink == 'file'): ?>
						<a class="cg-ghost-link" href="<?php the_sub_field('fichier'); ?>" target="_blank"></a>
					<?php endif; ?>
					<span class="presse-title">
						<?php if( get_sub_field('pic') ): ?>
							<img class="bloc-pic slide-up lazy" data-src="<?php echo $pic["url"]; ?>" alt="<?php echo $pic["alt"]; ?>"/>
						<?php endif; ?>
						<?php the_sub_field('titre_du_bloc'); ?>
					</span>
					<span class="presse-desc"><?php the_sub_field('description'); ?></span>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div><!-- End .container -->
</section><!-- End .cg-section-presse -->