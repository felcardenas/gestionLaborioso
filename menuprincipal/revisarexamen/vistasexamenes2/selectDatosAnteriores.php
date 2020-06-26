
<?php

    $sql = "SELECT DISTINCT FECHA, HORA FROM `EVALUACION_PARAMETRO` INNER JOIN PARAMETRO ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO INNER JOIN EXAMEN ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN WHERE ID_EVALUACION = '$idEvaluacion' AND EXAMEN.ID_EXAMEN = '$idExamen' ORDER BY `FECHA`,`HORA` DESC";

    $resultado = mysqli_query($conexion,$sql);
 
    while($row = mysqli_fetch_assoc($resultado)){
        
        $fecha = $row['FECHA'];
        $hora = $row['HORA'];
        $fechaHora = $fecha . " " . $hora;
        
        $fechaDMA = date("d-m-Y",strtotime($fecha));
                            
        //$fechaHora = $fecha . " " . $hora;
        $fechaHoraDMA = $fechaDMA . " " . $hora;
?>        
    
        <option value="<?=$fechaHora?>"><?=$fechaHoraDMA?></option>
       
        
<?php  
    
    }


?>
