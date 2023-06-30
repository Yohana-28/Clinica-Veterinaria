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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-apha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

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
      <table id="tablaUsuario" class="table-striped table-sucess" style="width: 100%">
        <thead></thead>
        <tr>
          <th scope="col">Item</th>
          <th scope="col">Nombres</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Tipo de documento</th>
          <th scope="col">Numero documento</th>
          <th scope="col">Edad</th>
          <th scope="col">Telefono</th>
          <th scope="col">Direccion</th>
          <th scope="col">
            <center> Correo </center>
          </th>
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