<div class="row justify-content-center">
              <h1><div class="col-12 mt-5">Revisar exámen</div></h1>
</div>

<form action="" method="post" class="form-group">
    
    <!-- SELECCIONE TRABAJADOR-->
    <div class="row justify-content-center">

                            <div class="col-6">
                                <label for="">Rut trabajador</label>
                                    <input type="text" name="rutTrabajador" id="rutTrabajador" class="form-control">
                            </div>

                            <div class="col-2">
                                    <label for="">DV</label>
                                    <select class="form-control" id="dvTrabajador" name="dvTrabajador">
                                            <?php for ($i=0; $i < 10 ; $i++) { ?> 
                                                <option><?= $i ?></option>    
                                            <?php ;}?>
                                            <option>K</option>
                                    </select>
                                </div>
    </div>

                        <div class="row justify-content-center mt-5">
                            <div class="col-8">
                                    <input type="submit" name="siguiente" id="siguiente" class="form-control btn btn-primary" value="Ver exámenes">
                            </div>
                        </div>

</form>