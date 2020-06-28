<?php
include '../../global/conexion.php';
session_start();
$idTrabajador = $_SESSION['idTrabajador'];
$idEvaluacion = $_SESSION['idEvaluacion'];

 if($_SESSION['tipoUsuario'] != 'Estándar'){
     $mostrar = 'disabled'; 
 } 

$fecha = "";
$hora = "";
$nombreUltimaEspecialidad = "";
$observaciones = "";

$sql="SELECT NOMBRE_ESPECIALIDAD, OBSERVACIONES, FECHA, HORA FROM `INTERCONSULTA` INNER JOIN ESPECIALIDAD ON INTERCONSULTA.ID_ESPECIALIDAD = ESPECIALIDAD.ID_ESPECIALIDAD WHERE ID_EVALUACION= '$idEvaluacion' ORDER BY `INTERCONSULTA`.`FECHA` DESC, `INTERCONSULTA`.`HORA` DESC LIMIT 1";
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



$sql = "SELECT NOMBRE_ESPECIALIDAD FROM ESPECIALIDAD";
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
                                    class="form-control btn btn-primary btn-lg" 
                                    value="GENERAR NUEVO INFORME DE INTERCONSULTA"
                                    onclick="validarInterconsulta()"
                                    style="height:100px; width:600px;"
                                    <?php 
                                    if($_SESSION['tipoUsuario'] == 'Estándar' || $_SESSION['mostrar'] == 'disabled'){
                                    
                                    
                                    echo "disabled";}?>
                                    >
                            </div>
                        </div>
</form>
                        <hr>


                        <div class="row justify-content-center">
                                    <h1><div class="col-12 mt-5">LISTADO INFORMES INTERCONSULTA</div></h1>
                        </div>

                        <div class="row justify-content-center mt-5">
                            <!-- <div class="col-4">
                                <input type="button" class="form-control btn btn-primary" value="REVISAR PDF" onclick="revisarPDFInterconsulta()">
                            </div> -->


                            <input type="text" name="select" id="select" value="selectInterconsulta" hidden>


                            <div class="col-12">

                                

                                <!-- <select class="form-control" name="fechaHora" id="fechaHora" onchange="obtenerParametrosInterconsulta()"> -->

                                <div class="row justify-content-center text-center">
                                        <div class="col-1">#</div>
                                        <div class="col-4">ESPECIALIDAD</div>
                                        <div class="col-2">FECHA</div>
                                        <div class="col-2">HORA</div>
                                        <div class="col-3">INFORME</div>

                                </div>

                                <?php 

                                    $sql = "SELECT DISTINCT ESPECIALIDAD.NOMBRE_ESPECIALIDAD, INTERCONSULTA.FECHA, INTERCONSULTA.HORA FROM `INTERCONSULTA` INNER JOIN ESPECIALIDAD ON INTERCONSULTA.ID_ESPECIALIDAD = ESPECIALIDAD.ID_ESPECIALIDAD WHERE ID_EVALUACION = '$idEvaluacion' ORDER BY `FECHA` DESC, `HORA` DESC ";
                                    
                                    $resultado = mysqli_query($conexion,$sql);

                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($resultado)){
                                    $fecha = $row['FECHA'];
                                    $hora = $row['HORA']; 
                                    $nombreEspecialidad = $row['NOMBRE_ESPECIALIDAD'];

                                        $fechaDMA = date("d-m-Y",strtotime($fecha));
                                        
                                        $fechaHora = $fecha . " " . $hora;
                                        $fechaHoraDMA = $fechaDMA . " " . $hora;

                                    $nameId='formRevisarPDF'.$i;    
                                ?>

                                    <hr style="border-top:1px solid black">

                                    <form action="" method="post" class="form-group" id="<?=$nameId?>" name="<?=$nameId?>">
                                        <input type="text" id="fechaHora" name="fechaHora" value="<?=$fechaHora?>" hidden>
                                        <div class="row text-center">
                                            <div class="col-1"><?=$i?></div>
                                            <div class="col-4"><?=$nombreEspecialidad?></div>
                                            <div class="col-2"><?=$fechaDMA?></div>
                                            <div class="col-2"><?=$hora?></div>
                                            <div class="col-3"><input type="button" class="form-control btn btn-primary" value="REVISAR PDF" onclick="revisarPDFInterconsulta('#<?=$nameId?>')"></div>
                                        </div>
                                    </form> 
                                    
                                
                                    
                                    <!-- <option value="<?=$fechaHora?>"><?=$fechaHoraDMA?></option> -->

                                    <?php ;$i++; } ?>
                                
                                <!-- </select> -->
                            </div>
                        </div>


                        
