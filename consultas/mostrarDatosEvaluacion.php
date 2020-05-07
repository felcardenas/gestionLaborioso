<?php

if(isset($_POST)){

   switch($_POST['select']){

    case 'selectAnamnesis':
      selectAnamnesis();
      //$idExamen = '1';
      //$limit = '16';

      //enviar($idExamen,$limit);
    break;

    case 'selectExamenFisico':
        selectExamenFisico();
    break;

    case 'selectConclusionMedica':
        selectConclusionMedica();
    break;

    case 'selectRecomendaciones':
        selectRecomendaciones();
    break;


    case 'selectInterconsulta':
        selectInterconsulta();
    break;

    case 'selectInformes':
        selectInformes();
    break;

    default:
    break;

  }

  
}


function selectAnamnesis(){
    include '../global/conexion.php';
  session_start();
  
    //OBTIENE LA ULTIMA EVALUACION DEL TRABAJADOR
    $idTrabajador = $_SESSION['idTrabajador'];
    $sql = "SELECT ID_EVALUACION FROM EVALUACION WHERE ID_TRABAJADOR = '$idTrabajador' ORDER BY ID_EVALUACION DESC LIMIT 1";
    
    if($resultado = mysqli_query($conexion,$sql)){
      $row = mysqli_fetch_assoc($resultado);
      $idEvaluacion = $row['ID_EVALUACION'];
    }

  
    $fechaHora = $_POST['fechaHora'];

    $cadenaFechaHora = explode(' ',$fechaHora,2);

    $fecha = $cadenaFechaHora[0];
    $hora = $cadenaFechaHora[1];

    $sql=  "SELECT TEXTO_ANAMNESIS FROM `anamnesis_evaluacion` WHERE ID_EVALUACION = '$idEvaluacion' AND FECHA = '$fecha' AND HORA = '$hora'
    ORDER BY `anamnesis_evaluacion`.`FECHA` DESC, `anamnesis_evaluacion`.`HORA` DESC, `anamnesis_evaluacion`.`ID_ANAMNESIS` ASC LIMIT 1";

    if ($resultado = mysqli_query($conexion, $sql)) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $array[]= $fila;
        } 
      /* liberar el conjunto de resultados */
      //mysqli_free_result($resultado);
      }   
  
    
    echo json_encode($array); // Parse to JSON and print.

    

}

function selectExamenFisico(){
    include '../global/conexion.php';
    session_start();
  
    //OBTIENE LA ULTIMA EVALUACION DEL TRABAJADOR
    $idTrabajador = $_SESSION['idTrabajador'];
    $sql = "SELECT ID_EVALUACION FROM EVALUACION WHERE ID_TRABAJADOR = '$idTrabajador' ORDER BY ID_EVALUACION DESC LIMIT 1";
    
    if($resultado = mysqli_query($conexion,$sql)){
      $row = mysqli_fetch_assoc($resultado);
      $idEvaluacion = $row['ID_EVALUACION'];
    }

  
    $fechaHora = $_POST['fechaHora'];

    $cadenaFechaHora = explode(' ',$fechaHora,2);

    $fecha = $cadenaFechaHora[0];
    $hora = $cadenaFechaHora[1];

    $sql=  "SELECT VALOR_EXAMEN_FISICO FROM `examen_fisico_evaluacion` WHERE ID_EVALUACION = '$idEvaluacion' AND FECHA = '$fecha' AND HORA = '$hora'
    ORDER BY `examen_fisico_evaluacion`.`FECHA` DESC, `examen_fisico_evaluacion`.`HORA` DESC, `examen_fisico_evaluacion`.`ID_EXAMEN_FISICO` ASC LIMIT 7";

    if ($resultado = mysqli_query($conexion, $sql)) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $array[]= $fila;
        } 
      /* liberar el conjunto de resultados */
      //mysqli_free_result($resultado);
      }   
  
    
    echo json_encode($array); // Parse to JSON and print.

}

