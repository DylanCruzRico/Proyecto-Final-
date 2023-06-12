<?php
class ConexionBD {
    public function cBD() {
        try {
            $bd = new PDO("mysql:host=localhost;dbname=universidad", "root", "");
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $bd->exec("set names utf8");
            echo "Conexión exitosa a la base de datos";
            return $bd;
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }
}
?>