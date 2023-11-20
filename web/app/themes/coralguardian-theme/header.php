<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<title><?php wp_title(' - '); ?></title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta property="og:url" content="<?php site_url('/adopte-corail/');?>" />
		<meta property="og:title" content="Adoptez un corail"/>
		<meta property="og:description" content="Adoptez un corail et agissez pour la biodiversité marine 🌊" />
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/library/img/share_social_networks.jpg" />
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/library/img/fav/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/favicon-16x16.png">

		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-28782686-1"></script>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-MGK23Q9');</script>
		<!-- End Google Tag Manager -->
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

		<!-- Hotjar Tracking Code for https://www.coralguardian.org/ -->
		<script>
			(function(h,o,t,j,a,r){
				h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
				h._hjSettings={hjid:3689720,hjsv:6};
				a=o.getElementsByTagName('head')[0];
				r=o.createElement('script');r.async=1;
				r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
				a.appendChild(r);
			})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
		</script>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(''); ?> itemscope itemtype="http://schema.org/WebPage">
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MGK23Q9" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		
		<div id="myModal" class="modale-newsletter" role="dialog">
			<div class="newsletter-inner">

				<div class="newsletter-content">
					<div class="content-close" id="myModal-close">
						<span class="top"></span>
						<span class="bottom"></span>
					</div>

					<div class="content-title cbo-title-2">
						<?php the_field('popin_newsletter_title', 'option'); ?>
					</div>

					<div class="content-form">
						<?php the_field('popin_newsletter_shortcode', 'option'); ?>
					</div>
				</div>
			</div>
			<div class="modale-overlay"></div>
		</div>

		<header>
			<div class="header-top">
				<a class="cbo-button darkblue-button header-button" href="<?php the_field('donation_url', 'option'); ?>">
					<i class="icon icon--donation"></i><?php the_field('txt_donationbt', 'option'); ?>
				</a> 
				<a class="cbo-button border-button header-button" href="<?php the_field('adoption_url', 'option'); ?>">
					<i class="icon icon--certificat"></i><?php the_field('txt_adoptebt', 'option'); ?>
				</a>
				<a class="cbo-button button--underline header-button" href="<?php the_field('gift_url', 'option'); ?>">
					<?php the_field('txt_giftbt', 'option'); ?>
				</a>
			</div>

			<div class="header-main">
				<div class="main-inner">
					<a class="header-logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
						<img class="logo-mobile" src="<?php bloginfo('template_directory'); ?>/library/img/logo-coral-guardian-small-white.svg" alt="Coral Guardian" itemprop="logo" width="120" height="54" loading="lazy"/>
						<img class="logo-desktop" src="<?php bloginfo('template_directory'); ?>/library/img/logo-coral-guardian.svg" alt="Coral Guardian" itemprop="logo" width="120" height="54" loading="lazy"/>
					</a>

					<div class="main-center">
						<a class="cbo-button lightblue-button header-button" href="<?php the_field('donation_url', 'option'); ?>">
							<i class="icon icon--donation"></i><?php the_field('txt_donationbt', 'option'); ?>
						</a>

						<?php if ( do_action('wpml_add_language_selector') ) : else : ?><?php endif; ?>
					</div>

					<button type="button" class="burger-menu">
						<span class="top"></span>
						<span class="middle"></span>
						<span class="bottom"></span>
					</button>
				</div>
				<nav class="header-nav">
					<a class="cbo-button border-button header-button" href="<?php the_field('adoption_url', 'option'); ?>">
						<i class="icon icon--certificat"></i><?php the_field('txt_adoptebt', 'option'); ?>
					</a>
					<a class="cbo-button border-button header-button" href="<?php the_field('gift_url', 'option'); ?>">
						<i class="icon icon--gift"></i><?php the_field('txt_giftbt', 'option'); ?>
					</a>
					<?php wp_nav_menu( array(
						'container' => false,
						'container_class' => '',
						'menu_class' => 'main-menu',
						'theme_location' => 'main-nav',
					)); ?>
				</nav>
			</div>
		</header>

		<div class="cg-overlay-search">
			<button type="button" class="search-close">
				<i class="icon icon--close"></i>
			</button>
			<form role="search" method="get" class="searchform" action="<?php echo home_url( '/' ); ?>">
				<?php if(ICL_LANGUAGE_CODE=='fr'): ?>
					<input name="s" id="s" type="text" placeholder="<?php _e('Votre recherche'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
					<button class="button ripple green-button" type="submit">Rechercher</button>
				<?php elseif(ICL_LANGUAGE_CODE=='en'): ?>
					<input name="s" id="s" type="text" placeholder="<?php _e('Your search'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
					<button class="button ripple green-button" type="submit">Search</button>
				<?php endif;?>
			</form>
		</div>