<?php

require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";

class UsuariosA{

	public $Uid;

	public function EditarUsuariosA(){

		$columna = "id";
		$valor = $this->Uid;

		$resultado = UsuariosC::VerUsuariosC($columna, $valor);

		echo json_encode($resultado);

	}


	public $verificarUsuario;

	public function VerificarUsuario(){

		$columna = "usuario";
		$valor = $this->verificarUsuario;

		$resultado = UsuariosC::VerUsuariosC($columna, $valor);

		echo json_encode($resultado);

	}



}



if(isset($_POST["Uid"])){

	$editarU = new UsuariosA();
	$editarU -> Uid = $_POST["Uid"];
	$editarU -> EditarUsuariosA();

}

if(isset($_POST["verificarUsuario"])){

	$verificarU = new UsuariosA();
	$verificarU -> verificarUsuario = $_POST["verificarUsuario"];
	$verificarU -> VerificarUsuario();

}