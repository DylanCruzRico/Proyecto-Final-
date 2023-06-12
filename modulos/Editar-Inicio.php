<?php 
    if($_SESSION["rol"] != "Administrador"){
        echo '<script> 
            window.locations = "inicio"
        </script>';

        return;
    }
?>


<div class="content-wrapper">

    <section class="content" >

        <div class="box">

            <div class="box-body">

                <div class="row">

                    <div class="col-md-6 col-xs-12"> 

                    <?php
                        $columna = "id";
                        $valor = 1;

                        $resultado = AjustesC::VerAjustesC($columna, $valor);

                        echo '
                            <h2>Semestre actual: '.$resultado["semestre"].'</h2>
                            
                            <form action="" method="POST">

                                <button type="submit" class="btn btn-primary">1° Semestre</button>

                                <input type="hidden" name="semestreA" value="1° Semestre">';

                        $semestre = new AjustesC();
                        $semestre -> CambiarSemestreC();

                        echo'
                            </form>

                            <br>

                            <form action="" method="POST">

                                <button type="submit" class="btn btn-success">2° Semestre</button>

                                <input type="hidden" name="semestreA" value="2° Semestre">';
                        $semestre = new AjustesC();
                        $semestre -> CambiarSemestreC();
                        echo'        
                            </form>

                            <br>

                            <form action="" method="POST">

                                <h2>1° Semestre</h2>
                                <h3>Inicio: <input type="text" class="input-lg" name="1_fecha_inicio" value="'.$resultado["1_fecha_inicio"].'"></h3>
                                <h3>Fin: <input type="text" class="input-lg" name="1_fecha_fin" value="'.$resultado["1_fecha_fin"].'"></h3>

                                <br>

                                <h2>2° Semestre</h2>
                                <h3>Inicio: <input type="text" class="input-lg" name="2_fecha_inicio" value="'.$resultado["2_fecha_inicio"].'"></h3>
                                <h3>Fin: <input type="text" class="input-lg" name="2_fecha_fin" value="'.$resultado["2_fecha_fin"].'"></h3>

    
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <br> 

                                <h2>Fechas de examenes</h2>
                                <h3>Desde: <input type="text" class="input-lg" name="examenes_i" value="'.$resultado["examenes_i"].'"></h3>
                                <h3>Hasta: <input type="text" class="input-lg" name="examenes_f" value="'.$resultado["examenes_f"].'"></h3>

                                <br>

                                <h2>Fechas de inscripción</h2>
                                <h3>Desde: <input type="text" class="input-lg" name="materias_i" value="'.$resultado["materias_i"].'"></h3>
                                <h3>Hasta: <input type="text" class="input-lg" name="materias_f" value="'.$resultado["materias_f"].'"></h3>


                            </div>

                        <br>
                        <button type="submit" class="btn btn-success btn-lg">Guardar</button>';

                        $guardarAjustes = new AjustesC();
                        $guardarAjustes -> ActualizarAjustesC()
                        ?>
                    </form>

                </div>

            </div>

        </div>

    </section>

</div>