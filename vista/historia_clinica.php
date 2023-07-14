 <!DOCTYPE html>
<html>
<head>
  <title>Historia Clínica Veterinaria</title>
  <!-- Agregar los enlaces CSS de Bootstrap -->
</head>
<body>
  <div class="container">
    <h2>Historia Clínica Veterinaria</h2>
    <form>
      <div class="mb-3">
        <h3>Datos del Propietario</h3>
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="Juan Pérez" readonly class="form-control">

        <label for="direccion" class="form-label">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="Calle Principal 123" readonly class="form-control">

        <label for="telefono" class="form-label">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" value="555-123456" readonly class="form-control">

        <label for="email" class="form-label">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="correo@example.com" readonly class="form-control">
      </div>

      <div class="mb-3">
        <h3>Información del Paciente</h3>
        <label for="nombreAnimal" class="form-label">Nombre del Animal:</label>
        <input type="text" id="nombreAnimal" name="nombreAnimal" value="Rocky" readonly class="form-control">

        <label for="especie" class="form-label">Especie:</label>
        <input type="text" id="especie" name="especie" value="Perro" readonly class="form-control">

        <label for="raza" class="form-label">Raza:</label>
        <input type="text" id="raza" name="raza" value="Labrador Retriever" readonly class="form-control">

        <label for="edad" class="form-label">Edad o Fecha de Nacimiento:</label>
        <input type="text" id="edad" name="edad" value="3 años" readonly class="form-control">

        <label for="genero" class="form-label">Género:</label>
        <select id="genero" name="genero" disabled class="form-select">
          <option value="macho" selected>Macho</option>
          <option value="hembra">Hembra</option>
          <option value="otro">Otro</option>
        </select>

        <label for="color" class="form-label">Color y Características Físicas:</label>
        <textarea id="color" name="color" rows="3" readonly class="form-control">Pelaje negro, tamaño mediano</textarea>
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



Crear una nueva base de datos
CREATE DATABASE nombre_base_datos;

-- Usar la base de datos creada
USE nombre_base_datos;

-- Crear una tabla para la historia clínica veterinaria
CREATE TABLE historia_clinica (
  id INT PRIMARY KEY AUTO_INCREMENT,
  propietario_nombre VARCHAR(100) NOT NULL,
  propietario_direccion VARCHAR(100) NOT NULL,
  propietario_telefono VARCHAR(20) NOT NULL,
  propietario_email VARCHAR(100),
  animal_nombre VARCHAR(100) NOT NULL,
  animal_especie VARCHAR(100) NOT NULL,
  animal_raza VARCHAR(100) NOT NULL,
  animal_edad VARCHAR(20) NOT NULL,
  animal_genero VARCHAR(10) NOT NULL,
  animal_color_caracteristicas TEXT NOT NULL,
  historia_medica_vacunas TEXT,
  historia_medica_enfermedades TEXT,
  historia_medica_cirugias TEXT,
  historia_medica_alergias TEXT,
  historia_medica_medicamentos TEXT,
  historia_medica_reproductivo TEXT,
  historial_alimentacion_tipo_alimento VARCHAR(100) NOT NULL,
  historial_alimentacion_marca_variedad_alimento VARCHAR(100) NOT NULL,
  historial_alimentacion_horarios TEXT NOT NULL,
  historial_alimentacion_cantidad_frecuencia TEXT NOT NULL,
  comportamiento_general TEXT,
  actividad_fisica TEXT,
  contacto_animales_enfermedades TEXT,
  viajes_cambios_entorno TEXT,
  examen_fisico_peso VARCHAR(20) NOT NULL,
  examen_fisico_temperatura VARCHAR(20) NOT NULL,
  examen_fisico_frecuencia_cardiaca VARCHAR(20) NOT NULL,
  examen_fisico_frecuencia_respiratoria VARCHAR(20) NOT NULL,
  examen_fisico_estado_piel_pelaje_unas TEXT NOT NULL,
  examen_fisico_evaluacion_sistemas TEXT NOT NULL,
  diagnosticos_previos_examenes TEXT,
  diagnosticos_previos_pruebas_diagnostico_imagen TEXT,
  diagnosticos_previos_otros TEXT,
  consulta_actual_motivo TEXT NOT NULL,
  consulta_actual_sintomas TEXT NOT NULL,
  consulta_actual_duracion VARCHAR(100) NOT NULL,
  consulta_actual_cambios_comportamiento_salud TEXT NOT NULL,
  plan_tratamiento_medicamentos_recetados TEXT NOT NULL,
  plan_tratamiento_recomendaciones_dieteticas TEXT,
  plan_tratamiento_indicaciones_cuidados_hogar TEXT,
  plan_tratamiento_programa_seguimiento_citas_futuras TEXT
);


<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "nombre_base_datos";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los datos enviados desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $propietario_nombre = $_POST["nombre"];
    $propietario_direccion = $_POST["direccion"];
    $propietario_telefono = $_POST["telefono"];
    $propietario_email = $_POST["email"];
    $animal_nombre = $_POST["nombreAnimal"];
    $animal_especie = $_POST["especie"];
    $animal_raza = $_POST["raza"];
    $animal_edad = $_POST["edad"];
    $animal_genero = $_POST["genero"];
    $animal_color_caracteristicas = $_POST["color"];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO historia_clinica (
                propietario_nombre,
                propietario_direccion,
                propietario_telefono,
                propietario_email,
                animal_nombre,
                animal_especie,
                animal_raza,
                animal_edad,
                animal_genero,
                animal_color_caracteristicas
            ) VALUES (
                '$propietario_nombre',
                '$propietario_direccion',
                '$propietario_telefono',
                '$propietario_email',
                '$animal_nombre',
                '$animal_especie',
                '$animal_raza',
                '$animal_edad',
                '$animal_genero',
                '$animal_color_caracteristicas'
            )";

    if ($conn->query($sql) === TRUE) {
        echo "Datos guardados correctamente";
    } else {
        echo "Error al guardar los datos: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>