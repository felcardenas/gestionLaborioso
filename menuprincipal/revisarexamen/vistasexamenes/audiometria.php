<?php 
session_start();
include '../../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];
$idExamen = '5';
$limit = '38';

$sql = "SELECT PARAMETRO.ID_PARAMETRO, EVALUACION_PARAMETRO.VALOR_PARAMETRO 
FROM EVALUACION_PARAMETRO 
INNER JOIN PARAMETRO ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO
INNER JOIN EXAMEN ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN 
WHERE EXAMEN.ID_EXAMEN = '$idExamen' AND EVALUACION_PARAMETRO.ID_EVALUACION = '$idEvaluacion'
ORDER BY `FECHA` DESC, `HORA` DESC, PARAMETRO.`ID_PARAMETRO` ASC LIMIT $limit";


$VAOD125= '';
$VAOD250= '';
$VAOD500= '';
$VAOD1000= '';
$VAOD2000= '';
$VAOD3000= '';
$VAOD4000= '';
$VAOD6000= '';
$VAOD8000= '';
$VAOI125= '';
$VAOI250= '';
$VAOI500= '';
$VAOI1000= '';
$VAOI2000= '';
$VAOI3000= '';
$VAOI4000= '';
$VAOI6000= '';
$VAOI8000= '';
$VOOD125= '';
$VOOD250= '';
$VOOD500= '';
$VOOD1000= '';
$VOOD2000= '';
$VOOD3000= '';
$VOOD4000= '';
$VOOD6000= '';
$VOOD8000= '';
$VOOI125= '';
$VOOI250= '';
$VOOI500= '';
$VOOI1000= '';
$VOOI2000= '';
$VOOI3000= '';
$VOOI4000= '';
$VOOI6000= '';
$VOOI8000= '';
$valor = '';
$estado = 'Sin evaluar';
$observaciones = '';

$resultado = mysqli_query($conexion,$sql);

