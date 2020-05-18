<?php 


if(isset($_POST['validarRut'])){
    switch($_POST['validarRut']){
        case 'validarRutEmpresa':
            
            validarRutEmpresa();
        break;

        case 'validarRutTrabajador':
            validarRutTrabajador();
        break;
    }
}

function validarRutEmpresa(){
    include '../global/conexion.php';
    
    $rutEmpresa = $_POST['rutEmpresa'];
       
    $sql = "SELECT ID_EMPRESA FROM EMPRESA WHERE RUT_EMPRESA = '$rutEmpresa'";
  
    if($resultado = mysqli_query($conexion, $sql)){
      if(mysqli_num_rows($resultado) > 0){
        $valido = true;
      }else{
        $valido = false;
      }
    }

    if($valido){   
        echo '2';
    }
}

function validarRutTrabajador(){
    include '../global/conexion.php';
    
    $rutTrabajador = $_POST['rutTrabajador'];
    
    $sql = "SELECT ID_TRABAJADOR FROM TRABAJADOR WHERE RUT_TRABAJADOR = '$rutTrabajador'";
  
    if($resultado = mysqli_query($conexion, $sql)){
      if(mysqli_num_rows($resultado) > 0){
        $valido = true;
      }else{
        $valido = false;
      }
    }

    if($valido){
        echo '2';
    }
}




?>
