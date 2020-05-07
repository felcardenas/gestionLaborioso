<?php 

include '../../global/conexion.php';
session_start();

if(isset($_POST)){
    $_SESSION['fechaExamen'] = $_POST['fechaExamen'];
    $_SESSION['horaExamen'] = $_POST['horaExamen'];
    $_SESSION['idEvaluacion'] = $_POST['idEvaluacion'];
    header('Location: examen.php');
}


?>