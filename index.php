<?php 

    require_once 'Controladores/plantillaC.php';

    require_once 'Controladores/usuariosC.php';
    require_once "Modelo/usuariosM.php";

    require_once 'Controladores/carrerasC.php';
    require_once "Modelo/carrerasM.php";
    
    require_once 'Controladores/AjustesC.php';
    require_once "Modelo/AjustesM.php";

    require_once 'Controladores/materiasC.php';
    require_once "Modelo/materiasM.php";

    $plantilla = new Plantilla();
    $plantilla -> LlamarPlantilla();


?>