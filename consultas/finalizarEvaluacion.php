<?php 

if(isset($_POST['examenFinalizado'])){

        session_start();
        include '../global/conexion.php';
        
        //$examenFinalizado = $_POST['examenFinalizado'];
        $idEvaluacion = $_SESSION['idEvaluacion'];

        $sql = "UPDATE `EVALUACION` SET `PENDIENTE_REVISION_MEDICA`= '2' WHERE ID_EVALUACION = '$idEvaluacion'";
        //echo $sql;
        if(mysqli_query($conexion,$sql)){
            echo 'true';
        }else{
            echo 'false';
        }
        mysqli_close($conexion);
   
         
}else{
    echo 'false';
    
}



?>
