<?php 

session_start();
include '../../global/conexion.php';
$idTrabajador = $_SESSION['idTrabajador'];
$idEvaluacion = $_SESSION['idEvaluacion'];

$fecha = "";
$hora = "";
$nombreUltimaEspecialidad = "";
$observaciones = "";

$sql="SELECT EVALUACION.ID_TRABAJADOR, EMPRESA.NOMBRE_EMPRESA, INFORMES.CARGO, INFORMES.FECHA, INFORMES.HORA FROM EVALUACION 
INNER JOIN INFORMES ON EVALUACION.ID_EVALUACION = INFORMES.ID_EVALUACION 
INNER JOIN EMPRESA ON INFORMES.ID_EMPRESA = EMPRESA.ID_EMPRESA  WHERE INFORMES.ID_EVALUACION = '$idEvaluacion' AND EVALUACION.ID_TRABAJADOR = '$idTrabajador' ORDER BY INFORMES.FECHA DESC, INFORMES.HORA DESC LIMIT 1";
//echo $sql;

        $fecha = '';
        $hora = '';
        $cargo = '';
        $nombreEmpresaUltimoRegistro = '';


if($resultado = mysqli_query($conexion,$sql)){;
    if($row = mysqli_fetch_assoc($resultado)){
        $fecha = $row['FECHA'];
        $hora = $row['HORA'];
        $cargo = $row['CARGO'];
        $nombreEmpresaUltimoRegistro = $row['NOMBRE_EMPRESA'];

    }
    mysqli_free_result($resultado);
}



?>


<div class="container-fluid">



