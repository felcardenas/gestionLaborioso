<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Exámen físico</div></h1>
              
</div>


<form action="" method="post" class="form-group" id="formExamenFisico" name="formExamenFisico">
    
    <!-- SELECCIONE EMPRESA -->
    <div class="row justify-content-center">

                            <div class="col-8">
                                <label for="">Exámen físico general</label>
                                <textarea class="form-control" id="examenFisicoGeneral" name="examenFisicoGeneral" rows="6" maxlength="500"></textarea>
                            </div>

                            <div class="col-8 mt-2">
                                <label for="">Cabeza</label>
                                <textarea class="form-control" id="cabeza" name="cabeza" rows="6" maxlength="200"></textarea>
                            </div>

                            <div class="col-8 mt-2">
                                <label for="">Torax</label>
                                <textarea class="form-control" id="torax" name="torax" rows="6" maxlength="200"></textarea>
                            </div>

                            <div class="col-8 mt-2">
                                <label for="">Abdómen</label>
                                <textarea class="form-control" id="abdomen" name="abdomen" rows="6" maxlength="200"></textarea>
                            </div>

                            <div class="col-8 mt-2">
                                <label for="">Extremidades superiores</label>
                                <textarea class="form-control" id="extremidadesSuperiores" name="extremidadesSuperiores" rows="6" maxlength="200"></textarea>
                            </div>

                            <div class="col-8 mt-2">
                                <label for="">Extremidades inferiores</label>
                                <textarea class="form-control" id="extremidadesInferiores" name="extremidadesInferiores" rows="6" maxlength="200"></textarea>
                            </div>


                            <div class="col-8 mt-2">
                                <label for="">Columna general</label>
                                <textarea class="form-control" id="columnaGeneral" name="columnaGeneral" rows="6" maxlength="200"></textarea>
                            </div>

    </div>

                    <input type="text" name="consulta" id="consulta" value="ingresarExamenFisico" hidden>
                        <div class="row justify-content-center mt-5">
                            <div class="col-8">
                                    <input type="button" 
                                    name="siguiente" 
                                    id="siguiente" 
                                    class="form-control btn btn-primary" 
                                    value="GUARDAR"
                                    onclick="validarExamenFisico()">
                            </div>
                        </div>

                        
</form>