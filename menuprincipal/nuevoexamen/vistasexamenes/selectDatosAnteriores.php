
<?php

    $sql = "SELECT DISTINCT FECHA, HORA FROM `evaluacion_parametro` INNER JOIN PARAMETRO ON evaluacion_parametro.ID_PARAMETRO = parametro.ID_PARAMETRO INNER JOIN examen ON parametro.ID_EXAMEN = examen.ID_EXAMEN WHERE ID_EVALUACION = '$idEvaluacion' AND EXAMEN.ID_EXAMEN = '$idExamen' ORDER BY `FECHA`,`HORA` DESC";

    $resultado = mysqli_query($conexion,$sql);
 
    while($row = mysqli_fetch_assoc($resultado)){
        
        $fecha = $row['FECHA'];
        $hora = $row['HORA'];
        $fechaHora = $fecha . " " . $hora;
?>        
    
        <option value="<?=$fechaHora?>"><?=$fechaHora?></option>
       
        
<?php  
    
    }


?>
