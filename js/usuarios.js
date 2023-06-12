$(".T").on("click", ".EditarUsuario", function(){

	var Uid = $(this).attr("Uid");

	var datos = new FormData();
	datos.append("Uid", Uid);

	$.ajax({

		url: "Ajax/usuariosA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			$("#Uid").val(resultado["id"]);

			$("#apellidoEU").val(resultado["apellido"]);
			$("#nombreEU").val(resultado["nombre"]);
			$("#usuarioEU").val(resultado["usuario"]);
			$("#claveEU").val(resultado["clave"]);

			if(resultado["rol"] == "Administrador"){

				$("#carrera").hide();

			}else{

				$("#carrera").show();

			}

			$("#rolActual").html("Rol Actual: "+resultado["rol"]);

			$("#rol").val(resultado["rol"]);
			$("#rol").hide();

			$("#carr").val(resultado["id_carrera"]);
			$("#carr").hide();

		}

	})

})


$(".T").on("click", ".EliminarUsuario", function(){

	var Uid = $(this).attr("Uid");

	window.location = "index.php?url=usuarios&Uid="+Uid;

})

$("#usuario").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("verificarUsuario", usuario);

	$.ajax({

		url: "Ajax/usuariosA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success:function(resultado){

			if(resultado){

				$("#usuario").parent().after('<div class="alert alert-danger">ElUsuario ya Existe.</div>');

				$("#usuario").val("");

			}

		}


	})

})