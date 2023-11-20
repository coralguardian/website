<?php
	global $flexible_count;
	$bgcolor	= get_sub_field('bg_color');
	$paddingtop	= get_sub_field('padding_top');
	$title		= get_sub_field('title');
	$desc		= get_sub_field('resume_de_la_section');
	$blocs		= get_sub_field('blocs');
	$addbt		= get_sub_field('ajouter_un_bouton');
	$bttype		= get_sub_field('type_de_bouton');
	$bttxt		= get_sub_field('texte_du_bouton');
	$btlink		= get_sub_field('lien_du_bouton');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-sectionnumber cbo-bg-<?php echo $bgcolor ?>">
	<div class="section-inner sectionnumber-inner">
		<div class="cbo-container container-padding paddingtop-<?php echo $paddingtop ?>">
			<?php if( get_sub_field('title') ): ?>
				<h2 class="cbo-title-2">
					<?php echo $title ?>
				</h2>
			<?php endif; ?>

			<?php if( get_sub_field('resume_de_la_section') ): ?>
				<div class="cbo-chapo slide-up">
					<?php echo $desc ?>
				</div>
			<?php endif; ?>

			<div class="list-el">
				<?php foreach($blocs as $bloc): ?>
					<div class="el-inner slide-up">
						<div class="inner-content">
							<span class="inner-number"><?php echo $bloc["chiffre_cle"]; ?></span>
							<span class="inner-desc"><?php echo $bloc["description"]; ?></span>
					</div>
					</div>
				<?php endforeach; ?>
			</div>

			<?php if($addbt == 1): ?>
				<div class="cbo-buttonscontainer">
					<a href="<?php echo $btlink ?>" class="button ripple <?php echo $bttype ?>"><?php echo $bttxt ?></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>