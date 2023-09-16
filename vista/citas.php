<?php
include("../modelo/conexionadd.php");

$nombreM = "";
$nombreD = "";
$ndocumento = "";
$tel = "";
$direccion = "";
$email = "";


if (isset($_GET['id_mascota']) && isset($_GET['id_dueño'])) {
    $idMascota = $_GET['id_mascota'];
    $idDueño = $_GET['id_dueño'];
  

      $consultaMascotaDueño = mysqli_query($conectar, "SELECT m.nombre_mascota, dm.nombres, dm.apellidos, 
    dm.numero_documento, dm.telefono, dm.direccion, dm.correo FROM mascota_paciente AS m
        JOIN dueño_mascota AS dm ON m.fk_id_dueño = dm.id_dueño
        WHERE m.id_mascota = $idMascota AND dm.id_dueño = $idDueño");

 if ($consultaMascotaDueño) {
        $datos = mysqli_fetch_assoc($consultaMascotaDueño);
        $nombreM = $datos['nombre_mascota'];
        $nombreD = $datos['nombres'] . ' ' . $datos['apellidos'];
        $ndocumento = $datos['numero_documento'];
        $tel = $datos['telefono'];
        $direccion = $datos['direccion'];
        $email = $datos['correo'];
        
       
    }
}

try {

  if (isset($_POST['btn_guardar_Cita'])) {
       
      $fecha_hora_cita = $_POST['fecha_hora_cita'];
      $motivo_cita = $_POST['motivo_cita'];
      $fk_idMascota = $_POST['fk_idMascota'];

       $queryCita = mysqli_query($conectar, "INSERT INTO citas (fecha_hora_cita, motivo_cita, fk_id_mascota) VALUES ('$fecha_hora_cita', '$motivo_cita', $fk_idMascota)");

       
      if ($queryCita) {
        
            echo "<script> Swal.fire('Datos registrados exitosamente')</script>";
        } else {
          
            echo "<script> Swal.fire('Error al registrar los datos')</script>";
        }
    }
} catch (Exception $e) {
    echo "<script> Swal.fire('Error: " . $e->getMessage() . "')</script>";
}
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

   
   
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	
		<script src="https://kit.fontawesome.com/dcb1bbced2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://kit.fontawesome.com/dcb1bbced2.css" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	

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
                Agendamiento de citas
              </div>
              <div class="container text-center">
                <div class="row">
                    <div class='mb-3 col-6'>
                      <label class="form-label">Nombre de la mascota</label>
                      <input type="text" name="nombreM" class="form-control" readonly value="<?php echo $nombreM; ?> ">
                    </div>
                    <div class='mb-3 col-6'>
                      <label class="form-label">Nombre del Dueño de la mascota</label>
                      <input type="text" name="nombreD" class="form-control" readonly value="<?php echo $nombreD; ?>">
                    </div>

                    <div class='mb-3 col-6'>
                      <label class="form-label">Numero de Documento</label>
                      <input type="number" name="Documento" class="form-control" readonly  value="<?php echo $ndocumento; ?>"> </div>

                    <div class='mb-3 col-6'>
                      <label>Telefono </label>
                      <input type="number" name="Telefono"  class="form-control" readonly  value="<?php echo $tel; ?>">
                    </div>

                    <div class='mb-3 col-6'>
                      <label>Direccion</label>
                      <input type="varchar" name="Direccion"  class="form-control" readonly  value="<?php echo $direccion; ?>">
                    </div>

                    <div class='mb-3 col-6'>
                      <label>Email</label>
                      <input type="email" name="email"  class="form-control" readonly  value="<?php echo $email; ?>">
                    </div>

                <div class='mb-3 col-4'>
                    <label>Fecha y Hora de la Cita:</label>
                   <input type="datetime-local" name="fecha_hora_cita" class="form-control">
                    </div>

                    <div class='mb-3 col-6'>
                    <label for="motivo_cita">Motivo de la Cita:</label>
                      <select name="motivo_cita" class="form-control">
                        <option>---Seleccione---</option>
                        <option>---Cita de control---</option>
                        <option>---Vacunación y/o Examenes---</option>
                        <option>---Esterilización---</option>
                      </select>
                    </div>


         
                    
                  <div>
 <input type="hidden" name="fk_idMascota" value="<?php echo $idMascota; ?>">
<input type="hidden" name="fk_idDueño" value="<?php echo $idDueño; ?>">
                  <input type="submit"  name="btn_guardar_Cita" class="btn btn-success" value="Agendar Cita"> 
            </div>
         </form>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
 <br>
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

