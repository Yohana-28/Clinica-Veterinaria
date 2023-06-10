<<?php
  include_once '../modelo/conexion.php'

  ?> <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Ingreso </title>
    <link rel="shortcut icon" href="../img/logo.png">

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg bg-danger">
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
              <a class="nav-link text-white" href="ingreso.php">Registro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="listado.php">Listado</a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white" href="consulta.php">Consulta</a>
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
            <h2 class="display-6 text-danger"> Consulta de Registrados</h2>
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
              </center>
              <!------Modulo de Consulta------>
              <?php
              include_once("../modelo/conexionadd.php");
              if(isset($_POST['btn_consultar']))
              {
                $ndocumento = $_POST['ConsultaDocumento'];
                $existe = 0;

                if($ndocumento=="")
                {
                  echo "<script> Swal.fire('<h4> Señor usuario Digite el numero de documento para realizar la consulta</h4>')</script> ";
                }

                else{
                  $resultado = mysqli_query($conectar, "SELECT * FROM dueño_mascota WHERE numero_documento = ' $ndocumento' ");

                  while($consulta = mysqli_fetch_array($resultado))
                  {
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
                        <td><center>".$consulta['nombre']."</center></td>
                        <td><center>".$consulta['apellido']."</center></td>
                        <td><center>".$consulta['tipo_documento']."</center></td>
                        <td><center>".$consulta['numero_documento']."</center></td>
                        <td><center>".$consulta['edad']."</center></td>
                        <td><center>".$consulta['telefono']."</center></td>
                        <td><center>".$consulta['direccion']."</center></td>
                        <td><center>".$consulta['correo']."</center></td>
                        </tr>
                        </table>
                        </center>";
                        
                        $existe++;

                      }

                        if($existe==0){

                          echo "<script> Swal.fire('<h4> El número de documento ingresado no se encuentra registrado en nuestra base de datos</h4>')</script> ";


                   }

                }
              }

          ?>











            </form>
        </div>
    
  </body>
  </html>