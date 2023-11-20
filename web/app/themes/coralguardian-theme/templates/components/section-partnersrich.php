<?php
  global $flexible_count;
  $title = get_sub_field('title');
?>

<section id="section-<?php echo $flexible_count; ?>" class="cbo-partnersrich">
  <div class="cbo-container partnersrich-inner">
    
    <?php if (get_sub_field('title')): ?>
        <h2 class="cbo-title-2">
          <?php echo $title ?>
        </h2>
    <?php endif; ?>

    <div class="list-el">
        <?php
          if (have_rows('partenaires')):
          while (have_rows('partenaires')): the_row();
          $website = get_sub_field('site_internet_du_partenaire');
          $pic = get_sub_field('logo_du_partenaire');
          $name = get_sub_field('nom_du_partenaire');
          $description = get_sub_field('description_du_partenaire');
        ?>
          <a class="el-inner" href="<?php echo $website ?>" target="_blank">
            <span class="inner-content">
              <span class="content-picture cbo-picture-contain ">
                <img
                  src="<?php echo $pic['sizes']['medium']; ?>"
                  srcset="<?php echo $pic['sizes']['medium'] ?> 320w, <?php echo $pic['sizes']['medium'] ?> 768w, <?php echo $pic['sizes']['medium'] ?> 1024w, <?php echo $pic['sizes']['medium'] ?> 1280w"
                  alt="<?php echo $pic["alt"]; ?>"
                  loading="lazy"
                  width="150px" height="150px"
                >
              </span>

              <span class="content-text">
                <?php if( get_sub_field('nom_du_partenaire') ): ?>
                  <span class="content-title cbo-title-3">
                    <?php echo $name ?>
                  </span>
                <?php endif; ?>

                <?php if( get_sub_field('nom_du_partenaire') ): ?>
                  <span class="content-desc">
                    <?php echo $description ?>
                  </span>
                <?php endif; ?>
              </span>
              
          </a>
        <?php
          endwhile;
          endif;
        ?>
      </div>
  </div>
</section>