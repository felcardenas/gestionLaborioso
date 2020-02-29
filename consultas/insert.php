<?php

if(isset($_POST)){

  switch($_POST['consulta']){
    
    case 'empresaExiste':
          empresaExiste();
    break;
    

    case 'ingresarEmpresa':
            ingresoEmpresa();
    break;

    case 'ingresarTrabajador':
            ingresoTrabajador();
    break;

    case 'nuevoExamen':
            nuevoExamen();
    break;

    
    case 'revisarExamen':
      revisarExamen();
    break;

    case 'interconsulta':
      interconsulta();
    break;  

    case 'signosVitales':
            signosVitales();
    break;
    
    case 'ingresarPerfilLipidico':
          ingresarPerfilLipidico();
    break;

    case 'ingresarIndiceDeFramingham':
          ingresarIndiceDeFramingham();
    break;

    case 'ingresarTestDeRuffier':
          ingresarTestDeRuffier();
    break;
    
    case 'ingresarEspirometriaBasal':
          ingresarEspirometriaBasal();
    break;

    case 'ingresarElectrocardiograma':
          ingresarElectrocardiograma();
    break;

    case 'ingresarGlicemia':
      ingresarGlicemia();
    break;
    
    case 'ingresarCreatinina':
      ingresarCreatinina();
    break;

    case 'ingresarHemoglobina':
      ingresarHemoglobina();
    break;

    case 'ingresarRxTorax':
      ingresarRxTorax();
    break;

    case 'ingresarEncuestaDeLakeLouis':
      ingresarEncuestaDeLakeLouis();
    break;

    case 'ingresarCultivoNasal':
      ingresarCultivoNasal();
    break;

    case 'ingresarCultivoFaringeo':
      ingresarCultivoFaringeo();
    break;

    case 'ingresarCultivoLechoUngueal':
      ingresarCultivoLechoUngueal();
    break;

    case 'ingresarAltSgpt':
      ingresarAltSgpt();
    break;

    case 'ingresarAltSgot':
      ingresarAltSgot();
    break;

    case 'ingresarProtrombina':
      ingresarProtrombina();
    break;

    case 'ingresarTiempoDeProtrombina':
      ingresarTiempoDeProtrombina();
    break;

    case 'ingresarActividadDeAcetilcolinesterasa':
      ingresarActividadDeAcetilcolinesterasa();
    break;










    case 'ingresarAnamnesis':
        ingresarAnamnesis();
    break;

    case 'ingresarExamenFisico':
         ingresarExamenFisico();
    break;

    case 'ingresarConclusionMedica':
      ingresarConclusionMedica();
    break;

    case 'ingresarRecomendaciones':
      ingresarRecomendaciones();
    break;




    default:
      
    
    break;
  }
}

function empresaExiste(){
    include '../global/conexion.php';

    $rutEmpresa = $_POST['rutEmpresa'];

    $sql = "SELECT ID_EMPRESA FROM EMPRESA WHERE RUT_EMPRESA = '$rutEmpresa'";
  
    if($resultado = mysqli_query($conexion, $sql)){
      if(mysqli_num_rows($resultado) > 0){
        echo 'empresaExiste';
      }else{
        echo 'empresaNoExiste';
      }
    }
    mysqli_close($conexion);
}

function ingresoEmpresa(){

    include '../global/conexion.php';
    
    $valido = false;
    $nombreEmpresa = $_POST['nombreEmpresa'];
    $rutEmpresa = $_POST['rutEmpresa'];
    $dvEmpresa = $_POST['dvEmpresa'];
    $nombreRepresentante = $_POST['nombreRepresentante'];
    $rutRepresentante = $_POST['rutRepresentante'];
    $dvRepresentante = $_POST['dvRepresentante'];
    $direccionEmpresa = $_POST['direccionEmpresa'];
    $emailEmpresa = $_POST['emailEmpresa'];
    $telefonoEmpresa = $_POST['telefonoEmpresa'];
    
    

    $sql = "SELECT ID_EMPRESA FROM EMPRESA WHERE RUT_EMPRESA = '$rutEmpresa'";
  
    if($resultado = mysqli_query($conexion, $sql)){
      if(mysqli_num_rows($resultado) > 0){
        $valido = true;
      }else{
        $valido = false;
      }
    }

    if($valido == false){   
      $sql = "INSERT INTO EMPRESA
          (`NOMBRE_EMPRESA`, 
          `RUT_EMPRESA`, 
          `DV_EMPRESA`, 
          `NOMBRE_REPRESENTANTE_EMPRESA`, 
          `RUT_REPRESENTANTE_EMPRESA`, 
          `DV_REPRESENTANTE_EMPRESA`, 
          `DIRECCION_EMPRESA`, 
          `EMAIL_EMPRESA`, 
          `TELEFONO_EMPRESA`) 
      VALUES 
          ('$nombreEmpresa', 
          '$rutEmpresa', 
          '$dvEmpresa', 
          '$nombreRepresentante', 
          '$rutRepresentante', 
          '$dvRepresentante',
          '$direccionEmpresa', 
          '$emailEmpresa', 
          '$telefonoEmpresa')";

      echo mysqli_query($conexion,utf8_decode($sql));
    }else{
      echo "2";
    }

    mysqli_close($conexion);
    
}
  
