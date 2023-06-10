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

        /* Ver carreras */

        static public function VerCarrerasM($tablaBD){
            $pdo =  ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
            $pdo -> execute();

            return $pdo -> fetchAll();

            $pdo->closeCursor();
            $pdo = null;

        }

        /* Editar Carrera */
        static public function EditarCarreraM($tablaBD, $id){
            $pdo =  ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id= :id");
            
            $pdo->bindParam(":id", $id, PDO::PARAM_INT);
            
            $pdo -> execute();

            return $pdo -> fetch();

            $pdo->closeCursor();
            $pdo = null;
        }

    }
?>