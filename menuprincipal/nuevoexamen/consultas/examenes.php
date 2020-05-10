<?php 

include '../../global/conexion.php';

$sql = 'select BATERIA_DE_EXAMENES.NOMBRE_BATERIA_DE_EXAMENES from BATERIA_DE_EXAMENES ORDER BY NOMBRE_BATERIA_DE_EXAMENES';

$resultado = mysqli_query($conexion, $sql);

$campo = 'NOMBRE_BATERIA_DE_EXAMENES';

 if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $examen = utf8_encode($row[$campo]);
?>
        <div class="col-6">
        <label class="form-check-label" for="<?=$examen?>">
            <input type="checkbox" name="seleccionado[]" id="<?=$examen?>" value="<?= $examen ?>" >
            <?= $examen  ?>
        </label>
</div>
<?php
    }

} else {
    echo "NO HAY EXAMENES QUE MOSTRAR";
}
?>