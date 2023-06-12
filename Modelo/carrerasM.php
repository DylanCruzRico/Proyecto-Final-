<?php

require_once "ConexionBD.php";

    class CarrerasM extends ConexionBD{

        //Crear Carrera
        static public function CrearCarreraM($tablaBD, $carrera){

            $conexionBD = new ConexionBD();
            $pdo = $conexionBD->cBD()->prepare("INSERT INTO $tablaBD (nombre) VALUES (:nombre)");


            $pdo -> bindParam(":nombre", $carrera, PDO::PARAM_STR);

            if($pdo -> execute()){

                return true;

            }

            $pdo = $conexionBD->close();
            $pdo = null;

        }



        //Ver Carreras
        static public function VerCarrerasM($tablaBD){

            $conexionBD = new ConexionBD();
            $pdo = $conexionBD->cBD()->prepare("SELECT * FROM $tablaBD");
            // $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

            $pdo -> execute();

            return $pdo -> fetchAll();

            $pdo->close();
            $pdo = null;  

        }

        static public function VerCarreras2M($tablaBD, $columna, $valor){
            $conexionBD = new ConexionBD();
            $pdo = $conexionBD->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            // $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

            $pdo ->bindParam(":".$columna, $valor, PDO::PARAM_INT);

            $pdo -> execute();

            return $pdo -> fetch();

            $pdo->close();
            $pdo = null;  
        }

        static public function CarreraM($tablaBD, $columna, $valor){
            $conexionBD = new ConexionBD();
            $pdo = $conexionBD->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo->bindParam(":".$columna, $valor, PDO::PARAM_STR);

            $pdo->execute();

            return $pdo -> fetch();

            $pdo->close();
            $pdo = null;  
        }

        //Editar Carreras
        static public function EditarCarreraM($tablaBD, $id){

            $conexionBD = new ConexionBD();
            $pdo = $conexionBD->cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");
            // $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

            $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

            $pdo -> execute();

            return $pdo -> fetch();

            $pdo->close();
            $pdo = null;

        }



        //Actualizar Carreras
        static public function ActualizarCarrerasM($tablaBD, $datosC){

            $conexionBD = new ConexionBD();
            $pdo = $conexionBD->cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre WHERE id = :id");
            // $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre WHERE id = :id");

            $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
            $pdo -> bindParam(":nombre", $datosC["carrera"], PDO::PARAM_STR);

            if($pdo -> execute()){
                return true;
            }

            $pdo = $conexionBD->close();
            $pdo = null;

        }

        //Borrar Carreras

        static function BorrarCarrerasM($tablaBD, $id){
            $conexionBD = new ConexionBD();
            $pdo = $conexionBD->cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id"); 
            // $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id"); 
            $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

            if($pdo -> execute()){
                return true;
            }

            $pdo = $conexionBD->close();
            $pdo = null;
        }

    }
?>