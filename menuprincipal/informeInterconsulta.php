<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bienvenid@</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <link rel="stylesheet" href="../plugins/sweetalert/dist/sweetalert2.min.css">
  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  

  
</head>



<body>

<div class="container">
    
    <div class="row justify-content-center py-2">
        <div class="col-2">
            <img src="../img/logosinfondo.png" alt="" height="200px" width="180px">

        </div>
        <div class="col-4">
            <h1 class="mt-3" style="font-size:60px;">LABORIOSO</h1>
        </div>
        <div class="col-2"></div>
        <div class="col-4 mt-4">
            <?php 
                session_start();
                
                $anio = date('y');
                $mes = date('m');
                $dia = date('d');
                $hoyEs = $dia."/".$mes."/".$anio;
                ?><h5><?="FECHA EMISIÓN: ".$hoyEs?></h5>
                
                <h5>AGENCIA: LABORIOSO</h5>
        </div>
    </div>

    

    <div class="row justify-content-center">
        <h1 style="font-size:55px;">INTERCONSULTA</h1>
    </div>

    <br>

    <div class="row justify-content-center">
        <div class="col-9">

        <p class="text-justify-center" style="font-size:25px;">
        El/la sr/sra <?= "(NOMBRE TRABAJADOR)"//utf8_encode($_SESSION['nombreCompletoTrabajador'])?>, RUT: <?= "11.111.111-1"//$_SESSION['rutCompletoTrabajador']?> con fecha <?=$hoyEs?>, ha sido sometido a evaluación preventiva de salud, en relacion a la cual se solicita control por su sistema previsional de salud con especialidad <?= "(ESPECIALIDAD)"//$_SESSION['especialidad'] ?>, de acuerdo a los siguientes antecedentes:  
        </p>


        </div>
        
        <br>
        <br> 

        <div class="col-9">
        <p class="text-justify-center " style="font-size:25px;">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ea accusamus reiciendis fugiat aliquid delectus minima culpa totam, debitis, eligendi ex dolor ad rerum! Vel reprehenderit sunt laborum exercitationem ex. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ea accusamus reiciendis fugiat aliquid delectus minima culpa totam, debitis, eligendi ex dolor ad rerum! Vel reprehenderit sunt laborum exercitationem ex. 
        </p>
        </div>
    </div>

    <br><br><br><br> 

    <div class="row">
        <div class="col-2">
            <p style="margin-left:130px; font-size:25px;">Atentamente:</p>
        </div>
        
    </div>
    <div class="row" style="height:80px;"></div>
    <div class="row justify-content-center">
        <div class="col-5">
            
        </div>
        <div class="col-4">
            <p>_____________________________________________________</p>
            <p style="font-size:20px;"><?= "Dr(a). NOMBRE DOCTOR"//$_SESSION['usuarioNombreCompleto']?></p>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-9">
            NOTA: teniendo en consideración que la alteración es de índole no laboral, el cumplimiento de esta indicación es de exclusiva responsabilidad del trabajador.
        </div>
        <div class="col-9" style="height:20px;"></div>
        <div class="col-9">
            Esta información podrá ser entregada a terceras personas, exclusivamente con la autorización expresa y por escrito del trabajador, en cuplimiento a lo normado en la ley 19.628. (Instrucción MI G.0. Nº187/99)
        </div>
        
    </div>


</div>



<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
  <!-- Menu Toggle Script -->
  
  <script src="../plugins/sweetalert/dist/sweetalert2.all.min.js"></script>
  <script src="scripts.js"></script>
  

</body>



</html>