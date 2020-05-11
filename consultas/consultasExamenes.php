<?php $sql2 = "SELECT DISTINCT EXAMEN.ID_EXAMEN, FECHA, HORA FROM `EVALUACION_PARAMETRO` INNER JOIN PARAMETRO ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO INNER JOIN EXAMEN ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN WHERE EXAMEN.ID_EXAMEN = '$idExamen' ORDER BY `FECHA` DESC, `HORA` DESC, EVALUACION_PARAMETRO.ID_PARAMETRO ASC LIMIT 1;";
                $resultado = mysqli_query($conexion,$sql2);
                $row = mysqli_fetch_assoc($resultado);
                $fecha = $row['FECHA'];
                $hora = $row['HORA'];
                mysqli_free_result($resultado);
                
                $sql.="EVALUACION_PARAMETRO.ID_EVALUACION = '$idEvaluacion' AND EVALUACION_PARAMETRO.FECHA = '$fecha' AND EVALUACION_PARAMETRO.HORA = '$hora' AND EXAMEN.ID_EXAMEN='$idExamen';";

                ?>