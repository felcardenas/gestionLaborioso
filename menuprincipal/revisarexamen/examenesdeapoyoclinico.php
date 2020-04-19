<?php 
session_start();
include '../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];
/* 
$sql = "SELECT evaluacion_parametro.VALOR_PARAMETRO, evaluacion_parametro.ID_PARAMETRO 
FROM EVALUACION_PARAMETRO 
INNER JOIN PARAMETRO 
ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO 
INNER JOIN EXAMEN 
ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN
WHERE ID_EVALUACION = '$idEvaluacion'"; */

//$resultado = mysqli_query($conexion,$sql);
//$i = 0;

//while($row = mysqli_fetch_assoc($resultado)){
    
    
    //$_SESSION['valoresExamenes'][$i] = array($row['ID_PARAMETRO'] => $row['VALOR_PARAMETRO']);

    // = array($row['ID_PARAMETRO'] => $row['VALOR_PARAMETRO']);
    
    //echo $row['ID_PARAMETRO'] ." - " . $row['VALOR_PARAMETRO'] . "<br>";
    //$i++;
   
//}
//echo $cadena;

//var_dump($_SESSION['valoresExamenes']);
//print_r($_SESSION['valoresExamenes']);
//echo $i;





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
                        ?><button onclick="mostrarElectrocardiograma()" class="btn btn-primary" style="font-size:20px;" id="btnElectrocardiograma">Electrocardiograma</button><?php
                        //include 'vistasexamenes/electrocardiograma.php';
                    break;

                    case 'Glicemia':
                        $idExamen = '3';
                        
                        ?><button onclick="mostrarGlicemia()" class="btn btn-primary" style="font-size:20px;" id="btnGlicemia">Glicemia</button><?php
                        //include 'vistasexamenes/glicemia.php';
                    break;

                    case 'Espirometria basal':
                        $idExamen = '4';
                        ?><button onclick="mostrarEspirometriaBasal()" class="btn btn-primary" style="font-size:20px;" id="btnEspirometriaBasal">Espirometría basal</button><?php
                        //include 'vistasexamenes/espirometriabasal.php';
                    break;

                    case 'Audiometria':
                        $idExamen = '5';
                        ?><button onclick="mostrarAudiometria()" class="btn btn-primary" style="font-size:20px;" id="btnAudiometria">Audiometría</button><?php
                        //include 'vistasexamenes/audiometria.php';
                    break;

                    case 'Creatinina':
                        $idExamen = '6';
                        ?><button onclick="mostrarCreatinina()" class="btn btn-primary" style="font-size:20px;" id="btnCreatinina">Creatinina</button><?php
                        //include 'vistasexamenes/creatinina.php';
                    break;

                    case 'Perfil lipidico':
                        $idExamen = '7';
                        ?><button onclick="mostrarPerfilLipidico()" class="btn btn-primary" style="font-size:20px;" id="btnPerfilLipidico">Perfil lipídico</button><?php
                        //include 'vistasexamenes/perfillipidico.php';
                    break;
                    
                    case 'Hemoglobina':
                        $idExamen = '8';
                        ?><button onclick="mostrarHemoglobina()" class="btn btn-primary" style="font-size:20px;" id="btnHemoglobina">Hemoglobina</button><?php
                        //include 'vistasexamenes/hemoglobina.php';
                    break;
                    
                    case 'Rx torax':
                        $idExamen = '9';
                        ?><button onclick="mostrarRxTorax()" class="btn btn-primary" style="font-size:20px;" id="btnRxTorax">Rx tórax</button><?php
                        //include 'vistasexamenes/rxtorax.php';
                    break;

                    case 'Indice de Framingham':
                        $idExamen = '10';
                        ?><button onclick="mostrarIndiceDeFramingham()" class="btn btn-primary" style="font-size:20px;" id="btnIndiceDeFramingham">Índice de Framingham</button><?php
                        //include 'vistasexamenes/indicedeframingham.php';
                    break;

                    case 'Encuesta de Lake Louis':
                        $idExamen = '11';
                        ?><button onclick="mostrarEncuestaDeLakeLouis()" class="btn btn-primary" style="font-size:20px;" id="btnEncuestaDeLakeLouis">Encuesta Lake Louis</button><?php
                        //include 'vistasexamenes/encuestadelakelouis.php';
                    break;

                    case 'Test de Ruffier':
                        $idExamen = '12';
                        ?><button onclick="mostrarTestDeRuffier()" class="btn btn-primary" style="font-size:20px;" id="btnTestDeRuffier">Test de Ruffier</button><?php
                        //include 'vistasexamenes/testderuffier.php';
                    break;

                    case 'Hemograma':
                        $idExamen = '13';
                        ?><button onclick="mostrarHemograma()" class="btn btn-primary" style="font-size:20px;" id="btnHemograma">Hemograma</button><?php
                        //include 'vistasexamenes/hemograma.php';
                    break;
                    
                    case 'Cultivo nasal':
                        $idExamen = '14';
                        ?><button onclick="mostrarCultivoNasal()" class="btn btn-primary" style="font-size:20px;" id="btnCultivoNasal">Cultivo nasal</button><?php
                        //include 'vistasexamenes/cultivonasal.php';
                    break;

                    case 'Cultivo faringeo':
                        $idExamen = '15';
                        ?><button onclick="mostrarCultivoFaringeo()" class="btn btn-primary" style="font-size:20px;" id="btnCultivoFaringeo">Cultivo faríngeo</button><?php
                        //include 'vistasexamenes/cultivofaringeo.php';
                    break;

                    case 'Cultivo lecho ungueal':
                        $idExamen = '16';
                        ?><button onclick="mostrarCultivoLechoUngueal()" class="btn btn-primary" style="font-size:20px;" id="btnCultivoLechoUngueal">Cultivo lecho ungueal</button><?php
                        //include 'vistasexamenes/cultivolechoungueal.php';
                    break;

                    case 'ALT/SGPT':
                        $idExamen = '17';
                        ?><button onclick="mostrarALTSGPT()" class="btn btn-primary" style="font-size:20px;" id="btnAltSgpt">ALT/SGPT</button><?php
                        //include 'vistasexamenes/altsgpt.php';
                    break;

                    case 'AST/SGOT':
                        $idExamen = '18';
                        ?><button onclick="mostrarASTSGOT()" class="btn btn-primary" style="font-size:20px;" id="btnAltSgot">ALT/SGOT</button><?php
                        //include 'vistasexamenes/astsgot.php';
                    break;

                    case 'Protrombina':
                        $idExamen = '19';
                        ?><button onclick="mostrarProtrombina()" class="btn btn-primary" style="font-size:20px;" id="btnProtrombina">Protrombina</button><?php
                        //include 'vistasexamenes/protrombina.php';
                    break;

                    case 'Tiempo de protrombina':
                        $idExamen = '20';
                        ?><button onclick="mostrarTiempoDeProtrombina()" class="btn btn-primary" style="font-size:20px;" id="btnTiempoDeProtrombina">Tiempo de protrombina</button><?php
                        //include 'vistasexamenes/tiempodeprotrombina.php';
                    break;

                    case 'Actividad de acetilcolinesterasa':
                        $idExamen = '21';
                        ?><button onclick="mostrarActividadDeAcetilcolinesterasa()" class="btn btn-primary" style="font-size:20px;" id="btnActividadDeAcetilcolinesterasa">Actividad de acetilcolinesterasa</button><?php
                        //include 'vistasexamenes/actividaddeacetilcolinesterasa.php';
                    break;

                    default:
                    break;
                    }
                    
                    
                    //$sql .= "('$idEvaluacion','$idExamen','$fechaExamen','$horaExamen'), ";

                }

            //$sql = substr($sql, 0, -2);

            if(!mysqli_query($conexion,$sql)){
                //printf("Errormessage: %s\n", mysqli_error($link));
            }


           /*  while($row = mysqli_fetch_assoc($resultado)){
                
                
                
                ?>
                <button onclick="revisarExamenesDeApoyoClinico()" class="btn btn-primary" style="font-size:20px; border:1px solid;" id="<?=$row['NOMBRE_EXAMEN']?>"><?=$row['NOMBRE_EXAMEN']?></button>
            <?php 
            } */
            ?>
            

        </div>
        <div class="col-12">
            <div class="row justify-content-center sticky-top">
                <div class="col-12">
                    <!-- <div class="container-fluid" id="contenidoExamenesDeApoyoClinico"></div> -->
                    <div class="container-fluid" id="contenidoExamen"></div>
                </div>
            </div>
        </div>

    </div>

</div>