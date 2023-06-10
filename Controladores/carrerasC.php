<?php
    class CarrerasC{

        /* Crear Carrera */

        public function CrearCarreraC(){
            if(isset($_POST["carrera"])){
                $tablaBD =  "carreras";

                $carrera = $_POST["carrera"];

                $resultado = CarrerasM::CrearCarreraM($tablaBD, $carrera);

                if($resultado == true){
                    echo '<script> 
                        window.location = "Carreras";
                    </script>';
                }
            }
        }

    }
?>