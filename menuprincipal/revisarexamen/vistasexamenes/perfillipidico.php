<?php
session_start();
include '../../../global/conexion.php';
$idExamen = '7';
$idEvaluacion = $_SESSION["idEvaluacion"];

$sql = "SELECT evaluacion_parametro.VALOR_PARAMETRO, evaluacion_parametro.ID_PARAMETRO 
FROM EVALUACION_PARAMETRO 
INNER JOIN PARAMETRO 
ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO 
INNER JOIN EXAMEN 
ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN
WHERE ID_EVALUACION = '$idEvaluacion'";

$valor = '';
$colesterolTotal ='';
$colesterolHDL='';
$colesterolLDL='';
$colesterolVLDL='';
$indiceCol='';
$trigliceridos='';


$estado = 'Sin evaluar';
$observaciones = 'Sin observaciones';

$resultado = mysqli_query($conexion,$sql);




while($row = mysqli_fetch_assoc($resultado)){
    
    $idParametro = $row['ID_PARAMETRO'];
    
    switch($idParametro){

        case '28':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $colesterolTotal= $valorParametro;
        break;   

        case '29':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $colesterolHDL= $valorParametro;
        break;   

        case '30':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $colesterolLDL = $valorParametro;
        break;   

        case '31':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $colesterolVLDL = $valorParametro;
        break;

        case '32':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $indiceCol= $valorParametro;
        break;   

        case '33':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $trigliceridos = $valorParametro;
        break;   

        case '34':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   

        case '35':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;

        
            
        
    }
   
}


?>

<div class="container" >

    <div class="row justify-content-center my-5">
        <div class="col-6">
            <h1 class="text-center">PERFIL LIPIDICO</h1>
        </div>
    </div>



    <form action="" method="POST" class="" id="formIngresarPerfilLipidico" name="formIngresarPerfilLipidico">

    
        <?php include 'estado.php' ?>

        

        <div class="row justify-content-center mb-3">
            <div class="col-2" style="margin-top:5px;">
                Colesterol total
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="colesterolTotal" id="colesterolTotal" maxlength="5" value="<?=$colesterolTotal?>">
            </div>

            <div class="col-2" style="margin-top:5px;">
                mg/dl
            </div>

        </div>



        <div class="row justify-content-center mb-3">
            <div class="col-2" style="margin-top:5px;">
                Colesterol HDL
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="colesterolHDL" id="colesterolHDL" maxlength="5" value="<?=$colesterolHDL?>">
            </div>

            <div class="col-2" style="margin-top:5px;">
                mg/dl
            </div>

        </div>



        <div class="row justify-content-center mb-3">
            <div class="col-2" style="margin-top:5px;">
                Colesterol LDL
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="colesterolLDL" id="colesterolLDL" maxlength="5" value="<?=$colesterolLDL?>">
            </div>

            <div class="col-2" style="margin-top:5px;">
                mg/dl
            </div>

        </div>



        <div class="row justify-content-center mb-3">
            <div class="col-2" style="margin-top:5px;">
                Colesterol VLDL
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="colesterolVLDL" id="colesterolVLDL" maxlength="5" value="<?=$colesterolVLDL?>">
            </div>

            <div class="col-2" style="margin-top:5px;">
                mg/dl
            </div>

        </div>




        <div class="row justify-content-center mb-3">
            <div class="col-2" style="margin-top:5px;">
                Índice col T/col HDL
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="indiceCol" id="indiceCol" maxlength="5" value="<?=$indiceCol?>">
            </div>

            <div class="col-2" style="margin-top:5px;">
                mg/dl
            </div>

        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-2" style="margin-top:5px;">
                Triglicéridos
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="trigliceridos" id="trigliceridos" maxlength="5" value="<?=$trigliceridos?>">
            </div>

            <div class="col-2" style="margin-top:5px;">
                mg/dl
            </div>

        </div>

        <?php include 'observaciones.php' ?>

        
        <input type="text" name="consulta" id="consulta" value="ingresarPerfilLipidico" hidden>
        <input type="text" name="select" id="select" value="selectPerfilLipidico" hidden>
        

        <div class="row justify-content-center mb-3">

           <!--  <div class="col-4">
                <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarPerfilLipidico()" id="btnMostrarPerfilLipidico">
            </div> -->

            <div class="col-4">
                <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarPerfilLipidico()" id="btnGuardarPerfilLipidico">
            </div>

            <div class="col-4">
                <select class="form-control" onchange="obtenerParametrosPerfilLipidico()" name="fechaHora" id="fechaHora">
               <?php include 'selectDatosAnteriores.php' ?>
                </select>
            </div>


        </div>

    </form>

</div>