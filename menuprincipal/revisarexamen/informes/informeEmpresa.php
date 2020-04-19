<?php

include '../../plantillas/header.php';
include "../../../global/conexion.php";
require_once __DIR__ . '../../../../plugins/mpdf/vendor/autoload.php';
session_start();



if(isset($_POST)){
    $nombreEmpresa = $_POST['nombreEmpresa'];
    $cargoTrabajador = $_POST['cargoTrabajador'];
    $nombreMedico = $_POST['nombreMedico'];
    $idEvaluacion = $_SESSION['idEvaluacion'];
}
$sql="SELECT RUT_EMPRESA, DV_EMPRESA FROM EMPRESA WHERE NOMBRE_EMPRESA = '$nombreEmpresa'";

$resultado = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($resultado);

$rutEmpresa = $row['RUT_EMPRESA'];
$dvEmpresa = $row['DV_EMPRESA'];
$rutEmpresaCompleto = $rutEmpresa."-".$dvEmpresa;

?>



<?php



//$idTrabajador = $_SESSION['idTrabajador'];
//$idUsuario = $_SESSION['idUsuario'];
$edad = $_SESSION['edadTrabajador'];
$nombreCompletoTrabajador = utf8_encode($_SESSION['nombreCompletoTrabajador']);
$rutTrabajador = $_SESSION['rutTrabajador'];
$dvTrabajador = $_SESSION['dvTrabajador'];
$rut = $rutTrabajador . "-" . $dvTrabajador;
    

$sql = "SELECT PULSO, PESO, ALTURA, PRESION_DIASTOLICA, PRESION_SISTOLICA, IMC, CONCLUSION_MEDICA, RECOMENDACIONES FROM EVALUACION WHERE ID_EVALUACION = $idEvaluacion";

$resultado = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($resultado);

$pulso = $row['PULSO'];
$peso = $row['PESO'];
$altura = $row['ALTURA'];
$tensionDiastolica = $row['PRESION_DIASTOLICA'];
$tensionSistolica = $row['PRESION_SISTOLICA'];
$IMC = round($row['IMC'],1);
$conclusionMedica = utf8_encode($row['CONCLUSION_MEDICA']);
$conclusionMedica2 = explode("-",$conclusionMedica);
$conclusionMedica3 = $conclusionMedica2[1];

$recomendaciones = utf8_encode($row['RECOMENDACIONES']);


mysqli_free_result($resultado);


//$idEvaluacion = '136';
//$trabajador = "Juanito";
//$rut = $rutCompletoTrabajador;
//$edad = "50"." años";

$sql = "SELECT CONCLUSION_MEDICA, RECOMENDACIONES FROM EVALUACION WHERE ID_EVALUACION = $idEvaluacion";

$resultado = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($resultado);

$conclusionMedica = utf8_encode($row['CONCLUSION_MEDICA']);
$recomendaciones = utf8_encode($row['RECOMENDACIONES']);

mysqli_free_result($resultado);

$sql = "SELECT bateria_de_examenes.NOMBRE_BATERIA_DE_EXAMENES FROM bateria_de_examenes INNER JOIN evaluacion_bateria_de_examenes ON bateria_de_examenes.ID_BATERIA_DE_EXAMENES = evaluacion_bateria_de_examenes.ID_BATERIA_DE_EXAMENES INNER JOIN EVALUACION ON evaluacion_bateria_de_examenes.ID_EVALUACION = evaluacion.ID_EVALUACION WHERE evaluacion.ID_EVALUACION = '$idEvaluacion'";

$cadenaBateriaDeExamenes = "";

$resultado = mysqli_query($conexion,$sql);
while($row = mysqli_fetch_assoc($resultado)){
    $cadenaBateriaDeExamenes .= $row['NOMBRE_BATERIA_DE_EXAMENES']." / ";
}

$cadenaBateriaDeExamenes = substr($cadenaBateriaDeExamenes,0,-2);
mysqli_free_result($resultado);



$time = time();


$hoy = date("Y/m/d", $time);

$html = "<table>

