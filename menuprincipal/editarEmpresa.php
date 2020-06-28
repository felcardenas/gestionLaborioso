<?php include '../global/conexion.php';?>

<div class="row justify-content-center">
<h1><div class="col-12 mt-5">Editar Empresa</div></h1>
</div>



                        <div class="row justify-content-center">
                            <div class="col-4">
                                <h6> * TODOS LOS CAMPOS SON OBLIGATORIOS </h6>
                                
                            </div>    
                        </div>


                    <form id="formEditarEmpresa" action="" method="post" class="form-group">
                        
                    <div class="row justify-content-center">


                        <div class="col-8">
                                <label for="">Seleccione empresa</label>

                                <select name="idEmpresa" id="idEmpresa" class="form-control selectpicker" data-live-search="true" onchange="obtenerDatosEmpresa()" autofocus="true">
                                    
                                    <?php
                                    
                                    $sql = "SELECT ID_EMPRESA, RUT_EMPRESA, DV_EMPRESA, NOMBRE_EMPRESA FROM EMPRESA";
                                    
                                    $resultado = mysqli_query($conexion,$sql);
                                    while($row = mysqli_fetch_assoc($resultado)){
                                        //$nombreEmpresa = utf8_encode($row['NOMBRE_EMPRESA']);
                                        $nombreEmpresa = utf8_encode($row['NOMBRE_EMPRESA']);
                                        $rutEmpresa = $row['RUT_EMPRESA'];
                                        $dvEmpresa = $row['DV_EMPRESA'];
                                        $idEmpresa = $row['ID_EMPRESA'];
                                    ?>
                                    <option value="<?=$idEmpresa?>"><?=$rutEmpresa."-".$dvEmpresa." --- ".$nombreEmpresa?></option>
                                        <?php
                                    } 
                                    mysqli_free_result($resultado);
                                    ?>

                                </select>
                        </div>
                    </div>

                        <!-- NOMBRE EMPRESA -->
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <label for="">Nombre empresa</label>
                                <input type="text" name="nombreEmpresa" id="nombreEmpresa" class="form-control"
                                maxlength="128"
                                pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]*$"  
                                title="El campo puede contener solo letras, números y/o espacios" 
                                onkeyup=""
                                onchange=""
                                
                                required
                                >
                            </div>    
                        </div>

                        <!-- RUT EMPRESA -->
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <label for="">Rut empresa</label>
                                <input type="text" name="rutEmpresa" id="rutEmpresa" class="form-control"
                                minlength="7"
                                maxlength="9"
                                pattern="^\d{7,9}$" 
                                title="El campo puede contener solo números" 
                                onkeyup="limpiarNumero(this)"
                                onchange="funcionesRutEmpresa(this)"
                                onblur="funcionesRutEmpresa(this)"
                                readonly="readonly"
                                required
                                >
                                
                            </div>

                            <!-- DV EMPRESA -->
                            <div class="col-2">
                                <label for="">DV</label>
                                <select class="form-control" id="dvEmpresa" name="dvEmpresa" required>
                                            <?php for ($i=0; $i < 10 ; $i++) { ?> 
                                                <option><?= $i ?></option>    
                                            <?php ;}?>
                                            <option>K</option>
                                </select>
                            </div>
                        </div>
                        
                        



                        <!-- NOMBRE REPRESENTANTE -->
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <label for="">Nombre representante</label>
                                <input type="text" name="nombreRepresentante" id="nombreRepresentante" class="form-control"
                                maxlength=""
                                pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$" 
                                title="El campo puede contener solo letras y espacios" 
                                onkeyup=""
                                onchange=""
                                required
                                >
                            </div>
                        </div>

                        <!-- RUT REPRESENTANTE -->
                        <div class="row justify-content-center">
                            <div class="col-6">
                                    <label for="">Rut representante</label>
                                    <input type="text" name="rutRepresentante" id="rutRepresentante" class="form-control"
                                    minlength="7"
                                    maxlength="9"
                                    pattern="\d{7,9}" 
                                    title="El campo puede contener solo números" 
                                    onkeyup="limpiarNumero(this)"
                                    onchange="limpiarNumero(this)"
                                    required
                                    >
                            </div>
                        
                        
                                <!-- DV REPRESENTANTE -->
                                <div class="col-2">
                                    <label for="">DV</label>
                                    <select class="form-control" id="dvRepresentante" name="dvRepresentante" required>
                                        <?php for ($i=0; $i < 10 ; $i++) { ?> 
                                                    <option><?= $i ?></option>    
                                                <?php ;}?>
                                        <option>K</option>
                                    </select>
                                </div>
                        </div>

                        <!-- DIRECCIÓN-->
                        <div class="row justify-content-center">
                            <div class="col-8">
                                    <label for="">Dirección</label>
                                    <input type="text" name="direccionEmpresa" id="direccionEmpresa" class="form-control"
                                    pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]*$"  
                                    title="El campo puede contener solo letras, números y/o espacios" 
                                    maxlength="64"
                                    
                                    >
                            </div>
                        </div>

                        <!-- CORREO -->
                        <div class="row justify-content-center">
                            <div class="col-8">
                                    <label for="">Correo electrónico</label>
                                    <input type="email" name="emailEmpresa" id="emailEmpresa" class="form-control" 
                                    maxlength="64"
                                    pattern="^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$" 
                                    title="El campo debe tener formato de correo. Ej: 'correo@correo.cl'" 
                                    
                                    >
                            </div>
                        </div>

                        <!-- NÚMERO TELEFÓNICO -->
                        <div class="row justify-content-center">
                            <div class="col-8">
                                    <label for="">Número telefónico</label>
                                    <input type="text" name="telefonoEmpresa" id="telefonoEmpresa" class="form-control"
                                    maxlength="" 
                                    pattern="^\d{7,9}$" 
                                    title="El campo puede contener solo números" 
                                    onkeyup=""
                                    onchange=""
                                    
                                    >
                            </div>
                        </div>

                        <input type="text" name="consulta" id="consulta" value="editarEmpresa" hidden>
                        <input type="text" name="validarRut" id="validarRut" value="validarRutEmpresa" hidden>
                        
                        

                        <div class="row justify-content-center mt-4">
                            <div class="col-8">
                                
                                <input type="button" name="btnIngresarEmpresa" id="btnIngresarEmpresa" class="form-control btn btn-primary" onclick="editarDatosEmpresa()" 
                                    value="Grabar empresa">
                                 
                            </div>
                        </div>
                        
                    </form>

<script>
$(document).ready(function(){
    $('.selectpicker').selectpicker(); 
});
</script>

