<?php

    include '../global/config.php';

    $rut = $_POST['rut'];

    switch(strlen($rut)){
        case 7:
            $rut = "00".$_POST['rut'];
        break;

        case 8:
            $rut = "0".$_POST['rut'];
        break;
        
        default:
            $rut = $_POST['rut'];
    }

    echo $rut."<br>";

    $dv = $_POST['dv'];
    $contraseñaLogin = $_POST['password'];

    $conexion = mysqli_connect("localhost","root","");


    if(mysqli_connect_errno()){
        echo "Fallo al conectar a la BDD";
        exit();
    }

    mysqli_select_db($conexion,"pruebalogin") or die("No se encuentra la tabla");
    mysqli_set_charset($conexion,"utf8");

    $sql ="select CONTRASEÑA from USUARIO where RUT = ? and DV = ?";

    $sentencia = mysqli_stmt_init($conexion);
    if(mysqli_stmt_prepare($sentencia,$sql)){
        mysqli_stmt_bind_param($sentencia,"ss",$rut,$dv);
        mysqli_stmt_execute($sentencia);
        mysqli_stmt_bind_result($sentencia,$contraseñaBDD);
        mysqli_stmt_fetch($sentencia);

        if($contraseñaBDD == $contraseñaLogin){
            echo "Correcto";
        }else{
            echo "Incorrecta";
        }
    }else{
        echo "error";
    }

  mysqli_close($conexion);
