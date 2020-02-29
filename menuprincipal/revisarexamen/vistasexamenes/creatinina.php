
<div class="container" >

<div class="row justify-content-center my-5">
    <div class="col-6">
        <h1 class="text-center">CREATININA</h1>
    </div>
</div>



<form action="" method="POST" class="" id="formIngresarCreatinina" name="formIngresarCreatinina">


    <?php //include 'estado.php' ?>

    


    <div class="row justify-content-center mb-3">
        <div class="col-1 mt-2">
            Estado
        </div>
        <div class="col-4">
            <select class="form-control" name="estado" id="estado">

                <option value="Sin evaluar">Sin evaluar</option>
                <option value="Normal">Normal</option>
                <option value="Alterado">Alterado</option>

            </select>

        </div>

    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-1 mt-2">
            Valor
        </div>
        <div class="col-3">
           <input class="form-control" type="text" id="valor" name="valor">
           
        </div>
        <div class="col-1">mg/dl</div>
    </div>

    <div class="row justify-content-center mb-3" style="margin-top:5px;">
                <div class="col-12">
                    <div class="form-group">
                      <label for="observaciones">OBSERVACIONES</label>
                      <textarea class="form-control" name="observaciones" id="observaciones" rows="8">Sin observaciones</textarea>
                    </div>
                </div>
        </div> 


    

    
    <input type="text" name="consulta" id="consulta" value="ingresarCreatinina" hidden>
    <!-- <input type="text" name="select" id="select" value="ingresarIngresarElectrocardiograma" hidden> -->
    

    <div class="row justify-content-center mb-3">

        <!-- <div class="col-4">
            <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarPerfilLipidico()" id="btnMostrarTestDeRuffier" name="btnMostrarTestDeRuffier>
        </div> -->

        <div class="col-4">
            <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="guardarCreatinina()" id="btnGuardarCreatinina" name="btnGuardarCreatinina">
        </div>

    </div>

</form>

</div>