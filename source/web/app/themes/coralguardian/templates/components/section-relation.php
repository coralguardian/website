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
				$posts = get_sub_field('relationship');
				if($posts):
				foreach( $posts as $post):
				setup_postdata($post);
				get_template_part('templates/content/content','article');
				endforeach;
				wp_reset_postdata();
				endif; 
			?>
		</div>
		<?php if($addbt == 1): ?><a href="<?php echo $btlink ?>" class="button ripple button--center <?php echo $bttype ?>"><?php echo $bttxt ?></a><?php endif; ?>
	</div>
</section>