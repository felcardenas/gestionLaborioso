<?php /* include "../../global/conexion"; */

include '../plantillas/header.php';
session_start();
?>

<div class="container">

    

<div class="row fondo py-5">
    <div class="col-12">
        <h1 class="text-center titulo">INGRESAR SIGNOS VITALES</h1>
    </div>
</div>

<div class="row separacion"></div>

<div class="row justify-content-center fondo">
    <div class="col-4"></div>
    <div class="col-8">                     
        <?php include 'datostrabajador.php' ?>
    </div>
</div>

<div class="row separacion"></div>


<div class="row justify-content-center fondo py-5">
 <div class="col-12">
    <form action="" id="formSignosVitales" class="" method="post" class="form-group">

        <!-- SELECCIONE TRABAJADOR-->

        <div class="row justify-content-center">

            <div class="col-4">


                <label for="">Pulso (X')</label>
                <input type="text" name="pulso" id="pulso" class="form-control" placeholder="Ingrese pulso" pattern="^\d{1,3}$" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" maxlength="3" required>

            </div>

        </div>



        <div class="row justify-content-center">

            <div class="col-4">
                <label for="">Presión arterial (mm/HG)</label>
                <div class="row justify-content-center">
                    <div class="col-5">

                        <input type="text" name="tensionDiastolica" id="tensionDiastolica" class="form-control" pattern="^\d{1,3}$" placeholder="T.diastólica" maxlength="3" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" required>

                    </div>

                    <div class="col-1">/</div>

                    <div class="col-5">
                        <input type="text" name="tensionSistolica" id="tensionSistolica" class="form-control" pattern="^\d{1,3}$" placeholder="T.sistólica" maxlength="3" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" required>
                    </div>

                </div>




            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-4">
                <label for="">Peso (kg)</label>
                <input type="text" name="peso" id="peso" class="form-control" placeholder="Ingrese peso" pattern="^\d{1,3}\.{0,1}\d{1}$" maxlength="5" onkeyup="obtenerIMC()" onchange="obtenerIMC()" required>
            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-4">
                <label for="">Altura (cm)</label>
                <input type="text" name="altura" id="altura" class="form-control" placeholder="Ingrese altura" pattern="^\d{1,3}$" onkeyup="obtenerIMC()" onchange="obtenerIMC()" maxlength="3" required>
            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-4">
                <label for="">IMC</label>
                <input type="text" name="imc" id="imc" class="form-control" placeholder="0" pattern="^\d{1,3}$" maxlength="4" disabled required>
            </div>

            <p id="imc"></p>
        </div>

        <input type="text" name="consulta" id="consulta" value="signosVitales" hidden>



    </form>



    

    </div>
</div> 

<div class="row justify-content-center my-5">
        <div class="col-12">
            <button type="button" name="siguiente" id="siguiente" class="form-control btn btn-primary btn-block" onclick="validarSignosVitales()">CONTINUAR</button>
            
        </div>
</div>

</div>

<?php include '../plantillas/footer.php'; ?>