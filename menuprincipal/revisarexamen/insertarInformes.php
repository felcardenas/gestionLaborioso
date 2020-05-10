<?php 

//include '../plantillas/header.php';
include "../../global/conexion.php";
//require_once __DIR__ . '../../../plugins/mpdf/vendor/autoload.php';
session_start();
date_default_timezone_set("America/Santiago");  

$idEvaluacion = $_SESSION['idEvaluacion'];

if(isset($_POST)){
    $nombreEmpresa = $_POST['nombreEmpresa'];
    $cargoTrabajador = $_POST['cargoTrabajador'];
    //$nombreMedico = $_POST['nombreMedico'];
    
}else{
    $nombreEmpresa = "Empresa Prueba";
    $rutEmpresa = "11111111-1";
    $cargoTrabajador = "Cargo";
    $nombreMedico = "Nombre Médico";
}
$nombreMedico = $_SESSION['usuarioNombreCompleto'];

//OBTENER EMPRESA
    $sql = "SELECT RUT_EMPRESA, DV_EMPRESA FROM empresa WHERE NOMBRE_EMPRESA = '$nombreEmpresa'";
    $resultado = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($resultado);
    $rutEmpresaCompleto = $row['RUT_EMPRESA']."-".$row['DV_EMPRESA'];
    mysqli_free_result($resultado);

//OBTENER BATERIAS DE EXAMENES
    $sql = "SELECT NOMBRE_BATERIA_DE_EXAMENES FROM bateria_de_examenes INNER JOIN evaluacion_bateria_de_examenes ON bateria_de_examenes.ID_BATERIA_DE_EXAMENES = evaluacion_bateria_de_examenes.ID_BATERIA_DE_EXAMENES WHERE evaluacion_bateria_de_examenes.ID_EVALUACION = '$idEvaluacion'";
    $resultado = mysqli_query($conexion,$sql);

    $riesgos='';
    while($row = mysqli_fetch_assoc($resultado)){
        $riesgos .= $row['NOMBRE_BATERIA_DE_EXAMENES'] . " / ";
    }

    $riesgos = substr($riesgos,0,-3);


    mysqli_free_result($resultado);

//OBTENER SIGNOS VITALES
    $sql = "SELECT `FECHA`, `HORA` FROM `signos_vitales_evaluacion` WHERE ID_EVALUACION = '$idEvaluacion' ORDER BY `signos_vitales_evaluacion`.`FECHA` DESC, `signos_vitales_evaluacion`.`HORA` DESC, `signos_vitales_evaluacion`.`ID_SIGNO_VITAL` ASC LIMIT 1";
    $resultado = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($resultado);
    $fecha = $row['FECHA'];
    $hora = $row['HORA'];

    mysqli_free_result($resultado);

    $sql = "SELECT ID_SIGNO_VITAL, VALOR_SIGNO_VITAL FROM signos_vitales_evaluacion WHERE ID_EVALUACION = '$idEvaluacion' AND FECHA = '$fecha' AND HORA = '$hora' LIMIT 6";

    $resultado = mysqli_query($conexion,$sql);

        while($row = mysqli_fetch_assoc($resultado)){
        $idSignoVital = $row['ID_SIGNO_VITAL'];
        
        switch($idSignoVital){
                case '1':
                    $pulso = $row['VALOR_SIGNO_VITAL']; 
                break;

                case '2': 
                    $tensionDiastolica = $row['VALOR_SIGNO_VITAL'];
                break;

                case '3':
                    $tensionSistolica = $row['VALOR_SIGNO_VITAL'];
                break;

                case '4': 
                    $peso = $row['VALOR_SIGNO_VITAL'];
                break;

                case '5':
                    $altura = $row['VALOR_SIGNO_VITAL'];
                break;

                case '6': 
                    $imc = round($row['VALOR_SIGNO_VITAL'],1);
                break;
        }
        
        }

    $tensionArterial = $tensionSistolica."/".$tensionDiastolica;
    mysqli_free_result($resultado);




