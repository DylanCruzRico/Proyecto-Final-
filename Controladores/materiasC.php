<?php

class MateriasC{

	public function CrearMateriaC(){
 
		if(isset($_POST["Cid"])){

			$rutaPrograma = "";

			if($_FILES["programa"]["type"] == "application/pdf"){

				$nombre = mt_rand(10,999);

				$rutaPrograma = "Vistas/programas/Prog-".$nombre.".pdf";

				move_uploaded_file($_FILES["programa"]["tmp_name"], $rutaPrograma);
			}

				$tablaBD = "materias";

				$Cid = $_POST["Cid"];

				$datosC = array("id_carrera"=>$_POST["Cid"], "codigo"=>$_POST["codigo"], "nombre"=>$_POST["nombre"], "grado"=>$_POST["grado"], "tipo"=>$_POST["tipo"], "programa"=>$rutaPrograma);

				$resultado = MateriasM::CrearMateriaM($tablaBD, $datosC);

				if($resultado == true){

					echo '<script>

					window.location = "http://localhost/universidad/Crear-Materias/'.$Cid.'";
					</script>';
		}
	}
}

    public function VerMateriasC(){

		$tablaBD = "materias";

		$resultado = MateriasM::VerMateriasM($tablaBD);

		return $resultado;
	}


    public function EliminarMateriaC(){

		if(isset($_GET["Mid"])){

			$tablaBD = "materias";

			$id = $_GET["Mid"];

			$Cid = $_GET["Cid"];

			$resultado = MateriasM::EliminarMateriaM($tablaBD, $id);

			if($resultado == true){
					echo '<script>
					window.location = "http://localhost/universidad/Crear-Materias/'.$Cid.'";
					</script>';
				}

		}

	}


}