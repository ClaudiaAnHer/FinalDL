<?php 
	
	function dl_enqueue_style() {
		$theme_data = wp_get_theme();

		/* Register Scripts */
		wp_register_style('reset', get_parent_theme_file_uri('/assets/css/reset.css'), null, $theme_data->get( 'Version' ), 'screen');

		wp_register_style('sanchezsmith', get_parent_theme_file_uri('/assets/css/sanchezsmith.css'), null, null, null);

		wp_register_style('owlcarousel', get_parent_theme_file_uri('/assets/css/owl.carousel.css'), null, null, null);

		wp_register_style('owltheme', get_parent_theme_file_uri('/assets/css/owl.theme.css'), null, null, null);

		wp_register_style('owltransition', get_parent_theme_file_uri('/assets/css/owl.transitions.css'), null, null, null);

		wp_register_style('prettyPhoto', get_parent_theme_file_uri('/assets/css/prettyPhoto.css'), null, null, null);

		wp_register_style('bootstrap-css', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', null, null, null);

		wp_register_style('bootstrap-theme.min', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css', null, null, null);
		
		wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', null, null, null);
	
		
		/* Enqueue Scripts */
		wp_enqueue_style('reset');
		wp_enqueue_style('sanchezsmith');
		wp_enqueue_style('owlcarousel');
		wp_enqueue_style('owltheme');
		wp_enqueue_style('owltransition');
		wp_enqueue_style('prettyPhoto');
		wp_enqueue_style('bootstrap-css');
		wp_enqueue_style('bootstrap-theme.min');
		wp_enqueue_style('font-awesome');

	}

	add_action( 'wp_enqueue_scripts', 'dl_enqueue_style' );
?>
