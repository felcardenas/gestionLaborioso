<?php 

if(session_start()){
  session_destroy();
}

$resultado = '';

if(isset($_POST['resultado'])){
    $rut = $_POST['rut'];
    $contraseña = '';
    $resultado = $_POST['resultado'];
    
}else{
  $rut = '';
  $contraseña = '';
}  



//echo $_POST['resultado'];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/sweetalert/dist/sweetalert2.min.css">
    <title>Bienvenido al sistema - Login</title>
  </head>
  
  <body>    
  
    <!--CONTAINER-->
    <div class="container mt-5">
        <!--FILA-->
        <div class="row justify-content-center" style="margin-top:100px">
            <!--COLUMNAS-->
            <div class="col-5">
                <!--TÍTULO-->
                <div class="row justify-content-center mt-2">
                    <div class="col-12">
                      <h1 class="text-center mb-3">SISTEMA GESTIÓN LABORIOSO</h1>
                    </div>

                    <div class="col-6">
                      <img src="img/logosinfondo.png" height="200" width="200" alt="">
                    </div>
                </div>
            
              </div>

            <div class="col-5">
            
                <form action="consultas/validarLogin.php" class="form-group" method="POST">
                        <!--RUT-->

                    <div class="row mt-5">
                        
                        <div class="col-12">
                            <div class="form-group">
                                    <label>RUT USUARIO</label>
                                    <input type="text" 
                                    class="form-control" 
                                    name="rut" 
                                    id="rut" 
                                    placeholder="Ingrese su rut" 
                                    maxlength="12" 
                                    minlength="8"
                                     
                                    title="Debe escribir entre 7 y 9 números" 
                                    onkeyup="formateaRut(this)"
                                    onchange="formateaRut(this)"
                                    value="<?= $rut ?>"
                                    required> 
                                    <!--pattern="\d{7,3}"-->
                                    <!--<input type="text" class="form-control" onkeyup="validarRUT();" name="rut" id="rut" placeholder="Ingrese su rut">-->

                            </div>
                        </div>
                    </div>


                        <!--CONTRASEÑA-->
                        <div class="form-group">
                                <label>CONTRASEÑA</label>
                                <input type="password" 
                                class="form-control" 
                                name="password" 
                                id="password" 
                                placeholder="Ingrese su contraseña" 
                                maxlength="20"
                                value = "<?= $contraseña ?>"
                                required>
                        </div>

                        <!--BOTÓN-->
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-5" onsubmit="return validarRut()">ENTRAR</button>
                </form>

            </div>
            
            
        </div>
               
    </div>
    
   

      
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="plugins/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="js/validarLogin.js"></script>
  </body>
</html>




<?php
  
  if(isset($_POST['resultado'])){
    $resultado = $_POST['resultado'];
    if($resultado == 'credencialesInvalidas'){?>
        <script>
         
          mostrarMensaje("Error","Credenciales inválidas","error");
            function mostrarMensaje(titulo, mensaje, tipoError){
              Swal.fire(
                titulo,
                mensaje,
                tipoError
              );
            }
        </script>
      <?php
    }
  }

  
 ?>