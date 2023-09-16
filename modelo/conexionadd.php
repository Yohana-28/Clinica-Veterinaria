<?php
$host ="localhost";
$user = "root";
$clave = "";
$bd = "veterinaria";


$conectar = new Mysqli ($host,$user, $clave, $bd);
if ($conectar->connect_error) {
    die("Error de conexión: " . $conectar->connect_error);
}







?>