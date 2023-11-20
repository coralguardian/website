<?php
    global $flexible_count;
    $title = get_sub_field('title');
    $paddingtop	= get_sub_field('padding_top');
    $bgcolor = get_sub_field('bg_color');
    $addbt = get_sub_field('ajouter_un_bouton');
    $bttype = get_sub_field('type_de_bouton');
    $bttxt = get_sub_field('texte_du_bouton');
    $btlink = get_sub_field('lien_du_bouton');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-sectionrelation cbo-bg-<?php echo $bgcolor ?>">
    <div class="section-inner sectionrelation-inner">
		<div class="cbo-container container-large container-padding paddingtop-<?php echo $paddingtop ?>">
            <?php if (get_sub_field('title')): ?>
                <h2 class="cbo-title-2"><?php echo $title ?></h2>
            <?php endif; ?>

            <div class="list-el sectionrelation-listing">
                <?php
                    query_posts('showposts=3&orderby=date&order=DESC');
                    if (have_posts()) :
                    while (have_posts()) : the_post();
                            get_template_part('templates/content/content', 'article');
                    endwhile;
                    endif;
                    wp_reset_query();
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