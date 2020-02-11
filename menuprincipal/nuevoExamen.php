<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Nuevo Exámen</div></h1>
</div>

<form id="formNuevoExamen" action="" method="post" class="form-group">
    
    <!-- SELECCIONE TRABAJADOR-->
    <div class="row justify-content-center">

                            <div class="col-8">
                                <label for="">Rut trabajador</label>
                                    <input type="text" name="rutTrabajador" id="rutTrabajador" class="form-control"
                                    onkeyup="formateaRut(this)"
                                    onchange="formateaRut(this)"
                                    maxlength="13"
                                    >
                            </div>

    </div>

    <input type="text" name="consulta" id="consulta" value="nuevoExamen" hidden>

                        <div class="row justify-content-center mt-5">
                            <div class="col-8">
                                    <input type="button" name="btnNuevoExamen" id="btnNuevoExamen" class="form-control btn btn-primary" 
                                    onclick="validarFormularioNuevoExamen()" 
                                    value="Continuar">

                            </div>
                        </div>

</form>