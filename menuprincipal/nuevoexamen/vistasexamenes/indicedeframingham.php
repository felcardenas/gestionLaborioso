<div class="container" >

    <div class="row justify-content-center my-5">
        <div class="col-7">
            <h1 class="text-center">INDICE DE FRAMINGHAM</h1>
        </div>
    </div>

        <div class="container py-3 mb-5 borderedondeado">
            
        
        <?php //include 'estado.php' ?>
            <div class="row justify-content-center">
                <div class="col-4"><h3>Riesgo a 10 años</h3></div>
                
            </div>

            <div class="row justify-content-center">
                
                <div class="col-2">ALTO</div>
                <div class="col-2">>= 10%</div>
                
            </div>

            <div class="row justify-content-center">
                
                <div class="col-2">MODERADO</div>
                <div class="col-2">5-9%</div>
                
            </div>

            <div class="row justify-content-center">
                
                <div class="col-2">BAJO</div>
                <div class="col-2"><?='< 5%'?></div>
                
            </div>

        </div>

    <form action="" method="POST" class="" id="formIngresarIndiceDeFramingham" name="ingresarIndiceDeFramingham">

        <div class="row justify-content-center mb-3">
           
            <div class="col-2" style="margin-top:5px;">
               Valor
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="valorIndiceDeFramingham" id="valorIndiceDeFramingham" maxlength="2"
                onkeyup="riesgoADiezAnios()" 
                onchange="riesgoADiezAnios()"
                >
            </div>

        </div>

        <div class="row justify-content-center mb-5">
           
            <div class="col-2" style="margin-top:5px;">
               Riesgo a 10 años
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="riesgoDiezAnios" id="riesgoDiezAnios" maxlength="" disabled>
            </div>

        </div>

        <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-12">
                    <div class="form-group">
                      <label for="observaciones">OBSERVACIONES</label>
                      <textarea class="form-control" name="observaciones" id="observaciones" rows="8">Sin observaciones</textarea>
                    </div>
                </div>
        </div> 

        <!-- <div class="row justify-content-center mb-3">

            <div class="col-8">
                <label for="">Observaciones</label>
                <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="4" maxlength="315" ></textarea>
            </div>

        </div> -->

        
        <input type="text" name="consulta" id="consulta" value="ingresarIndiceDeFramingham" hidden>
        <input type="text" name="select" id="select" value="mostrarIndiceDeFramingham" hidden>
        

        <div class="row justify-content-center mb-3">

            <!-- <div class="col-4">
                <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarIndiceDeFramingham()" id="btnMostrarIndiceDeFramingham">
            </div> -->

            <div class="col-4">
                <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarIndiceDeFramingham()" id="btnGuardarIndiceDeFramingham">
            </div>

        </div>

    </form>

</div>