<h1 class="text-center py-5">GENERAR INFORMES</h1>

        <div class="row justify-content-center">
            <div class="col-4">
           
            </div>
        </div>

        
            <!-- <div class="row justify-content-center">
                <div class="col-8">
                    <label for="">Seleccione empresa</label>
                <select data-live-search="true" name="nombreEmpresa" id="nombreEmpresa" class="form-control selectpicker show-tick selectEmpresa">
                    <?php
                    
                        /* $sql = "SELECT RUT_EMPRESA, DV_EMPRESA, NOMBRE_EMPRESA FROM EMPRESA";
                        $resultado = mysqli_query($conexion,$sql);
                        while($row = mysqli_fetch_assoc($resultado)){
                            $nombreEmpresa = utf8_encode($row['NOMBRE_EMPRESA']);
                            $rutEmpresa = $row['RUT_EMPRESA'];
                            $dvEmpresa = $row['DV_EMPRESA'];
                        ?>
                        <option value="<?=$nombreEmpresa?>" <?php 
                            if($nombreEmpresaUltimoRegistro == $nombreEmpresa){
                                echo 'selected';
                            }
                        ?>
                        ><?=$rutEmpresa."-".$dvEmpresa." - ".$nombreEmpresa?></option>
                            <?php
                        } 
                        mysqli_free_result($resultado); */
                        ?>
                    
                </select>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-8">
                    <label for="">Ingrese cargo</label>
                    <input type="text" class="form-control" name="cargoTrabajador" id="cargoTrabajador" value="<?= $cargo ?>" maxlength="50">
                </div>
            </div>   -->  

            <!--<div class="col-8">
                <label for="">Seleccione médico</label>
             <select name="nombreMedico" id="nombreMedico" class="form-control">
                <?php
                
                    /* $sql = "SELECT NOMBRE_USUARIO, APELLIDO_USUARIO FROM USUARIO WHERE CARGO = 'MEDICO'";
                    $resultado = mysqli_query($conexion,$sql);
                    while($row = mysqli_fetch_assoc($resultado)){
                        $nombreMedico = utf8_encode($row['NOMBRE_USUARIO']);
                        $apellidoMedico = utf8_encode($row['APELLIDO_USUARIO']);
                     ?>
                    <option value="<?=$nombreMedico." ".$apellidoMedico?>"><?=$nombreMedico." ".$apellidoMedico?></option>
                        <?php
                    } 
                    mysqli_free_result($resultado); */
                    ?>
                  
            </select> 
            </div>
            -->

            

            <div class="row justify-content-center">

                <div class="col-8 my-3">
                    
                    <input type="button" 
                            class="form-control btn btn-primary btn-lg" 
                            value="GENERAR NUEVO INFORME"
                            onclick="ingresarDatosInformes()"
                            style="height:100px; width:600px;"
                            <?php 
                                    if($_SESSION['tipoUsuario'] == 'Estándar' || $_SESSION['mostrar'] == 'disabled'){
                                    echo "disabled";}?>
                            >
                </div>
            </div>


            <hr>

            <div class="row justify-content-center">
                                    <h1><div class="col-12 mt-5">LISTADO INFORMES</div></h1>
            </div>
            
            <div class="row justify-content-center mt-5">
        
                            <!-- <div class="col-4">
                                <input type="button" class="form-control btn btn-primary" value="REVISAR PDF" onclick="revisarPDFInterconsulta()">
                            </div> -->


                            <!-- <input type="text" name="select" id="select" value="selectInterconsulta" hidden> -->
                            
                            

                            <div class="col-12">
                             

                                <!-- <select class="form-control" name="fechaHora" id="fechaHora" onchange="obtenerParametrosInterconsulta()"> -->

                                <div class="row justify-content-center text-center">
                                        
                                        <div class="col-2">#</div>
                                        <div class="col-2">FECHA</div>
                                        <div class="col-2">HORA</div>
                                        <div class="col-3">PDF TRABAJADOR</div>
                                        <div class="col-2">PDF EMPRESA</div>
                                        <div class="col-1"></div>
                                        

                                </div>

                                <?php 

                                    $sql = "SELECT DISTINCT INFORMES.CARGO, INFORMES.FECHA, INFORMES.HORA FROM `INFORMES` WHERE ID_EVALUACION = '$idEvaluacion' ORDER BY `FECHA` DESC, `HORA` DESC";
                                    
                                    $resultado = mysqli_query($conexion,$sql);

                                    $i = 1;
                                                                       
                                    while($row = mysqli_fetch_assoc($resultado)){
                                      
                                    
                                    $nameId='formRevisarPDF'.$i;
                                    $fecha = $row['FECHA'];
                                    $hora = $row['HORA']; 
                                    
                                    $fechaHora = $fecha . " " . $hora;
                                    $fechaDMA = date("d-m-Y",strtotime($fecha));
                                    $fechaHoraDMA = $fechaDMA . " " . $hora;
                                    
                                    
                                ?>

                                    <hr style="border-top:1px solid black">

                                    <form action="" method="POST" class="form-group" id="<?=$nameId?>" name="<?=$nameId?>">

                                        <?php if($i){
                                            /* echo $nameId;
                                            echo $fechaHora; */
                                        }?>
                                        
                                        <div class="row text-center">
                                            <input type="text" id="fechaHora" name="fechaHora" value="<?=$fechaHora?>" hidden>
                                            <div class="col-2"><?=$i?></div>
                                            <div class="col-2"><?=$fechaDMA?></div>
                                            <div class="col-2"><?=$hora?></div>
                                            <div class="col-3">
                                                <input type="button" class="form-control btn btn-primary" value="PDF TRABAJADOR" onclick="revisarPDFTrabajador('<?='#'.$nameId?>')">
                                            </div>
                                            <div class="col-2">
                                                <input type="button" class="form-control btn btn-primary" value="PDF EMPRESA" onclick="revisarPDFEmpresa('<?='#'.$nameId?>')">
                                            </div>
                                            <div class="col-1"></div>
                                            
                                        </div>
                                        
                                        
                                    </form> 
                                    
                                
                                    <?php $i++; } ?>
                                
                                <!-- </select> -->
                            </div>
            </div>



            

            
        

    
    
</div>

<script>$('.selectEmpresa').selectpicker();</script>

<?php include '../plantillas/footer.php' ?>