function ingresoTrabajador(){

    include '../global/conexion.php';

    $valido = false;
    $nombreTrabajador = $_POST['nombreTrabajador'];
    $apellidosTrabajador = $_POST['apellidosTrabajador'];
    $rutTrabajador = $_POST['rutTrabajador'];
    $dvTrabajador = $_POST['dvTrabajador'];
    $fechaNacimientoTrabajador = $_POST['fechaNacimientoTrabajador'];
    $sexoTrabajador = $_POST['sexoTrabajador'];
    $direccionTrabajador = $_POST['direccionTrabajador'];
    $emailTrabajador = $_POST['emailTrabajador'];
    $telefonoTrabajador = $_POST['telefonoTrabajador'];
    
    switch($sexoTrabajador){
      case 'Femenino':
        $sexoTrabajador = '1';
      break;

      case 'Masculino':
        $sexoTrabajador = '2';
      break;

      case 'No especifica':
        $sexoTrabajador = '3';
      break;
    }

    $sql = "SELECT ID_TRABAJADOR FROM TRABAJADOR WHERE RUT_TRABAJADOR = '$rutTrabajador'";
  
    if($resultado = mysqli_query($conexion, $sql)){
      if(mysqli_num_rows($resultado) > 0){
        $valido = true;
      }else{
        $valido = false;
      }
    }

    if($valido == false){   
      $sql = "INSERT INTO TRABAJADOR 
          (`ID_SEXO`, 
          `RUT_TRABAJADOR`, 
          `DV_TRABAJADOR`, 
          `NOMBRE_TRABAJADOR`, 
          `APELLIDO_TRABAJADOR`, 
          `FECHA_NACIMIENTO_TRABAJADOR`, 
          `DIRECCION_TRABAJADOR`, 
          `EMAIL_TRABAJADOR`, 
          `TELEFONO_TRABAJADOR`) 
          VALUES 
          ('$sexoTrabajador', 
          '$rutTrabajador', 
          '$dvTrabajador', 
          '$nombreTrabajador', 
          '$apellidosTrabajador', 
          '$fechaNacimientoTrabajador', 
          '$direccionTrabajador', 
          '$emailTrabajador',
          '$telefonoTrabajador');";

    
    echo mysqli_query($conexion,utf8_decode($sql));
    

    }else{
      echo "2";
    }

    mysqli_close($conexion);

}

