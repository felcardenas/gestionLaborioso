<div class="container py-3">

    

    <div class="row fondo py-5 borderedondeado10 separacion10">
        <div class="col-12">
            <h1 class="text-center titulo">SELECCIONE UN EXAMEN</h1>
        </div>
    </div>

    <div class="row justify-content-center fondo borderedondeado10 separacion10">
        <!-- <div class="col-3"></div> -->
        <div class="col-12 text-center">                     
            <?php include 'datostrabajador.php' ?>
        </div>
    </div>

</div>

<hr>

<div class="container py-3 borderedondeado10 separacion10">

    <div class="row justify-content-center examenesPendientes py-2" style="border-radius:10px 10px 0px 0px;">
    <div class="col-12">
            <h1 class="text-center">EXÁMENES PENDIENTES</h1>
        </div>  
    </div>


    <div class="row justify-content-center examenesPendientes py-2 ">

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
        while($row = mysqli_fetch_assoc($resultado)) {
        
        $horaCreacion = $row['HORA_CREACION'];
        $fechaCreacion = $row['FECHA_CREACION'];
        $idEvaluacion = $row['ID_EVALUACION'];
        
    
        ?>
        
        

    <div class="row justify-content-center examenesPendientes py-2">


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
                <?php //echo $row['CARGO']; ?>
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
    }else{
    printf("Errormessage: %s\n", mysqli_error($conexion));}
    ?>
    <div class="row justify-content-center examenesPendientes py-2" style="border-radius:0px 0px 10px 10px;">
    </div>
</div>
    
<hr>


<div class="container py-3">

<div class="row justify-content-center examenesFinalizados py-2" style="border-radius:10px 10px 0px 0px;">
    <div class="col-12">
        <h1 class="text-center">EXÁMENES FINALIZADOS</h1>
    </div>   
</div>

<div class="row justify-content-center examenesFinalizados py-2">

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

<?php include 'datosEvaluacionFinalizada.php'; 


$contador = 1;



if ($resultado = mysqli_query($conexion, $sql)) {
    while ($row = mysqli_fetch_assoc($resultado)) {
    
    $horaCreacion = $row['HORA_CREACION'];
    $fechaCreacion = $row['FECHA_CREACION'];
    $idEvaluacion = $row['ID_EVALUACION'];
       
    if($contador%2){
        $fondo = '#AAF4B3';
    }else{
        $fondo = '#AAF4B3;';
    }
    ?>
    
    

<div class="row justify-content-center examenesFinalizados py-2">


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
            <?php //echo $row['CARGO']; ?>
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
}else{
printf("Errormessage: %s\n", mysqli_error($conexion));}
?>
<div class="row justify-content-center examenesFinalizados py-2" style="border-radius:0px 0px 10px 10px;">
    </div>

</div>
