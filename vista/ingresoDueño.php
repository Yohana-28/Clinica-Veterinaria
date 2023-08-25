<<?php
  include_once '../modelo/conexionfiltrar.php'

  ?> 
  
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Ingreso </title>
    <link rel="shortcut icon" href="../img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	
		<script src="https://kit.fontawesome.com/dcb1bbced2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://kit.fontawesome.com/dcb1bbced2.css" crossorigin="anonymous">
	
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg bg-info">
      <div class="container-fluid">
        <img src="../img/logo.png" width="5%">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="consulta.php">Consulta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="ingresoDueño.php">Registro dueño mascota</a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white" href="ingresoMascota.php">Registro Mascota</a>
            </li>

            <li class="nav-item">
      
            <a class="nav-link text-white" href="historia_clinica.php">Historia Clinica</a>  
            </li>

            <li class="nav-item">
              <a class="nav-link text-white" href="listado.php">Listado</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="Buscar" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-dark text-white" type="submit">Buscar</button>&nbsp
        <a href="../logout.php" class="btn btn-dark text-white" title="Cerrar Seción"><i class="fas fa-sign-out-alt"></i></a>	
          </form>
        </div>
      </div>
    </nav>
    <br>
    </br>
    <div class="container text-center">
      <div class="row">
        <div class="col">
          <form action="" method="post">
            <div class="card position-relative mx-auto mb-4" style="width: 30rem;">
              <div class="card-header bg-Success  text-white">
                Formulario de registro del Dueño de la mascota
              </div>
              <div class="container text-center">
                <div class="row">
                    <div class='mb-3 col-6'>
                      <label class="form-label" for="Nombre">Nombre del Dueño</label>
                      <input type="text" name="Nombre" placeholder="Nombres" class="form-control">
                    </div>
                    <div class='mb-3 col-6'>
                      <label class="form-label" for="Apellidos">Apellidos del Dueño</label>
                      <input type="text" name="Apellidos" placeholder="Apellidos" class="form-control">
                    </div>
                    <div class='mb-3 col-6'>
                      <label class="form-label" for="tipodoc">Tipo Documento</label>
                      <select name="tipodoc" class="form-control">
                        <option>---Seleccione---</option>
                        <option>---Cedula de Ciudadania---</option>
                        <option>---Cedula de Extranjeria---</option>
                      </select>
                    </div>
                    <div class='mb-3 col-6'>
                      <label class="form-label" for="Documento">Numero de Documento</label>
                      <input type="number" name="Documento" placeholder="Numero Documento" class="form-control">
                    </div>

        
                    <div class='mb-3 col-6'>
                      <label>Fecha de Nacimiento</label>
                      <input type="date" name="Edad" placeholder="Fecha del dueño" class="form-control">
                    </div>
                    <div class='mb-3 col-6'>
                      <label>Telefono </label>
                      <input type="number" name="Telefono" placeholder="Telefono" class="form-control">
                    </div>
                    <div class='mb-3 col-6'>
                      <label>Direccion</label>
                      <input type="varchar" name="Direccion" placeholder="Direccion" class="form-control">
                    </div>
                    <div class='mb-3 col-6'>
                      <label>Email</label>
                      <input type="email" name="email" placeholder="Email " class="form-control">
                    </div>

                      <br>
                  
                  <div>
                    <input type="submit" name="btn_guardar" class="btn btn-dark" value="Guardar">
                  </div>
                </div><br>
              </div>
            </div>
            <?php
            include("../modelo/conexionadd.php");


            try {

              if (isset($_POST['btn_guardar'])) {
                $nombredu = $_POST['Nombre'];
                $apellido = $_POST['Apellidos'];
                $tipodoc = $_POST['tipodoc'];
                $ndocumento = $_POST['Documento'];
                $edad = $_POST['Edad'];
                $tel = $_POST['Telefono'];
                $direccion = $_POST['Direccion'];
                $email = $_POST['email'];



                if (
                  $nombredu == "" ||  $apellido == "" ||  $tipodoc == "" || $ndocumento == "" ||
                  $edad == "" || $tel == "" || $direccion == "" ||  $email == ""
                ) {

                  echo "<script> Swal.fire('Todos los campos son obligatorios')</script> ";
                } else {
                  $query = mysqli_query($conectar, "INSERT INTO dueño_mascota( nombres, apellidos, tipo_documento,numero_documento, fecha_nacimiento, telefono, direccion, correo) values ('$nombredu','$apellido','$tipodoc', '$ndocumento', '$edad','$tel', '$direccion','$email' )"); {
                    echo "<script> Swal.fire('Datos registrados exitosamente')</script> ";
                  }
                }
              }
            } catch (Exception $e) {
          
              if ($e->getCode() == 1062 ) 
              { echo "<script> Swal.fire('El usuario ya existe') </script>";}

              else  
              { echo "<script> Swal.fire(".$e->getMessage().") </script>";}
                
            }
          


            ?>
          </form>
        </div>
      </div>
    </div>
  </body>
 
  <!-- Footer -->
 
<footer class="text-center text-lg-start text-muted" style="background-color: #D6EAF8 !important;">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Company name
            </h6>
            <p>
              Here you can use rows and columns to organize your footer content. Lorem ipsum
              dolor sit amet, consectetur adipisicing elit.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="#!" class="text-reset">Angular</a>
            </p>
            <p>
              <a href="#!" class="text-reset">React</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Vue</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Laravel</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Settings</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              info@example.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>
    



  </html>


  