<?php

    require_once "conexionBD.php";
    class CarrerasM extends ConexionBD{

        /* Crear Carrera */

        static public function CrearCarreraM($tablaBD, $carrera){
            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre) VALUE(:nombre)");
            $pdo->bindParam(":nombre", $carrera, PDO::PARAM_STR);

            if($pdo -> execute()){
                return true;
            }
            $pdo->closeCursor();
            $pdo = null;
        }

    }
?>