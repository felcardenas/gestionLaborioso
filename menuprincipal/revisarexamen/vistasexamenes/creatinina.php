<?php 
session_start();
include '../../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];
$idExamen = '6';

$sql = "SELECT evaluacion_parametro.VALOR_PARAMETRO, evaluacion_parametro.ID_PARAMETRO 
FROM EVALUACION_PARAMETRO 
INNER JOIN PARAMETRO 
ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO 
INNER JOIN EXAMEN 
ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN
WHERE ID_EVALUACION = '$idEvaluacion'";

$valor = '';
$estado = 'Sin evaluar';
$observaciones = '';


$resultado = mysqli_query($conexion,$sql);

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

    <?php 
      include 'observaciones.php';
    ?>


    

    
    <input type="text" name="consulta" id="consulta" value="ingresarCreatinina" hidden>
    <input type="text" name="select" id="select" value="selectCreatinina" hidden>
    

    <div class="row justify-content-center mb-3">

        <!-- <div class="col-4">
            <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarPerfilLipidico()" id="btnMostrarTestDeRuffier" name="btnMostrarTestDeRuffier>
        </div> -->

        <div class="col-4">
            <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarCreatinina()" id="btnGuardarCreatinina" name="btnGuardarCreatinina">
        </div>

        <div class="col-4">
                <select class="form-control" onchange="obtenerParametrosCreatinina()" name="fechaHora" id="fechaHora">
               <?php include 'selectDatosAnteriores.php' ?>
                </select>
        </div>

    </div>

</form>

</div>