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

    case 'informes':
        revisarExamen();
    break;  

    case 'signosVitales':
            signosVitales();
    break;
    




    case 'ingresarOptometria':
      ingresarOptometria();
    break;

    case 'ingresarElectrocardiograma':
      ingresarElectrocardiograma();
    break;

    case 'ingresarGlicemia':
      ingresarGlicemia();
    break;

    case 'ingresarEspirometriaBasal':
      ingresarEspirometriaBasal();
    break;

    case 'ingresarAudiometria':
      ingresarAudiometria();
    break;
    
    case 'ingresarCreatinina':
      ingresarCreatinina();
    break;

    case 'ingresarPerfilLipidico':
          ingresarPerfilLipidico();
    break;

    case 'ingresarHemoglobina':
      ingresarHemoglobina();
    break;

    case 'ingresarRxTorax':
      ingresarRxTorax();
    break;

    case 'ingresarIndiceDeFramingham':
          ingresarIndiceDeFramingham();
    break;

    case 'ingresarEncuestaDeLakeLouis':
      ingresarEncuestaDeLakeLouis();
    break;

    case 'ingresarTestDeRuffier':
          ingresarTestDeRuffier();
    break;

    case 'ingresarHemograma':
          ingresarHemograma();
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

    case 'ingresarAstSgot':
      ingresarAstSgot();
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
        

    






    
    case 'actualizarPerfilLipidico':
      actualizarPerfilLipidico();
    break;

    case 'actualizarIndiceDeFramingham':
      actualizarIndiceDeFramingham();
    break;

    case 'actualizarTestDeRuffier':
      actualizarTestDeRuffier();
    break;

    case 'actualizarEspirometriaBasal':
      actualizarEspirometriaBasal();
    break;

    case 'actualizarElectrocardiograma':
      actualizarElectrocardiograma();
    break;

    case 'actualizarGlicemia':
      actualizarGlicemia();
    break;

    case 'actualizarCreatinina':
      actualizarCreatinina();
    break;

    case 'actualizarHemoglobina':
      actualizarHemoglobina();
    break;

    case 'actualizarRxTorax':
      actualizarRxTorax();
    break;

    case 'actualizarEncuestaDeLakeLouis':
      ingresarEncuestaDeLakeLouis();
    break;

    case 'actualizarCultivoNasal':
      actualizarCultivoNasal();
    break;

    case 'actualizarCultivoFaringeo':
      actualizarCultivoFaringeo();
    break;

    case 'actualizarCultivoLechoUngueal':
      actualizarCultivoLechoUngueal();
    break;

    case 'actualizarAltSgpt':
      actualizarAltSgpt();
    break;

    case 'actualizarAstSgot':
      actualizarAstSgot();
    break;

    case 'actualizarProtrombina':
      actualizarProtrombina();
    break;

    case 'actualizarTiempoDeProtrombina':
      actualizarTiempoDeProtrombina();
    break;

    case 'actualizarActividadDeAcetilcolinesterasa':
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

        $valido = 'true';
        
        
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

    $_SESSION['ID_EVALUACION'];

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

  date_default_timezone_set("America/Santiago");  

  $idEvaluacion = $_SESSION['idEvaluacion'];
  //$horaActual = $_SESSION['horaActual'];
  //$fechaActual = $_SESSION['fechaActual'];
  $fechaActual = obtenerFechaActual();
  $horaActual = obtenerHoraActual();


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

  $sql .= "('$idEvaluacion','35','$fechaActual','$horaActual','$estado') ";

  $sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";

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

  date_default_timezone_set("America/Santiago");  

  $idEvaluacion = $_SESSION['idEvaluacion'];
  //$horaActual = $_SESSION['horaActual'];
  //$fechaActual = $_SESSION['fechaActual'];
  $fechaActual = obtenerFechaActual();
  $horaActual = obtenerHoraActual();
  $valorIndiceDeFramingham = $_POST['valorIndiceDeFramingham'];
  //$observaciones = 'Sin observaciones';
  $estado = 'Sin evaluar';
  

  $observaciones = $_POST['observaciones'];
  //$estado = $_POST['estado'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','40','$fechaActual','$horaActual','$valorIndiceDeFramingham'), ";

  $sql .= "('$idEvaluacion','41','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','42','$fechaActual','$horaActual','$estado') ";

  $sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";

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
    date_default_timezone_set("America/Santiago");  

    $idEvaluacion = $_SESSION['idEvaluacion'];
    //$horaActual = $_SESSION['horaActual'];
    //$fechaActual = $_SESSION['fechaActual'];
    $fechaActual = obtenerFechaActual();
    $horaActual = obtenerHoraActual();
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

    $sql .= " ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";

    $sql = utf8_decode($sql);
    if(mysqli_query($conexion, $sql)){
        echo 'true';
    }else{
        echo 'false';
    }
    
    mysqli_close($conexion);
}

