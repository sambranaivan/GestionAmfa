$(document).ready(function(){

			$("#datos_ayec").css("display","none");
		
			$("#form_dni").keyup(function(){
				if ($(this).val().length	 >= 7) 
				{
					getSocio($(this).val());
				}				
			})


			function getSocio(_dni){
				$.getJSON("php/getsocios.php",{dni:_dni},function(data){
				
				if (data) 
				{
					
					$("#form_nombre").val(data.nombre)
					$("#form_telefono").val(data.telefono)
					$("#form_domicilio").val(data.domicilio)
					$("#form_nroSoc").val(data.nroSocio)
				}
				else
				{			
						
					$("#form_nombre").val("")
					$("#form_telefono").val("")
					$("#form_domicilio").val("")
					$("#form_nroSoc").val("")
				}

			})}


				$("#concepto").change(function(){
					if ($(this).val() != 4)

					 {

			$("#datos_ayec").hide("fast")
			$("#form_cuenta").removeAttr("required")
					 }
					 else
					 {

			$("#datos_ayec").show("fast")
			$("#form_cuenta").attr("required","required")
					 }
				})





		})