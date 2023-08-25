<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinaria";

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
    $historia_medica_vacunas = $_POST["vacunas"];
    $historia_medica_enfermedades = $_POST["enfermedades"];
    $historia_medica_cirugias = $_POST["cirugias"];
    $historia_medica_alergias = $_POST["alergias"];
    $historia_medica_medicamentos = $_POST["medicamentos"];
    $historia_medica_reproductivo = $_POST["reproductivo"];
    $historial_alimentacion_tipo_alimento = $_POST["tipoAlimento"];
    $historial_alimentacion_marca_variedad_alimento = $_POST["marca"];
    $historial_alimentacion_horarios = $_POST["horarios"];
    $historial_alimentacion_cantidad_frecuencia = $_POST["cantidad"];
    $comportamiento_general = $_POST["comportamiento"];
    $actividad_fisica = $_POST["actividad"];
    $contacto_animales_enfermedades = $_POST["contacto"];
    $viajes_cambios_entorno = $_POST["viajes"];
    $examen_fisico_peso = $_POST["peso"];
    $examen_fisico_temperatura = $_POST["temperatura"];
    $examen_fisico_frecuencia_cardiaca = $_POST["frecuenciaCardiaca"];
    $examen_fisico_frecuencia_respiratoria = $_POST["frecuenciaRespiratoria"];
    $examen_fisico_estado_piel_pelaje_unas= $_POST["estado"];
    $examen_fisico_evaluacion_sistemas= $_POST["sistemas"];
    $diagnosticos_previos_examenes= $_POST["examenes"];
    $diagnosticos_previos_pruebas_diagnostico_imagen= $_POST["pruebas"];
    $diagnosticos_previos_otros= $_POST["diagnosticos"];
    $consulta_actual_motivo= $_POST["motivo"];
    $consulta_actual_sintomas= $_POST["sintomas"];
    $consulta_actual_duracion= $_POST["duracion"];
    $consulta_actual_cambios_comportamiento_salud= $_POST["cambios"];
    $plan_tratamiento_medicamentos_recetados= $_POST["medicamentosRecetados"];
    $plan_tratamiento_recomendaciones_dieteticas= $_POST["recomendaciones"];
    $plan_tratamiento_indicaciones_cuidados_hogar= $_POST["cuidados"];
    $plan_tratamiento_programa_seguimiento_citas_futuras= $_POST["seguimiento"];


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
                animal_color_caracteristicas,
                historia_medica_vacunas,
                historia_medica_enfermedades,
                historia_medica_cirugias,
                historia_medica_alergias,
                historia_medica_medicamentos,
                historia_medica_reproductivo,
                historial_alimentacion_tipo_alimento,
                historial_alimentacion_marca_variedad_alimento,
                historial_alimentacion_horarios,
                historial_alimentacion_cantidad_frecuencia,
                comportamiento_general,
                actividad_fisica,
                contacto_animales_enfermedades,
                viajes_cambios_entorno,
                examen_fisico_peso,
                examen_fisico_temperatura,
                examen_fisico_frecuencia_cardiaca,
                examen_fisico_frecuencia_respiratoria,
                examen_fisico_estado_piel_pelaje_unas,
                examen_fisico_evaluacion_sistemas,
                diagnosticos_previos_examenes,
                diagnosticos_previos_pruebas_diagnostico_imagen,
                diagnosticos_previos_otros,
                consulta_actual_motivo,
                consulta_actual_sintomas,
                consulta_actual_duracion,
                consulta_actual_cambios_comportamiento_salud,
                plan_tratamiento_medicamentos_recetados,
                plan_tratamiento_recomendaciones_dieteticas,
                plan_tratamiento_indicaciones_cuidados_hogar,
                plan_tratamiento_programa_seguimiento_citas_futuras	

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
                '$animal_color_caracteristicas',
                '$historia_medica_vacunas',
                '$historia_medica_enfermedades',
                '$historia_medica_cirugias',
                '$historia_medica_alergias',
                '$historia_medica_medicamentos',
                '$historia_medica_reproductivo',
                '$historial_alimentacion_tipo_alimento',
                '$historial_alimentacion_marca_variedad_alimento',
                '$historial_alimentacion_horarios',
                '$historial_alimentacion_cantidad_frecuencia',
                '$comportamiento_general',
                '$actividad_fisica',
                '$contacto_animales_enfermedades',
                '$viajes_cambios_entorno',
                '$examen_fisico_peso',
                '$examen_fisico_temperatura',
                '$examen_fisico_frecuencia_cardiaca',
                '$examen_fisico_frecuencia_respiratoria',
                '$examen_fisico_estado_piel_pelaje_unas',
                '$examen_fisico_evaluacion_sistemas',
                '$diagnosticos_previos_examenes',
                '$diagnosticos_previos_pruebas_diagnostico_imagen',
                '$diagnosticos_previos_otros',
                '$consulta_actual_motivo',
                '$consulta_actual_sintomas',
                '$consulta_actual_duracion',
                '$consulta_actual_cambios_comportamiento_salud',
                '$plan_tratamiento_medicamentos_recetados',
                '$plan_tratamiento_recomendaciones_dieteticas',
                '$plan_tratamiento_indicaciones_cuidados_hogar',
                '$plan_tratamiento_programa_seguimiento_citas_futuras'
        
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