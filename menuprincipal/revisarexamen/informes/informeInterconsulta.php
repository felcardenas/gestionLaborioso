<?php

include '../../plantillas/header.php';
include "../../../global/conexion.php";
require_once __DIR__ . '../../../../plugins/mpdf/vendor/autoload.php';
session_start();
date_default_timezone_set("America/Santiago");  

$fecha = $_SESSION['fecha'];
$hora = $_SESSION['hora'];


$sql = "SELECT NOMBRE_ESPECIALIDAD, FECHA, HORA, NOMBRE_MEDICO, CLAVE, EDAD, OBSERVACIONES,FECHA_VALIDEZ FROM INTERCONSULTA INNER JOIN ESPECIALIDAD ON ESPECIALIDAD.ID_ESPECIALIDAD = INTERCONSULTA.ID_ESPECIALIDAD WHERE HORA = '$hora' AND FECHA = '$fecha'ORDER BY `INTERCONSULTA`.`FECHA` DESC, `INTERCONSULTA`.`HORA` DESC LIMIT 1";

$resultado = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($resultado);

$nombreEspecialidad = $row['NOMBRE_ESPECIALIDAD'];
$hora = $row['HORA'];
$fecha = $row['FECHA'];
$fecha = date("d/m/Y", strtotime($fecha));
$fechaValidez = $row['FECHA_VALIDEZ'];



$nombreMedico = utf8_encode($row['NOMBRE_MEDICO']);
$clave = $row['CLAVE'];
$edad = $row['EDAD'];
$observaciones = $row['OBSERVACIONES'];
$validoHasta = date("d/m/Y", strtotime($fechaValidez));

mysqli_free_result($resultado);

//$edad = $_SESSION['edadTrabajador'];
$nombreCompletoTrabajador = utf8_encode($_SESSION['nombreCompletoTrabajador']);
//$nombreMedico = $_SESSION['usuarioNombreCompleto'];

$rutTrabajador = $_SESSION['rutTrabajador'];
$dvTrabajador = $_SESSION['dvTrabajador'];
$rut = $rutTrabajador . "-" . $dvTrabajador;
    

//$time = time();
//$fecha = date("d/m/Y", $time);

$html = "<table>

<tr>
    <td style='width:105'><img src='../../../img/logosinfondo.png' width='100' height='100'></td>
    <td style='width:340'><img src='../../../img/logoazul.png' width='250' height='80'></td>
    <td>
        <table>
            <tr>
                <td style='font-family:arial; font-size:14;'>FECHA EMISIÓN: </td>
                <td style='font-family:arial; font-size:14;'>$fecha</td>
            </tr>
            <tr>
                <td style='font-family:arial; font-size:14;'>VÁLIDO HASTA: </td>
                <td style='font-family:arial; font-size:14;'>$validoHasta</td>
            </tr>
        </table>
    </td>
</tr>


</table>

<h1 style='font-family:arial; text-align:center;'> INTERCONSULTA</h1>



<table style='font-family:arial; font-size:16;'> 
    <title>Resultado exámenes de: $nombreCompletoTrabajador</title>

    <tr>
        <td>Trabajador: <td>
        <td>$nombreCompletoTrabajador<td>
        <td style='width:100'></td>
    </tr>

    <tr>
        <td>RUN: <td>
        <td>$rut<td>
        <td></td>
    </tr>

    <tr>
        <td>Edad: <td>
        <td>$edad<td>
        <td></td>
    </tr>


</table>


<br>
            <p class='text-justify-center' style='font-family:arial; font-size:20; width=300px'>
            El/la sr/sra ". $nombreCompletoTrabajador .", RUT: ". $rut . " con fecha ".$fecha.", ha sido sometido a evaluación preventiva de salud, en relacion a la cual se solicita control por su sistema previsional de salud con especialidad ". $nombreEspecialidad .", de acuerdo a los siguientes antecedentes:  
         
            <p class='text-justify-center' style='font-family:arial; font-size:20; width=300px'> 
            $observaciones
            </p>


";


$html .= "<br>
<br><br><br>

<table style='font-family:arial; width:700'> 
<tr>
    <td style='text-align:center'>______________________________________ </th>
</tr>

<tr>
    <td style='text-align:center'>Dr/dra $nombreMedico</td>
</tr>
</table>

<br><br>






";





//$nombreSalida = $trabajador.".php";

$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage('', // L - landscape, P - portrait 
'', '', '', '',
15, // margin_left
15, // margin right
15, // margin top
40, // margin bottom
5, // margin header
15); // margin footer
$mpdf->SetHTMLFooter("
<table style='margin-top:20px; font-family:arial; width:700; font-size:12;'>
    <tr>
        <td>
            <h5>NOTA:</h5>
            <p>Teniendo en consideración que la alteración es de índole no laboral, el cumplimiento de esta indicación es de exclusiva responsabilidad del trabajador.</p>
            <p>Esta información podrá ser entregada a terceras personas, exclusivamente con la autorización expresa y por escrito del trabajador, en cuplimiento a lo normado en la ley 19.628. (Instrucción MI G.0. Nº187/99)</p>
        </td>
    <tr>
</table>
");
$mpdf->WriteHTML($html);
$mpdf->Output();
 
?>