<?php
include_once("../modelo/conect.php");

if (
    isset($_POST["id_dueño"]) &&
    isset($_POST["nombre"]) &&
    isset($_POST["apellido"]) &&
    isset($_POST["tipo_documento"]) &&
    isset($_POST["numero_documento"]) &&
    isset($_POST["edad"]) &&
    isset($_POST["telefono"]) &&
    isset($_POST["direccion"]) &&
    isset($_POST["correo"])
) {
    $id = $_POST["id_dueño"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $tipodoc = $_POST["tipo_documento"];
    $documento = $_POST["numero_documento"];
    $edad = $_POST["edad"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $correo = $_POST["correo"];

    print($id);

    $sentencia = $bd->prepare("UPDATE dueño_mascota SET nombre = ?, apellido = ?, tipo_documento = ?, numero_documento = ?, edad = ?, telefono = ?, direccion = ?, correo = ? WHERE id_dueño = ?;");

    $resultado = $sentencia->execute([$nombre, $apellido, $tipodoc, $documento, $edad, $telefono, $direccion, $correo, $id]);

    if ($resultado) {
        echo "<script> alert('Actualización realizada'); location.href = '../vista/listado.php';</script>";
    } else {
        echo "Error";
    }
} else {
    echo "Faltan datos en el formulario.";
}
?>