function ingresarHemograma(){

}

function ingresarEspirometriaBasal(){
   include '../global/conexion.php';
    session_start();


    date_default_timezone_set("America/Santiago");  

    $idEvaluacion = $_SESSION['idEvaluacion'];
    //$horaActual = $_SESSION['horaActual'];
    //$fechaActual = $_SESSION['fechaActual'];
    $fechaActual = obtenerFechaActual();
    $horaActual = obtenerHoraActual();

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

    //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";

  

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

    date_default_timezone_set("America/Santiago");  

    $idEvaluacion = $_SESSION['idEvaluacion'];
    //$horaActual = $_SESSION['horaActual'];
    //$fechaActual = $_SESSION['fechaActual'];
    $fechaActual = obtenerFechaActual();
    $horaActual = obtenerHoraActual();
    $estado = $_POST['estado'];
    $observaciones = $_POST['observaciones'];
    
    $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','4','$fechaActual','$horaActual','$observaciones'), ";

    $sql .= "('$idEvaluacion','5','$fechaActual','$horaActual','$estado')";

    //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";

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
    date_default_timezone_set("America/Santiago");  

    $idEvaluacion = $_SESSION['idEvaluacion'];
    //$horaActual = $_SESSION['horaActual'];
    //$fechaActual = $_SESSION['fechaActual'];
    $fechaActual = obtenerFechaActual();
    $horaActual = obtenerHoraActual();

    //$_SESSION['fechaActual'] = $fechaActual;
    //$_SESSION['horaActual'] = $horaActual;
    $valor = $_POST['valor'];
    $estado = $_POST['estado'];
    $observaciones = $_POST['observaciones'];
    
    $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','49','$fechaActual','$horaActual','$valor'), ";

    $sql .= "('$idEvaluacion','50','$fechaActual','$horaActual','$estado'), ";

    $sql .= "('$idEvaluacion','51','$fechaActual','$horaActual','$observaciones')";

    //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";

  
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

  date_default_timezone_set("America/Santiago");  

  $idEvaluacion = $_SESSION['idEvaluacion'];
  //$horaActual = $_SESSION['horaActual'];
  //$fechaActual = $_SESSION['fechaActual'];
  $fechaActual = obtenerFechaActual();
  $horaActual = obtenerHoraActual();
  $valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','24','$fechaActual','$horaActual','$valor'), ";

  $sql .= "('$idEvaluacion','26','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','27','$fechaActual','$horaActual','$estado')";

  //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";


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

  date_default_timezone_set("America/Santiago");  

  $idEvaluacion = $_SESSION['idEvaluacion'];
  //$horaActual = $_SESSION['horaActual'];
  //$fechaActual = $_SESSION['fechaActual'];
  $fechaActual = obtenerFechaActual();
  $horaActual = obtenerHoraActual();
  $valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','36','$fechaActual','$horaActual','$valor'), ";

  $sql .= "('$idEvaluacion','38','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','39','$fechaActual','$horaActual','$estado')";

  //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";


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

  date_default_timezone_set("America/Santiago");  

  $idEvaluacion = $_SESSION['idEvaluacion'];
  //$horaActual = $_SESSION['horaActual'];
  //$fechaActual = $_SESSION['fechaActual'];
  $fechaActual = obtenerFechaActual();
  $horaActual = obtenerHoraActual();
  //$valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','56','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','57','$fechaActual','$horaActual','$estado')";

  //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";


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

  date_default_timezone_set("America/Santiago");  

  $idEvaluacion = $_SESSION['idEvaluacion'];
  //$horaActual = $_SESSION['horaActual'];
  //$fechaActual = $_SESSION['fechaActual'];
  $fechaActual = obtenerFechaActual();
  $horaActual = obtenerHoraActual();
  //$valor = $_POST['valor'];
  //$estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','59','$fechaActual','$horaActual','$observaciones')";

  //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";

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

    date_default_timezone_set("America/Santiago");  

    $idEvaluacion = $_SESSION['idEvaluacion'];
    //$horaActual = $_SESSION['horaActual'];
    //$fechaActual = $_SESSION['fechaActual'];
    $fechaActual = obtenerFechaActual();
    $horaActual = obtenerHoraActual();
    //$valor = $_POST['valor'];
    $estado = $_POST['estado'];
    $observaciones = $_POST['observaciones'];
    
    $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','62','$fechaActual','$horaActual','$observaciones'), ";

    $sql .= "('$idEvaluacion','63','$fechaActual','$horaActual','$estado')";

    //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";


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

    date_default_timezone_set("America/Santiago");  

    $idEvaluacion = $_SESSION['idEvaluacion'];
    //$horaActual = $_SESSION['horaActual'];
    //$fechaActual = $_SESSION['fechaActual'];
    $fechaActual = obtenerFechaActual();
    $horaActual = obtenerHoraActual();
    //$valor = $_POST['valor'];
    $estado = $_POST['estado'];
    $observaciones = $_POST['observaciones'];
    
    $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','65','$fechaActual','$horaActual','$observaciones'), ";

    $sql .= "('$idEvaluacion','66','$fechaActual','$horaActual','$estado')";

    //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";


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

  date_default_timezone_set("America/Santiago");  

  $idEvaluacion = $_SESSION['idEvaluacion'];
  //$horaActual = $_SESSION['horaActual'];
  //$fechaActual = $_SESSION['fechaActual'];
  $fechaActual = obtenerFechaActual();
  $horaActual = obtenerHoraActual();
  //$valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','68','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','69','$fechaActual','$horaActual','$estado')";

  //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";


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

  date_default_timezone_set("America/Santiago");  

  $idEvaluacion = $_SESSION['idEvaluacion'];
  //$horaActual = $_SESSION['horaActual'];
  //$fechaActual = $_SESSION['fechaActual'];
  $fechaActual = obtenerFechaActual();
  $horaActual = obtenerHoraActual();
  //$valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','71','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','72','$fechaActual','$horaActual','$estado')";

  //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";


  $sql = utf8_decode($sql);
  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);
}

