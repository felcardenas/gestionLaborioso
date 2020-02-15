<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Interconsulta</div></h1>
              
</div>


<form action="informeInterconsulta.php" method="post" class="form-group" id="formInterconsulta" name="formInterconsulta">
    
    <!-- SELECCIONE EMPRESA -->
    <div class="row justify-content-center">

                            <div class="col-8">
                                <label for="">Especialidad</label>
                                <select class="form-control" id="especialidad" name="especialidad">
                                    <option value="seleccioneEspecialidad">Seleccione especialidad</option>
                                    <option value="MEDICINA GENERAL">Médico general</option>
                                    <option value="CARDIOLOGÍA">Cardiólogo</option>
                                    <option value="OFTALMOLOGÍA">Oftalmólogo</option>
                                    <option value="TRAUMATOLOGÍA">Traumatólogo</option>
                                    <option value="PSIQUIATRÍA">Psiquiatra</option>
                                    <option value="NEUROLOGÍA">Neurólogo</option>
                                    <option value="OTORRINOLARINGOLOGÍA">Otorrinolaringólogo</option>
                                    <option value="BRONCOPULMONAR">Broncopulmonar</option>
                                    <option value="GASTROENTEROLOGÍA">Gastroenterólogo</option>
                                    <option value="ENDOCRINOLOGÍA">Endocrinólogo</option>
                                    
                                </select>
                            </div>

                            <div class="col-8">
                                <label for="">Observaciones</label>
                                <textarea class="form-control" id="interconsulta" name="interconsulta" rows="6"></textarea>
                            </div>
    </div>

                    <input type="text" name="consulta" id="consulta" value="interconsulta" hidden>
                        <div class="row justify-content-center mt-5">
                            <div class="col-8">
                                    <input type="submit" 
                                    name="siguiente" 
                                    id="siguiente" 
                                    class="form-control btn btn-primary" 
                                    value="Generar informe"
                                    onclick="return validarInterconsulta()">
                            </div>
                        </div>

                        
</form>