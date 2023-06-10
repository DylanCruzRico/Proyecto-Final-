<?php 
	class UsuariosC {

		/* Inicio de sesión */
		public function IniciarSesionC(){
			if(isset($_POST["usuario"])){
				if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario"]) && preg_match('/^[a-zA-Z0-9.]+$/', $_POST["clave"])){
					$tablaBD = "usuarios";

					$datosC = array("usuario" =>$_POST["usuario"], "clave"=>$_POST["clave"]);

					$resultado = UsuariosM::IniciarSesionM($tablaBD, $datosC);

					if(is_array($resultado) && $resultado["usuario"] == $_POST["usuario"] && $resultado["clave"] == $_POST["clave"]){
						$_SESSION["Ingresar"] = true;

						$_SESSION["rol"] = $resultado["rol"];
						$_SESSION["usuario"] = $resultado["usuario"];
						$_SESSION["clave"] = $resultado["clave"];
						$_SESSION["nombre"] = $resultado["nombre"];
						$_SESSION["apellido"] = $resultado["apellido"];
						$_SESSION["id_carrera"] = $resultado["id_carrera"];
						
						$_SESSION["id"] = $resultado["id"];



						echo '<script> 
							window.location = "inicio";
						</script>';
					}
					else{
						echo '<br> <div class="alert alert-danger">Error al ingresar</div>';
					}
				}
			}
		}


		/* Ver mis datos */
		public function VerMisDatosC(){
			$tablaBD = "usuarios";
			$id = $_SESSION["id"];
			$resultado  = UsuariosM::VerMisDatosM($tablaBD, $id);

			echo '            <form method="POST" action="">

			<div class="row">

			   <div class="col-md-6 col-xs-12"> 

					<h2>Fecha de Nacimiento</h2>
					<input type="hidden" name="fechanac" class="input-lg" value="'.$resultado["fechanac"].'">
					
					<input type="text" name="id" value="'.$_SESSION["id"].'">
					
					<h2>Dirección</h2>
					<input type="text" name="direccion" class="input-lg" value="'.$resultado["direccion"].'">

					<h2>Telefono</h2>
					<input type="text" name="telefono" class="input-lg" value="'.$resultado["telefono"].'">
				   

			   </div> 

			   <div class="col-md-6 col-xs-12"> 

					<h2>Correo</h2>
					<input type="email" name="correo" class="input-lg" value="'.$resultado["correo"].'">
					
					<h2>Universidad</h2>
					<input type="text" name="universidad" class="input-lg" value="'.$resultado["universidad"].'">

					<h2>Contraseña</h2>
					<input type="text" name="clave" class="input-lg" value="'.$resultado["clave"].'">
					
					<br>
					<br>
					<br>

					<button type="submit" class="btn btn-success">
						Guardar datos
					</button>

			   </div> 
			</div>

		</form>';
		}

	}
?>
