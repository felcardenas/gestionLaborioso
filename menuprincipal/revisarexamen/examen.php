<?php include '../plantillas/header.php';
include '../../global/conexion.php';
session_start();


/* $_SESSION['fechaExamen'] = $_POST['fechaExamen'];
$_SESSION['horaExamen'] = $_POST['horaExamen'];
$_SESSION['idEvaluacion'] = $_POST['idEvaluacion']; */
$fechaExamen = $_SESSION['fechaExamen'];
$horaExamen = $_SESSION['horaExamen']; 


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

$_SESSION['fecha'] = '';
$_SESSION['hora']= '';

$pulso = '';
$tensionDiastolica = '';
$tensionSistolica ='';
$peso = '';
$altura = '';
$imc = '';



/* $sql = "SELECT PESO, ALTURA, PRESION_DIASTOLICA, PRESION_SISTOLICA, PULSO,IMC FROM EVALUACION WHERE ID_EVALUACION = '$idEvaluacion'"; */

$sql = "SELECT ID_SIGNO_VITAL, VALOR_SIGNO_VITAL FROM SIGNOS_VITALES_EVALUACION WHERE ID_EVALUACION = '$idEvaluacion'   
ORDER BY `SIGNOS_VITALES_EVALUACION`.`FECHA` DESC, `SIGNOS_VITALES_EVALUACION`.`HORA` DESC, `SIGNOS_VITALES_EVALUACION`.`ID_SIGNO_VITAL` ASC LIMIT 6";




if($resultado = mysqli_query($conexion,$sql)){;
    while($row = mysqli_fetch_assoc($resultado)){
       $idSignoVital = $row['ID_SIGNO_VITAL'];
       
       switch($idSignoVital){
            case '1':
                $_SESSION['PULSO'] = $row['VALOR_SIGNO_VITAL']; 
                $pulso = $_SESSION['PULSO'];
            break;

            case '2': 
                $_SESSION['TENSION_DIASTOLICA'] = $row['VALOR_SIGNO_VITAL']; 
                $tensionDiastolica = $_SESSION['TENSION_DIASTOLICA'];
            break;

            case '3':
                $_SESSION['TENSION_SISTOLICA'] = $row['VALOR_SIGNO_VITAL']; 
                $tensionSistolica = $_SESSION['TENSION_SISTOLICA'];
            break;

            case '4': 
                $_SESSION['PESO'] = $row['VALOR_SIGNO_VITAL']; 

                $peso = $_SESSION['PESO'];
            break;

            case '5':
                $_SESSION['ALTURA'] = $row['VALOR_SIGNO_VITAL']; 

                $altura = $_SESSION['ALTURA'];
            break;

            case '6': 
                $_SESSION['IMC'] = $row['VALOR_SIGNO_VITAL']; 

                $imc = round($_SESSION['IMC'],1);
            break;
       }
       
    }
}

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
                <div class="col-2"><?= "TENSIÓN SISTÓLICA: " ?></div>
                <div class="col-2"><?= "TENSIÓN DIASTÓLICA: "?></div>        
                <div class="col-2"><?= "PESO: "?></div>
                <div class="col-2"><?= "ALTURA: "?></div>
                <div class="col-2"><?= "IMC: "?></div>
            
            </div>

            <div class="row fondo justify-content-center">
                <div class="col-2"><?= $pulso." X'"?></div>
                <div class="col-2"><?= $tensionSistolica ." mm/HG" ?></div>
                <div class="col-2"><?= $tensionDiastolica." mm/HG" ?></div>        
                <div class="col-2"><?= $peso . " kg" ?></div>
                <div class="col-2"><?= $altura." cm" ?></div>
                <div class="col-2"><?= $imc." %"?></div>
            </div>

        </div>
    </div>

    <div class="row separacion"></div>




    <div class="row justify-content-center">
        <div class="col-3 fondo">

            <?php if($_SESSION['tipoUsuario'] != 'Estándar'){?> 
            <button onclick="mostrarAnamnesis()" class="btn btn-primary" style="font-size:20px;" id="btnAnamnesis">Anamnesis</button>
            <br>
            <?php } ?>

            
            
            <?php if($_SESSION['tipoUsuario'] != 'Estándar'){?> 
            <button onclick="mostrarExamenFisico()" class="btn btn-primary" style="font-size:20px;" id="btnExamenFisico">Examen Físico</button>
            <br>
            <?php } ?>

            <button onclick="mostrarExamenesDeApoyoClinico()" class="btn btn-primary" style="font-size:20px;" id="btnExamenesDeApoyoClinico">Exámenes de apoyo clínico</button>
            <br>

            <?php if($_SESSION['tipoUsuario'] != 'Estándar'){?> 
            <button onclick="mostrarConclusionMedica()" class="btn btn-primary" style="font-size:20px;" id="btnConclusionMedica">Conclusión médica</button>
            <br>
            <?php } ?>

            
            
            <?php if($_SESSION['tipoUsuario'] != 'Estándar'){?> 
            <button onclick="mostrarInterconsulta()" class="btn btn-primary" style="font-size:20px;" id="btnInterconsulta">Interconsulta</button>
            <br>
            <?php } ?>

            
            
            <?php if($_SESSION['tipoUsuario'] != 'Estándar'){?>
            <button onclick="mostrarRecomendaciones()" class="btn btn-primary" style="font-size:20px;" id="btnRecomendaciones">Recomendaciones</button>
            <br>
            <?php } ?>

            

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