<tr>
    <td style='width:105'><img src='../../../img/logosinfondo.png' width='100' height='100'></td>
    <td style='width:340'><img src='../../../img/logoazul.png' width='250' height='80'></td>
    <td>
        <table>
            <tr>
                <td style='font-family:arial; font-size:14;'>FECHA EMISIÓN: </td>
                <td style='font-family:arial; font-size:14;'>$hoy</td>
            </tr>
        </table>
    </td>
</tr>


</table>


<table style='font-family:arial; font-size:16;'> 
    
    <tr>
        <td>Srs. Empresa: <td>
        <td>$nombreEmpresa<td>
    </tr>

    <tr>
        <td>RUN: <td>
        <td>$rutEmpresaCompleto<td>
    </tr>

    <tr>
        <td>PRESENTE <td>
        <td><td>
    </tr>

    

</table>

<h1 style='font-family:arial; text-align:center;'> INFORME EVALUACION PRE-OCUPACIONAL</h1>



<table style='font-family:arial; font-size:16;'> 
    <title>Resultado de exámenes de: $nombreCompletoTrabajador</title>

    <tr>
        <td>Trabajador: <td>
        <td>$nombreCompletoTrabajador<td>
    </tr>

    <tr>
        <td>RUN: <td>
        <td>$rut<td>
    </tr>

    <tr>
        <td>Edad: <td>
        <td>$edad<td>
    </tr>

    <tr>
        <td>Cargo: <td>
        <td>$cargoTrabajador<td>
    </tr>

    

</table>

<br>

<table style='font-family:arial; table-layout: fixed; border-collapse:collapse; width:700;'> 
<tr>
    <th style='border:1px solid; font-size:16;'>RIESGOS </th>
</tr>

<tr>
    <td style='border:1px solid;text-align:center;'>$cadenaBateriaDeExamenes</td>
</tr>
</table>


";


$sql = "SELECT EXAMEN.NOMBRE_EXAMEN FROM EXAMEN INNER JOIN evaluacion_examen ON examen.ID_EXAMEN = evaluacion_examen.ID_EXAMEN WHERE evaluacion_examen.ID_EVALUACION ='$idEvaluacion'";

$resultado = mysqli_query($conexion,$sql);
$i=0;

$array = array();
while($row = mysqli_fetch_assoc($resultado)){
    $array[$i] = $row['NOMBRE_EXAMEN'];                
    $i++;
}

mysqli_free_result($resultado);








mysqli_free_result($resultado);
mysqli_close($conexion);

$html .= "
<br>


<table style='font-family:arial; table-layout: fixed; border-collapse:collapse; width:700;'> 
<tr>
    <th style='border:1px solid; font-size:16;'>CONCLUSIÓN MÉDICA </th>
</tr>

<tr>
    <td style='border:1px solid;'>$conclusionMedica3</td>
</tr>
</table>


<br><br><br><br><br><br>

<table style='font-family:arial; width:700'> 
<tr>
    <td style='text-align:center'>______________________________________ </th>
</tr>

<tr>
    <td style='text-align:center'>Dr(a). $nombreMedico</td>
</tr>
</table>




";




//$nombreSalida = $trabajador.".php";

$mpdf = new \Mpdf\Mpdf();
$mpdf->SetHTMLFooter("
<table style='font-family:arial; width:700; font-size:12;'>
    <tr>

        <td>
            <h5>OBSERVACIONES:</h5>

            <p>-Los elementos utilizados y/o disponibles en esta evaluación no aseguran que el trabajador esté exento de presentar síntomas o complicaciones de salud o que presente agravamiento de enfermedades comunes y/o no declaradas o no diagnosticadas.</p>
            <p>-Si el empleador requiere el detalle de la evaluación, solo puede ser entregada con autorización  explícita por el trabajador, con documento que lleve nombre firma y rut.</p>
            <p>-La adulteración de este certificado es un delito penado por ley.</p>

            



        </td>
    <tr>
</table>
");
$mpdf->WriteHTML($html);
$mpdf->Output();

?>