function ingresarAstSgot(){
  include '../global/conexion.php';
  session_start();

  date_default_timezone_set("America/Santiago");  

  $idEvaluacion = $_SESSION['idEvaluacion'];
  //$horaActual = $_SESSION['horaActual'];
  //$fechaActual = $_SESSION['fechaActual'];
  $fechaActual = obtenerFechaActual();
  $horaActual = obtenerHoraActual();
  //$valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','74','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','75','$fechaActual','$horaActual','$estado')";

  //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";


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

  date_default_timezone_set("America/Santiago");  

  $idEvaluacion = $_SESSION['idEvaluacion'];
  //$horaActual = $_SESSION['horaActual'];
  //$fechaActual = $_SESSION['fechaActual'];
  $fechaActual = obtenerFechaActual();
  $horaActual = obtenerHoraActual();
  //$valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','77','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','78','$fechaActual','$horaActual','$estado')";

  //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";


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

  date_default_timezone_set("America/Santiago");  

  $idEvaluacion = $_SESSION['idEvaluacion'];
  //$horaActual = $_SESSION['horaActual'];
  //$fechaActual = $_SESSION['fechaActual'];
  $fechaActual = obtenerFechaActual();
  $horaActual = obtenerHoraActual();
  //$valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','80','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','81','$fechaActual','$horaActual','$estado')";

  //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";


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
  date_default_timezone_set("America/Santiago");

  $idEvaluacion = $_SESSION['idEvaluacion'];
  //$horaActual = $_SESSION['horaActual'];
  //$fechaActual = $_SESSION['fechaActual'];
  $fechaActual = obtenerFechaActual();
  $horaActual = obtenerHoraActual();

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

function ingresarOptometria(){
  include '../global/conexion.php';
  session_start();
  date_default_timezone_set("America/Santiago");  

  $idEvaluacion = $_SESSION['idEvaluacion'];
  //$horaActual = $_SESSION['horaActual'];
  //$fechaActual = $_SESSION['fechaActual'];
  $fechaActual = obtenerFechaActual();
  $horaActual = obtenerHoraActual();
  //$valor = $_POST['valor'];

  $ojoDerechoLejos = $_POST['ojoDerechoLejos'];
  $ojoIzquierdoLejos = $_POST['ojoIzquierdoLejos'];
  $ambosOjosLejos = $_POST['ambosOjosLejos'];
  $ojoDerechoCerca = $_POST['ojoDerechoCerca'];
  $ojoIzquierdoCerca = $_POST['ojoIzquierdoCerca'];
  $ambosOjosCerca = $_POST['ambosOjosCerca'];
  $figuras = $_POST['figuras'];
  $animalesA = $_POST['animalesA'];
  $animalesB = $_POST['animalesB'];
  $animalesC = $_POST['animalesC'];
  $coloresPrimarios = $_POST['coloresPrimarios'];
  $encandilamiento = $_POST['encandilamiento'];
  $recuperacionEncandilamiento = $_POST['recuperacionEncandilamiento'];
  $visionNocturna = $_POST['visionNocturna'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES"; 
  $sql .= "('$idEvaluacion','85','$fechaActual','$horaActual','$ojoDerechoLejos'), 
  ('$idEvaluacion','86','$fechaActual','$horaActual','$ojoIzquierdoLejos'), 
  ('$idEvaluacion','87','$fechaActual','$horaActual','$ambosOjosLejos'), 
  ('$idEvaluacion','88','$fechaActual','$horaActual','$ojoDerechoCerca'), 
  ('$idEvaluacion','89','$fechaActual','$horaActual','$ojoIzquierdoCerca'), 
  ('$idEvaluacion','90','$fechaActual','$horaActual','$ambosOjosCerca'), 
  ('$idEvaluacion','91','$fechaActual','$horaActual','$figuras'), 
  ('$idEvaluacion','92','$fechaActual','$horaActual','$animalesA'), 
  ('$idEvaluacion','93','$fechaActual','$horaActual','$animalesB'), 
  ('$idEvaluacion','94','$fechaActual','$horaActual','$animalesC'), 
  ('$idEvaluacion','95','$fechaActual','$horaActual','$coloresPrimarios'), 
  ('$idEvaluacion','96','$fechaActual','$horaActual','$encandilamiento'), 
  ('$idEvaluacion','97','$fechaActual','$horaActual','$recuperacionEncandilamiento'), 
  ('$idEvaluacion','98','$fechaActual','$horaActual','$visionNocturna'), 
  ('$idEvaluacion','99','$fechaActual','$horaActual','$estado '), 
  ('$idEvaluacion','100','$fechaActual','$horaActual','$observaciones')";

  //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";
  

  $sql = utf8_decode($sql);
  echo $sql;
  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);
}

function ingresarAudiometria(){
  include '../global/conexion.php';
  session_start();

  date_default_timezone_set("America/Santiago");  

  $idEvaluacion = $_SESSION['idEvaluacion'];
  //$horaActual = $_SESSION['horaActual'];
  //$fechaActual = $_SESSION['fechaActual'];
  $fechaActual = obtenerFechaActual();
  $horaActual = obtenerHoraActual();


  $VAOD125 = $_POST['VAOD125'];
  $VAOD250 = $_POST['VAOD250'];
  $VAOD500 = $_POST['VAOD500'];
  $VAOD1000 = $_POST['VAOD1000'];
  $VAOD2000 = $_POST['VAOD2000'];
  $VAOD3000 = $_POST['VAOD3000'];
  $VAOD4000 = $_POST['VAOD4000'];
  $VAOD6000 = $_POST['VAOD6000'];
  $VAOD8000 = $_POST['VAOD8000'];
  $VAOI125 = $_POST['VAOI125'];
  $VAOI250 = $_POST['VAOI250'];
  $VAOI500 = $_POST['VAOI500'];
  $VAOI1000 = $_POST['VAOI1000'];
  $VAOI2000 = $_POST['VAOI2000'];
  $VAOI3000 = $_POST['VAOI3000'];
  $VAOI4000 = $_POST['VAOI4000'];
  $VAOI6000 = $_POST['VAOI6000'];
  $VAOI8000 = $_POST['VAOI8000'];
  $VOOD125 = $_POST['VOOD125'];
  $VOOD250 = $_POST['VOOD250'];
  $VOOD500 = $_POST['VOOD500'];
  $VOOD1000 = $_POST['VOOD1000'];
  $VOOD2000 = $_POST['VOOD2000'];
  $VOOD3000 = $_POST['VOOD3000'];
  $VOOD4000 = $_POST['VOOD4000'];
  $VOOD6000 = $_POST['VOOD6000'];
  $VOOD8000 = $_POST['VOOD8000'];
  $VOOI125 = $_POST['VOOI125'];
  $VOOI250 = $_POST['VOOI250'];
  $VOOI500 = $_POST['VOOI500'];
  $VOOI1000 = $_POST['VOOI1000'];
  $VOOI2000 = $_POST['VOOI2000'];
  $VOOI3000 = $_POST['VOOI3000'];
  $VOOI4000 = $_POST['VOOI4000'];
  $VOOI6000 = $_POST['VOOI6000'];
  $VOOI8000 = $_POST['VOOI8000'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES
  ('$idEvaluacion','101','$fechaActual','$horaActual','$VAOD125'),
  ('$idEvaluacion','102','$fechaActual','$horaActual','$VAOD250'),
  ('$idEvaluacion','103','$fechaActual','$horaActual','$VAOD500'),
  ('$idEvaluacion','104','$fechaActual','$horaActual','$VAOD1000'),
  ('$idEvaluacion','105','$fechaActual','$horaActual','$VAOD2000'),
  ('$idEvaluacion','106','$fechaActual','$horaActual','$VAOD3000'),
  ('$idEvaluacion','107','$fechaActual','$horaActual','$VAOD4000'),
  ('$idEvaluacion','108','$fechaActual','$horaActual','$VAOD6000'),
  ('$idEvaluacion','109','$fechaActual','$horaActual','$VAOD8000'),
  ('$idEvaluacion','110','$fechaActual','$horaActual','$VAOI125'),
  ('$idEvaluacion','111','$fechaActual','$horaActual','$VAOI250'),
  ('$idEvaluacion','112','$fechaActual','$horaActual','$VAOI500'),
  ('$idEvaluacion','113','$fechaActual','$horaActual','$VAOI1000'),
  ('$idEvaluacion','114','$fechaActual','$horaActual','$VAOI2000'),
  ('$idEvaluacion','115','$fechaActual','$horaActual','$VAOI3000'),
  ('$idEvaluacion','116','$fechaActual','$horaActual','$VAOI4000'),
  ('$idEvaluacion','117','$fechaActual','$horaActual','$VAOI6000'),
  ('$idEvaluacion','118','$fechaActual','$horaActual','$VAOI8000'),
  ('$idEvaluacion','119','$fechaActual','$horaActual','$VOOD125'),
  ('$idEvaluacion','120','$fechaActual','$horaActual','$VOOD250'),
  ('$idEvaluacion','121','$fechaActual','$horaActual','$VOOD500'),
  ('$idEvaluacion','122','$fechaActual','$horaActual','$VOOD1000'),
  ('$idEvaluacion','123','$fechaActual','$horaActual','$VOOD2000'),
  ('$idEvaluacion','124','$fechaActual','$horaActual','$VOOD3000'),
  ('$idEvaluacion','125','$fechaActual','$horaActual','$VOOD4000'),
  ('$idEvaluacion','126','$fechaActual','$horaActual','$VOOD6000'),
  ('$idEvaluacion','127','$fechaActual','$horaActual','$VOOD8000'),
  ('$idEvaluacion','128','$fechaActual','$horaActual','$VOOI125'),
  ('$idEvaluacion','129','$fechaActual','$horaActual','$VOOI250'),
  ('$idEvaluacion','130','$fechaActual','$horaActual','$VOOI500'),
  ('$idEvaluacion','131','$fechaActual','$horaActual','$VOOI1000'),
  ('$idEvaluacion','132','$fechaActual','$horaActual','$VOOI2000'),
  ('$idEvaluacion','133','$fechaActual','$horaActual','$VOOI3000'),
  ('$idEvaluacion','134','$fechaActual','$horaActual','$VOOI4000'),
  ('$idEvaluacion','135','$fechaActual','$horaActual','$VOOI6000'),
  ('$idEvaluacion','136','$fechaActual','$horaActual','$VOOI8000'),
  ('$idEvaluacion','137','$fechaActual','$horaActual','$observaciones'),
  ('$idEvaluacion','138','$fechaActual','$horaActual','$estado')";


 //$sql .= "ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";

  

  $sql = utf8_decode($sql);
  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  mysqli_close($conexion);
}








/* MODIFICAR */

function actualizarPerfilLipidico(){

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
  

  $sql = "UPDATE EVALUACION_PARAMETRO SET VALOR_PARAMETRO = '$colesterolTotal' WHERE ID_EVALUACION = '$idEvaluacion' AND ID_PARAMETRO = '28'; "; 

  $sql = "UPDATE EVALUACION_PARAMETRO SET VALOR_PARAMETRO = '$colesterolHDL' WHERE ID_EVALUACION '$idEvaluacion' AND ID_PARAMETRO = '29'; "; 

  $sql .= "UPDATE EVALUACION_PARAMETRO SET VALOR_PARAMETRO = '$colesterolLDL' WHERE ID_EVALUACION = '$idEvaluacion' AND ID_PARAMETRO = '30'; "; 

  $sql .= "UPDATE EVALUACION_PARAMETRO SET VALOR_PARAMETRO = '$colesterolVLDL' WHERE ID_EVALUACION = '$idEvaluacion' AND ID_PARAMETRO = '31'; "; 

  $sql .= "UPDATE EVALUACION_PARAMETRO SET VALOR_PARAMETRO = '$indiceCol' WHERE ID_EVALUACION = '$idEvaluacion' AND ID_PARAMETRO = '32'; ";

  $sql .= "UPDATE EVALUACION_PARAMETRO SET VALOR_PARAMETRO = '$trigliceridos' WHERE ID_EVALUACION = '$idEvaluacion' AND ID_PARAMETRO = '33'; "; 

  $sql .= "UPDATE EVALUACION_PARAMETRO SET VALOR_PARAMETRO = '$observaciones' WHERE ID_EVALUACION = '$idEvaluacion' AND ID_PARAMETRO = '34'; "; 

  $sql .= "UPDATE EVALUACION_PARAMETRO SET VALOR_PARAMETRO = '$estado' WHERE ID_EVALUACION = '$idEvaluacion' AND ID_PARAMETRO = '35';"; 

  $sql = utf8_decode($sql);

  if(mysqli_query($conexion, $sql)){
      echo 'true';
  }else{
      echo 'false';
  }
  
  


  /* $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','28','$fechaActual','$horaActual','$colesterolTotal'), ";

  $sql .= "('$idEvaluacion','29','$fechaActual','$horaActual','$colesterolHDL'), ";

  $sql .= "('$idEvaluacion','30','$fechaActual','$horaActual','$colesterolLDL'), ";

  $sql .= "('$idEvaluacion','31','$fechaActual','$horaActual','$colesterolVLDL'), ";

  $sql .= "('$idEvaluacion','32','$fechaActual','$horaActual','$indiceCol'), "; */

  /* $sql .= "('$idEvaluacion','33','$fechaActual','$horaActual','$trigliceridos'),";

  $sql .= "('$idEvaluacion','34','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','35','$fechaActual','$horaActual','$estado')";
 */
 
  
  mysqli_close($conexion);

}

function actualizarIndiceDeFramingham(){

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

function actualizarTestDeRuffier(){
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

function actualizarEspirometriaBasal(){
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

function actualizarElectrocardiograma(){

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

function actualizarGlicemia(){
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

function actualizarCreatinina(){

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

function actualizarHemoglobina(){
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

function actualizarRxTorax(){
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

function actualizarEncuestaDeLakeLouis(){
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

function actualizarCultivoNasal(){
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

function actualizarCultivoFaringeo(){
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

function actualizarCultivoLechoUngueal(){
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

function actualizarAltSgpt(){
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

function actualizarAstSgot(){
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

function actualizarProtrombina(){
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

function actualizarTiempoDeProtrombina(){
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

function actualizarActividadDeAcetilcolinesterasa(){
  include '../global/conexion.php';
  session_start();

  $idEvaluacion = $_SESSION['idEvaluacion'];
  $horaActual = $_SESSION['horaActual'];
  $fechaActual = $_SESSION['fechaActual'];
  //$valor = $_POST['valor'];
  $estado = $_POST['estado'];
  $observaciones = $_POST['observaciones'];
  
  /* INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('126','83','2020-03-05','13:49:36','OBSERVACIONCITAS'), ('126','84','2020-03-05','13:49:36','ESTADITO') ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO); */
 

  $sql = "INSERT INTO EVALUACION_PARAMETRO (ID_EVALUACION,ID_PARAMETRO,FECHA, HORA, VALOR_PARAMETRO) VALUES ('$idEvaluacion','83','$fechaActual','$horaActual','$observaciones'), ";

  $sql .= "('$idEvaluacion','84','$fechaActual','$horaActual','$estado') ON DUPLICATE KEY UPDATE VALOR_PARAMETRO = VALUES(VALOR_PARAMETRO)";

  



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
    
    $texto = '';


 /*                              a1.- SALUD COMPATIBLE ALTURA GEOGRAFICA.- LOS EXAMNES PRACTICADOS NO DEMUESTRAN ALTERACIONES QUE CONTRAINDIQUEN EL TRABAJO EN GRAN ALTURA GEOGRAFICA, DESDE 3.000 A 5.5000 MSNM.
a2.- SALUD NO COMPATIBLE EN ALTURA GEOGRAFICA.- LOS EXAMNES PRACTICADOS DEMUESTRAN ALTERACIONES TEMPORALES  QUE CONTRAINDICAN  EL TRABAJO EN GRAN ALTURA GEOGRAFICA.
a3.- SALUD COMPATIBLE. EL EXAMEN DE SALUD REALIZADO NO DEMUESTRA ALTERACIONES QUE IMPIDAN SU DESENPEÑO PARA LOS RIESGOS INDICADOS.
b.-SALUD NO COMPATIBLE TEMPORAL.- EL EXAMEN DE SALUD REALIZADO DEMUESTRA ALTERACIONES TEMPORALES  QUE IMPIDAN SU DESENPEÑO PARA LOS RIESGOS INDICADOS
c.- CONCLUSION PENDIENTE.- SE REQUIERE EXAMENES ADICIONALES EN PROCESO PARA CONCLUIR INFORME.
d.- NO ASISTE A CONTROL.
e.- SALUD NO COMPATIBLE PERMANENTE.- CON LOS EXAMENES PRACTICADOS SE A CONCLUIDO QUE EL TRABAJADOR PRESENTA CONDICIONES DE SALUD, QUE NO ES APTO DE MANERA PERMANENTE PARA TRABAJAR EN LOS RIESGOS INDICADOS.
  */
    switch($conclusionMedica){
      case 'A1':
          $texto = 'A1.-SALUD COMPATIBLE ALTURA GEOGRAFICA. LOS EXÁMENES PRACTICADOS NO DEMUESTRAN ALTERACIONES QUE CONTRAINDIQUEN EL TRABAJO EN GRAN ALTURA GEOGRAFICA, DESDE 3.000 A 5.500 MSNM.';
      break;
    
      case 'A2':
        $texto = 'A2.-SALUD NO COMPATIBLE EN ALTURA GEOGRAFICA. LOS EXÁMENES PRACTICADOS DEMUESTRAN ALTERACIONES TEMPORALES  QUE CONTRAINDICAN  EL TRABAJO EN GRAN ALTURA GEOGRAFICA.';
      break;

      case 'A3':
        $texto = 'A3.-SALUD COMPATIBLE. EL EXAMEN DE SALUD REALIZADO NO DEMUESTRA ALTERACIONES QUE IMPIDAN SU DESEMPEÑO PARA LOS RIESGOS INDICADOS.';
      break;

      case 'B':
        $texto = 'B.-SALUD NO COMPATIBLE TEMPORAL. EL EXAMEN DE SALUD REALIZADO DEMUESTRA ALTERACIONES TEMPORALES  QUE IMPIDAN SU DESENPEÑO PARA LOS RIESGOS INDICADOS';
      break;

      case 'C':
        $texto = 'C.-CONCLUSION PENDIENTE. SE REQUIEREN EXAMENES ADICIONALES EN PROCESO PARA CONCLUIR INFORME.';
      break;

      case 'D':
        $texto = 'D.-NO ASISTE A CONTROL.';
      break;

      case 'E':
        $texto = 'E.-SALUD NO COMPATIBLE PERMANENTE. CON LOS EXAMENES PRACTICADOS SE HA CONCLUIDO QUE EL TRABAJADOR PRESENTA CONDICIONES DE SALUD. NO ES APTO DE MANERA PERMANENTE PARA TRABAJAR EN LOS RIESGOS INDICADOS.';
      break;
    }

    $sql = "UPDATE EVALUACION SET CONCLUSION_MEDICA = '$texto' WHERE ID_EVALUACION = '$idEvaluacion'";
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
    
function obtenerFechaActual(){
        $dia = date("d");
        $mes = date("m");
        $anio = date("Y");
        $fechaActual = $anio. "-" . $mes . "-" . $dia;
        return $fechaActual;
}

function obtenerHoraActual(){
      $hora = date("H");
      $minutos = date("i");
      $segundos = date("s");
      $horaActual = $hora . ":" . $minutos . ":" . $segundos;
      return $horaActual;
}






?>