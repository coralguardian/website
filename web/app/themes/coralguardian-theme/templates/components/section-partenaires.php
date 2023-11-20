<?php
  global $flexible_count;
  $title = get_sub_field('title');
  $bgcolor = get_sub_field('bg_color');
  $addbt = get_sub_field('addbt');
  $btlink = get_sub_field('btlink');
  $bttxt = get_sub_field('bttxt');
?>

<section id="section-<?php echo $flexible_count; ?>" class="cbo-partners cbo-bg-<?php echo $bgcolor ?>">
  <div class="section-inner sectionnumber-inner">
    <div class="cbo-container container-padding paddingtop-<?php echo $paddingtop ?>">
      <?php if (get_sub_field('title')): ?>
        <h2 class="cbo-title-2">
          <?php echo $title ?>
        </h2>
      <?php endif; ?>
    
      <div class="list-el slide-up">
        <?php
          if (have_rows('partenaires')):
          while (have_rows('partenaires')): the_row();
          $website = get_sub_field('site_internet_du_partenaire');
          $pic = get_sub_field('logo_du_partenaire');
          $name = get_sub_field('nom_du_partenaire');
        ?>
          <a class="el-inner" href="<?php echo $website ?>" target="_blank">
            <span class="inner-content">
              <span class="content-picture cbo-picture-contain  slide-<?php echo $animpic ?>">
                <img
                  src="<?php echo $pic['sizes']['medium']; ?>"
                  srcset="<?php echo $pic['sizes']['medium'] ?> 320w, <?php echo $pic['sizes']['medium'] ?> 768w, <?php echo $pic['sizes']['medium'] ?> 1024w, <?php echo $pic['sizes']['medium'] ?> 1280w"
                  alt="<?php echo $pic["alt"]; ?>"
                  loading="lazy"
                  width="150px" height="150px"
                >
                <?php if( get_sub_field('nom_du_partenaire') ): ?>
                  <span class="content-title">
                    <?php echo $name ?>
                  </span>
                <?php endif; ?>
              </span>
          </a>
        <?php
          endwhile;
          endif;
        ?>
      </div>

      <?php if ($addbt == 1): ?>
        <div class="partners-button">
          <a href="<?php echo $btlink ?>" class="cbo-button ripple lightblue-button">
            <?php echo $bttxt ?>
          </a>
        </div>
      <?php endif; ?>
  </div>
</section>