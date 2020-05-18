<?php 
session_start();



if(!isset($_SESSION['control'])){
  echo 'Usted no tiene autorización para ver esta página';
  die();
}else{

}

$_SESSION['rutTrabajador'] = '';
$_SESSION['nombreTrabajador'] = '';
$_SESSION['apellidosTrabajador'] = '';
$_SESSION['horaActual'] = '';
$_SESSION['fechaActual'] = '';
$_SESSION['idEvaluacion'] = '';

$_SESSION['peso'] = '';
$_SESSION['altura'] = '';
$_SESSION['imc'] = '';
$_SESSION['pulso'] = '';
$_SESSION['tensionDiastolica'] = '';
$_SESSION['tensionSistolica'] = '';

$_SESSION['cargoTrabajador'] = '';
$_SESSION['nombreEmpresa'] = '';

$_SESSION['fecha'] = '';
$_SESSION['hora'] = '';


?>

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




  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light inverse border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">MENU</div>
      <div class="list-group list-group-flush">
      
        <a href="#" class="list-group-item list-group-item-action bg-light botonmenu" id="ingresarEmpresa">Ingresar empresa</a>
        <a href="#" class="list-group-item list-group-item-action bg-light botonmenu" id="ingresarTrabajador">Ingresar trabajador</a>
        <a href="#" class="list-group-item list-group-item-action bg-light botonmenu" id="nuevoExamen">Nuevo exámen</a>
        
        <a href="#" class="list-group-item list-group-item-action bg-light botonmenu" id="revisarExamen">Revisar exámenes</a>

        
        <!-- <a href="#" class="list-group-item list-group-item-action bg-light botonmenu" id="informes">Informes</a> -->
        <!-- <a href="#" class="list-group-item list-group-item-action bg-light botonmenu" id="interconsulta">Interconsulta</a> -->
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">MENÚ</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link botonmenu" href="#" id="inicio">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= $_SESSION['nombreUsuario']." ".$_SESSION['apellidoUsuario']." (".$_SESSION['tipoUsuario'].")" ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../index.php">Cerrar sesión
                    <?php 
                        
                    ?>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid" id="contenido">

          <div class="row justify-content-center">
              <?php include 'bienvenida.php' ?>
          </div>

        </div>
        
      </div>
    </div>

  <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->


  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
  <!-- Menu Toggle Script -->
  
  <script src="../plugins/sweetalert/dist/sweetalert2.all.min.js"></script>
  <script src="scripts.js"></script>
  

</body>



</html>