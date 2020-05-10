<?php
session_start();
include '../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];

$tabla = "CONCLUSION_MEDICA_EVALUACION";
$campoId = "ID_CONCLUSION_MEDICA";  


$sql = "SELECT CONCLUSION_MEDICA.NOMBRE_CONCLUSION_MEDICA FROM CONCLUSION_MEDICA WHERE ID_CONCLUSION_MEDICA = (
    SELECT ID_CONCLUSION_MEDICA FROM `CONCLUSION_MEDICA_EVALUACION` WHERE ID_EVALUACION = '$idEvaluacion' ORDER BY `CONCLUSION_MEDICA_EVALUACION`.`FECHA` DESC, `CONCLUSION_MEDICA_EVALUACION`.`HORA` DESC LIMIT 1)";

$conclusionMedica = '';

$resultado = mysqli_query($conexion, $sql); 
    
if($row = mysqli_fetch_assoc($resultado)){
    $conclusionMedica = $row['NOMBRE_CONCLUSION_MEDICA'];
}

$cadenaConclusionMedica = substr($conclusionMedica,0,2);

//echo utf8_encode($cadenaConclusionMedica);



?>
<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Conclusión médica</div></h1>
              
</div>


<form action="" method="post" class="form-group" id="formIngresarConclusionMedica" name="formIngresarConclusionMedica">
    
    <!-- SELECCIONE EMPRESA -->
    <div class="row justify-content-center">

                           <div class="col-8">
                                <label for="">Conclusion medica</label>
                                <select class="form-control" id="conclusionMedica" name="conclusionMedica">
                                    <option value="A1"
                                    <?php if($cadenaConclusionMedica == 'A1')
                                    echo 'selected'; ?>
                                    >A1.-SALUD COMPATIBLE ALTURA GEOGRAFICA</option>
                                    <option value="A2"
                                    <?php if($cadenaConclusionMedica == 'A2')
                                    echo 'selected'; ?>>A2.-SALUD NO COMPATIBLE EN ALTURA GEOGRAFICA</option>
                                    <option value="A3"
                                    <?php if($cadenaConclusionMedica == 'A3')
                                    echo 'selected'; ?>>A3.-SALUD COMPATIBLE</option>
                                    <option value="B"
                                    <?php if($cadenaConclusionMedica == 'B.')
                                    echo 'selected'; ?>
                                    >B.-SALUD NO COMPATIBLE TEMPORAL</option>
                                    <option value="C"
                                    <?php if($cadenaConclusionMedica == 'C.')
                                    echo 'selected'; ?>
                                    >C.-CONCLUSION PENDIENTE</option>
                                    <option value="D"
                                    <?php if($cadenaConclusionMedica == 'D.')
                                    echo 'selected'; ?>>D.-NO ASISTE A CONTROL.</option>
                                    <option value="E"
                                    <?php if($cadenaConclusionMedica == 'E.')
                                    echo 'selected'; ?>>E.-SALUD NO COMPATIBLE PERMANENTE.</option>
                                </select>
                            </div>
                            




    </div>

                    <input type="text" name="consulta" id="consulta" value="ingresarConclusionMedica" hidden>
                    <input type="text" name="select" id="select" value="selectConclusionMedica" hidden>
                        <div class="row justify-content-center mt-5">
                            <div class="col-4">
                                    <input type="button" 
                                    name="siguiente" 
                                    id="siguiente" 
                                    class="form-control btn btn-primary" 
                                    value="GUARDAR"
                                    onclick="validarConclusionMedica()">
                            </div>

                            <div class="col-4">
                                    <select class="form-control" onchange="obtenerParametrosConclusionMedica()" name="fechaHora" id="fechaHora">
                                
                                        <?php include 'selectDatosAnteriores.php'; ?>
                                    
                                    </select>
                            </div>
                        </div>

                        
</form>