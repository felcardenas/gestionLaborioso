<?php 

include '../../global/conexion.php';
session_start();
//echo $_POST['fechaHora'];



 if(isset($_POST['fechaHora'])){
    //echo $_POST['fechaHora'];
    $_SESSION['fechaHora'] = $_POST['fechaHora'];
    $fechaHora = $_SESSION['fechaHora'];
    $cadenaFechaHora = explode(' ',$fechaHora,2);

    $_SESSION['fecha'] = $cadenaFechaHora[0];
    $_SESSION['hora'] = $cadenaFechaHora[1]; 

    //echo $_SESSION['fecha'].$_SESSION['hora'];
    echo 'true';
} 

//header('Location: informes/informeTrabajador.php');

?>