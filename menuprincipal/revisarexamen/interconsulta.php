<?php
include '../../global/conexion.php';
session_start();
$idTrabajador = $_SESSION['idTrabajador'];
$idEvaluacion = $_SESSION['idEvaluacion'];

$fecha = "";
$hora = "";
$nombreUltimaEspecialidad = "";
$observaciones = "";

$sql="SELECT NOMBRE_ESPECIALIDAD, OBSERVACIONES, FECHA, HORA FROM `interconsulta` INNER JOIN ESPECIALIDAD ON interconsulta.ID_ESPECIALIDAD = especialidad.ID_ESPECIALIDAD WHERE ID_EVALUACION= '$idEvaluacion' ORDER BY `interconsulta`.`FECHA` DESC, `interconsulta`.`HORA` DESC LIMIT 1";
//echo $sql;
if($resultado = mysqli_query($conexion,$sql)){;
    if($row = mysqli_fetch_assoc($resultado)){
        $fecha = $row['FECHA'];
        $hora = $row['HORA'];

    //
    
    

    $nombreUltimaEspecialidad = $row['NOMBRE_ESPECIALIDAD'];
    $observaciones = $row['OBSERVACIONES'];
    }
    mysqli_free_result($resultado);
}



$sql = "SELECT NOMBRE_ESPECIALIDAD FROM especialidad";
$resultado = mysqli_query($conexion, $sql);
?>


<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Interconsulta</div></h1>
</div>


<form action="" method="post" class="form-group" id="formInterconsulta" name="formInterconsulta">
    
    <!-- SELECCIONE EMPRESA -->
    <div class="row justify-content-center">

                            <div class="col-8">
                                <label for="">Especialidad</label>
                                <select class="form-control" id="especialidad" name="especialidad">
                                    <?php 
                                        while($row = mysqli_fetch_assoc($resultado)){
                                            $especialidad = utf8_encode($row['NOMBRE_ESPECIALIDAD']);
                                    ?>        
                                         <option value="<?=$especialidad?>" 
                                         <?php 
                                         if($nombreUltimaEspecialidad == $especialidad){
                                             echo "selected";
                                         }
                                         ?>
                                         ><?=$especialidad?></option>
                                    <?php
                                        } mysqli_free_result($resultado);
                                    ?>
                                    
                                </select>
                            </div>

                            <div class="col-8">
                                <label for="">Observaciones</label>
                                <textarea class="form-control" id="observaciones" name="observaciones" rows="6" maxlength="600"><?=$observaciones?></textarea>
                            </div>
    </div>

                        <!-- <input type="text" name="consulta" id="consulta" value="interconsulta" hidden> -->
                        
                        
                        <div class="row justify-content-center my-5">
                            <div class="col-8">
                                    <input type="button" 
                                    name="siguiente" 
                                    id="siguiente" 
                                    class="form-control btn btn-primary" 
                                    value="GENERAR INFORME"
                                    onclick="validarInterconsulta()">
                            </div>
                        </div>

                        <hr>

                        <div class="row justify-content-center mt-5">
                            <div class="col-4">
                                <input type="button" class="form-control btn btn-primary" value="REVISAR PDF" onclick="revisarPDFInterconsulta()">
                            </div>


                            <input type="text" name="select" id="select" value="selectInterconsulta" hidden>


                            <div class="col-4">
                                <select class="form-control" name="fechaHora" id="fechaHora" onchange="obtenerParametrosInterconsulta()">

                                <?php 

                                    $sql = "SELECT DISTINCT FECHA, HORA FROM `interconsulta` WHERE ID_EVALUACION = '$idEvaluacion' ORDER BY `FECHA` DESC, `HORA` DESC";
                                    
                                    $resultado = mysqli_query($conexion,$sql);
                                    while($row = mysqli_fetch_assoc($resultado)){
                                    $fecha = $row['FECHA'];
                                    $hora = $row['HORA']; 

                                        $fechaDMA = date("d-m-Y",strtotime($fecha));
                                        
                                        $fechaHora = $fecha . " " . $hora;
                                        $fechaHoraDMA = $fechaDMA . " " . $hora;
                                ?>

                                    <option value="<?=$fechaHora?>"><?=$fechaHoraDMA?></option>
                                
                                    <?php } ?>
                                
                                </select>
                            </div>
                        </div>


                        
</form>