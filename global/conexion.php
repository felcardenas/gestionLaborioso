<?php 

include 'config.php';

$conexion = mysqli_connect(HOST,USER,PASSWORD,BDD);
//mysqli_set_charset($conexion, "utf8");
if(mysqli_connect_errno()){
    echo "Fallo al conectar a la BDD";
    exit();
}

?>