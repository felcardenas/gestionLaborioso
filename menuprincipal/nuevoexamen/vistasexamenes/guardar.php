<div class="col-4">
            <input class="btn btn-primary btn-lg btn-block" type="button" value="GUARDAR" onclick="<?=$onclick?>" id="<?=$id?>" name="<?=$id?>" 
            <?php 
            if(isset($_SESSION['mostrar'])){
                $mostrar = $_SESSION['mostrar'];
                echo $mostrar;
            }else{echo "";}
                ?>>
</div>