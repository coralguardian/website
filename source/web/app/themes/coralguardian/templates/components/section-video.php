<?php
	global $flexible_count;
	$topmarge	= get_sub_field('marge_du_haut');
	$botmarge	= get_sub_field('marge_du_bas');
	$title		= get_sub_field('title');
	$bgcolor	= get_sub_field('bg_color');
	$video_id	= get_sub_field('video');
	$video_pic	= get_sub_field('video_cover');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cg-section-video cg-section section-<?php echo $bgcolor ?> cg-marge-top-<?php echo $topmarge ?> cg-marge-bot-<?php echo $botmarge ?>">
	<div class="container">
		<?php if( get_sub_field('title') ): ?>
			<h2 class="main-title"><?php echo $title ?></h2>
		<?php endif; ?>
		<div class="video-container slide-up">
            <figure class="video-cover js-video lazy" style="background-image:url(<?php echo $video_pic ?>);"></figure>
           	<iframe id="video" class="lazy "src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <div id="play-video" class="video-player"><i class="icon icon--play"></i></div>
        </div><!-- End .video-container -->
	</div>
</section><!-- End .cg-section-video -->