//OBTENER RECOMENDACIONES
    $sql = "SELECT FECHA, HORA FROM recomendaciones_evaluacion WHERE ID_EVALUACION = '$idEvaluacion' ORDER BY `FECHA` DESC, `HORA` DESC, `ID_RECOMENDACIONES` ASC LIMIT 1";

    $resultado = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($resultado);
    $fecha = $row['FECHA'];
    $hora = $row['HORA'];


    $sql = "SELECT RECOMENDACIONES.RECOMENDACIONES FROM recomendaciones INNER JOIN recomendaciones_evaluacion ON RECOMENDACIONES.ID_RECOMENDACIONES = recomendaciones_evaluacion.ID_RECOMENDACIONES WHERE recomendaciones_evaluacion.ID_EVALUACION = '$idEvaluacion' AND recomendaciones_evaluacion.FECHA = '$fecha' AND recomendaciones_evaluacion.HORA = '$hora' LIMIT 7;";
    $recomendaciones = '';
    $resultado = mysqli_query($conexion,$sql);
    while($row = mysqli_fetch_assoc($resultado)){
        $recomendaciones .= $row['RECOMENDACIONES'] . " / ";
    }
    $recomendaciones = utf8_encode(substr($recomendaciones,0,-3));
    //$rutEmpresaCompleto = $row['RUT_EMPRESA']."-".$row['DV_EMPRESA'];
    mysqli_free_result($resultado);


//OBTENER EXAMEN FISICO GENERAL
    $sql = "SELECT FECHA, HORA FROM examen_fisico_evaluacion WHERE ID_EVALUACION = '$idEvaluacion' ORDER BY `FECHA` DESC, `HORA` DESC, `ID_EXAMEN_FISICO` ASC LIMIT 1";
    $resultado = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($resultado);
    $fecha = $row['FECHA'];
    $hora = $row['HORA'];

    $sql = "SELECT VALOR_EXAMEN_FISICO FROM examen_fisico_evaluacion WHERE ID_EVALUACION = '$idEvaluacion' AND FECHA = '$fecha' AND HORA = '$hora' LIMIT 1";
    $resultado = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($resultado);
    $examenFisicoGeneral = utf8_encode($row['VALOR_EXAMEN_FISICO']);
    

//OBTENER CONCLUSIÓN MÉDICA
    $sql = "SELECT FECHA, HORA FROM conclusion_medica_evaluacion WHERE ID_EVALUACION = '$idEvaluacion' ORDER BY `FECHA` DESC, `HORA` DESC, `ID_CONCLUSION_MEDICA` ASC LIMIT 1";
    $resultado = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($resultado);
    $fecha = $row['FECHA'];
    $hora = $row['HORA'];

    $sql = "SELECT TEXTO_CONCLUSION_MEDICA FROM CONCLUSION_MEDICA INNER JOIN conclusion_medica_evaluacion ON conclusion_medica.ID_CONCLUSION_MEDICA = conclusion_medica_evaluacion.ID_CONCLUSION_MEDICA WHERE ID_EVALUACION = '$idEvaluacion' AND HORA = '$hora' AND FECHA = '$fecha' LIMIT 1";
    
    $resultado = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($resultado);
    $conclusionMedica = utf8_encode($row['TEXTO_CONCLUSION_MEDICA']);

    
    
//OBTENER FECHA HOY, HORA HOY Y FECHA DE VENCIMIENTO

    $fechaHoy = date("d-m-Y");
    $fechaHoyBDD = date("Y-m-d");
    //echo $fechaHoyBDD;
    $horaHoy = date("H:i:s");
    $fechaVencimiento = date("d-m-Y",strtotime($fechaHoy."+ 1 year"));
    $fechaVencimientoBDD = date("Y-m-d",strtotime($fechaVencimiento));

    $nombreCompletoTrabajador = utf8_decode($_SESSION['nombreCompletoTrabajador']);
    $rutTrabajador = $_SESSION['rutTrabajador'];
    $dvTrabajador = $_SESSION['dvTrabajador'];
    $rut = $rutTrabajador . "-" . $dvTrabajador;
    $edad = $_SESSION['edadTrabajador'];
    $edad = trim(substr($edad,0,3));

    //echo $edad;

    $codigoTrabajador = crearClave();
    $codigoEmpresa = crearClave();





