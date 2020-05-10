<?php include '../plantillas/header.php';
session_start();
?>

<div class="container">
    

<div class="row fondo py-3">
    <div class="col-12">
        <h1 class="text-center titulo">SELECCIÓN DE BATERÍA DE EXÁMENES</h1>
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

<form action="ingresardatosexamenes.php" method="post">
            
            <div class="row justify-content-center py-3 fondo" style="font-size:20px;">
                <?php include 'consultas/examenes.php'?>
                
            </div>
            
            <!-- <input type="submit" name="submit" class="btn btn-primary mt-4" onclick="return validarCheckBoxExamenes()" value="Continuar"> -->
             <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block mt-4" onclick="return validarCheckBoxExamenes()">CONTINUAR</button> 
                
            
        </form>

        </div>
    <!-- <div class="container-fluid py-3 fondo">

    


        

    </div> -->




<?php include '../plantillas/footer.php';?>