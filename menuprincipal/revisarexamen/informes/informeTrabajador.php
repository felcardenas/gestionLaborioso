<?php

include '../../plantillas/header.php';
include "../../../global/conexion.php";
require_once __DIR__ . '../../../../plugins/mpdf/vendor/autoload.php';
session_start();
date_default_timezone_set("America/Santiago");  

$fecha = $_SESSION['fecha'];
$hora = $_SESSION['hora'];
$idEvaluacion = $_SESSION['idEvaluacion'];

//echo $fecha ."-" .$hora;

/* $fecha = '2020-05-20';
$hora = '13:49:25';
$idEvaluacion = '53'; */

/* echo $fecha;
echo $hora;
echo $idEvaluacion; */

$sql = "SELECT * FROM INFORMES WHERE ID_EVALUACION = '$idEvaluacion' AND FECHA = '$fecha' AND HORA = '$hora'";
    //echo $sql;
    $resultado = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($resultado);
    
    $idEmpresa = $row['ID_EMPRESA'];
    $fechaValidez = $row['FECHA_VALIDEZ'];
    $fecha = $row['FECHA'];
    $hora = $row['HORA'];
    $nombreMedico = $row['NOMBRE_MEDICO'];
    $nombreTrabajador = utf8_encode($row['NOMBRE_TRABAJADOR']);
    $rutTrabajador = $row['RUN_TRABAJADOR'];
    $edad = $row['EDAD'];
    $cargo = $row['CARGO'];
    $bateriasDeExamenes = $row['BATERIAS_DE_EXAMENES'];
    $cadenaExamenes = $row['CADENA_EXAMENES'];
    $pulso = $row['PULSO'];
    $presionArterial = $row['PRESION_ARTERIAL'];
    $peso = $row['PESO'];
    $altura = $row['ALTURA'];
    $IMC = $row['IMC'];
    $recomendaciones = $row['RECOMENDACIONES'];
    $examenFisicoGeneral = $row['EXAMEN_FISICO_GENERAL'];
    $conclusionMedica = $row['CONCLUSION_MEDICA'];
    $codigoDescargaTrabajador = $row['CODIGO_DESCARGA_TRABAJADOR'];
    $codigoDescargaEmpresa = $row['CODIGO_DESCARGA_EMPRESA'];
    $codigoDescargaTrabajador = $row['CODIGO_DESCARGA_TRABAJADOR'];

echo $cadenaExamenes;
mysqli_free_result($resultado);

$sql = "SELECT NOMBRE_EMPRESA, RUT_EMPRESA, DV_EMPRESA FROM EMPRESA WHERE ID_EMPRESA = '$idEmpresa'";
$resultado = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($resultado);

$nombreEmpresa = $row['NOMBRE_EMPRESA'];
$rutEmpresa = $row['RUT_EMPRESA'] . "-" . $row['DV_EMPRESA'];

mysqli_free_result($resultado);


$sql = "SELECT ID_CONCLUSION_MEDICA FROM CONCLUSION_MEDICA WHERE TEXTO_CONCLUSION_MEDICA = '$conclusionMedica'";

// 2,4,5,6,7
$resultado = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($resultado);
$idConclusionMedica = $row['ID_CONCLUSION_MEDICA'];
$cantidadResultadosConclusionMedica = mysqli_num_rows($resultado);

if($idConclusionMedica == 1 || $idConclusionMedica == 3){
    $mostrarFechaValidez = true;
}else{
    $mostrarFechaValidez = false;
}


mysqli_free_result($resultado);





$fecha = date("d/m/Y",strtotime($fecha));
$fechaValidez = date("d/m/Y",strtotime($fechaValidez));  





$html = "<table>

<tr> 
    <td style='width:105'><img src='../../../img/logosinfondo.png' width='100' height='100'></td>
    <td style='width:340'><img src='../../../img/logoazul.png' width='250' height='80'></td>
    <td>
        <table>
            <tr>
                <td style='font-family:arial; font-size:14;'>FECHA EMISIÓN: </td>
                <td style='font-family:arial; font-size:14;'>$fecha </td>
            </tr>
