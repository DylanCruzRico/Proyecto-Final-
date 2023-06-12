<?php 
    class AjustesC{

        static public function VerAjustesC($columna, $valor){

            $tablaBD = "ajustes";

            $resultado = AjustesM::VerAjustesM($tablaBD, $columna, $valor);

            return $resultado;
        }
    
        public function CambiarSemestreC(){
            if(isset($_POST["semestreA"])){

                $tablaBD = "ajustes";
                $semestre = $_POST["semestreA"];

                $resultado = AjustesM::CambiarSemestreM($tablaBD, $semestre);

                if($resultado == true){
                    echo '<script> 
                        window.location = "Editar-Inicio"
                    </script>';
                }
            }
        }

        public function ActualizarAjustesC(){
            if(isset($_POST["1_fecha_inicio"])){
                $tablaBD = "ajustes";
                $datosC = array("1_fecha_inicio" => $_POST["1_fecha_inicio"], "1_fecha_fin" =>$_POST["1_fecha_fin"], 
                                "2_fecha_inicio" => $_POST["2_fecha_inicio"], "2_fecha_fin" =>$_POST["2_fecha_fin"],
                                "examenes_i" => $_POST["examenes_i"], "examenes_f" =>$_POST["examenes_f"],
                                "materias_i" => $_POST["materias_i"], "materias_f" =>$_POST["materias_f"]);

                $resultado = AjustesM::ActualizarAjustesC($tablaBD, $datosC);
                
                if($resultado == true){
                    echo '<script> 
                        window.location = "Editar-Inicio"
                    </script>';
                }
            }
        }
    }
?>