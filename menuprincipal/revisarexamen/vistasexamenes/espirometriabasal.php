<!-- style="border-style:solid; border-width:1px; border-radius:10px 10px 10px 10px;" -->
<?php session_start();
include '../../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];

$sql = "SELECT evaluacion_parametro.VALOR_PARAMETRO, evaluacion_parametro.ID_PARAMETRO 
FROM EVALUACION_PARAMETRO 
INNER JOIN PARAMETRO 
ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO 
INNER JOIN EXAMEN 
ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN
WHERE ID_EVALUACION = '$idEvaluacion'";


$v1 = '';
$v2 = '';
$v3 = '';
$v4 = '';
$v5 = '';
$v6 = '';
$v7 = '';
$v8 = '';
$v9 = '';
$v10 = '';
$v11 = '';
$v12 = '';
$v13 = '';
$v14 = '';
$v15 = '';
$estado = 'Sin evaluar';
$observaciones = '';


$resultado = mysqli_query($conexion,$sql);


while($row = mysqli_fetch_assoc($resultado)){
    
    $idParametro = $row['ID_PARAMETRO'];
    
    switch($idParametro){
        case '6':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v1 = $valorParametro;
        break;   
            
        case '7':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v2 = $valorParametro;
        break;
        case '8':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v3 = $valorParametro;
        break;   
            
        case '9':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v4 = $valorParametro;
        break;
        case '10':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v5 = $valorParametro;
        break;   
            
        case '11':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v6 = $valorParametro;
        break;
        case '12':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v7 = $valorParametro;
        break;   
            
        case'13':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v8 = $valorParametro;
        break;
        case '14':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v9 = $valorParametro;
        break;   
            
        case'15':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v10 = $valorParametro;
        break;
        case '16':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v11 = $valorParametro;
        break;   
            
        case'17':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v12 = $valorParametro;
        break;
        case '18':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v13 = $valorParametro;
        break;   
            
        case'19':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v14 = $valorParametro;
        break;
        case '20':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $v15 = $valorParametro;
        break;   
            
        case '22':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case'23':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;
        

    }
   
}
?>

<div class="container" >

    <div class="row justify-content-center my-5">
        <div class="col-6">
            <h1 class="text-center">ESPIROMETRÍA BASAL</h1>
        </div>
    </div>

    <form action="" method="POST" class="" id="formIngresarEspirometriaBasal" name="formIngresarEspirometriaBasal">

    <div class="container borderedondeado">
        
    <div class="row justify-content-center my-3">
        <div class="col-6">
            <h3 class="text-center">TEÓRICO</h3>
        </div>
    </div>

    
        

        
            <?php //include 'estado.php' ?>

            <div class="row justify-content-center mb-3">
                <div class="col-2" style="margin-top:5px;">
                    
                </div>

                <div class="col-2" style="margin-top:5px;">
                    PROMEDIO
                </div>

                <div class="col-2" style="margin-top:5px;">
                    LÍMITE** INFERIOR
                </div>

            </div>




            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    CVF(L)
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="cvflPromedio" id="cvflPromedio" maxlength="5" value="<?=$v1?>">
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="cvflLimiteInferior" id="cvflLimiteInferior" maxlength="5" value="<?=$v2?>">
                </div>

            </div>


            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    VEF1(L)
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="vef1lPromedio" id="vef1lPromedio" maxlength="5" value="<?=$v3?>">
                </div>

                <div class="col-2">
                <input type="text" class="form-control" name="vef1lLimiteInferior" id="vef1lLimiteInferior" maxlength="5" value="<?=$v4?>">
                </div>

            </div> 



            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    FEF25-75(L/s)
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="fef2575Promedio" id="fef2575Promedio" maxlength="5" value="<?=$v5?>">
                </div>

                <div class="col-2">
                <input type="text" class="form-control" name="fef2575LimiteInferior" id="fef2575LimiteInferior" maxlength="5" value="<?=$v6?>">
                </div>

            </div> 





            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    VEF1/CVF (%)
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="vef1cvfPromedio" id="vef1cvfPromedio" maxlength="5" value="<?=$v7?>">
                </div>

                <div class="col-2">
                <input type="text" class="form-control" name="vef1cvfLimiteInferior" id="vef1cvfLimiteInferior" maxlength="5" value="<?=$v8?>">
                </div>

            </div> 
    
    </div>


    <!-- ************************************************* -->

    <div class="container borderedondeado my-5">
        
    <div class="row justify-content-center my-3">
        <div class="col-6">
            <h3 class="text-center">OBSERVADO</h3>
        </div>
    </div>

    <div class="row justify-content-center my-5">
        <div class="col-6">
            <h4 class="text-center">BASAL</h4>
        </div>
    </div>

    
            <?php //include 'estado.php' ?>

            <div class="row justify-content-center mb-3">
                <div class="col-2" style="margin-top:5px;">
                    ABSOLUTO
                </div>

                <div class="col-2" style="margin-top:5px;">
                    % TEÓRICO
                </div>

            </div>




            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    <input type="text" class="form-control" name="absoluto1" id="absoluto1" maxlength="5" value="<?=$v9?>">
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="teorico1" id="teorico1" maxlength="5" value="<?=$v10?>">
                </div>

            </div>


            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    <input type="text" class="form-control" name="absoluto2" id="absoluto2" maxlength="5"value="<?=$v11?>">
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="teorico2" id="teorico2" maxlength="5" value="<?=$v12?>">
                </div>

            </div>



            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    <input type="text" class="form-control" name="absoluto3" id="absoluto3" maxlength="5" value="<?=$v13?>">
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="teorico3" id="teorico3" maxlength="5" value="<?=$v14?>">
                </div>

            </div>


            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    <input type="text" class="form-control" name="absoluto4" id="absoluto4" maxlength="5" value="<?=$v15?>">
                </div>

                <div class="col-2">
                   
                </div>

            </div> 



    
    </div>



    <?php 
      include 'observaciones.php';
    ?>





        <!-- <div class="row justify-content-center mb-3">

            <div class="col-8">
                <label for="">Observaciones</label>
                <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="4" maxlength="315" ></textarea>
            </div>

        </div> -->

        
        <input type="text" name="consulta" id="consulta" value="ingresarEspirometriaBasal" hidden>
        <input type="text" name="select" id="select" value="ingresarEspirometriaBasal" hidden>
        

        <div class="row justify-content-center mb-3">

            <div class="col-4">
                <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarEspirometriaBasal()" id="btnGuardarEspirometriaBasal">
            </div>

        </div>

    </form>

</div>