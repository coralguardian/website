<?php
	global $flexible_count;
	$bgcolor	= get_sub_field('bg_color');
	$paddingtop	= get_sub_field('padding_top');
	$title		= get_sub_field('title');
	$video_id	= get_sub_field('video');
	$video_pic	= get_sub_field('video_cover');
?>
<section id="section-<?php echo $flexible_count; ?>" class="cbo-video cbo-bg-<?php echo $bgcolor ?>">
	<div class="section-inner video-inner">
		<div class="cbo-container container-padding paddingtop-<?php echo $paddingtop ?>">
			<?php if( get_sub_field('title') ): ?>
				<h2 class="cbo-title-2">
					<?php echo $title ?>
				</h2>
			<?php endif; ?>
			<div class="video-container slide-up">
				<figure class="cbo-picture-cover video-cover js-video">
					<img
						src="<?php echo $video_pic['sizes']['small']; ?>"
						srcset="<?php echo $video_pic['sizes']['small'] ?> 320w, <?php echo $video_pic['sizes']['small'] ?> 768w, <?php echo $video_pic['sizes']['small'] ?> 1024w, <?php echo $video_pic['sizes']['small'] ?> 1280w"
						alt="<?php echo $video_pic["alt"]; ?>"
						loading="lazy"
						widht="970px" height="582px"
					>
				</figure>
				<iframe id="video" class="lazy "src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				<div id="play-video" class="video-player"><i class="icon icon--play"></i></div>
			</div>
		</div>
	</div>
</section>