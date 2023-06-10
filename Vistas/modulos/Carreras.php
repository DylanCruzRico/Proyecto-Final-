<?php 
    if($_SESSION["rol"] != "Administrador"){
        echo '<script> 
            window.locations = "inicio"
        </script>';

        return;
    }
?>


<div class="content-wrapper">
   <section class="content-header">
    <h1>Gestor de Carreras Universitarias</h1>
   </section>

   <section class="content">

    <div class="box">
        <div class="box-header">
            <form action="" method="POST">
                <input type="text" name="carrera" class="form-control" placeholder="Ingresar nueva carrera" required>
                <br>
                <button type="submit" class="btn btn-primary">Crear Carrera</button>
            </form>
        </div>
    </div>
   </section>
</div>