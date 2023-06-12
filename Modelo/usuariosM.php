<?php
require_once "conexionBD.php";

class UsuariosM extends ConexionBD {
	/* Iniciar sesion */
    static public function IniciarSesionM($tablaBD, $datosC) {

        // Modificacion para que le corra a Valerio
        // $conexionBD = new ConexionBD();
        // $pdo = $conexionBD->cBD()->prepare("SELECT * FROM $tablaBD WHERE usuario = :usuario");
        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE usuario = :usuario");
        // Modificacion para que le corra a Valerio

        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->execute();

        $resultado = $pdo->fetch();

        $pdo->closeCursor();
        $pdo = null;

        return $resultado;
    }


	/* Ver mis datos */
	static public function VerMisDatosM($tablaBD, $id) {

        // Modificacion para que le corra a Valerio
        // $conexionBD = new ConexionBD();
		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");
        // $pdo = $conexionBD->cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");
        // Modificacion para que le corra a Valerio

        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        $pdo->execute();

        $resultado = $pdo->fetch();

        $pdo->closeCursor();
        $pdo = null;

        return $resultado;
	}
    
    /*Guardar datos */
    static public function GuardarDatosM($tablaBD, $datosC){
        // Modificacion para que le corra a Valerio
        // $conexionBD = new ConexionBD();
        // $pdo = $conexionBD->cBD()->prepare("UPDATE $tablaBD SET fechanac = :fechanac, direccion = :direccion, telefono = :telefono, 
                // correo = :correo, universidad = :universidad, clave = :clave WHERE id = :id");
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET fechanac = :fechanac, direccion = :direccion, telefono = :telefono, 
                correo = :correo, universidad = :universidad, clave = :clave WHERE id = :id");
        // Modificacion para que le corra a Valerio

        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":fechanac", $datosC["fechanac"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        $pdo->bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
        $pdo->bindParam(":universidad", $datosC["universidad"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }

        $pdo->closeCursor();
        $pdo = null;
        
        
    }

    static public function CrearUsuarioM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (usuario, clave, apellido, nombre, id_carrera, rol) VALUES (:usuario, :clave, :apellido, :nombre, :id_carrera, :rol)");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


    //Ver Usuarios
	static public function VerUsuariosM($tablaBD, $columna, $valor){

		if($columna != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}

		$pdo -> close();
		$pdo = null;

	}

	static public function VerUsuarios2M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetchAll();

	$pdo -> close();
	$pdo = null;
}
	//Actualizar Usuarios
	static public function ActualizarUsuariosM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, usuario = :usuario, clave = :clave, id_carrera = :id_carrera, rol = :rol WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}



    //Eliminar Usuarios
	static public function EliminarUsuariosM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

}
?>
