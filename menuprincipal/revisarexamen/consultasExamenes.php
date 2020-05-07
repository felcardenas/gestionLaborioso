<?php $sql2 = "SELECT DISTINCT EXAMEN.ID_EXAMEN, FECHA, HORA FROM `evaluacion_parametro` INNER JOIN parametro on evaluacion_parametro.ID_PARAMETRO = parametro.ID_PARAMETRO INNER JOIN EXAMEN ON parametro.ID_EXAMEN = EXAMEN.ID_EXAMEN WHERE EXAMEN.ID_EXAMEN = '$idExamen' ORDER BY `FECHA` DESC, `HORA` DESC, evaluacion_parametro.ID_PARAMETRO ASC LIMIT 1;";
                $resultado = mysqli_query($conexion,$sql2);
                $row = mysqli_fetch_assoc($resultado);
                $fecha = $row['FECHA'];
                $hora = $row['HORA'];
                mysqli_free_result($resultado);
                
                $sql.="evaluacion_parametro.ID_EVALUACION = '$idEvaluacion' AND evaluacion_parametro.FECHA = '$fecha' AND evaluacion_parametro.HORA = '$hora' AND examen.ID_EXAMEN='$idExamen';";

                ?>