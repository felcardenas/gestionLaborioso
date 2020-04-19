<?php
session_start();
include '../../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];

$sql = "SELECT evaluacion_parametro.VALOR_PARAMETRO, evaluacion_parametro.ID_PARAMETRO 
FROM EVALUACION_PARAMETRO 
INNER JOIN PARAMETRO 
ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO 
INNER JOIN EXAMEN 
ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN
WHERE ID_EVALUACION = '$idEvaluacion'";


$valor = '';
$estado = 'Sin evaluar';
$observaciones = 'Sin observaciones';

$resultado = mysqli_query($conexion,$sql);


while($row = mysqli_fetch_assoc($resultado)){
    
    $idParametro = $row['ID_PARAMETRO'];
    
    switch($idParametro){
        case '40':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor= $valorParametro;
        break;   

        case '41':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   

        case '42':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;

        
            
        
    }


    if (!is_numeric($valor)) {
        $texto = "INVÁLIDO";
    } else if ($valor < 1 || $valor > 99) {
        $texto = 'INVÁLIDO';
    } else if ($valor >= 10) {
        $texto = "ALTO";
    } else if ($valor >= 5 && $valor <= 9) {
        $texto = "MODERADO";
    } else if ($valor < 5) {
        $texto = "BAJO";
    } else if (!$is_numeric($valor)) {
        $texto = "INVÁLIDO";
    } else if ($valor = "") {
        $texto = " ";
    }
   
}


?>

<div class="container" >

    <div class="row justify-content-center my-5">
        <div class="col-7">
            <h1 class="text-center">INDICE DE FRAMINGHAM</h1>
        </div>
    </div>

        <div class="container py-3 mb-5 borderedondeado">
            
        
        <?php //include 'estado.php' ?>
            <div class="row justify-content-center">
                <div class="col-4"><h3>Riesgo a 10 años</h3></div>
                
            </div>

            <div class="row justify-content-center">
                
                <div class="col-2">ALTO</div>
                <div class="col-2">>= 10%</div>
                
            </div>

            <div class="row justify-content-center">
                
                <div class="col-2">MODERADO</div>
                <div class="col-2">5-9%</div>
                
            </div>

            <div class="row justify-content-center">
                
                <div class="col-2">BAJO</div>
                <div class="col-2"><?='< 5%'?></div>
                
            </div>

        </div>

    <form action="" method="POST" class="" id="formIngresarIndiceDeFramingham" name="ingresarIndiceDeFramingham">

        <div class="row justify-content-center mb-3">
           
            <div class="col-2" style="margin-top:5px;">
               Valor
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="valorIndiceDeFramingham" id="valorIndiceDeFramingham" maxlength="2"
                onkeyup="riesgoADiezAnios()" 
                onchange="riesgoADiezAnios()"
                
                value="<?=$valor?>"
                >
            </div>

        </div>

        <div class="row justify-content-center mb-5">
           
            <div class="col-2" style="margin-top:5px;">
               Riesgo a 10 años
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="riesgoDiezAnios" id="riesgoDiezAnios" maxlength="" disabled value="<?=$texto?>">
            </div>

        </div>

        <?php include 'observaciones.php' ?>

        <!-- <div class="row justify-content-center mb-3">

            <div class="col-8">
                <label for="">Observaciones</label>
                <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="4" maxlength="315" ></textarea>
            </div>

        </div> -->

        
        <input type="text" name="consulta" id="consulta" value="ingresarIndiceDeFramingham" hidden>
        <input type="text" name="select" id="select" value="mostrarIndiceDeFramingham" hidden>
        

        <div class="row justify-content-center mb-3">

            <!-- <div class="col-4">
                <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarIndiceDeFramingham()" id="btnMostrarIndiceDeFramingham">
            </div> -->

            <div class="col-4">
                <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarIndiceDeFramingham()" id="btnGuardarIndiceDeFramingham">
            </div>

        </div>

    </form>

</div>