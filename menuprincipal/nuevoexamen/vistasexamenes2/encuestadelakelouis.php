<?php 

session_start();
include '../../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];
$idExamen = '11';

$sql = "SELECT EVALUACION_PARAMETRO.VALOR_PARAMETRO, EVALUACION_PARAMETRO.ID_PARAMETRO 
FROM EVALUACION_PARAMETRO 
INNER JOIN PARAMETRO 
ON EVALUACION_PARAMETRO.ID_PARAMETRO = PARAMETRO.ID_PARAMETRO 
INNER JOIN EXAMEN 
ON PARAMETRO.ID_EXAMEN = EXAMEN.ID_EXAMEN
WHERE ID_EVALUACION = '$idEvaluacion'";

//$valor = '';
$valor = '';
$dolorDeCabeza = 1;
$disminucionDeApetito = 1;
$fatigaDebilidad = 1;
$mareoVertigo = 1;
$dificultadParaDormir = 1;

$estado = 'Sin evaluar';
$observaciones = '';

$resultado = mysqli_query($conexion,$sql);


while($row = mysqli_fetch_assoc($resultado)){
    
    $idParametro = $row['ID_PARAMETRO'];
    
    switch($idParametro){
        
        case '139':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $dolorDeCabeza = $valorParametro;
        break;   
            
        case '140':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $disminucionDeApetito = $valorParametro;
        break;   

        case '141':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $fatigaDebilidad = $valorParametro;
        break;   

        case '142':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $mareoVertigo = $valorParametro;
        break;   

        case '143':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $dificultadParaDormir = $valorParametro;
        break;   

        case '144':
            $valorParametro = $row['VALOR_PARAMETRO'];
            $observaciones = $valorParametro;
        break;   
    }
   
}

$puntaje = $dolorDeCabeza + $disminucionDeApetito + $fatigaDebilidad + $mareoVertigo + $dificultadParaDormir;

?>

<div class="container">

<div class="row justify-content-center my-5">
    <div class="col-6">
        <h1 class="text-center">ENCUESTA DE LAKE LOUIS</h1>
    </div>
</div>



<form action="" method="POST" class="" id="formIngresarEncuestaDeLakeLouis" name="formIngresarEncuestaDeLakeLouis">


    

<div class="row justify-content-center my-5">
    <div class="col-">
        <table>
                <tr><h4 class="text-center"></h4></tr>
                
                <tr>
                    <td></td>
                    <td class="text-center" colspan="3" style="border:1px solid;">Intensidad</td>
                    
                    
                </tr>
                <tr>
                    <td class="text-center" style="border:1px solid;">Síntoma</td>
                    
                    <td style="border:1px solid;">Leve (1)</td>
                    <td style="border:1px solid;">Moderada (2)</td>
                    <td style="border:1px solid;">Incapacitante (3)</td>
                    
                </tr>

                <tr>
                    <td style="border:1px solid;">1. Dolor de cabeza (cefalea)</td>
                    

                    <?php for ($i=1; $i < 4; $i++){?>
                    <td style="border:1px solid;">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                
                                <input type="radio" class="form-check-input" id="dolorDeCabeza" name="dolorDeCabeza" value="<?=$i?>"
                                <?php if($dolorDeCabeza == $i){
                                    echo "checked";
                                }?> onchange="obtenerPuntajeLakeLouis()" onkeyup="obtenerPuntajeLakeLouis()" > 
                            </label>
                        </div>
                    </td>
                    <?php } ?>            
                </tr>

                <tr>
                    <td style="border:1px solid;">2. Disminución de apetito, náusea o vómito</td>
                    

                    <?php for ($i=1; $i < 4; $i++){?>
                    <td style="border:1px solid;">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="disminucionDeApetito" name="disminucionDeApetito" value="<?=$i?>"
                                <?php if($disminucionDeApetito == $i){
                                    echo "checked";
                                }?>
                                onchange="obtenerPuntajeLakeLouis()" onkeyup="obtenerPuntajeLakeLouis()"
                                > 
                            </label>
                        </div>
                    </td>
                    <?php } ?>            
                </tr>

                <tr>
                    <td style="border:1px solid;">3. Fatiga, debilidad</td>
                    

                    <?php for ($i=1; $i < 4; $i++){?>
                    <td style="border:1px solid;">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="fatigaDebilidad" name="fatigaDebilidad" value="<?=$i?>"
                                <?php if($fatigaDebilidad == $i){
                                    echo "checked";
                                }?>
                                onchange="obtenerPuntajeLakeLouis()" onkeyup="obtenerPuntajeLakeLouis()"
                                > 
                            </label>
                        </div>
                    </td>
                    <?php } ?>            
                </tr>

                <tr>
                    <td style="border:1px solid;">4. Mareo, vértigo</td>
                    

                    <?php for ($i=1; $i < 4; $i++){?>
                    <td style="border:1px solid;">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="mareoVertigo" name="mareoVertigo" value="<?=$i?>"
                                <?php if($mareoVertigo == $i){
                                    echo "checked";
                                }?>
                                
                                onchange="obtenerPuntajeLakeLouis()" onkeyup="obtenerPuntajeLakeLouis()"> 
                            </label>
                        </div>
                    </td>
                    <?php } ?>            
                </tr>

                <tr>
                    <td style="border:1px solid;">5. Dificultad para dormir</td>
                    

                    <?php for ($i=1; $i < 4; $i++){?>
                    <td style="border:1px solid;">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="dificultadParaDormir" name="dificultadParaDormir" value="<?=$i?>"
                                <?php if($dificultadParaDormir == $i){
                                    echo "checked";
                                }?>
                                
                                onchange="obtenerPuntajeLakeLouis()" onkeyup="obtenerPuntajeLakeLouis()"> 
                            </label>
                        </div>
                    </td>
                    <?php } ?>            
                </tr>

            <table>
    </div>
</div>

<div class="row justify-content-center">
    

    <div class="col-6"></div>
    <div class="col-2 mt-3">Puntaje</div>
    <div class="col-4 mt-2">
       
        <input type="text" name="puntaje" id="puntaje" class="form-control" value="<?=$puntaje?>" disabled>
    </div>
</div>
    
   <?php //include 'estado.php';
    include 'observaciones.php';
     ?>


    

    
    <input type="text" name="consulta" id="consulta" value="ingresarEncuestaDeLakeLouis" hidden>
    <input type="text" name="select" id="select" value="selectEncuestaDeLakeLouis" hidden>
    

    <div class="row justify-content-center mb-3">

        <!-- <div class="col-4">
            <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarPerfilLipidico()" id="btnMostrarTestDeRuffier" name="btnMostrarTestDeRuffier>
        </div> -->

        <div class="col-4">
            <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarEncuestaDeLakeLouis()" id="btnGuardarEncuestaDeLakeLouis" name="btnGuardarEncuestaDeLakeLouis">
        </div>

        <div class="col-4">
                <select class="form-control" onchange="obtenerParametrosEncuestaDeLakeLouis()" name="fechaHora" id="fechaHora">
               <?php include 'selectDatosAnteriores.php' ?>
                </select>
            </div>


    </div>

</form>

</div>