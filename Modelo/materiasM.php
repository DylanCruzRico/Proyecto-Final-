<?php

require_once "ConexionBD.php";

class MateriasM extends ConexionBD{

	static public function CrearMateriaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_carrera, codigo, nombre, grado, tipo, programa) VALUES (:id_carrera, :codigo, :nombre, :grado, :tipo, :programa)");
	
		$pdo -> bindParam("id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
		$pdo -> bindParam("codigo", $datosC["codigo"], PDO::PARAM_STR);
		$pdo -> bindParam("nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam("grado", $datosC["grado"], PDO::PARAM_STR);
		$pdo -> bindParam("tipo", $datosC["tipo"], PDO::PARAM_STR);
		$pdo -> bindParam("programa", $datosC["programa"], PDO::PARAM_STR);
	
		if($pdo -> execute()){
			return true;
		}
	
		$pdo -> close();
		$pdo = null;
	
	}
	

	static public function VerMateriasM($tablaBD){
		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY grado, codigo ASC");
	
		$pdo -> execute();

		return $pdo -> fetchAll();
	
		$pdo -> close();
		$pdo = null;
	}

	static public function VerMaterias2M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}
	
	// static public function MateriaM($tablaBD, $columna, $valor){
	// }


	static public function EliminarMateriaM($tablaBD, $id){
	
		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
	
		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);
	
		if($pdo -> execute()){
			return true;
		}
	
		$pdo -> close();
		$pdo = null;
	}

	// static public function VerNotasM($tablaBD, $columna, $valor){

	// 	$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

	// 	$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

	// 	$pdo -> execute();

	// 	return $pdo -> fetchAll();

	// 	$pdo -> close();
	// 	$pdo = null;

	// }


}

