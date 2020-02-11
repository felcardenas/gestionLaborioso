<div class="row justify-content-center">
    
    <h1><div class="col-12 mt-5">Anamnesis</div></h1>
    
</div>    

<div class="row justify-content-center">
    <div class="col-8 my-5"> 
                            
        <?php include 'datostrabajador.php' ?>
    </div>
</div>


<form action="" method="post">
<div class="row justify-content-center">
    <div class="col-8">
        <label for=""> Empresa </label>
    
            <select name="empresa" id="empresa" class="form-control">

                <?php   
                
                include 'consultas/anamnesisEmpresas.php';
                
                ?>
            </select>

        
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-8">
        <label for=""> Cargo</label>
        <input type="text" class="form-control">
        
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-8">
        <label for=""> Contraindicaciones </label>
        <textarea class="form-control" name="contraindicaciones" id="contraindicaciones" cols="30" rows="10"></textarea>
        
    </div>
</div>



<div class="row justify-content-center">
    
    <div class="col-8">
        <label for=""> Alergias </label>
        <textarea class="form-control" name="alergias" id="alergias" cols="30" rows="5"></textarea>
    </div>
</div>

<div class="row justify-content-center my-2">
    <div class="col-6">
        
        <input type="button" class="btn btn-primary form-control" onclick="" value="Volver">
    </div>
    <div class="col-6">
        <input type="button" class="btn btn-primary form-control" onclick="validarAnamnesis()" value="Continuar">
    </div>
</div>
</form>
