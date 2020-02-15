<?php include '../plantillas/header.php';
session_start();

$_SESSION['fechaExamen'] = $_POST['fechaExamen'];
$_SESSION['horaExamen'] = $_POST['horaExamen'];
$_SESSION['idEvaluacion'] = $_POST['idEvaluacion'];

$_SESSION['anamnesis'] = '';
$_SESSION['examenFisico'] = '';
$_SESSION['cabeza'] = '';
$_SESSION['torax'] = '';
$_SESSION['abdomen'] = '';
$_SESSION['extremidadesSuperiores'] = '';
$_SESSION['extremidadesInferiores'] = '';
$_SESSION['columnaGeneral'] = '';
$_SESSION['conclusionMedica'] = '';
$_SESSION['recomendaciones'] = '';

?>


<div class="container-fluid">

    <div class="row fondo py-5">
        <div class="col-12">
            <h1 class="text-center titulo text-uppercase">EXAMEN DE <?= utf8_encode($_SESSION['nombreCompletoTrabajador']) ?></h1>
        </div>
    </div>

    <div class="row separacion"></div>

    <div class="row justify-content-center fondo">
        <!-- <div class="col-3"></div> -->
        <div class="col-12 text-center">
            <?php include 'datostrabajador.php' ?>
        </div>
    </div>

    <div class="row separacion"></div>




    <div class="row justify-content-center">
        <div class="col-3 fondo">

            <button onclick="mostrarAnamnesis()" class="btn btn-primary" style="font-size:20px;" id="btnAnamnesis">Anamnesis</button>
            <br>
            <button onclick="mostrarExamenFisico()" class="btn btn-primary" style="font-size:20px;" id="btnExamenFisico">Examen Físico</button>
            <br>
            <button onclick="mostrarExamenesDeApoyoClinico()" class="btn btn-primary" style="font-size:20px;" id="btnExamenesDeApoyoClinico">Exámenes de apoyo clínico</button>
            <br>
            <button onclick="mostrarConclusionMedica()" class="btn btn-primary" style="font-size:20px;" id="btnConclusionMedica">Conclusión médica</button>
            <br>
            <button onclick="mostrarInterconsulta()" class="btn btn-primary" style="font-size:20px;" id="btnInterconsulta">Interconsulta</button>
            <br>
            <button onclick="mostrarRecomendaciones()" class="btn btn-primary" style="font-size:20px;" id="btnRecomendaciones">Recomendaciones</button>
            <br>

        </div>
        <div class="col-9">
            <div class="row justify-content-center sticky-top">
                <div class="col-12">
                    <div class="container-fluid sticky-top" id="contenido"></div>
                </div>
            </div>
        </div>

    </div>

    <div class="row py-3">
    <div class="col-3"><button class="btn btn-primary btn-block" style="font-size:22px" onclick="volverAInicio()">VOLVER AL INICIO</button></div>
    <div class="col-9">
        <button class="btn btn-primary btn-block" style="font-size:22px" onclick="finalizarExamen()">FINALIZAR EXÁMEN</button>
    </div>
    

    <div class="row py-3">
    <div class="col-3"></div>
    <div class="col-9">
        
    </div>
    
</div>

</div>


<?php include '../plantillas/footer.php' ?>