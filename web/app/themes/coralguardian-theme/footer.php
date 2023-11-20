
	<footer>
		<div class="cbo-container footer-container">
			<?php if ( dynamic_sidebar('footer-desc') ) : else : ?><?php endif; ?>
			<?php if ( dynamic_sidebar('footer-menus') ) : else : ?><?php endif; ?>
			<div class="footer-col">
					<div class="widget-title">Suivez-nous</div>
				<?php
					if( have_rows('reseaux_sociaux', 'option') ):
					while ( have_rows('reseaux_sociaux', 'option') ) : the_row();
				?>
					<a class="footer-social" href="<?php the_sub_field('url_du_reseau', 'option'); ?>" target="_blank">
						<i class="icon icon--<?php the_sub_field('reseau', 'option'); ?>"></i>
					</a>
				<?php
					endwhile;
					endif;
				?>
				<div class="footer-newsletter">
					<div class="widget-title">Recevoir la newsletter</div>
					<?php echo do_shortcode("[sibwp_form id=1]"); ?>
				</div>
			</div><!-- End .footer-col -->
		</div><!-- End .footer-container -->
		
		<div class="footer-bottom">
			&copy; <a href="<?php bloginfo(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> <?php echo date('Y'); ?>  -
			<a href="<?php bloginfo(); ?>/mentions-legales-et-conditions-generales-dutilisation/">Mentions légales</a>
		</div>
	</footer>

	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
	<script async="async" src="<?php echo get_template_directory_uri(); ?>/library/js/scripts.js"></script>
	


	<?php
		wp_footer();
	?>




<script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js"></script>
<link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css" rel="stylesheet"/>



<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiMjBoMjAiLCJhIjoiVVdXWG41ZyJ9.OrPIlM0e7K8WhHCv65tlzA';
	
	const geojson = {
		'type': 'FeatureCollection',
		'features': [
			{
				'type': 'Feature',
				'geometry': {
				'type': 'Point',
				'coordinates': [119.877830, -8.400699]
			},
			'properties': {
				'title': 'Indonésie',
			}
		},
		{
			'type': 'Feature',
			'geometry': {
			'type': 'Point',
			'coordinates': [3.4338020, 36.430885]
		},
		'properties': {
			'title': 'Espagne',
		}
		}
		]
	};
 

	const map = new mapboxgl.Map({
	container: 'map',
	style: 'mapbox://styles/mapbox/satellite-v9',
	center: [119.877830, -8.400699],
	zoom: 4
	});
	
	// add markers to map
	for (const feature of geojson.features) {
	// create a HTML element for each feature
	const el = document.createElement('div');
	el.className = 'marker';
	
	// make a marker for each feature and add it to the map
	new mapboxgl.Marker(el)
	.setLngLat(feature.geometry.coordinates)
	.setPopup(
	new mapboxgl.Popup({ offset: 25 }) // add popups
	.setHTML(
	`<h3>${feature.properties.title}</h3>`
	)
	)
	.addTo(map);
	}
</script>








</body>
</html>