
<?php 

session_start();
include '../../../global/conexion.php';
$idExamen = '14';
$idEvaluacion = $_SESSION["idEvaluacion"];

$sql = "SELECT EVALUACION_PARAMETRO.VALOR_PARAMETRO, EVALUACION_PARAMETRO.ID_PARAMETRO 
FROM EVALUACION_PARAMETRO 
INNER JOIN PARAMETRO 
ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO 
INNER JOIN EXAMEN 
ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN
WHERE ID_EVALUACION = '$idEvaluacion'";

//$valor = '';
$estado = 'Sin evaluar';
$observaciones = '';

$resultado = mysqli_query($conexion,$sql);


while($row = mysqli_fetch_assoc($resultado)){
    
    $idParametro = $row['ID_PARAMETRO'];
    
    switch($idParametro){
        

       

        case '62':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case'63':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;
    }
   
}

?>



<div class="container" >

<div class="row justify-content-center my-5">
    <div class="col-6">
        <h1 class="text-center">CULTIVO NASAL</h1>
    </div>
</div>



<form action="" method="POST" class="" id="formIngresarCultivoNasal" name="formIngresarCultivoNasal">


    <?php include 'estado.php';
      include 'observaciones.php';
    ?>

    

    

    
    <input type="text" name="consulta" id="consulta" value="ingresarCultivoNasal" hidden>
    <input type="text" name="select" id="select" value="selectCultivoNasal" hidden>
    

    <div class="row justify-content-center mb-3">

        <!-- <div class="col-4">
            <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarPerfilLipidico()" id="btnMostrarTestDeRuffier" name="btnMostrarTestDeRuffier>
        </div> -->

        <div class="col-4">
            <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarCultivoNasal()" id="btnGuardarCultivoNasal" name="btnGuardarCultivoNasal">
        </div>

        <div class="col-4">
                <select class="form-control" onchange="obtenerParametrosCultivoNasal()" name="fechaHora" id="fechaHora">
               <?php include 'selectDatosAnteriores.php' ?>
                </select>
        </div>
    </div>

</form>

</div>