<?php
require_once "conexionBD.php";

class UsuariosM extends ConexionBD {
	/* Iniciar sesion */
    static public function IniciarSesionM($tablaBD, $datosC) {
        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE usuario = :usuario");
        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->execute();

        $resultado = $pdo->fetch();

        $pdo->closeCursor();
        $pdo = null;

        return $resultado;
    }


	/* Ver mis datos */
	static public function VerMisDatosM($tablaBD, $id) {
		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        $pdo->execute();

        $resultado = $pdo->fetch();

        $pdo->closeCursor();
        $pdo = null;

        return $resultado;
	}
    
    /*Guardar datos */
    static public function GuardarDatosM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET fechanac = :fechanac, direccion = :direccion, telefono = :telefono, 
        correo = :correo, universidad = :universidad, clave = :clave WHERE id = :id");

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




    //Crear usuario

    static public function CrearUsuarioC($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (usuario, clave, apellido, nombre, id_carrera, rol)
                                        VALUES(:usuario, :clave, :apellido, :nombre, :id_carrera, :rol)");

        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);


        if($pdo -> execute()){
            return true;
        }
        
        $pdo->closeCursor();
        $pdo = null;
    }


    //Ver usuario
    static public function VerUsuariosM($tablaBD, $columna, $valor){
        if($columna != null){
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo->bindParam(":". $columna, $valor, PDO::PARAM_STR);

            $pdo -> execute();

            return $pdo -> fetch();
        }
        else{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");


            $pdo -> execute();

            return $pdo -> fetchAll();
        }

        $pdo->closeCursor();
        $pdo = null;
    }
}
?>