function nuevoExamen(){

    include '../global/conexion.php';
    
    $valido = false;

    $rutTrabajador = $_POST['rutTrabajador'];

    list($rut,$dvTrabajador) = explode("-",$rutTrabajador);
    $rut = explode(".",$rut);

    $rutTrabajador = $rut[0].$rut[1].$rut[2];

    $sql = "SELECT ID_TRABAJADOR, NOMBRE_TRABAJADOR, APELLIDO_TRABAJADOR, FECHA_NACIMIENTO_TRABAJADOR FROM TRABAJADOR WHERE RUT_TRABAJADOR = '$rutTrabajador' AND DV_TRABAJADOR='$dvTrabajador'";
  
    if($resultado = mysqli_query($conexion, $sql)){
      if(mysqli_num_rows($resultado) > 0){
        
        session_start();
        date_default_timezone_set("America/Santiago");  
        
        $row = mysqli_fetch_assoc($resultado);
        
        $fechaNacimiento = new DateTime($row['FECHA_NACIMIENTO_TRABAJADOR']);
        $hoy = new DateTime();
        $edad = date_diff($hoy,$fechaNacimiento);
        $edadAños = $edad->y;
        $edadMeses = $edad->m;
        $edadDias = $edad->d;
        

        $_SESSION['idTrabajador'] = $row['ID_TRABAJADOR'];
        $idTrabajador = $row['ID_TRABAJADOR'];
        $idUsuario = $_SESSION['idUsuario'];
        $_SESSION['edadTrabajador'] = $edadAños . " años ";
        //$_SESSION['edadTrabajador'] = $edadAños . " años " . $edadMeses . " meses " . $edadDias . " dias ";
        $_SESSION['nombreCompletoTrabajador'] = $row['NOMBRE_TRABAJADOR'] . " " . $row['APELLIDO_TRABAJADOR'];
        $_SESSION['rutTrabajador'] = $rutTrabajador;
        $_SESSION['dvTrabajador'] = $dvTrabajador;
        $_SESSION['rutCompletoTrabajador'] = $rutTrabajador . "-" . $dvTrabajador;



        $dia = date("d");
        $mes = date("m");
        $anio = date("Y");
        $fechaActual = $anio. "-" . $mes . "-" . $dia;
        $_SESSION['fechaActual'] = $fechaActual;

        $hora = date("H");
        $minutos = date("i");
        $segundos = date("s");
        $horaActual = $hora . ":" . $minutos . ":" . $segundos;
        $_SESSION['horaActual'] = $horaActual;   


        $sql = "INSERT INTO EVALUACION (ID_TRABAJADOR,SOLICITUD_TRABAJADOR,SOLICITUD_EMPLEADOR, PENDIENTE_REVISION_MEDICA, ID_USUARIO,FECHA_CREACION,HORA_CREACION) VALUES ('$idTrabajador','3','3','true','$idUsuario','$fechaActual','$horaActual')";
        
        if(mysqli_query($conexion,$sql)){
          
            $valido = 'true';
          
        }
        
        
        //$row = mysqli_fetch_row($resultado);
        //if(crearNuevoExamen($row['ID_TRABAJADOR'])){
        
        /* }else{
          $valido = 'false';
        } */
      }else{
        $valido = 'false';
      }
    }

    echo $valido;
  
}

function revisarExamen(){

  include '../global/conexion.php';
   
    $valido = false;

    $rutTrabajador = $_POST['rutTrabajador'];

    list($rut,$dvTrabajador) = explode("-",$rutTrabajador);
    $rut = explode(".",$rut);

    $rutTrabajador = $rut[0].$rut[1].$rut[2];

    $sql = "SELECT ID_TRABAJADOR, NOMBRE_TRABAJADOR, APELLIDO_TRABAJADOR, FECHA_NACIMIENTO_TRABAJADOR FROM TRABAJADOR WHERE RUT_TRABAJADOR = '$rutTrabajador' AND DV_TRABAJADOR='$dvTrabajador'";
  
    if($resultado = mysqli_query($conexion, $sql)){
      if(mysqli_num_rows($resultado) > 0){
        
        session_start();
        date_default_timezone_set("America/Santiago");  
        
        $row = mysqli_fetch_assoc($resultado);
        
        $fechaNacimiento = new DateTime($row['FECHA_NACIMIENTO_TRABAJADOR']);
        $hoy = new DateTime();
        $edad = date_diff($hoy,$fechaNacimiento);
        $edadAños = $edad->y;
        $edadMeses = $edad->m;
        $edadDias = $edad->d;
        

        $_SESSION['idTrabajador'] = $row['ID_TRABAJADOR'];
        $idTrabajador = $row['ID_TRABAJADOR'];
        $idUsuario = $_SESSION['idUsuario'];
        $_SESSION['edadTrabajador'] = $edadAños . " años";
        $_SESSION['nombreCompletoTrabajador'] = $row['NOMBRE_TRABAJADOR'] . " " . $row['APELLIDO_TRABAJADOR'];
        $_SESSION['rutTrabajador'] = $rutTrabajador;
        $_SESSION['dvTrabajador'] = $dvTrabajador;
        $_SESSION['rutCompletoTrabajador'] = $rutTrabajador . "-" . $dvTrabajador;

        $dia = date("d");
        $mes = date("m");
        $anio = date("Y");
        $fechaActual = $anio. "-" . $mes . "-" . $dia;
        $_SESSION['fechaActual'] = $fechaActual;

        $hora = date("H");
        $minutos = date("i");
        $segundos = date("s");
        $horaActual = $hora . ":" . $minutos . ":" . $segundos;
        $_SESSION['horaActual'] = $horaActual;   

        $valido = 'true';
          

        
        
      
      }else{
        $valido = 'false';
      }
    }

    echo $valido;
  
}

