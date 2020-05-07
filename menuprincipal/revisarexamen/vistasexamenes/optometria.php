<?php 

session_start();
include '../../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];

$sql = "SELECT evaluacion_parametro.VALOR_PARAMETRO, evaluacion_parametro.ID_PARAMETRO 
FROM EVALUACION_PARAMETRO 
INNER JOIN PARAMETRO 
ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO 
INNER JOIN EXAMEN 
ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN
WHERE ID_EVALUACION = '$idEvaluacion'";



/* 
$estado = 'Sin evaluar';
$observaciones = 'Sin observaciones';

$resultado = mysqli_query($conexion,$sql);


while($row = mysqli_fetch_assoc($resultado)){
    
    $idParametro = $row['ID_PARAMETRO'];
    
    switch($idParametro){
        
        case '77':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
            
        case'78':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $estado = $valorParametro;
        break;
    }
   
} */

$estado = 'Sin evaluar';
$observaciones = '';

?>


<div class="container" >

<div class="row justify-content-center my-5">
    <div class="col-6">
        <h1 class="text-center">OPTOMETRÍA</h1>
    </div>
</div>




<form action="" method="POST" class="" id="formIngresarOptometria" name="formIngresarOptometria">


<?php include 'estado.php';?>

<div class="row justify-content-center mb-3">
       
        <div class="col-8 mb-3">

            <table style="border:1px solid;">
                <tr><h4 class="text-center">VISION LEJOS</h4></tr>
                

                <tr>
                    <td></td>
                    <td></td>
                    <?php for($i=0; $i < 13; $i++){?> 
                    <td style="border:1px solid;"><?=$i?></td>
                    <?php } ?>
                </tr>

                <tr>
                    <td>1.OJO DERECHO</td>
                    <td> </td>

                    <?php for ($i=0; $i < 13; $i++){?>
                    <td style="border:1px solid;">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="ojoDerechoLejos" name="ojoDerechoLejos" value="<?=$i?>">
                            </label>
                        </div>
                    </td>
                    <?php } ?>            
                </tr>

                <tr>
                    <td>2.OJO IZQUIERDO</td>
                    <td> </td>

                    <?php for ($i=0; $i < 13; $i++){?>
                    <td style="border:1px solid;">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="ojoIzquierdoLejos" name="ojoIzquierdoLejos" value="<?=$i?>">
                            </label>
                        </div>
                    </td>
                    <?php } ?>            
                </tr>

                <tr>
                    <td>3.AMBOS OJOS</td>
                    <td> </td>

                    <?php for ($i=0; $i < 13; $i++){?>
                    <td style="border:1px solid;">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="ambosOjosLejos" name="ambosOjosLejos" value="<?=$i?>">
                            </label>
                        </div>
                    </td>
                    <?php } ?>            
                </tr>
        </table>

        </div>

        

        <div class="col-8">

            <table style="border:1px solid;">

                <tr><h4 class="text-center">VISION CERCA</h4></tr>
                

                <tr>
                    <td></td>
                    <td></td>
                    <?php for($i=0; $i < 13; $i++){?> 
                    <td style="border:1px solid;"><?=$i?></td>
                    <?php } ?>
                </tr>

                <tr>
                    <td>1.OJO DERECHO</td>
                    <td> </td>

                    <?php for ($i=0; $i < 13; $i++){?>
                    <td style="border:1px solid;">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="ojoDerechoCerca" name="ojoDerechoCerca" value="<?=$i?>">
                            </label>
                        </div>
                    </td>
                    <?php } ?>            
                </tr>

                <tr>
                    <td>2.OJO IZQUIERDO</td>
                    <td> </td>

                    <?php for ($i=0; $i < 13; $i++){?>
                    <td style="border:1px solid;">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="ojoIzquierdoCerca" name="ojoIzquierdoCerca" value="<?=$i?>">
                            </label>
                        </div>
                    </td>
                    <?php } ?>            
                </tr>

                <tr>
                    <td>3.AMBOS OJOS</td>
                    <td> </td>

                    <?php for ($i=0; $i < 13; $i++){?>
                    <td style="border:1px solid;">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="ambosOjosCerca" name="ambosOjosCerca" value="<?=$i?>">
                            </label>
                        </div>
                    </td>
                    <?php } ?>            
                </tr>
        </table>

        </div>



        
        <div class="col-8 mt-5">

            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="text-center">PROFUNDIDAD</h2>
                </div>

                <div class="col-12">
                    <div class="row justify-content-center mb-3">
                            <div class="col-1 mt-2">
                                Figuras
                            </div>
                            <div class="col-4">
                                <select class="form-control" name="figuras" id="figuras">


                                <option value="si">Si</option>
                                <option value="no">No</option>
                                    

                                </select>

                            </div>
                    </div>
                </div>


                <div class="col-5">

                    <table style="border:1px solid;">
                            
                            <tr><h3 class="text-center">ANIMALES</h3></tr>
                            
                            <tr>
                                <td style="width:40px;">A</td>
                                <td></td>

                                <?php for ($i=0; $i < 5; $i++){?>
                                <td>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" id="animalesA" name="animalesA" value="<?=$i?>">
                                        </label>
                                    </div>
                                </td>
                                <?php } ?>            
                            </tr>

                            <tr>
                                <td>B</td>
                                <td> </td>

                                <?php for ($i=0; $i < 5; $i++){?>
                                <td>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" id="animalesB" name="animalesB" value="<?=$i?>">
                                        </label>
                                    </div>
                                </td>
                                <?php } ?>            
                            </tr>

                            <tr>
                                <td>C</td>
                                <td> </td>

                                <?php for ($i=0; $i < 5; $i++){?>
                                <td>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" id="animalesC" name="animalesC" value="<?=$i?>">
                                        </label>
                                    </div>
                                </td>
                                <?php } ?>            
                            </tr>
                    </table>        

                </div>
           </div>
        </div>


        <div class="col-8 mt-5">

            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="text-center">COLORES PRIMARIOS</h2>
                </div>

                <div class="col-12">
                    <div class="row justify-content-center mb-3">
                            
                            <div class="col-6">
                                <select class="form-control" name="coloresPrimarios" id="coloresPrimarios">


                                <option value="si">Si</option>
                                <option value="no">No</option>
                                    

                                </select>

                            </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-8 mt-5">

            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="text-center">ENCANDILAMIENTO</h2>
                </div>

                <div class="col-12">
                    <div class="row justify-content-center mb-3">
                            
                            <div class="col-6">
                                <select class="form-control" name="encandilamiento" id="encandilamiento">


                                <option value="reacciona">Reacciona</option>
                                <option value="noReacciona">No reacciona</option>
                                    

                                </select>

                            </div>
                    </div>
                </div>
            </div>
        </div>


        
        <div class="col-8 mt-5">

            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="text-center">RECUPERACION TRAS ENCANDILAMIENTO</h2>
                </div>

                <div class="col-12">
                    <div class="row justify-content-center mb-3">
                            
                            <div class="col-6">
                                <select class="form-control" name="recuperacionEncandilamiento" id="recuperacionEncandilamiento">


                                <option value="reacciona">Reacciona</option>
                                <option value="noReacciona">No reacciona</option>
                                    

                                </select>

                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-8 mt-5">

            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="text-center">VISION NOCTURNA</h2>
                </div>

                <div class="col-12">
                    <div class="row justify-content-center mb-3">
                            
                            <div class="col-6">
                                <select class="form-control" name="visionNocturna" id="visionNocturna">


                                <option value="reacciona">Reacciona</option>
                                <option value="noReacciona">No reacciona</option>
                                    

                                </select>

                            </div>
                    </div>
                </div>
            </div>
        </div>




</div>





<?php
      include 'observaciones.php';
    ?>

    

    
    <input type="text" name="consulta" id="consulta" value="ingresarOptometria" hidden>
    <!-- <input type="text" name="select" id="select" value="ingresarIngresarElectrocardiograma" hidden> -->
    

    <div class="row justify-content-center mb-3">

        <div class="col-4">
            <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarOptometria()" id="btnGuardarOptometria" name="btnGuardarOptometria">
        </div>

    </div>

</form>

</div>