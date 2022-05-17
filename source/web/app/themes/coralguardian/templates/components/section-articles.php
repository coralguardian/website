<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$addbt		= get_sub_field('ajouter_un_bouton');
	$bttype		= get_sub_field('type_de_bouton');
	$bttxt		= get_sub_field('texte_du_bouton');
	$btlink		= get_sub_field('lien_du_bouton');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cg-section-relation cg-section section-<?php echo $bgcolor ?>">
	<div class="container">
		<?php if( get_sub_field('title') ): ?><h2 class="main-title"><?php echo $title ?></h2><?php endif; ?>
		<div class="listing-articles cg-section-relation-articles">
			<?php
				query_posts('showposts=3&orderby=date&order=DESC');
				if (have_posts()) :
				while (have_posts()) : the_post();
					get_template_part('templates/content/content','article');
				endwhile;
				endif;
				wp_reset_query();
			?>
		</div>
		<?php if($addbt == 1): ?><a href="<?php echo $btlink ?>" class="button ripple button--center <?php echo $bttype ?>"><?php echo $bttxt ?></a><?php endif; ?>
	</div>
</section>