function selectConclusionMedica(){
      include '../global/conexion.php';
      session_start();
    
      //OBTIENE LA ULTIMA EVALUACION DEL TRABAJADOR
      $idTrabajador = $_SESSION['idTrabajador'];
      $sql = "SELECT ID_EVALUACION FROM EVALUACION WHERE ID_TRABAJADOR = '$idTrabajador' ORDER BY ID_EVALUACION DESC LIMIT 1";
      
      if($resultado = mysqli_query($conexion,$sql)){
        $row = mysqli_fetch_assoc($resultado);
        $idEvaluacion = $row['ID_EVALUACION'];
      }
  
    
      $fechaHora = $_POST['fechaHora'];
  
      $cadenaFechaHora = explode(' ',$fechaHora,2);
  
      $fecha = $cadenaFechaHora[0];
      $hora = $cadenaFechaHora[1];

      
  
      $sql = "SELECT `ID_CONCLUSION_MEDICA`,`NOMBRE_CONCLUSION_MEDICA` FROM `conclusion_medica` WHERE CONCLUSION_MEDICA.ID_CONCLUSION_MEDICA = (SELECT ID_CONCLUSION_MEDICA FROM `conclusion_medica_evaluacion` WHERE ID_EVALUACION = '$idEvaluacion' AND FECHA = '$fecha' AND HORA = '$hora'
      ORDER BY `conclusion_medica_evaluacion`.`FECHA` DESC, `conclusion_medica_evaluacion`.`HORA` DESC, `conclusion_medica_evaluacion`.`ID_CONCLUSION_MEDICA` ASC)";

       /* $sql=  "SELECT ID_CONCLUSION_MEDICA FROM `conclusion_medica_evaluacion` WHERE ID_EVALUACION = '$idEvaluacion' AND FECHA = '$fecha' AND HORA = '$hora'
      ORDER BY `conclusion_medica_evaluacion`.`FECHA` DESC, `conclusion_medica_evaluacion`.`HORA` DESC, `conclusion_medica_evaluacion`.`ID_EXAMEN_FISICO` ASC LIMIT 7";  */
  
      if ($resultado = mysqli_query($conexion, $sql)) {
          while ($row = mysqli_fetch_assoc($resultado)) {
              $array[]= $row;
          } 
        /* liberar el conjunto de resultados */
        //mysqli_free_result($resultado);
        }   
    
      
      echo json_encode($array); // Parse to JSON and print.*/
      
}

function selectRecomendaciones(){

    include '../global/conexion.php';
    session_start();
  
    $idEvaluacion = $_SESSION["idEvaluacion"];

    $fechaHora = $_POST['fechaHora'];
  
    $cadenaFechaHora = explode(' ',$fechaHora,2);

    $fecha = $cadenaFechaHora[0];
    $hora = $cadenaFechaHora[1];
    /* $sql = "SELECT EXAMEN_FISICO_GENERAL, CABEZA, TORAX, ABDOMEN, EXTREMIDADES_SUPERIORES, EXTREMIDADES_INFERIORES, COLUMNA_GENERAL FROM EVALUACION WHERE ID_EVALUACION = '$idEvaluacion'"; */

    
    $sql = "SELECT `ID_CONCLUSION_MEDICA`,`NOMBRE_CONCLUSION_MEDICA` FROM `conclusion_medica` WHERE CONCLUSION_MEDICA.ID_CONCLUSION_MEDICA = (SELECT ID_CONCLUSION_MEDICA FROM `conclusion_medica_evaluacion` WHERE ID_EVALUACION = '$idEvaluacion' AND FECHA = '$fecha' AND HORA = '$hora'
    ORDER BY `conclusion_medica_evaluacion`.`FECHA` DESC, `conclusion_medica_evaluacion`.`HORA` DESC, `conclusion_medica_evaluacion`.`ID_CONCLUSION_MEDICA` ASC)";

    /* $sql=  "SELECT ID_CONCLUSION_MEDICA FROM `conclusion_medica_evaluacion` WHERE ID_EVALUACION = '$idEvaluacion' AND FECHA = '$fecha' AND HORA = '$hora'
    ORDER BY `conclusion_medica_evaluacion`.`FECHA` DESC, `conclusion_medica_evaluacion`.`HORA` DESC, `conclusion_medica_evaluacion`.`ID_EXAMEN_FISICO` ASC LIMIT 7"; */

    if ($resultado = mysqli_query($conexion, $sql)) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $array[]= $row;
        } 
      /* liberar el conjunto de resultados */
      //mysqli_free_result($resultado);
      }   

    //var_dump($array);

    $sql = "SELECT `ID_RECOMENDACIONES`, `ID_EVALUACION` FROM `recomendaciones_evaluacion` WHERE FECHA = '$fecha' AND HORA = '$hora' AND ID_EVALUACION ='$idEvaluacion'";

    $resultado = mysqli_query($conexion,$sql);

    /* $array = array();

    $array[1]='0';
    $array[2]='0';
    $array[3]='0';
    $array[4]='0';
    $array[5]='0';
    $array[6]='0';
    $array[7]='0'; */


   /*  while($row = mysqli_fetch_assoc($resultado)){
        //echo $row['ID_RECOMENDACIONES']. " ";
        $idRecomendaciones = $row['ID_RECOMENDACIONES'];
        $array[$idRecomendaciones] = 1;
    } */

    if ($resultado = mysqli_query($conexion, $sql)) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $array[]= $row;
        } 
      /* liberar el conjunto de resultados */
      //mysqli_free_result($resultado);
    }  

    echo json_encode($array);

}


