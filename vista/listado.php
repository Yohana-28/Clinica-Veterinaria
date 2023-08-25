<?php
include_once '../modelo/conexionfiltrar.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$conexion->query("USE veterinaria");
$consulta = "SELECT dueño_mascota.id_dueño,dueño_mascota.nombres,dueño_mascota.apellidos,dueño_mascota.tipo_documento,dueño_mascota.numero_documento,dueño_mascota.fecha_nacimiento AS edad,dueño_mascota.telefono,dueño_mascota.direccion,dueño_mascota.correo, mascota_paciente.id_mascota, mascota_paciente.nombre_mascota,mascota_paciente.raza, mascota_paciente.tipo_mascota, mascota_paciente.sexo, mascota_paciente.fecha_nacimiento, mascota_paciente.fk_id_dueño 
             FROM dueño_mascota AS dueño_mascota
             LEFT JOIN mascota_paciente AS mascota_paciente ON dueño_mascota.id_dueño = mascota_paciente.fk_id_dueño";



$resultado = $conexion->prepare($consulta);
$resultado->execute();
$dueñoM = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
  header("Location: ../login.php");
}

$perfil = $_SESSION['perfil'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Formulario Ingreso </title>
  <link rel="shortcut icon" href="../img/logo.png">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">
  <!---datables CSS básico--->
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="../datatables/css/dataTables.bootstrap4.min.css">
   <!--datables estilo bootstrap 4 CSS-->  
   <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.13.6/css/dataTables.bootstrap4.min.css">
   <!---Bootstrap iconos--->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <!---Bootstrap Estilo de la tabla--->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!---- Iconos de los botones bonito --->
  <script src="https://kit.fontawesome.com/dcb1bbced2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://kit.fontawesome.com/dcb1bbced2.css" crossorigin="anonymous">
<!--font awesome con CDN-->  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  

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
          <li class="nav-item dropdown">
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
          <button class="btn btn-outline-dark text-white" type="submit">Buscar</button>&nbsp
          <a href="../logout.php" class="btn btn-dark text-white" title="Cerrar Seción"><i class="fas fa-sign-out-alt"></i></a>
        </form>
      </div>
    </div>
  </nav>
  <br><br>
  <div style="margin:50px">
    <h1 class="text-center text-dark">Listado de registrados</h1><br>
    <br>
    <div class="table-responsive">
    <table id="tablaUsuario" class="table table-striped" style="width: 100%">
        <thead>
          <tr>
          <th scope="col" style="display: none;"></th>
            <th scope="col"><small>Nombres</small></th>
            <th scope="col"><small>Apellidos</small></th>
            <th scope="col" style="display: none;"></th>
            <th scope="col"><small>Numero documento</small></th>
            <th scope="col" style="display: none;"></th>
            <th scope="col"><small>Telefono</small></th>
            <th scope="col"><small>Direccion</small></th>
            <th scope="col" style="display: none;"></th>
            <th scope="col" style="display: none;"></th>
            <th scope="col"><small>Nombre mascota</small></th>
            <th scope="col"><small>Raza</small></th>
            <th scope="col"><small>Tipo mascota</small></th>
            <th scope="col"><small>Sexo</small></th>
            <th scope="col"><small>Fecha de nacimiento</small></th>
            <th scope="col" style="display: none;"></th>
            <th scope="col"><small>Editar</small></th>
            <th scope="col"><small>Eliminar</small></th>
          </tr>
        </thead>
        <tbody>

          <!-----Logica para filtrar datos ---->

          <?php
          foreach ($dueñoM as $filtro) {
            // Obtén la fecha de nacimiento y conviértela en un objeto DateTime

          ?>
            <tr>
            <td style="display: none;"><?php echo $filtro['id_dueño'] ?></td>
              <td><small><?php echo $filtro['nombres'] ?></small></td>
              <td><small><?php echo $filtro['apellidos'] ?></small></td>
              <td style="display: none;"><?php echo $filtro['tipo_documento'] ?></td>
              <td><small><?php echo $filtro['numero_documento'] ?></small></td>
              <td style="display: none;"><?php echo $filtro['edad'] ?></td>
              <td><small><?php echo $filtro['telefono'] ?></small></td>
              <td><small><?php echo $filtro['direccion'] ?></small></td>
              <td style="display: none;"><?php echo $filtro['correo'] ?></td>
              <td style="display: none;"><?php echo $filtro['id_mascota'] ?></td>
              <td><small><?php echo $filtro['nombre_mascota'] ?></small></td>
              <td><small><?php echo $filtro['raza'] ?></small></td>
              <td><small><?php echo $filtro['tipo_mascota'] ?></small></td>
              <td><small><?php echo $filtro['sexo'] ?></small></td>
              <td><small><?php echo $filtro['fecha_nacimiento'] ?></small></td>
              <td style="display: none;"><?php echo $filtro['fk_id_dueño'] ?></td>


              <td><button type="button" class="btn btn-success editbtn botonEditarDueño" data-bs-toggle="modal" data-bs-target="#editar"><i class="fa-solid fa-file-pen"></i></button></td>

              <td><button type="button" class="btn btn-danger deletebtn botonEliminarDueño" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="fa-solid fa-solid fa-trash-can"></i></button></td>
            </tr>

          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
     
  </div>


  <!-- Modal  de editar-->
  <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="text" name="nombres" id="nombres" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="">Tipo de documento</label>
                    <select name="tipo_documento" id="tipo_documento" class="form-control">
                      <option>---Seleccione---</option>
                      <option>---Cedula de Ciudadania---</option>
                      <option>---Cedula de Extranjeria---</option>
                    </select>
                  </div>

                  <div class="f  orm-group">
                    <label for="">Numero de Documento</label>
                    <input type="number" name="ndocumento" id="ndocumento" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="">Edad</label>
                    <input type="date" name="edad" id="edad" class="form-control">
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
                  <input type="text" name="id_mascota" id="id_mascota">
                  <div class="form-group">
                    <label for=""> Nombre mascota </label>
                    <input type="text" name="nombre_mascota" id="nombre_mascota" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Raza</label>
                    <input type="text" name="raza" id="raza" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for=""> Tipo de mascota</label>
                    <input type="text" name="tipo_mascota" id="tipo_mascota" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for=""> Sexo </label>
                    <input type="text" name="sexo" id="sexo" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for=""> Fecha de nacimiento </label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
                  </div>
                  <input type="hidden" name="fk_id_dueño" id="fk_id_dueño">

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

  <script>
    $(document).ready(function() {
      $('#tablaUsuario').DataTable();

    });
  </script>


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

  <!-- Popper Bootstrap  -->
  <script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>
  <script src="popper/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>


 <!-- para usar botones en datatables JS -->  
 <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>


  <!-- Libreria js datable -->

  <script type="text/javascript" src="../datatables/datatables.min.js"></script>

  <!--- js datable --->
  <script src="../datatables/Buttons-2.3.3/js/dataTables.buttons.min.js"></script>
  <script src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="../datatables/Buttons-2.3.3/js/buttons.html5.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>

  <script type="text/javascript" src="../js/main.js"></script>

  <!---Script Modal Editar--->
  <script>



    $('.editbtn').on('click', function() {
      $tr = $(this).closest('tr');
      var datos = $tr.children("td").map(function() {
        return $(this).text();
      });

      // Asigna los valores capturados a los campos del formulario de edición
      $('#update_id').val(datos[0]);
      $('#nombres').val(datos[1]);
      $('#apellidos').val(datos[2]);
      $('#tipo_documento').val(datos[3]);
      $('#ndocumento').val(datos[4]);
      $('#edad').val(datos[5]);
      $('#telefono').val(datos[6]);
      $('#direccion').val(datos[7]);
      $('#email').val(datos[8]);
      $('#id_mascota').val(datos[9]);
      $('#nombre_mascota').val(datos[10]);
      $('#raza').val(datos[11]);
      $('#tipo_mascota').val(datos[12]);
      $('#sexo').val(datos[13]);
      $('#fecha_nacimiento').val(datos[14]);
      $('#fk_id_dueño').val(datos[15]);


      // Realiza la petición AJAX para enviar los datos al archivo editar.php
      $.ajax({
        url: "../controlador/editar.php",
        method: "POST",
        data: {
          id_dueño: datos[0],
          nombres: datos[1],
          apellidos: datos[2],
          tipo_documento: datos[3],
          numero_documento: datos[4],
          edad: datos[5],
          telefono: datos[6],
          direccion: datos[7],
          correo: datos[8],
          id_mascota: datos[9],
          nombre_mascota: datos[10],
          raza: datos[11],
          tipo_mascota: datos[12],
          sexo: datos[13],
          fecha_nacimiento: datos[14],
          fk_id_dueño: datos[15]
        },
        success: function(response) {
          // Manejar la respuesta del servidor si es necesario
          console.log(response);
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });
  </script>

</html>