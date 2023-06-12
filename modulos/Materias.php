<div class="content-wrapper">
    <section class="content-header">

        <?php 
            $columna = "id";
            $valor = $_SESSION["id_carrera"];

            $carreraC = new CarrerasC();
            $res = $carreraC->VerCarreras2C($columna, $valor);

            echo '<h1>Materias de la Carrera: '.$res["nombre"].'</h1>'
        ?>

    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">

                <?php 
                
                $columna = "id";
                $valor = 1;

                $ajustes = AjustesC::VerAjustesC($columna, $valor);

                if($ajustes["h_materias"] != 0){

                } else {
                    echo '<div class="alert alert-warning">Aun no estan habilitadas las fechas de las incripciones</div>';
                }

                ?>

                <table class="table table-bordered table-hover table-striped">

                    <thead>
                        <tr>

                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Grado</th>
                            <th>Tipo</th>
                            <th></th>

                        </tr>

                        <tbody>
                            <tr>

                                <td>111</td>
                                <td>Ingles II</td>
                                <td>1</td>
                                <td>2do Cuatrimestre</td>
                                <td>
                                    <a href="http://localhost/universidad/insc-materia">
                                        <button class="btn btn-primary">Ver Detalles</button>
                                    </a>
                                </td>

                            </tr>
                        </tbody>
                    </thead>

                </table>
            </div>
        </div>
    </section>
</div>