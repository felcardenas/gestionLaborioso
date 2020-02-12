<?php 

    include '../global/config.php';

    $rut = $_POST['rut'];

    /* switch(strlen($rut)){
        case 7:
            $rut = "00".$_POST['rut'];
        break;

        case 8:
            $rut = "0".$_POST['rut'];
        break;
        
        default:
            $rut = $_POST['rut'];
    } */

    //echo $rut."<br>";

    $contraseñaLogin = $_POST['password'];
    $dv = $_POST['dv'];

    //echo $rut."-".$dv;

    $conexion = mysqli_connect(HOST,USER,PASSWORD);
    
    if(mysqli_connect_errno()){
        echo "Fallo al conectar a la BDD";
        exit();
    }

    mysqli_select_db($conexion,BDD) or die("No se encuentra la tabla");
    mysqli_set_charset($conexion,"utf8");

    $sql ="select PASSWORD, ID_USUARIO, NOMBRE_USUARIO, APELLIDO_USUARIO, tipo_de_usuario.NOMBRE_TIPO_USUARIO 
    from USUARIO 
    inner join tipo_de_usuario 
    ON tipo_de_usuario.ID_TIPO_USUARIO = usuario.ID_TIPO_USUARIO 
    where RUT_USUARIO = ? and DV_USUARIO = ? ";

    $sentencia = mysqli_stmt_init($conexion);

    if(mysqli_stmt_prepare($sentencia,$sql)){
        mysqli_stmt_bind_param($sentencia,"ss",$rut,$dv);
        mysqli_stmt_execute($sentencia);
        mysqli_stmt_bind_result($sentencia, $contraseñaBDD, $idUsuario, $nombreUsuario, $apellidoUsuario, $tipoUsuario);
        mysqli_stmt_fetch($sentencia);

    if($contraseñaBDD == $contraseñaLogin){
            //echo $contraseñaBDD."<br>";
            //echo "Correcto";

            
            session_start();
            $_SESSION['usuarioNombreCompleto']=$nombreUsuario." ".$apellidoUsuario;
            $_SESSION['nombreUsuario'] = $nombreUsuario;
            $_SESSION['apellidoUsuario'] = $apellidoUsuario;
            $_SESSION['tipoUsuario'] = $tipoUsuario;
            $_SESSION['idUsuario'] = $idUsuario;
            $_SESSION['control'] = true;
            
            header('Location:../menuprincipal/index.php');
        }else{
            ?>

            <form action="../index.php" method="post" id="form">
                <input type="text" name="rut" id="rut" value="<?= $rut ?>" hidden>
                <input type="text" name="dv" id="dv" value="<?= $dv ?>" hidden>
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