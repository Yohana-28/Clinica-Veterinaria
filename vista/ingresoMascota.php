<?php
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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-apha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

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
            <a class="nav-link text-white" href="ingresoMascota.php">Registro mascota</a>
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
  <br>
  </br>
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <form action="" method="post">
          <div class="card position-relative mx-auto mb-4" style="width: 30rem;">
            <div class="card-header bg-success  text-white">
              Consultar documento del dueño de la mascota
            </div>
            <div class="container text-center p-3">
              <div class="row">
                <div class="col">
                  <div class='mb-3'>
                    <label class="form-label">Numero de documento</label>
                    <input type="text" name="consulta_documento" placeholder="Numero de documento" class="form-control">
                  </div>
                  <div>
                    <input type="submit" name="btn_buscar" class="btn btn-dark" value="Buscar">
                  </div>
                </div>
              </div>
            </div>
            <?php

            include_once("../modelo/conexionadd.php");
            if (isset($_POST['btn_buscar'])) {
              $documento = $_POST['consulta_documento'];
              $existe = 0;

              if ($documento == "") {
                echo "<script> Swal.fire('<h4> Por favor digite el documento a consultar</h4>')</script> ";
              } else {
                $resultado = mysqli_query($conectar, "SELECT * FROM dueño_mascota WHERE numero_documento = ' $documento' ");

                while ($consulta = mysqli_fetch_array($resultado)) {
                  echo "
                
                <center><table width=\"80%\border\"1\">
                <tr>
                <td><center><b> nombre </b></center></td>
                <td><center><b> apellido </b></center></td>
                <td><center><b> tipo_documento </b></center></td>
                <td><center><b> numero_documento </b></center></td>
                <td><center><b> edad </b></center></td>
                <td><center><b> telefono </b></center></td>
                <td><center><b> direccion </b></center></td>
                <td><center><b> correo </b></center></td>
    
                </tr>
                <tr>
                <td><center>" . $consulta['nombre'] . "</center></td>
                <td><center>" . $consulta['apellido'] . "</center></td>
                <td><center>" . $consulta['tipo_documento'] . "</center></td>
                <td><center>" . $consulta['numero_documento'] . "</center></td>
                <td><center>" . $consulta['edad'] . "</center></td>
                <td><center>" . $consulta['telefono'] . "</center></td>
                <td><center>" . $consulta['direccion'] . "</center></td>
                <td><center>" . $consulta['correo'] . "</center></td>
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

      <div class="container text-center">
        <div class="row">
          <div class="col">

            <form action="" method="post">
              <div class="card position-relativo mx-auto" style="width: 30rem;">
                <div class="card-header bg-success  text-white">
                  Formulario de registro del Paciente Mascota
                </div>
                <div class="container text-center p-3">
                  <div class="row">
                    <div class="col">
                      <div class='mb-3'>
                        <label>Nombre de la Mascota</label>
                        <input type="text" name="NombreM" placeholder="Nombre Mascota" class="form-control">
                      </div>
                      <div class='mb-3'>
                        <label>Raza de la Mascota</label>
                        <input type="text" name="Raza" placeholder="Raza" class="form-control">
                      </div>
                      <div class='mb-3'>
                        <label>Tipo de Mascota</label>
                        <input type="text" name="TipoM" placeholder=" Felinos o Caninos" class="form-control">
                      </div>
                      <div class='mb-3'>
                        <label>Sexo de la Mascota</label>
                        <input type="text" name="Sexo" placeholder="Macho o Hembra" class="form-control">
                      </div>
                      <div class='mb-3'>
                        <label>Edad de la Mascota</label>
                        <input type="number" name="EdadM" placeholder="Edad Mascota" class="form-control">
                      </div>
                      <div>

                        <input type="submit" name="btn_guardarM" class="btn btn-dark" value="Guardar">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php
              include("../modelo/conexionadd.php");

              if (isset($_POST['btn_guardarM'])) {
                $nombreMa = $_POST['NombreM'];
                $raza = $_POST['Raza'];
                $tipoM = $_POST['TipoM'];
                $sexoM = $_POST['Sexo'];
                $edadM = $_POST['EdadM'];

                if (
                  $nombreMa == "" ||  $raza == "" ||  $tipoM == "" || $sexoM == "" || $edadM == ""
                ) {

                  echo "<script> Swal.fire('Todos los campos son obligatorios')</script> ";
                } else {
                  $query = mysqli_query($conectar, "INSERT INTO mascota_paciente( nombre, raza, tipo_Mascota, sexo, edad_Mascota)
                 values ('$nombreMa','$raza ','$tipoM','$sexoM ', '$edadM')"); {
                    echo "<script> Swal.fire('Datos registrados exitosamente')</script> ";
                  }
                }
              }

              ?>

            </form>
          </div>
        </div>
      </div>
</body>
<br>


 <!-- Footer -->
 <footer class="text-center text-lg-start bg-info text-muted">
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