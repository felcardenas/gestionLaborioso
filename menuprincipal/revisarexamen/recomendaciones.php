<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Recomendaciones</div></h1>
              
</div>


<form action="" method="post" class="form-group" id="formRecomendaciones" name="formRecomendaciones">
    
    <!-- SELECCIONE EMPRESA -->
    <div class="row justify-content-center">

                            <div class="col-8">
                                <label for=""></label>
                                <textarea class="form-control" id="recomendaciones" name="recomendaciones" rows="15" maxlength="500"></textarea>
                            </div>
    </div>

                    <input type="text" name="consulta" id="consulta" value="ingresarRecomendaciones" hidden>
                        <div class="row justify-content-center mt-5">
                            <div class="col-8">
                                    <input type="button" 
                                    name="siguiente" 
                                    id="siguiente" 
                                    class="form-control btn btn-primary" 
                                    value="GUARDAR"
                                    onclick="validarRecomendaciones()">
                            </div>
                        </div>

                        
</form>