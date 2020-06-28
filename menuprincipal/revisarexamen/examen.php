<?php include '../plantillas/header.php';
include '../../global/conexion.php';
session_start();
//echo $_SESSION['pendienteRevisionMedica'];
$estadoEvaluacion = $_SESSION['estadoEvaluacion'];

if($estadoEvaluacion == '2'){
    $_SESSION['mostrar'] = 'disabled';
}else{
    $_SESSION['mostrar'] = '';
}

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


$sql = "SELECT DISTINCT FECHA, HORA FROM SIGNOS_VITALES_EVALUACION WHERE ID_EVALUACION = '$idEvaluacion' ORDER BY `SIGNOS_VITALES_EVALUACION`.`FECHA` DESC, `SIGNOS_VITALES_EVALUACION`.`HORA` DESC";

$resultado = mysqli_query($conexion,$sql);
$cantidadSignosVitales = mysqli_num_rows($resultado);

$i = 0;

while($row = mysqli_fetch_assoc($resultado)){
    $fecha[$i] = $row['FECHA'];
    $hora[$i] = $row['HORA'];
    
    $arraySql[$i] = "SELECT ID_SIGNO_VITAL, VALOR_SIGNO_VITAL FROM SIGNOS_VITALES_EVALUACION WHERE ID_EVALUACION = '$idEvaluacion' AND FECHA = '$fecha[$i]' AND HORA = '$hora[$i]'";
    
    $i++;
}


?>


<div class="container-fluid">

<div class="row py-3 fondo">
        
        <!-- <div class="col-3">HOLA</div> -->
        <!-- <div class="col-3" style="background-color:white"><img style="height:100px; width:100px;" src="../../img/logosinfondo.png" alt=""></div> -->
        <div class="col-12 py-5"><h1 class="text-uppercase text-center titulo">EVALUACIÓN de <?=utf8_encode($_SESSION['nombreCompletoTrabajador'])?></h1></div>
        
    </div>
    
    <div class="row separacion"></div>
    

    <div class="row justify-content-center py-3 fondo">
        <div class="col-6"><?php include 'datostrabajador.php'?></div>
        
        <div class="col-6"><?php include 'riesgos.php' ?></div>
        
    </div>

    <div class="row separacion"> </div>

    <div class="row py-3 fondo">

        <div class="col-12">
            <h3 class="text-center">SIGNOS VITALES</h3>
        </div>

        <div class="col-3">

                <div class="row py-3 fondo justify-content-center">
                
                        
                    <div class="col-6"><?= "FECHA: "?></div>
                    <div class="col-6"><?= "HORA: " ?></div>  
                
                </div>

               

                    <div class="row py-3 fondo justify-content-center">
                           <br>         
                    <?php  
                for ($i=0; $i < $cantidadSignosVitales; $i++) { 
                ?>        
                        <div class="col-6"><?= date("d-m-Y",strtotime($fecha[$i]))  ?></div>
                        <div class="col-6"><?= $hora[$i] ?></div>  
                        <?php } ?>         
                    </div>
                
               
                


        </div>

        <div class="col-9">
            
            

            <div class="row py-3 fondo justify-content-center">
        
                
                <div class="col-2"><?= "PULSO: "?></div>
                <div class="col-2"><?= "T. SISTÓLICA: " ?></div>     
                <div class="col-2"><?= "T. DIASTÓLICA: "?></div>
                <div class="col-2"><?= "PESO: "?></div>
                <div class="col-2"><?= "ALTURA: "?></div>
                <div class="col-2"><?= "IMC: "?></div>
            
            </div>

            <div class="row py-3 fondo justify-content-center">
            <?php
                for ($i=0; $i < $cantidadSignosVitales; $i++) { 

                    
                    $resultado = mysqli_query($conexion,$arraySql[$i]); 
                    while($row = mysqli_fetch_assoc($resultado)){
                        $idSignoVital = $row['ID_SIGNO_VITAL'];
                        $valor = $row['VALOR_SIGNO_VITAL'];
                        //echo $valor;

                        
                        switch($idSignoVital){
                            case '1':
                                $valor .= " X'";
                            break;

                            case '2':
                                $valor .= " mm/HG";
                            break;

                            case '3':
                                $valor .= " mm/HG";
                            break;

                            case '4':
                                $valor .= " kg";
                            break;
                            
                            case '5':
                                $valor .= " cm";
                            break;
                            
                            case '6':
                                $valor .= " %";
                            break;
                        }
            ?>
                        <div class="col-2"><?=$valor?></div>
                        
                <?php }
                    mysqli_free_result($resultado);
                }?> 
            
            </div>    
            
                    
        </div>
    </div>


    <div class="row separacion"></div>




    <div class="row justify-content-center">
        <div class="col-3 fondo">

            <button onclick="mostrarSignosVitales2()" class="btn btn-primary" style="font-size:20px;" id="btnSignosVitales">Signos Vitales</button>
            <br>    
            
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

            
            
            
            <button onclick="mostrarInterconsulta()" class="btn btn-primary" style="font-size:20px;" id="btnInterconsulta">Interconsulta</button>
            <br>
            

            
            
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
            
            <button class="btn btn-primary btn-block" style="font-size:22px" onclick="finalizar()" <?php $mostrar = $_SESSION['mostrar'];
                                    echo $mostrar;?>>FINALIZAR EVALUACION</button>
        </div>
    
    <form id="finalizarEvaluacion" name="finalizarEvaluacion" action="" method="post" >
        <input id="examenFinalizado" name="examenFinalizado" value="examenFinalizado" type="text" hidden>
    </form>
    <div class="row py-3">
    <div class="col-3"></div>
    <div class="col-9">
        
    </div>
    
</div>

</div>



<?php include '../plantillas/footer.php' ?>