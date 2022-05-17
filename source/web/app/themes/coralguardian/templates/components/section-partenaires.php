<?php
global $flexible_count;
$title = get_sub_field('title');
$bgcolor = get_sub_field('bg_color');
$addbt = $addbt ?? 0;
?>
<section id="section-<?php echo $flexible_count; ?>"
         class="cg-section-partner cg-section section-<?php echo $bgcolor ?>">
  <div class="container">
      <?php if (get_sub_field('title')): ?>
        <h2 class="main-title"><?php echo $title ?></h2>
      <?php endif; ?>
    <div class="partners-container slide-up">
        <?php
        if (have_rows('partenaires')):
            while (have_rows('partenaires')): the_row();
                $website = get_sub_field('site_internet_du_partenaire');
                $pic = get_sub_field('logo_du_partenaire');
                $name = get_sub_field('nom_du_partenaire');
                ?>
              <div class="bloc-partner">
                <a href="<?php echo $website ?>" target="_blank">
                  <img class="partner-pic lazy" src="#" data-src="<?php echo $pic["url"]; ?>"
                       alt="<?php echo $pic["alt"]; ?>"/>
                  <span class="partner-title"><?php echo $name ?></span>
                </a>
              </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>
      <?php if ($addbt == 1): ?>
        <a href="<?php echo $btlink ?>"
           class="button ripple button--center <?php echo $bttype ?>"><?php echo $bttxt ?></a>
      <?php endif; ?>
  </div><!-- End .container -->
</section><!-- End .cg-section-partner -->