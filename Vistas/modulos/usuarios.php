<?php 
    if($_SESSION["rol"] != "Administrador"){
        echo '<script> 
            window.location = "inicio"
        </script>';

        return;
    }
?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>Gestor de usuarios</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header">

                <button class="btn btn-primary" data-toggle="modal" data-target="#CrearUsuario"> Crear nuevo usuario</button>

            </div>

            <div class="box-body">

            <table class="table table-bordered table-hover table-striped">

                <thead>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Carrera</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Editar/borrar</th>
                </thead>

                <tbody>


                <?php

$columna = null;
$valor = null;

$resultado = UsuariosC::VerUsuariosC($columna, $valor);

foreach ($resultado as $key => $value) {

    echo '<tr>
    
            <td>'.$value["apellido"].'</td>
            <td>'.$value["nombre"].'</td>';

            if($value["id_carrera"] == 0){

                echo '<td>Usuario Administrador</td>';

            }else{

            $columnaC = "id";
            $valorC = $value["id_carrera"];

            $carrera = CarrerasC::CarreraC($columnaC, $valorC);

            echo '<td>'.$carrera["nombre"].'</td>';

            }

            echo '<td>'.$value["usuario"].'</td>
            <td>'.$value["clave"].'</td>
            <td>'.$value["rol"].'</td>

            <td>
                
                <div class="btn-group">
                    
                    <button class="btn btn-success EditarUsuario" Uid="'.$value["id"].'" data-toggle="modal" data-target="#EditarUsuario">Editar</button>

                    <button class="btn btn-danger EliminarUsuario" Uid="'.$value["id"].'">Borrar</button>

                </div>

            </td>

        </tr>';

}

?>
                </tbody>

            </table>

            </div>
        </div>

    </section>

</div>



<div class="modal fade" id="CrearUsuario">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="" method="POST">

                <div class="modal-body">

                    <div class="box-body">
                        <div class="form-group">

                            <h2>Apellido:</h2>
                            <input class="form-control input-lg" type="text" name="apellidoU" required>

                        </div>
                        <div class="form-group">

                            <h2>Nombre:</h2>
                            <input class="form-control input-lg" type="text" name="nombreU" required>

                        </div>
                        <div class="form-group">

                            <h2>Usuario:</h2>
                            <input class="form-control input-lg" type="text" name="usuarioU" required>

                        </div>
                        <div class="form-group">

                            <h2>Contraseña:</h2>
                            <input class="form-control input-lg" type="text" name="claveU" required>

                        </div>
                        <div class="form-group">

                            <h2>Seleccionar Carrera:</h2>
                            <select name="carreraU" id="" class="form-control input-lg" required>
                                <option value="0">Seleccionar Carrera...</option>
                                <?php 
                                /* Checa esto Valerio */
                                    $carreras = CarrerasC::VerCarrerasC();

                                    foreach($carreras as $key => $value){
                                        echo'<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                    }
                                
                                ?>
                                
                            </select>

                        </div>
                        <div class="form-group">
                            <h2>Seleccionar rol:</h2>
                            <select name="rolU" id="" class="form-control input-lg" required>
                                <option value="0">Seleccionar rol...</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Estudiante">Estudiante</option>
                            </select>

                            </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="button" class="btn btn-danger">Salir</button>
                </div>

                <?php
                
                    $crearU = new UsuariosC();
                    $crearU -> CrearUsuarioC();
                ?>

            </form>
            
        </div>

    </div>

</div>




<div class="modal fade" id="EditarUsuario">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="" method="POST">

                <div class="modal-body">

                    <div class="box-body">
                        <div class="form-group">

                            <h2>Apellido:</h2>
                            <input class="form-control input-lg" type="text" name="apellidoEU" required>

                        </div>
                        <div class="form-group">

                            <h2>Nombre:</h2>
                            <input class="form-control input-lg" type="text" name="nombreEU" required>

                        </div>
                        <div class="form-group">

                            <h2>Usuario:</h2>
                            <input class="form-control input-lg" type="text" name="usuarioEU" required>

                        </div>
                        <div class="form-group">

                            <h2>Contraseña:</h2>
                            <input class="form-control input-lg" type="text" name="claveEU" required>

                        </div>
                        <div class="form-group">

                            <h2 id="carreraActual">Carrera actual: Sistemas</h2>
                            <h2>Seleccionar nueva Carrera:</h2>
                            <select name="carreraEU" id="" class="form-control input-lg" required>
                                <option value="0">Seleccionar Carrera...</option>
                                <option value="">Programador</option>
                            </select>

                        </div>
                        <div class="form-group">

                            <h2 id="carreraActual">Rol actual: Estudiante</h2>
                            <h2>Seleccionar nuevo rol:</h2>
                            <select name="rolEU" id="" class="form-control input-lg" required>
                                <option value="0">Seleccionar rol...</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Estudiante">Estudiante</option>
                            </select>

                            </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="button" class="btn btn-danger">Salir</button>
                </div>

            </form>
            
        </div>

    </div>

</div>