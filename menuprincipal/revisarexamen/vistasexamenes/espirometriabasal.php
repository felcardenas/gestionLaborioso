<!-- style="border-style:solid; border-width:1px; border-radius:10px 10px 10px 10px;" -->
<?php session_start();
include '../../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];
$idExamen = '4';
$limit = '9';

    
    //$observaciones = '';


$sql = "SELECT PARAMETRO.ID_PARAMETRO, EVALUACION_PARAMETRO.VALOR_PARAMETRO 
FROM EVALUACION_PARAMETRO 
INNER JOIN PARAMETRO ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO
INNER JOIN EXAMEN ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN 
WHERE EXAMEN.ID_EXAMEN = '$idExamen' AND EVALUACION_PARAMETRO.ID_EVALUACION = '$idEvaluacion'
ORDER BY `FECHA` DESC, `HORA` DESC, PARAMETRO.`ID_PARAMETRO` ASC LIMIT $limit";


$resultado = mysqli_query($conexion,$sql);

if(mysqli_num_rows($resultado) > 0){
    while($row = mysqli_fetch_assoc($resultado)){
    
        $idParametro = $row['ID_PARAMETRO'];
        
        switch($idParametro){
            case '14':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $absoluto1 = $valorParametro;
            break;   
                
            case '15':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $teorico1 = $valorParametro;
            break;
            case '16':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $absoluto2 = $valorParametro;
            break;   
                
            case '17':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $teorico2 = $valorParametro;
            break;
            case '18':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $absoluto3 = $valorParametro;
            break;   
                
            case '19':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $teorico3 = $valorParametro;
            break;
            case '20':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $absoluto4 = $valorParametro;
            break;   
                
            case '22':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $observaciones = $valorParametro;
            break;   
                
            case '23':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $estado = $valorParametro;
            break;
            
    
        }
       
    }
}else{
    $absoluto1 = '';
    $teorico1 = '';
    $absoluto2 = '';
    $teorico2 = '';
    $absoluto3 = '';
    $teorico3 = '';
    $absoluto4 = '';
    $observaciones = '';
    $estado = 'Sin evaluar';
}

//echo $observaciones . " " . $estado;
/* 
$absoluto1 = $_POST['absoluto1'];    
$teorico1 = round($absoluto1*100/4.67,2);
$absoluto2 = $_POST['absoluto2'];
$teorico2 = round($absoluto2*100/3.89,2);
$absoluto3 = $_POST['absoluto3'];
$teorico3 = round($absoluto3*100/4.19,2);
$absoluto4 = round($absoluto2/$absoluto1,2);
$estado = $_POST['estado']; */


?>

<div class="container" >

    <div class="row justify-content-center my-5">
        <div class="col-6">
            <h1 class="text-center">ESPIROMETRÍA BASAL</h1>
        </div>
    </div>

    <form action="" method="POST" class="" id="formIngresarEspirometriaBasal" name="formIngresarEspirometriaBasal">

    
    <?php include 'estado.php'?>
    


    <div class="container py-3 mb-5 borderedondeado">
            
        
        <?php //include 'estado.php' ?>
            <div class="row justify-content-center">
                <div class="col-12"><h3 class="text-center">TEÓRICO</h3></div>
            </div>

            <div class="row justify-content-center">
                
                <div class="col-3"></div>
                <div class="col-2">PROMEDIO</div>
                <div class="col-2">LIMITE INFERIOR**</div>
                
            </div>

            <div class="row justify-content-center">
                
                <div class="col-3">CVF(L)</div>
                <div class="col-2">4.67L</div>
                <div class="col-2">81.1%</div>
                
            </div>

            <div class="row justify-content-center">
                
                <div class="col-3">VEF1(L/s)</div>
                <div class="col-2">3.89L/s</div>
                <div class="col-2">79.1%</div>
                
            </div>

            <div class="row justify-content-center">
                
                <div class="col-3">FEF 25-75(L/s)</div>
                <div class="col-2">4.19L/s</div>
                <div class="col-2">55.3%</div>
                
            </div>

            <div class="row justify-content-center">
                
                <div class="col-3">VEF1/CVF 25-75(L/s)</div>
                <div class="col-2">83.3%</div>
                <div class="col-2"></div>
                
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
                <div class="col-3"></div>

                <div class="col-2" style="margin-top:5px;">
                    ABSOLUTO
                </div>
                <div class="col-1"></div>

                <div class="col-2" style="margin-top:5px;">
                    % TEÓRICO
                </div>
                <div class="col-1"></div>

            </div>




            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-3">CVF(L)</div>
                
                <div class="col-2">
                    <input type="text" class="form-control" name="absoluto1" id="absoluto1" maxlength="3" value="<?=$absoluto1?>" onchange="calcularPorcentajeCVF()" onkeyup="calcularPorcentajeCVF()">
                </div>
                <div class="col-1">L</div>
                <div class="col-2">
                    <input type="text" class="form-control" name="teorico1" id="teorico1" maxlength="3" value="<?=$teorico1?>" disabled>
                </div>
                <div class="col-1">%</div>

            </div>


            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-3">VEF1(L/s)</div>
                <div class="col-2">
                    <input type="text" class="form-control" name="absoluto2" id="absoluto2" maxlength="3" value="<?=$absoluto2?>" onchange="calcularPorcentajeVEF()" onkeyup="calcularPorcentajeVEF()" >
                </div>
                <div class="col-1">L/s</div>

                <div class="col-2">
                    <input type="text" class="form-control" name="teorico2" id="teorico2" maxlength="3" value="<?=$teorico2?>" disabled>
                </div>
                <div class="col-1">%</div>

            </div>



            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-3">FEF 25-75(L/s)</div>
                
                <div class="col-2">
                    <input type="text" class="form-control" name="absoluto3" id="absoluto3" maxlength="3" value="<?=$absoluto3?>" onchange="calcularPorcentajeFEF()" onkeyup="calcularPorcentajeFEF()">
                </div>
                <div class="col-1">L/s</div>

                <div class="col-2">
                    <input type="text" class="form-control" name="teorico3" id="teorico3" maxlength="3" value="<?=$teorico3?>" disabled>
                </div>
                <div class="col-1">%</div>

            </div>


            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-3">VEF1/CVF</div>
                
                <div class="col-2">
                    <input type="text" class="form-control" name="absoluto4" id="absoluto4" maxlength="5" value="<?=$absoluto4?>" disabled>
                </div>
                
                <div class="col-1">%</div>

                <div class="col-2"></div>
                <div class="col-1"></div>

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
        <input type="text" name="select" id="select" value="selectEspirometriaBasal" hidden>
        

        <div class="row justify-content-center mb-3">

            <div class="col-4">
                <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarEspirometriaBasal()" id="btnGuardarEspirometriaBasal">
            </div>
            <div class="col-4">
                <select class="form-control" onchange="obtenerParametrosEspirometria()" name="fechaHora" id="fechaHora">
                <?php include 'selectDatosAnteriores.php' ?>
                </select>
            </div>

        </div>

    </form>

</div>