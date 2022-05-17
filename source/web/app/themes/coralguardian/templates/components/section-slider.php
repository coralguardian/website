<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cg-section-slider cg-section section-<?php echo $bgcolor ?>">
	<div class="container">
		<?php if( get_sub_field('title') ): ?>
			<h2 class="main-title slide-up"><?php echo $title ?></h2>
		<?php endif; ?>
		<div class="slider-container slide-up">
			<?php
				if( have_rows('slider') ):
				while ( have_rows('slider') ) : the_row();
			?>
				<div class="slider-pic" style="background: url('<?php  the_sub_field('image'); ?>') no-repeat 50% 50%; background-size:cover;">
					<div class="slider-pic-content">
						<span class="slider-pic-title"><?php  the_sub_field('titre'); ?></span>
						<span class="slider-pic-legende cg-big-txt"><?php  the_sub_field('legende'); ?></span>
					</div>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div><!-- End .container -->
</section><!-- End .cg-section-slider -->