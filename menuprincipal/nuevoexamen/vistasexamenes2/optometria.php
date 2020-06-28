<?php 

session_start();
include '../../../global/conexion.php';
$idExamen = '1';
$idEvaluacion = $_SESSION["idEvaluacion"];
$limit = '16';

// EXAMEN.ID_EXAMEN, EXAMEN.NOMBRE_EXAMEN, PARAMETRO.ID_PARAMETRO, PARAMETRO.NOMBRE_PARAMETRO, EVALUACION_PARAMETRO.VALOR_PARAMETRO, EVALUACION_PARAMETRO.FECHA, EVALUACION_PARAMETRO.HORA;



/* $sql = "SELECT EVALUACION_PARAMETRO.VALOR_PARAMETRO, EVALUACION_PARAMETRO.ID_PARAMETRO 
FROM EVALUACION_PARAMETRO 
INNER JOIN PARAMETRO 
ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO 
INNER JOIN EXAMEN 
ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN
WHERE ID_EVALUACION = '$idEvaluacion'"; */

$sql = "SELECT PARAMETRO.ID_PARAMETRO, EVALUACION_PARAMETRO.VALOR_PARAMETRO FROM EVALUACION_PARAMETRO 
INNER JOIN PARAMETRO ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO
INNER JOIN EXAMEN ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN 
WHERE EXAMEN.ID_EXAMEN = '$idExamen' AND EVALUACION_PARAMETRO.ID_EVALUACION = '$idEvaluacion'
ORDER BY `FECHA` DESC, `HORA` DESC, PARAMETRO.`ID_PARAMETRO` ASC LIMIT $limit";

$ojoDerechoLejos = 0;
    $ojoIzquierdoLejos = 0;
    $ambosOjosLejos = 0;
    $ojoDerechoCerca = 0;
    $ojoIzquierdoCerca = 0;
    $ambosOjosCerca = 0;
    $figuras = 'Si';
    $animalesA = 0;
    $animalesB = 0;
    $animalesC = 0;
    $coloresPrimarios = 'Si';
    $encandilamiento = 'Reacciona';
    $recuperacionEncandilamiento = 'Reacciona';
    $visionNocturna = 'Reacciona';
    $estado = 'Sin evaluar';
    $observaciones = '';


$resultado = mysqli_query($conexion,$sql);
//echo mysqli_num_rows($resultado);
if(mysqli_num_rows($resultado)>0){
    while($row = mysqli_fetch_assoc($resultado)){

        $idParametro = $row['ID_PARAMETRO'];
        
        switch($idParametro){        
            case '85':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $ojoDerechoLejos = $valorParametro;
            break;   
                
            case'86':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $ojoIzquierdoLejos = $valorParametro;
            break;
    
            case'87':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $ambosOjosLejos = $valorParametro;
            break;
    
            case'88':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $ojoDerechoCerca = $valorParametro;
            break;
    
                
            case'89':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $ojoIzquierdoCerca = $valorParametro;
            break;
    
            case'90':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $ambosOjosCerca = $valorParametro;
            break;
            
            case'91':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $figuras = $valorParametro;
            break;
    
                
            case'92':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $animalesA = $valorParametro;
            break;
    
            case'93':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $animalesB = $valorParametro;
            break;
            
            case'94':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $animalesC = $valorParametro;
            break;
    
                
            case'95':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $coloresPrimarios = $valorParametro;
            break;
    
            case'96':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $encandilamiento = $valorParametro;
            break;
            
            case'97':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $recuperacionEncandilamiento = $valorParametro;
            break;
    
                
            case'98':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $visionNocturna = $valorParametro;
            break;
    
            case'99':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $estado = $valorParametro;
                
            break;
            
            case'100':
                $valorParametro = $row['VALOR_PARAMETRO'];
                $observaciones = $valorParametro;
            break;

            
        }
        
    }
    
}

$estado = trim($estado);
//echo $estado . " ".strlen($estado);

?>


<div class="container" >

<div class="row justify-content-center my-5">
    <div class="col-6">
        <h1 class="text-center">OPTOMETRÍA</h1>
    </div>
</div>




<form action="" method="POST" class="" id="formIngresarOptometria" name="formIngresarOptometria">


