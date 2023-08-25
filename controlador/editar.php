<?php
include_once("../modelo/conect.php");



if (
    isset($_POST["id_dueño"]) &&
    isset($_POST["nombres"]) &&
    isset($_POST["apellidos"]) &&
    isset($_POST["tipo_documento"]) &&
    isset($_POST["ndocumento"]) &&
    isset($_POST["edad"]) &&
    isset($_POST["telefono"]) &&
    isset($_POST["direccion"]) &&
    isset($_POST["correo"]) &&
    isset($_POST["id_mascota"]) &&
    isset($_POST["nombre_mascota"]) &&
    isset($_POST["raza"]) &&
    isset($_POST["tipo_mascota"]) &&
    isset($_POST["sexo"]) &&
    isset($_POST["fecha_nacimiento"])&&
    isset($_POST["fk_id_dueño"])
    
) {
    echo("entro esta vuelta");
    $id = $_POST["id_dueño"];
    $nombre = $_POST["nombres"];
    $apellido = $_POST["apellidos"];
    $tipodoc = $_POST["tipo_documento"];
    $documento = $_POST["ndocumento"];
    $edad = $_POST["edad"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $email = $_POST["correo"];
    $id_mascota = $_POST["id_mascota"];
    $nombreMa = $_POST["nombre_mascota"];
    $raza = $_POST["raza"];
    $tipoM = $_POST["tipo_mascota"];
    $sexoM = $_POST["sexo"];
    $edadM = $_POST["fecha_nacimiento"];
    $fk_id_dueño = $_POST["fk_id_dueño"];


    $consultaDueño = "UPDATE dueño_mascota SET nombres = ?, apellidos = ?, tipo_documento = ?, numero_documento = ?, dueño_mascota.fecha_nacimiento = ?, telefono = ?, direccion = ?, correo = ? WHERE id_dueño = ?";
    $consultaMascota = "UPDATE mascota_paciente SET nombre_mascota = ?, raza = ?, tipo_mascota = ?, sexo = ?, mascota_paciente.fecha_nacimiento = ?, fk_id_dueño = ? WHERE id_mascota = ?";

    $resultadoDueño = $bd->prepare($consultaDueño);
    $resultadoMascota = $bd->prepare($consultaMascota);

    // Ejecutar las consultas
    $resultadoDueño->execute([$nombre, $apellido, $tipodoc, $documento, $edad, $telefono, $direccion, $email, $id]);
    $resultadoMascota->execute([$nombreMa, $raza, $tipoM, $sexoM, $edadM,$fk_id_dueño, $id_mascota]);

    if ($resultadoDueño && $resultadoMascota) {
        echo "<script> alert('Actualización realizada'); location.href = '../vista/listado.php';</script>";
    } else {
        echo "Error";
    }


}else if (empty($id) || empty($nombre) || empty($apellido) || empty($tipodoc) || empty($documento) || empty($edad) || empty($telefono) || empty($direccion) || empty($email) || empty($id_mascota) || empty($nombreMa) || empty($raza) || empty($tipoM) || empty($sexoM) || empty($edadM) || empty($fk_id_dueño) ) {
    echo "Faltan datos en el formulario. id  nombre:  apellido:  tipodoc:  documento: edad:  telefono:  direccion:   email:   id_mascota:  nombreMa:   raza:  tipoM:  sexoM:  edadM:  ";
    
    exit; // Detener la ejecución del script si faltan datos
}
