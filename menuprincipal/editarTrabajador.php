<?php include '../global/conexion.php';?>

<div class="row justify-content-center">
<h1><div class="col-12 mt-5">Editar Trabajador</div></h1>
</div>



                        <div class="row justify-content-center">
                            <div class="col-4">
                                <h6> * TODOS LOS CAMPOS SON OBLIGATORIOS </h6>
                                
                            </div>    
                        </div>

                        <form action="" method="post" class="form-group" id="formEditarTrabajador">
                        
                        
                        <div class="row justify-content-center">


                        <div class="col-8">
                                <label for="">Seleccione trabajador</label>

                                <select name="idTrabajador" id="idTrabajador" class="form-control selectpicker" data-live-search="true" onchange="obtenerDatosTrabajador()" autofocus="true">
                                    
                                    <?php
                                    
                                    $sql = "SELECT ID_TRABAJADOR, RUT_TRABAJADOR, DV_TRABAJADOR, NOMBRE_TRABAJADOR, APELLIDO_TRABAJADOR FROM trabajador";
                                    
                                    $resultado = mysqli_query($conexion,$sql);
                                    while($row = mysqli_fetch_assoc($resultado)){
                                        $nombreTrabajador = utf8_encode($row['NOMBRE_TRABAJADOR'])." ".utf8_encode($row['APELLIDO_TRABAJADOR']);
                                        $rutTrabajador = $row['RUT_TRABAJADOR'];
                                        $dvTrabajador = $row['DV_TRABAJADOR'];
                                        $idTrabajador = $row['ID_TRABAJADOR'];
                                    ?>
                                    <option value="<?=$idTrabajador?>"><?=$rutTrabajador."-".$dvTrabajador." --- ".$nombreTrabajador?></option>
                                        <?php
                                    } 
                                    mysqli_free_result($resultado);
                                    ?>

                                </select>
                        </div>
                    </div>
                        
                        
                        <!-- NOMBRE TRABAJADOR -->
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <label for="">Nombre</label>
                                <input type="text" name="nombreTrabajador" id="nombreTrabajador" class="form-control"
                                maxlength="40">
                            </div>    

                            <div class="col-8">
                                <label for="">Apellidos</label>
                                <input type="text" name="apellidosTrabajador" id="apellidosTrabajador" class="form-control"
                                maxlength="64">
                            </div>    
                        </div>

                        <!-- RUT TRABAJADOR -->
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <label for="">Rut</label>
                                <input type="text" name="rutTrabajador" id="rutTrabajador"class="form-control"
                                maxlength="9"
                                onkeyup="limpiarNumero(this)"
                                onchange="funcionesRutTrabajador(this)"
                                onblur="funcionesRutTrabajador(this)"
                                readonly="readonly"
                                >
                                
                            </div>

                            <!-- DV TRABAJADOR -->
                            <div class="col-2">
                                <label for="">DV</label>
                                <select class="form-control" id="dvTrabajador" name="dvTrabajador">
                                                <?php for ($i=0; $i < 10 ; $i++) { ?> 
                                                    <option><?= $i ?></option>    
                                                <?php ;}?>
                                       
                                    <option>K</option>
                                </select>
                            </div>

                            <div class="col-2">
                                <label for="">Fecha de nacimiento</label>
                                <input type="date" name="fechaNacimientoTrabajador" id="fechaNacimientoTrabajador" 
                                min="1940-01-01" max="2002-12-31"
                                value="1990-01-01"
                                class="form-control"
                                >
                            </div>
                        </div>

                        <!-- SEXO -->
                        <div class="row justify-content-center"> 
                            <div class="col-8">
                            <label for="">Sexo</label>
                                <select class="form-control" id="sexoTrabajador" name="sexoTrabajador">
                                            <option>Femenino</option>
                                            <option>Masculino</option>
                                            <option>No especifica</option>
                                </select>
                            </div>
                        </div>

                        <!-- DIRECCIÓN-->
                        <div class="row justify-content-center">
                            <div class="col-8">
                                    <label for="">Dirección</label>
                                    <input type="text" name="direccionTrabajador" id="direccionTrabajador" class="form-control"
                                    maxlength="64">
                            </div>
                        </div>

                        <!-- CORREO -->
                        <div class="row justify-content-center">
                            <div class="col-8">
                                    <label for="">Correo electrónico</label>
                                    <input type="email" name="emailTrabajador" id="emailTrabajador" class="form-control"
                                    maxlength="60">
                            </div>
                        </div>

                        <!-- NÚMERO TELEFÓNICO -->
                        <div class="row justify-content-center">
                            <div class="col-8">
                                    <label for="">Número telefónico</label>
                                    <input type="text" name="telefonoTrabajador" id="telefonoTrabajador" class="form-control"
                                    maxlength="9"
                                    onkeyup="limpiarNumero(this)"
                                    onchange="limpiarNumero(this)">
                            </div>
                        </div>

                        <input type="text" name="consulta" id="consulta" value="editarTrabajador" hidden>
                        <input type="text" name="validarRut" id="validarRut" value="validarRutTrabajador" hidden>

                        <div class="row justify-content-center mt-5">
                            <div class="col-8">
                                    <input type="button" name="btnEditarTrabajador" id="btnEditarTrabajador" class="form-control btn btn-primary" 
                                    onclick="editarDatosTrabajador()" 
                                    value="Editar trabajador">
                            </div>
                        </div>
                        
                    </form>

<script>
$(document).ready(function(){
    $('.selectpicker').selectpicker(); 
});
</script>