";

if($mostrarFechaValidez){
    $html .= "  <tr>
                <td style='font-family:arial; font-size:14;'>VÁLIDO HASTA: </td>
                <td style='font-family:arial; font-size:14;'>$fechaValidez</td>
            </tr>";

    
};

$html .= "  <tr>
            <td style='font-family:arial; font-size:14;'>CÓDIGO TRABAJADOR: </td>
            <td style='font-family:arial; font-size:14;'>$codigoDescargaTrabajador</td>
        </tr>";
        
    $html .= "  <tr>
            <td style='font-family:arial; font-size:14;'>CÓDIGO EMPRESA: </td>
            <td style='font-family:arial; font-size:14;'>$codigoDescargaEmpresa</td>
        </tr>";


$html .= "
        </table>
    </td>
</tr>


</table>



<h1 style='font-family:arial; text-align:center;'> INFORME EVALUACION PRE-OCUPACIONAL</h1>



<table style='font-family:arial; font-size:16;'> 
    <title>Resultado exámenes de: $nombreTrabajador</title>

    <tr>
        <td>Trabajador: <td>
        <td>$nombreTrabajador<td>
        <td style='width:100'></td>
        <td></td>
        <td>Cargo: <td>
        <td>$cargo<td>
    </tr>

    <tr>
        <td>RUN: <td>
        <td>$rutTrabajador<td>
        <td></td>
        <td></td>
        <td>Empresa: <td>
        <td>$nombreEmpresa<td>
    </tr>

    <tr>
        <td>Edad: <td>
        <td>$edad años<td>
        <td></td>
        <td></td>
        <td>RUN: <td>
        <td>$rutEmpresa<td>
    </tr>


</table>


<br>




<table style='font-family:arial; table-layout: fixed; border-collapse:collapse; width:700;'> 
<tr>
    <th style='border:1px solid; font-size:16;'>RIESGOS </th>
</tr>

<tr>
    <td style='border:1px solid;text-align:center;'>$bateriasDeExamenes</td>
</tr>
</table>

<br>

<table style='table-layout: fixed; width: 700px; border-collapse:collapse;'>

<tr>
    <th style='border: 1px solid; font-family:arial; font-size:16;'>PULSO</th>
    <th style='border: 1px solid; font-family:arial; font-size:16;'>TENSION ARTERIAL</th>
    <th style='border: 1px solid; font-family:arial; font-size:16;'>PESO</th>
    <th style='border: 1px solid; font-family:arial; font-size:16;'>ALTURA</th>    
    <th style='border: 1px solid; font-family:arial; font-size:16;'>IMC</th>
</tr>

<tr>
    <td style='border: 1px solid; text-align:center; font-family:arial; font-size:14;'>$pulso X'</td>
    <td style='border: 1px solid; text-align:center; font-family:arial; font-size:14;'>$presionArterial mm/Hg</td>
    <td style='border: 1px solid; text-align:center; font-family:arial; font-size:14;'>$peso kg</td>
    <td style='border: 1px solid; text-align:center; font-family:arial; font-size:14;'>$altura cm</td>    
    <td style='border: 1px solid; text-align:center; font-family:arial;'>$IMC %</td>
</tr>

</table><br>
";





$html .= "

<table style='font-family:arial; table-layout: fixed; border-collapse:collapse; width:700;'> 
<tr>
    <th style='border:1px solid; font-size:16;'>RECOMENDACIONES </th>
</tr>

<tr>
    <td style='border:1px solid;'>$recomendaciones</td>
</tr>
</table>

<br>

<table style='font-family:arial; table-layout: fixed; border-collapse:collapse; width:700;'> 
    <tr>
        <th style='border:1px solid; font-size:16;'>EXAMEN FISICO GENERAL </th>
    </tr>

    <tr>
        <td style='border:1px solid;'>$examenFisicoGeneral</td>
    </tr>
</table>


