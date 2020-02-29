<div class="container" >

<div class="row justify-content-center my-5">
    <div class="col-6">
        <h1 class="text-center">ENCUESTA DE LAKE LOUIS</h1>
    </div>
</div>



<form action="" method="POST" class="" id="formIngresarEncuestaDeLakeLouis" name="formIngresarEncuestaDeLakeLouis">


    <?php //include 'estado.php' ?>

    

    <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-12">
                    <div class="form-group">
                      <label for="observaciones">OBSERVACIONES</label>
                      <textarea class="form-control" name="observaciones" id="observaciones" rows="8">Sin observaciones</textarea>
                    </div>
                </div>
        </div> 


    

    
    <input type="text" name="consulta" id="consulta" value="ingresarEncuestaDeLakeLouis" hidden>
    <!-- <input type="text" name="select" id="select" value="ingresarIngresarElectrocardiograma" hidden> -->
    

    <div class="row justify-content-center mb-3">

        <!-- <div class="col-4">
            <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarPerfilLipidico()" id="btnMostrarTestDeRuffier" name="btnMostrarTestDeRuffier>
        </div> -->

        <div class="col-4">
            <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarEncuestaDeLakeLouis()" id="btnGuardarEncuestaDeLakeLouis" name="btnGuardarEncuestaDeLakeLouis">
        </div>

    </div>

</form>

</div>