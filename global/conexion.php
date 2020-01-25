<?php 

include 'config.php';

$conexion = mysqli_connect(HOST,USER,PASSWORD,BDD);

if(mysqli_connect_errno()){
    echo "Fallo al conectar a la BDD";
    exit();
}

?>