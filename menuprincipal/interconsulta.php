<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Interconsulta</div></h1>
              
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

                            <!-- <div class="col-2">
                                    <label for="">DV</label>
                                    <select class="form-control" id="dvTrabajador" name="dvTrabajador">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>K</option>
                                    </select>
                                </div>
                             -->
                            <div class="col-8">
                                <label for="">Especialidad</label>
                                <select class="form-control" id="especialidad" name="especialidad">
                                    <option value="">Seleccione especialidad</option>
                                    <option value="Medicina interna">Medicina interna</option>
                                    <option value="Medicina general">Medicina general</option>
                                    
                                </select>
                            </div>

                            <div class="col-8">
                                <label for="">Observaciones</label>
                                <textarea class="form-control" id="observacionesInterconsulta" name="observacionesInterconsulta" rows="6"></textarea>
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
                                    onclick="validarInterconsulta()">
                            </div>
                        </div>

                        
</form>