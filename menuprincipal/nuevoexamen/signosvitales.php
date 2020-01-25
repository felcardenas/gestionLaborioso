<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Signos vitales</div></h1>
</div>

<form action="" method="post" class="form-group">
    
    <!-- SELECCIONE TRABAJADOR-->

    <div class="row justify-content-center">

                            <div class="col-4">

                                
                                    <label for="">Pulso (X')</label>
                                        <input type="text" name="pulso" id="pulso" class="form-control" placeholder="Ingrese pulso" pattern="^[0-9]{2,3}$" required>
                               
                            </div>

    </div>

    
     
    <div class="row justify-content-center">

                            <div class="col-4">
                            <label for="">Presión arterial (mm/HG)</label>
                                <div class="row justify-content-center">
                                    <div class="col-5">
                                        
                                        <input type="text" name="tensionDiastolica" id="presionAlta" class="form-control" pattern="^[0-9]{2,3}$" placeholder="T.diastólica" required>
                                        
                                    </div>

                                    <div class="col-1">/</div>

                                    <div class="col-5">
                                        <input type="text" name="tensionSistólica" id="presionBaja" class="form-control" pattern="^[0-9]{2,3}$" placeholder="T.sistólica" required>
                                    </div>
                            
                                </div>

                                
                           
                           
                            </div>

    </div>

    <div class="row justify-content-center">

                            <div class="col-4">
                                <label for="">Peso (kg)</label>
                                    <input type="text" name="peso" id="peso" class="form-control" placeholder="Ingrese peso" pattern="^[0-9]{2,3}$" required>
                            </div>

    </div>

    <div class="row justify-content-center">

                            <div class="col-4">
                                <label for="">Altura (cm)</label>
                                    <input type="text" name="altura" id="altura" class="form-control" placeholder="Ingrese altura" pattern="^[0-9]{2,3}$" required>
                            </div>

    </div>

    <div class="row justify-content-center mt-5">
                            <div class="col-8">
                                    <input type="submit" name="siguiente" id="siguiente" class="form-control btn btn-primary" value="Continuar">
                            </div>
                        </div>

</form>