//OBTENER INFO EXAMENES 

    

    $sql = "SELECT EXAMEN.NOMBRE_EXAMEN FROM EXAMEN INNER JOIN EVALUACION_EXAMEN ON EXAMEN.ID_EXAMEN = evaluacion_examen.ID_EXAMEN WHERE evaluacion_examen.ID_EVALUACION ='$idEvaluacion'";

    $resultado = mysqli_query($conexion,$sql);
    $i=0;

    //OBTENER EXAMENES 
        $array = array();
        while($row = mysqli_fetch_assoc($resultado)){
            $array[$i] = $row['NOMBRE_EXAMEN'];   
            //echo $row['NOMBRE_EXAMEN']."<br>" ;             
            $i++;
        }

        mysqli_free_result($resultado);


        $cadenaExamenes = '';
    
    foreach($array as $examen){



        $sql2='';
        $sql='';
        $valor = '';
        $observaciones = 'Sin observaciones';
        $estado = 'Sin evaluar';

        $sql = "SELECT parametro.ID_PARAMETRO, evaluacion_parametro.VALOR_PARAMETRO 
        FROM EVALUACION_PARAMETRO 
        INNER JOIN parametro
        ON evaluacion_parametro.ID_PARAMETRO = parametro.ID_PARAMETRO
        INNER JOIN examen
        ON parametro.ID_EXAMEN = examen.ID_EXAMEN
        WHERE "  ;  

        switch($examen)
                {case 'Optometria':
                    
                    $idExamen = '1';
                    include 'consultasExamenes.php';
                break;

                case 'Electrocardiograma':
                    $idExamen = '2';
                    
                    include 'consultasExamenes.php';
                    
                    
                    //echo $sql."<br>";

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
                    include 'consultasExamenes.php';
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
                    include 'consultasExamenes.php';

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
                    include 'consultasExamenes.php';
                    
                break;

                case 'Creatinina':
                    $idExamen = '6';
                    include 'consultasExamenes.php';

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

                    include 'consultasExamenes.php';

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

                    include 'consultasExamenes.php';
                    
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

                    include 'consultasExamenes.php';

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
                    
                    include 'consultasExamenes.php';

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

                    include 'consultasExamenes.php';

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

                    include 'consultasExamenes.php';

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


                    include 'consultasExamenes.php';

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

                    include 'consultasExamenes.php';

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

                    include 'consultasExamenes.php';

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

                    include 'consultasExamenes.php';

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

                    include 'consultasExamenes.php';

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

                    include 'consultasExamenes.php';

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

                    include 'consultasExamenes.php';

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

                    include 'consultasExamenes.php';

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

                //$cadenaExamenes .= '{"Exámen": '.$examen.', "Valor": '.$valor.', "Observaciones": '.$observaciones.', "Estado": '. $estado .'}';

                $cadenaExamenes .= "$examen | $valor | $observaciones | $estado ~ ";
                
                /* $html .= "<tr>
                <td style='border:1px solid; text-align:center; font-family:arial; font-size:16;'>$examen</td>
                <td style='border:1px solid; text-align:center; font-family:arial; font-size:16;'>$valor</td>
                <td style='border:1px solid; text-align:justify; font-family:arial; font-size:16;'>$observaciones</td>
                <td style='border:1px solid; text-align:center; font-family:arial; font-size:16;'>$estado</td>
                </tr>"; */

                // $texto = $examen. " ---- " . $valor. " ---- " .utf8_encode($observaciones). " ---- " .utf8_encode($estado)."<br>"; */
                //echo $texto;
    }



    //echo $cadenaExamenes;
    $cadenaExamenes = substr($cadenaExamenes,0,-2);

    /* $examenes = explode('~',$cadenaExamenes);

    foreach($examenes as $examen){
        //echo $examen."<br>";

        $parametro = explode("|",$examen);

        foreach($parametro as $param){
            echo $param.",";
        }
        
        echo "<br>";
    }  */











    //ID_INFORME autoincrement

    //ID_EVALUACION $idEvaluacion    
//FECHA_VALIDEZ $fechaVencimiento
//FECHA $fechaHoy
//HORA $horaHoy;
//NOMBRE_TRABAJADOR $nombreCompletoTrabajador 
//RUN_TRABAJADOR $rut
//EDAD $edad
//CARGO $cargoTrabajador
//NOMBRE_EMPRESA $nombreEmpresa 
//RUN_EMPRESA $rutEmpresaCompleto
//BATERIAS DE EXÁMENES $riesgos
//PULSO $pulso
//PRESION ARTERIAL $tensionArterial 
//PESO $peso 
//ALTURA $altura
//IMC $imc
//RECOMENDACIONES $recomendaciones 
//EXAMEN_FISICO_GENERAL $examenFisicoGeneral
//CONCLUSION_MEDICA $conclusionMedica 
//CODIGO_DESCARGA_TRABAJADOR $codigo
//CODIGO_DESCARGA_EMPRESA


/* echo "<br> $idEvaluacion <br> Edad: " . $edad . "<br>" .
     "Nombre completo Trabajador: " .$nombreCompletoTrabajador . "<br>" .
     "RUN trabajador: " . $rut ."<br>" . 
     "Fecha hoy: ". $fechaHoy . "<br>". 
     "Hora hoy: $horaHoy <br>" .
     "Fecha vencimiento: " . $fechaVencimiento . "<br>" . 
     "Cargo: $cargoTrabajador <br>".
     "Nombre empresa: $nombreEmpresa <br>".
     "RUN empresa: $rutEmpresaCompleto <br>".
     "Riesgos: $riesgos <br>".
     "Pulso: $pulso <br>". 
     "Tensión arterial: $tensionArterial <br>".
     "Peso: $peso <br>".  
     "Altura: $altura <br>".
     "IMC: $imc <br>".  
     "Recomendaciones: $recomendaciones <br>".
     "Examen Físico General: $examenFisicoGeneral<br>".  
     "Conclusión Médica: $conclusionMedica<br>".
     "Nombre médico: $nombreMedico <br>".  
     "Codigo descarga trabajador: $codigoTrabajador ". strlen($codigoTrabajador) ." <br>" .
     "Codigo descarga empresa $codigoEmpresa ". strlen($codigoEmpresa) . "<br>".
     "CadenaExamenes: $cadenaExamenes"; */
     
$sql = "INSERT INTO `informes`(
    `ID_EVALUACION`, 
    `FECHA_VALIDEZ`, 
    `FECHA`, 
    `HORA`, 
    `NOMBRE_MEDICO`, 
    `NOMBRE_TRABAJADOR`, 
    `RUN_TRABAJADOR`, 
    `EDAD`, 
    `CARGO`, 
    `NOMBRE_EMPRESA`, 
    `RUT_EMPRESA`, 
    `BATERIAS_DE_EXAMENES`, 
    `CADENA_EXAMENES`, 
    `PULSO`,
    `PRESION_ARTERIAL`, 
    `PESO`, 
    `ALTURA`, 
    `IMC`, 
    `RECOMENDACIONES`, 
    `EXAMEN_FISICO_GENERAL`, 
    `CONCLUSION_MEDICA`, 
    `CODIGO_DESCARGA_TRABAJADOR`, 
    `CODIGO_DESCARGA_EMPRESA`,
    `SOLICITUD_TRABAJADOR`, 
    `SOLICITUD_EMPRESA`) VALUES 
    ('$idEvaluacion',
    '$fechaVencimientoBDD',
    '$fechaHoyBDD',
    '$horaHoy',
    '$nombreMedico',
    '$nombreCompletoTrabajador',
    '$rut',
    '$edad',
    '$cargoTrabajador',
    '$nombreEmpresa',
    '$rutEmpresaCompleto',
    '$riesgos',
    '$cadenaExamenes',
    '$pulso',
    '$tensionArterial',
    '$peso',
    '$altura',
    '$imc',
    '$recomendaciones',
    '$examenFisicoGeneral',
    '$conclusionMedica',
    '$codigoTrabajador',
    '$codigoEmpresa',
    '3',
    '3')";

    

