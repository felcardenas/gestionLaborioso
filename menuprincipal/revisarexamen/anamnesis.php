<?php session_start(); ?>

<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Anamnesis</div></h1>
              
</div>


<form action="" method="post" class="form-group" id="formAnamnesis" name="formAnamnesis">
    
    <!-- SELECCIONE EMPRESA -->
    <div class="row justify-content-center">

                            <div class="col-8">
                                <label for=""></label>
                                <textarea class="form-control" id="anamnesis" name="anamnesis" rows="15" maxlength="500" onchange="desbloquearBoton()" onkeyup="desbloquearBoton()"><?= $_SESSION['anamnesis']?></textarea>
                            </div>
    </div>

                    <input type="text" name="consulta" id="consulta" value="ingresarAnamnesis" hidden>
                        <div class="row justify-content-center mt-5">
                            <div class="col-8">
                                    <input type="button" 
                                    name="btnGuardarAnamnesis" 
                                    id="btnGuardarAnamnesis" 
                                    class="form-control btn btn-primary" 
                                    value="GUARDAR"
                                    onclick="validarAnamnesis()" 
                                   >
                            </div>
                        </div>

                        
</form>