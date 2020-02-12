<!-- style="border-style:solid; border-width:1px; border-radius:10px 10px 10px 10px;" -->

<div class="container" >

    <div class="row justify-content-center my-5">
        <div class="col-6">
            <h1 class="text-center">ESPIROMETRÍA BASAL</h1>
        </div>
    </div>

    <form action="" method="POST" class="" id="formIngresarEspirometriaBasal" name="formIngresarEspirometriaBasal">

    <div class="container borderedondeado">
        
    <div class="row justify-content-center my-3">
        <div class="col-6">
            <h3 class="text-center">TEÓRICO</h3>
        </div>
    </div>

    
        

        
            <?php //include 'estado.php' ?>

            <div class="row justify-content-center mb-3">
                <div class="col-2" style="margin-top:5px;">
                    
                </div>

                <div class="col-2" style="margin-top:5px;">
                    PROMEDIO
                </div>

                <div class="col-2" style="margin-top:5px;">
                    LÍMITE** INFERIOR
                </div>

            </div>




            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    CVF(L)
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="cvflPromedio" id="cvflPromedio" maxlength="5">
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="cvflLimiteInferior" id="cvflLimiteInferior" maxlength="5">
                </div>

            </div>


            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    VEF1(L)
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="vef1lPromedio" id="vef1lPromedio" maxlength="5">
                </div>

                <div class="col-2">
                <input type="text" class="form-control" name="vef1lLimiteInferior" id="vef1lLimiteInferior" maxlength="5">
                </div>

            </div> 



            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    FEF25-75(L/s)
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="fef2575Promedio" id="fef2575Promedio" maxlength="5">
                </div>

                <div class="col-2">
                <input type="text" class="form-control" name="fef2575LimiteInferior" id="fef2575LimiteInferior" maxlength="5">
                </div>

            </div> 





            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    VEF1/CVF (%)
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="vef1cvfPromedio" id="vef1cvfPromedio" maxlength="5">
                </div>

                <div class="col-2">
                <input type="text" class="form-control" name="vef1cvfLimiteInferior" id="vef1cvfLimiteInferior" maxlength="5">
                </div>

            </div> 
    
    </div>


    <!-- ************************************************* -->

    <div class="container borderedondeado my-5">
        
    <div class="row justify-content-center my-3">
        <div class="col-6">
            <h3 class="text-center">OBSERVADO</h3>
        </div>
    </div>

    <div class="row justify-content-center my-5">
        <div class="col-6">
            <h4 class="text-center">BASAL</h4>
        </div>
    </div>

    
            <?php //include 'estado.php' ?>

            <div class="row justify-content-center mb-3">
                <div class="col-2" style="margin-top:5px;">
                    ABSOLUTO
                </div>

                <div class="col-2" style="margin-top:5px;">
                    % TEÓRICO
                </div>

            </div>




            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    <input type="text" class="form-control" name="absoluto1" id="absoluto1" maxlength="5">
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="teorico1" id="teorico1" maxlength="5">
                </div>

            </div>


            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    <input type="text" class="form-control" name="absoluto2" id="absoluto2" maxlength="5">
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="teorico2" id="teorico2" maxlength="5">
                </div>

            </div>



            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    <input type="text" class="form-control" name="absoluto3" id="absoluto3" maxlength="5">
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" name="teorico3" id="teorico3" maxlength="5">
                </div>

            </div>


            <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-2">
                    <input type="text" class="form-control" name="absoluto4" id="absoluto4" maxlength="5">
                </div>

                <div class="col-2">
                   
                </div>

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

        
        <input type="text" name="consulta" id="consulta" value="ingresarEspirometriaBasal" hidden>
        <input type="text" name="select" id="select" value="ingresarEspirometriaBasal" hidden>
        

        <div class="row justify-content-center mb-3">

            <div class="col-4">
                <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarEspirometriaBasal()" id="btnGuardarEspirometriaBasal">
            </div>

        </div>

    </form>

</div>