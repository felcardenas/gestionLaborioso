<?php 

include '../../global/conexion.php';
session_start();

if(isset($_POST)){
    $_SESSION['fechaExamen'] = $_POST['fechaExamen'];
    $_SESSION['horaExamen'] = $_POST['horaExamen'];
    
    $_SESSION['fechaActual'] = $_POST['fechaExamen'];
    $_SESSION['horaActual'] = $_POST['horaExamen'];
    
    $_SESSION['idEvaluacion'] = $_POST['idEvaluacion'];
    $idEvaluacion = $_SESSION['idEvaluacion'];

    $sql = "SELECT ID_EMPRESA, CARGO, PENDIENTE_REVISION_MEDICA FROM EVALUACION WHERE EVALUACION.ID_EVALUACION = '$idEvaluacion'";

    $resultado = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($resultado);
    $_SESSION['cargoTrabajador'] = $row['CARGO'];
    $_SESSION['idEmpresa'] = $row['ID_EMPRESA'];
    $_SESSION['estadoEvaluacion'] = $row['PENDIENTE_REVISION_MEDICA'];
    
    $idEmpresa = $_SESSION['idEmpresa'];
    mysqli_free_result($resultado);

    $sql = "SELECT NOMBRE_EMPRESA FROM EMPRESA WHERE ID_EMPRESA = '$idEmpresa'";
    $resultado = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($resultado);
    $_SESSION['nombreEmpresa'] = $row['NOMBRE_EMPRESA'];
    mysqli_free_result($resultado);

    

    header('Location: examen.php');
}


?>