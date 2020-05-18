<?php include "../../global/conexion.php";
include '../plantillas/header.php';
session_start();

$cargo = '';
?>


<div class="container">

    

<div class="row fondo py-5">
    <div class="col-12">
        <h1 class="text-center titulo">INGRESAR EMPRESA Y CARGO</h1>
    </div>
</div>

<div class="row separacion"></div>

<div class="row justify-content-center fondo">
    <div class="col-4"></div>
    <div class="col-8">                     
        <?php include 'datostrabajador.php' ?>
    </div>
</div>

<div class="row separacion"></div>


<div class="row justify-content-center fondo py-5">
 <div class="col-12">
    <form action="signosvitales.php" name="formEmpresaYCargo" id="formEmpresaYCargo" method="post" class="form-group">

        <!-- SELECCIONE TRABAJADOR-->

        <div class="row justify-content-center">


                    <div class="col-8">
                            <label for="">Seleccione empresa</label>

                            <select name="nombreEmpresa" id="nombreEmpresa" class="form-control selectEmpresa">
                    <?php
                    
                        $sql = "SELECT ID_EMPRESA,RUT_EMPRESA, DV_EMPRESA, NOMBRE_EMPRESA FROM EMPRESA";
                        $resultado = mysqli_query($conexion,$sql);
                        while($row = mysqli_fetch_assoc($resultado)){
                            $nombreEmpresa = utf8_encode($row['NOMBRE_EMPRESA']);
                            $rutEmpresa = $row['RUT_EMPRESA'];
                            $dvEmpresa = $row['DV_EMPRESA'];
                            $idEmpresa = $row['ID_EMPRESA'];
                        ?>
                        <option value="<?=$idEmpresa?>"><?=$rutEmpresa."-".$dvEmpresa." - ".$nombreEmpresa?></option>
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
                    <input type="text" class="form-control" name="cargoTrabajador" id="cargoTrabajador" value="<?= $cargo ?>" maxlength="64">
                </div>
            </div>    

        <input type="text" name="consulta" id="consulta" value="ingresarEmpresaYCargo" hidden>


        
    </form>

    

    </div>
</div> 

<div class="row justify-content-center my-5">
        <div class="col-12">
            <button type="submit" name="siguiente" id="siguiente" class="form-control btn btn-primary btn-block" onclick="validarEmpresaYCargo()">CONTINUAR</button>
            
        </div>
</div>

</div>
<script>$('.selectEmpresa').selectpicker();</script>
<?php include '../plantillas/footer.php'; ?>