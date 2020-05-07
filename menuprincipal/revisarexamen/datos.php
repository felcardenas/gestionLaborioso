<?php 
include '../../global/conexion.php';
//session_start();


if(mysqli_connect_errno()){
    echo "fallo al conectar";
}

date_default_timezone_set("America/Santiago");  

/* $_SESSION['idTrabajador'] = $row['ID_TRABAJADOR'];
$idTrabajador = $row['ID_TRABAJADOR'];
$idUsuario = $_SESSION['idUsuario'];
$_SESSION['edadTrabajador'] = $edadAños . " años";
$_SESSION['nombreCompletoTrabajador'] = $row['NOMBRE_TRABAJADOR'] . " " . $row['APELLIDO_TRABAJADOR'];
$_SESSION['rutTrabajador'] = $rutTrabajador;
$_SESSION['dvTrabajador'] = $dvTrabajador;
$_SESSION['rutCompletoTrabajador'] = $rutTrabajador . "-" . $dvTrabajador; */

$rutTrabajador = $_SESSION['rutTrabajador'];
$dvTrabajador = $_SESSION['dvTrabajador'];
$sql = "SELECT 
evaluacion.ID_EVALUACION, 
TRABAJADOR.ID_TRABAJADOR, 
RUT_TRABAJADOR, 
DV_TRABAJADOR, 
NOMBRE_TRABAJADOR, 
APELLIDO_TRABAJADOR, 
NOMBRE_USUARIO, 
APELLIDO_USUARIO, 
FECHA_CREACION, 
EVALUACION.ID_USUARIO, 
HORA_CREACION 
FROM EVALUACION 
INNER JOIN TRABAJADOR 
ON evaluacion.ID_TRABAJADOR = trabajador.ID_TRABAJADOR 
INNER JOIN usuario 
ON evaluacion.ID_USUARIO = USUARIO.ID_USUARIO 
WHERE TRABAJADOR.RUT_TRABAJADOR = '$rutTrabajador' AND TRABAJADOR.DV_TRABAJADOR = '$dvTrabajador' AND EVALUACION.PENDIENTE_REVISION_MEDICA = 1
ORDER BY evaluacion.FECHA_CREACION DESC LIMIT 10 "; 
?>
