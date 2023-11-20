<?php
	global $flexible_count;
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$addbt		= get_sub_field('ajouter_un_bouton');
	$bttype		= get_sub_field('type_de_bouton');
	$bttxt		= get_sub_field('texte_du_bouton');
	$btlink		= get_sub_field('lien_du_bouton');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-sectionrelation cbo-bg-<?php echo $bgcolor ?>">
	<div class="section-inner sectionrelation-inner">
		<div class="cbo-container container-padding paddingtop-<?php echo $paddingtop ?>">
			<?php if( get_sub_field('title') ): ?>
				<h2 class="cbo-title-2">
					<?php echo $title ?>
				</h2>
			<?php endif; ?>
			
			<div class="list-el sectionrelation-listing">
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

			<?php if($addbt == 1): ?>
				<div class="cbo-buttonscontainer">
					<a href="<?php echo $btlink ?>" class="button ripple <?php echo $bttype ?>"><?php echo $bttxt ?></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>