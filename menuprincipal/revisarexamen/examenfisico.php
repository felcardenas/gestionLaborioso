<?php
session_start();
include '../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];

$tabla = "examen_fisico_evaluacion";
$campoId = "ID_EXAMEN_FISICO";  

/* $sql = "SELECT EXAMEN_FISICO_GENERAL, CABEZA, TORAX, ABDOMEN, EXTREMIDADES_SUPERIORES, EXTREMIDADES_INFERIORES, COLUMNA_GENERAL FROM EVALUACION WHERE ID_EVALUACION = '$idEvaluacion'"; */

$sql = "SELECT ID_EXAMEN_FISICO, VALOR_EXAMEN_FISICO FROM `examen_fisico_evaluacion` WHERE ID_EVALUACION = '$idEvaluacion' ORDER BY `FECHA` DESC, `HORA` DESC, `ID_EXAMEN_FISICO` ASC LIMIT 7";

$examenFisicoGeneral = '';
$cabeza = '';
$torax ='';
$abdomen = '';
$extremidadesSuperiores = '';
$extremidadesInferiores = '';
$columnaGeneral = '';


if($resultado = mysqli_query($conexion,$sql)){;
    while($row = mysqli_fetch_assoc($resultado)){
       $idSignoVital = $row['ID_EXAMEN_FISICO'];
       
       switch($idSignoVital){
            case '1':
                $examenFisicoGeneral = utf8_encode($row['VALOR_EXAMEN_FISICO']); 
                
            break;

            case '2': 
                $cabeza = utf8_encode($row['VALOR_EXAMEN_FISICO']);
            break;

            case '3':
                $torax = utf8_encode($row['VALOR_EXAMEN_FISICO']);
            break;

            case '4': 
                $abdomen = utf8_encode($row['VALOR_EXAMEN_FISICO']);
            break;

            case '5':
                $extremidadesSuperiores = utf8_encode($row['VALOR_EXAMEN_FISICO']);
            break;

            case '6': 
                $extremidadesInferiores = utf8_encode($row['VALOR_EXAMEN_FISICO']);
            break;

            case '7': 
                $columnaGeneral = utf8_encode($row['VALOR_EXAMEN_FISICO']);
            break;
       }
       
    }
}


/* $resultado = mysqli_query($conexion, $sql); 
    
if($row = mysqli_fetch_assoc($resultado)){
    
    $examenFisicoGeneral = utf8_encode($row['EXAMEN_FISICO_GENERAL']);
    $cabeza = utf8_encode($row['CABEZA']);
    $torax = utf8_encode($row['TzORAX']);
    $abdomen = utf8_encode($row['ABDOMEN']);
    $extremidadesSuperiores = utf8_encode($row['EXTREMIDADES_SUPERIORES']);
    $extremidadesInferiores = utf8_encode($row['EXTREMIDADES_INFERIORES']);
    $columnaGeneral = utf8_encode($row['COLUMNA_GENERAL']);
} */

?>

<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Exámen físico</div></h1>
              
</div>


<form action="" method="post" class="form-group" id="formIngresarExamenFisico" name="formIngresarExamenFisico">
    
    <!-- SELECCIONE EMPRESA -->
    <div class="row justify-content-center">

                            <div class="col-8">
                                <label for="">Exámen físico general</label>
                                <textarea class="form-control" id="examenFisicoGeneral" name="examenFisicoGeneral" rows="3" maxlength="200"><?=$examenFisicoGeneral?></textarea>
                            </div>

                            <div class="col-8 mt-2">
                                <label for="">Cabeza</label>
                                <textarea class="form-control" id="cabeza" name="cabeza" rows="1" maxlength="100"><?=$cabeza?></textarea>
                            </div>

                            <div class="col-8 mt-2">
                                <label for="">Torax</label>
                                <textarea class="form-control" id="torax" name="torax" rows="1" maxlength="100"><?=$torax?></textarea>
                            </div>

                            <div class="col-8 mt-2">
                                <label for="">Abdómen</label>
                                <textarea class="form-control" id="abdomen" name="abdomen" rows="1" maxlength="100"><?=$abdomen?></textarea>
                            </div>

                            <div class="col-8 mt-2">
                                <label for="">Extremidades superiores</label>
                                <textarea class="form-control" id="extremidadesSuperiores" name="extremidadesSuperiores" rows="1" maxlength="100"><?=$extremidadesSuperiores?></textarea>
                            </div>

                            <div class="col-8 mt-2">
                                <label for="">Extremidades inferiores</label>
                                <textarea class="form-control" id="extremidadesInferiores" name="extremidadesInferiores" rows="1" maxlength="100"><?=$extremidadesInferiores?></textarea>
                            </div>


                            <div class="col-8 mt-2">
                                <label for="">Columna general</label>
                                <textarea class="form-control" id="columnaGeneral" name="columnaGeneral" rows="1" maxlength="100"><?=$columnaGeneral?></textarea>
                            </div>

    </div>

                    
                    

                    <input type="text" name="consulta" id="consulta" value="ingresarExamenFisico" hidden>
                    <input type="text" name="select" id="select" value="selectExamenFisico" hidden>

                        <div class="row justify-content-center mt-5">
                            <div class="col-4">
                                    <input type="button" 
                                    name="siguiente" 
                                    id="siguiente" 
                                    class="form-control btn btn-primary" 
                                    value="GUARDAR"
                                    onclick="validarExamenFisico()">
                            </div>

                            <div class="col-4">
                                    <select class="form-control" onchange="obtenerParametrosExamenFisico()" name="fechaHora" id="fechaHora">
                                
                                        <?php include 'selectDatosAnteriores.php'; ?>
                                    
                                    </select>
                            </div>
                        </div>

                        
</form>