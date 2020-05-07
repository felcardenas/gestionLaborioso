<?php

include '../plantillas/header.php';
include "../../global/conexion.php";
require_once __DIR__ . '../../../plugins/mpdf/vendor/autoload.php';
session_start();


if(isset($_POST)){
    $idEvaluacion = $_POST['idEvaluacion'];
}

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
$recomendaciones = utf8_encode($row['RECOMENDACIONES']);

mysqli_free_result($resultado);


//$idEvaluacion = '136';
//$trabajador = "Juanito";
//$rut = $rutCompletoTrabajador;
//$edad = "50"." años";

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
    <td style='width:105'><img src='../../img/logosinfondo.png' width='100' height='100'></td>
    <td style='width:340'><img src='../../img/logoazul.png' width='250' height='80'></td>
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

<h1 style='font-family:arial; text-align:center;'> RESULTADOS EXÁMENES</h1>



<table style='font-family:arial; font-size:16;'> 
    <title>Resultado exámenes de: $nombreCompletoTrabajador</title>

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

    

</table>

<br>

<table style='font-family:arial; font-size:16;'> 
    <tr>
        <td>Riesgos: $cadenaBateriaDeExamenes</td>
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
    <td style='border: 1px solid; text-align:center; font-family:arial; font-size:14;'>$tensionDiastolica/$tensionSistolica mm/Hg</td>
    <td style='border: 1px solid; text-align:center; font-family:arial; font-size:14;'>$peso kg</td>
    <td style='border: 1px solid; text-align:center; font-family:arial; font-size:14;'>$altura cm</td>    
    <td style='border: 1px solid; text-align:center; font-family:arial;'>$IMC %</td>
</tr>

</table><br>
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



$html .= "


<table style='table-layout: fixed; width: 250px; border-collapse:collapse;'>
<tr>
  <th style='border: 1px solid; width: 218px; word-wrap: break-word; font-family:arial; font-size:20;'>EXÁMEN</th>
  <th style='border: 1px solid; width: 70px; word-wrap: break-word; font-family:arial; font-size:20;'>VALOR</th>
  <th style='border: 1px solid; width: 400px; word-wrap: break-word; font-family:arial; font-size:20;'>OBSERVACIONES </th>
  <th style='border: 1px solid; width: 100px; word-wrap: break-word; font-family:arial; font-size:20;'>ESTADO</th>
</tr>";



foreach($array as $examen){
    
    
    $valor = '';
    $observaciones = '';
    $estado = 'Sin evaluar';

    $sql = "SELECT parametro.ID_PARAMETRO, evaluacion_parametro.VALOR_PARAMETRO 
    FROM EVALUACION_PARAMETRO 
    INNER JOIN parametro
    ON evaluacion_parametro.ID_PARAMETRO = parametro.ID_PARAMETRO
    INNER JOIN examen
    ON parametro.ID_EXAMEN = examen.ID_EXAMEN
    WHERE "  ;  

    switch($examen)
            {
            case 'Optometria':
                $idExamen = '1';



            break;

            case 'Electrocardiograma':
                $idExamen = '2';
                
                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){
                        case '4':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '5':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }
                
                

            break;

            case 'Glicemia':
                $idExamen = '3';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '49':
                            $valor = $row['VALOR_PARAMETRO'];
                        break;

                        case '51':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '50':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }

            break;

            case 'Espirometria basal':
                $idExamen = '4';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '22':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '23':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }
                
            break;

            case 'Audiometria':
                $idExamen = '5';
                
            break;

            case 'Creatinina':
                $idExamen = '6';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '24':
                            $valor = $row['VALOR_PARAMETRO'];
                        break;
                        
                        case '26':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '27':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }
                
            break;

            case 'Perfil lipidico':
                $idExamen = '7';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '34':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '35':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }
                
            break;
            
            case 'Hemoglobina':
                $idExamen = '8';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '36':
                            $valor = $row['VALOR_PARAMETRO'];
                        break;

                        case '38':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '39':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }
                
                
            break;
            
            case 'Rx torax':
                $idExamen = '9';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '55':
                            $valor = $row['VALOR_PARAMETRO'];
                        break;

                        case '56':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '57':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }
                
            break;

            case 'Indice de Framingham':
                $idExamen = '10';
                
                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '40':
                            $valor = $row['VALOR_PARAMETRO'];
                        break;

                        case '41':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '42':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }

            break;

            case 'Encuesta de Lake Louis':
                $idExamen = '11';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '58':
                            $valor = $row['VALOR_PARAMETRO'];
                        break;

                        case '59':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '60':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }
                
            break;

            case 'Test de Ruffier':
                $idExamen = '12';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '46':
                            $valor = $row['VALOR_PARAMETRO'];
                        break;

                        case '47':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '48':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }
                
            break;

            case 'Hemograma':
                $idExamen = '13';
                
                
            break;
            
            case 'Cultivo nasal':
                $idExamen = '14';


                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        

                        case '62':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '63':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }

                
                
            break;

            case 'Cultivo faringeo':
                $idExamen = '15';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '65':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '66':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }

            break;

            case 'Cultivo lecho ungueal':
                $idExamen = '16';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '68':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '69':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }
                
            break;

            case 'ALT/SGPT':
                $idExamen = '17';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '71':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '72':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }
                
            break;

            case 'AST/SGOT':
                $idExamen = '18';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '74':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '75':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }
                
            break;

            case 'Protrombina':
                $idExamen = '19';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '77':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '78':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }
                
            break;

            case 'Tiempo de protrombina':
                $idExamen = '20';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '80':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '81':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }
                
            break;

            case 'Actividad de acetilcolinesterasa':
                $idExamen = '21';

                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND examen.ID_EXAMEN='$idExamen';";

                $resultado = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_assoc($resultado)){
                    $idParametro = $row['ID_PARAMETRO'];
                    switch($idParametro){

                        case '83':
                            $observaciones = $row['VALOR_PARAMETRO'];
                        break;

                        case '84':
                            $estado = $row['VALOR_PARAMETRO'];
                        break;
                    }
                }
                
            break;

            default:
            break;
            }

            $observaciones = utf8_encode($observaciones);

            $html .= "<tr>
            <td style='border:1px solid; text-align:center; font-family:arial; font-size:16;'>$examen</td>
            <td style='border:1px solid; text-align:center; font-family:arial; font-size:16;'>$valor</td>
            <td style='border:1px solid; text-align:justify; font-family:arial; font-size:16;'>$observaciones</td>
            <td style='border:1px solid; text-align:center; font-family:arial; font-size:16;'>$estado</td>
            </tr>";

            // $texto = $examen. " ---- " . $valor. " ---- " .utf8_encode($observaciones). " ---- " .utf8_encode($estado)."<br>"; */
            //echo $texto;
}


mysqli_free_result($resultado);
mysqli_close($conexion);

$html .= "</table>
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

<table style='font-family:arial; table-layout: fixed; border-collapse:collapse; width:700;'> 
<tr>
    <th style='border:1px solid; font-size:16;'>RECOMENDACIONES </th>
</tr>

<tr>
    <td style='border:1px solid;'>$recomendaciones</td>
</tr>
</table>

<br><br><br><br><br><br>

<table style='font-family:arial; width:700'> 
<tr>
    <td style='text-align:center'>______________________________________ </th>
</tr>

<tr>
    <td style='text-align:center'>Dr. José Guillermo Lliguisupa</td>
</tr>
</table>



";




//$nombreSalida = $trabajador.".php";

/* $mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
 */
?>