function signosVitales(){
  include '../global/conexion.php';
    
    $valido = false;

    $pulso = $_POST['pulso'];
    $tensionDiastolica = $_POST['tensionDiastolica'];
    $tensionSistolica = $_POST['tensionSistolica'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    $imc = $peso / (($altura * $altura)/10000);

    session_start();

    $_SESSION['pulso'] = $pulso;
    $_SESSION['tensionDiastolica']=$tensionDiastolica;
    $_SESSION['tensionSistolica']=$tensionSistolica;
    $_SESSION['peso']=$peso;
    $_SESSION['altura']=$altura;
    $_SESSION['imc']=$imc;



    $horaExamen = $_SESSION['horaActual'];
    $fechaExamen = $_SESSION['fechaActual'];
    

    $sql = "UPDATE EVALUACION
    SET 
    PULSO = '$pulso', 
    PRESION_DIASTOLICA = '$tensionDiastolica',
    PRESION_SISTOLICA = '$tensionSistolica',
    PESO = '$peso',
    ALTURA = '$altura',
    IMC = '$imc'
    WHERE FECHA_CREACION = '$fechaExamen' && HORA_CREACION = '$horaExamen'";

    if(mysqli_query($conexion,$sql)){
      echo 'true';
    }else{
      echo 'false';
    }

}
  
function ingresarPerfilLipidico(){

  include '../global/conexion.php';
  session_start();

  $idEvaluacion = $_SESSION['idEvaluacion'];
  $horaActual = $_SESSION['horaActual'];
  $fechaActual = $_SESSION['fechaActual'];
  
  $colesterolTotal = $_POST['colesterolTotal'];
  $colesterolHDL = $_POST['colesterolHDL'];
  $colesterolLDL = $_POST['colesterolLDL'];
  $colesterolVLDL = $_POST['colesterolVLDL'];
  $indiceCol = $_POST['indiceCol'];
  $trigliceridos = $_POST['trigliceridos'];
  $observaciones = $_POST['observaciones'];
  $estado = $_POST['estado'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','28','$fechaActual','$horaActual','$colesterolTotal'), ";

  $sql .= "('$idEvaluacion','29','$fechaActual','$horaActual','$colesterolHDL'), ";

  $sql .= "('$idEvaluacion','30','$fechaActual','$horaActual','$colesterolLDL'), ";

  $sql .= "('$idEvaluacion','31','$fechaActual','$horaActual','$colesterolVLDL'), ";

  $sql .= "('$idEvaluacion','32','$fechaActual','$horaActual','$indiceCol'), ";

  $sql .= "('$idEvaluacion','33','$fechaActual','$horaActual','$trigliceridos'),";

  $sql .= "('$idEvaluacion','34','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','35','$fechaActual','$horaActual','$estado')";

  $sql = utf8_decode($sql);

  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);

}

function ingresarIndiceDeFramingham(){

  include '../global/conexion.php';
  session_start();

  $idEvaluacion = $_SESSION['idEvaluacion'];
  $horaActual = $_SESSION['horaActual'];
  $fechaActual = $_SESSION['fechaActual'];
  $valorIndiceDeFramingham = $_POST['valorIndiceDeFramingham'];
  //$observaciones = 'Sin observaciones';
  $estado = 'Sin evaluar';
  

  $observaciones = $_POST['observaciones'];
  //$estado = $_POST['estado'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','40','$fechaActual','$horaActual','$valorIndiceDeFramingham'), ";

  $sql .= "('$idEvaluacion','41','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','42','$fechaActual','$horaActual','$estado')";

  $sql = utf8_decode($sql);

  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);

}

function ingresarTestDeRuffier(){
    include '../global/conexion.php';
    session_start();

    $idEvaluacion = $_SESSION['idEvaluacion'];
    $horaActual = $_SESSION['horaActual'];
    $fechaActual = $_SESSION['fechaActual'];
    $P1 = $_POST['P1'];
    $P2 = $_POST['P2'];
    $P3 = $_POST['P3'];
    $valoracion = ($P1+$P2+$P3-200)/10;
    //$valoracion = $_POST['valoracion'];
    //$observaciones = 'Sin observaciones';
    $estado = 'Sin evaluar';

    $observaciones = $_POST['observaciones'];
    //$estado = $_POST['estado'];
    
    $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','43','$fechaActual','$horaActual','$P1'), ";

    $sql .= "('$idEvaluacion','44','$fechaActual','$horaActual','$P2'), ";

    $sql .= "('$idEvaluacion','45','$fechaActual','$horaActual','$P3'), ";

    $sql .= "('$idEvaluacion','46','$fechaActual','$horaActual','$valoracion'), ";

    $sql .= "('$idEvaluacion','47','$fechaActual','$horaActual','$observaciones'), ";

    $sql .= "('$idEvaluacion','48','$fechaActual','$horaActual','$estado')";

    $sql = utf8_decode($sql);
    if(mysqli_query($conexion, $sql)){
        echo 'true';
    }else{
        echo 'false';
    }
    
    mysqli_close($conexion);
}

