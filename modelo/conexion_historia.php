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