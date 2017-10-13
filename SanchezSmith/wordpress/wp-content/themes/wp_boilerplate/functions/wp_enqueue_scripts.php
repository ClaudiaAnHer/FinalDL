<?php 
	
	function dl_enqueue_scripts() {
		$theme_data = wp_get_theme();

		/* Deregister Scripts */
		wp_deregister_script( 'jquery' );
		wp_deregister_script( 'jquery-migrate' );

		/* Register Scripts */
		//wp_register_script('jQuery1', get_parent_theme_file_uri() . '/assets/js/lib/jquery-1.12.4.min.js', null, null, true);

		wp_register_script('jQuery3', ("//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"), false, '2.1.1');
		wp_register_script('jQuery32', ("https://code.jquery.com/jquery-3.2.1.min.js"), false, '3.2.1');
		wp_register_script('jQuery_migrate', get_parent_theme_file_uri('/assets/js/lib/jquery-migrate.min.js'), array('jQuery3'), '3.0.0', true);		

		wp_register_script('bootstrap-js', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', null, '3.3.7', true );

	
		wp_register_script('owl2', get_parent_theme_file_uri('/assets/js/lib/owl.carousel.js'), null, null, true);



		wp_register_script('prettyPhoto', get_parent_theme_file_uri('/assets/js/lib/jquery.prettyPhoto.js'), null, null, true);

		

		wp_register_script('sanchezsmith', get_parent_theme_file_uri('/assets/js/lib/sanchezsmith.js'), null, null, true);

		wp_register_script('sanchezsmith2', get_parent_theme_file_uri('/assets/js/lib/sanchezsmith2.js'), null, null, true);


		
		/* Enqueue Scripts */
		wp_enqueue_script('jQuery3');
		wp_enqueue_script('jQuery32');
		wp_enqueue_script('jQuery_migrate');

		wp_enqueue_script('bootstrap-js');
		if (is_page_template('modelos')) {
			wp_enqueue_script('owl2');	
		}
		wp_enqueue_script('prettyPhoto');

		wp_enqueue_script('sanchezsmith');
		wp_enqueue_script('sanchezsmith2');	

	}

	add_action( 'wp_enqueue_scripts', 'dl_enqueue_scripts' );
?>