//$sql = "select NOMBRE_MEDICO FROM INFORMES";

if(mysqli_query($conexion,$sql)){
    echo 'true';
}else{
    echo 'false';
}


/* $sql = "SELECT PULSO, PESO, ALTURA, PRESION_DIASTOLICA, PRESION_SISTOLICA, IMC, CONCLUSION_MEDICA, RECOMENDACIONES FROM EVALUACION WHERE ID_EVALUACION = $idEvaluacion";

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

mysqli_free_result($resultado); */



//echo crearClave();

function crearClave(){

    //Carácteres para la contraseña
    $opc_letras = TRUE; //  FALSE para quitar las letras
    $opc_numeros = TRUE; // FALSE para quitar los números
    $opc_letrasMayus = TRUE; // FALSE para quitar las letras mayúsculas
    $opc_especiales = FALSE; // FALSE para quitar los caracteres especiales
    $longitud = 6;
    $password = "";
    
    $letras ="abcdefghijklmnopqrstuvwxyz";
    $numeros = "1234567890";
    $letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $especiales ="|@#~$%()=^*+[]{}-_";
    $str = "";
    
     
    
    if ($opc_letras == TRUE) {
        $str .= $letras; 
    }
    
    if ($opc_numeros == TRUE) {
        $str .= $numeros; 
    }
    
    if($opc_letrasMayus == TRUE) {
        $str .= $letrasMayus; 
    }
    
    if($opc_especiales == TRUE) {
        $str .= $especiales; 
    }
    
   
   $largoCadena = strlen($str);
   $password = "";
  
  
   //Reconstruimos la contraseña segun la longitud que se quiera
   
   for($i=0;$i<$longitud;$i++) {
      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
      $password .= substr($str,rand(0,$largoCadena-1),1);
   }
   //Mostramos la contraseña generada
   return $password;
}


 /* echo "<br><br><br><br><br>";

for ($i=0; $i < 1000; $i++) { 
    $clave = crearClave();

    echo $clave ." - ".strlen($clave)."<br>";
    
}  */

?>