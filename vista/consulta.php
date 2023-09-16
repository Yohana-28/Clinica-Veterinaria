 <?php
  include_once '../modelo/conexionfiltrar.php'

  ?> <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Ingreso </title>
    <link rel="shortcut icon" href="../img/logo.png">
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
              <a class="nav-link active text-white" aria-current="page" href="../index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="consulta.php">Consulta</a>
            </li>
            <li class="nav-item">
     <a class="nav-link text-white" href="ingresoDueño.php">Registro dueño mascota</a>
            </li>

            <li class="nav-item">
      <a class="nav-link text-white" href="ingresoMascota.php">Registro mascota</a>  
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
            <button class="btn btn-outline-dark" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </nav>
    <center><br>
        <div id="container">
            <h2 class="display-6 text-dark"> Consulta de Registrados</h2>
            <form action="" method="post">
              <table>
                <tr>
                <td><label>Por favor digite el numero de documento a consultar </label><br><br>
                <input type="text" name="ConsultaDocumento" class="form-control" style="width: 100%">
                </td>
                </tr><br>
                <td colspan="2"><br><center>
                <input type="submit" name="btn_consultar" value="Consultar" class="btn btn-dark">
                </center> </td>

                </tr>
              </table>
              <td colspan="2"></td>
              <br>
            </form>
            
              <!------Modulo de Consulta------>
              <?php
              include_once("../modelo/conexionadd.php");
              if (isset($_POST['btn_consultar'])) {
                $ndocumento = $_POST['ConsultaDocumento'];
                $existe = 0;
              
                if ($ndocumento == "") {
                  echo "<script> Swal.fire('<h4> Señor usuario, por favor digite el número de documento para realizar la consulta</h4>')</script> ";
                } else {
                  $resultado = mysqli_query($conectar, "SELECT * FROM dueño_mascota 
                  JOIN mascota_paciente ON dueño_mascota.id_dueño = mascota_paciente.fk_id_dueño
                  WHERE dueño_mascota.numero_documento = '$ndocumento'");

echo "
<center>
<table id='resultTable' class='display' style='width:100%'>
  <thead>
    <tr>
      <th>Nombre dueño</th>
      <th>Apellido dueño</th>
      <th>Tipo de documento</th>
      <th>Número de documento</th>
      <th>Edad</th>
      <th>Teléfono</th>
      <th>Dirección</th>
      <th>Correo</th>
      <th>ID Mascota</th>
      <th>Nombre mascota</th>
      <th>Raza</th>
      <th>Tipo de mascota</th>
      <th>Sexo</th>
      <th>Edad mascota</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>";
  
while ($consulta = mysqli_fetch_array($resultado)) {
  echo "<tr>
          <td>" . $consulta['nombres'] . "</td>
          <td>" . $consulta['apellidos'] . "</td>
          <td>" . $consulta['tipo_documento'] . "</td>
          <td>" . $consulta['numero_documento'] . "</td>
          <td>" . $consulta['fecha_nacimiento'] . "</td>
          <td>" . $consulta['telefono'] . "</td>
          <td>" . $consulta['direccion'] . "</td>
          <td>" . $consulta['correo'] . "</td>
          <td>" . $consulta['id_mascota'] . "</td>
          <td>" . $consulta['nombre_mascota'] . "</td>
          <td>" . $consulta['raza'] . "</td>
          <td>" . $consulta['tipo_mascota'] . "</td>
          <td>" . $consulta['sexo'] . "</td>
          <td>" . $consulta['fecha_nacimiento'] . "</td>
          <td>
          <a href='citas.php?id_mascota=" . $consulta['id_mascota'] . "&id_dueño=" . $consulta['id_dueño'] . "' class='btn btn-success'>Agendar Cita</a>
        <a href='editar_info.php?id=" . $consulta['id_mascota'] . "' class='btn btn-warning'>Editar</a>
          </td>
        </tr>";
  $existe++;
}

echo "</tbody>
</table>
</center>";


                  // Mostrar los resultados de la consulta
                  while ($consulta = mysqli_fetch_array($resultado)) {
                    echo "
                    <center>
                    <table width='80%' border='1'>
                      <tr>
                        <td><center><b>Nombre dueño</b></center></td>
                        <td><center><b>Apellido dueño</b></center></td>
                        <td><center><b>Tipo de documento</b></center></td>
                        <td><center><b>Número de documento</b></center></td>
                        <td><center><b>Edad</b></center></td>
                        <td><center><b>Teléfono</b></center></td>
                        <td><center><b>Dirección</b></center></td>
                        <td><center><b>Correo</b></center></td>
                        <td><center><b>ID Mascota</b></center></td>
                        <td><center><b>Nombre mascota</b></center></td>
                        <td><center><b>Raza</b></center></td>
                        <td><center><b>Tipo de mascota</b></center></td>
                        <td><center><b>Sexo</b></center></td>
                        <td><center><b>Edad mascota</b></center></td>
                      </tr>
                      <tr>
                        <td><center>".$consulta['nombres']."</center></td>
                        <td><center>".$consulta['apellidos']."</center></td>
                        <td><center>".$consulta['tipo_documento']."</center></td>
                        <td><center>".$consulta['numero_documento']."</center></td>
                        <td><center>".$consulta['fecha_nacimiento']."</center></td>
                        <td><center>".$consulta['telefono']."</center></td>
                        <td><center>".$consulta['direccion']."</center></td>
                        <td><center>".$consulta['correo']."</center></td>
                        <td><center>".$consulta['id_mascota']."</center></td>
                        <td><center>".$consulta['nombre_mascota']."</center></td>
                        <td><center>".$consulta['raza']."</center></td>
                        <td><center>".$consulta['tipo_mascota']."</center></td>
                        <td><center>".$consulta['sexo']."</center></td>
                        <td><center>".$consulta['fecha_nacimiento']."</center></td>
                        <td><center>".$consulta['fk_id_dueño']."</center></td>
                      </tr>
                    </table>
                    </center>";
              
                    $existe++;
                  }
              
                  if ($existe == 0) {
                    echo "<script> Swal.fire('<h4> El número de documento ingresado no se encuentra registrado en nuestra base de datos</h4>')</script> ";
                  }
                }
              }
              ?>
         </form>
        </div>
        <script>
  $(document).ready(function () {
    $('#resultTable').DataTable();
  });
</script>

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
  </html>
