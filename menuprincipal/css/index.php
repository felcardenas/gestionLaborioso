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
</head>



<body>


  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light inverse border-right" id="sidebar-wrapper">
      <div class="sidebar-heading botonmenu">Menú</div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light botonmenu" id="ingresarEmpresa">Ingresar empresa</a>
        <a href="#" class="list-group-item list-group-item-action bg-light botonmenu" id="ingresarTrabajador">Ingresar trabajador</a>
        <a href="#" class="list-group-item list-group-item-action bg-light botonmenu" id="nuevoExamen">Nuevo exámen</a>
        <a href="#" class="list-group-item list-group-item-action bg-light botonmenu" id="revisarExamen">Revisar exámenes</a>
        <a href="#" class="list-group-item list-group-item-action bg-light botonmenu" id="interconsulta">Interconsulta</a>
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
                Usuario
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Cerrar sesión</a>
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

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script src="scripts.js"></script>

</body>



</html>
