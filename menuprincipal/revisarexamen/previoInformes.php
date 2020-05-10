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

        <form action="" name="formInformes" id="formInformes" class="form-group" method="post">
            <div class="row justify-content-center">
                <div class="col-8">
                    <label for="">Seleccione empresa</label>
                <select name="nombreEmpresa" id="nombreEmpresa" class="form-control">
                    <?php
                    
                        $sql = "SELECT NOMBRE_EMPRESA FROM EMPRESA";
                        $resultado = mysqli_query($conexion,$sql);
                        while($row = mysqli_fetch_assoc($resultado)){
                            $nombreEmpresa = utf8_encode($row['NOMBRE_EMPRESA']);
                        ?>
                        <option value="<?=$nombreEmpresa?>" <?php 
                            if($nombreEmpresaUltimoRegistro == $nombreEmpresa){
                                echo 'selected';
                            }
                        ?>
                        ><?=$nombreEmpresa?></option>
                            <?php
                        } 
                        mysqli_free_result($resultado);
                        ?>
                    
                </select>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-8">
                    <label for="">Ingrese cargo</label>
                    <input type="text" class="form-control" name="cargoTrabajador" id="cargoTrabajador" value="<?= $cargo ?>" maxlength="50">
                </div>
            </div>    

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
                            class="form-control btn btn-primary" 
                            value="GENERAR INFORMES"
                            onclick="ingresarDatosInformes()"
                            >
                </div>

                


            </div>

            <hr>

            <div class="row justify-content-center">

                <div class="col-4 my-3">
                    <input class="form-control btn btn-primary" 
                    type="button" 
                    value="REVISAR PDF TRABAJADOR"
                    onclick="revisarPDFTrabajador()">
                </div>


                <input type="text" name="select" id="select" value="selectInformes" hidden>


                <div class="col-4 my-3">
                <!-- <label for="">Fecha y hora</label> -->
                <select onchange="obtenerParametrosInformes()" name="fechaHora" id="fechaHora" class="form-control">
                    <?php 

                        $sql = "SELECT DISTINCT FECHA, HORA FROM `INFORMES` WHERE ID_EVALUACION = '$idEvaluacion' ORDER BY `FECHA` DESC, `HORA` DESC";

                        $resultado = mysqli_query($conexion,$sql);
                        while($row = mysqli_fetch_assoc($resultado)){
                        $fecha = $row['FECHA'];
                        $hora = $row['HORA']; 

                            $fechaDMA = date("d-m-Y",strtotime($fecha));
                            
                            $fechaHora = $fecha . " " . $hora;
                            $fechaHoraDMA = $fechaDMA . " " . $hora;
                    ?>

                        <option value="<?=$fechaHora?>"><?=$fechaHoraDMA?></option>

                    <?php } ?>
                </select>
                </div>

            </div>


            <div class="row justify-content-center">
                <div class="col-4 my-3">
                        <input class="form-control btn btn-primary" 
                        type="button" 
                        value="REVISAR PDF EMPRESA"
                        onclick="revisarPDFEmpresa()">
                </div>
                
                <div class="col-4">

                </div>


            </div>
            <!-- onclick="generarInformes()" -->


           <!--  <div class="col-8 my-3">
                <button type="submit" class="btn btn-primary btn-block" onclick="return generarInformeEmpresa()">GENERAR INFORME EMPRESA</button>
            </div>

            <div class="col-8 my-3">
                <button type="submit" class="btn btn-primary btn-block" onclick="return generarInformeTrabajador()">GENERAR INFORME TRABAJADOR</button>
            </div> -->

            
        </form>

    
    
</div>



<?php include '../plantillas/footer.php' ?>



