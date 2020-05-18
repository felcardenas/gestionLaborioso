<?php 
$tipoUsuario =$_SESSION['tipoUsuario'];
$mostrar = '';
if($tipoUsuario == 'Estándar'){
    $mostrar = 'hidden';
}
?>

<div class="row justify-content-center mb-3">
        
        <?php if($tipoUsuario != 'Estándar'){?>
        <div class="col-1 mt-2">
            Estado
        </div>
        <?php } ?>
        
        <div class="col-4">
            <select class="form-control" name="estado" id="estado" <?php  echo $mostrar; ?> >


            <option value="Sin evaluar"                 
                <?php 
                    if($estado == "Sin evaluar" || $estado != 'Sin evaluar' && $estado != 'Normal' && $estado != 'Alterado'){
                        echo "selected";
                    }
                ?>
                >Sin evaluar</option>
                <option value="Normal"
                
                <?php 
                    if($estado == "Normal"){
                        echo "selected";
                    }
                ?>
                
                >Normal</option>
                <option value="Alterado"
                <?php 
                    if($estado == "Alterado"){
                        echo "selected";
                    }
                ?>
                >Alterado</option>

                

            </select>

        </div>
</div>