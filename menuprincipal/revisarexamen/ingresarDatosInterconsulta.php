<?php 

include '../../global/conexion.php';
session_start();

if(isset($_POST)){
    $_SESSION['fechaHora'] = $_POST['fechaHora'];
    $fechaHora = $_SESSION['fechaHora'];
    $cadenaFechaHora = explode(' ',$fechaHora,2);

    $_SESSION['fecha'] = $cadenaFechaHora[0];
    $_SESSION['hora'] = $cadenaFechaHora[1]; 

    echo 'true';
    
}

//header('Location: informes/informeInterconsulta.php');

?>