function ingresarEspirometriaBasal(){
  include '../global/conexion.php';
    session_start();

    /*                                                cvflPromedio').setAttribute("disabled",true);
                            document.getElementById('cvflLimiteInferior').setAttribute("disabled",true);
                            document.getElementById('vef1lPromedio').setAttribute("disabled",true);
                            document.getElementById('vef1lLimiteInferior').setAttribute("disabled",true);
                            document.getElementById('fef2575Promedio').setAttribute("disabled",true);
                            document.getElementById('fef2575LimiteInferior').setAttribute("disabled",true);
                            document.getElementById('vef1cvfPromedio').setAttribute("disabled",true);
                            document.getElementById('vef1cvfLimiteInferior').setAttribute("disabled",true);

                            document.getElementById('absoluto1').setAttribute("disabled",true);
                            document.getElementById('teorico1').setAttribute("disabled",true);
                            document.getElementById('absoluto2').setAttribute("disabled",true);
                            document.getElementById('teorico2').setAttribute("disabled",true);
                            document.getElementById('absoluto3').setAttribute("disabled",true);
                            document.getElementById('teorico3').setAttribute("disabled",true);
                            document.getElementById('absoluto4').setAttribute("disabled",true);

                            document.getElementById('observaciones */

    $idEvaluacion = $_SESSION['idEvaluacion'];
    $horaActual = $_SESSION['horaActual'];
    $fechaActual = $_SESSION['fechaActual'];

    $cvflPromedio = $_POST['cvflPromedio'];
    $cvflLimiteInferior = $_POST['cvflLimiteInferior'];
    $vef1lPromedio = $_POST['vef1lPromedio'];
    $vef1lLimiteInferior = $_POST['vef1lLimiteInferior'];
    $fef2575Promedio = $_POST['fef2575Promedio'];
    $fef2575LimiteInferior = $_POST['fef2575LimiteInferior'];
    $vef1cvfPromedio = $_POST['vef1cvfPromedio'];
    $vef1cvfLimiteInferior = $_POST['vef1cvfLimiteInferior'];

    $absoluto1 = $_POST['absoluto1'];    
    $teorico1 = $_POST['teorico1'];
    $absoluto2 = $_POST['absoluto2'];
    $teorico2 = $_POST['teorico2'];
    $absoluto3 = $_POST['absoluto3'];
    $teorico3 = $_POST['teorico3'];
    $absoluto4 = $_POST['absoluto4'];
        
    $observaciones = $_POST['observaciones'];
    $estado = 'Sin evaluar';

    
    //$estado = $_POST['estado'];
    
    $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','6','$fechaActual','$horaActual','$cvflPromedio'), ";

    $sql .= "('$idEvaluacion','7','$fechaActual','$horaActual','$cvflLimiteInferior'), ";

    $sql .= "('$idEvaluacion','8','$fechaActual','$horaActual','$vef1lPromedio'), ";

    $sql .= "('$idEvaluacion','9','$fechaActual','$horaActual','$vef1lLimiteInferior'), ";

    $sql .= "('$idEvaluacion','10','$fechaActual','$horaActual','$fef2575Promedio'), ";

    $sql .= "('$idEvaluacion','11','$fechaActual','$horaActual','$fef2575LimiteInferior'), ";

    $sql .= "('$idEvaluacion','12','$fechaActual','$horaActual','$vef1cvfPromedio'), ";

    $sql .= "('$idEvaluacion','13','$fechaActual','$horaActual','$vef1cvfLimiteInferior'), ";

    $sql .= "('$idEvaluacion','14','$fechaActual','$horaActual','$absoluto1'), ";

    $sql .= "('$idEvaluacion','15','$fechaActual','$horaActual','$teorico1'), ";

    $sql .= "('$idEvaluacion','16','$fechaActual','$horaActual','$absoluto2'), ";

    $sql .= "('$idEvaluacion','17','$fechaActual','$horaActual','$teorico2'), ";

    $sql .= "('$idEvaluacion','18','$fechaActual','$horaActual','$absoluto3'), ";

    $sql .= "('$idEvaluacion','19','$fechaActual','$horaActual','$teorico3'), ";

    $sql .= "('$idEvaluacion','20','$fechaActual','$horaActual','$absoluto4'), ";

    $sql .= "('$idEvaluacion','22','$fechaActual','$horaActual','$observaciones'), ";

    $sql .= "('$idEvaluacion','23','$fechaActual','$horaActual','$estado')";

  

    $sql = utf8_decode($sql);
    if(mysqli_query($conexion, $sql)){
        echo 'true';
    }else{
        echo 'false';
    }
    
    mysqli_close($conexion);
    //echo $sql;


}

