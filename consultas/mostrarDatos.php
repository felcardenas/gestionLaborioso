<?php

if(isset($_POST)){

   switch($_POST['select']){

    case 'selectOptometria':
      //selectOptometria();
      $idExamen = '1';
      $limit = '16';

      enviar($idExamen,$limit);
    break;

    case 'selectElectrocardiograma':
      //selectElectrocardiograma();
      $idExamen = '2';
      $limit = '3';

      enviar($idExamen,$limit);
    break;

    case 'selectGlicemia':
      //selectGlicemia();
      $idExamen = '3';
      $limit = '3';

      enviar($idExamen,$limit);
    break;

    case 'selectEspirometriaBasal':
      //selectEspirometriaBasal();
      $idExamen = '4';
      $limit = '18';

      enviar($idExamen,$limit);
    break;

    case 'selectAudiometria':
      //selectAudiometria();
      $idExamen = '5';
      $limit = '41';

      enviar($idExamen,$limit);
    break;
    
    case 'selectCreatinina':
      //selectCreatinina();
      $idExamen = '6';
      $limit = '4';

      enviar($idExamen,$limit);
    break;

    case 'selectPerfilLipidico':
          //selectPerfilLipidico();
          $idExamen = '7';
          $limit = '8';
    
          enviar($idExamen,$limit);
    break;

    case 'selectHemoglobina':
      //selectHemoglobina();
      $idExamen = '8';
      $limit = '4';

      enviar($idExamen,$limit);
    break;

    case 'selectRxTorax':
        //selectRxTorax();
        $idExamen = '9';
        $limit = '3';
  
        enviar($idExamen,$limit);
    break;

    case 'selectIndiceDeFramingham':
        //selectIndiceDeFramingham();
        $idExamen = '10';
        $limit = '3';
  
        enviar($idExamen,$limit);
    break;

    case 'selectEncuestaDeLakeLouis':
        //selectEncuestaDeLakeLouis();
        $idExamen = '11';
        $limit = '3';
  
        enviar($idExamen,$limit);
    break;

    case 'selectTestDeRuffier':
      //selectTestDeRuffier();
      $idExamen = '12';
      $limit = '6';

      enviar($idExamen,$limit);
    break;

    case 'selectHemograma':
          //selectHemograma();
          $idExamen = '13';
          $limit = '3';
    
          enviar($idExamen,$limit);
    break;
    
    case 'selectCultivoNasal':
      //selectCultivoNasal();
      $idExamen = '14';
      $limit = '3';

      enviar($idExamen,$limit);
    break;

    case 'selectCultivoFaringeo':
      //selectCultivoFaringeo();
      $idExamen = '15';
      $limit = '3';

      enviar($idExamen,$limit);
    break;

    case 'selectCultivoLechoUngueal':
      //selectCultivoLechoUngueal();
      $idExamen = '16';
      $limit = '3';

      enviar($idExamen,$limit);
    break;

    case 'selectAltSgpt':
      //selectAltSgpt();
      $idExamen = '17';
      $limit = '3';

      enviar($idExamen,$limit);
    break;

    case 'selectAstSgot':
      //selectAltSgot();
      $idExamen = '18';
      $limit = '3';

      enviar($idExamen,$limit);
    break;
    
    case 'selectProtrombina':
      //selectProtrombina();
      $idExamen = '19';
      $limit = '3';

      enviar($idExamen,$limit);
    break;

    case 'selectTiempoDeProtrombina':
      //selectTiempoDeProtrombina();
      $idExamen = '20';
      $limit = '3';

      enviar($idExamen,$limit);
    break;

    case 'selectActividadDeAcetilcolinesterasa':
      //selectActividadDeAcetilcolinesterasa();
      $idExamen = '21';
      $limit = '3';

      enviar($idExamen,$limit);
    break;
    
    
    

    default:
    break;

  }

  
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





?>