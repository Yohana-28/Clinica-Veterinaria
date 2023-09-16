<?php
// Obtener el ID de la mascota seleccionada desde la solicitud
$idMascota = $_GET['id_mascota'];

// Realizar una consulta SQL para obtener la información del dueño
$conexion = new mysqli("localhost", "root", "", "veterinaria");
$query = "SELECT nombres, apellidos FROM dueño_mascota WHERE id_dueño IN (SELECT fk_id_dueño FROM mascota_paciente WHERE id_mascota = $idMascota)";

$result = $conexion->query($query);

if ($result && $row = $result->fetch_assoc()) {
    $duenoInfo = [
        'nombre' => $row['nombres'],
        'apellidos' => $row['apellidos'],
    ];
    echo json_encode($duenoInfo);
} else {
    echo json_encode(['error' => 'No se encontró al dueño de la mascota.']);
}

// Cerrar la conexión
$conexion->close();
?>