function ingresarElectrocardiograma(){

  include '../global/conexion.php';
    session_start();

    $idEvaluacion = $_SESSION['idEvaluacion'];
    $horaActual = $_SESSION['horaActual'];
    $fechaActual = $_SESSION['fechaActual'];
    $estado = $_POST['estado'];
    $observaciones = $_POST['observaciones'];
    
    $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','4','$fechaActual','$horaActual','$observaciones'), ";

    $sql .= "('$idEvaluacion','5','$fechaActual','$horaActual','$estado')";

    $sql = utf8_decode($sql);
    if(mysqli_query($conexion, $sql)){
        echo 'true';
    }else{
        echo 'false';
    }
    
    mysqli_close($conexion);

}

function ingresarGlicemia(){
  include '../global/conexion.php';
    session_start();

    $idEvaluacion = $_SESSION['idEvaluacion'];
    $horaActual = $_SESSION['horaActual'];
    $fechaActual = $_SESSION['fechaActual'];
    $valor = $_POST['valor'];
    $estado = $_POST['estado'];
    $observaciones = $_POST['observaciones'];
    
    $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','49','$fechaActual','$horaActual','$valor'), ";

    $sql .= "('$idEvaluacion','50','$fechaActual','$horaActual','$estado'), ";

    $sql .= "('$idEvaluacion','51','$fechaActual','$horaActual','$observaciones')";

  
    $sql = utf8_decode($sql);
    if(mysqli_query($conexion, $sql)){
        echo 'true';
    }else{
        echo 'false';
    }
    
    mysqli_close($conexion);
}

function ingresarCreatinina(){

  include '../global/conexion.php';
  session_start();

  $idEvaluacion = $_SESSION['idEvaluacion'];
  $horaActual = $_SESSION['horaActual'];
  $fechaActual = $_SESSION['fechaActual'];
  $valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','24','$fechaActual','$horaActual','$valor'), ";

  $sql .= "('$idEvaluacion','26','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','27','$fechaActual','$horaActual','$estado')";


  $sql = utf8_decode($sql);
  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);

}

function ingresarHemoglobina(){
  include '../global/conexion.php';
  session_start();

  $idEvaluacion = $_SESSION['idEvaluacion'];
  $horaActual = $_SESSION['horaActual'];
  $fechaActual = $_SESSION['fechaActual'];
  $valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','36','$fechaActual','$horaActual','$valor'), ";

  $sql .= "('$idEvaluacion','38','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','39','$fechaActual','$horaActual','$estado')";


  $sql = utf8_decode($sql);
  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);
}

function ingresarRxTorax(){
  include '../global/conexion.php';
  session_start();

  $idEvaluacion = $_SESSION['idEvaluacion'];
  $horaActual = $_SESSION['horaActual'];
  $fechaActual = $_SESSION['fechaActual'];
  //$valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','56','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','57','$fechaActual','$horaActual','$estado')";


  $sql = utf8_decode($sql);
  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);
}

function ingresarEncuestaDeLakeLouis(){
  include '../global/conexion.php';
  session_start();

  $idEvaluacion = $_SESSION['idEvaluacion'];
  $horaActual = $_SESSION['horaActual'];
  $fechaActual = $_SESSION['fechaActual'];
  //$valor = $_POST['valor'];
  //$estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','59','$fechaActual','$horaActual','$observaciones')";

  $sql = utf8_decode($sql);

  
   if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
   
  mysqli_close($conexion);
}