function selectInterconsulta(){
   include '../global/conexion.php';
   session_start(); 
  
    //OBTIENE LA ULTIMA EVALUACION DEL TRABAJADOR
    $idEvaluacion = $_SESSION['idEvaluacion'];
    
    $fechaHora = $_POST['fechaHora'];

    $cadenaFechaHora = explode(' ',$fechaHora,2);

    $fecha = $cadenaFechaHora[0];
    $hora = $cadenaFechaHora[1]; 

     $sql=  "SELECT ID_ESPECIALIDAD, OBSERVACIONES FROM INTERCONSULTA WHERE FECHA = '$fecha' AND HORA = '$hora' AND ID_EVALUACION = '$idEvaluacion' ORDER BY `INTERCONSULTA`.`FECHA` DESC, `INTERCONSULTA`.`HORA` DESC LIMIT 1";

    if ($resultado = mysqli_query($conexion, $sql)) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $array[]= $fila;
        } 
      
      
      }   
    /* liberar el conjunto de resultados */
    //mysqli_free_result($resultado); 
    
    echo json_encode($array); // Parse to JSON and print.
    //echo "HOLA";

}


function selectInformes(){
  include '../global/conexion.php';
  session_start(); 
  
    //OBTIENE LA ULTIMA EVALUACION DEL TRABAJADOR
    $idEvaluacion = $_SESSION['idEvaluacion'];
    
    $fechaHora = $_POST['fechaHora'];

    $cadenaFechaHora = explode(' ',$fechaHora,2);

    $fecha = $cadenaFechaHora[0];
    $hora = $cadenaFechaHora[1]; 

     $sql=  "SELECT INFORMES.ID_EMPRESA, CARGO FROM INFORMES INNER JOIN EMPRESA ON INFORMES.ID_EMPRESA = EMPRESA.ID_EMPRESA
     WHERE FECHA = '$fecha' AND HORA = '$hora' AND ID_EVALUACION = '$idEvaluacion' ORDER BY `INFORMES`.`FECHA` DESC, `INFORMES`.`HORA` DESC LIMIT 1";
    
    
      if ($resultado = mysqli_query($conexion, $sql)) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $array[]= $fila;
        } 
      
      
    }    
    /* liberar el conjunto de resultados */
    //mysqli_free_result($resultado); 
    
    echo json_encode($array);  // Parse to JSON and print.
    //echo "HOLA";
}


function enviar($idExamen,$limit){
  include '../global/conexion.php';
  session_start();
  
    //OBTIENE LA ULTIMA EVALUACION DEL TRABAJADOR
    $idTrabajador = $_SESSION['idTrabajador'];
    $sql = "SELECT ID_EVALUACION FROM EVALUACION WHERE ID_TRABAJADOR = '$idTrabajador' ORDER BY ID_EVALUACION DESC LIMIT 1";
    
    if($resultado = mysqli_query($conexion,$sql)){
      $row = mysqli_fetch_assoc($resultado);
      $idEvaluacion = $row['ID_EVALUACION'];
    }

  
  $fechaHora = $_POST['fechaHora'];

  $cadenaFechaHora = explode(' ',$fechaHora,2);

  $fecha = $cadenaFechaHora[0];
  $hora = $cadenaFechaHora[1];

  
  //echo $idEvaluacion . " " . $idExamen . " " . $fecha . "-".$hora;
  $sql = "SELECT VALOR_PARAMETRO 
  FROM EVALUACION_PARAMETRO 
  INNER JOIN PARAMETRO 
  ON evaluacion_parametro.ID_PARAMETRO = parametro.ID_PARAMETRO
  WHERE evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND PARAMETRO.ID_EXAMEN = '$idExamen' AND FECHA = '$fecha' AND HORA = '$hora' ORDER BY FECHA DESC LIMIT $limit;";

    if ($resultado = mysqli_query($conexion, $sql)) {
      while ($fila = mysqli_fetch_assoc($resultado)) {
          $array[]= $fila;
      } 
    /* liberar el conjunto de resultados */
    //mysqli_free_result($resultado);
    }   

  
  echo json_encode($array); // Parse to JSON and print.
}


