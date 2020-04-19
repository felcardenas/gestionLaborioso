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

$resultado = mysqli_query($conexion,$sql);
$i = 0;

while($row = mysqli_fetch_assoc($resultado)){
    
    $idParametro = $row['ID_PARAMETRO'];
    
    switch($idParametro){
        case '24':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor = $valorParametro;
        break;   

        case '26':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case'27':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;
    }
   
}
?>
<div class="container" >

<div class="row justify-content-center my-5">
    <div class="col-6">
        <h1 class="text-center">CREATININA</h1>
    </div>
</div>



<form action="" method="POST" class="" id="formIngresarCreatinina" name="formIngresarCreatinina">


    <?php include 'estado.php' ?>


    <div class="row justify-content-center mb-3">
        <div class="col-1 mt-2">
            Valor
        </div>
        <div class="col-3">
           <input class="form-control" type="text" id="valor" name="valor" value="<?=$valor?>">
           
        </div>
        <div class="col-1">mg/dl</div>
    </div>

    <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-12">
                    <div class="form-group">
                      <label for="observaciones">OBSERVACIONES</label>
                      <textarea class="form-control" name="observaciones" id="observaciones" rows="8"><?=$observaciones?></textarea>
                    </div>
                </div>
        </div> 


    

    
    <input type="text" name="consulta" id="consulta" value="actualizarCreatinina" hidden>
    <!-- <input type="text" name="select" id="select" value="ActualizarActualizarElectrocardiograma" hidden> -->
    

    <div class="row justify-content-center mb-3">

        <!-- <div class="col-4">
            <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarPerfilLipidico()" id="btnMostrarTestDeRuffier" name="btnMostrarTestDeRuffier>
        </div> -->

        <div class="col-4">
            <input class="btn btn-primary btn-lg btn-block" type="button" value="actualizar" onclick="guardarCreatinina()" id="btnActualizarCreatinina" name="btnActualizarCreatinina">
        </div>

    </div>

</form>

</div>