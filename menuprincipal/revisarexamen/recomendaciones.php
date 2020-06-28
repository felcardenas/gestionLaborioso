<?php
session_start();
include '../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];

$tabla = "RECOMENDACIONES_EVALUACION";
$campoId = "ID_RECOMENDACIONES";  



/* $sql = "SELECT EXAMEN_FISICO_GENERAL, CABEZA, TORAX, ABDOMEN, EXTREMIDADES_SUPERIORES, EXTREMIDADES_INFERIORES, COLUMNA_GENERAL FROM EVALUACION WHERE ID_EVALUACION = '$idEvaluacion'"; */

$sql = "SELECT FECHA, HORA FROM `RECOMENDACIONES_EVALUACION` WHERE ID_EVALUACION = '$idEvaluacion' ORDER BY `FECHA` DESC, `HORA` DESC, `ID_RECOMENDACIONES` ASC LIMIT 1";

$resultado = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($resultado);
$fecha = $row['FECHA'];
$hora = $row['HORA'];

$sql = "SELECT `ID_RECOMENDACIONES`, `ID_EVALUACION`, `FECHA`, `HORA` FROM `RECOMENDACIONES_EVALUACION` WHERE FECHA = '$fecha' AND HORA = '$hora' AND ID_EVALUACION ='$idEvaluacion'";

$resultado = mysqli_query($conexion,$sql);

$array = array();

$array[1]='0';
$array[2]='0';
$array[3]='0';
$array[4]='0';
$array[5]='0';
$array[6]='0';
$array[7]='0';


while($row = mysqli_fetch_assoc($resultado)){
    //echo $row['ID_RECOMENDACIONES']. " ";
    $idRecomendaciones = $row['ID_RECOMENDACIONES'];
    $array[$idRecomendaciones] = 1;
}

$recomendacion1 = $array[1];
$recomendacion2 = $array[2];
$recomendacion3 = $array[3];
$recomendacion4 = $array[4];
$recomendacion5 = $array[5];
$recomendacion6 = $array[6];
$recomendacion7 = $array[7];

//echo $recomendacion1.$recomendacion2.$recomendacion3.$recomendacion4.$recomendacion5.$recomendacion6.$recomendacion7;


?>

<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Recomendaciones</div></h1>
              
</div>


<form action="" method="post" class="form-group" id="formIngresarRecomendaciones" name="formIngresarRecomendaciones">
    
    


    <div class="row justify-content-center">
    <!-- a.- Reducir el consumo de hidratos de carbono y aumente la actividad física de manera gradual
                        b.- aumente el consumo verduras fresca y de agua pura
                        c.- uso estricto de protectores auditivos en ambientes con ruido.
                        d.- aumente el consumo de verdura y líquidos
                        e.- evite escuchar música con auriculares 
                        f.- reduzca el consumo de sal
                        g. no debe trabajar en ambientes con ruido industrial. -->
                        <div class="col-8">

                            <label for="recomendacion1">
                            <input type="checkbox" name="seleccionado[]" id="recomendacion1" value="1" <?php if($recomendacion1 == 1){echo "checked";} ?>> Reducir el consumo de hidratos de carbono y aumente la actividad física de manera gradual. 
                            </label>
                        </div> 

                        <div class="col-8">
                            <label for="recomendacion2">
                                <input type="checkbox" name="seleccionado[]" id="recomendacion2" value="2" <?php if($recomendacion2 == 1){echo "checked";} ?>>
                                Aumente el consumo verduras fresca y de agua pura.
                            </label>
                        </div>

                        <div class="col-8">
                            <label for="recomendacion3">
                                <input type="checkbox" name="seleccionado[]" id="recomendacion3" value="3" <?php if($recomendacion3 == 1){echo "checked";} ?>>
                                Uso estricto de protectores auditivos en ambientes con ruido.
                            </label>
                        </div>

                        <div class="col-8">
                            <label for="recomendacion4">
                                <input type="checkbox" name="seleccionado[]" id="recomendacion4" value="4" <?php if($recomendacion4 == 1){echo "checked";} ?>>
                                Aumente el consumo de verdura y líquidos.
                            </label>
                        </div>

                        <div class="col-8">
                            <label for="recomendacion5">
                                <input type="checkbox" name="seleccionado[]" id="recomendacion5" value="5" <?php if($recomendacion5 == 1){echo "checked";} ?>>
                                Evite escuchar música con auriculares.
                            </label>
                        </div>

                        <div class="col-8">
                            <label for="recomendacion6">
                                <input type="checkbox" name="seleccionado[]" id="recomendacion6" value="6" <?php if($recomendacion6 == 1){echo "checked";} ?>>
                                Reduzca el consumo de sal.
                            </label>
                        </div>

                        <div class="col-8">
                            <label for="recomendacion7">
                                <input type="checkbox" name="seleccionado[]" id="recomendacion7" value="7" <?php if($recomendacion7 == 1){echo "checked";} ?>>
                                No debe trabajar en ambientes con ruido industrial.
                            </label>
                        </div>
                        
    </div>

    

    <!-- SELECCIONE EMPRESA --><!-- 
    <div class="row justify-content-center">

                            <div class="col-8">
                                <label for=""></label>
                                <textarea class="form-control" id="recomendaciones" name="recomendaciones" rows="15" maxlength="500"></textarea>
                            </div>
    </div> -->
                    <input type="text" name="cadenaRecomendaciones" id="cadenaRecomendaciones" hidden>
                    <input type="text" name="consulta" id="consulta" value="ingresarRecomendaciones" hidden>
                    <input type="text" name="select" id="select" value="selectRecomendaciones" hidden>
                       
                        <div class="row justify-content-center mt-5">
                            <div class="col-4">
                                    <input type="button" 
                                    name="siguiente" 
                                    id="siguiente" 
                                    class="form-control btn btn-primary" 
                                    value="GUARDAR"
                                    onclick="validarRecomendaciones()"
                                    <?php $mostrar = $_SESSION['mostrar'];
                                    echo $mostrar;?>>
                            </div>

                            <div class="col-4">
                                    <select class="form-control" onchange="obtenerParametrosRecomendaciones()" name="fechaHora" id="fechaHora">
                                
                                        <?php include 'selectDatosAnteriores.php'; ?>
                                    
                                    </select>
                            </div>
                        </div>

                        
</form>