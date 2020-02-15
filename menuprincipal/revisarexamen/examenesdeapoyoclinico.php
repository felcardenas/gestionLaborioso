<?php 
session_start();
include '../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];

$sql= "SELECT examen.NOMBRE_EXAMEN FROM EXAMEN INNER JOIN EVALUACION_EXAMEN ON EXAMEN.ID_EXAMEN = evaluacion_examen.ID_EXAMEN INNER JOIN evaluacion ON evaluacion.ID_EVALUACION = evaluacion_examen.ID_EVALUACION WHERE EVALUACION.ID_EVALUACION = '$idEvaluacion'";

$resultado = mysqli_query($conexion,$sql);

?>


<div class="container-fluid">

    <div class="row py-5">
        <div class="col-12">
            <h1 class="text-center titulo text-uppercase">Exámenes de apoyo clínico</h1>
        </div>
    </div>

    <div class="row separacion"></div>

    <div class="row justify-content-center fondo">
        <!-- <div class="col-3"></div> -->
        <div class="col-12 text-center">
           
        </div>
    </div>

    <div class="row separacion"></div>




    <div class="row justify-content-center">
        <div class="col-12 fondo py-2">

            <?php 
            while($row = mysqli_fetch_assoc($resultado)){
                ?>
                <button onclick="" class="btn btn-primary" style="font-size:20px; border:1px solid;" id="btnAnamnesis"><?=$row['NOMBRE_EXAMEN']?></button>
            <?php 
            }
            ?>
            

        </div>
        <div class="col-12">
            <div class="row justify-content-center sticky-top">
                <div class="col-12">
                    <div class="container-fluid" id="contenidoExamenesDeApoyoClinico"></div>
                </div>
            </div>
        </div>

    </div>

</div>