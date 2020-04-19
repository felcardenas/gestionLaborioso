<?php include '../plantillas/header.php';
include '../../global/conexion.php';
session_start();

$_SESSION['fechaExamen'] = $_POST['fechaExamen'];
$_SESSION['horaExamen'] = $_POST['horaExamen'];
$_SESSION['idEvaluacion'] = $_POST['idEvaluacion'];
$idEvaluacion = $_SESSION['idEvaluacion'];

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


$sql = "SELECT PESO, ALTURA, PRESION_DIASTOLICA, PRESION_SISTOLICA, PULSO,IMC FROM EVALUACION WHERE ID_EVALUACION = '$idEvaluacion'";

$resultado = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($resultado);

$pulso = $row['PULSO'];
$tensionDiastolica = $row['PRESION_DIASTOLICA'];
$tensionSistolica = $row['PRESION_SISTOLICA'];
$peso = $row['PESO'];
$altura = $row['ALTURA'];
$imc = $row['IMC'];

//echo $idEvaluacion;
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
        <div class="col-4"><?php include 'datostrabajador.php'?></div>
        <div class="col-8">

            <div class="row py-3 fondo justify-content-center">
        
                <div class="col-2"><?= "PULSO: "?></div>
                <div class="col-2"><?= "TENSIÓN DIASTÓLICA: " ?></div>
                <div class="col-2"><?= "TENSIÓN SISTÓLICA: "?></div>        
                <div class="col-2"><?= "PESO: "?></div>
                <div class="col-2"><?= "ALTURA: "?></div>
                <div class="col-2"><?= "IMC: "?></div>
            
            </div>

            <div class="row fondo justify-content-center">
                <div class="col-2"><?= $pulso." X'"?></div>
                <div class="col-2"><?= $tensionDiastolica ." mm/HG" ?></div>
                <div class="col-2"><?= $tensionSistolica." mm/HG" ?></div>        
                <div class="col-2"><?= $peso . " kg" ?></div>
                <div class="col-2"><?= $altura." cm" ?></div>
                <div class="col-2"><?= $imc." %"?></div>
            </div>

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
            <button onclick="mostrarInformes()" class="btn btn-primary" style="font-size:20px;" id="btnInformes">Informes</button>
            <br>

        </div>
        
        <div class="col-9">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="container-fluid" id="contenido"></div>
                </div>
                <div class="col-12">
                    <div class="container-fluid sticky-top" id="contenido2"></div>
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