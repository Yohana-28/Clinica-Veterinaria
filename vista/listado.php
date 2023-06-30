<?php
include_once '../modelo/conexionfiltrar.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$conexion->query("USE veterinaria");
$consulta = "SELECT * FROM dueño_mascota";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$dueñoM = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Formulario Ingreso </title>
  <link rel="shortcut icon" href="../img/logo.png">

<!--- Estilo datables librery----->
<link rel="stylesheet"  type="text/css" href="datatables/datatables.min.css">

<link rel="stylesheet"  type="text/css" href="datatables/css/dataTables.bootstrap4.css">

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-apha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">


  <!---- Alertas con estilo ---->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!---- Iconos de Botones  ---->
  <script src="https://kit.fontawesome.com/5d93fb46f2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://kit.fontawesome.com/dcb1bbced2.css" crossorigin="anonymous">



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
  <br><br>
  <div class="container">
    <h1 class="text-center text-dark">Listado de registrados</h1><br>
    <br>
    <center>
      <table id="tablaUsuario" class="table-striped table-success" style="width: 100%">
        <thead>
        <tr>
          <th scope="col">Item</th>
          <th scope="col">Nombres</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Tipo de documento</th>
          <th scope="col">Numero documento</th>
          <th scope="col">Edad</th>
          <th scope="col">Telefono</th>
          <th scope="col">Direccion</th>
          <th scope="col">Correo</th>
        </tr>
        </thead>
        <tbody>

          <!-----Logica para filtrar datos ---->

          <?php
          foreach ($dueñoM as $filtro) {
          ?>
            <tr>
              <td><?php echo $filtro['id_dueño'] ?></td>
              <td><?php echo $filtro['nombre'] ?></td>
              <td><?php echo $filtro['apellido'] ?></td>
              <td><?php echo $filtro['tipo_documento'] ?></td>
              <td><?php echo $filtro['numero_documento'] ?></td>
              <td><?php echo $filtro['edad'] ?></td>
              <td><?php echo $filtro['telefono'] ?></td>
              <td><?php echo $filtro['direccion'] ?></td>
              <td><?php echo $filtro['correo'] ?></td>

              <td><button type="button" class="btn btn-success editbtn botonEditarDueño" data-bs-toggle="modal" data-bs-target="#editar"><i class="fa-solid fa-file-pen"></i></button></td>

              <td><button type="button" class="btn btn-danger deletebtn botonEliminarDueño" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="fa-solid fa-solid fa-trash-can"></i></button></td>
            </tr>

          <?php
          }
          ?>
        </tbody>
      </table>
    </center>
  </div>


  <!-- Modal  de editar-->
  <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 80rem;">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Actualización de datos</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../controlador/editar.php" method="post">
            <input type="hidden" name="id_dueño" id="update_id">

            <div class="container text-center">
              <div class="row">
                <div class="col -6">

                  <div class="form-group">
                    <label for="">Nombres</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="">Apellidos</label>
                    <input type="text" name="apellido" id="apellido" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="">Tipo de documento</label>
                    <select name="tipo_documento" id="tipodocu" class="form-control">
                      <option>---Seleccione---</option>
                      <option>---Cedula de Ciudadania---</option>
                      <option>---Cedula de Extranjeria---</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Numero de Documento</label>
                    <input type="number" name="numero_documento" id="ndocumento" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="">Edad</label>
                    <input type="number" name="edad" id="edad" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="number" name="telefono" id="telefono" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for=""> Dirección </label>
                    <input type="direccion" name="direccion" id="direccion" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for=""> Correo </label>
                    <input type="email" name="correo" id="email" class="form-control">
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>

  

  <!-- Modal  de eliminar-->
  <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 80rem;">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Actualización de datos</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../controlador/eliminar.php" method="post">
            <input type="hidden" name="id_dueño" id="update_idtoDelete">
            <div class="container text-center">
              <div class="row">
                <div class="col -6">

                  <div>
                    <h4>Deseas eliminar este usuario</h4>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>

  <script>

$(document).ready(function(){
  $('#tablaUsuario').DataTable();


});
</script>

  <script>
    // Captura el evento del botón "Editar" de cada fila
    var editButtons = document.getElementsByClassName("botonEditarDueño");
    Array.from(editButtons).forEach(function(button) {
      button.addEventListener("click", function() {
        // Obtén el valor del campo "id_dueño" de la fila seleccionada
        var idDueño = this.parentNode.parentNode.querySelector("td:first-child").innerText;
        // Asigna el valor al campo oculto "update_id" en el formulario de edición
        document.getElementById("update_id").value = idDueño;
      });
    });
    
    // Captura el evento del botón "Elimar" de cada fila
    var deleteButtons = document.getElementsByClassName("botonEliminarDueño");
    Array.from(deleteButtons).forEach(function(button) {
      button.addEventListener("click", function() {
        // Obtén el valor del campo "id_dueño" de la fila seleccionada
        var idDueñoEliminar = this.parentNode.parentNode.querySelector("td:first-child").innerText;
        // Asigna el valor al campo oculto "update_id" en el formulario de edición
        document.getElementById("update_idtoDelete").value = idDueñoEliminar;
      });
    });
  </script>




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

  <!-- Popper Bootstrap  -->
  <script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>


   <!-- Libreria js datable  -->

   <script type="text/javascript" src="../datatables/datatables.min.js"></script>

   <!-- js datable  -->
   <script  src="../datatables/Buttons-2.3.3/js/dataTables.buttons.min.js"></script>
   <script  src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
   <script  src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
   <script  src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
   <script  src="../datatables/Buttons-2.3.3/js/buttons.html5.min.js"></script>

   <script type="text/javascript" src="../js/main.js"></script>



  </html>