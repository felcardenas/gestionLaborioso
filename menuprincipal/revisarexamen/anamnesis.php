<?php
session_start();
include '../../global/conexion.php';

$idEvaluacion = $_SESSION["idEvaluacion"];

//VARIABLES QUE VAN A SELECTDATOSANTERIORES
$tabla = "anamnesis_evaluacion";
$campoId = "ID_ANAMNESIS";  

//$sql = "SELECT ANAMNESIS FROM EVALUACION WHERE ID_EVALUACION = '$idEvaluacion'";

$sql=  "SELECT ID_ANAMNESIS, TEXTO_ANAMNESIS FROM `anamnesis_evaluacion` WHERE ID_EVALUACION = '$idEvaluacion'
ORDER BY `anamnesis_evaluacion`.`FECHA` DESC, `anamnesis_evaluacion`.`HORA` DESC, `anamnesis_evaluacion`.`ID_ANAMNESIS` ASC LIMIT 1";

$anamnesis = '';

$resultado = mysqli_query($conexion, $sql); 
    
if($row = mysqli_fetch_assoc($resultado)){
    $anamnesis = $row['TEXTO_ANAMNESIS'];
}

?>


<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Anamnesis</div></h1>
              
</div>


<form action="" method="post" class="form-group" id="formIngresarAnamnesis" name="formIngresarAnamnesis">
    
    <!-- SELECCIONE EMPRESA -->
    <div class="row justify-content-center">

                            <div class="col-8">
                                <label for=""></label>
                                <textarea class="form-control" id="anamnesis" name="anamnesis" rows="15" maxlength="500" onchange="desbloquearBoton()" onkeyup="desbloquearBoton()"><?= $anamnesis?></textarea>
                            </div>
    </div>

                    <input type="text" name="consulta" id="consulta" value="ingresarAnamnesis" hidden>
                    <input type="text" name="select" id="select" value="selectAnamnesis" hidden>

                        <div class="row justify-content-center mt-5">
                            <div class="col-4">
                                    <input type="button" 
                                    name="btnGuardarAnamnesis" 
                                    id="btnGuardarAnamnesis" 
                                    class="form-control btn btn-primary" 
                                    value="GUARDAR"
                                    onclick="validarAnamnesis()" 
                                    maxlength="1000"
                                   >
                            </div>

                            <div class="col-4">
                                    <select class="form-control" onchange="obtenerParametrosAnamnesis()" name="fechaHora" id="fechaHora">
                                
                                        <?php include 'selectDatosAnteriores.php'; ?>
                                    
                                    </select>
                            </div>

                        </div>


                        



      


                        
</form>