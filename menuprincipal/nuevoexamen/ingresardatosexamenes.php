<?php

include '../../global/conexion.php';
include '../plantillas/header.php';
session_start();
?>


<div class="container-fluid">
    <div class="row py-3 fondo">
        
        <div class="col-12 py-5"><h1 class="text-uppercase text-center titulo">Exámenes</h1></div>
        
    </div>
    
    <div class="row separacion"></div>
    
    <div class="row py-3 fondo">
        <div class="col-4"></div>
        <div class="col-8"><?php include 'datostrabajador.php' ?></div>
    </div>

    <div class="row separacion"></div>



<?php
if(isset($_POST['submit'])) {
    
    $horaExamen = $_SESSION['horaActual'];
    $fechaExamen = $_SESSION['fechaActual'];
    $sql = "SELECT ID_EVALUACION FROM EVALUACION WHERE FECHA_CREACION = '$fechaExamen' AND HORA_CREACION ='$horaExamen'";

    if($resultado = mysqli_query($conexion,$sql)){
        $row = mysqli_fetch_assoc($resultado);
        $idEvaluacion = $row['ID_EVALUACION'];
        $_SESSION['idEvaluacion'] = $idEvaluacion;
    }


    $sql = "SELECT DISTINCT examen.NOMBRE_EXAMEN 
    FROM examen
    INNER JOIN examenes_bateria_de_examenes 
    ON examen.ID_EXAMEN = examenes_bateria_de_examenes.ID_EXAMEN
    INNER JOIN bateria_de_examenes
    ON examenes_bateria_de_examenes.ID_BATERIA_DE_EXAMENES = bateria_de_examenes.ID_BATERIA_DE_EXAMENES WHERE ";

    
    if (isset($_POST['seleccionado'])){
        foreach ($_POST['seleccionado'] as $selected) {
            //echo $selected."</br>";// Imprime resultados
            $examenes[] = utf8_decode($selected);
            $sql .= "bateria_de_examenes.ID_BATERIA_DE_EXAMENES = (SELECT bateria_de_examenes.ID_BATERIA_DE_EXAMENES FROM bateria_de_examenes where bateria_de_examenes.NOMBRE_BATERIA_DE_EXAMENES = '$selected') OR ";
        }
    } else {
        echo "No seleccionó ningún exámen";
    }

    $sql = substr($sql, 0, -4);

    //echo $sql . "<br>";

    if($resultado = mysqli_query($conexion, $sql)){
        
        //print_r(mysqli_query($conexion,$sql));
        
        if(mysqli_num_rows($resultado) > 0){
            // output data of each row
            
            $sql = "INSERT INTO EVALUACION_EXAMEN (ID_EVALUACION, ID_EXAMEN, FECHA, HORA) VALUES ";
            
            ?>
                
                <div class="row justify-content-center">
                    <div class="col-3 fondo">
                
            <?php


            while($row = mysqli_fetch_assoc($resultado)){
                
                $examen = utf8_encode($row['NOMBRE_EXAMEN']);


                switch($examen)
                    {
                    case 'Optometria':
                        $idExamen = '1';
                        ?><button onclick="mostrarOptometria()" class="btn btn-primary" style="font-size:20px;" id="btnOptometria">Optometría</button><?php
                        //include 'vistasexamenes/optometria.php';
                    break;

                    case 'Electrocardiograma':
                        $idExamen = '2';
                        ?><br><button onclick="mostrarElectrocardiograma()" class="btn btn-primary" style="font-size:20px;" id="btnElectrocardiograma">Electrocardiograma</button><?php
                        //include 'vistasexamenes/electrocardiograma.php';
                    break;

                    case 'Glicemia':
                        $idExamen = '3';
                        
                        ?><br><button onclick="mostrarGlicemia()" class="btn btn-primary" style="font-size:20px;" id="btnGlicemia">Glicemia</button><?php
                        //include 'vistasexamenes/glicemia.php';
                    break;

                    case 'Espirometria basal':
                        $idExamen = '4';
                        ?><br><button onclick="mostrarEspirometriaBasal()" class="btn btn-primary" style="font-size:20px;" id="btnEspirometriaBasal">Espirometría basal</button><?php
                        //include 'vistasexamenes/espirometriabasal.php';
                    break;

                    case 'Audiometria':
                        $idExamen = '5';
                        ?><br><button onclick="mostrarAudiometria()" class="btn btn-primary" style="font-size:20px;" id="btnAudiometria">Audiometría</button><?php
                        //include 'vistasexamenes/audiometria.php';
                    break;

                    case 'Creatinina':
                        $idExamen = '6';
                        ?><br><button onclick="mostrarCreatinina()" class="btn btn-primary" style="font-size:20px;" id="btnCreatinina">Creatinina</button><?php
                        //include 'vistasexamenes/creatinina.php';
                    break;

                    case 'Perfil lipidico':
                        $idExamen = '7';
                        ?><br><button onclick="mostrarPerfilLipidico()" class="btn btn-primary" style="font-size:20px;" id="btnPerfilLipidico">Perfil lipídico</button><?php
                        //include 'vistasexamenes/perfillipidico.php';
                    break;
                    
                    case 'Hemoglobina':
                        $idExamen = '8';
                        ?><br><button onclick="mostrarHemoglobina()" class="btn btn-primary" style="font-size:20px;" id="btnHemoglobina">Hemoglobina</button><?php
                        //include 'vistasexamenes/hemoglobina.php';
                    break;
                    
                    case 'Rx torax':
                        $idExamen = '9';
                        ?><br><button onclick="mostrarRxTorax()" class="btn btn-primary" style="font-size:20px;" id="btnRxTorax">Rx tórax</button><?php
                        //include 'vistasexamenes/rxtorax.php';
                    break;

                    case 'Indice de Framingham':
                        $idExamen = '10';
                        ?><br><button onclick="mostrarIndiceDeFramingham()" class="btn btn-primary" style="font-size:20px;" id="btnIndiceDeFramingham">Índice de Framingham</button><?php
                        //include 'vistasexamenes/indicedeframingham.php';
                    break;

                    case 'Encuesta de Lake Louis':
                        $idExamen = '11';
                        ?><br><button onclick="mostrarEncuestaDeLakeLouis()" class="btn btn-primary" style="font-size:20px;" id="btnEncuestaLakeLouis">Encuesta Lake Louis</button><?php
                        //include 'vistasexamenes/encuestadelakelouis.php';
                    break;

                    case 'Test de Ruffier':
                        $idExamen = '12';
                        ?><br><button onclick="mostrarTestDeRuffier()" class="btn btn-primary" style="font-size:20px;" id="btnTestDeRuffier">Test de Ruffier</button><?php
                        //include 'vistasexamenes/testderuffier.php';
                    break;

                    case 'Hemograma':
                        $idExamen = '13';
                        ?><br><button onclick="mostrarHemograma()" class="btn btn-primary" style="font-size:20px;" id="btnHemograma">Hemograma</button><?php
                        //include 'vistasexamenes/hemograma.php';
                    break;
                    
                    case 'Cultivo nasal':
                        $idExamen = '14';
                        ?><br><button onclick="mostrarCultivoNasal()" class="btn btn-primary" style="font-size:20px;" id="btnCultivoNasal">Cultivo nasal</button><?php
                        //include 'vistasexamenes/cultivonasal.php';
                    break;

                    case 'Cultivo faringeo':
                        $idExamen = '15';
                        ?><br><button onclick="mostrarCultivoFaringeo()" class="btn btn-primary" style="font-size:20px;" id="btnCultivoFaringeo">Cultivo faríngeo</button><?php
                        //include 'vistasexamenes/cultivofaringeo.php';
                    break;

                    case 'Cultivo lecho ungueal':
                        $idExamen = '16';
                        ?><br><button onclick="mostrarCultivoLechoUngueal()" class="btn btn-primary" style="font-size:20px;" id="btnCultivoLechoUngueal">Cultivo lecho ungueal</button><?php
                        //include 'vistasexamenes/cultivolechoungueal.php';
                    break;

                    case 'ALT/SGPT':
                        $idExamen = '17';
                        ?><br><button onclick="mostrarALTSGPT()" class="btn btn-primary" style="font-size:20px;" id="btnALTSGPT">ALT/SGPT</button><?php
                        //include 'vistasexamenes/altsgpt.php';
                    break;

                    case 'AST/SGOT':
                        $idExamen = '18';
                        ?><br><button onclick="mostrarASTSGOT()" class="btn btn-primary" style="font-size:20px;" id="btnALTSGOT">ALT/SGOT</button><?php
                        //include 'vistasexamenes/astsgot.php';
                    break;

                    case 'Protrombina':
                        $idExamen = '19';
                        ?><br><button onclick="mostrarProtrombina()" class="btn btn-primary" style="font-size:20px;" id="btnProtrombina">Protrombina</button><?php
                        //include 'vistasexamenes/protrombina.php';
                    break;

                    case 'Tiempo de protrombina':
                        $idExamen = '20';
                        ?><br><button onclick="mostrarTiempoDeProtrombina()" class="btn btn-primary" style="font-size:20px;" id="btnTiempoDeProtrombina">Tiempo de protrombina</button><?php
                        //include 'vistasexamenes/tiempodeprotrombina.php';
                    break;

                    case 'Actividad de acetilcolinesterasa':
                        $idExamen = '21';
                        ?><br><button onclick="mostrarActividadDeAcetilcolinesterasa()" class="btn btn-primary" style="font-size:20px;" id="btnActividadDeAcetilcolinesterasa">Actividad de acetilcolinesterasa</button><?php
                        //include 'vistasexamenes/actividaddeacetilcolinesterasa.php';
                    break;

                    default:
                    break;
                    }
                    
                    $sql .= "('$idEvaluacion','$idExamen','$fechaExamen','$horaExamen'), ";

                }

            $sql = substr($sql, 0, -2);

            if(!mysqli_query($conexion,$sql)){
                //printf("Errormessage: %s\n", mysqli_error($link));
            }

            ?>
                
                </div>
                <div class="col-9">
                    <div class="row justify-content-center sticky-top">
                        <div class="col-12"> 
                            <div class="container-fluid" id="contenidoExamen"></div>
                        </div>
                    </div>
                </div>

            </div>

            
            
            
            
            
            
            <?php

        } else {
            echo "0 results";
        }
    }else{
        echo "No se ha podido realizar la consulta";
    }
    

    
    mysqli_close($conexion);
    
} else {
    echo '?';
    die();
}



?>

<div class="row py-3">
    <div class="col-3"></div>
    <div class="col-9">
        <button class="btn btn-primary btn-block" style="font-size:22px" onclick="volverAInicio()">FINALIZAR</button>
    </div>
    
</div>

</div>

<?php include '../plantillas/footer.php'; ?>