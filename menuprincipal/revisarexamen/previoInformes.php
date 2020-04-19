<?php 

session_start();
include '../../global/conexion.php';
$idEvaluacion = $_SESSION["idEvaluacion"];

 ?>


<div class="container-fluid">



<h1 class="text-center py-5">GENERAR INFORMES</h1>

        <div class="row justify-content-center">
            <div class="col-4">
           
            </div>
        </div>

        <form action="" id="formInformes" class="form-group" method="post">
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
                    <option value="<?=$nombreEmpresa?>"><?=$nombreEmpresa?></option>
                        <?php
                    } 
                    mysqli_free_result($resultado);
                    ?>
                  
            </select>
            </div>
            
            <div class="col-8">
                 <label for="">Ingrese cargo</label>
                <input type="text" class="form-control" name="cargoTrabajador" id="cargoTrabajador" value="" maxlength="50">
            </div>

            <div class="col-8">
                <label for="">Seleccione médico</label>
            <select name="nombreMedico" id="nombreMedico" class="form-control">
                <?php
                
                    $sql = "SELECT NOMBRE_USUARIO, APELLIDO_USUARIO FROM USUARIO WHERE CARGO = 'MEDICO'";
                    $resultado = mysqli_query($conexion,$sql);
                    while($row = mysqli_fetch_assoc($resultado)){
                        $nombreMedico = utf8_encode($row['NOMBRE_USUARIO']);
                        $apellidoMedico = utf8_encode($row['APELLIDO_USUARIO']);
                     ?>
                    <option value="<?=$nombreMedico." ".$apellidoMedico?>"><?=$nombreMedico." ".$apellidoMedico?></option>
                        <?php
                    } 
                    mysqli_free_result($resultado);
                    ?>
                  
            </select>
            </div>



            <div class="col-8 my-3">
                <button type="submit" class="btn btn-primary btn-block" onclick="return generarInformeEmpresa()">GENERAR INFORME EMPRESA</button>
            </div>

            <div class="col-8 my-3">
                <button type="submit" class="btn btn-primary btn-block" onclick="return generarInformeTrabajador()">GENERAR INFORME TRABAJADOR</button>
            </div>

            </div>
        </form>

    
    
</div>



<?php include '../plantillas/footer.php' ?>



