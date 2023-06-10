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
}
?>
