<?php 

    include '../global/config.php';

    $rutOriginal = $_POST['rut'];

    $parteRut = explode("-",$rutOriginal);

    $rutSinDv = $parteRut[0];
    $dv = $parteRut[1];

    $rutSinPuntos = explode(".",$rutSinDv);
    $rut = $rutSinPuntos[0].$rutSinPuntos[1].$rutSinPuntos[2];

    //echo $rut."-".$dv;

    switch(strlen($rut)){
        case 9:
            $rut = "00".$rut;
        break;

        case 10:
            $rut = "0".$rut;
        break;
        
        default:
            $rut = $rut;
        break;
    } 

    //echo $rut;
    //$rutCompleto = $rut . "-" .$dv;

    //echo "<script>alert($rut);</script>";
    //echo $rut."<br>";

    $contraseñaLogin = $_POST['password'];
    //echo $contraseñaLogin;
    //$dv = $_POST['dv'];

    //echo $rut."-".$dv;

    $conexion = mysqli_connect(HOST,USER,PASSWORD);
    
    if(mysqli_connect_errno()){
        echo "Fallo al conectar a la BDD";
        exit();
    }

    $password = '123';

    $hash = password_hash($password,PASSWORD_DEFAULT,['cost' => 10]);

    echo $password."<br/>";
    echo $hash."<br/>";

    echo strlen($hash)."<br/>";

    

    mysqli_select_db($conexion,BDD) or die("No se encuentra la tabla");
    mysqli_set_charset($conexion,"utf8");

    $sql ="SELECT PASSWORD, ID_USUARIO, NOMBRE_USUARIO, APELLIDO_USUARIO, TIPO_DE_USUARIO.NOMBRE_TIPO_USUARIO 
    from USUARIO 
    inner join TIPO_DE_USUARIO
    ON TIPO_DE_USUARIO.ID_TIPO_USUARIO = USUARIO.ID_TIPO_USUARIO 
    where RUT_USUARIO = ? and DV_USUARIO = ? ";

    $sentencia = mysqli_stmt_init($conexion);

    if(mysqli_stmt_prepare($sentencia,$sql)){
        mysqli_stmt_bind_param($sentencia,"ss",$rut,$dv);
        mysqli_stmt_execute($sentencia);
        mysqli_stmt_bind_result($sentencia, $contraseñaBDD, $idUsuario, $nombreUsuario, $apellidoUsuario, $tipoUsuario);
        mysqli_stmt_fetch($sentencia);

        if(password_verify($contraseñaLogin,$contraseñaBDD)){
            session_start();
            $_SESSION['usuarioNombreCompleto']=$nombreUsuario." ".$apellidoUsuario;
            $_SESSION['nombreUsuario'] = $nombreUsuario;
            $_SESSION['apellidoUsuario'] = $apellidoUsuario;
            $_SESSION['tipoUsuario'] = $tipoUsuario;
            $_SESSION['idUsuario'] = $idUsuario;
            $_SESSION['control'] = true;
            
            
            header('Location:../menuprincipal/index.php');
            
        }
        /* if($contraseñaBDD == $contraseñaLogin){
            //echo $contraseñaBDD."<br>";
            //echo "Correcto";
            
            session_start();
            $_SESSION['usuarioNombreCompleto']=$nombreUsuario." ".$apellidoUsuario;
            $_SESSION['nombreUsuario'] = $nombreUsuario;
            $_SESSION['apellidoUsuario'] = $apellidoUsuario;
            $_SESSION['tipoUsuario'] = $tipoUsuario;s
            $_SESSION['idUsuario'] = $idUsuario;
            $_SESSION['control'] = true;
            
            
            header('Location:../menuprincipal/index.php');
        } */else{
            ?>

            <form action="../index.php" method="post" id="form">
                <input type="text" name="rut" id="rut" value="<?= $rutOriginal ?>" hidden>
               <!--  <input type="text" name="dv" id="dv" value=" //$dv " hidden> -->
                <input type="text" name="resultado" id="resultado" value="credencialesInvalidas" hidden>
            </form>
            <script>
                document.getElementById('form').submit();
            </script>

            <?php
            
        }
    }else{
        
        echo "error";
    }

    mysqli_stmt_free_result($sentencia);
    mysqli_close($conexion);

?>