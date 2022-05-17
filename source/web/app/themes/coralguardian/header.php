<!doctype html>
	
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title(''); ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <meta property="og:url"         content="<?php site_url('/adopte-corail/');?>" />
  <meta property="og:title"       content="Adoptez un corail"/>
  <meta property="og:description" content="Adoptez un corail et agissez pour la biodiversité marine 🌊" />
  <meta property="og:image"       content="<?php echo get_template_directory_uri(); ?>/library/img/share_social_networks.jpg" />
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/library/img/favicon.ico" />
	<?php wp_head(); ?>
	
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-28782686-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-28782686-1');
      gtag('config', 'AW-962379492');
	</script>
	
	<!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '693436517874437');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=693436517874437&ev=PageView&noscript=1"/></noscript>
	<!-- End Facebook Pixel Code -->
	
</head>
<body <?php body_class(); ?>>
	
	
	<header>
		<a class="cg-logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
			<i class="icon icon--logo"></i>
			<i class="icon icon--logo-small"></i>
		</a>
		
		<nav class="responsive-menu">
			<?php if ( dynamic_sidebar('language-selector') ) : else : ?><?php endif; ?>
			<?php wp_nav_menu( array(
				'container' => false,
				'container_class' => '',
				'menu_class' => '',
				'theme_location' => 'Smartphone',
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'depth' => 0,
				'fallback_cb' => ''
			)); ?>
		</nav><!-- End .responsive-menu -->
		
		 <div class="burger-menu">
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
        </div>
		

		<nav class="desktop-menu">
			<?php wp_nav_menu( array(
				'container' => false,
				'container_class' => '',
				'menu_class' => 'main-menu',
				'theme_location' => 'main-nav',
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'depth' => 0,
				'fallback_cb' => ''
			)); ?>
		</nav><!-- End .desktop-menu -->
	</header>
	
	<div class="cg-overlay-search">
		<button type="button" class="search-close">
			<i class="icon icon--close"></i>
		</button>
	</div>