<br>
<table style='font-family:arial; table-layout: fixed; border-collapse:collapse; width:700;'> 
<tr>
    <th style='border:1px solid; font-size:16;'>CONCLUSIÓN MÉDICA </th>
</tr>

<tr>
    <td style='border:1px solid;'>$conclusionMedica</td>
</tr>
</table>
<br>


<table style='table-layout: fixed; width: 250px; border-collapse:collapse; margin-bottom:50px'>
<tr>
  <th style='border: 1px solid; width: 218px; word-wrap: break-word; font-family:arial; font-size:20;'>EXÁMEN</th>
  <th style='border: 1px solid; width: 70px; word-wrap: break-word; font-family:arial; font-size:20;'>VALOR</th>
  <th style='border: 1px solid; width: 400px; word-wrap: break-word; font-family:arial; font-size:20;'>OBSERVACIONES </th>
  <th style='border: 1px solid; width: 100px; word-wrap: break-word; font-family:arial; font-size:20;'>ESTADO</th>
</tr>";




/* $sql = "SELECT EXAMEN.NOMBRE_EXAMEN FROM EXAMEN INNER JOIN evaluacion_examen ON examen.ID_EXAMEN = evaluacion_examen.ID_EXAMEN WHERE evaluacion_examen.ID_EVALUACION ='$idEvaluacion'";

$resultado = mysqli_query($conexion,$sql);
$i=0;

$array = array();
while($row = mysqli_fetch_assoc($resultado)){
    $array[$i] = $row['NOMBRE_EXAMEN'];                
    $i++;
}

mysqli_free_result($resultado); */

$examenes = explode("~",$cadenaExamenes);
$i = 0;



foreach($examenes as $dato){
    
    $dato2 = explode("|",$dato);

    $examen = $dato2[0]; 
    $valor = $dato2[1];
    $observaciones = $dato2[2];
    $estado = $dato2[3];

    if($examen == 'Encuesta de Lake Louis' || $examen == 'Test de Ruffier' || $examen == 'Indice de Framingham'){
        //$html .= '<tr><td>hola</td></tr>';
        $estado = ' ';
    }

    $html .= "<tr>
    
    <td style='border:1px solid; text-align:center; font-family:arial; font-size:16;'>$examen</td>
    <td style='border:1px solid; text-align:center; font-family:arial; font-size:16;'>$valor</td>
    <td style='border:1px solid; text-align:justify; font-family:arial; font-size:16;'>$observaciones</td>
    <td style='border:1px solid; text-align:center; font-family:arial; font-size:16;'>$estado</td>
    </tr>";
    
}


$html .= "</table>"; 

$html .= "
<br><br><br>
<table style='font-family:arial; width:700'> 
<tr>
    <td style='text-align:center'>______________________________________ </th>
</tr>

<tr>
    <td style='text-align:center'>NOMBRE Y TIMBRE DEL MÉDICO</td>
</tr>
</table>

";






//$nombreSalida = $trabajador.".php";
ob_clean();
$mpdf = new \Mpdf\Mpdf();

$mpdf->AddPage('', // L - landscape, P - portrait 
'', '', '', '',
15, // margin_left
15, // margin right
15, // margin top
30, // margin bottom
5, // margin header
5); // margin footer

$mpdf->SetHTMLFooter("
<table style='font-family:arial; width:700; font-size:12;'>
    <tr>
        <td>
            <h4>OBSERVACIONES:</h4>
            <p>-Los elementos utilizados y/o disponibles en esta evaluación no aseguran que el trabajador esté exento de presentar síntomas o complicaciones de salud o que presente agravamiento de enfermedades comunes y/o no declaradas o no diagnosticadas.</p>
            <p>-Si el empleador requiere el detalle de la evaluación, solo puede ser entregada con autorización explícita por el trabajador, con documento que lleve nombre, firma y rut.</p>
            <p>-La adulteración de este certificado es un delito penado por ley.</p>
        </td>
    <tr>
</table>
");
$mpdf->WriteHTML($html); 



$mpdf->Output();

?>