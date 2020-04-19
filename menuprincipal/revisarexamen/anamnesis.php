<?php
session_start();
include '../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];

$sql = "SELECT ANAMNESIS FROM EVALUACION WHERE ID_EVALUACION = '$idEvaluacion'";

$anamnesis = '';

$resultado = mysqli_query($conexion, $sql); 
    
if($row = mysqli_fetch_assoc($resultado)){
    $anamnesis = $row['ANAMNESIS'];
}

?>


<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Anamnesis</div></h1>
              
</div>


<form action="" method="post" class="form-group" id="formAnamnesis" name="formAnamnesis">
    
    <!-- SELECCIONE EMPRESA -->
    <div class="row justify-content-center">

                            <div class="col-8">
                                <label for=""></label>
                                <textarea class="form-control" id="anamnesis" name="anamnesis" rows="15" maxlength="500" onchange="desbloquearBoton()" onkeyup="desbloquearBoton()"><?= $anamnesis?></textarea>
                            </div>
    </div>

                    <input type="text" name="consulta" id="consulta" value="ingresarAnamnesis" hidden>
                        <div class="row justify-content-center mt-5">
                            <div class="col-8">
                                    <input type="button" 
                                    name="btnGuardarAnamnesis" 
                                    id="btnGuardarAnamnesis" 
                                    class="form-control btn btn-primary" 
                                    value="GUARDAR"
                                    onclick="validarAnamnesis()" 
                                   >
                            </div>
                        </div>

                        
</form>