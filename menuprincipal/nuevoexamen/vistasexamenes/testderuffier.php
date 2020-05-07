<?php 

session_start();
include '../../../global/conexion.php';
$idExamen = '12';
$idEvaluacion = $_SESSION["idEvaluacion"];

$sql = "SELECT evaluacion_parametro.VALOR_PARAMETRO, evaluacion_parametro.ID_PARAMETRO 
FROM EVALUACION_PARAMETRO 
INNER JOIN PARAMETRO 
ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO 
INNER JOIN EXAMEN 
ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN
WHERE ID_EVALUACION = '$idEvaluacion'";

$P1 = 0;
$P2 = 0;
$P3 = 0;
$valor = 0;
$texto = '';

$estado = 'Sin evaluar';
$observaciones = '';

$resultado = mysqli_query($conexion,$sql);


while($row = mysqli_fetch_assoc($resultado)){
    
    $idParametro = $row['ID_PARAMETRO'];
    
    switch($idParametro){

        case '43':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $P1 = $valorParametro;
        break;   
            
        case '44':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $P2 = $valorParametro;
        break;

        case '45':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $P3 = $valorParametro;
        break;
        
        case '47':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case '48':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;
    }
   
}



$valor = ($P1 + $P2 + $P3-200)/10; 

if(!is_numeric($valor)){
    $texto = 'INVÁLIDO';
}

if($P1 == '' || $P2 == '' || $P3 ==''){
    $texto = 'INVÁLIDO';
}

if($valor <= 0){
    $texto = 'EXCELENTE';
}else if($valor >= 0.1 && $valor <= 5){
    $texto = 'BUENO';
}else if($valor >= 5.1 && $valor <= 10){
    $texto = 'MEDIO';
}else if($valor >= 10.1 && $valor <= 15){
    $texto = 'INSUFICIENTE';
}else if($valor >= 15.1){
    $texto = 'MALO';
}

?>
<div class="container" >

<div class="row justify-content-center my-5">
    <div class="col-6">
        <h1 class="text-center">TEST DE RUFFIER</h1>
    </div>
</div>



<form action="" method="POST" class="" id="formIngresarTestDeRuffier" name="formIngresarTestDeRuffier">


    <?php //include 'estado.php' ?>

    <div class="row justify-content-center mb-3">
        <div class="col-5" style="margin-top:5px;">
            Previo al inicio del ejercicio (P1)
        </div>

        <div class="col-4">
            <input type="text" class="form-control" name="P1" id="P1" maxlength="3"
            onkeyup="obtenerValorTestDeRuffier()" 
            onchange="obtenerValorTestDeRuffier()"
            onload="obtenerValorTestDeRuffier()"
            value="<?= $P1 ?>">
        </div>


    </div>



    <div class="row justify-content-center mb-3">
        <div class="col-5" style="margin-top:5px;">
            Al momento de terminar el ejercicio (P2)
        </div>

        <div class="col-4">
            <input type="text" class="form-control" name="P2" id="P2" maxlength="3"
            onkeyup="obtenerValorTestDeRuffier()" 
            onchange="obtenerValorTestDeRuffier()"
            onload="obtenerValorTestDeRuffier()"
            value="<?= $P3 ?>"
            >
        </div>

    </div>



    <div class="row justify-content-center mb-3">
        <div class="col-5" style="margin-top:5px;">
            Al minuto de recuperación (P3)
        </div>

        <div class="col-4">
            <input type="text" class="form-control" name="P3" id="P3" maxlength="3"
            onkeyup="obtenerValorTestDeRuffier()" 
            onchange="obtenerValorTestDeRuffier()"
            onload="obtenerValorTestDeRuffier()"
            value="<?= $P3 ?>"
            >
        </div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-3" style="margin-top:5px;">
            Valoración
        </div>

        <div class="col-3">
            <input type="text" class="form-control" name="valoracion" id="valoracion" maxlength="2" value="<?=$valor?>" disabled>
        </div>

        <div class="col-3">
            <input type="text" class="form-control" name="valoracionTexto" id="valoracionTexto" maxlength="" value="<?=$texto?>" disabled>
        </div>
    </div>


    <?php include 'observaciones.php'; ?>

    <!-- <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-12">
                    <div class="form-group">
                      <label for="observaciones">OBSERVACIONES</label>
                      <textarea class="form-control" name="observaciones" id="observaciones" rows="8">Sin observaciones</textarea>
                    </div>
                </div>
        </div> 
 -->

    

    
    <input type="text" name="consulta" id="consulta" value="ingresarTestDeRuffier" hidden>
    <input type="text" name="select" id="select" value="selectTestDeRuffier" hidden>
    

    <div class="row justify-content-center mb-3">

        <!-- <div class="col-4">
            <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarPerfilLipidico()" id="btnMostrarTestDeRuffier" name="btnMostrarTestDeRuffier>
        </div> -->

        <div class="col-4">
            <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarTestDeRuffier()" id="btnGuardarTestDeRuffier" name="btnGuardarTestDeRuffier">
        </div>

        <div class="col-4">
                <select class="form-control" onchange="obtenerParametrosTestDeRuffier()" name="fechaHora" id="fechaHora">
               <?php include 'selectDatosAnteriores.php' ?>
                </select>
        </div>
        

    </div>

</form>

</div>