<div class="content-wrapper">
    <section class="content-header">

        <?php 
            $columna = "id";
            $valor = $_SESSION["id_carrera"];

            $carreraC = new CarrerasC();
            $res = $carreraC->VerCarreras2C($columna, $valor);

            echo '<h1>Plan de estudios: '.$res["nombre"].'</h1>'
        ?>

    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">

                    <thead>
                        <tr>

                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Grado</th>
                            <th>Tipo</th>
                            <th>Programa</th>
                            <th>Nota</th>

                        </tr>

                        <tbody>

                            <?php
                            
                            $resultado = MateriasC::VerMateriasC();

                            foreach($resultado as $key => $value) {
                                if($value["id_carrera"] == $_SESSION["id_carrera"]){

                                    echo '
                                    <tr>

                                        <td>'.$value["codigo"].'</td>
                                        <td>'.$value["nombre"].'</td>
                                        <td>'.$value["grado"].'</td>
                                        <td>'.$value["tipo"].'</td>';

                                        echo '<td>Cal. pendiente</td>';
                                    }

                                    $columna = "id_materia";
                                    $valor = $value["id"];
                            }
                            
                            ?>

                            
                        </tbody>
                    </thead>

                </table>
            </div>
        </div>
    </section>
</div>