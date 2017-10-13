<?php if ( has_nav_menu( 'footer-menu' ) ) { ?>
	<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'header_menu' ) ); ?>
<?php } ?>

<?php wp_footer(); ?>
<section class="row footer col-md-12">
		<footer id="map" class="col-md-6 footer ">

			<script async defer
    			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDT5_h0BKdfGMd3idPxatP2nERI_pKGQxQ&callback=initMap">
    		</script>

    		<img class="col-md-12 foot2" src="http://localhost:8888/wp-content/uploads/2017/10/logo160.png">
		</footer>
</section>

	</body>
</html>