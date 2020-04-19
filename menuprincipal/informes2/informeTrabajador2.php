<?php 
include '../plantillas/header.php';
include "../../global/conexion.php";
session_start();


$idEvaluacion = $_POST['idEvaluacion'];

$sql = "SELECT 
PULSO, 
PESO, 
ALTURA, 
PRESION_DIASTOLICA, 
PRESION_SISTOLICA, 
IMC, 
CONTRAINDICACIONES, 
OBSERVACIONES_EXAMENES, 
EXAMEN_FISICO_GENERAL, 
CABEZA, 
TORAX, 
ABDOMEN, 
EXTREMIDADES_SUPERIORES, 
EXTREMIDADES_INFERIORES, 
COLUMNA_GENERAL, 
CONCLUSION_MEDICA, 
RECOMENDACIONES, 
ANAMNESIS FROM EVALUACION WHERE ID_EVALUACION = '$idEvaluacion'";


$resultado = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($resultado);

$pulso = $row['PULSO'];
$peso = $row['PESO'];
$altura = $row['ALTURA'];
$presionDiastolica = $row['PRESION_DIASTOLICA'];
$presionSistolica = $row['PRESION_SISTOLICA'];
$imc = $row['IMC'];
$contraindicaciones = $row['CONTRAINDICACIONES'];
$observaciones = $row['OBSERVACIONES_EXAMENES'];
$examenFisicoGeneral = $row['EXAMEN_FISICO_GENERAL'];
$cabeza = $row['CABEZA'];
$torax = $row['TORAX'];
$abdomen = $row['ABDOMEN'];
$extremidadesSuperiores = $row['EXTREMIDADES_SUPERIORES'];
$extremidadesInferiores = $row['EXTREMIDADES_INFERIORES'];
$columnaGeneral = $row['COLUMNA_GENERAL'];
$conclusionMedica = $row['CONCLUSION_MEDICA'];
$recomendaciones = $row['RECOMENDACIONES'];
$anamnesis = $row['ANAMNESIS'];


?>

<div class="container">

    

<div class="row fondo">
    <div class="col-12">
        <h1 class="text-center titulo">EXAMEN</h1>
    </div>
</div>

<div class="row separacion"></div>

<div class="row justify-content-center">
    <!-- <div class="col-3"></div> -->
    <div class="col-12 text-center">                     
        <?php include 'datostrabajador.php' ?>
    </div>
</div>


<div class="row justify-content-center" style="border:1px solid; background-color:#e5e5e5;">

    <div class="col-2">PULSO</div>
    <div class="col-2">TENSION DIASTÓLICA</div>
    <div class="col-2">TENSION SISTÓLICA</div>
    <div class="col-2">ALTURA</div>
    <div class="col-2">PESO</div>
    <div class="col-2">IMC</div>

</div>




<div class="row justify-content-center" style="border:1px solid; background-color:#e5e5e5;">

    <div class="col-2"><?= $pulso." X'" ?></div>
    <div class="col-2"><?= $presionDiastolica." mmHg" ?></div>
    <div class="col-2"><?= $presionSistolica." mmHg" ?></div>
    <div class="col-2"><?= $altura." cm" ?></div>
    <div class="col-2"><?= $peso." kg" ?></div>
    <div class="col-2"><?= $imc." %" ?></div>

    
</div>







<?php


$sql2 = "SELECT DISTINCT examen.NOMBRE_EXAMEN, examen.ID_EXAMEN 
    FROM examen
    INNER JOIN examenes_bateria_de_examenes 
    ON examen.ID_EXAMEN = examenes_bateria_de_examenes.ID_EXAMEN
    INNER JOIN bateria_de_examenes
    ON examenes_bateria_de_examenes.ID_BATERIA_DE_EXAMENES = bateria_de_examenes.ID_BATERIA_DE_EXAMENES WHERE ";


$sql="SELECT DISTINCT bateria_de_examenes.NOMBRE_BATERIA_DE_EXAMENES FROM bateria_de_examenes 
                INNER JOIN evaluacion_bateria_de_examenes ON bateria_de_examenes.ID_BATERIA_DE_EXAMENES = evaluacion_bateria_de_examenes.ID_BATERIA_DE_EXAMENES
                INNER JOIN EVALUACION ON evaluacion.ID_EVALUACION = evaluacion_bateria_de_examenes.ID_EVALUACION WHERE EVALUACION.ID_EVALUACION = '$idEvaluacion'";

$resultado = mysqli_query($conexion,$sql);
$contador = 0;

while($row = mysqli_fetch_assoc($resultado)){
    
    $bateriaDeExamenes[$contador] = $row['NOMBRE_BATERIA_DE_EXAMENES'];
    $nombreExamen = $row['NOMBRE_BATERIA_DE_EXAMENES'];
    $contador++;

    $sql2.="bateria_de_examenes.ID_BATERIA_DE_EXAMENES = (SELECT bateria_de_examenes.ID_BATERIA_DE_EXAMENES FROM bateria_de_examenes where bateria_de_examenes.NOMBRE_BATERIA_DE_EXAMENES = '$nombreExamen') OR ";
    
    

}
?>

<div class="row justify-content-center mt-4" style="font-size:30px; border:1px solid; background-color:#e5e5e5;">

    <div class="col-4">EXÁMEN</div>
    <div class="col-4">OBS</div>
    <div class="col-4">ESTADO</div>

</div>



<?php 
$sql2 = substr($sql2, 0, -4);
$contador = 0;
//echo $sql2;
//$contadorRow = 0;
$resultado = mysqli_query($conexion,$sql2);
while($row = mysqli_fetch_assoc($resultado)){
    $examenes[$contador] =  $row['NOMBRE_EXAMEN'];
    $idExamenes[$contador] = $row['ID_EXAMEN'];
    $contador++;
    ?>

    <div class="row justify-content-center py-2" style="border:1px solid;<?php if($contador%2==0)echo 'background-color:#e5e5e5;';?>" >

    <div class="col-4"><?= $row['NOMBRE_EXAMEN'] ?></div>
    <div class="col-4"><?= "Observaciones" ?> </div>
    <div class="col-4"><?= "Sin evaluar" ?></div>

    </div>
<?php
}

$cadenaBateriasDeExamenes = "EXAMENES CORRESPONDEN A LAS SIGUIENTES BATERIAS: ";
foreach($bateriaDeExamenes as $valor){
    
    $cadenaBateriasDeExamenes .= $valor." / ";
    //$cadenaBateriasDeExamenes = substr($cadenaBateriasDeExamenes,-3,3);
}?>
 
 <div class="row justify-content-center my-4" style="border:1px solid; background-color:#e5e5e5;">
        
        <div class="col-12"></div><?= $cadenaBateriasDeExamenes?>
</div>









<!-- <div class="row justify-content-center py-2" style="border:1px solid; background-color:#e5e5e5;">


    <div class="col-1">
        #
    </div>
    <div class="col-3">
        <h5>EXAMINADOR</h5>
    </div>

    <div class="col-2">
        <h5>FECHA</h5>        
    </div>

    <div class="col-2">
        <h5>HORA</h5>
    </div>

    <div class="col-2">
        
    </div>

    <div class="col-2">
        
    </div>
</div>  





<?php include '../plantillas/footer.php' ?>