function ingresarCultivoNasal(){
    include '../global/conexion.php';
    session_start();

    $idEvaluacion = $_SESSION['idEvaluacion'];
    $horaActual = $_SESSION['horaActual'];
    $fechaActual = $_SESSION['fechaActual'];
    //$valor = $_POST['valor'];
    $estado = $_POST['estado'];
    $observaciones = $_POST['observaciones'];
    
    $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','62','$fechaActual','$horaActual','$observaciones'), ";

    $sql .= "('$idEvaluacion','63','$fechaActual','$horaActual','$estado')";


    $sql = utf8_decode($sql);
    if(mysqli_query($conexion, $sql)){
        echo 'true';
    }else{
        echo 'false';
    }
    
    mysqli_close($conexion);
}

function ingresarCultivoFaringeo(){
  include '../global/conexion.php';
    session_start();

    $idEvaluacion = $_SESSION['idEvaluacion'];
    $horaActual = $_SESSION['horaActual'];
    $fechaActual = $_SESSION['fechaActual'];
    //$valor = $_POST['valor'];
    $estado = $_POST['estado'];
    $observaciones = $_POST['observaciones'];
    
    $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','65','$fechaActual','$horaActual','$observaciones'), ";

    $sql .= "('$idEvaluacion','66','$fechaActual','$horaActual','$estado')";


    $sql = utf8_decode($sql);
    if(mysqli_query($conexion, $sql)){
        echo 'true';
    }else{
        echo 'false';
    }
    
    mysqli_close($conexion);
}

function ingresarCultivoLechoUngueal(){
  include '../global/conexion.php';
  session_start();

  $idEvaluacion = $_SESSION['idEvaluacion'];
  $horaActual = $_SESSION['horaActual'];
  $fechaActual = $_SESSION['fechaActual'];
  //$valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','68','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','69','$fechaActual','$horaActual','$estado')";


  $sql = utf8_decode($sql);
  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);
}

function ingresarAltSgpt(){
  include '../global/conexion.php';
  session_start();

  $idEvaluacion = $_SESSION['idEvaluacion'];
  $horaActual = $_SESSION['horaActual'];
  $fechaActual = $_SESSION['fechaActual'];
  //$valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','71','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','72','$fechaActual','$horaActual','$estado')";


  $sql = utf8_decode($sql);
  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);
}

function ingresarAltSgot(){
  include '../global/conexion.php';
  session_start();

  $idEvaluacion = $_SESSION['idEvaluacion'];
  $horaActual = $_SESSION['horaActual'];
  $fechaActual = $_SESSION['fechaActual'];
  //$valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','74','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','75','$fechaActual','$horaActual','$estado')";


  $sql = utf8_decode($sql);
  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);
}

function ingresarProtrombina(){
  include '../global/conexion.php';
  session_start();

  $idEvaluacion = $_SESSION['idEvaluacion'];
  $horaActual = $_SESSION['horaActual'];
  $fechaActual = $_SESSION['fechaActual'];
  //$valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','77','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','78','$fechaActual','$horaActual','$estado')";


  $sql = utf8_decode($sql);
  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);
}

function ingresarTiempoDeProtrombina(){
  include '../global/conexion.php';
  session_start();

  $idEvaluacion = $_SESSION['idEvaluacion'];
  $horaActual = $_SESSION['horaActual'];
  $fechaActual = $_SESSION['fechaActual'];
  //$valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','80','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','81','$fechaActual','$horaActual','$estado')";


  $sql = utf8_decode($sql);
  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);
}

function ingresarActividadDeAcetilcolinesterasa(){
  include '../global/conexion.php';
  session_start();

  $idEvaluacion = $_SESSION['idEvaluacion'];
  $horaActual = $_SESSION['horaActual'];
  $fechaActual = $_SESSION['fechaActual'];
  //$valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','83','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','84','$fechaActual','$horaActual','$estado')";


  $sql = utf8_decode($sql);
  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);
}





function ingresarAnamnesis(){

  include '../global/conexion.php';
    session_start();

    $idEvaluacion = $_SESSION['idEvaluacion'];
    $horaActual = $_SESSION['horaActual'];
    $fechaActual = $_SESSION['fechaActual'];
    $anamnesis = $_POST['anamnesis'];
    
   

    $sql = "UPDATE EVALUACION SET ANAMNESIS = '$anamnesis' WHERE ID_EVALUACION = '$idEvaluacion'";
    //AND HORA_CREACION = '$horaActual' AND FECHA_CREACION = '$fechaActual'
    $sql = utf8_decode($sql);
    
    if(mysqli_query($conexion, $sql)){
        echo 'true';
    }else{
        echo 'false';
    }
    
    mysqli_close($conexion);


}


