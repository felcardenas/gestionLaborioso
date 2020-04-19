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

if ($resultado = mysqli_query($conexion, $sql)) {
    $i = 0;

    while ($row = mysqli_fetch_assoc($resultado)) {

        $idParametro = $row['ID_PARAMETRO'];

        switch ($idParametro) {
            case '83':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $observaciones = $valorParametro;
                break;

            case '84':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $estado = $valorParametro;
                break;
        }
    }
}

?>



<div class="container">

    <div class="row justify-content-center my-5">
        <div class="col-6">
            <h1 class="text-center">ACTIVIDAD DE ACETILCOLINESTERASA</h1>
        </div>
    </div>



    <form action="" method="POST" class="" id="formIngresarActividadDeAcetilcolinesterasa" name="formIngresarActividadDeAcetilcolinesterasa">


        <?php include 'estado.php' ?>



        <div class="row justify-content-center mb-3" style="margin-top:5px;">
            <div class="col-12">
                <div class="form-group">
                    <label for="observaciones">OBSERVACIONES</label>
                    <textarea class="form-control" name="observaciones" id="observaciones" rows="8"><?= $observaciones ?></textarea>
                </div>
            </div>
        </div>





        <input type="text" name="consulta" id="consulta" value="actualizarActividadDeAcetilcolinesterasa" hidden>
        <!-- <input type="text" name="select" id="select" value="ingresarIngresarElectrocardiograma" hidden> -->


        <div class="row justify-content-center mb-3">

            <!-- <div class="col-4">
            <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarPerfilLipidico()" id="btnMostrarTestDeRuffier" name="btnMostrarTestDeRuffier>
        </div> -->

            <div class="col-4">
                <input class="btn btn-primary btn-lg btn-block" type="button" value="Actualizar" onclick="guardarActividadDeAcetilcolinesterasa()" id="btnactualizarActividadDeAcetilcolinesterasa" name="btnactualizarActividadDeAcetilcolinesterasa">
            </div>

        </div>

    </form>

</div>