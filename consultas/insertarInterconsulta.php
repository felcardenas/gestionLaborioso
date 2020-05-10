<?php 

include "../global/conexion.php";
session_start();
date_default_timezone_set("America/Santiago"); 

//$especialidad = 'MEDICINA GENERAL';

$idTrabajador = $_SESSION['idTrabajador'];
$idUsuario = $_SESSION['idUsuario'];
$edadTrabajador = $_SESSION['edadTrabajador'];
$idEvaluacion = $_SESSION['idEvaluacion'];
$hoy = date("Y-m-d"); 
$hora = date("H:i:s");
$fechaValidez = date("Y-m-d",strtotime($hoy."+ 1 year"));


if(isset($_POST)){

    $especialidad = $_POST['especialidad'];
    $observaciones = $_POST['observaciones'];
    $nombreMedico = utf8_decode($_SESSION['usuarioNombreCompleto']);
    $clave = crearClave();

    $sql = "SELECT ID_ESPECIALIDAD FROM ESPECIALIDAD WHERE NOMBRE_ESPECIALIDAD = '$especialidad'";
    $resultado = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($resultado);
    $idEspecialidad = $row['ID_ESPECIALIDAD'];
    

    //echo $sql . "<br>$idEspecialidad<br>";
    
    mysqli_free_result($resultado);

    $sql = "INSERT IGNORE INTO INTERCONSULTA(FECHA_VALIDEZ, ID_EVALUACION, ID_ESPECIALIDAD, FECHA, HORA, NOMBRE_MEDICO,OBSERVACIONES, CLAVE, EDAD) VALUES ('$fechaValidez','$idEvaluacion','$idEspecialidad','$hoy','$hora','$nombreMedico','$observaciones','$clave','$edadTrabajador')";    
    
    //echo $sql;
    //mysqli_query($conexion,$sql) or die(mysqli_error($conexion));


        if(mysqli_query($conexion,$sql)){
        echo 'true';
    }else{
        echo 'false';
    }  
    //echo $sql;
}else{
    echo 'false';
}

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




function evitarPasswordDuplicado($password){

    include "../global/conexion.php";
    session_start();
    date_default_timezone_set("America/Santiago"); 
    $valido = false;


    $sql = "SELECT ID_ESPECIALIDAD FROM INTERCONSULTA WHERE CLAVE='$password'";
    $resultado = mysqli_query($conexion,$sql);
    $cantidadResultados = mysqli_num_rows($resultado);

    if($cantidadResultados == 0){
        $valido = true;
    }else{
        $valido = false;
    }

    return $valido;
}


?>