function ingresarExamenFisico(){

  include '../global/conexion.php';
    session_start();

    $idEvaluacion = $_SESSION['idEvaluacion'];
    $horaActual = $_SESSION['horaActual'];
    $fechaActual = $_SESSION['fechaActual'];
    $examenFisicoGeneral = $_POST['examenFisicoGeneral'];
    $cabeza = $_POST['cabeza'];
    $torax = $_POST['torax'];
    $abdomen = $_POST['abdomen'];
    $extremidadesSuperiores = $_POST['extremidadesSuperiores'];
    $extremidadesInferiores = $_POST['extremidadesInferiores'];
    $columnaGeneral = $_POST['columnaGeneral'];
    
    //UPDATE tabla SET campo = ‘valor’, campo2 = ‘valor2’ WHERE condición
   

    $sql = "UPDATE EVALUACION 
    SET 
    EXAMEN_FISICO_GENERAL = '$examenFisicoGeneral', 
    CABEZA = '$cabeza', 
    TORAX = '$torax',
    ABDOMEN = '$abdomen',
    EXTREMIDADES_SUPERIORES = '$extremidadesSuperiores',
    EXTREMIDADES_INFERIORES = '$extremidadesInferiores',
    COLUMNA_GENERAL = '$columnaGeneral'   
    WHERE 
    ID_EVALUACION = '$idEvaluacion'";
    //AND HORA_CREACION = '$horaActual' AND FECHA_CREACION = '$fechaActual'
    $sql = utf8_decode($sql);
    
    if(mysqli_query($conexion, $sql)){
        echo 'true';
    }else{
        echo 'false';
    }
    
    mysqli_close($conexion);


}

function ingresarConclusionMedica(){
  include '../global/conexion.php';
    session_start();

    $idEvaluacion = $_SESSION['idEvaluacion'];
    $horaActual = $_SESSION['horaActual'];
    $fechaActual = $_SESSION['fechaActual'];
    $conclusionMedica = $_POST['conclusionMedica'];
    
   

    $sql = "UPDATE EVALUACION SET CONCLUSION_MEDICA = '$conclusionMedica' WHERE ID_EVALUACION = '$idEvaluacion'";
    //AND HORA_CREACION = '$horaActual' AND FECHA_CREACION = '$fechaActual'
    $sql = utf8_decode($sql);
    
    if(mysqli_query($conexion, $sql)){
        echo 'true';
    }else{
        echo 'false';
    }
    
    mysqli_close($conexion);

}

function ingresarRecomendaciones(){
  include '../global/conexion.php';
  session_start();

  $idEvaluacion = $_SESSION['idEvaluacion'];
  $horaActual = $_SESSION['horaActual'];
  $fechaActual = $_SESSION['fechaActual'];
  $recomendaciones = $_POST['cadenaRecomendaciones'];
  
 

  $sql = "UPDATE EVALUACION SET RECOMENDACIONES = '$recomendaciones' WHERE ID_EVALUACION = '$idEvaluacion'";
  //AND HORA_CREACION = '$horaActual' AND FECHA_CREACION = '$fechaActual'
  $sql = utf8_decode($sql);
  
  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);
}

function interconsulta(){
    include '../global/conexion.php';
    session_start();

    $rutTrabajador = $_POST['rutTrabajador'];
    $especialidad = $_POST['especialidad'];

    $_SESSION['rutCompletoTrabajador'] = $rutTrabajador;
    $_SESSION['especialidad'] = $especialidad;

    list($rut,$dvTrabajador) = explode("-",$rutTrabajador);
    $_SESSION['rutTrabajador'] = $rut . $dvTrabajador;
    $rut = explode(".",$rut);

    $rutTrabajador = $rut[0].$rut[1].$rut[2];

    

    $sql = "SELECT ID_TRABAJADOR, NOMBRE_TRABAJADOR, APELLIDO_TRABAJADOR FROM TRABAJADOR WHERE RUT_TRABAJADOR = '$rutTrabajador' AND DV_TRABAJADOR='$dvTrabajador'";
  
    if($resultado = mysqli_query($conexion, $sql)){
        $row = mysqli_fetch_assoc($resultado);
        $_SESSION['nombreCompletoTrabajador'] = $row['NOMBRE_TRABAJADOR'] . " " . $row['APELLIDO_TRABAJADOR'];
       // $_SESSION['rutCompletoTrabajador'] = $rutTrabajador ."-". $dv;
        echo 'true';
      }else{
        echo 'false';
      }
}
      /*  if(mysqli_num_rows($resultado) > 0){
        echo 'true';
      }else{
        echo 'false';
      } */
    







?>