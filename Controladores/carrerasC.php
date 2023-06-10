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
        /* Ver carrera */
        public function VerCarrerasC(){
            $tablaBD = "carreras";
            
            $resultado = CarrerasM::VerCarrerasM($tablaBD);

            return $resultado;
        }


        /* Editar Carrera */

        public function EditarCarreraC(){
            $tablaBD = "carreras";
            $exp = $url = explode("/", $_GET["url"]); #Separamos en cadena de texto lo que viene en la variable GET

            $id = $exp[1];

            $resultado = CarrerasM::EditarCarreraM($tablaBD, $id);

            echo '
                
            <div class="col-md-6 col-cs-12">
                <h2>Nombre de la Carrera</h2>
                <input type="text" name="carrera" class="form-control input-lg" value="'.$resultado["nombre"].'" required>

                <input type="hidden" name="Cid" value="'.$resultado["id"].'">
                <br>
                <button class="btn btn-success" type="submit">Guardar</button>
            </div>
            ';
        }
    }
?>