<?php 
$tipoUsuario =$_SESSION['tipoUsuario'];
$mostrar = '';
if($tipoUsuario == 'Estándar'){
    $mostrar = 'readonly="readonly"';
    $mostrar = 'hidden'; 
}
?>

<div class="row justify-content-center mb-3">
        
        
        <div class="col-1 mt-2">
            Estado
        </div>
        
        
        <div class="col-4">

            <select class="form-control" name="estado" id="estado">

            
                <option value="Sin evaluar"                 
                <?php 
                    if($estado == "Sin evaluar" || $estado != 'Sin evaluar' && $estado != 'Apto' && $estado != 'No apto'){
                        echo "selected";
                    }else{
                        echo $mostrar;
                    }

                    
                ?>
                >Sin evaluar</option>
                <option value="Apto"
                
                <?php 
                    if($estado == "Apto"){
                        echo "selected";
                    }else{
                        if($tipoUsuario == 'Estándar'){
                            echo $mostrar; 
                        }
                    }
                ?>
                >Apto</option>
                <option value="No apto"
                <?php 
                    if($estado == "No apto"){
                        echo "selected";
                    }else{
                        if($tipoUsuario == 'Estándar'){
                        echo $mostrar; 
                    }
                }
                ?>
                >No apto</option>
                
                

            </select>

        </div>
</div>