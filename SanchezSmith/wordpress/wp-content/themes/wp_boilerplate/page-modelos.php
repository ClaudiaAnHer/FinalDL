<?php get_header() ?>


<!-- inicio modelos casas -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<section class="owl-demo" id="modelos">
	<div class="item"> <img src="http://localhost:8888/wp-content/uploads/2017/10/casa1.jpg" alt="casa1">
		
		<div class="bg-info">
			<h3 class="info"> Casa Almendra</h3>
			<h6 class="info">100 mt2 </h6>
				<div class="comentarios">
					<i class="col-md-1 likeable fa-heart" aria-hidden="true"> </i>
					<p class="likep">0</p>
				</div>
		</div>		
	</div>

	<div class="item"> <img src="http://localhost:8888/wp-content/uploads/2017/10/casa2.jpg" alt="casa2"> 
		<div class="bg-info">
			<h3 class="info">Casa Catala </h3>
			<h6 class="info">120 mt2</h6>
				<div class="comentarios">
					<i class="col-md-1 likeable fa-heart" aria-hidden="true"> </i>
					<p class="likep">0</p>
				</div>
		</div>
	</div>
	<div class="item"> <img src="http://localhost:8888/wp-content/uploads/2017/10/casa3.jpg" alt="casa3"> 
		<div class="bg-info">
			<h3 class="info"> Casa Cristóbal </h3>
			<h6 class="info">90 mt2</h6>
				<div class="comentarios">
					<i class="col-md-1 likeable fa-heart" aria-hidden="true"> </i>
					<p class="likep">0</p>
				</div>
		</div>
	</div>
	<div class="item"> <img src="http://localhost:8888/wp-content/uploads/2017/10/casa4.jpg" alt="casa4"> 
		<div class="bg-info">
			<h3 class="info"> Casa Hilario </h3>
			<h6 class="info">87 mt2</h6>
				<div class="comentarios">
					<i class="col-md-1 likeable fa-heart" aria-hidden="true"> </i>
					<p class="likep">0</p>
				</div>
		</div>
	</div>
	<div class="item"> <img src="http://localhost:8888/wp-content/uploads/2017/10/casa5.jpg" alt="casa5">
		<div class="bg-info">
			<h3 class="info"> Casa Rodolfa </h3>
			<h6 class="info">124 mt2</h6>
				<div class="comentarios">
					<i class="col-md-1 likeable fa-heart" aria-hidden="true"> </i>
					<p class="likep">0</p>
				</div>
		</div>
	</div>
	<div class="item"> <img src="http://localhost:8888/wp-content/uploads/2017/10/casa6.jpg" alt="casa6">
		<div class="bg-info">
			<h3 class="info"> Casa Agustina </h3>
			<h6 class="info">103 mt2 </h6>
				<div class="comentarios">
					<i class="col-md-1 likeable fa-heart" aria-hidden="true"> </i>
					<p class="likep">0</p>
				</div>
		</div>
	</div>
	<div class="item"> <img src="http://localhost:8888/wp-content/uploads/2017/10/casa7.jpg" alt="casa7">
		<div class="bg-info">
			<h3 class="info"> Casa Trinidad </h3>
			<h6 class="info">94 mt2</h6>
				<div class="comentarios">
					<i class="col-md-1 likeable fa-heart" aria-hidden="true"> </i>
					<p class="likep">0</p>
				</div>
		</div>
	</div>
	<div class="item"> <img src="http://localhost:8888/wp-content/uploads/2017/10/casa8.jpg" alt="casa8">
		<div class="bg-info">
			<h3 class="info"> Casa Zorobabel </h3>
			<h6 class="info">150 mt2</h6>
				<div class="comentarios">
					<i class="col-md-1 likeable fa-heart" aria-hidden="true"> </i>
					<p class="likep">0</p>
				</div>
		</div>
	</div>
	<div class="item"> <img src="http://localhost:8888/wp-content/uploads/2017/10/casa9.jpg" alt="casa9"> 
		<div class="bg-info">
			<h3 class="info">Casa Baal </h3>
			<h6 class="info">98 mt2</h6>
				<div class="comentarios">
					<i class="col-md-1 likeable fa-heart" aria-hidden="true"> </i>
					<p class="likep">0</p>
				</div>
		</div>
	</div>
	<div class="item"> <img src="http://localhost:8888/wp-content/uploads/2017/10/casa10.jpg" alt="casa10"> 
		<div class="bg-info">
				<h3 class="info"> Casa Hageo </h3>
				<h6 class="info"> 155 mt2</h6>
				<div class="comentarios">
					<i class="col-md-1 likeable fa-heart" aria-hidden="true"> </i>
					<p class="likep">0</p>
				</div>
		</div>
	</div>


</section>	

<?php endwhile; else: ?>
<?php endif; ?>


<?php get_footer() ?>

	