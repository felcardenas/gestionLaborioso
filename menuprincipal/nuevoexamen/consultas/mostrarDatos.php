<?php

if(isset($_POST)){

   switch($_POST['select']){

    case 'mostrarPerfilLipidico':
      mostrarPerfilLipidico();
    break;

    default:
    break;

  }
}


function mostrarPerfilLipidico(){
    include '../../../global/conexion.php';
    session_start();
    
    //$idExamen = '7';
    
     $idTrabajador = $_SESSION['idTrabajador'];
     $sql = "SELECT ID_EVALUACION FROM EVALUACION WHERE ID_TRABAJADOR = '$idTrabajador' ORDER BY ID_EVALUACION DESC LIMIT 1,1";

    if($resultado = mysqli_query($conexion,$sql)){
      $row = mysqli_fetch_assoc($resultado);
      $idEvaluacion = $row['ID_EVALUACION'];
    }
   
    //$idEvaluacion = $_SESSION['idEvaluacion'];
    //$horaActual = $_SESSION['horaActual'];
    //$fechaActual = $_SESSION['fechaActual'];
    
    $sql = "SELECT VALOR_PARAMETRO 
    FROM EVALUACION_PARAMETRO 
    INNER JOIN PARAMETRO 
    ON evaluacion_parametro.ID_PARAMETRO = parametro.ID_PARAMETRO
    WHERE evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND PARAMETRO.ID_EXAMEN = '7' ORDER BY FECHA DESC LIMIT 8;";
  
      if ($resultado = mysqli_query($conexion, $sql)) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $array[]= $fila;
        }
      /* liberar el conjunto de resultados */
      //mysqli_free_result($resultado);
    }
  
    echo json_encode($array); // Parse to JSON and print.
  
  }
  



?>