while($row = mysqli_fetch_assoc($resultado)){
    
    $idParametro = $row['ID_PARAMETRO'];
    
    switch($idParametro){
        case '101':
            $valorParametro = $row['VALOR_PARAMETRO'];
            //$valorParametro = null;
            if($valorParametro == 'null'){
                $VAOD125 = '';
            }else{
                $VAOD125 = $valorParametro;
            }
        break;   

        case '102':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOD250 = '';
            }else{
                $VAOD250 = $valorParametro;
            }
            
        break;   
            
        case '103':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOD500 = '';
            }else{
                $VAOD500 = $valorParametro;
            }
            
        break;

        case '104':
            $valorParametro == $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOD1000 = '';
            }else{
                $VAOD1000 = $valorParametro;
            }            
        break;   

        case '105':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOD2000 = '';
            }else{
                $VAOD2000 = $valorParametro;
            }
            
        break;   
            
        case '106':
            $valorParametro = $row['VALOR_PARAMETRO'];
            
            if($valorParametro == 'null'){
                $VAOD3000 = '';
            }else{
                $VAOD3000 = $valorParametro;
            }

        break;

        case '107':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOD4000 = '';
            }else{
                $VAOD4000 = $valorParametro;
            }
            
        break;   

        case '108':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOD6000 = '';
            }else{
                $VAOD6000 = $valorParametro;
            }
        break;   
            
        case '109':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOD8000 = '';
            }else{
                $VAOD8000 = $valorParametro;
            }
            
        break;

        case '110':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOI125 = '';
            }else{
                $VAOI125 = $valorParametro;
            }
            
        break;   

        case '111':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOI250 = '';
            }else{
                $VAOI250 = $valorParametro;
            }
            
        break;   
            
        case '112':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOI500 = '';
            }else{
                $VAOI500 = $valorParametro;
            }
            
        break;

        case '113':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOI1000 = '';
            }else{
                $VAOI1000 = $valorParametro;
            }
            
        break;   

        case '114':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOI2000 = '';
            }else{
                $VAOI2000 = $valorParametro;
            }
            
        break;   
            
        case '115':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOI3000 = '';
            }else{
                $VAOI3000 = $valorParametro;
            }
            
        break;

        case '116':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOI4000 = '';
            }else{
                $VAOI4000 = $valorParametro;
            }
            
        break;   

        case '117':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOI6000 = '';
            }else{
                $VAOI6000 = $valorParametro;
            }
            
        break;
        
        case '118':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VAOI8000 = '';
            }else{
                $VAOI8000 = $valorParametro;
            }
            
        break;

        case '119':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOD125 = '';
            }else{
                $VOOD125 = $valorParametro;
            }
            
        break;

        case '120':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOD250 = '';
            }else{
                $VOOD250 = $valorParametro;
            }
            
        break;

        case '121':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOD500 = '';
            }else{
                $VOOD500 = $valorParametro;
            }
            
        break;

        case '122':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOD1000 = '';
            }else{
                $VOOD1000 = $valorParametro;
            }
            
        break;

        case '123':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOD2000 = '';
            }else{
                $VOOD2000 = $valorParametro;
            }
            
        break;

        case '124':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOD3000 = '';
            }else{
                $VOOD3000 = $valorParametro;
            }
            
        break;

        case '125':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOD4000 = '';
            }else{
                $VOOD4000 = $valorParametro;
            }
            
        break;

        case '126':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOD6000 = '';
            }else{
                $VOOD6000 = $valorParametro;
            }
            
        break;
        
        case '127':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOD8000 = '';
            }else{
                $VOOD8000 = $valorParametro;
            }
            
        break;

        case '128':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOI125 = '';
            }else{
                $VOOI125 = $valorParametro;
            }
            
        break;

        case '129':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOI250 = '';
            }else{
                $VOOI250 = $valorParametro;
            }
            
        break;

        case '130':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOI500 = '';
            }else{
                $VOOI500 = $valorParametro;
            }
            
        break;

        case '131':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOI1000 = '';
            }else{
                $VOOI1000 = $valorParametro;
            }
            
        break;

        case '132':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOI2000 = '';
            }else{
                $VOOI2000 = $valorParametro;
            }
            
        break;

        case '133':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOI3000 = '';
            }else{
                $VOOI3000 = $valorParametro;
            }
            
        break;

        case '134':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOI4000 = '';
            }else{
                $VOOI4000 = $valorParametro;
            }
            
        break;

        case '135':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOI6000 = '';
            }else{
                $VOOI6000 = $valorParametro;
            }
            
        break;

        case '136':
            $valorParametro = $row['VALOR_PARAMETRO'];
            if($valorParametro == 'null'){
                $VOOI8000 = '';
            }else{
                $VOOI8000 = $valorParametro;
            }
            
        break;

        case '137':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   

        case '138':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;   
            
    }
   
}
?>

<script>graficoAudiometria();</script>

<div class="container" >

<div class="row justify-content-center my-5">
    <div class="col-6">
        <h1 class="text-center">AUDIOMETRÍA</h1>
    </div>
</div>



