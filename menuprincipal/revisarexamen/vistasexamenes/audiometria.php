<?php 
session_start();
include '../../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];

$sql = "SELECT EVALUACION_PARAMETRO.VALOR_PARAMETRO, EVALUACION_PARAMETRO.ID_PARAMETRO 
FROM EVALUACION_PARAMETRO 
INNER JOIN PARAMETRO 
ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO 
INNER JOIN EXAMEN 
ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN
WHERE ID_EVALUACION = '$idEvaluacion'";

$valor = '';
$estado = 'Sin evaluar';
$observaciones = '';


$resultado = mysqli_query($conexion,$sql);

/*while($row = mysqli_fetch_assoc($resultado)){
    
    $idParametro = $row['ID_PARAMETRO'];
    
    switch($idParametro){
        case '101':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor = $valorParametro;
        break;   

        case '102':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case '103':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;

        case '104':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor = $valorParametro;
        break;   

        case '105':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case '106':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;

        case '107':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor = $valorParametro;
        break;   

        case '108':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case '109':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;

        case '110':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor = $valorParametro;
        break;   

        case '111':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case '112':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;

        case '113':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor = $valorParametro;
        break;   

        case '114':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case '115':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;

        case '116':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor = $valorParametro;
        break;   

        case '117':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case '118':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;

        case '119':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor = $valorParametro;
        break;   

        case '120':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case '121':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;

        case '122':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor = $valorParametro;
        break;   

        case '123':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case '124':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;

        case '125':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor = $valorParametro;
        break;   

        case '126':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case '127':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;

        case '128':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor = $valorParametro;
        break;   

        case '129':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case '130':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;

        case '131':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor = $valorParametro;
        break;   

        case '132':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case '133':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;

        case '134':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor = $valorParametro;
        break;   

        case '135':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case '136':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;

        case '137':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $valor = $valorParametro;
        break;   

        case '138':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
    }
   
}*/
?>
<div class="container" >

<div class="row justify-content-center my-5">
    <div class="col-6">
        <h1 class="text-center">AUDIOMETRÍA</h1>
    </div>
</div>



<form action="" method="POST" class="" id="formIngresarAudiometria" name="formIngresarAudiometria">


    <?php include 'estado.php' ?>

    
    <div class="row justify-content-center mb-3">
        <div class="col-2 mb-4">V.A.OD</div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD125" name="VAOD125" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD250" name="VAOD250" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD500" name="VAOD500" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD1000" name="VAOD1000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD2000" name="VAOD2000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD3000" name="VAOD3000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD4000" name="VAOD4000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD6000" name="VAOD6000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOD8000" name="VAOD8000" maxlength="3" value=""></div>

        <div class="col-2 mb-4">V.A.OI</div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI125" name="VAOI125" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI250" name="VAOI250" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI500" name="VAOI500" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI1000" name="VAOI1000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI2000" name="VAOI2000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI3000" name="VAOI3000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI4000" name="VAOI4000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI6000" name="VAOI6000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VAOI8000" name="VAOI8000" maxlength="3" value=""></div>
        


        <div class="col-2 mb-4">V.O.OD</div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD125" name="VOOD125" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD250" name="VOOD250" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD500" name="VOOD500" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD1000" name="VOOD1000" maxlength="3"  value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD2000" name="VOOD2000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD3000" name="VOOD3000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD4000" name="VOOD4000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD6000" name="VOOD6000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOD8000" name="VOOD8000" maxlength="3" value=""></div>
       

        <div class="col-2 mb-4">V.O.OI</div>
        <div class="col-1"><input class="form-control" type="text" id='VOOI125' name='VOOI125' maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id='VOOI250' name='VOOI250' maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOI500" name="VOOI500" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOI1000" name="VOOI1000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOI2000" name="VOOI2000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOI3000" name="VOOI3000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOI4000" name="VOOI4000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOI6000" name="VOOI6000" maxlength="3" value=""></div>
        <div class="col-1"><input class="form-control" type="text" id="VOOI8000" name="VOOI8000" maxlength="3" value=""></div>

        <div class="col-2">Hz</div>
        <div class="col-1">125</div>
        <div class="col-1">250</div>
        <div class="col-1">500</div>
        <div class="col-1">1000</div>
        <div class="col-1">2000</div>
        <div class="col-1">3000</div>
        <div class="col-1">4000</div>
        <div class="col-1">6000</div>    
        <div class="col-1">8000</div>
        

    </div>

    <?php 
      include 'observaciones.php';
    ?>


    

    
    <input type="text" name="consulta" id="consulta" value="ingresarAudiometria" hidden>
    <!-- <input type="text" name="select" id="select" value="ingresarIngresarElectrocardiograma" hidden> -->
    

    <div class="row justify-content-center mb-3">

        <!-- <div class="col-4">
            <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarPerfilLipidico()" id="btnMostrarTestDeRuffier" name="btnMostrarTestDeRuffier>
        </div> -->

        <div class="col-4">
            <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarAudiometria()" id="btnGuardarAudiometria" name="btnGuardarAudiometria">
        </div>

    </div>

</form>

</div>