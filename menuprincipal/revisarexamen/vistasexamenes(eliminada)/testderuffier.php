
<div class="container" >

<div class="row justify-content-center my-5">
    <div class="col-6">
        <h1 class="text-center">TEST DE RUFFIER</h1>
    </div>
</div>



<form action="" method="POST" class="" id="formIngresarTestDeRuffier" name="formIngresarTestDeRuffier">


    <?php //include 'estado.php' ?>

    <div class="row justify-content-center mb-3">
        <div class="col-5" style="margin-top:5px;">
            Previo al inicio del ejercicio (P1)
        </div>

        <div class="col-4">
            <input type="text" class="form-control" name="P1" id="P1" maxlength="3"
            onkeyup="obtenerValorTestDeRuffier()" 
            onchange="obtenerValorTestDeRuffier()">
        </div>


    </div>



    <div class="row justify-content-center mb-3">
        <div class="col-5" style="margin-top:5px;">
            Al momento de terminar el ejercicio (P2)
        </div>

        <div class="col-4">
            <input type="text" class="form-control" name="P2" id="P2" maxlength="3"
            onkeyup="obtenerValorTestDeRuffier()" 
            onchange="obtenerValorTestDeRuffier()"
            >
        </div>

    </div>



    <div class="row justify-content-center mb-3">
        <div class="col-5" style="margin-top:5px;">
            Al minuto de recuperación (P3)
        </div>

        <div class="col-4">
            <input type="text" class="form-control" name="P3" id="P3" maxlength="3"
            onkeyup="obtenerValorTestDeRuffier()" 
            onchange="obtenerValorTestDeRuffier()">
        </div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-3" style="margin-top:5px;">
            Valoración
        </div>

        <div class="col-3">
            <input type="text" class="form-control" name="valoracion" id="valoracion" maxlength="2" disabled>
        </div>

        <div class="col-3">
            <input type="text" class="form-control" name="valoracionTexto" id="valoracionTexto" maxlength="" disabled>
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


    

    
    <input type="text" name="consulta" id="consulta" value="actualizarTestDeRuffier" hidden>
    <!-- <input type="text" name="select" id="select" value="ActualizarTestDeRuffier" hidden> -->
    

    <div class="row justify-content-center mb-3">

        <!-- <div class="col-4">
            <input class="btn btn-primary" type="button" value="Recuperar info. anterior" onclick="mostrarPerfilLipidico()" id="btnMostrarTestDeRuffier" name="btnMostrarTestDeRuffier>
        </div> -->

        <div class="col-4">
            <input class="btn btn-primary btn-lg btn-block" type="button" value="Actualizar" onclick="guardarTestDeRuffier()" id="btnActualizarTestDeRuffier" name="btnActualizarTestDeRuffier">
        </div>

    </div>

</form>

</div>