$(document).ready(function() {

		$('.owl-demo').owlCarousel({

			autoPlay: 3000,

			items : 3,
			itemsDesktop : [1199,3],
			itemsDesktopSmall : [979,3]
		});

		function initMap() {
  			var uluru = {lat: -33.2941162, lng: -70.7344123};
 			var map = new google.maps.Map(document.getElementById('map'), {
   			 zoom: 14,
   			 center: uluru
  			});

  		var marker = new google.maps.Marker({
   		 position: uluru,
   		 map: map

  		}); (jQuery);
		}

(function($) {
	
		$('.comentarios').on('click', '.likeable', function(){
		$(this).siblings('.likep').html(parseInt($(this).siblings('.likep').html()) + 1)
		});
	
}) (jQuery);

function validaForm(){
    // Campos de texto
    if($("#nombre").val() == ""){
        alert("El campo Nombre no puede estar vacío.");
        $("#nombre").focus();      
        return false;
    }
    if($("#mail").val() == ""){
        alert("El campo Email no puede estar vacío.");
        $("#mail").focus();
        return false;
    }
    if($("#mensaje").val() == ""){
        alert("El campo Mensaje no puede estar vacío.");
        $("#mensaje").focus();
        return false;
    }

    return true; 
}

$(document).ready( function() {   
    $("#botonenviar").click( function() {   
        if(validaForm()){                               
            $.post("contacto.php",$("#formdata").serialize(),function(res){
                $("#formulario").fadeOut("slow");  
                if(res == 1){
                    $("#exito").delay(500).fadeIn("slow");      
                    $("#fracaso").delay(500).fadeIn("slow");   
                }
            });
        }
    });    
});

});

