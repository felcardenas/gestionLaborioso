<?php
                                
$sql = "SELECT DISTINCT `FECHA`, `HORA` FROM `$tabla` WHERE ID_EVALUACION = '$idEvaluacion' ORDER BY `FECHA` DESC, `HORA` DESC, `$campoId` ASC;";

$resultado = mysqli_query($conexion,$sql);

while($row = mysqli_fetch_assoc($resultado)){
                                            
    $fecha = $row['FECHA'];
    $hora = $row['HORA'];
    //$fechaHora = $fecha . " " . $hora;
    $fechaDMA = date("d-m-Y",strtotime($fecha));
                            
                            $fechaHora = $fecha . " " . $hora;
                            $fechaHoraDMA = $fechaDMA . " " . $hora;
?>        

<option value="<?=$fechaHora?>"><?=$fechaHoraDMA?></option>
                                       
<?php } ?>