<?php include '../plantillas/header.php';
include '../../global/conexion.php';
session_start(); 

if(isset($_POST)){
    $idEvaluacion = $_POST['idEvaluacion'];
}



$_SESSION['ID_EVALUACION']=$idEvaluacion;

 ?>


<div class="container-fluid fondo">



<h1 class="text-center py-5">GENERAR EXÁMEN PARA EMPLEADOR</h1>

        <div class="row justify-content-center">
            <div class="col-4">
            <?php include 'datostrabajador.php';?>
            </div>
        </div>

        <form action="informeEmpresa.php" class="form-group" method="post">
        <div class="row justify-content-center fondo">
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
                <button type="submit" class="btn btn-primary btn-block">GENERAR INFORME</button>
            </div>

            </div>
        </form>

    
    
</div>



<?php include '../plantillas/footer.php' ?>



