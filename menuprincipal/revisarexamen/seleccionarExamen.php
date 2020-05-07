
<div class="container">

    

<div class="row fondo py-5">
    <div class="col-12">
        <h1 class="text-center titulo">SELECCIONE UN EXAMEN</h1>
    </div>
</div>

<div class="row separacion"></div>

<div class="row justify-content-center fondo">
    <!-- <div class="col-3"></div> -->
    <div class="col-12 text-center">                     
        <?php include 'datostrabajador.php' ?>
    </div>
</div>




<div class="row justify-content-center py-2" style="border:1px solid; background-color:#e5e5e5;">

    <!-- <div class="col-1">
        <h5>ID</h5>
    </div>

    <div class="col-2">
        <h5>RUT</h5>
    </div>

    <div class="col-3">
        <h5>NOMBRE</h5>
    </div> -->


    <div class="col-2">
        #
    </div>
    <div class="col-4">
        <h5>EXAMINADOR</h5>
    </div>

    <div class="col-2">
        <h5>FECHA</h5>        
    </div>

    <div class="col-2">
        <h5>HORA</h5>
    </div>

    <div class="col-2">
        
    </div>
</div> 

<?php include 'datos.php'; 


$contador = 1;


if ($resultado = mysqli_query($conexion, $sql)) {
    while ($row = mysqli_fetch_assoc($resultado)) {
    
    $horaCreacion = $row['HORA_CREACION'];
    $fechaCreacion = $row['FECHA_CREACION'];
    $idEvaluacion = $row['ID_EVALUACION'];
        
    ?>
    

    <div class="row justify-content-center py-2" style="border:1px solid; <?php if($contador%2==0)echo 'background-color:#e5e5e5;' ?>">

    <!-- <div class="col-1">
         //$contador++ ?>
    </div>

    <div class="col-2">
         //$row['RUT_TRABAJADOR'] . '-' . $row['DV_TRABAJADOR'] ?>
    </div>

    <div class="col-3">
         //utf8_encode($row['NOMBRE_TRABAJADOR'] . " " . $row['APELLIDO_TRABAJADOR']) ?>
    </div> -->

    <div class="col-2">
    <?=$contador++?>
    </div>

    <div class="col-4">
        <?= utf8_encode($row['NOMBRE_USUARIO'] . " " . $row['APELLIDO_USUARIO']) ?>
    </div>

    <div class="col-2">
        <?php 
            $fecha = new DateTime($fechaCreacion);
            echo $fecha->format('d-m-Y');
        ?>   
    </div>

    <div class="col-2">
        <?= $horaCreacion ?>
    </div>

    <div class="col-2">
        <form action="ingresarDatos.php" method="post">
            <input type="text" name="horaExamen" id="horaExamen" value="<?=$horaCreacion?>" hidden>
            <input type="text" name="fechaExamen" id="fechaExamen" value="<?=$fechaCreacion?>" hidden>
            <input type="text" name="idEvaluacion" id="idEvaluacion" value="<?=$idEvaluacion?>" hidden>

            <button type="submit" class="btn btn-primary btn-block">SELECCIONAR</button>
        </form>
    </div>
</div> 

    <?php
    }
    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
}?>


</div>
