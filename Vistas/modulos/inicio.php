<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ¡Bienvenido!
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <?php
            $columna = "id";
            $valor = 1;

            $resultado = AjustesC::VerAjustesC($columna, $valor);
            echo '
              <h3 class="box-title">Semestre Actual: '.$resultado["semestre"].'</h3>
            
              </div>
              <div class="box-body">
                <div class="col-md-6 col-xs-12">
                  
                  <h2>1er Semestre</h2>
                  <h3>Inicio: '.$resultado["1_fecha_inicio"].'</h3>
                  <h3>Fin: '.$resultado["1_fecha_fin"].'</h3>
      
                  <hr>
      
                  <h2>2er Semestre</h2>
                  <h3>Inicio '.$resultado["2_fecha_inicio"].'</h3>
                  <h3>Fin '.$resultado["2_fecha_fin"].'</h3>
      
                </div>
                <div class="col-md-6 col-xs-12 bg-success">
      
                  <h2>Fechas de examenes Próximas:</h2>
                  <h3>Desde: '.$resultado["examenes_i"].'</h3>
                  <h3>Hasta: '.$resultado["examenes_f"].'</h3>
      
                  <hr>';
                  if($resultado["h_materias"] != 0){
                    echo '
                      <h2>Fechas de inscripción:</h2>
                      <h3>Desde: '.$resultado["materias_i"].'</h3>
                      <h3>Hasta: '.$resultado["materias_f"].'</h3>';
                  }

                  echo '</div> 
                        </div>';

        if($_SESSION["rol"] == "Administrador"){
          echo '
          <div class="box-footer">
            <a href="Editar-Inicio">
              <button class="btn btn-success btn-lg">Editar</button>
            </a>
          </div>';
        }

        ?>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>