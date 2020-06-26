<h3 class="text-center">RIESGOS

<?php 
//include '../../global/conexion.php';

//$idEvaluacion ='44';
$sqlRiesgos = "SELECT BATERIA_DE_EXAMENES.NOMBRE_BATERIA_DE_EXAMENES FROM BATERIA_DE_EXAMENES INNER JOIN EVALUACION_BATERIA_DE_EXAMENES ON BATERIA_DE_EXAMENES.ID_BATERIA_DE_EXAMENES = EVALUACION_BATERIA_DE_EXAMENES.ID_BATERIA_DE_EXAMENES WHERE EVALUACION_BATERIA_DE_EXAMENES.ID_EVALUACION = '$idEvaluacion'"; 
        //echo $sql;
        $resultado = mysqli_query($conexion,$sqlRiesgos);
        $cadenaBateria = '';
        while($row = mysqli_fetch_assoc($resultado)){
            //$cadenaBateria .= $row['NOMBRE_BATERIA_DE_EXAMENES']." / ";?>
            <div class="col-12 pt-2" style="font-size:25px"><?=$row['NOMBRE_BATERIA_DE_EXAMENES']?></div> 
            <?php
        }

?>


<!-- <div class="col-12" style="font-size:20px"><?=$cadenaBateria?></div> -->
</h3>
