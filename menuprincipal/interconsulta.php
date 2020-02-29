<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">GENERAR INFORMES</div></h1>
</div>


<form action="" method="post" class="form-group" id="formInterconsulta" name="formInterconsulta">
    
    <!-- SELECCIONE EMPRESA -->
    <div class="row justify-content-center">

                            <div class="col-8">
                                <label for="">Rut trabajador</label>
                                    <input type="text" 
                                    name="rutTrabajador" 
                                    id="rutTrabajador" 
                                    class="form-control"
                                    onkeyup="formateaRut(this)"
                                    onchange="formateaRut(this)"
                                    maxlength="13"
                                    >
                            </div>

    </div>

                    <input type="text" name="consulta" id="consulta" value="interconsulta" hidden>
                        <div class="row justify-content-center mt-5">
                            <div class="col-8">
                                    <input type="button" 
                                    name="siguiente" 
                                    id="siguiente" 
                                    class="form-control btn btn-primary" 
                                    value="Generar informe"
                                    onclick="validarGenerarInformes()">
                            </div>
                        </div>

                        
</form>