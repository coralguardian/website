<?php
	get_header(); 
?>
	<div class="cg-page-404">
		
		<div class="page-404-content">
			<h1 class="main-title">
				<?php _e( 'Page not found'); ?>
			</h1>
			<div class="intro-txt slide-up">
				<h2><?php _e('Oops...'); ?></h2>
				<?php if(ICL_LANGUAGE_CODE=='fr'): ?>
					<p><?php _e('Il semble que la page que vous cherchez est introuvable. Vous pouvez toujours revenir sur vos pas');?></p>
					<a href="<?php bloginfo('url'); ?>" class="button ripple green-button">
						<?php _e('Homepage'); ?>
					</a>
				<?php elseif(ICL_LANGUAGE_CODE=='en'): ?>
					<p><?php _e('It seems that the requested page has been moved or deleted. Feel free to use the button below to go back home :');?></p>
					<a href="<?php bloginfo('url'); ?>" class="button ripple green-button">
						<?php _e('Homepage'); ?>
					</a>
				<?php endif;?>
			</div>
		</div><!-- End .page-404-content -->
		
		<svg id="svg">
			<defs>
				<filter id="disFilter">
					<feTurbulence type="turbulence" baseFrequency="0.01" numOctaves="3" seed="1" result="turbulence">
						<animate attributeName="baseFrequency" values="0.01;0.005;0.01;" dur="30s" begin="0" repeatCount="indefinite" />
					</feTurbulence>
					<feDisplacementMap in="SourceGraphic" in2="turbulence" scale="30" xChannelSelector="R" yChannelSelector="B" result="displacement" />
				</filter>
			</defs>
			<g id="background">
				<image xlink:href="<?php echo get_template_directory_uri(); ?>/library/img/coral-guardian-bg-404.jpg" x="0" y="0" height="100%" width="100%" preserveAspectRatio="xMidYMid slice" />
			</g>
		</svg>
	</div><!-- End .cg-page-404 -->
<?php
	get_footer();
?>