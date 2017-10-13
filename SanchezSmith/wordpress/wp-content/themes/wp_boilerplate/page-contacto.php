<?php get_header() ?>
<section class="row cont">
		<img class="contact" src="http://localhost:8888/wp-content/uploads/2017/10/background.png">

	
<section class="col-md-8 col-sm-8 col-sm-offset-1 col-sm-offset-1" style="padding-top: 200px;">
	<div class="col-md-12 col-sm-12 ">
		
		<img class="contact" src="http://localhost:8888/wp-content/uploads/2017/10/logo-xl.png">
	</div>

	<h2>Contactanos</h2>
	<hr>

	<form id="formulario" method="post" id="formdata">
		<div class="form-group">
   	 		<label for="nombre exampleInputName2"></label>
    		<input input type="text" name="nombre" id="nombre" required="required" placeholder="Nombre" class="form-control" id="exampleInputName2" placeholder="Nombre">
  		</div>

		<div class="form-group">
		 	<label for="mail exampleInputEmail1"></label>
		   	<input input type="text" name="mail" id="mail" required="required" placeholder="Email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
		</div>

		<textarea for="mensaje" id="mensaje" placeholder="Mensaje" class="form-control" rows="3"></textarea>

		 <input type="button" id="botonenviar" value="Enviar">
	</form>

        <div id="exito" style="display:none">
            Sus datos han sido recibidos con éxito.
        </div>

        <div id="fracaso" style="display:none">
            Se ha producido un error durante el envío de datos.
     	</div>

</section>
</section>

<?php get_footer() ?>


