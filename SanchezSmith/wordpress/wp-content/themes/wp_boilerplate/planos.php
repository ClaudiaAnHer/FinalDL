<?php get_header() ?>


	<ol class="col-md-5 breadcrumb">
		<li><a href="modelos">Modelos</a></li>
		<li>Planos</li>
	</ol>

<div id="planos" class="col-md-offset-1 col-xs-offset-1 col-md-10 col-sm-10">

	<h3>Planos</h3>
	<hr>

		<div class="pretty">
			<ul class="planos">
                <?php 
                     $arg = array(
                        'post_type' => 'planos',
                        'posts_per_page' => 10
                     );
                     $get_arg = new WP_Query( $arg );
                      while ( $get_arg->have_posts() ) {
                            $get_arg->the_post(); 
                ?> 
                
                <li data-id= "<?php the_field('planos_casas'); ?>">
                     <a href="<?php the_field('imagen_plano')?> " rel="prettyPhoto[planos]">
                    <img src="<?php the_field('miniatura')?> " width="220" height="187" alt="Imagen modelos"/>
                    </a>
                </li>


             	<?php } wp_reset_postdata(); ?> 

          	</ul>			
	</div>
</div>


