<!-- style="border-style:solid; border-width:1px; border-radius:10px 10px 10px 10px;" -->

<div class="container" >

    <div class="row justify-content-center my-5">
        <div class="col-6">
            <h1 class="text-center">PERFIL LIPIDICO</h1>
        </div>
    </div>



    <form action="" method="POST" class="" id="formIngresarPerfilLipidico" name="formIngresarPerfilLipidico">

    
        <?php //include 'estado.php' ?>

        <div class="row justify-content-center mb-3">
            <div class="col-2" style="margin-top:5px;">
                Colesterol total
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="colesterolTotal" id="colesterolTotal" maxlength="5">
            </div>

            <div class="col-2" style="margin-top:5px;">
                mg/dl
            </div>

        </div>



        <div class="row justify-content-center mb-3">
            <div class="col-2" style="margin-top:5px;">
                Colesterol HDL
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="colesterolHDL" id="colesterolHDL" maxlength="5">
            </div>

            <div class="col-2" style="margin-top:5px;">
                mg/dl
            </div>

        </div>



        <div class="row justify-content-center mb-3">
            <div class="col-2" style="margin-top:5px;">
                Colesterol LDL
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="colesterolLDL" id="colesterolLDL" maxlength="5">
            </div>

            <div class="col-2" style="margin-top:5px;">
                mg/dl
            </div>

        </div>



        <div class="row justify-content-center mb-3">
            <div class="col-2" style="margin-top:5px;">
                Colesterol VLDL
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="colesterolVLDL" id="colesterolVLDL" maxlength="5">
            </div>

            <div class="col-2" style="margin-top:5px;">
                mg/dl
            </div>

        </div>




        <div class="row justify-content-center mb-3">
            <div class="col-2" style="margin-top:5px;">
                Índice col T/col HDL
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="indiceCol" id="indiceCol" maxlength="5">
            </div>

            <div class="col-2" style="margin-top:5px;">
                mg/dl
            </div>

        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-2" style="margin-top:5px;">
                Triglicéridos
            </div>

            <div class="col-4">
                <input type="text" class="form-control" name="trigliceridos" id="trigliceridos" maxlength="5">
            </div>

            <div class="col-2" style="margin-top:5px;">
                mg/dl
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

        
        <input type="text" name="consulta" id="consulta" value="ingresarPerfilLipidico" hidden>
        <input type="text" name="select" id="select" value="mostrarPerfilLipidico" hidden>
        

        <div class="row justify-content-center mb-3">

           <!--  <div class="col-4">
                <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarPerfilLipidico()" id="btnMostrarPerfilLipidico">
            </div> -->

            <div class="col-4">
                <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarPerfilLipidico()" id="btnGuardarPerfilLipidico">
            </div>

        </div>

    </form>

</div>