<form action="" method="POST" class="" id="formIngresarAudiometria" name="formIngresarAudiometria">


    <?php include 'estado.php' ?>

    
    <div class="row justify-content-center mb-5">
        <div class="col-2 mb-4">V.A.OD</div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD125" name="VAOD125" maxlength="3" value="<?=$VAOD125?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD250" name="VAOD250" maxlength="3" value="<?=$VAOD250?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD500" name="VAOD500" maxlength="3" value="<?=$VAOD500?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD1000" name="VAOD1000" maxlength="3" value="<?=$VAOD1000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD2000" name="VAOD2000" maxlength="3" value="<?=$VAOD2000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD3000" name="VAOD3000" maxlength="3" value="<?=$VAOD3000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD4000" name="VAOD4000" maxlength="3" value="<?=$VAOD4000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD6000" name="VAOD6000" maxlength="3" value="<?=$VAOD6000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD8000" name="VAOD8000" maxlength="3" value="<?=$VAOD8000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"></div>

        <div class="col-2 mb-4">V.A.OI</div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI125" name="VAOI125" maxlength="3" value="<?=$VAOI125?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI250" name="VAOI250" maxlength="3" value="<?=$VAOI250?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI500" name="VAOI500" maxlength="3" value="<?=$VAOI500?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI1000" name="VAOI1000" maxlength="3" value="<?=$VAOI1000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI2000" name="VAOI2000" maxlength="3" value="<?=$VAOI2000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI3000" name="VAOI3000" maxlength="3" value="<?=$VAOI3000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI4000" name="VAOI4000" maxlength="3" value="<?=$VAOI4000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI6000" name="VAOI6000" maxlength="3" value="<?=$VAOI6000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI8000" name="VAOI8000" maxlength="3" value="<?=$VAOI8000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"></div>


        <div class="col-2 mb-4">V.O.OD</div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD125" name="VOOD125" maxlength="3" value="<?=$VOOD125?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD250" name="VOOD250" maxlength="3" value="<?=$VOOD250?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD500" name="VOOD500" maxlength="3" value="<?=$VOOD500?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD1000" name="VOOD1000" maxlength="3" value="<?=$VOOD1000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD2000" name="VOOD2000" maxlength="3" value="<?=$VOOD2000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD3000" name="VOOD3000" maxlength="3" value="<?=$VOOD3000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD4000" name="VOOD4000" maxlength="3" value="<?=$VOOD4000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD6000" name="VOOD6000" maxlength="3" value="<?=$VOOD6000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD8000" name="VOOD8000" maxlength="3" value="<?=$VOOD8000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"></div>

        <div class="col-2 mb-4">V.O.OI</div>
        <div class="col-1"><input class="form-control" type="text" id='VOOI125' name='VOOI125' maxlength="3" value="<?=$VOOI125?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id='VOOI250' name='VOOI250' maxlength="3" value="<?=$VOOI250?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOI500" name="VOOI500" maxlength="3" value="<?=$VOOI500?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOI1000" name="VOOI1000" maxlength="3" value="<?=$VOOI1000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOI2000" name="VOOI2000" maxlength="3" value="<?=$VOOI2000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOI3000" name="VOOI3000" maxlength="3" value="<?=$VOOI3000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOI4000" name="VOOI4000" maxlength="3" value="<?=$VOOI4000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOI6000" name="VOOI6000" maxlength="3" value="<?=$VOOI6000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOI8000" name="VOOI8000" maxlength="3" value="<?=$VOOI8000?>" onkeyup="graficoAudiometria()"></div>
        <div class="col-1"></div>

        <div class="col-2">Hz</div>
        <div class="col-1">125Hz</div>
        <div class="col-1">250Hz</div>
        <div class="col-1">500Hz</div>
        <div class="col-1">1000Hz</div>
        <div class="col-1">2000Hz</div>
        <div class="col-1">3000Hz</div>
        <div class="col-1">4000Hz</div>
        <div class="col-1">6000Hz</div>    
        <div class="col-1">8000Hz</div>
        <div class="col-1"></div>
        

    </div>

    <hr>
    <div class="row justify-content-center">

            <div class="col-12">
                <canvas id="graficoAudiometria"></canvas>
                
            </div>


        </div>

    <?php 
      include 'observaciones.php';
    ?>


    

    
    <input type="text" name="consulta" id="consulta" value="ingresarAudiometria" hidden>
    <input type="text" name="select" id="select" value="selectAudiometria" hidden> 
    

    <div class="row justify-content-center mb-3">

        <!-- <div class="col-4">
            <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarPerfilLipidico()" id="btnMostrarTestDeRuffier" name="btnMostrarTestDeRuffier>
        </div> -->

        <div class="col-4">
            <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarAudiometria()" id="btnGuardarAudiometria" name="btnGuardarAudiometria">
        </div>


        <div class="col-4">
        <select class="form-control" onchange="obtenerParametrosAudiometria()" name="fechaHora" id="fechaHora">
               <?php include 'selectDatosAnteriores.php' ?>
                </select>
        </div>

    </div>

</form>

</div>