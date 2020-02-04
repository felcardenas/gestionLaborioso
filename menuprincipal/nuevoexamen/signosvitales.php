<?php /* include "../../global/conexion"; */

include '../plantillas/header.php';

?>

<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Signos vitales</div></h1>
</div>

<form action="" id="formSignosVitales" method="post" class="form-group">
    
    <!-- SELECCIONE TRABAJADOR-->

    <div class="row justify-content-center">

                            <div class="col-4">

                                
                                    <label for="">Pulso (X')</label>
                                        <input type="text" name="pulso" id="pulso" class="form-control" placeholder="Ingrese pulso" pattern="^\d{1,3}$"
                                        onkeyup="limpiarNumero(this)"
                                    onchange="limpiarNumero(this)"
                                    maxlength="3"
                                         required>
                               
                            </div>

    </div>

    
     
    <div class="row justify-content-center">

                            <div class="col-4">
                            <label for="">Presión arterial (mm/HG)</label>
                                <div class="row justify-content-center">
                                    <div class="col-5">
                                        
                                        <input type="text" name="tensionDiastolica" id="tensionDiastolica" class="form-control" pattern="^\d{1,3}$" placeholder="T.diastólica" 
                                        maxlength="3"
                                        onkeyup="limpiarNumero(this)"
                                    onchange="limpiarNumero(this)" required>
                                        
                                    </div>

                                    <div class="col-1">/</div>

                                    <div class="col-5">
                                        <input type="text" name="tensionSistolica" id="tensionSistolica" class="form-control" pattern="^\d{1,3}$" placeholder="T.sistólica" 
                                        maxlength="3"
                                        onkeyup="limpiarNumero(this)"
                                    onchange="limpiarNumero(this)" required>
                                    </div>
                            
                                </div>

                                
                           
                           
                            </div>

    </div>

    <div class="row justify-content-center">

                            <div class="col-4">
                                <label for="">Peso (kg)</label>
                                    <input type="text" name="peso" id="peso" class="form-control" placeholder="Ingrese peso" pattern="^\d{1,3}\.{0,1}\d{1}$" maxlength="5" required>
                            </div>

    </div>

    <div class="row justify-content-center">

                            <div class="col-4">
                                <label for="">Altura (cm)</label>
                                    <input type="text" name="altura" id="altura" class="form-control" placeholder="Ingrese altura" pattern="^\d{1,3}$" 
                                    onkeyup="limpiarNumero(this)"
                                    onchange="limpiarNumero(this)" 
                                    maxlength="3"
                                    required>
                            </div>

    </div>

    <input type="text" name="consulta" id="consulta" value="signosVitales" hidden>

    <div class="row justify-content-center mt-5">
                            <div class="col-8">
                                    <input type="button" name="siguiente" id="siguiente" class="form-control btn btn-primary" onclick="validarSignosVitales()" value="Continuar">
                            </div>
                        </div>

</form>


<?php include '../plantillas/footer.php'; ?>