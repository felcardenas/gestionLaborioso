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


$estado = 'Sin evaluar';
$observaciones = 'Sin observaciones';

$resultado = mysqli_query($conexion,$sql);


while($row = mysqli_fetch_assoc($resultado)){
    
    $idParametro = $row['ID_PARAMETRO'];
    
    switch($idParametro){
        case '71':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case'72':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;
    }
   
}


?>


<div class="container" >

<div class="row justify-content-center my-5">
    <div class="col-6">
        <h1 class="text-center">ALT/SGPT</h1>
    </div>
</div>



<form action="" method="POST" class="" id="formIngresarAltSgpt" name="formIngresarAltSgpt">


<?php include 'estado.php';
      include 'observaciones.php';
    ?>

    

    
    <input type="text" name="consulta" id="consulta" value="ingresarAltSgpt" hidden>
    <!-- <input type="text" name="select" id="select" value="ingresarIngresarElectrocardiograma" hidden> -->
    

    <div class="row justify-content-center mb-3">

        <!-- <div class="col-4">
            <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarPerfilLipidico()" id="btnMostrarTestDeRuffier" name="btnMostrarTestDeRuffier>
        </div> -->

        <div class="col-4">
            <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarAltSgpt()" id="btnGuardarAltSgpt" name="btnGuardarAltSgpt">
        </div>

    </div>

</form>

</div>