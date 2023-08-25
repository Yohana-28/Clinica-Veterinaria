<?php
  include_once '../modelo/conexion_historia.php'
  ?> 
<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login.php");
}

$perfil = $_SESSION['perfil'];
?>
 
 <!DOCTYPE html>
<html>
<head>
  <title>Historia Clínica Veterinaria</title>
  <link rel="shortcut icon" href="../img/logo.png">

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
          <a class="nav-link active  text-white" aria-current="page" href="index.php">Inicio</a>
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
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-dark text-white" type="submit">Buscar</button>&nbsp
        <a href="../logout.php" class="btn btn-dark text-white" title="Cerrar Seción"><i class="fas fa-sign-out-alt"></i></a>	
		</form>	
	  </div>
  </div>
</nav>
<br>
  <div class="container text-center">
  <div class="row">
    <div class="col">
      <form action="" method="post">
 <div class="card position-relative mx-auto mb-4" style="width: 40rem;">
		<div class="card-header bg-secondary text-black">
    <h2>Historia clínica veterinaria</h2>
    <br>
    <form>
      <div class="mb-3">
        <h3>Datos del Propietario</h3>
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" id="nombre" name="nombre"  class="form-control">

        <label for="direccion" class="form-label">Dirección:</label>
        <input type="text" id="direccion" name="direccion" class="form-control">

        <label for="telefono" class="form-label">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" class="form-control">

        <label for="email" class="form-label">Correo Electrónico:</label>
        <input type="email" id="email" name="email"  class="form-control">
      </div>

      <div class="mb-3">
        <h3>Información del Paciente</h3>
        <label for="nombreAnimal" class="form-label">Nombre del Animal:</label>
        <input type="text" id="nombreAnimal" name="nombreAnimal"  class="form-control">

        <label for="especie" class="form-label">Especie:</label>
        <input type="text" id="especie" name="especie"  class="form-control">

        <label for="raza" class="form-label">Raza:</label>
        <input type="text" id="raza" name="raza"  class="form-control">

        <label for="edad" class="form-label">Edad o Fecha de Nacimiento:</label>
        <input type="text" id="edad" name="edad"  class="form-control">

        <label for="genero" class="form-label">Género:</label>
        <select id="genero" name="genero"  class="form-select">
          <option>Macho</option>
          <option>Hembra</option>
          <option>Otro</option>
        </select>

        <label for="color" class="form-label">Color y Características Físicas:</label>
        <textarea id="color" name="color" rows="3"  class="form-control">Pelaje negro, tamaño mediano</textarea>
      </div>

      <div class="mb-3">
        <h3>Historia Médica</h3>
        <label for="vacunas" class="form-label">Vacunas y Desparasitaciones Anteriores:</label>
        <textarea id="vacunas" name="vacunas" rows="3" class="form-control"></textarea>

        <label for="enfermedades" class="form-label">Enfermedades Previas o Crónicas:</label>
        <textarea id="enfermedades" name="enfermedades" rows="3" class="form-control"></textarea>

        <label for="cirugias" class="form-label">Cirugías o Procedimientos Anteriores:</label>
        <textarea id="cirugias" name="cirugias" rows="3" class="form-control"></textarea>

        <label for="alergias" class="form-label">Alergias Conocidas:</label>
        <textarea id="alergias" name="alergias" rows="3" class="form-control"></textarea>

        <label for="medicamentos" class="form-label">Medicamentos Actuales o Recientes:</label>
        <textarea id="medicamentos" name="medicamentos" rows="3" class="form-control"></textarea>

        <label for="reproductivo" class="form-label">Historial Reproductivo:</label>
        <textarea id="reproductivo" name="reproductivo" rows="3" class="form-control"></textarea>
      </div>

      <div class="mb-3">
        <h3>Historial de Alimentación</h3>
        <label for="tipoAlimento" class="form-label">Tipo de Alimento:</label>
        <input type="text" id="tipoAlimento" name="tipoAlimento" required class="form-control">

        <label for="marca" class="form-label">Marca y Variedad de Alimento:</label>
        <input type="text"  id="marca" name="marca" required class="form-control">
        <label for="horarios" class="form-label">Horarios de Alimentación:</label>
        <input type="text" id="horarios" name="horarios" required class="form-control">

        <label for="cantidad" class="form-label">Cantidad de Alimento y Frecuencia:</label>
        <input type="text" id="cantidad" name="cantidad" required class="form-control">
      </div>

      <div class="mb-3">
        <h3>Comportamiento y Estilo de Vida</h3>
        <label for="comportamiento" class="form-label">Comportamiento General:</label>
        <textarea id="comportamiento" name="comportamiento" rows="3" class="form-control"></textarea>

        <label for="actividad" class="form-label">Actividad Física:</label>
        <textarea id="actividad" name="actividad" rows="3" class="form-control"></textarea>

        <label for="contacto" class="form-label">Contacto con Otros Animales o Enfermedades Contagiosas:</label>
        <textarea id="contacto" name="contacto" rows="3" class="form-control"></textarea>

        <label for="viajes" class="form-label">Viajes o Cambios en el Entorno Recientes:</label>
        <textarea id="viajes" name="viajes" rows="3" class="form-control"></textarea>
      </div>

      <div class="mb-3">
        <h3>Examen Físico</h3>
        <label for="peso" class="form-label">Peso:</label>
        <input type="text" id="peso" name="peso" required class="form-control">

        <label for="temperatura" class="form-label">Temperatura Corporal:</label>
        <input type="text" id="temperatura" name="temperatura" required class="form-control">

        <label for="frecuenciaCardiaca" class="form-label">Frecuencia Cardíaca:</label>
        <input type="text" id="frecuenciaCardiaca" name="frecuenciaCardiaca" required class="form-control">

        <label for="frecuenciaRespiratoria" class="form-label">Frecuencia Respiratoria:</label>
        <input type="text" id="frecuenciaRespiratoria" name="frecuenciaRespiratoria" required class="form-control">

        <label for="estado" class="form-label">Estado de la Piel, Pelaje y Uñas:</label>
        <textarea id="estado" name="estado" rows="3" required class="form-control"></textarea>

        <label for="sistemas" class="form-label">Evaluación de los Sistemas:</label>
        <textarea id="sistemas" name="sistemas" rows="3" required class="form-control"></textarea>
      </div>

      <div class="mb-3">
        <h3>Diagnósticos Previos</h3>
        <label for="examenes" class="form-label">Resultados de Exámenes de Laboratorio Anteriores:</label>
        <textarea id="examenes" name="examenes" rows="3" class="form-control"></textarea>

        <label for="pruebas" class="form-label">Resultados de Pruebas de Diagnóstico por Imagen:</label>
        <textarea id="pruebas" name="pruebas" rows="3" class="form-control"></textarea>

        <label for="diagnosticos" class="form-label">Otros Diagnósticos Previos:</label>
        <textarea id="diagnosticos" name="diagnosticos" rows="3" class="form-control"></textarea>
      </div>

      <div class="mb-3">
        <h3>Consulta Actual</h3>
        <label for="motivo" class="form-label">Motivo de la Visita:</label>
        <textarea id="motivo" name="motivo" rows="3" required class="form-control"></textarea>

        <label for="sintomas" class="form-label">Descripción de los Síntomas Actuales:</label>
        <textarea id="sintomas" name="sintomas" rows="3" required class="form-control"></textarea>

        <label for="duracion" class="form-label">Duración de los Síntomas:</label>
        <input type="text" id="duracion" name="duracion" required class="form-control">

        <label for="cambios" class="form-label">Cambios Recientes en el Comportamiento o la Salud:</label>
        <textarea id="cambios" name="cambios" rows="3" required class="form-control"></textarea>
      </div>

      <div class="mb-3">
        <h3>Plan de Tratamiento</h3>
        <label for="medicamentosRecetados" class="form-label">Medicamentos Recetados:</label>
        <textarea id="medicamentosRecetados" name="medicamentosRecetados" rows="3" required class="form-control"></textarea>

        <label for="recomendaciones" class="form-label">Recomendaciones Dietéticas:</label>
        <textarea id="recomendaciones" name="recomendaciones" rows="3" class="form-control"></textarea>

        <label for="cuidados" class="form-label">Indicaciones de Cuidados en el Hogar:</label>
        <textarea id="cuidados" name="cuidados" rows="3" class="form-control"></textarea>

        <label for="seguimiento" class="form-label">Programa de Seguimiento o Citas Futuras:</label>
        <textarea id="seguimiento" name="seguimiento" rows="3" class="form-control"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>

</body>
</html>