<?php include 'estado.php' ?>
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
                                <input type="radio" class="form-check-input" id="ojoDerechoLejos" name="ojoDerechoLejos" value="<?=$i?>"
                                <?php if($ojoDerechoLejos == $i){
                                    echo "checked";
                                }?>> 
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
                                <input type="radio" class="form-check-input" id="ojoIzquierdoLejos" name="ojoIzquierdoLejos" value="<?=$i?>"
                                <?php if($ojoIzquierdoLejos == $i){
                                    echo "checked";
                                }?>>
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
                                <input type="radio" class="form-check-input" id="ambosOjosLejos" name="ambosOjosLejos" value="<?=$i?>"
                                <?php if($ambosOjosLejos == $i){
                                    echo "checked";
                                }?>>
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
                                <input type="radio" class="form-check-input" id="ojoDerechoCerca" name="ojoDerechoCerca" value="<?=$i?>"
                                <?php if($ojoDerechoCerca == $i){
                                    echo "checked";
                                }?>>
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
                                <input type="radio" class="form-check-input" id="ojoIzquierdoCerca" name="ojoIzquierdoCerca" value="<?=$i?>"
                                <?php if($ojoIzquierdoCerca == $i){
                                    echo "checked";
                                }?>>
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
                                <input type="radio" class="form-check-input" id="ambosOjosCerca" name="ambosOjosCerca" value="<?=$i?>"
                                <?php if($ambosOjosCerca == $i){
                                    echo "checked";
                                }?>>
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
                                    <option value="Si" <?php if($figuras == 'Si'){echo "selected";}?>>Si</option>
                                    <option value="No" <?php if($figuras == 'No'){echo "selected";}?>>No</option>
                                </select>

                            </div>
                    </div>
                </div>


                <div class="col-5">

                    <table style="border:1px solid;">
                            
                            <tr><h3 class="text-center">ANIMALES</h3></tr>
                            
                            <tr>
                                <td style="width:40px;"></td>
                                <td></td>
                                
                                <?php for($i=0; $i < 5; $i++){?> 
                                <td><?=$i?></td>
                                <?php } ?>
                            </tr>

                            <tr>
                                <td style="width:40px;">A</td>
                                <td></td>

                                <?php for ($i=0; $i < 5; $i++){?>
                                <td>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" id="animalesA" name="animalesA" value="<?=$i?>"
                                                <?php if($animalesA == $i){
                                                    echo "checked";
                                                }?>>
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
                                            <input type="radio" class="form-check-input" id="animalesB" name="animalesB" value="<?=$i?>"
                                                <?php if($animalesB == $i){
                                                    echo "checked";
                                                }?>>
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
                                            <input type="radio" class="form-check-input" id="animalesC" name="animalesC" value="<?=$i?>"
                                                <?php if($animalesC == $i){
                                                    echo "checked";
                                                }?>>
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


                                <option value="Si" <?php if($coloresPrimarios == 'Si'){echo "selected";}?>>Si</option>
                                <option value="No" <?php if($coloresPrimarios == 'No'){echo "selected";}?>>No</option>
                                    

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


                                <option value="Reacciona" <?php if($encandilamiento == 'Reacciona'){echo "selected";}?> >Reacciona</option>
                                <option value="No reacciona" <?php if($encandilamiento == 'No reacciona'){echo "selected";}?>>No reacciona</option>
                                    

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

                                <?= $recuperacionEncandelamiento ?>
                                <option value="Reacciona" <?php if($recuperacionEncandilamiento == 'Reacciona'){echo'selected';}?>>Reacciona</option>
                                <option value="No reacciona" <?php if($recuperacionEncandilamiento == 'No reacciona'){echo'selected';}?>>No reacciona</option>
                                    

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


                                <option value="Reacciona" <?php if($visionNocturna == 'Reacciona'){echo "selected";}?> >Reacciona</option>
                                <option value="No reacciona" <?php if($visionNocturna == 'No reacciona'){echo "selected";}?>>No reacciona</option>
                                    

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
    <input type="text" name="select" id="select" value="selectOptometria" hidden>
    

    <div class="row justify-content-center mb-3">

        <div class="col-4">
            <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarOptometria()" id="btnGuardarOptometria" name="btnGuardarOptometria">
        </div>

        <div class="col-4">
                <select class="form-control" onchange="obtenerParametrosOptometria()" name="fechaHora" id="fechaHora">
               <?php include 'selectDatosAnteriores.php' ?>
                </select>
        </div>

    </div>

</form>

</div>